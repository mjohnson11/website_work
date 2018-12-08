
<?php
include '../header.html';

//PHP Form validation etc for inputting N and K

$N = 25; //default N value
$K = 2; //default K value

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
   $N = extra_min_max_check($_POST["N"], 1, 100);
   $K = extra_min_max_check($_POST["K"], 0, 12);
}

?>

<html>

<head>
<link rel='stylesheet' href='../css/scapes_stylesheet.css' />

<title>Interactive Exploration of Kaufman's NK Landscape</title>

<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<script src="http://cdnjs.cloudflare.com/ajax/libs/jquery-csv/0.71/jquery.csv-0.71.min.js"></script>
<script src="https://www.google.com/jsapi"></script>
<script src="../js/descrip_change.js"></script>
<script src="../js/NK_main_script.js"></script>
<script src="../js/SliderChange.js"></script>

</head>

<body onload="main_func(<?php echo $N ?>, <?php echo $K ?>)">

<div id="content_container">

<div id="top_descrip">
<h1 id="paper_title">Kauffman's NK Model</h1>
<h2 id="paper_author">Choose the number of genes (N) and number of interactions per gene (K)...</h2>
<p1>Stuart Kauffman's NK model let's us explore correlated, tunably-rugged fitness landscapes. Roughly, N is the number of genes, and K is the number of other genes that each gene interacts with. If you'd like to learn more about it you can read here: <a href="http://en.wikipedia.org/wiki/NK_model" target="blank">http://en.wikipedia.org/wiki/NK_model</a></p1>
</div>
<form id=param_form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
    N (1-100): <input type="number" min="1" max="100" name="N" value="<?php echo $N ?>"><br>
    K (0-12): <input type="number" min="0" max="12" name="K" value="<?php echo $K ?>"><br><br>
    <input type="submit" name="submit" value="Submit"><br>
</form>

<div id="full_diagram">
  
  <div id="state_div">
    <img id="qb1" class="ques_button" onclick="ChangeDescrip('description_1')" src="../images/img_trans.png"/>
    <h3 id="state_title">State of 100 binary traits</h3>
    <div id="state">
		<!--THIS IS WHERE THE TRAIT BLOCKS GO - it will be populated with elements by the javascript-->
    </div>
  </div>
  
  <div class="map_div">
    <div class="map_cause">
      <img id="qb2" class="ques_button" onclick="ChangeDescrip('description_2')" src="../images/img_trans.png"/>
      <img id="exp_arrow" class="arrow"; src="../images/arrow_black.png"/>
    </div>
    <div class="map_result">
      <p1 id="pheno_title">Fitness Score</p1>
      <hr />
      <p2 id="pheno_value"></p2>
    </div>
  </div>
    
  <div id="NK_chart_div">
  </div>
    
</div>

<div id=border_show_div>

    <div id=border_show_button onclick="try_everything_toggle()">
        <p1>SHOW ACCEPTABLE MUTATIONS</p1>
    </div>

</div>

<div id=bottom_div>
	
  <div id=descrip_div>  
    <!-- Below are the extra information parts - additional info on the experiment, assumptions, etc.
    plus some useful links -->
    <div id="default_description" class="description">
      <h4>About</h4>
      <p4>The NK model does an excellent job at exhibiting how <b>interactions</b> affect dynamics on adaptive landscapes. The more interactions that take place in a system, the more "rugged" the landscape is in regards to fitness - with more interactions you get more sub-optimal peaks. In this extremely simplified model, we can tune this ruggedness, by changing the number of squares (which could also be called traits, or alleles, or parts) that each square interacts with.  Each square can take on only one of two states (colors), and its fitness contribution depends on its state and the state of its K interactors.  You can change K above and click submit to load up the system (you can also change N, the total number of squares).  Then you can click above to change the color of each square and see how fitness responds, or you can simulate using a simple algorithm to increase fitness on the right.  If you click the button above, the acceptable mutations (beneficial or nearly neutral) are shown with a green border. You can also click on any of the question mark blocks for more information about that part of the model.</p4>
    </div>
    
    <div id="description_1" class="description">
      <h4>The State</h4>
      <p4>The squares above can each have one of two possible states - red or grey.  You can click on them to switch between the two states.  The state of the entire system is defined by the state of each individual square.  In analogy with biology, these squares could be thought of as genes with two different alleles, or as nucleotides in a DNA sequence, but with only two possible bases rather than four.  In this model each of these "genes" interacts with K other genes, chosen at random from all of the squares.  <b>The spatial layout of the squares above has no meaning within the model - it's just the easiest way to arrange a bunch of squares!</b>  (I know it looks like some spatial model or a <a href="http://en.wikipedia.org/wiki/Cellular_automaton" target="blank">cellular automaton</a> - which are very cool things, but different from this).  The number of possible states is 2 raised to the power of the number of squares - this number grows very large as the number of squares goes up - for example for a set of 25 squares, there are over 30 million possible states.</p4>
    </div>
    
    <div id="description_2" class="description">
      <h4>The Fitness Mapping</h4>
      <p4>The fitness mapping, or fitness function, describes how we assign fitness values to each of the possible states for the grid of squares.  For this model, we assign to each of the N squares K other squares as interactors.  Now we assign a random fitness contribution (between 0.0 and 1.0) to each of the possible combinations of the state (color) of the square in question and the state of its K interactors.  The total fitness score is the average of all of these contributions.   If K=0 each square has only two possible fitness contributions, one for red and one for grey.  In the landscape metaphor, where fitness is the analog of elevation, we call this a <a href="http://en.wikipedia.org/wiki/Mount_Fuji" target="blank">Mt. Fuji</a> landscape, with one towering smooth peak.  If K=1 each square has 4 possible fitness contributions, assigned randomly, based on its state and the state of the other square that affects it.  This landscape is more rugged than the K=0 case.  In general, each square will have 2^(K+1) possible fitness contributions, since that is the number of possible states for the square and its K interactors.  If K=N-1, every click changes the contribution of every other square (they all interact), so we a completely random, extremely rugged landscape.  In between, we can produce landscapes that are correlated but rugged.  The reason behind this tunable-ruggedness is that changes in one gene have different effects depending on the alleles of other genes.  This is precisely how we think of epistasis in genetics, and it is certainly a reality of life and of other complex systems.</p4>
    </div>
    
    <div id="description_4" class="description">
      <h4>Simulating Change</h4>
      <p4>This simulation runs a very simple algorithm.  Here it is:<br><br>1) Randomly choose a trait to change<br>2) If the new state results in a higher fitness, keep the change<br>OR if the new state results in a fitness within the "nearly neutral" range and the box is checked, keep the change<br>3) If not, reject the change and revert to the old state (this still counts as a "step" on the graph)<br><br>This is clearly not an accurate representation of how biological evolution occurs, but it does capture some of the dynamics of how change can happen in systems with many interacting parts.  So how accurate is this algorithm?  What would be a proper way of simulating evolution or mathematically describing how a population or species changes over time?  I'm working on a page going into these questions in more detail, thinking about <a href="http://plato.stanford.edu/entries/population-genetics" target="blank">population genetics</a> and describing evolutionary change from the bottom-up or top-down.  I will link to that here when I finish it</p4>
    </div>
  </div>
  
  <div id=sim_div>
    <h4>Simulate Change</h4>
    <hr />
    <img id="qb4" class="ques_button" onclick="ChangeDescrip('description_4')" src="../images/img_trans.png"/>
    <form id=sim_form>
        Accept (Nearly) Neutral Mutations? <input type="checkbox" name="neutral_check" value="neutral"><br>
        Range to Consider Nearly Nuetral: <br><input id="tol_text" type="range" min=0.0 max=0.1 step="0.0001" name="tolerance" value=0.0 onchange="SliderUpdate(value, 'tolerance_show')">
        <output for="tol_text" id="tolerance_show"></output><br>
    </form>
    <hr />
    <div id="sim_buttons">
        <div id="update_button" onClick="update_sim()">
            <p4>Update<br>options</p4>
        </div>
        <div id="sim_button" onClick="start_simulating()">
            <p1>GO</p1>
        </div>
        <div id="stop_button" onClick="stop_simulating()">
            <p1>STOP</p1>
        </div>
    </div>
    <hr />
    <p5>The simulation will stop automatically every 800 steps</p5>
    <hr />
    <div id="new_run_button" onClick="new_same_run()">
        <p1>NEW RUN</p1>
    </div>
    <div id="reset_button" onClick="reset()">
        <p1>RESET</p1>
    </div>
  </div>
    
</div>

</div>

</body>
</html>

<?php
include '../footer.html';
?>








