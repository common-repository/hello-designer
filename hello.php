<?php
/**
 * @package Hello_Designer
 * @version 1.0
 */
/*
Plugin Name: Hello Designer
Plugin URI: https://wordpress.org/plugins/hello-designer/
Description: Instead of the hope of a generation that few developers are alive to remember, we've modified the classic Wordpress plugin to provide some tangible help to Wordpress users the world over: design inspiration. Quotes from famous designers will help you whenever you get stuck, and failing that, will hopefully at least provide a little distraction.
Author: Prime Responsive Websites, based on work by Matt Mullenweg
Version: 1.0
Author URI: http://primeresponsivewebsites.com/
*/

function hello_designer_get_quotes() {
	/** These are the quotes we're going to select from */
	$quotes = "Everything is designed. Few things are designed well.
There is no design without discipline. There is no discipline without intelligence.
People ignore design that ignores people.
Good design is obvious. Great design is transparent.
Design is where science and art break even.
Good design goes to heaven; bad design goes everywhere.
A designer is a planner with an aesthetic sense.
Bad design is smoke, while good design is a mirror.
Design is as much an act of spacing as an act of marking.
Good design is a lot like clear thinking made visual.
Design is intelligence made visible.
Math is easy; design is hard.
Design is the conscious effort to impose a meaningful order.
Designers are meant to be loved, not to be understood.
Being a famous designer is like being a famous dentist.
Design creates culture. Culture shapes values. Values determine the future.
I find modernist design boring, but it is so much faster!
A camel is a horse designed by a committee.
Technology over technique produces emotionless design.
A design isn’t finished until somebody is using it.
Practice safe design: Use a concept.
Many things difficult to design prove easy to perform.
Design is easy. All you do is stare at the screen until drops of blood form on your forehead.
The only important thing about design is how it relates to people.
";

	// Here we split it into individual quotes
	$quotes = explode( "\n", $quotes );

	// And then randomly choose a quote
	return wptexturize( $quotes[ mt_rand( 0, count( $quotes ) - 1 ) ] );
}

// This just echoes the chosen quote, we'll position it later
function hello_designer() {
	$chosen = hello_designer_get_quotes();
	echo "<p id='designer'>$chosen</p>";
}

// Now we set that function up to execute when the admin_notices action is called
add_action( 'admin_notices', 'hello_designer' );

// We need some CSS to position the paragraph
function designer_css() {
	// This makes sure that the positioning is also good for right-to-left languages
	$x = is_rtl() ? 'left' : 'right';

	echo "
	<style type='text/css'>
	#designer {
		float: $x;
		padding-$x: 15px;
		padding-top: 5px;		
		margin: 0;
		font-size: 11px;
	}
	</style>
	";
}

add_action( 'admin_head', 'designer_css' );

?>
