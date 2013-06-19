<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the id=main div and all content after
 *
 * @package Catch Themes
 * @subpackage Catch_Box
 * @since Catch Box 1.0
 */
?>

	</div><!-- #main -->

	<footer id="colophon" role="contentinfo">
			<?php
				/* A sidebar in the footer? Yep. You can can customize
				 * your footer with three columns of widgets.
				 */
				get_sidebar( 'footer' );
			?>
           <?php if ( has_nav_menu( 'footer', 'catchbox' ) ) {
				// Check is footer menu is enable or not
				$options = catchbox_get_theme_options();
				if ( !empty ($options ['enable_menus'] ) ) :
					$menuclass = "mobile-enable";
				else :
					$menuclass = "mobile-disable";
				endif;
				?>
                <nav id="access-footer" class="<?php echo $menuclass; ?>" role="navigation">
                	<h3 class="assistive-text"><?php _e( 'Footer menu', 'catchbox' ); ?></h3>
                    <?php wp_nav_menu( array( 'theme_location'  => 'footer', 'container_class' => 'menu-footer-container', 'depth' => 1 ) );  ?>
                </nav>
            <?php } ?>
      
			<div id="site-generator" class="clearfix">
				<div class="AdSense_footer">
<!-- Google AdSense -->
<script type="text/javascript"><!--
google_ad_client = "pub-5304698484375947";
/* KIA Soul Club Russia 728x90 - footer */
google_ad_slot = "3965669749";
google_ad_width = 728;
google_ad_height = 90;
//-->
</script>
<script type="text/javascript" src="http://pagead2.googlesyndication.com/pagead/show_ads.js"></script>
<!-- / Google AdSense -->
      	</div>
      
      	<div class="clear">&nbsp;</div>

				<div class="facebook">
      		<script src="http://connect.facebook.net/en_US/all.js#xfbml=1"></script><fb:like-box href="http://www.facebook.com/KIASoulClubRussia" width="860" show_faces="true" stream="false" header="true"></fb:like-box>
				</div>
			
				<div class="clear">&nbsp;</div>
      
				<div class="fll">
					<!--Donate--><a href="http://www.kiasoul.su/forum/viewtopic.php?f=18&t=282#p3999" title="Пожертвования и спонсорство" target="_blank"><img src="/img/donate.jpg" alt="Пожертвования и спонсорство" /></a><!--/Donate-->
					<!--Photo album--><a href="http://www.kiasoul.su/forum/viewtopic.php?f=18&t=443#p9236" title="Фотографии KIA Soul" target="_blank"><img src="/img/photoalbum_kia_soul.gif" alt="Фотографии KIA Soul" /></a><!--/Photo album-->
					<!--Advertising--><a href="http://www.kiasoul.su/advertising/" title="Реклама KIA Soul Club Russia"><img src="/forum/promo/advertising.gif" alt="Реклама KIA Soul Club Russia"/></a><!--/Advertising-->
					<!--Parking--><a href="http://www.kiasoul.su/forum/soulstyle/page.php" title="Клубная парковка KIA Soul Club Russia"><img src="/forum/promo/kia_soul_parking.jpg" alt="Клубная парковка KIA Soul Club Russia"/></a><!--/Parking-->
				</div>
            	<?php do_action( 'catchbox_startgenerator_open' ); ?>
            	<div class="copyright">
                	<a href="<?php echo home_url('/') ?>" title="<?php echo esc_attr(get_bloginfo('name', 'display')); ?>"><?php bloginfo('name'); ?></a><?php esc_attr_e(' &copy; 2009 -', 'catchbox'); ?> <?php _e(date('Y')); ?>
                  <?php esc_attr_e('. All Rights Reserved.', 'catchbox'); ?>
                </div>
                <div class="powered">
                	Kia Soul CLub Style by <a href="https://www.facebook.com/dima.dumchikov" target="_blank" title="Dima Dumchikov">Dima Dumchikov</a>
            	</div>
                <?php do_action( 'catchbox_startgenerator_close' ); ?>
          	</div> <!-- #site-generator -->
	</footer><!-- #colophon -->
	
</div><!-- #page -->

<?php wp_footer(); ?>
</body>
</html>