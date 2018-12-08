<?php
include '../../header.html';
?>

<html>

<head>

<link rel='stylesheet' href='../../css/scapes_stylesheet.css' />

<title>Scapes intro Part 3: Variation Operators, Move Rules, and Another Dialogue</title>

<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<script src="//code.jquery.com/jquery-1.10.2.js"></script>
<script src="//code.jquery.com/ui/1.11.2/jquery-ui.js"></script>
<script src="../../js/landscape_intro.js"></script>

</head>

<body>

<div id="main_text">

<br />

<p id="back_link"><a href="../part2">&#171 Back to part 2</a></p>

<h2>Part 3: Variation Operators, Move Rules, and Another Dialogue</h2>

<p1>Now that we have defined a super-broad adaptive landscape concept encompassing any space of possibilities with a mapping, let’s start asking the important questions.  How, in a biological system, does movement across the landscape occur?  How does the system evolve?
<br /><br />
This is the big-money question, the dream: to understand the system well enough to make a model of its long-term evolution.  But it is not an easy task.
<br /><br />
This formidable challenge has led those who yearn for a precise model of evolutionary change to simplify the system and make assumptions, taming the problem until it is workable.  These efforts have been successful in a number of ways, but even their weaknesses proved useful by shining a sharp light on areas in which more empirical research is needed.  
<br /><br />
From the perspective of the adaptive landscape concept, it is somewhat easy to put these models into two rough categories: bottom-up and top-down.  In both, the questions we are asking are how can the system change, and how does the system change.  Along the way, we’ll have to make assumptions that prompt more questions about evolution and biological systems.  What is the nature of variation in populations?  Is evolution limited by the supply of mutations?  What matters more in understanding evolutionary change: selection on phenotypic variation, or the sources of that variation (the survival of the fittest, or the arrival of the fittest)?
<br /><br />
But first, a dialogue:</p1>
<br /><br /><br />
<div id="dialogue_inset">
<p4>
<i>Achilles has invited Mrs. Tortoise over to his house to discuss some “very excited work” he had been doing.  Tortoise arrives a few minutes late, as is her custom, stumbling into the room and throwing off her coat.</i>
<br /><br />
<i>Tortoise:</i> Achilles!  It seems like it has been years!
<br /><br />
<i>Achilles:</i> I think it has my dear Tortoise.  I haven’t seen you since that trip up Mt. Fuji a while back.
<br /><br />
<i>Tortoise:</i>  Oh yes, how could I have forgotten.  So what have you been up to?
<br /><br />
<i>Achilles:</i> Well, I was inspired by all of our talk about evolution, so I decided to start studying it myself.  Come and take a look (waving Tortoise over towards a flat-file in the corner of the room) ... at these!
<br /><br />
<i>Achilles pulled out one of the drawers, which was topped with glass.  Underneath the glass were dozens of pictures of field mice, each with a little number scrolled in the bottom corner</i>
<br /><br />
<i>Tortoise:</i> Oh dear me, what are these?
<br /><br />
<i>Achilles:</i> It’s my data.  You see, I’ve been studying the evolution of the huge mouse population in the fields around my house.  I’ve collected data from hundreds of mice.
<br /><br />
<i>Tortoise:</i> That seems like quite a bit of work.
<br /><br />
<i>Achilles:</i> You have no idea.  For each mouse I have to measure their weight and their tail length.
<br /><br />
<i>Tortoise:</i> Just those two things?
<br /><br />
<i>Achilles:</i> Do you see how many I have to measure?!?  Just two things...
<br /><br />
<i>Tortoise:</i>  Okay, so are they evolving?
<br /><br />
<i>Achilles:</i> Yes.  At least, I think so.  Here, let me show you the adaptive landscape I made.  A fellow named Simpson first put me onto the idea that I could make a landscape like this, with “phenotypes” on the axes instead of allele frequencies or gene combinations.
<br /><br />
<i>Achilles leads Tortoise over to the table in the middle of the room.  On it is a large square matte board with two edges that share a corner labeled “body weight” and “tail length.”  On top of the board are hundreds of tiny metal rods - like pins or needles but of all different heights.</i>
<br /><br />
<i>Achilles:</i> So after I get the data on a mouse’s physical characteristics, I ask them about their fitness, about how many kids they’ve had.
<br /><br />
<i>Tortoise:</i> You just ask them?
<br /><br />
<i>Achilles:</i> Mice are known for being very honest.  So then I put a rod on the board, in a position based on the weight and tail length - see?  And the rod’s height in inches is how many kids the mouse had - my measure of its “fitness.”
<br /><br />
<i>Achilles, smiling proudly, grabs the table cloth from the counter and throws it over the hundreds of rods on the board.  The heavy cloth falls over the rods, making a kind of cloth topography.</i>
<br /><br />
<i>Achilles:</i>  And there it is - my very own adaptive landscape!  So see up here, with small tail and large body weight, that’s the fittest place.  But I checked and the mean individual in the population is over here, with a big tail and a small body weight, so - they are going to evolve along this ridge here, and in a few years there will be bigger mice with smaller tails!
<br /><br />
<i>Tortoise stands for a moment, staring down at Achilles cloth landscape.</i>
<br /><br />
<i>Tortoise:</i>  I think you’re making some bold assumptions here my friend.  How do you even know that these characteristics are heritable - that they get passed down to the kids of these mice?  Even if you do understand the heritability, can you really say that the reason those mice (Tortoise gestures towards the “peak” on the landscape) are having more kids is specifically because they are bigger and have shorter tails?  Couldn’t something else be causing both?
<br /><br />
<i>Achilles:</i>  I don’t see how that would change anything though - I’d still end up with bigger mice with shorter tails.
<br /><br />
<i>Tortoise:</i>  Well don’t you want to understand what causes the changes?  What is truly responsible for the variation you are seeing?
<br /><br />
<i>Achilles:</i> Well I suppose I should make sure the variation is heritable, like you said.  But past that ... it seems like there is plenty of variation, so I don’t think it’s really important - what is important is this (gesturing again to the cloth landscape).
<br /><br />
<i>Tortoise:</i> Well maybe for just those two traits you mentioned - but what about other variation - like the number of toes on each mouse, or the side of the body the heart is on, or - things like that!  Those won’t fit into your simple continuous axes.  Those are due to specific mutations - the real driver behind evolution.
<br /><br />
<i>Achilles:</i> Don’t be so silly Tortoise, mutations just provide the raw material for natural selection to act on, which there is clearly plenty of.  And I’m not convinced by your odd examples either - most evolutionary change can be described by selection on continuous traits.
<br /><br />
<i>Tortoise:</i>  And what about all of the genetics I taught you?   What about DNA, and genotype space?
<br /><br />
<i>Achilles:</i>  But all of those concepts are so distant from what I care about (pulling out a few pictures of the mice) - the actual animals, and how they change!  Isn’t that what we want to understand anyways?
<br /><br />
<i>Tortoise, fuming now, grabs her jacket from the floor and hurries to the door.</i>
<br /><br />
<i>Tortoise:</i>  I’ll be back.
<br /><br />
<i>Achilles:</i> Fine.
<br /><br />
<i>Tortoise:</i> Fine.
<br /><br />
<i>A month later, after an apologetic but simultaneously intense call from Tortoise, Achilles comes over to her house.  Achilles arrives, as usual, a few minutes late, and pulls his armor off as he stoops to fit through the door.</i>
<br /><br />
<i>Achilles:</i>  My dear friend, I’m glad you invited me over.
<br /><br />
<i>Tortoise:</i>  I’m glad you came.  I’m ever so sorry for getting so upset at your house - 
<br /><br />
<i>Achilles:</i>  I’m sorry too.  I was out of line.
<br /><br />
<i>Tortoise:</i>  Anyways, I have something to show you.
<br /><br />
<i>Achilles:</i>  What’s that?
<br /><br />
<i>Mrs. Tortoise leads Achilles over to her computer, and opens a program.  On the screen are 8 rows of letters.  Each row resembles the others with one or two different letters.</i>
<br /><br />
<i>Tortoise:</i>  These are variants of the DNA sequence for a small microbe that I’ve been raising here in my kitchen.  It’s the same thing that I use to make my bread. 
<br /><br />
<i>Achilles:</i> That stuff is alive?
<br /><br />
<i>Tortoise:</i>  I’ve been using the latest technology to read DNA sequences from it, and I’ve been able to take clones of this microbe and introduce specific mutations into it.  Look, this is the library of 8 sequences that represent all of the possible combinations of 3 different mutations in this one gene.
<br /><br />
<i>Tortoise walks across the room to the table on the other side, where she has a little wire cube with tags at each corner.</i>
<br /><br />
<i>Tortoise:</i>  So for each of the eight combinations, I make a strain of the microbe with that combination and compete it against the original strain in my batch of dough for the day.  At the end of the rising, I see what percentage of the total population each strain is.  Those are the numbers I’ve written on the tags on the corners of the cube.  They represent the fitness of the strain, so the cube is really a fitness landscape.
<br /><br />
<i>Achilles:</i> It doesn’t look like a landscape at all!
<br /><br />
<i>Tortoise:</i>  I know, but it’s the concept.  Look, this shows exactly how these mutations affect the strains success - this is the true landscape in which change happens, it’s exactly accurate to reality.  
<br /><br />
<i>Achilles:</i>  But it has nothing to do with reality!  Look at it.  I could describe how the animals will actually change with my landscape.   All this shows is a measly three mutations.  There’s no animals, no population, no variation!
<br /><br />
<i>Tortoise:</i>  But look at this: mutation 1 causes a fitness increase on its own.  So does mutation 2.  But together, they cause a decrease in fitness.  This means that if a strain has mutation 1, it won’t get mutation 2, and vice versa.  This could be the basis for speciation - for how one species splits into two!
<br /><br />
<i>Achilles:</i>  Woah I think you’re getting a bit ahead of yourself here.  
<br /><br />
<i>Tortoise:</i>  I think you’re getting a little jealous.  
<br /><br />
<i>Achilles:</i> (walking for the door and picking up his armor) Me, jealous? This is ridiculous, I’m leaving.
<br /><br />
<i>Tortoise:</i>  Fine.
<br /><br />
<i>Achilles:</i>  Fine.
<br /><br />
<i>One month later, the two meet halfway between their houses.  Uncharacteristically, they are both right on time.  Characteristically, they are both smiling.</i>
<br /><br />
<i>Tortoise:</i>  Good day.
<br /><br />
<i>Achilles:</i>  And good day to you too.
<br /><br />
<i>Tortoise:</i>  Let’s skip right to it -
<br /><br />
<i>Achilles:</i>  Yes, let’s.  I’ve fully and completely described the evolution of the mice.
<br /><br />
<i>Tortoise:</i>  Well I’ve fully and completely described the evolution of the yeast!
<br /><br />
<i>Achilles:</i>  Let me explain.  I went back out and measured all of the phenotypic characters of the mice.  Professor Crab helped me find some college undergraduates who helped me measure the mice - AND we also measured the heritability of each trait.  In fact, we measured the additive genetic variance underlying each trait, and the covariances underlying combinations of traits.  I couldn’t use a cloth anymore, because of all the dimensions, but I used a computer program to simulate the evolution of the population mean value through high-dimensional phenotype space.  You see, natural selection pushes the population in one direction on this landscape, “uphill” if you will, and then the population will move generally in that direction - it actually depends on the additive genetic variance and covariances, because if two traits are affected by the same genetic factors then selection on one phenotypic trait can also lead to a change in the other, even in the absence of selection on that trait.  It’s kind of complicated, I’ll get my buddies Lande and Arnold to explain it to you later.
<br /><br />
<i>Tortoise:</i>  So you did have to look at the genetics?
<br /><br />
<i>Achilles:</i>  Well I looked at them ... statistically, based on how traits were inherited.  
<br /><br />
<i>Tortoise:</i>  So you couldn’t tell me about any of the specific mutations underlying the changes?
<br /><br />
<i>Achilles:</i>  It’s not important.  All we need to know is how much additive genetic variation -
<br /><br />
<i>Tortoise:</i>  But what about the non-additive genetic variation - like I was showing you last time with the three mutations - certain combinations are fit and others aren’t.  You can’t just ignore that - what if one mutation has a really profound effect? 
<br /><br />
<i>Achilles:</i>  Hey, I’ve heard that most mutations have small effects.  And like I said, what is important to selection, and what changes the statistical features of the phenotypes in the population, has to do with additive genetic variation.  Which I’m sure there is plenty of.  The point is, I can tell you what the mice are going to look like in 10 years!
<br /><br />
<i>Tortoise:</i>  Well while you were busy measuring your mice, I was busy with the yeast genome.  I used a little trick to measure the fitness of every possible sequence for the 12 million bases in the yeast genome.
<br /><br />
<i>Achilles:</i>  That’s impossible.  There are about 10^20,000,000 possible combinations.  That is BY FAR more than the number of atoms in the universe.  Even if you tested one every millisecond since the beginning of the universe in every corner of the universe you still wouldn’t get it done.
<br /><br />
<i>Tortoise:</i>  If I was just doing my tests in this 3-dimensional universe that would be true.  But I have my ways.  So I’ve created a 12-million-dimensional hypercube that describes all of the possible yeast sequences.  With it I can simulate the path a strain will take as it traverses the hypercube during evolution.  At each step I choose a mutation randomly and accept or reject it based on the fitness change.
<br /><br />
<i>Achilles:</i>  Each step?  What does that mean?  And how do you track the population mean on your hypercube?
<br /><br />
<i>Tortoise:</i>  Oh, well I’ve assumed that at each step, a mutation arises randomly.  If it leads to an increase in fitness, it spreads through the entire population, or “fixes,” and if not, it is eliminated.  Then another mutation arises.  Like this, the population takes “steps” around the landscape.  I can simulate these steps and discover principles of evolution - like how channelized or repeatable it is.  These simulations can reveal to us the best conditions for evolutionary innovations and breakthroughs, and maybe even the details of how speciation happens!
<br /><br />
<i>Achilles:</i>  Well that’s cool, but how can you say that only one mutation arises at a time?  You saw how much variation there is in my population.  Why would you think that mutation, and not selection, is limiting the process?
<br /><br />
<i>Tortoise:</i>  Well why do you insist that selection is limiting your process?  Couldn’t there be changes in the mice that depend on specific combinations of mutations that are not yet present in the population?
<br /><br />
<i>Achilles:</i>  Well... I don’t know.
<br /><br />
<i>Tortoise:</i>  Me neither...  Hey, you know what?  I’ve got an idea.  What if I checked all the possible genomes for the mice, but instead of just measuring fitness, I sent the mice to your undergrads -
<br /><br />
<i>Achilles:</i>  I only have about 100 undergrads -
<br /><br />
<i>Tortoise:</i>  Okay, I’ll have to find some undergrads in high-dimensional space.  Anyways, then we’ll measure the phenotypes and construct a full genotype to phenotype map.  Then we can combine our simulations to look at the evolution of a population in genotype space based on selection at the phenotypic level.
<br /><br />
<i>Achilles:</i>  Alright.  So we would look into the actual genetic variation in the population as a starting point.  And we could do a full population simulation, instead of assuming that only one mutation exists per step.
<br /><br />
<i>Tortoise:</i> Fine!
<br /><br />
<i>Achilles:</i> Fine!
<br /><br />
<i>And the two old friends embraced, happy to be collaborating at last.</i></p4>
</div>
<br /><br />

<h3>Bottom-up vs. Top-down Landscapes</h3>

<p1>When you decide to try to make a precise model of evolutionary change, you are signing up for a very difficult task.   The Tortoise and Achilles each made an attempt, using empirical data, from different angles.  These two attempts represent two common but largely exclusive ways to think about evolution, and they are associated with two common usages of the adaptive landscape / fitness landscape concept in evolutionary biology.  Let’s try to break it down a bit:</p1>

<h3>Movement through a space of possibilities</h3>

<p1>How are we allowed to move through a space of possibilities?  Well, if we are taking the Tortoise’s bottom-up, discrete, mutation-limited approach, this question is relatively easy to answer (although the mutation-limited assumption may be difficult to defend).  Our space involves combinations of genetic factors.  This could mean combinations of point mutations (sequence space) or combinations of genes being "on" or "off."  There are both empirical versions of these landscapes, like the Tortoise’s cube with labels, and theoretical versions.  The theoretical models make simplifying assumptions about the mapping between a space of possibilities defined by N (or L for some) binary traits and fitness.
<br /><br />
The first question these models ask is how you can move between states.  One answer is simple - at each step you can change one trait by either flipping it on or off or changing the letter at a specific position in a sequence.  In the light-switch example, the edges I drew on the cube represent one-step changes, or one-step neighbors.  How I define what is allowed in a step defines the structure of the space.  These rules are called "variation operators," and if I wanted to I could define one that would change the diagram and the way states are connected.  Say you can only flip two switches at once.  Each state still has three one-step neighbors, but the connections have changed.</p1>

<figure>
    <img class="figure" src="../../images/2stepcube.png" alt="3 step cube" width="455px" height="367px">
</figure>

<p1>By defining one of these simple variation operators, I can define distance in my model as the fewest number of steps that link two states.  It is possible to define variation operators that make it impossible to define distance, because they violate one of the criteria for a true notion of distance: symmetry.  We’ll return to this idea later.  For now, we can describe most of these systems using a string of characters, where each character represents the state of a particular trait - so that the length of the string is the number of discrete traits.  Examples:
<br /><br />
<b>The three-switch situation.</b>  We will describe the state of each switch by a 1 (for on) or a 0 (for off), and put them together in a state string like 000 (all off) or 100 (just the first light on):
<br /><br />
<b>A nucleotide sequence.</b>  This is how we usually write DNA or RNA sequences anyways, like ATGCGTATGC.
<br /><br />
<b>A set of specific mutations.</b>  If we know 5 mutations are involved in an adaptation, we might want to test combinations of these specific mutations.  10010 would mean that mutation 1 and mutation 4 are present but the others are not.</p1>

<figure>
    <img class="figure" src="../../images/hamming_distance.png" alt="3 step cube" width="422px" height="329px">
</figure>

<p1>For the light switch example we define the variation operator to be flipping one switch, and in sequence space we define the variation operator to be a single "point mutation," in which one nucleotide in the sequence, through an error in DNA replication, changes to another nucleotide.  In both cases, distance is measured as the number of positions at which two sequences differ - this is called Hamming Distance, named after the mathematician and computer scientist Richard Hamming.
<br /><br />
Side-note-game: Below are the criteria for a measure of distance that defines a <a href="http://en.wikipedia.org/wiki/Metric_space">metric space</a>.  Can you come up with an example of a variation operator (or list of variation operators/rules) that violate one of these criteria (I can make up ones that violate #3, let me know if you think of ways to break the others!).
<br /><br />
1. Non-negativity: the distance between A and B is not negative. d(A, B) &#8805 0<br />
2. Identity of Indiscernibles (good band name?): d(A, B) = 0 if and only if A=B<br />
3. Symmetry: d(A, B) = d(B, A)<br />
4. Triangle inequality: d(A, B) &#8804 d(A, C) + d(C, B)<br />
<br /><br />
Back to biology.  If you've taken a genetics class you might object to the point mutation variation operator, pointing out that larger mutations like deletions, insertions, and inversions should be included as additional variation operators.
<br /><br />
To address that point, let's first turn to the first real application of our notion of distance in genotype space: determining the evolutionary distance between two DNA sequences with a common ancestor.  Measures of this distance rely on first aligning the two sequences (a step necessary precisely because of insertions and deletions) and then scoring the differences between them.  This scoring will have to take into account both differences in single nucleotides and gaps in the alignment caused by deletions or insertions.  By coming up with a way to add “gap penalties” into the distance measure, these methods acknowledge those kinds of mutations while still basing the main distance measure on point mutations alone.  
<br /><br />
For these reasons, when people talk about a fitness landscape, it's interesting to ask 1) what is a "trait" is in the system? and 2) what are the variation operators?  For example, a study might be looking at how differences in the DNA sequence for a particular protein affect its function.  In this case, the "traits" are the individual nucleotide positions in the sequence, and the variation operator is probably a single point mutation.  Distance is measured as the number of positions at which two sequences differ.  In another study, researchers might be looking at how the different possible combinations of gene knockouts affect some phenotype.  In this case, the "traits" are individual genes that, like the light switches, can be either on (1) or off (0).  The variation operator is turning a single gene on or off, so if we represent the state of the system by a string of 1's and 0's based on which genes are on or off, distance is again the number of positions at which the strings differ (Hamming Distance).
<br /><br />
You can see how adding variation operators for deletions and insertions would complicate our idea of distance and structure in our space of possibilities, which explains why deletions, insertions, and inversions are often ignored in these theoretical models.</p1>

<h3>How do we move?</h3>

<p1>Once we have defined the variation operators and know how we <i>can</i> move on the landscape, we naturally ask: How <i>do</i> we move?  This question brings us finally into the realm of what I would call evolution.  And if we're talking about biological evolution, it brings us squarely into the field of <a href="http://en.wikipedia.org/wiki/Population_genetics">population genetics</a>.  But let's stop first and consider in very broad terms the evolution of a system that we have described with a space of possibilities (and associated variation operators) and a mapping.  This could be the evolution of the recipe for my whiskey drink that I make every night.  It could be the changing form of a product or business.  It could be an evolving solution to a combinatorially complex engineering problem.  And of course it could be the biological evolution of a species.  
<br /><br />
In each case, I think it is useful to think of the set of rules defining this evolution, the "algorithm" of change.  And this brings us back to the mapping and its purpose.  In the usual case, the algorithm of change in these systems "sees" the mapping, and its rules are designed to move through the space in a way that leads to an increase (or decrease in some systems) in the value of the mapping.  This is the popular view of biological evolution by natural selection, a "hill-climbing" algorithm that involves a population of agents where those with a higher mapping (fitness) reproduce more.  A simpler example would be for my whiskey drink recipe, where every night I change the amount of one ingredient by one milliliter from my "top recipe."  If the drink tastes better than the night before (the mapping here is to taste), I set it as my new top recipe, and if not, I keep the same top recipe, essentially taking a step back.
<br /><br />
There are two questions that we might ask now about these algorithms for change.  1) For a given system, what is the best algorithm, the one that will most often result in the highest mapping value?  2) What is the algorithm that is actually running in these systems?  Importantly, the two questions are not the same.  The algorithm for biological evolution may not be the "best" one that could be imagined.  And even more importantly, for biological evolution at least, we don't really know the answer to either question (largely because we don’t know what complete adaptive landscapes are like).
<br /><br />
For the bottom-up discrete landscapes, all of the examples I have seen that involve simulating "evolution" make the same general assumption - that evolution is limited by mutations.  This idea is often written as the strong-selection-weak-mutation condition (SSWM).  SSWM has one huge strength for these bottom-up models: it makes things simple.  Under SSWM, the model can move through the high-dimensional landscape one step at a time.  A mutation arises (take a step), selection either fixes it in the population (ok good), or it removes it completely from the population (reverse the step).  Then another mutation arises.  Rinse and repeat.  This is the kind of algorithm that is easily run by a computer and in some cases, is easy to analyze with mathematics as well.  The situation in which many mutations are at different frequencies in the population at once complicates the algorithm greatly.  
This assumption may, in some cases (particularly in clonal populations), be reasonable.  But a good deal of recent work in experimental evolution has confirmed the idea that the actual "algorithm" is not simple - competing mutations and linkage lead to a considerably different vision of the process.  These observations are beginning to be integrated into the mathematical theory but haven't (that I've seen) made their way into a landscape model or any model of long-term evolution.
<br /><br />
So to summarize / over-generalize this type of model:</p1>
<br /><br />
<p4><i>
Genotype space<br />
Variation operators precisely defined as point mutations or binary changes<br />
Fitness mapping constructed empirically (for relatively low-dimensional subspaces) or theoretically by assuming some general structure and drawing from some fitness distribution<br />
SSWM assumption for simulating evolution or doing mathematical analysis</i></p4>

<h3>How do we move in phenotype space?</h3>

<p1>While Mrs. Tortoise was measuring (in an impossible way) the fitness of all possible yeast genome sequences, Achilles was out in the field (with his army of undergrads) measuring the fitness of mice, and recording their combinations of phenotype values as well.  At first, Achilles simply assumed that using these measurements and the surface he extrapolated from them, he could predict the path of evolution.  But Tortoise pointed out two important, but distinct objections, which apply to phenotypic landscapes.  First is whether the variation underlying the phenotypes is <a href="http://en.wikipedia.org/wiki/Heritability">heritable</a>. It is possible that field mouse tail length variation is entirely due to how much the mouse eats when it is less than a year old, so that even if mice with larger tails have higher fitness, they won't pass on that trait to their offspring, and <a href="http://en.wikipedia.org/wiki/Natural_selection">natural selection</a> won't be able to change tail length at all.  To respond to this objection, Achilles measured the genetic variance underlying the phenotypic traits he was considering.  And he went one better - he also measured the genetic covariance between the traits, which is important in determining how selection pressure on one trait can affect the change in another trait.  For a toy example, consider a system in which (based on measurements in the field) there is selection for big tails, but no selection on body weight.  However, the genetic factors leading to big tails also lead to lower body weight - the genes have "<a href="http://en.wikipedia.org/wiki/Pleiotropy">pleiotropic</a>" effects.  Here, there is a negative genetic covariance between the two traits, and even though body weight isn't strictly under selection, we might expect it to go down in the population over time.  For more on these ideas, learn about the <a href="http://www.bio.tamu.edu/users/ajones/gmatrixonline/whatisg.html">multivariate breeder's equation</a>, which really describes the algorithm or "move rules" for these phenotypic models.
<br /><br />
The second objection is about discontinuity in phenotype space.  The basic difficulty is that we are dealing with a continuous system state that is caused by a discrete system state.  We saw how Tortoise could define distance in her landscape.  How can Achilles define it in his?  What he would like to do is define it based on the phenotype values, using <a href="http://en.wikipedia.org/wiki/Euclidean_distance">Euclidian distance</a>, or basically the length of the diagonal in phenotype space, where phenotype values might be scaled by standard deviations, for example.  In order to make this idea work in a rigorous sense, we need to assume that the genetic factors underlying phenotypic traits are responsible for relatively small changes in the phenotypic values, and in order to apply the breeder's equation to making long-term predictions, we'll need to assume that these effects are additive (I believe the breeder's equation does not need this assumption to make statements about the immediate effect of selection, but does need it to make a longer term prediction like "the population will move to that peak").  
<br /><br />
A <a href="http://tuvalu.santafe.edu/~walter/Papers/topoJTB.pdf">very interesting paper</a> by Walter Fontana and his colleagues describes some of the issues with trying to define phenotype space in this way.  Essentially, if there is redundancy in the genotype-phenotype map, neutral networks of genotypes can lead to the same phenotype.  There is good experimental evidence that this is the case in some systems - Fontana particularly sites the map between RNA sequence and RNA molecule shape.  These neutral networks of genotypes can lead to situations in which the transition from one phenotypic state A to state B is more likely to occur than the transition from B to A.   This type of asymmetry in the move rules in phenotype space makes it impossible to really define distance.  
<br /><br />
That said, there is also good evidence that some phenotypic traits are controlled by many additive genetic factors.  In some cases it may be quite reasonable to assume that phenotype space is truly continuous and that there is a supply of mutations to respond to any selection pressure.  And this way of thinking, this model of the landscape, does not rely on the SSWM assumption.  In fact, it explicitly relies on the variation in the population.  Still, if a novel mutation arising in the population that interacts in a non-additive way with the other genetic factors controlling the phenotype, the model can break down.  
<br /><br />
So to summarize / over-generalize this type of model:</p1>
<br /><br />
<p4><i>Phenotypic space<br />
Variation operators defined as continuous change, contingent on the G matrix, which describes genetic variance and covariance<br />
Fitness mapping investigated empirically, and created using some kind of surface-fitting / regression<br />
Generally assumes a supply of additive genetic factors with small effects</i></p4>

<h3>General Landscape Movement</h3>

<p1>In a general landscape, involving whiskey drinks, light switches, or a complicated combinatorial engineering problem, we might also ask how the system changes.  First, how can it change?  We iterate the system and each step, some types of changes are permitted - these are the variation operators.  And once we’ve defined those variation operators, we need to define or describe the "move rules."  Is there a population of systems where those with higher mappings leave more offspring?  Do we only take steps that increase (or decrease) the mapping value?  These questions define the algorithm for change in the system.
<br /><br />
As an aside, we're pretty much always dealing with discrete time steps here.  What if instead we we're considering, say, the position and speed of a falling object?  Then it might make more sense to use continuous time dynamics to describe the system, and the move rules might depend on gravity.  Here, we've actually stumbled into the realm of dynamics and classical mechanics... which means I've gotten way off track.</p1>

<h3>So is there any hope for the evolutionary biologists?</h3>

<p1>The models used by Tortoise and Achilles each have their shortcomings, their necessary but disappointing assumptions.  And each has its strengths.  Personally, I prefer Tortoise's discrete, bottom-up model, because the heritable changes in biological systems really are discrete (my bias is probably pretty obvious above).  There's something logically sound about constructing a combinatorically complete landscape of genetic changes (like Dan Weinreich did in the paper that <a href="/Scapes/Weinreich">this interactive landscape</a> is based on).  That said, you can argue, like Achilles, that this way of thinking misses the forest for the trees.  After all, don't we really care about how the amazing features of life, the phenotypes, evolve?  
<br /><br />
Where I'm at right now (and my viewpoint is definitely still evolving on this), is that the first type of thinking is more useful for understanding the origins of novelty in biological systems, and the second is more useful for understanding the shorter term evolution of some phenotypic traits.  If you're wondering about antibiotic resistance in bacteria, you're going to be in the first mindset.  If you're wondering about the evolution of beak size in birds faced with long-term drought, you're going to be in the second mindset.  
<br /><br />
But part of my goal in outlining these two different types of landscapes, and how they differ in their variation operators and move rules, is to try to illuminate the need for some crossover, or at least some breaking of the assumptions.  Obviously it would be lovely if Tortoises and Achilles-es could team up and figure out the whole genotype&#187phenotype&#187fitness map.  This is the ultimate goal.  Unfortunately, <a href="http://en.wikipedia.org/wiki/Combinatorial_explosion">combinatorial explosion</a> makes it difficult / impossible to chart out these maps entirely, at least without Tortoise's high-dimensional tricks.  But that makes this an exciting problem!  Can we find some <a href="http://en.wikipedia.org/wiki/High_throughput_biology">high-throughput</a> way to explore more of genotype space and measure some phenotype or fitness for each combination?  Can we use different evolution algorithms in microbial evolution experiments to discover general characteristics of the genotype&#187fitness map?  And can we safely generalize any of these results to say something interesting about long-term evolutionary dynamics?  As one of my old TA's used to tell us: "Hard saying, not knowing."  But I'd say it's worth a shot.</p1>	
<br /><br />

<div id="bottom_links">
<p1><a href="../part2">&#171Back to part 2</a>&nbsp&nbsp&nbsp&nbsp&nbsp<a href="../../hist/1">Onward to the history of the origin of the concept&#187</a></p1>
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

  
