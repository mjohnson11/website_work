//Muller diagram sim


var wid=1000;
var high=450;

var back_color = [34,125,255, 255];

//global variables
var mut_counter = 0;
var time = 0;

var n;
var u_ben;
var fit_expect_ben;
var do_exp_ben;
var u_del;
var fit_expect_del;
var do_exp_del;
var u_neu;
var mut_prob = u_neu + u_ben + u_del;
var rel_u_ben = u_ben / mut_prob;
var rel_u_del = u_del / mut_prob;
var lin_list;

function Lineage (num, freq, fit, record, color, id_tag) {
    this.num = num;
    this.freq = freq;
    this.fit = fit;
    this.record = record;
    this.color = color;
    this.id_tag = id_tag;
}

function combine_lins(lin1, lin2) {
    if ((lin1.color != lin2.color) || (lin1.fit != lin2.fit)) {
        alert("Uh Oh, different lineages in lineage merge...")
        alert(lin1.record[0]);
        alert(lin2.record[0]);
    }
    return new Lineage(lin1.num+lin2.num, lin1.freq+lin2.freq, lin1.fit, copy_history(lin1.record), lin1.color, lin1.id_tag);
}

function copy_history(hist) {
    var new_hist = [];
    for (var i=0; i<hist.length; i++) {
        if (hist[i].length > 1) {
            new_hist.push(hist[i].slice());
        } else {
            new_hist.push(hist[i]);
        }
    }
    return new_hist;
}

function new_color() {
    return [Math.floor(Math.random()*255),Math.floor(Math.random()*255),Math.floor(Math.random()*255), 255];
}

function get_exp_mut_effect(expect) {
    //returns an exponentially distributed random var with expected value expect
    uni = Math.random();
    exp = -1 * Math.log(uni) * expect;
    return exp;
}

function make_column(id, cc, col) {
    //assigns colors to pixels based on freqs
    var col_ind = 0;
    var freq_tot = 0;
    for (var i=0; i<high; i++) {
        while (i+1 > Math.ceil((freq_tot+lin_list[col_ind].freq)*high)) {
            freq_tot += lin_list[col_ind].freq;
            col_ind += 1;
            if (col_ind == lin_list.length) {
                alert("this is whats happening");
            }
        }
        id.data[col*4+i*wid*4+0] = lin_list[col_ind].color[0];
        id.data[col*4+i*wid*4+1] = lin_list[col_ind].color[1];
        id.data[col*4+i*wid*4+2] = lin_list[col_ind].color[2];
        id.data[col*4+i*wid*4+3] = lin_list[col_ind].color[3];
        //cc.putImageData(new_id, col, i);
    }
    //alert(new_id.data.length);
    return id;
}

function tag_not_in_list(tag, list) {
    for (var i=0; i<list.length; i++) {
        if (list[i] == tag) {
            return false;
        }
    }
    return true;
}

function show_stats() {
    //calculating descriptive statistics and displaying them
    var fit_mean=0;
    var mut_mean=0;
    var num_lineages = 0;
    var lin_id_list = [];
    for (var i=0; i<lin_list.length; i++) {
        fit_mean += lin_list[i].fit*lin_list[i].freq;
        mut_mean += (lin_list[i].record.length-1)*lin_list[i].freq;
        if ( tag_not_in_list(lin_list[i].id_tag, lin_id_list) ) {
            lin_id_list.push(lin_list[i].id_tag);
            num_lineages += 1;
        }
    }
    document.getElementById("use_text").innerHTML = "Generation: " + String(time);
    document.getElementById("use_text2").innerHTML = "Mean Fitness: " + String(fit_mean.toFixed(3));
    document.getElementById("use_text3").innerHTML = "Mean # of mutations: " + String(mut_mean.toFixed(2));
    document.getElementById("use_text4").innerHTML = "# of Haplotypes: " + String(num_lineages);
}

function fix_lin(lin, rem, which) {
    if (which == "top") {
        new_num = rem;
    } else {
        new_num = lin.num - rem - 1;
    }
    new_freq = new_num/n;
    
    return new Lineage(new_num, new_freq, lin.fit, lin.record, lin.color, lin.id_tag)
}

function mutation(spot) {
    //what lineage did the mutation occur in?
    var cumulative = 0;
    var on=1;
    for (var i=0; i<lin_list.length; i++) {
        if (on==1) {
            if (spot < (cumulative + lin_list[i].num)) {
                var place = i;
                var remainder = spot - cumulative;
                on=0;
            }
            cumulative += lin_list[i].num;
        }
    }
    //what type of mutation and what fitness effect?
    var type_mut_draw = Math.random();
    if (type_mut_draw < rel_u_ben) {
        //beneficial mutation
        if (do_exp_ben == 1) {
            fit_eff = get_exp_mut_effect(fit_expect_ben); 
        } else {
            fit_eff = fit_expect_ben;
        }
    } else if (type_mut_draw < (rel_u_ben + rel_u_del)) {
        //deleterious mutation
        if (do_exp_del == 1) {
            fit_eff = get_exp_mut_effect(fit_expect_del) ; 
        } else {
            fit_eff = fit_expect_del;
        }
    } else {
        //neutral mutation
        fit_eff = 0;
    }
    new_fit = lin_list[place].fit * Math.exp(fit_eff);
    new_col = new_color();
    mut_counter += 1;
    //slice so it copies a new array
    var new_history = copy_history(lin_list[place].record);
    new_history.push(['Mut' + String(mut_counter), fit_eff, time, new_col]);

    //splitting the lineages based on where the mutation occurred
    //note that if remainder == 0 or == lin_list[place].num-1, one of these freqs will be zero
    //which will just be handled by it going extinct in the next wright fisher step
    new_lineage = new Lineage(1, 1/n, new_fit, new_history, new_col, mut_counter);
    lin_list.splice(place, 1, fix_lin(lin_list[place], remainder, "top"), new_lineage, fix_lin(lin_list[place], remainder, "bot")) 
}

function update_freqs() {
    //every individual has a chance to mutate
    for (var j = 0; j<n; j++) {
        if (Math.random()<mut_prob) {
            mutation(j)
        }
    }
    //weight frequencies by w (fitness)
    var weighted_freq_tot = 0;
    var weighted_freqs=[];
    var cumulative = 0;
    var cumulative_weighted_freqs = [];
    for (var i=0; i<lin_list.length; i++) {
        //alert(new_nums[i]);
        weighted_freqs.push(lin_list[i].freq*lin_list[i].fit);
        //resetting the numbers for the sampling step
        lin_list[i].num = 0;
        weighted_freq_tot += weighted_freqs[i];
    }
    //normalize weighted frequencies and make a cumulative frequency array
    for (var i=0; i<weighted_freqs.length; i++) {
        weighted_freqs[i] = weighted_freqs[i]/weighted_freq_tot;
        cumulative_weighted_freqs[i] = cumulative + weighted_freqs[i];
        cumulative += weighted_freqs[i];
    }
    //choose new generation by wright fisher sampling (with replacement)
    for (var j=0; j<n; j++) {
        var draw = Math.random();
        var on=1;
        for (var i=0; i<weighted_freqs.length; i++) {
            if (on==1){
                if (draw < cumulative_weighted_freqs[i]) {
                    lin_list[i].num += 1;
                    on=0
                }
            }
        }
    }
    //fix arrays for extinct lineages and combine lineages that are adjacent and the same haplotype
    var f_tot = 0;
    var new_lin_list = [];
    var current_tag = -1;
    var current_lineage;
    var ext_count = 0;
    for (var i=0; i<lin_list.length; i++) {
        lin_list[i].freq = lin_list[i].num/n;
        f_tot += lin_list[i].freq;
        if (lin_list[i].num > 0) {
            if (lin_list[i].id_tag == current_tag) {
                current_lineage = combine_lins(current_lineage, lin_list[i]);
            } else {
                if ((i -ext_count) != 0) {
                    new_lin_list.push(current_lineage);
                }
                current_lineage = new Lineage(lin_list[i].num, lin_list[i].freq, lin_list[i].fit, copy_history(lin_list[i].record), lin_list[i].color, lin_list[i].id_tag);
                current_tag = lin_list[i].id_tag;
            }
        } else {
            ext_count += 1;
        }
    }
    new_lin_list.push(current_lineage);
    lin_list = new_lin_list;
    //alert(f_tot);

}

function shift_left(id, cc) {
    //moves image data one column left
    id = cc.getImageData(1, 0, cc.canvas.width, cc.canvas.height);
    return id;
}

function update_sim(id, cc) {
    show_stats();
    update_freqs();
    if (time<wid) {
        //before hitting the end
       id = make_column(id, cc, time); 
    } else {
        //now it's scrolling
        id = shift_left(id, cc);
        id = make_column(id, cc, wid-1);
    }
    cc.putImageData(id,0,0);
    time += 1;
}

function interval(func, wait, id, cc){
    //modified from http://thecodeship.com/web-development/alternative-to-javascript-evil-setinterval/
    var interv = function(w){
        return function(){
            try{
                func.call(this, id, cc);
            }
            catch(e){
                alert("There was an error: " + e.toString());
            }
            setTimeout(interv, w);
        };
    }(wait);

    setTimeout(interv, wait);
}
    
function main_func(n_in, u_ben_in, s_exp_ben_in, do_exp_ben_in, u_del_in, s_exp_del_in, do_exp_del_in, u_neu_in) {
    //setting all these input variables from the html form
    //not sure if this is the proper way to do it, but it works
    n = n_in;
    u_ben = u_ben_in / 1000000;
    fit_expect_ben = s_exp_ben_in;
    do_exp_ben = do_exp_ben_in;
    u_del = u_del_in / 1000000;
    fit_expect_del = s_exp_del_in;
    do_exp_del = do_exp_del_in;
    u_neu = u_neu_in / 1000000;
    
    mut_prob = u_neu + u_ben + u_del;
    rel_u_ben = u_ben / mut_prob;
    rel_u_del = u_del / mut_prob;
    
    //this is the thing
    lin_list = [new Lineage(n, 1, 1, [['Anc', 0, 0, back_color]], back_color, 0)];
    
    var the_canvas = document.getElementById("muller_pixel_canvas");
    if (!the_canvas) {
        alert('no canvas');
    }
    var cc = the_canvas.getContext("2d");

    var width = the_canvas.width;
    var height = the_canvas.height;

    var id = cc.createImageData(width, height);

    //intervalhandle = setInterval(function(){update_sim(id, cc)}, 1000);
    interval(update_sim, 1, id, cc)

}