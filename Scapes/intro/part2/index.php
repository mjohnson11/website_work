<?php
include '../../header.html';
?>

<html>

<head>

<link rel='stylesheet' href='../../css/scapes_stylesheet.css' />

<title>Scapes intro Part 2: The Mapping</title>

<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<script src="//code.jquery.com/jquery-1.10.2.js"></script>
<script src="//code.jquery.com/ui/1.11.2/jquery-ui.js"></script>
<script src="../../js/landscape_intro.js"></script>

</head>

<body>

<div id="main_text">

<br />

<p id="back_link"><a href="../part1">&#171 Back to part 1</a></p>

<h2>Part 2: The Mapping</h2>

<figure>
    <img class="figure" src="../../images/an_odd_machine.png" alt="odd machine" width="254px" height="161px">
</figure>

<h3>An Odd Machine</h3>

<p1>Since writing the last section with the examples of light switches and the whiskey drink, I decided to build a machine.  It's a large black box that has three switches on it, just like in the room, and a spout on one end.  Each time you flip a switch, the machine starts up, grinding and bellowing and rattling loudly.  Then after a moment, a whiskey drink pours out of the spout, where I hold a cup to catch it.  At first the machine only made whiskey neat, but depending on which of the switches was flipped it would spit out a different volume.  My natural instinct was to try all of the combinations, all eight possible states, and record how much whiskey each one produced.  Then I could label the points on the cube representing each of those states with those amounts of whiskey.  Notice that these labels, with amounts of whiskey produced, are also some of the possible states for our simplest 1D whiskey drink.</p1>

<div id="three_switch_mapping">
    <div id="switch_3_for_map">
        <div class="switch"></div>
        <div class="switch"></div>
        <div class="switch"></div>
    </div>
    <div id="switch_3_map" class="map_div">
        <div class="map_cause">
          <img id="exp_arrow" class="arrow"; src="../../images/arrow_black.png"/>
        </div>
        <div class="map_result">
          <p1 id="pheno_title">Volume of Whiskey</p1>
          <hr />
          <p2 class="map_value">7 ml</p2>
        </div>
    </div>
</div>

<div id="labeled_cube">
    <svg id="discrete_3" class="svg_graph" height="250" width="250">
        <g fill="none" stroke="black" stroke-width="2">
        <path stroke-dasharray="6,2" d="M65 5 L235 5 L235 165 L65 165 L65 5 L5 45" />
        <path stroke-dasharray="6,2" d="M175 45 L175 205 L5 205 L5 45 L175 45 L 235 5" />
        <path stroke-dasharray="6,2" d="M175 205 L235 165" />
        <path stroke-dasharray="6,2" d="M5 205 L65 165" />
        </g>
        Sorry, your browser does not support inline SVG.
    </svg>
    <p id="label_1">7 ml</p1>
    <p id="label_2">23 ml</p1>
    <p id="label_3">35 ml</p1>
    <p id="label_4">3 ml</p1>
    <p id="label_5">90 ml</p1>
    <p id="label_6">2 ml</p1>
    <p id="label_7">28 ml</p1>
    <p id="label_8">85 ml</p1>
</div>

<p1>I finished that experiment, stumbled to bed for a long nap, and then went back to plot what I found.  What I did, abstractly, is looked at each state in my space of possibilities and told you something about it. I <b>mapped</b> <i>from</i> the switch space <i>to</i> the 1D whiskey space.  It isn't important that it is a three-dimensional discrete system mapping to one-dimensional continuous system - we could replace the three switches with a continuous slider and map from that space to the whiskey drink space, and if my machine is capable of spitting out not just whiskey but whiskey mixed with cola, we could map from the space defined by the controls to a 2D whiskey drink space, like so:</p1>

<!--
<div id="three_switch_to_graph">
    <div id="switch_3_map_to_graph">
        <div class="switch"></div>
        <div class="switch"></div>
        <div class="switch"></div>
    </div>
    <div class="map_div">
        <div class="map_cause">
          <img id="exp_arrow" class="arrow"; src="../../images/arrow_black.png"/>
        </div>
        <svg id="mapped_graph" class="svg_graph" height="200" width="250">
            <line x1="0" y1="200" x2="250" y2="200" style="stroke:black;stroke-width:5" />
            <line x1="0" y1="200" x2="0" y2="0" style="stroke:black;stroke-width:5" />
        </svg>
        <
        <div id="mapped_point" class="two_d_point graph_point"></div>
    </div>
</div>
-->

<figure>
    <img class="figure" src="../../images/3discrete_to_2cont.png" alt="3 discrete to 2 continuous mapping" width="360px" height="500px">
</figure>

<p1>A mapping takes every possibility from one space and tells me something about it.  These results, the things I record about each possibility, like the volume of whiskey that is produced, can also be arranged in some sort of space or structure like we talked about in the last section, so that we can talk about mapping <i>from one space to some other space</i>.</p1>

<h3>The Genotype-Phenotype Map</h3>

<p1>You've heard since middle school how amazing it is that the instructions for making you - a living, breathing, thinking animal - are contained within the DNA sequences of your chromosomes.  And boy do I agree!  But not only is it an amazing process, it's also incredibly complex, and large parts of it remain a mystery to science.
<br /><br />
In the framework we've been using here, this mysterious process can be captured in a way by what is called <b>the genotype-phenotype map</b>.  The idea is that if we have a space of possible genotypes we can ask for each possible genotype, what phenotype is produced?  Biologists will often call this process of getting from genotype to phenotype <i>development</i>.  If we're considering the whole system, this is a mapping from a very high dimensional genotype space to a very high dimensional phenotype space.  If, however, we are only interested in a part of the phenotype, <a href="/Scapes/Weinreich/">for example the antibiotic resistance of a certain bacteria</a>, then the mapping could be from a high dimensional subspace of genotype space to a one dimensional subspace of phenotype space.  
<br /><br />
I should note that development is also affected by the organism's environment, so the mapping from genotype space to phenotype space could change if the environment changes - but this is something we will (conveniently) ignore for now.</p1>

<h3>Fitness</h3>

<p1>Fitness is another term you probably heard back in middle school, defined as something like "an organism's ability to survive and reproduce."  In reality it's kind of a slippery concept that's tricky to define, but let's not worry about that today - we'll stick with that definition.  So what I want to know, and what evolutionary biologists want to know, is this: for a particular phenotype or genotype, what is its fitness?  Does that phenotype work better than others, does it allow the organism to leave more offspring than other phenotypes?  These are thrilling questions that require a lot of work to answer.  This is the mapping that the adaptive landscape is most concerned with, either the mapping from genotype space to fitness or from phenotype space to fitness.</p1>

<h3>Adding the Map Dimension</h3>

<p1>Okay, for the last time, think back to middle school.  You might have seen something in math class like this: y = 2x - a simple function.  But at this point we can't stop putting things in spaces of possibility, even if it seems unnecessary.  So what are the possibilities for x?  Well, I'd say it can be any real number.  Let's arrange those possibilities, like the whiskey drink, on a line.  And now the mapping, which in this case is defined by the function: for each possible x-value, I want to know the y-value.  So we can assign each possibility in our space a value according to the mapping like so:</p1>

<div id="one_slider_map">
    <div id="sliders_1_for_map" class="slider_house">
        <p2>Value of X:</p2>
        <div class="cont_slider v1"></div>
        <div class="one_slider_text">0</div>
    </div>
    <div id="sliders_1_map" class="map_div">
        <div class="map_cause">
          <img id="exp_arrow" class="arrow"; src="../../images/arrow_black.png"/>
        </div>
        <div class="map_result">
          <p1 id="pheno_title">Value of Y</p1>
          <hr />
          <p2 class="map_value">0.0</p2>
        </div>
    </div>
</div>

<p1>But that seems like a ridiculous way to represent the mapping, and our seventh-grade selves are practically out of their seats now, hands raised high in the air.  "Yes?"  "Why don't you plot the y-values above and below the line based on their values?  Or just draw a line." 
<br /><br />
Gold stars and jolly ranchers for our past selves!  And so we get this:</p1>

<figure>
    <img class="figure" src="../../images/graph_map.png" alt="graph" width="457px" height="375px">
</figure>

<p1>What we've done is <b>added an extra dimension for the mapping</b>.  We've added the space of possibilities that we're mapping to (in this case y-values from negative infinity to positive infinity) and plotted points or a line in our new space to represent the mapping.  
<br /><br />
Importantly, notice that we are mapping to a one-dimensional space (the space of possibilities for the variable y), so it is easy to add the additional dimension and draw the line. Will it still work if we're mapping to a space with more than one dimension?  I don't see why not, but in most cases, we are concerned with mapping to one-dimensional spaces.  
<br /><br />
Could we map from a two-dimensional space to a one-dimensional space?  Now our high-school selves are quietly writing down in their notebooks (it's not cool to raise your hand anymore) "z = x + y".  You can think of spreading out the possibilities for x and y along two axes and then adding another dimension (axis) for the mapping to z.  The result is a "surface" in three-dimensional space.</p1>  

<div id="two_slider_map">
    <div id="sliders_2_for_map" class="slider_house">
        <p2>Value of X:</p2>
        <div class="cont_slider v1"></div>
        <div id="x_text" class="one_slider_text">0</div>
        <p2>Value of Y:</p2>
        <div class="cont_slider v2"></div>
        <div id="y_text" class="one_slider_text">0</div>
    </div>
    <div id="sliders_2_map" class="map_div">
        <div class="map_cause">
          <img id="exp_arrow" class="arrow"; src="../../images/arrow_black.png"/>
        </div>
        <div class="map_result">
          <p1 id="pheno_title">Value of Z</p1>
          <hr />
          <p2 class="map_value">0.0</p2>
        </div>
    </div>
</div>

<figure style="width:300px">
    <img class="figure" src="../../images/3d_surface.png" alt="3d surface" width="257px" height="259px">
    <figcaption>Part of the surface showing the mapping from x and y to z defined by z=x+y</figcaption>
</figure>

<p1>What about the equation w = x + y + z ?  Can you make a space of possibilities for x, y, and z ?  Can you add in the mapping to w as another dimension?</p1>

<div id="three_slider_map">
    <div id="sliders_3_for_map" class="slider_house">
        <p2>Value of X:</p2>
        <div class="cont_slider v1"></div>
        <div id="x_text" class="one_slider_text">0</div>
        <p2>Value of Y:</p2>
        <div class="cont_slider v2"></div>
        <div id="y_text" class="one_slider_text">0</div>
        <p2>Value of Z:</p2>
        <div class="cont_slider v3"></div>
        <div id="z_text" class="one_slider_text">0</div>
    </div>
    <div id="sliders_3_map" class="map_div">
        <div class="map_cause">
          <img id="exp_arrow" class="arrow"; src="../../images/arrow_black.png"/>
        </div>
        <div class="map_result">
          <p1 id="pheno_title">Value of W</p1>
          <hr />
          <p2 class="map_value">0.0</p2>
        </div>
    </div>
</div>

<figure style="width:300px">
    <img class="figure" src="../../images/4d_nomap.png" alt="3d surface with no mapping" width="257px" height="259px">
    <figcaption>We want to add the map dimension, but we already have a three-dimensional space of possibility, so we can't visualize the result (you could do some kind of heat-map, but then the same issue would arise at 5 dimensions).</figcaption>
</figure>

<p1>Now is a good time to remember our imaginary 2D world, where our 3D space was unimaginable but not incorrect.  High dimensionality is good cause to be cautious about your thinking, but again, there is no need to panic.</p1>

<h3>And Finally: The Landscape</h3>

<p1>We are now at last ready to jump into the famous <b>landscape metaphor</b>, first introduced by Sewall Wright in 1932.  Wright presented a metaphor in which each point in the space of combinations of <a href="http://en.wikipedia.org/wiki/Allele">alleles</a> at different <a href="http://en.wikipedia.org/wiki/Locus_%28genetics%29">loci</a> (similar to genotype space) was like a point on a physical landscape, and elevation represented the fitness of each genotype.  Wright introduced the metaphor as a way of thinking about change in gene frequencies in populations of animals and as a way of thinking about how gene interactions affect long-term evolutionary dynamics (using the metaphor for both of these purposes has caused a load of confusion, see for example the section "Wrinkles in the Surface of Selective Value" in Provine's biography of Wright).</p1>

<figure style="width:320px">
    <img class="figure" src="../../images/wright-sewall9.jpg" alt="photo of sewall wright" width="280px" height="310px">
    <figcaption>Perhaps the greatest mystery in all of evolutionary biology: Did Sewall Wright ever use a guinea pig as chalkboard eraser?  There is evidence for and against, but I'm willing to go out on a limb and say yes, he definitely did.</figcaption>
</figure>

<p1>This seems simple enough, but I'd like to take a moment (again taking the long way here), and think about a physical landscape in the terms we've been using today.
<br /><br />
In <a href="/Scapes/topossibilogy">the dialogue</a>, the Tortoise and Achilles traverse a landscape.  Imagine for a moment that the world is flat, and we are up in a satellite far above the two explorers.  We could record the possible positions of the animals in two-dimensional space using a north-south axis and an east-west axis (please ignore the curvature of the earth).  This is our space of possibilities. Now we'll add the mapping: for each possible position we want to know the elevation.  Then we'll take this elevation mapping and add it to our space of possibilities as an extra dimension.  And voila - we have a two dimensional space with a third dimension for the mapping, and the surface we've created is a representation of the actual surface of the physical landscape!</p1>

<figure style="width:808px">
    <img class="figure two_figure" src="../../images/Wright2.png" alt="hamming map of genetic combinations" width="449px" height="264px">
    <img class="figure two_figure" src="../../images/Wright1.png" alt="hamming map of genetic combinations" width="359px" height="265px">
    <figcaption id="two_figure_caption">Two of Wright's diagrams in his 1932 paper.  On the left is a Hamming Graph of allele combinations and on the right is a topographical map that represents "the field of gene combinations in two dimensions instead of many thousands" with elevations representing "adaptiveness."</figcaption>
</figure>

<p1>If that last sentence strikes you as a confusing, circular statement, you're probably right.  I'm sorry. My point is to cast the physical landscape as one member of a broad class of structures that can be represented by a space of possibilities and a mapping.  
<br /><br />
Here are the analogies of the <b>traditional adaptive landscape</b> concept:
<br /><br />
The Analogies:<br /><b>
Genotype or Phenotype Space ----------- 	A Two-Dimensional Space of Possible 
Positions on a Landscape
<br />
Fitness ------------------------------------------ 	The Elevation 
</b><br /><br />
What I hope has come through in this theoretical introduction is a really slight change in thinking towards <b>something more general</b>. Here it is:
<br /><br />
The Analogies:<br /><b>
Genotype or Phenotype Space ------ Any Space of Possibilities<br />
Fitness ------------------------------------- Any Mapping
</b><br /><br />
From my examples of mixed drinks and light switches, you can see that this is an incredibly broad analogy.  The specific idea of a three-dimensional landscape is one example of many that fits within this structure.  <b>What makes it an important example is that it is where our terminology and our low-dimensional visualization come from</b>.  We talk about <i>peaks, valleys, ruggedness,</i> and <i>hill-climbing,</i> and we picture <i>rolling hills, ridges, cliffs,</i> and the like when we theorize.
<br /><br />
I think this second interpretation is useful for two reasons.  First, by beginning from a more general standpoint, we are forced to ask questions about what the space of possibilities and the mapping look like.  This is a process of critical analogy.  I mentioned that we use the physical landscape for our terminology and intuitive understanding of this kind of structure.  However when we think about the adaptive landscape, we have to avoid letting this terminology and intuition from low-dimensional, continuous space mislead us when thinking about high-dimensional or discrete systems.  We can avoid these pitfalls by being critical and asking questions as we use the metaphor, which comes more naturally when using the broader view.
<br /><br />
Second, I think that putting many systems of change into this broad analogy and asking critical questions about how these systems are similar or different could yield considerable insights.  The adaptive landscape metaphor in its strict form has provided biologists with an intuitive way to think of evolution for 80 years, playing a role in theory formation many times over the years.  I think that we should encourage critical analogy not just with the physical landscape but also with systems from many disciplines.
<br /><br />
My goal here was to introduce this concept in a general way, with an emphasis on a sweeping, interdisciplinary analogy that we use critically to understand changing systems throughout our world.  In the next section we will dive into the technical dirt and start looking at some of the difficulties in talking about distance and moving around the landscape, and how these difficulties relate to very real problems in our scientific understanding of the mappings between genotype, phenotype, and fitness.</p1>
<br /><br />

<div id="bottom_links">
<p1><a href="../part1">&#171Back to part 1</a>&nbsp&nbsp&nbsp&nbsp<a href="../part3">Onward to part 3 &#187</a></p1>
</br></br>
<p1><a href="../sources">Sources</a></p1>
</br></br>
</div>

</div>

</body>

</html>

<?php
include '../../footer.html';
?>

  
