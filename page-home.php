<?php 
/* 
* Template Name: Home
*/

get_header(); ?>


		<section class="front-slider row">
			<div class="twelve columns">
				<!-- Hook up the FlexSlider -->
				<script type="text/javascript">
					$(window).load(function() {
						$('.flexslider').flexslider({
						  animation: "slide"
						  //,controlsContainer: ".flexslider-container"
					  });
					});
				</script>
				<div class="flexslider">
				    <ul class="slides">
			 
							<li>
								<img src="#">							
							</li>
			 
				    </ul>
				</div>
			</div>		
		</section>
		<div class="row">
	    	<div class="four columns">
		    	<h3>Content title</h3>
		    	<p>More content</p>
	    	</div>
	    	
	    	<div class="four columns">
		    	<h3>Content title</h3>
		    	<p>More content</p>	    	
	    	</div>	    	
	    	
	    	<div class="four columns">
		    	<h3>Content title</h3>
		    	<p>More content</p>	    	
	    	</div>		
		</div>
		
<?php get_footer(); ?>