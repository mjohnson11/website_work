
//GLOBALS

var empty_things = {'#VALUE!': true, 'nan': true, 'NaN': true, 'NA': true, '': true};

var full_data;
var sum_counts = {};
var timepoint_keys = [];
var envs_dict_big = {1: "YPD", 2: "SC", 3: "48 hr", 4: "37C", 6: "pH 7.3", 5: "pH 3.8", 10: "21C", 7: "Fluconazole", 9: "Glycerol/Ethanol", 8: "Clotrimazole"};
var envs_dict = {1: "YPD", 2: "SC", 3: "48H", 4: "37C", 6: "pH 7.3", 5: "pH 3.8", 10: "21C", 7: "FLC", 9: "Glyc/Eth", 8: "CLM"};
var home_envs = ["1", "2", "5", "6", "4", "10", "7", "9", "8"];
var test_envs = ["1", "2", "5", "6", "4", "3", "10", "7", "9"];

var name_to_num = {"YPD": "1", "SC": "2", "48 hr": "3", "37C": "4", "pH 7.3": "6", "pH 3.8": "5", "21C": "10", "Fluconazole": "7", "Glycerol/Ethanol": "9"};

var png_dict = {"10": "data/21C_alpha_250000.png", "7": "data/FLC4_alpha_250000.png",
                "8": "data/CLM_alpha_250000.png", "9": "data/real_GlyEtOH_alpha_250000.png"}
console.log(test_envs)
var rep_num_dict = {'E': '1', 'F': '2'};
var reps = Object.keys(rep_num_dict);


//Coloring and labeling
var main_point_color = "grey";
var sing_lin_selection_color = "black";
var env_to_num = {"SC (Haploid)": 2, "SC Fluconazole4 (Haploid)": 7, "SC Clotrimazole (Haploid)": 8, "SC Glyc/Eth (Haploid)": 9,
                 "SC pH3.8 (Haploid)": 5, "SC pH7.3 (Haploid)": 6, "YPD (Haploid)": 1, "SC 21C (Haploid)":10, "SC 37C (Haploid)":4};
var home_env_color_dict = {0: main_point_color, 1: "#A98234", 2: "#E29654", 4: "#F23434", 5: "orange", 6: "#52BF04", 7: "#DF0473", 10: "DodgerBlue", 8: "teal", 9: "#7E328E"};
//var home_env_color_dict = {0: main_point_color, 1: "DodgerBlue", 2: "teal", 4: "green", 5: "gold", 6: "orange", 7: "#F264EF", 10: "brown", 8: "#C9A254", 9: "purple"};
//GLOBALS for selection and coloring
var highlighted_home_env = -1; 
var highlighted_lineage = -1;
var highlighted_lin_pointer = -1;

var show_data_button;
var display_raw_data = false;

var home_env_div;

var big_svg_object;
var big_svg_w = 1400;
var big_svg_h = 1000;
var raw_data_svg_object;
var data_svg_h = 250;
var traj_y = 0;
var traj_x = 100;

//JDFE graph stuff
var point_radius = 3;
var JDFE_div;
var JDFE_w = 650;
var JDFE_h = 650;
var JDFE_svg;
var env_on_x_axis;
var env_on_y_axis;
var JDFE_low_lim = 0.8;
var JDFE_high_lim = 1.2;
//GLOBAL JDFE Scales
var JDFExScale = d3.scale.linear()
                .range([50, JDFE_w-50])
                .domain([JDFE_low_lim, JDFE_high_lim]);    
var JDFEyScale = d3.scale.linear()
                .range([30, JDFE_h-70])
                .domain([JDFE_high_lim, JDFE_low_lim]);
var JDFExAxis = d3.svg.axis()
                    .scale(JDFExScale)
                    .outerTickSize(0)
                    .tickValues([0.8, 0.9, 1.1, 1.2])
                    .tickFormat(function(d) {
                        if (d == JDFE_high_lim) {
                            return "> " + String(JDFE_high_lim);
                        } else if (d == JDFE_low_lim) {
                            return "< " + String(JDFE_low_lim);
                        } else {
                            return String(d);
                        }
                    });
var JDFEyAxis = d3.svg.axis()
                    .scale(JDFEyScale)
                    .orient("left")
                    .outerTickSize(0)
                    .tickValues([0.8, 0.9, 1.1, 1.2])
                    .tickFormat(function(d) {
                        if (d == JDFE_high_lim) {
                            return "> " + String(JDFE_high_lim);
                        } else if (d == JDFE_low_lim) {
                            return "< " + String(JDFE_low_lim);
                        } else {
                            return String(d);
                        }
                    });

//Spaghetti graph stuff

var spag_w = 600;
var spag_dx = Math.round( spag_w / test_envs.length );
var spag_h = 300;
var spag_top = 520;
var spag_left = 720;
var spag_low_lim = 0.8;
var spag_high_lim = 1.2;
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
                    .tickValues([0.8, 0.9, 1, 1.1, 1.2])
                    .outerTickSize(5)
                    .tickFormat(function(d) {
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
                                return spag_yScale(1);
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

var lt_left = 800
var lt_top = 130
var lt_w = 450;
var lt_h = 300;
var lt_xScale = d3.scale.linear()
                    .range([lt_left, lt_left+lt_w])
                    .domain([0, 240]);
var lt_yScale = d3.scale.linear()
                    .range([lt_top, lt_top+lt_h])
                    .domain([0, -6]);
var lt_xAxis = d3.svg.axis()
                    .scale(lt_xScale)
                    .tickValues([0, 48, 96, 144, 192, 240])
                    .outerTickSize(5);
var lt_yAxis = d3.svg.axis()
                    .scale(lt_yScale)
                    .orient("left")
                    .ticks(7)
                    .outerTickSize(5);
var lt_lineFunction = d3.svg.line()
                        .x(function(d) { return lt_xScale(d.x); })
                        .y(function(d) { if (d.y <= Math.pow(10, -6)) {
                                            return lt_yScale(-6);
                                            } else {
                                                return lt_yScale(Math.log10(d.y)); 
                                            }})
                        .interpolate("linear");   


//raw_data graph stuff
var small_graph_w = 160;
var small_graph_h = 130;

var activity_to_display = {"-1":"none", "1":"block", "2":"block", "3":"block"};
var activity_to_opacity = {"-1":"0", "1":"0.2", "2":"0.2", "3":"0.8"};
var activity_to_opacity_lt = {"-1":"0", "1":"0", "2":"0", "3":"1"};
var activity_to_stroke_width = {"-1":"0", "1":"2", "2":"2", "3":"3"};


//FUNCTION FOR BRING TO FRONT
//http://bl.ocks.org/eesur/4e0a69d57d3bfc8a82c2
// https://github.com/wbkd/d3-extended
d3.selection.prototype.moveToFront = function() {  
  return this.each(function(){
    this.parentNode.appendChild(this);
  });
};

function change_x_axis() {
    console.log("Changing x axis to: " + document.getElementById("select_x").value);
    env_on_x_axis = document.getElementById("select_x").value;
    big_svg_object.selectAll(".jdfe_point")
        .transition()
        .duration(3000)
        .attr("cx", function(d) { 
            var x_key = name_to_num[env_on_x_axis] + ' s';
            if (d[x_key] in empty_things) { 
                d3.select(this).attr("display", "none");
                return JDFExScale(1); 
            } else {
                d3.select(this).attr("display", "block");
                var s = 1+parseFloat(d[x_key]);
                //move extreme values to the edges
                if (s > JDFE_high_lim) {
                    s = JDFE_high_lim;
                } else if (s < JDFE_low_lim) {
                    s = JDFE_low_lim;
                }
                return JDFExScale(s); 
            } 
        });
}

function change_y_axis() {
    console.log("Changing y axis to: " + document.getElementById("select_y").value);
    env_on_y_axis = document.getElementById("select_y").value;
    big_svg_object.selectAll(".jdfe_point")
        .transition()
        .duration(3000)
        .attr("cy", function(d) { 
            var y_key = name_to_num[env_on_y_axis] + ' s';
            if (d[y_key] in empty_things) { 
                d3.select(this).attr("display", "none");
                return JDFEyScale(1); 
            } else {
                d3.select(this).attr("display", "block");
                var s = 1+parseFloat(d[y_key]);
                //move extreme values to the edges
                if (s > JDFE_high_lim) {
                    s = JDFE_high_lim;
                } else if (s < JDFE_low_lim) {
                    s = JDFE_low_lim;
                }
                return JDFEyScale(s); 
            } 
        });
}

function plot_raw_datas(elements_to_select) {  
    
    var traj_xScales = []
    var traj_yScales = []
    var traj_xAxes = []
    var traj_yAxes = []
    
    for (var r=1; r<3; r++){
        raw_data_svg_object
            .append("text")
            .attr("x", 50)
            .attr("y", r*100-40)
            .attr("text-anchor", "middle")
            .attr("font-family", "serif")
            .attr("font-size", 16)
            .html("Replicate " + String(r));
    }
    
    for (var j=0; j<2; j++) {
        var ystart = traj_y + j*100;
        for (var i=0; i<test_envs.length; i++) {
            var xstart = traj_x + i*140;
            traj_xScales.push( d3.scale.linear()
                .range([xstart+40, xstart+small_graph_w-20])
                .domain([8, 40]) );
            traj_yScales.push( d3.scale.linear()
                .range([ystart+20, ystart+small_graph_h-40])
                .domain([0, -6]) );
            traj_xAxes.push( d3.svg.axis()
                .scale(traj_xScales[j*test_envs.length+i])
                .tickValues([8,16,24,40])
                .outerTickSize(5) );
            traj_yAxes.push( d3.svg.axis()
                .scale(traj_yScales[j*test_envs.length+i])
                .orient("left")
                .ticks(6)
                .outerTickSize(5) );
            tmp_traj_lineFunction = d3.svg.line()
                .x(function(d) { return traj_xScales[j*test_envs.length+i](d.x); })
                .y(function(d) { if (d.y <= Math.pow(10, -6)) {
                                    return traj_yScales[j*test_envs.length+i](-6);
                                    } else {
                                        return traj_yScales[j*test_envs.length+i](Math.log10(d.y)); 
                                    }})
                .interpolate("linear") ;
            if (i == 0) {
                var yAxis_svg = raw_data_svg_object.append("g")
                    .attr("class", "axis")
                    .call(traj_yAxes[j*test_envs.length+i])
                    .attr("transform", "translate(" + traj_xScales[j*test_envs.length+i](4) + ", 0)"); 
            }
            
            
            var timeseries_env = test_envs[i]
            var timeseries_rep = reps[j]
            var timeseries_key = timeseries_env + '_' + timeseries_rep;
            raw_data_svg_object
                .append("text")
                .attr("x", xstart+90)
                .attr("y", 12)
                .attr("text-anchor", "middle")
                .attr("font-family", "serif")
                .attr("font-size", 15)
                .html(envs_dict_big[timeseries_env]);
            
            
            //get the four timepoint keys for this timeseries
            var use_timepoint_keys = [];
            for (var t=0; t<timepoint_keys.length; t++) {
                if (timepoint_keys[t].slice(0, timepoint_keys[t].length-2) == timeseries_key) {
                    use_timepoint_keys.push(timepoint_keys[t]);
                }
            }
            if (use_timepoint_keys.length != 4) {
                console.log("Wrong number of timepoints found for timecourse: " + timeseries_key);
                console.log(use_timepoint_keys);
            }
            if (timeseries_key != '7_E') {
                raw_data_svg_object.selectAll(elements_to_select)
                    .append("path")
                        .attr("class", "raw_data_path")
                        .attr("stroke-width", "2")
                        .style("mix-blend-mode", "normal")
                        .attr("d", function(d) { 
                            var line_data = [];
                            //console.log(d);
                            for (var i=0; i<4; i++) {
                                var xval;
                                if (i == 3) {
                                    xval = 40;
                                } else {
                                    xval = (i+1)*8
                                }
                                line_data.push({'x': xval, 'y': parseInt(d[use_timepoint_keys[i]])/sum_counts[use_timepoint_keys[i]]});
                            }
                            //console.log(line_data);
                            return tmp_traj_lineFunction(line_data);
                        });                
            }

        }
    }
}


//MAKE TRAJ GRAPH
function make_big_svg() { 
    //CONSTRUCTING
    
    big_svg_object.selectAll(".data_group_interact")
        .data(full_data)
        .enter()
        .append("g")
            .attr("class", "data_group_interact")
            .attr("base_stroke", function(d) { return home_env_color_dict[d["Coloring_env_key"]]; })
            .attr("stroke", function() { return d3.select(this).attr("base_stroke"); })
            .attr("stroke-width", "2")
            .attr("opacity", "0.3")
            .attr("activity", "1")
            .on("mouseover", function(d) {
                d3.select(this).attr("opacity", "0.8");
                d3.select(this).attr("stroke", sing_lin_selection_color);
                d3.select(this).attr("stroke-width", "3");
                d3.select(this).selectAll(".jdfe_point").attr("fill", sing_lin_selection_color);
                d3.select(this).selectAll(".lt_path") 
                    .attr("opacity", "1");
                show_hover_lineage(d);
            })
            .on("mouseout", function(d) {
                if (d3.select(this).attr("activity") != "3") {
                    d3.select(this).attr("opacity", "0.2");
                    d3.select(this).attr("stroke", function() { return d3.select(this).attr("base_stroke"); });
                    d3.select(this).attr("stroke-width", "2");
                    d3.select(this).selectAll(".jdfe_point").attr("fill", function () { return      
                        d3.select(this.parentNode).attr("base_stroke"); 
                    });
                    d3.select(this).selectAll(".lt_path") 
                        .attr("opacity", "0");
                }
                show_hover_lineage(highlighted_lin_pointer);
            })
            .on("click", function(d) {
                highlight_lineage(d);
            })
            .append("path")
                .attr("fill", "none")
                .style("mix-blend-mode", "normal")
                .attr("d", function(d) { 
                    var line_data = [];
                    for (var i=0; i<test_envs.length; i++) {
                        var xval = i;
                        line_data.push({'x': xval, 'y': 1 + parseFloat(d[String(test_envs[i]) + ' s']) });
                    }
                    return spag_lineFunction(line_data);
                });
        
    var yAxis_svg = big_svg_object.append("g")
        .attr("class", "axis")
        .call(spag_yAxis)
        .attr("transform", "translate(" + spag_xScale(0) + ", 0)");
    /*
    big_svg_object.selectAll(".spag_label_text")
    .data(test_envs)
    .enter()
    .append("text")
        .text(function(d) { return envs_dict[d]; })
        .attr("text-anchor", "middle")  
        .attr("transform", function(d, i) { return "translate("+ spag_xScale(i) +","+(spag_yScale(-0.2)+10)+")"; }); 
    */
    big_svg_object.append("text")
        .text("Fitness")
        .attr("text-anchor", "middle") 
        .attr("font-size", 14)
        .attr("transform", "translate("+ (spag_left) +","+ (spag_top + spag_h/2 - 7) +")");
    
    big_svg_object.append("text")
        .text("Fitness in Each Environment in the Bulk Fitness Assay")
        .attr("text-anchor", "middle")  
        .attr("transform", "translate("+ spag_xScale((test_envs.length-1)/2) +","+ (spag_yScale(spag_low_lim)+20) +")");
    
    
    //lineage tracking paths
    big_svg_object.selectAll(".data_group_interact")
        .append("path")
            .attr("class", "lt_path lt_thing")
            .attr("fill", "none")
            .style("mix-blend-mode", "normal")
            .attr("stroke-width", "3px")
            .attr("opacity", "0")
            .attr("d", function(d) {
                if (d['Lineage.Tracking'] == 'None') {
                    return '';
                } else {
                    var line_data = []
                    for (var i=0; i<31; i++) {
                        if (d['T' + String(i*8)] != 'NA') {
                            console.log()
                            line_data.push({'x': i*8, 'y': parseFloat(d['T' + String(i*8)])});
                        }
                    }
                    return lt_lineFunction(line_data);
                }
                
            });
    
    var yAxis_lt = big_svg_object.append("g")
        .attr("class", "axis lt_thing")
        .call(lt_yAxis)
        .attr("transform", "translate(" + lt_xScale(0) + ", 0)");
    var xAxis_lt = big_svg_object.append("g")
        .attr("class", "axis lt_thing")
        .call(lt_xAxis)
        .attr("transform", "translate(0," + lt_yScale(-6) + ")");

    big_svg_object.append("text")
        .attr("class", "lt_thing")
        .text("Generation")
        .attr("text-anchor", "middle")  
        .attr("transform", "translate(" + lt_xScale(120) + "," + lt_yScale(-6.8) + ")");
    
    big_svg_object.append("text")
        .attr("class", "lt_thing")
        .text("Log10(Frequency)")
        .attr("text-anchor", "middle")  
        .attr("transform", "translate(" + lt_xScale(-8) + "," + (lt_top - 10) + ")"); 
    
    //jdfe points
    big_svg_object.selectAll(".data_group_interact")
        .append("circle")
            .attr("class", "jdfe_point")
            //.style("mix-blend-mode", "multiply")
            .attr("r", point_radius)
            .attr("fill", function() { return d3.select(this.parentNode).attr("base_stroke"); })
            .attr("cx", function(d) { 
                var x_key = name_to_num[env_on_x_axis] + ' s';
                if (d[x_key] in empty_things) {
                    d3.select(this).attr("display", "none");
                    return JDFExScale(1); 
                } else {
                    d3.select(this).attr("display", "block");
                    var s = 1+parseFloat(d[x_key]);
                    //move extreme values to the edges
                    if (s > JDFE_high_lim) {
                        s = JDFE_high_lim;
                    } else if (s < JDFE_low_lim) {
                        s = JDFE_low_lim;
                    }
                    return JDFExScale(s); 
                } 
            })
            .attr("cy", function(d) { 
                var y_key = name_to_num[env_on_y_axis] + ' s';
                if (d[y_key] in empty_things) {
                    d3.select(this).attr("display", "none");
                    return JDFEyScale(1); 
                } else {
                    d3.select(this).attr("display", "block");
                    var s = 1+parseFloat(d[y_key]);
                    //move extreme values to the edges
                    if (s > JDFE_high_lim) {
                        s = JDFE_high_lim;
                    } else if (s < JDFE_low_lim) {
                        s = JDFE_low_lim;
                    }
                    return JDFEyScale(s); 
                } 
            });
    
    var JDFExAxis_svg = big_svg_object.append("g")
                        .attr("class", "axis")
                        .call(JDFExAxis)
                        .attr("transform", "translate(0," + JDFEyScale(1) + ")");
    var JDFEyAxis_svg = big_svg_object.append("g")
                        .attr("class", "axis")
                        .call(JDFEyAxis)
                        .attr("transform", "translate(" + JDFExScale(1) + ", 0)");

    
    raw_data_svg_object.selectAll(".traj_data_group_interact")
        .data(full_data)
        .enter()
        .append("g")
            .attr("class", "traj_data_group_interact")
            .attr("base_stroke", main_point_color)            
            .attr("stroke", function() { return d3.select(this).attr("base_stroke"); })
            .attr("fill", "none")
            .attr("stroke-width", "2")
            .attr("opacity", "0.1")
            .attr("activity", "1")
            .on("mouseover", function(d) {
                d3.select(this).attr("opacity", "0.7");
                d3.select(this).attr("stroke-width", "3")
                d3.select(this).attr("stroke", sing_lin_selection_color)
                show_hover_lineage(d);
            })
            .on("mouseout", function(d) {
                if (d3.select(this).attr("activity") != "3") {
                    d3.select(this).attr("opacity", "0.1");
                    d3.select(this).attr("stroke-width", "2")
                    d3.select(this).attr("stroke", function() { return d3.select(this).attr("base_stroke"); })
                }
                show_hover_lineage(highlighted_lin_pointer);
            })
            .on("click", function(d) {
                highlight_lineage(d);
            });

    //plot_raw_datas(".traj_data_group");
    plot_raw_datas(".traj_data_group_interact");
    
}

//LINEAGE INFO DISPLAY STUFF
function lin_info(lin) {
    d3.select("#lin_id").html(lin["Index"]);
    d3.select("#lin_env").html(lin["Environment"]);
    d3.select("#lin_env").style("color", function() { return home_env_color_dict[lin["Coloring_env_key"]]; });
    d3.select("#lin_bcdiv").html(lin["Diverse.BC"]);
    d3.select("#lin_bcenv").html(lin["Environment.BC"]);
}

function show_hover_lineage(datum) {
    if (datum != -1) {
        d3.select("#lin_info").html(lin_info(datum));   
    }
}

function highlight_lineage(lin, lin_path_index) {
    console.log("Selected lineage:");
    console.log(lin);
    if (highlighted_lineage == lin["Index"]) {
        //clicked twice, reset
        highlighted_lineage = -1;
        highlighted_lin_pointer = -1;
    } else {
        highlighted_lineage = lin["Index"];
        highlighted_lin_pointer = lin;
    }
    console.log(highlighted_lineage);
    color_based_on_selections();
}


function show_hide_raw_data() {
    if (display_raw_data) {
        d3.select("#raw_data_div").style("display", "none");
        show_data_button.html("<h3>Show Raw Data</h3>");
        display_raw_data = false;
    } else {
        d3.select("#raw_data_div").style("display", "block");
        show_data_button.html("<h3>Hide Raw Data</h3>"); 
        display_raw_data = true;
        color_based_on_selections();
    }        
}

function activity_decider(d) {  
    if (d["Coloring_env_key"] == highlighted_home_env) {
        if (d["Index"] == highlighted_lineage) { 
            return "3";
        } else {
           return "2";  
        }
    } else {
        if (highlighted_home_env > -1) {
            return "-1";
        } else {
            if (d["Index"] == highlighted_lineage) { 
                return "3";
            } else {
                return "1";
            }
        }
    } 
}

//MAIN COLORING-DISPLAY FUNCTION
function color_based_on_selections() {
    
    //SET ACTIVITY BASED ON WHETHER IT IS 
    big_svg_object.selectAll(".data_group_interact")
        .attr("activity", function(d) { return activity_decider(d); });
    if (display_raw_data) {
        raw_data_svg_object.selectAll(".traj_data_group_interact")
            .attr("activity", function(d) { return activity_decider(d); }); 
    }
    
    
    big_svg_object.selectAll(".data_group_interact")
        .attr("display", function() { return activity_to_display[d3.select(this).attr("activity")]; })
        .attr("opacity", function() { 
            return activity_to_opacity[d3.select(this).attr("activity")]; 
        })
        .attr("stroke-width", function() { return activity_to_stroke_width[d3.select(this).attr("activity")]; })
        .attr("stroke", function() { 
            if (d3.select(this).attr("activity") == "3") {
                d3.select(this).moveToFront();
                return sing_lin_selection_color;
            } else {
                return d3.select(this).attr("base_stroke");
            }
        });
    
    big_svg_object.selectAll(".lt_path")
        .attr("opacity", function() { 
            return activity_to_opacity_lt[d3.select(this.parentNode).attr("activity")]; 
        });
    
    if (display_raw_data) {
        raw_data_svg_object.selectAll(".traj_data_group_interact")
            .attr("display", function() { return activity_to_display[d3.select(this).attr("activity")]; })
            .attr("opacity", function() { return activity_to_opacity[d3.select(this).attr("activity")]; })
            .attr("stroke-width", function() { return activity_to_stroke_width[d3.select(this).attr("activity")]; })
            .attr("stroke", function() { 
                if (d3.select(this).attr("activity") == "3") {
                    d3.select(this).moveToFront();
                    return sing_lin_selection_color;
                } else {
                    return d3.select(this).attr("base_stroke");
                }
            });
    }
    
    d3.selectAll(".jdfe_point").attr("fill", function () { return d3.select(this.parentNode).attr("stroke"); });
}

//SWITCHES FOR HIGHLIGHTING
function highlight_env(env_str) {
    if (highlighted_home_env == env_str) {
        //clicked twice, reset
        highlighted_home_env = -1;
        home_env_div.selectAll("div")
            .style("border", "1px solid transparent");
        d3.select("#lin_tracking_intro").style("display", "block");
        d3.selectAll(".lt_thing").style("display", "none");
        d3.select("#lin_tracking_title").style("display", "none");
        d3.select("#lin_tracking_NA").style("display", "none");
        d3.select("#lin_tracking_img").style("display", "none");
    } else {
        highlighted_home_env = env_str;
        if (highlighted_home_env in png_dict) {
            d3.select("#lin_tracking_img").attr("src", png_dict[highlighted_home_env]).style("display", "block");
            d3.select("#lin_tracking_intro").style("display", "none");
            d3.selectAll(".lt_thing").style("display", "block");
            d3.select("#lin_tracking_title").style("display", "block");
            d3.select("#lin_tracking_NA").style("display", "none");
        } else {
            d3.select("#lin_tracking_NA").style("display", "block");
            d3.selectAll(".lt_thing").style("display", "none");
            d3.select("#lin_tracking_title").style("display", "none");
            d3.select("#lin_tracking_img").style("display", "none");
            d3.select("#lin_tracking_intro").style("display", "none");
        }
        home_env_div.selectAll("div")
            .style("border", function(d) { 
                if (d == env_str) {
                    return "1px solid black";
                } else {
                    return "1px solid transparent";
                }
            });
    }
    color_based_on_selections();
}
 
function get_coloring_env_key(datum) {
    //adds an int as the "Environment" for each datum according to home env info
    var tmp_env = datum["Environment"];
    if (tmp_env in env_to_num) {
        return env_to_num[tmp_env];
    } else {
        return 0;
    }
}


function load_full_data() {
    data_keys = Object.keys(full_data[0]);
    for (j=0; j<data_keys.length; j++) {
        if ((data_keys[j].indexOf("E") > 0) || (data_keys[j].indexOf("F") > 0)) {
            sum_counts[data_keys[j]] = 0;
            timepoint_keys.push(data_keys[j]);
        }
    }
    for (i=0; i<full_data.length; i++) {
        for (j=0; j<timepoint_keys.length; j++) {
            full_data[i]["Coloring_env_key"] = get_coloring_env_key(full_data[i]);
            sum_counts[timepoint_keys[j]] += parseInt(full_data[i][timepoint_keys[j]]);
        }
    }
    
    //full_data = full_data.slice(0, 4);

    //make home env buttons
    home_env_div = d3.select("#plt_div").append("div").attr("id", "env_highlight");
    home_env_div.selectAll("div")
        .data(home_envs)
        .enter()
        .append("div")
            .attr("title", function(d) { return envs_dict_big[d];} )
            .attr("class", "general_env_button")
            .attr("id", function(d) { return "single_env" + String(d);} )
            .on("click", function(d) { highlight_env(d); })
            .style("background-color", function(d) { 
                return home_env_color_dict[d]; 
            })
            .style("left", function(d, i) { return String(i*64) + "px"; } )
            .html(function(d) { return envs_dict[d]; });
    
    home_env_div.append("div").attr("id", "env_highlight_title").html("<h3>Show Lineages From Evolution in:</h3>");

    show_data_button = d3.select("#plt_div")
        .append("div")
        .attr("id", "show_data_button")
        .html("<h3>Show Raw Data</h3>")
        .on("click", function() { show_hide_raw_data(); });
    
    big_svg_object = d3.select("#svg_div")
        .append("svg")
            .attr("class", "big_svg")
            .attr("width", big_svg_w)
            .attr("height", big_svg_h);

    raw_data_svg_object = d3.select("#raw_data_div")
        .append("svg")
            .attr("class", "raw_data_svg")
            .attr("width", big_svg_w)
            .attr("height", data_svg_h); 
    
        
    env_on_x_axis = document.getElementById("select_x").value;
    env_on_y_axis = document.getElementById("select_y").value;
    
    make_big_svg();
    
    //hide lt for now
    big_svg_object.selectAll(".lt_thing").style("display", "none");
    d3.select("#lin_tracking_intro")
        .style("left", String(lt_left)+"px")
        .html("<p4>Hover or click on lineages at left to see more info <br /><br />Click an environment below to highlight lineages from that evolution environment and to see lineage tracking data from evolution in that environment (if available)</p4>");
    d3.select("#lin_info_div").style("display", "block");
    d3.select("#select_y").style("display", "block");
    d3.select("#select_x").style("display", "block");
    d3.select("#jdfe_title").style("display", "block");
}

function read_data() {
        
    //read in explain data
    d3.csv("data/Parris_data_plusLT.csv", function(data1) {

        //Hand CSV data off to global var
        full_data = data1;

        //Call some other functions
        load_full_data(); 

    });
    
    
}

