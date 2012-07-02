<aside id="sidebar" class="four columns" role="complementary">
	<?php $options = get_option( 'mon_cahier_theme_options' ); ?>

	<ul class="social-media">
		<?php if ( $options['twitterurl'] != '' ) : ?>
			<li><a href="<?php echo $options['twitterurl']; ?>" class="twitter"><?php _e( 'Twitter', 'mon_cahier' ); ?></a></li>
		<?php endif; ?>

		<?php if ( $options['facebookurl'] != '' ) : ?>
			<li><a href="<?php echo $options['facebookurl']; ?>" class="facebook"><?php _e( 'Facebook', 'mon_cahier' ); ?></a></li>
		<?php endif; ?>
		
		<?php if ( $options['pinetresturl'] != '' ) : ?>
			<li><a href="<?php echo $options['pinetresturl']; ?>" class="pinetrest"><?php _e( 'Pintrest', 'mon_cahier' ); ?></a></li>
		<?php endif; ?>
		
		<?php if ( $options['flickrurl'] != '' ) : ?>
			<li><a href="<?php echo $options['flickrurl']; ?>" class="flickr"><?php _e( 'Flickr', 'mon_cahier' ); ?></a></li>
		<?php endif; ?>
		
		<?php if ( $options['linkedinurl'] != '' ) : ?>
			<li><a href="<?php echo $options['linkedinurl']; ?>" class="linkedin"><?php _e( 'LinkedIn', 'mon_cahier' ); ?></a></li>
		<?php endif; ?>
		
		<?php if ( $options['googleplusurl'] != '' ) : ?>
			<li><a href="<?php echo $options['googleplusurl']; ?>" class="googleplus"><?php _e( 'Google Plus', 'mon_cahier' ); ?></a></li>
		<?php endif; ?>
		
		<?php if ( $options['vimeourl'] != '' ) : ?>
			<li><a href="<?php echo $options['vimeourl']; ?>" class="vimeo"><?php _e( 'Vimeo', 'mon_cahier' ); ?></a></li>
		<?php endif; ?>

		<?php if ( $options['youtubeurl'] != '' ) : ?>
			<li><a href="<?php echo $options['youtubeurl']; ?>" class="youtube"><?php _e( 'Youtube', 'mon_cahier' ); ?></a></li>
		<?php endif; ?>


		<?php if ( ! $options['hiderss'] ) : ?>
			<li><a href="<?php bloginfo( 'rss2_url' ); ?>" class="rss"><?php _e( 'RSS Feed', 'mon_cahier' ); ?></a></li>
		<?php endif; ?>
	</ul><!-- #social-icons-->
	<div class="sidebar-box">
		<?php dynamic_sidebar("Sidebar"); ?>
	</div>
</aside><!-- /#sidebar -->