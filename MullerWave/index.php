
<?php
include '../header.html';

//PHP Form validation etc for inputting N and K

$N = 5000; //default N value
$u_ben = 50; //default u value
$s_exp_ben = 0.005; //default
$do_exp_ben = 1; 
$u_del = 0; //default u value
$s_exp_del = -0.005; //default
$do_exp_del = 1; 
$u_neu = 0; //default u value
$show_freqs = 1;

function extra_min_max_check($data, $mn, $mx) {
    if ($data>$mx) {
        $data = $mx;
    }
    if ($data<$mn) {
        $data = $mn;
    }
    return $data;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $N = extra_min_max_check($_POST["N"], 1, 10000000);  
    $u_ben = extra_min_max_check($_POST["u_ben"], 0, 1000000);
    $s_exp_ben = extra_min_max_check($_POST["s_exp_ben"], 0, 2);
    $do_exp_ben = $_POST["do_exp_ben"];
    $u_del = extra_min_max_check($_POST["u_del"], 0, 1000000);
    $s_exp_del = extra_min_max_check($_POST["s_exp_del"], -2, 0);
    $do_exp_del = $_POST["do_exp_del"];
    $u_neu = extra_min_max_check($_POST["u_neu"], 0, 1000000);
    $show_freqs = $_POST["show_freqs"];

}

?>


<html>

<head>
<link rel='stylesheet' href='/css/front_page.css' />
<link rel='stylesheet' href='css/muller_sheet_wave.css' />

<title>Muller Diagram Try</title>

<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<script src="http://cdnjs.cloudflare.com/ajax/libs/jquery-csv/0.71/jquery.csv-0.71.min.js"></script>
<script src="https://www.google.com/jsapi"></script>
<script src="/js/about_trigger.js"></script>
<script src="js/muller_script_WAVE.js"></script>
    
</head>

<body onload="main_func(<?php echo $N ?>, <?php echo $u_ben ?>, <?php echo $s_exp_ben ?>, <?php echo $do_exp_ben ?>, 
                        <?php echo $u_del ?>, <?php echo $s_exp_del ?>, <?php echo $do_exp_del ?>, <?php echo $u_neu ?>, 
                        <?php echo $show_freqs ?>)">
    
<p3 id="home_link_black"><a href="http://www.milosjohnson.com">home</a></p3>
<h1>Muller Diagram Sim</h1>
<div class="line_divider_2"></div>

<div id="about_div">
    <h3 id="about_click" onClick="show_about()">About this simulation...</h3>
    <p2 id="about_text">
        This is a simple evolution simulation of an evolving asexual population.  Plotted below is a muller diagram of the haplotypes in the population, the frequency of individual mutations, and the distribution of fitnesses in the population.  If you pause the simulation, you can look at the genotypes of the individual haplotypes in the population.  You can also save the image of the dynamics.
        <br /><br />
    </p2>
</div>

<p1><u><b>PARAMETERS</b></u></p1><br />
<p3>*** Note that some combinations of parameters will make the simulation very slow ***</p3>
<form id=param_form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
    <div id="q_pop_size"><u>Population Size (1-10000000):</u><input type="number" min="1" max="10000000" name="N" value="<?php echo $N ?>"></div>
    <div id="q_mut_probs"><u>Mutation Probability per individual per generation (*10^-6):</u><br />
    <label>Beneficial:</label><input class="mutation_form" type="number" min="0" max="100000" name="u_ben" value="<?php echo $u_ben ?>"><br />
    <label>Deleterious:</label><input class="mutation_form" type="number" min="0" max="100000" name="u_del" value="<?php echo $u_del ?>"><br />
    <label>Neutral:</label><input class="mutation_form" type="number" min="0" max="100000" name="u_neu" value="<?php echo $u_neu ?>"></div>
    <div id="q_mut_options">
    Expected Beneficial s (positive): <input class="s_exp" type="number" min=0 max=2, step = "any", name="s_exp_ben" value="<?php echo $s_exp_ben ?>">
    <input class="radio_choose_1" type="radio" name="do_exp_ben" value=1 <?php if ($do_exp_ben == 1) echo "checked";?>>Exponentially distributed 
    <input class="radio_choose_2" type="radio" name="do_exp_ben" value=0 <?php if ($do_exp_ben == 0) echo "checked";?>>Fixed<br />
    Expected Deleterious s (negative): <input class="s_exp" type="number" min=-2 max=0, step = "any", name="s_exp_del" value="<?php echo $s_exp_del ?>">
    <input class="radio_choose_1" type="radio" name="do_exp_del" value=1 <?php if ($do_exp_del == 1) echo "checked";?>>Exponentially distributed 
    <input class="radio_choose_2" type="radio" name="do_exp_del" value=0 <?php if ($do_exp_del == 0) echo "checked";?>>Fixed<br />
    Show mutation frequencies: <input class="radio_choose_1" type="radio" name="show_freqs" value=1 <?php if ($show_freqs == 1) echo "checked";?>>yes
    <input class="radio_choose_2" type="radio" name="show_freqs" value=0 <?php if ($show_freqs == 0) echo "checked";?>>no</div>
    <div id="q_submit"><input type="submit" name="submit" value="Submit"><br /></div>
</form>

<div id="muller_div">
    <div id="muller_state">
    	<canvas id="muller_pixel_canvas" class="pixel_canvas" width="1000px" height="700px">
    	Canvas is not supported by your browser, sorry
        </canvas>
        <canvas id="full_pixel_canvas" class="pixel_canvas" width="1500px" height="700px">
    	   Canvas is not supported by your browser, sorry
        </canvas>
    </div>
    <div id="wave_div">
        <canvas id="wave_pixel_canvas" class="pixel_canvas" width="310px" height="500px">
        Canvas is not supported by your browser, sorry
        </canvas>
    </div>
    <div id="muller_stats">
        <div id="mul_stat_1">
            <p1 id="use_text"><b></b></p1>
        </div>
        <div id="mul_stat_2">
            <p1 id="use_text2"><b></b></p1>
        </div>
        <div id="mul_stat_3">
            <p1 id="use_text3"><b></b></p1>
        </div>
        <div id="mul_stat_4">
            <p1 id="use_text4"><b></b></p1>
        </div>
    </div>
    <div id="pause_button" onclick="pause_unpause()"><p1>PAUSE</p1></div>
    <div id="dissect_button" onclick="dissect_undissect()"><p1>SHOW LINEAGE INFO</p1></div>
</div>


<div id="dissect_div">
    <div class="dissect_lin" id="title_row">
        <div class="lin_name_zone" id="name_title">Lineage ID</div>
        <div class="lin_percent_zone" id="percent_title">Frequency</div>
        <div class="lin_fitness_zone" id="fitness_title">Fitness</div>
        <div class="lin_history_zone" id="history_title">History / Genotype</div>
    </div>
</div>
    
<div id="some_bottom_space"></div>
    
<p1 id="debug_text"></p1>

</body>
</html>







