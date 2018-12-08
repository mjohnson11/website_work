
//GLOBALS

var empty_things = {'#VALUE!': true, 'nan': true, 'NaN': true, 'NA': true, '': true};
var list_of_orfs = {};
var list_of_genes = {};

var full_data;

var test_env_dict = {"YPD rep1": true, "YPD rep2": true, "YPG": true, "YPE": true, "SC": true, "OAK": true, "ETH": true};
var test_envs = Object.keys(test_env_dict);

var envs_to_sig_ranges = {
    'YPD rep1': [0.8763, 1.03195],
    'YPD rep2': [0.9849, 1.01505],
    'YPG': [0.97635, 1.02365],
    'YPE': [0.9663, 1.03385],
    'SC': [0.98445, 1.01555],
    'OAK': [0.91695, 1.0831],
    'ETH': [0.98225, 1.01775]
}

//Coloring and labeling
var main_point_color = "black";
var GO_highlight_color = "#1a8cff";
var sing_lin_selection_color = "red";

var color_scheme = {0: main_point_color, 1: "DodgerBlue", 2: "teal", 3: "brown", 4: "green", 5: "gold", 6: "orange", 7: "DeepPink",  8: "aqua", 9: "purple"};

//GLOBALS for selection and coloring
var highlighted_lineage = -1;
var highlighted_GO_term;
var highlighted_lin_pointer = -1;

var show_data_button;
var display_raw_data = false;

var home_env_div;

var big_svg_object;
var big_svg_w = 1400;
var big_svg_h = 1000;


//JDFE graph stuff
var point_radius = 3;
var JDFE_div;
var JDFE_w = 650;
var JDFE_h = 650;
var JDFE_svg;
var env_on_x_axis;
var env_on_y_axis;
//GLOBAL JDFE Scales
var jdfe_low_lim = -0.5;
var jdfe_high_lim = 0.3;
var JDFExScale = d3.scale.linear()
                .range([50, JDFE_w-50])
                .domain([jdfe_low_lim, jdfe_high_lim]);    
var JDFEyScale = d3.scale.linear()
                .range([30, JDFE_h-70])
                .domain([jdfe_high_lim, jdfe_low_lim]);
var JDFExAxis = d3.svg.axis()
                    .scale(JDFExScale)
                    .ticks(parseInt(10*(jdfe_high_lim-jdfe_low_lim)+2));
var JDFEyAxis = d3.svg.axis()
                    .scale(JDFEyScale)
                    .ticks(parseInt(10*(jdfe_high_lim-jdfe_low_lim)+2))
                    .orient("left");

//Spaghetti graph stuff

var spag_w = 700;
var spag_dx = Math.round( spag_w / test_envs.length );
var spag_h = 450;
var spag_top = 0;
var spag_left = 720;
var spag_low_lim = -0.5;
var spag_high_lim = 0.3;
var spag_xScale = d3.scale.linear()
                    .range([spag_left+50, spag_left+spag_w-50])
                    .domain([0, test_envs.length]);
var spag_yScale = d3.scale.linear()
                    .range([spag_top+50, spag_top+spag_h-75])
                    .domain([spag_high_lim, spag_low_lim]);
var spag_xAxis = d3.svg.axis()
                    .scale(spag_xScale)
                    .ticks(0)
                    .outerTickSize(0);
var spag_yAxis = d3.svg.axis()
                    .scale(spag_yScale)
                    .orient("left")
                    .outerTickSize(5)
                    .tickValues([0.3, 0.2, 0.1, 0, -0.1, -0.2, -0.3, -0.4, -0.5])
                    .tickFormat(function(d) {
                        console.log(d);
                        if (d == spag_high_lim) {
                            return "> " + String(spag_high_lim);
                        } else if (d == spag_low_lim) {
                            return "< " + String(spag_low_lim);
                        } else {
                            return String(d);
                        }
                    });
var spag_lineFunction = d3.svg.line()
                        .x(function(d) { return spag_xScale(d.x); })
                        .y(function(d) { 
                            if (d.y in empty_things) {
                                //call s 0 for nan
                                return spag_yScale(0);
                            } else {
                                var s = parseFloat(d.y);
                                //move extreme values to the edges
                                if (s > spag_high_lim) {
                                    s = spag_high_lim;
                                } else if (s < spag_low_lim) {
                                    s = spag_low_lim;
                                }
                                return spag_yScale(s);
                            }
                        })
                        .interpolate("linear");

var activity_to_display = {"-1":"block", "1":"block", "2":"block", "3":"block"};
var activity_to_opacity = {"-1":"0.05", "1":"0.1", "2":"0.4", "3":"0.8"};
var activity_to_stroke_width = {"-1":"1", "1":"2", "2":"2", "3":"3"};


//FUNCTION FOR BRING TO FRONT
//http://bl.ocks.org/eesur/4e0a69d57d3bfc8a82c2
// https://github.com/wbkd/d3-extended
d3.selection.prototype.moveToFront = function() {  
  return this.each(function(){
    this.parentNode.appendChild(this);
  });
};
d3.selection.prototype.moveToBack = function() {  
    return this.each(function() { 
        var firstChild = this.parentNode.firstChild; 
        if (firstChild) { 
            this.parentNode.insertBefore(this, firstChild); 
        } 
    });
};

function change_x_axis() {
    console.log("Changing x axis to: " + document.getElementById("select_x").value);
    env_on_x_axis = document.getElementById("select_x").value;
    big_svg_object.selectAll(".jdfe_point")
        .transition()
        .duration(3000)
        .attr("cx", function(d) { 
            var x_key = env_on_x_axis + ' fitness';
            if (d[x_key] in empty_things) { 
                d3.select(this).attr("display", "none");
                return JDFExScale(0); 
            } else {
                d3.select(this).attr("display", "block");
                var val = parseFloat(d[x_key]) - 1;
                if (val > jdfe_high_lim) {
                    val = jdfe_high_lim;
                } else if (val < jdfe_low_lim) {
                    val = jdfe_low_lim;
                }
                return JDFExScale(val); 
            } 
        });
    background_svg_object.select("#jdfe_sig_box")
        .transition()
        .duration(3000)
        .attr("x", function(d, i) { 
            return JDFExScale(envs_to_sig_ranges[env_on_x_axis][0]-1); })
        .attr("width", function(d, i) { 
            return JDFExScale(envs_to_sig_ranges[env_on_x_axis][1]-1)-JDFExScale(envs_to_sig_ranges[env_on_x_axis][0]-1); })
}

function change_y_axis() {
    console.log("Changing y axis to: " + document.getElementById("select_y").value);
    env_on_y_axis = document.getElementById("select_y").value;
    big_svg_object.selectAll(".jdfe_point")
        .transition()
        .duration(3000)
        .attr("cy", function(d) { 
            var y_key = env_on_y_axis + ' fitness';
            if (d[y_key] in empty_things) { 
                d3.select(this).attr("display", "none");
                return JDFEyScale(0); 
            } else {
                d3.select(this).attr("display", "block");
                var val = parseFloat(d[y_key]) - 1;
                if (val > jdfe_high_lim) {
                    val = jdfe_high_lim;
                } else if (val < jdfe_low_lim) {
                    val = jdfe_low_lim;
                }
                return JDFEyScale(val); 
            } 
        });
    
    background_svg_object.select("#jdfe_sig_box")
        .transition()
        .duration(3000)
        .attr("y", function(d, i) { 
            return JDFEyScale(envs_to_sig_ranges[env_on_y_axis][1]-1); })
        .attr("height", function(d, i) { 
            return JDFEyScale(envs_to_sig_ranges[env_on_y_axis][0]-1)-JDFEyScale(envs_to_sig_ranges[env_on_y_axis][1]-1); }); 
}


//MAKE TRAJ GRAPH
function make_big_svg() { 
    //CONSTRUCTING
    
    
    
    background_svg_object
        .append("rect")
            .attr("id", "jdfe_sig_box")
            .attr("fill", "#ADFDFD")
            .attr("x", function(d, i) { 
                return JDFExScale(envs_to_sig_ranges[env_on_x_axis][0]-1); })
            .attr("width", function(d, i) { 
                return JDFExScale(envs_to_sig_ranges[env_on_x_axis][1]-1)-JDFExScale(envs_to_sig_ranges[env_on_x_axis][0]-1); })
            .attr("y", function(d, i) { 
                return JDFEyScale(envs_to_sig_ranges[env_on_y_axis][1]-1); })
            .attr("height", function(d, i) { 
                return JDFEyScale(envs_to_sig_ranges[env_on_y_axis][0]-1)-JDFEyScale(envs_to_sig_ranges[env_on_y_axis][1]-1); });
    /*
    big_svg_object.selectAll(".spag_sig_range")
        .data(test_envs)
        .enter()
        .append("rect")
            .attr("class", "spag_sig_range")
            .attr("x", function(d, i) { return spag_xScale(i); })
            .attr("width", function() { return spag_xScale(2)-spag_xScale(1); })
            .attr("y", function(d) {
                return spag_yScale(envs_to_sig_ranges[d][1]-1);
            })
            .attr("height", function(d) {
                return spag_yScale(envs_to_sig_ranges[d][0]-1)-spag_yScale(envs_to_sig_ranges[d][1]-1);
            });
    */
    
    big_svg_object.selectAll(".data_group_interact")
        .data(full_data)
        .enter()
        .append("g")
            .attr("class", "data_group_interact")
            .attr("base_stroke", main_point_color)
            .attr("stroke", function() { return d3.select(this).attr("base_stroke"); })
            .attr("stroke-width", "2")
            .attr("base_opacity", "0.1")
            .attr("opacity", "0.1")
            .attr("activity", "1")
            .on("mouseover", function(d) {
                if (d3.select(this).attr("activity") != "-1") {
                    d3.select(this).attr("opacity", "0.8");
                    d3.select(this).attr("stroke", sing_lin_selection_color);
                    d3.select(this).selectAll(".jdfe_point").attr("fill", sing_lin_selection_color);
                    d3.select(this).attr("stroke-width", "3");
                    d3.select(this).moveToFront();
                    show_hover_lineage(d);      
                }
            })
            .on("mouseout", function(d) {
                if ((d3.select(this).attr("activity") != "3") && (d3.select(this).attr("activity") != "-1")) {
                    d3.select(this).attr("opacity", function() { return d3.select(this).attr("base_opacity"); });
                    d3.select(this).attr("stroke", function() { return d3.select(this).attr("base_stroke"); });
                    d3.select(this).attr("stroke-width", "2");
                    d3.select(this).selectAll(".jdfe_point").attr("fill", function () { return d3.select(this.parentNode).attr("base_stroke"); });
                    if (highlighted_GO_term == "Show All") {
                        d3.select(this).moveToBack();
                    }
                }
                show_hover_lineage(highlighted_lin_pointer);
            })
            .on("click", function(d) {
                if (d3.select(this).attr("activity") != "-1") {
                    highlight_lineage(d);   
                }
            })
            .append("path")
                .attr("fill", "none")
                .style("mix-blend-mode", "normal")
                .attr("d", function(d) { 
                    var line_data = [];
                    for (var i=0; i<test_envs.length; i++) {
                        var xval = i;
                        line_data.push({'x': xval, 'y': d[String(test_envs[i]) + ' fitness']-1 });
                    }
                    return spag_lineFunction(line_data);
                });
        
    var yAxis_svg = big_svg_object.append("g")
        .attr("class", "axis")
        .call(spag_yAxis)
        .attr("transform", "translate(" + spag_xScale(0) + ", 0)");
    
    big_svg_object.selectAll(".spag_label_text")
        .data(test_envs)
        .enter()
        .append("text")
            .text(function(d) { return d; })
            .attr("text-anchor", "middle")  
            .attr("transform", function(d, i) { return "translate("+ spag_xScale(i) +","+(spag_yScale(spag_low_lim)+20)+")"; }); 
    
    big_svg_object.append("text")
        .text("S")
        .attr("text-anchor", "middle") 
        .attr("font-size", 14)
        .attr("transform", "translate("+ (spag_left+5) +","+ (spag_top + parseInt(2*spag_h/7) - 7) +")");
    
    big_svg_object.append("text")
        .text("Fitness Effect in Each Environment in the Bulk Fitness Assay")
        .attr("text-anchor", "middle")  
        .attr("transform", "translate("+ spag_xScale((test_envs.length-1)/2) +","+ (spag_yScale(spag_low_lim)+50) +")");
    

    
    //jdfe points
    big_svg_object.selectAll(".data_group_interact")
        .append("circle")
            .attr("class", "jdfe_point")
            //.style("mix-blend-mode", "multiply")
            .attr("r", point_radius)
            .attr("fill", function() { return d3.select(this.parentNode).attr("base_stroke"); })
            .attr("cx", function(d) { 
                var x_key = env_on_x_axis + ' fitness';
                if (d[x_key] in empty_things) {
                    d3.select(this).attr("display", "none");
                    return JDFExScale(0); 
                } else {
                    d3.select(this).attr("display", "block");
                    var val = parseFloat(d[x_key]) - 1;
                    if (val > jdfe_high_lim) {
                        val = jdfe_high_lim;
                    } else if (val < jdfe_low_lim) {
                        val = jdfe_low_lim;
                    }
                    return JDFExScale(val); 
                } 
            })
            .attr("cy", function(d) { 
                var y_key = env_on_y_axis + ' fitness';
                if (d[y_key] in empty_things) {
                    d3.select(this).attr("display", "none");
                    return JDFEyScale(0); 
                } else {
                    d3.select(this).attr("display", "block");
                    var val = parseFloat(d[y_key]) - 1;
                    if (val > jdfe_high_lim) {
                        val = jdfe_high_lim;
                    } else if (val < jdfe_low_lim) {
                        val = jdfe_low_lim;
                    }
                    return JDFEyScale(val); 
                } 
            });
    
    
    
    var JDFExAxis_svg = big_svg_object.append("g")
                        .attr("class", "axis")
                        .call(JDFExAxis)
                        .attr("transform", "translate(0," + JDFEyScale(0) + ")");
    var JDFEyAxis_svg = big_svg_object.append("g")
                        .attr("class", "axis")
                        .call(JDFEyAxis)
                        .attr("transform", "translate(" + JDFExScale(0) + ", 0)");
 
}

//LINEAGE INFO DISPLAY STUFF
function lin_info(lin) {
    d3.select("#lin_orf").html(lin["ORF"]);
    d3.select("#lin_gene").html(lin["Gene.symbol"]);
    d3.select("#lin_descrip").html(lin["Gene.briefDescription"]);
    d3.select("#extra_info").style("display", "block").style("opacity", "1");
    d3.selectAll(".info_piece")
        .selectAll(".info_info")
        .html( function() { 
            var tmp_text = lin[d3.select(this.parentNode).attr("id")];
            if (tmp_text == '') {
                tmp_text = 'Not available';
            }
            return tmp_text;
        });
    d3.select("#SGD_link_text")
        .on("mouseover", function () { 
            d3.select(this).style("opacity", "0.5");
            d3.select(this).style("text-decoration", "underline");    
            })
        .on("mouseout", function () { 
            d3.select(this).style("opacity", "1");
            d3.select(this).style("text-decoration", "none");
        })
        .on("click", function () { 
            d3.select(this).style("opacity", "0.3");
            window.open(lin["SGD.link"], '_blank');
        });    
}

function show_hover_lineage(datum) {
    if (datum != -1) {
        lin_info(datum);   
    }
}

function highlight_lineage(lin) {
    console.log("Selected lineage:");
    console.log(lin);
    if (highlighted_lineage == lin["ORF"]) {
        //clicked twice, reset
        highlighted_lineage = -1;
        highlighted_lin_pointer = -1;
        d3.select("#extra_info").style("display", "none");
    } else {
        highlighted_lineage = lin["ORF"];
        highlighted_lin_pointer = lin;
    }
    console.log(highlighted_lineage);
    //extra_lin_info(highlighted_lin_pointer);
    color_based_on_selections();
}

function activity_decider(d) {  
    if (highlighted_GO_term in d["GO_terms"]) {
        if (d["ORF"] == highlighted_lineage) { 
            return "3";
        } else {
           return "2";  
        }
    } else {
        if (highlighted_GO_term != "Show All") {
            return "-1";
        } else {
            if (d["ORF"] == highlighted_lineage) { 
                return "3";
            } else {
                return "1";
            }
        }
    } 
}

//MAIN COLORING-DISPLAY FUNCTION
function color_based_on_selections() {
    console.log(highlighted_GO_term);
    //SET ACTIVITY BASED ON WHETHER IT IS 
    big_svg_object.selectAll(".data_group_interact")
        .attr("activity", function(d) { return activity_decider(d); });
    
    
    big_svg_object.selectAll(".data_group_interact")
        .attr("display", function() { return activity_to_display[d3.select(this).attr("activity")]; })
        .attr("base_opacity", function() { 
            return activity_to_opacity[d3.select(this).attr("activity")]; 
        })
        .attr("stroke-width", function() { return activity_to_stroke_width[d3.select(this).attr("activity")]; })
        .attr("base_stroke", function() { 
            if (d3.select(this).attr("activity") == "3") {
                d3.select(this).moveToFront();
                return sing_lin_selection_color;
            } else if (d3.select(this).attr("activity") == "2") {
                return GO_highlight_color;
            } else {
                d3.select(this).moveToBack();
                return main_point_color;
            }
        })
        .attr("opacity", function() { return d3.select(this).attr("base_opacity") })
        .attr("stroke", function() { return d3.select(this).attr("base_stroke") })
        .selectAll(".jdfe_point").attr("fill", function () { return d3.select(this.parentNode).attr("base_stroke"); });
}
 
function get_GO_terms(datum) {
    //adds an int as the "Environment" for each datum according to home env info
    var tmp_gos = datum["GO.Slim"].split(';');
    var tmp_dict = {};
    for (var i=0; i<tmp_gos.length; i++) {
        tmp_dict[tmp_gos[i]] = true;
    } 
    return tmp_dict;
}

//SWITCHES FOR HIGHLIGHTING
function highlight_GO() {
    highlighted_GO_term = document.getElementById("select_GO").value;
    color_based_on_selections();
}

function lookup_highlight() {
    var found = false;
    var search_for = document.getElementById("gene_search").value;
    if (search_for in list_of_genes) {
        found = true;
        highlighted_lin_pointer = list_of_genes[search_for];
    }
    if (search_for in list_of_orfs) {
        found = true;
        highlighted_lin_pointer = list_of_orfs[search_for];
    }
    if (!found) {
        alert('Could not find a gene or ORF name that matched');
    } else {
        highlighted_GO_term = "Show All";
        console.log(highlighted_lin_pointer);
        highlighted_lineage = highlighted_lin_pointer["ORF"];
        show_hover_lineage(highlighted_lin_pointer);
        //extra_lin_info(highlighted_lin_pointer);
        color_based_on_selections();
    }
}


function load_full_data() {
    data_keys = Object.keys(full_data[0]);
    for (i=0; i<full_data.length; i++) {
        full_data[i]["GO_terms"] = get_GO_terms(full_data[i]);
        full_data[i]['SGD.link'] = 'http://www.yeastgenome.org/locus/' + full_data[i]["ORF"] + '/overview';
        list_of_genes[full_data[i]["Gene.symbol"]] = full_data[i];
        list_of_orfs[full_data[i]["ORF"]] = full_data[i];
        
        //full_data[i]["GO_terms"] = {};
    }
    
    //full_data = full_data.slice(0, 4);
    
    
    background_svg_object = d3.select("#svg_div")
        .append("svg")
            .attr("class", "big_svg")
            .attr("width", big_svg_w)
            .attr("height", big_svg_h);
    
    big_svg_object = d3.select("#svg_div")
        .append("svg")
            .attr("class", "big_svg")
            .attr("width", big_svg_w)
            .attr("height", big_svg_h);

        
    env_on_x_axis = document.getElementById("select_x").value;
    env_on_y_axis = document.getElementById("select_y").value;
    highlighted_GO_term = document.getElementById("select_GO").value;
    
    make_big_svg();
    
    d3.select("#loading").style("display", "none");
    d3.select("#lin_info_div").style("display", "block");
    d3.select("#select_y").style("display", "block");
    d3.select("#select_x").style("display", "block");
    d3.select("#select_GO").style("display", "block");
    d3.select("#go_select_title").style("display", "block");
    d3.select("#gene_search_title").style("display", "block");
    d3.select("#gene_search").style("display", "block");
    d3.select("#jdfe_title").style("display", "block");
    
}

function read_data() {
        
    //read in explain data
    d3.csv("data/Qian_combined_plusGO.csv", function(data1) {

        //Hand CSV data off to global var
        full_data = data1;

        //Call some other functions
        load_full_data(); 

    });
    
    
}

