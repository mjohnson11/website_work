<?php
include '../header.html';
?>

<html>

<title>Interactive Exploration of a Combinatorically Complete Emprirical Fitness Landscape</title>

<head>
<link rel='stylesheet' href='../css/scapes_stylesheet.css' />

<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<script src="http://cdnjs.cloudflare.com/ajax/libs/jquery-csv/0.71/jquery.csv-0.71.min.js"></script>
<script src="https://www.google.com/jsapi"></script>
<script src="../js/descrip_change.js"></script>
<script src="../js/Weinreich_main_script.js"></script>
<script src="../js/SliderChange.js"></script>

</head>

<body onload="loaddata()">

<div id="content_container">

<h1 id="paper_title">Darwinian Evolution Can Follow Only Very Few Mutational Paths to Fitter Proteins</h1>
<h2 id="paper_author">Weinreich et al. 2006</h2>

<div id="top_descrip">
    <p4>In this 2006 paper, Daniel Weinreich, Nigel Delaney, Mark DePristo, and Daniel Hartl describe how they were able to explicitly construct the genotype-phenotype map for a specific adaptation.  The adaptation in question was resistance to a beta-lactam antibiotic called cefotaxime in E. coli.  The researchers knew from previous studies that five mutations in a beta-lactamase gene (four missense mutations and one in a noncoding region) could increase the resistance of the wild type beta-lactamase gene by a factor of about 100,000.  This was an interesting case because the researchers knew that these five mutations had occurred and together conferred improved resistance (<a onClick="ChangeDescrip('description_3')">which is assumed to correlate with fitness</a>), but they didn't know what order the mutations happened in, or what the resistance of the intermediate steps were.  To put it in the context of the adaptive landscape, had the changes been made along one smooth ridge?  Or was it necessary to cross a fitness (antibiotic resistance) valley to reach the high fitness state?  Were there many paths along ridges or only a few that didn't require crossing a valley?  By constructing all 32 possible combinations of states, the researchers were able to explicitly answer these questions.  Here, you can "walk around" this 5 dimensional space by clicking below to flip mutations back and forth.  Read the paper <a href="http://classes.soe.ucsc.edu/bme207/Fall09/Lecture%2013/Science%202006%20Weinreich.pdf" target="blank">here</a></p4>
</div>

<div id="full_diagram">

  <div id="state_div">
    <img id="qb1" class="ques_button" onclick="ChangeDescrip('description_1')" src="../images/img_trans.png"/>
 	<div id="state_title_div">
        <h3 id="state_title">State of 5 important mutations in a &#946-lactamase allele</h3>
    </div>
    <!--THESE ARE THE TRAIT BLOCKS-->
    <div id="state">
    	<div id="t1" class="trait">
      	<div class="state0"><p3>g</p3></div>
		<div class="site"><p3>4205</p3></div>
        <div class="state1"><p3>a</p3></div>
      </div>
      <div id="t2" class="trait">
      	<div class="state0"><p3>A</p3></div>
		<div class="site"><p3>42</p3></div>
        <div class="state1"><p3>G</p3></div>
      </div>
      <div id="t3" class="trait">
      	<div class="state0"><p3>E</p3></div>
		<div class="site"><p3>104</p3></div>
        <div class="state1"><p3>K</p3></div>
      </div>
      <div id="t4" class="trait">
      	<div class="state0"><p3>M</p3></div>
		<div class="site"><p3>182</p3></div>
        <div class="state1"><p3>T</p3></div>
      </div>
    	<div id="t5" class="trait">
      	<div class="state0"><p3>G</p3></div>
		<div class="site"><p3>238</p3></div>
        <div class="state1"><p3>S</p3></div>
      </div>
    </div>
    <h3 id="current_state"></h3>
  </div>
  
  <div class="map_div">
    <div id="pheno_cause" class="cause">
      <img id="qb2" class="ques_button" onclick="ChangeDescrip('description_2')" src="../images/img_trans.png"/>
      <img id="exp_arrow" class="arrow" src="../images/arrow_black.png"/>
    </div>
    <div id="pheno_result" class="result">
      <p1 id="pheno_title">Antibiotic Resistance</p1>
      <hr />
      <p2 id="pheno_value"></p2>
    </div>
    
    <div id="fitness_cause" class="cause">
      <img id="qb3" class="ques_button" onclick="ChangeDescrip('description_3_long')" src="../images/img_trans.png"/>
      <img id="fit_arrow" class="arrow" src="../images/arrow_grey.png"/>
    </div>
    <div id="fitness_result" class="result">
      <p1 id="fitness_title">Fitness Rank</p1>
      <hr />
      <p2 id="fitness_value"></p2>
    </div>
  </div>
  
	<div id="chart_div">
  </div>

</div>


<!-- Below are the extra information parts - additional info on the experiment, assumptions, etc.
plus some useful links -->

<div id=bottom_div>
	
  <div id=descrip_div>   
    <div id="default_description" class="description">
      <h4>Explore the data!</h4>
      <hr />
      <p4>You can click on the blocks above to "mutate" the &#946-lactamase gene and see the resulting changes in antibiotic resistance and fitness rank.  <br><br>To the right, you can set options for a simulation in which mutations happen automatically and are kept or reversed based on simple rules, which you can alter using the options.  <br><br>Click on any of the question mark blocks for more information about specific parts of the experiment, assumptions made, and general thoughts about causality in evolution.</p4>
    </div>
    
    <div id="description_1" class="description">
      <h4>The State of &#946-Lactamase</h4>
      <hr />
      <p4>At the core of most of the antibiotics your doctor might give for an infection is a little structure of atoms called a &#946-lactam ring.  When these antibiotics find the infection, they attack the bacterial cells, likely by preventing them from making new cell walls.  But the bacteria fight back.  They have enzymes called &#946-lactamases, which can run into the antibiotics and break apart that &#946-lactam ring, destroying the molecule. What results is an arms race between molecules - some &#946-lactamases are effective against some &#946-lactam antibiotics, but in other cases the antibiotics may have the upper hand.  In this study, the researchers looked at a change in &#946-lactamase in E. coli that conferred a 100,000-fold increase in antibiotic resistance to a particular &#946-lactam, cefotaxime. This change, which has been observed in previous studies, consists of four amino acid changes in the &#946-lactamase enzyme (missense mutations) and one noncoding mutation in the DNA near the protein-coding region.  By clicking the buttons above you can flip these five mutations back and forth, exploring a small part of the "sequence space" for the &#946-lactamase gene in E. coli.</p4>
    </div>
    
    <div id="description_2" class="description">
      <h4>The Experiment (Genotype -> Phenotype)</h4>
      <hr />
      <p4>The researchers used "site-directed mutagenesis" in order to make versions of beta-lactamase with each of the 32 possible combinations of the 5 mutations.  By making these changes directly, they could be sure that the differences in antibiotic resistance were due solely to these changes.  These constructed proteins were tested for "minimum inhibitory concentration," the lowest cefotaxime concentration that blocked any visual signs of E. coli growth.  The numbers you see above are the log base<math><msqrt><mi>2</mi></msqrt></math> of the minimum inhibitory concentration, reflecting that the cefotaxime stocks were made by <math><msqrt><mi>2</mi></msqrt></math>-fold dilution.   What this data results in is a "combinatorically complete" mapping from the genotype (the state of the 5 mutations) and the phenotype (cefotaxime resistance).  If you'd like to know more about the methods, check out the supplementary material found <a href="http://www.sciencemag.org/content/312/5770/111.short" target="blank">here</a></p4>
    </div>
    
      <div id="description_3_long" class="description">
      <h4>The Assumption (Phenotype -> Fitness)</h4>
      <hr />
      <p4>The authors make an assumption that an increase in the measured antibiotic resistance will lead to an increase in fitness.  Most would agree this is a fair assumption, but it is important to point out the logical steps and critically inspect them for flaws.  For example, if the beta-lactamase gene had a second role in the bacterium other than antibiotic resistance, these mutations might cause conflicting fitness effects to those resulting directly from differences in antibiotic resistance.  I like to call this a reach-around error, because it could be represented by an additional arrow coming from the state, at left, around the antibiotic box, and directly to fitness.  In this case, the assumption seems to be well-supported by our knowledge of beta-lactamase and antibiotic resistance, coupled with the fact that this 5-mutation type has evolved several times in the lab.  But if, for example, this were an experiment on an animal in which 5 mutations caused an increase in running speed, we might 1) question whether higher running speed actually leads to higher fitness, and 2) question whether the mutations affecting running speed affected other traits which affect fitness (reach-around error).
<br><br>Another important note is that the relation between the phenotype and fitness will depend on the environment.  In this case, the laboratory environment is one in which cefotaxime is always present and other antibiotics are not.  This is not necessarily a realistic environment, and the authors note in the supplementary material that changes that increase resistance to cefotaxime can reduce resistance to other beta-lactam antibiotics.  But since the conclusions of this study are about general dynamics in protein evolution, the fact that the environment is somewhat artificial is acceptable.  In other words, while the specific results may be different if a different antibiotic was used, we would expect the general result - that interactions between mutations (epistasis) limits the number of "selectively accessible" paths to fitter proteins - to stay the same.</p4>
    </div>
    <div id="description_4" class="description">
      <h4>Simulating Change</h4>
      <hr />
      <p4>This simulation runs a very simple algorithm.  Here it is:<br><br>1) Randomly choose a trait to change<br>2) If the new state results in a higher fitness, keep the change<br>OR if the new state results in a fitness within the "nearly neutral" range and the box is checked, keep the change<br>3) If not, reject the change and revert to the old state (this still counts as a "step" on the graph)<br><br>This is clearly not an accurate representation of how biological evolution occurs, but it does capture some of the dynamics of how change can happen in systems with many interacting parts.  So how accurate is this algorithm?  What would be a proper way of simulating evolution or mathematically describing how a population or species changes over time?  I'm working on a page going into these questions in more detail, thinking about <a href="http://plato.stanford.edu/entries/population-genetics" target="blank">population genetics</a> and describing evolutionary change from the bottom-up or top-down.  I will link to that here when I finish it.</p4>
    </div>
  </div>
  
  <div id=sim_div>
    <h4>Simulate Change</h4>
    <hr />
    <img id="qb4" class="ques_button" onclick="ChangeDescrip('description_4')" src="../images/img_trans.png"/>
    <form id=sim_form>
        Accept (Nearly) Neutral Mutations? <input type="checkbox" name="neutral_check" value="neutral"><br>
        Range to Consider Nearly Nuetral: <br><input id="tol_text" type="range" min=0.0 max=24 step="1" name="tolerance" value=0.0 onchange="SliderUpdate(value, 'tolerance_show')">
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
    <div id="new_run_button" onClick="new_run()">
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









