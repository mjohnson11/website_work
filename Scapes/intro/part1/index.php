<?php
include '../../header.html';
?>

<html>

<head>

<link rel='stylesheet' href='../../css/scapes_stylesheet.css' />

<title>Scapes - A PERSONAL INTRODUCTION TO THE ADAPTIVE LANDSCAPE</title>

<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<script src="//code.jquery.com/jquery-1.10.2.js"></script>
<script src="//code.jquery.com/ui/1.11.2/jquery-ui.js"></script>
<script src="../../js/landscape_intro.js"></script>

</head>

<body>

<div id="main_text">

<h1>A PERSONAL INTRODUCTION TO THE ADAPTIVE LANDSCAPE</h1>

<p1>The following is an introduction to the way I think of the adaptive landscape.  In a very broad context, it's a structure that we can use to think about <b>how systems with many interacting parts change over time</b> - systems like life, businesses, public policy, sets of beliefs, and more.  This is not the textbook definition (if there is one) of the adaptive landscape concept - if you're looking for that I'd suggest checking out Wikipedia or an actual textbook.  Because I'm taking the long way.  Here, I will be building up my view of the concept theoretically from the ground up, sometimes using my own terms and occasionally borrowing and butchering some work that is well established in math, computer science, and evolutionary biology (where I can, I'll try to leave references to more in depth descriptions of these concepts).  I'm doing it this way because it's fun and working through it logically helps me (and hopefully you!) understand the concept. OK, here goes:</p1>

<h2>Part 1: "Spaces" of Possibility, Some Toy Examples</h2>

<h3>A Continuous Multidimensional Whiskey Drink</h3>

<p1>Imagine you're mixing yourself a very simple whiskey drink. Better yet, if you're of age, go ahead and get out some whiskey.  Perhaps it will help you understand my ramblings.
<br /><br />
Are you surprised I started with whiskey?  I certainly hope so.  Moving on...
<br /><br />
Let's start with the simplest drink: whiskey neat, no ice.
<br /><br />
Here is the question: How can we <i>think of</i> <b>all of the possibilities for your drink</b>?  Well, we could do it abstractly, with symbols like this: { x | 0 &#8804 x &#60 &#8734 }.  But let's decide that we want to think of it spatially.  So for the neat whiskey we can think of all the possibilities as lying along a line extending out from point 0, with the distance along the line representing the fingers of whiskey (or should we measure in liters?).   This line is what I'm going to call a <b>space of possibility</b> (elsewhere it might be called a combinatorial space or a <a href="http://en.wikipedia.org/wiki/Phase_space">phase space</a>, but I've decided to go about things from scratch, so I'll stick with my term).</p1>  

<div id="one_slider_alone" class="single_house">
    <div id="sliders_1" class="slider_house">
        <p2>Volume of Whiskey:</p2>
        <div class="cont_slider v1"></div>
        <div class="one_slider_text">None</div>
    </div>
</div>

<p1>Now what if we add cola as another ingredient (still no ice)?  We must revise our space of possibilities.  This time we need two dimensions, so the space of possibilities is a plane extending from (0, 0) out in the positive directions so that the x value is the liters of whiskey and the y value is the liters of coke.  Once again our space contains all of the possibilities for the drink.</p1><br />

<div id="two_slider_to_graph" class="double_house">
    <div id="sliders_2" class="slider_house">
        <p2>Volume of Whiskey:</p2>
        <div class="cont_slider v1"></div>
        <p2>Volume of Coke:</p2>
        <div class="cont_slider v2"></div>
    </div>
    <div class="graph_house">
        <svg id="two_d_graph" class="svg_graph" height="200" width="250">
            <line x1="0" y1="200" x2="250" y2="200" style="stroke:black;stroke-width:5" />
            <line x1="0" y1="200" x2="0" y2="0" style="stroke:black;stroke-width:5" />
        </svg>
        <!--making the point with html so I can move it with jquery-->
        <div class="two_d_point graph_point"></div>
    </div>
</div>

<p1>What would happen if we added a third ingredient, like water?  The simple answer is to add another axis, <a href="http://en.wikipedia.org/wiki/Orthogonality">orthogonal</a> to the others, representing liters of water.</p1>

<div id="three_slider_to_graph" class="double_house">
    <div id="sliders_3" class="slider_house">
        <p2>Volume of Whiskey:</p2>
        <div class="cont_slider v1"></div>
        <p2>Volume of Coke:</p2>
        <div class="cont_slider v2"></div>
        <p2>Volume of Water:</p2>
        <div class="cont_slider v3"></div>
    </div>
    <div class="graph_house">
        <svg id="three_d_graph" class="svg_graph" height="200" width="250">
            <line x1="0" y1="200" x2="250" y2="200" style="stroke:black;stroke-width:5" />
            <line x1="0" y1="200" x2="0" y2="0" style="stroke:black;stroke-width:5" />
            <line x1="0" y1="200" x2="100" y2="100" style="stroke:black;stroke-width:2" />
        </svg>
        <!--making the point with html so I can move it with jquery-->
        <div class="three_d_point graph_point"></div>
    </div>
</div>

<p1>We've arranged the possibilities so that each point in this three dimensional space represents a specific recipe.  Importantly, notice how this space of possibilities grows as we add each new <i>dimension</i>, or <i>ingredient</i>, or <i>trait</i>.</p1>

<h3>Discrete Light Switches</h3>

<p1>Now let's change to a less alcoholic system.  This time we find ourselves in a room with a light and a corresponding light switch.  If this is too boring for you, you can imagine you still have your whiskey drink in hand.  All you can do in this room is flip the switch to turn the light on or off.  How will we describe the space of possibilities for this system?  Well, if we want to put it in a spatial context again we might just put each of the two possible states at two possible positions along a line, say at x=0 and x=1.  Again here we only need one dimension, but unlike our neat whiskey, in this case the whole line isn't possible, only two points on it are.  This means the system is <i>discrete</i>.</p1>

<div id="one_switch">
    <div id="switch_1">
        <div class="switch"></div>
    </div>
    <div id="two_discrete_graph">
        <svg id="discrete_2" class="svg_graph" height="50" width="250">
            <g fill="none" stroke="black" stroke-width="2">
            <path stroke-dasharray="6,2" d="M5 20 l215 0" />
            </g>
            <circle cx="5" cy="20" r="2" fill="black" />
            <circle cx="220" cy="20" r="2" fill="black" />
            Sorry, your browser does not support inline SVG.
        </svg>
        <p id="light_off_text">Off</p>
        <p id="light_on_text">On</p>
        <div id="one_discrete_point" class="graph_point"></div>
    </div>
</div>

<p1>That looks acceptable.
<br /><br />Now I'll add more lights to the room: one over in the corner, to light up my favorite reading chair, and one that casts a soft, blue light over the ceiling.  So now we have three lights and three switches.  The sharp reader might guess from the whiskey example that we are once again moving into a familiar three-dimensional space.  This time we define each possible state as a point in space where if the first light is on, x=1 (if not x=0), if the second is on, y=1 (if not y=0), and if the third is on, z=1 (if not z=0).  We put all the possible states in this space and voila, they're the corners of a cube!</p1>  

<div id="three_switch">
    <div id="switch_3">
        <div class="switch"></div>
        <div class="switch"></div>
        <div class="switch"></div>
    </div>
    <div id="three_discrete_graph">
        <svg id="discrete_3" class="svg_graph" height="250" width="250">
            <g fill="none" stroke="black" stroke-width="2">
            <path stroke-dasharray="6,2" d="M65 5 L235 5 L235 165 L65 165 L65 5 L5 45" />
            <path stroke-dasharray="6,2" d="M175 45 L175 205 L5 205 L5 45 L175 45 L 235 5" />
            <path stroke-dasharray="6,2" d="M175 205 L235 165" />
            <path stroke-dasharray="6,2" d="M5 205 L65 165" />
            </g>
            Sorry, your browser does not support inline SVG.
        </svg>
        <div id="three_discrete_point" class="graph_point"></div>
    </div>
</div>

<p1>Again, notice how the number of possibilities grows as we add new dimensions, or switches (this is sometimes called <a href="http://en.wikipedia.org/wiki/Combinatorial_explosion">COMBINATORIAL EXPLOSION!</a>).</p1>

<h3>Putting on the High-Dimensional Goggles</h3>

<p1>Now the big question: what happens when we add more dimensions? 
<br /> <br/>
From down the hallway, a mathematician chimes in, "Well... just add more dimensions."
<br /> <br/>
And we answer, "More than three?  Where will we add them?"
<br /> <br/>
The mathematician replies, "Just in a direction <a href="http://en.wikipedia.org/wiki/Orthogonality">orthogonal</a> to all the other axes."
<br /> <br/>
"Oh, of course..." and we walk away quietly as if we understood.
<br /> <br/>
So how dire is our situation?  Should we be worried?  Certainly, if we add a fourth ingredient for the drink recipe or more and more lights in our little room, we will struggle to plot our possibilities in three-dimensional space.  But I like to think that a clever mathematician would ease our minds by having us imagine we lived in a two-dimensional world for a moment.  From our 2D world, our 3D space representing the whiskey-cola-water recipe would be as difficult to imagine as a 4D space is to those of us still in this familiar world.  But is the 3D space of possibilities wrong?  The resounding answer should be no.  It's just difficult to imagine and impossible to picture.  So although we realize that real-world systems are more complicated than our toy examples, and are in fact very high-dimensional, <b>we don't need to be disturbed by the fact that we struggle to imagine what they look like</b>.
<br /> <br/>
What <b>is</b> important is to understand is that adding new dimensions means exponentially increasing the number of possibilities and opening up new paths between states. In simple terms this means that getting from x=0 to x=1 can happen along new paths if we open up the space of possibilities to include the y dimension as well.  In special cases (which I will discuss later), we call this new path a high-dimensional or extra-dimensional bypass.  EXTRA-DIMENSIONAL BYPASS!  This is perhaps my favorite term in all of science, and it is what the Tortoise discovers in order to move from one peak to another in <a href="/Scapes/topossibology/">the dialogue</a>.</p1>

<figure>
<img class=figure src="../../images/hillsketch-01.png" alt="Extradimensional bypass image" style="width:480px;height:170px">
</figure>

<p1>So should we be panicking about the fact that we think in only three dimensions?  Should we be straining our minds to find some abstract way to picture these high-dimensional spaces of possibility?  We could.  It might be a fun game to play after doing some "hands-on" exploration of the space of possibilities for the whiskey drink.  But I don't think we need to worry about it.  The key to thinking about these high-dimensional spaces is to be aware of the changes as we increase dimensions, both in terms of the new paths between states that may open up, and in terms of the size of the space (which "explodes" as the number of dimensions increases).  If we go back to the toy examples above, where we move from 1D to 2D to 3D spaces of possibility, we can see these changes very clearly each time we add a new dimension.</p1>

<h3>Back to Biology: Sequence Space / Genotype Space</h3>

<p1>A DNA molecule consists of two chains of nucleotides, spun around one another in a beautiful double helix.  There are four types of nitrogenous bases in the nucleotides in DNA (they have names, but what's a name worth anyways?  We'll stick with A, T, C, G), and each one specifies the corresponding base on the opposite chain.  So we can represent a particular piece of DNA by the sequence of bases in a particular direction on a particular chain.  We can write this out as a string of A's, T's, C's, and G's, and this <i>sequence</i> is our <i>state</i>.  Let's start by imagining a DNA sequence with only one nucleotide.  It has four possible states (bases), and we define the variation operator as a change of a base at a position (there is only one to chose from).  Here's how I might lay out these possibilities in space:</p1>

<figure>
    <img class="figure" src="../../images/tetra.png" alt="Tetrahedron space image" width="303px" height="246px">
</figure>

<p1>Notice that each state has 3 "neighbors," corresponding to the 3 other bases that are possible.  If we add a second nucleotide, we now have 16 possibilities, each state has 6 neighbors, and we can draw a structure that I want to call a hyper-tetrahedron... but according to the mathematician I'm using that term wrong, so I guess I'll call it a recursive tetrahedron.</p1>

<figure style="width:649px">
<img class="figure" src="../../images/hypertetrahedron.png" alt="Tetrahedron space image" width="432px" height="356px">
<figcaption>A "recursive tetrahedron" - one way to represent the possibilities for 2-nucleotide string of DNA.  The big letters represent the base of the first nucleotide and the small letters represent the base of the second nucleotide.  Edges represent point-mutation changes.  To imagine the structure for a longer sequence, imagine that you zoom out and find that this big tetrahedron is just one of the smaller tetrahedrons in an even larger tetrahedron that represents the states of the third nucleotide, and new edges are drawn from each of the points on the tiny tetrahedrons to the corresponding points in the other corners of the new largest tetrahedron.  You can then repeat the process (this is the recursive bit) to imagine a structure for the possibilities for a DNA sequence of length 4.  The longer the sequence, the more levels of tetrahedrons we imagine embedded within each other.</figcaption>
</figure>

<p1>If this diagram seems confusing that's probably because it is.  In fact, it's a good example of a futile attempt to properly visualize a space of possibility that doesn’t work well for visualization.  One way that this image fails to properly represent the situation is that this diagram has blurred our notion of distance - an issue that we'll address more fully in the next section.
<br /><br />
<i>A quick note:
<br /><br />
The term <i>genotype space</i> is often used to refer to the space of possibilities for the whole genome, basically all the DNA sequences for one organism.  However, the term is also sometimes used in place of sequence space for a particular gene sequence because the sequence space is a part of the larger genotype space (I might use the term "subspace", but I'm not sure what the mathematicians would think of that).</i></p1>

<h3>Phenotype Space</h3>

<p1>When we talk about your <i>phenotype</i>, we are talking about your entire collection of <i>observable traits</i>, from the shape of the molecules within your cells to your height. These traits are usually described by <i>continuous</i> variables, so the space we construct will be more like the whiskey drink spaces than the light switch spaces.  This is probably the most common type of space presented in introductions to the adaptive landscape metaphor, because it involves things we can readily see.  Here is another toy example:</p1>

<div id="two_slider_pheno" class="double_house">
    <div id="sliders_2" class="slider_house">
        <p2>Height:</p2>
        <div class="cont_slider v1"></div>
        <p2>Tail Length:</p2>
        <div class="cont_slider v2"></div>
    </div>
    <div class="graph_house">
        <svg id="two_d_graph" class="svg_graph" height="200" width="250">
            <line x1="0" y1="200" x2="250" y2="200" style="stroke:black;stroke-width:5" />
            <line x1="0" y1="200" x2="0" y2="0" style="stroke:black;stroke-width:5" />
        </svg>
        <!--making the point with html so I can move it with jquery-->
        <div class="two_d_point graph_point"></div>
    </div>
</div>

<p1>As in the other systems, we will quickly realize that the possibilities for an organism involve more than just height and tail length, and as we add more dimensions are familiar representations will fail.  And again we acknowledge this, but don't panic.  We're used to high dimensionality by now.
<br /><br />
If you're wondering how we would define distance in this space of possibilities, you're onto something - we'll look into it more in Part 3.  For now, on to <a href="../part2">Part 2: The Mapping</a>.</p1>
<br /><br />

<div id="bottom_links">
<p1><a href="../part2">Onward to part 2 &#187</a></p1>
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

  
