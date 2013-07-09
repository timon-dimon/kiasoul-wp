<?php
/**
 * The template for displaying content in the single.php template
 *
 * @package Catch Themes
 * @subpackage Catch_Box
 * @since Catch Box 1.0
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class('single-post'); ?>>
	<header class="entry-header">
		<h1 class="entry-title"><?php the_title(); ?></h1>
		<?php the_post_thumbnail('featured-slider'); ?>

		<?php if ( 'post' == get_post_type() ) : ?>
            <div class="entry-meta">
                <?php catchbox_posted_on(); ?>
                <?php if ( comments_open() && ! post_password_required() ) : ?>
                    <span class="sep"> &mdash; </span>
                    <span class="comments-link">
                        <?php comments_popup_link(__('No Comments &darr;', 'catchbox'), __('1 Comment &darr;', 'catchbox'), __('% Comments &darr;', 'catchbox')); ?>
                    </span>
                <?php endif; ?>
            </div><!-- .entry-meta -->
		<?php endif; ?>
	</header><!-- .entry-header -->

	<div class="entry-content">
		<?php the_content(); ?>
		
		<!-- Verify there is a link or not discuss_url -->
		<?php if( get_field( "discuss_url" ) ): ?>
		 <a href="<?php the_field('discuss_url'); ?>" title="Обсудить новость на форуме Kia Soul">Обсудить новость на форуме Kia Soul</a>
		<?php endif ?>
		
		<!-- Verify the source is news or not -->
		<?php if( get_field( "source_url" ) ): ?>
		 <noindex><a href="<?php the_field('source_url'); ?>" title="Источник новости KIA Soul" target="_blank">Источник новости</a></noindex>
		<?php endif ?>
		
		<?php wp_link_pages( array( 
			'before'		=> '<div class="page-link"><span class="pages">' . __( 'Pages:', 'catchbox' ) . '</span>',
			'after'			=> '</div>',
			'link_before' 	=> '<span>',
			'link_after'   	=> '</span>',
		) ); 
		?>
	</div><!-- .entry-content -->

	<footer class="entry-meta">
		<?php edit_post_link( __( 'Edit', 'catchbox' ), '<span class="edit-link">', '</span>' ); ?>
	</footer><!-- .entry-meta -->
</article><!-- #post-<?php the_ID(); ?> -->

<?php if ( get_the_author_meta( 'description' ) && ( ! function_exists( 'is_multi_author' ) || is_multi_author() ) ) : // If a user has filled out their description and this is a multi-author blog, show a bio on their entries ?>
		<div id="author-info">
			<div id="author-avatar">
				<?php echo get_avatar( get_the_author_meta( 'user_email' ), apply_filters( 'catchbox_author_bio_avatar_size', 68 ) ); ?>
			</div><!-- #author-avatar -->
			<div id="author-description">
				<h2><?php printf( __( 'About %s', 'catchbox' ), get_the_author() ); ?></h2>
				<?php the_author_meta( 'description' ); ?>
				<div id="author-link">
					<a href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ); ?>" rel="author">
						<?php printf( __( 'View all posts by %s <span class="meta-nav">&rarr;</span>', 'catchbox' ), get_the_author() ); ?>
					</a>
				</div><!-- #author-link	-->
			</div><!-- #author-description -->
		</div><!-- #entry-author-info -->
<?php endif; ?>        
