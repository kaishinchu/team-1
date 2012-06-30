		</div><!-- End Main row -->
		
		<footer id="content-info" role="contentinfo">
			<div class="row">
				<small>&copy; Copyright <?php echo date('Y'); ?> Team Chicken. All Rights Reserved.</small>
			</div>
		</footer>
			
	</div><!-- Container End -->
	
	<!-- Included JS Files of Foundation -->
	<script src="<?php echo get_template_directory_uri(); ?>/js/foundation.js"></script>
	<script src="<?php echo get_template_directory_uri(); ?>/js/app.js"></script>
	
	<!-- Prompt IE 6 users to install Chrome Frame. Remove this if you want to support IE 6.
	     chromium.org/developers/how-tos/chrome-frame-getting-started -->
	<!--[if lt IE 7]>
		<script defer src="//ajax.googleapis.com/ajax/libs/chrome-frame/1.0.3/CFInstall.min.js"></script>
		<script defer>window.attachEvent('onload',function(){CFInstall.check({mode:'overlay'})})</script>
	<![endif]-->
	
	<?php wp_footer(); ?>
</body>
</html>