<?php
/**
 * The default template for displaying content
 *
 * @package Catch Themes
 * @subpackage Catch_Box
 * @since Catch Box 1.0
 */
?>

	<article id="post-<?php the_ID(); ?>" <?php post_class('previewNewsList'); ?> >
		<?php if( has_post_thumbnail() ):?>
      <div class="thumb">
      
				<?php if (get_field('ext_url') == ""): ?>
					<!-- ext_url = empty -->
					<a href="<?php the_permalink(); ?>" title="<?php printf( esc_attr__( 'KIA Soul - %s', 'catchbox' ), the_title_attribute( 'echo=0' ) ); ?>" rel="bookmark"><?php the_post_thumbnail('featured-slider'); ?></a>
						<?php else: ?>
						<a href="<?php the_field('ext_url'); ?>" title="<?php printf( esc_attr__( 'KIA Soul - %s', 'catchbox' ), the_title_attribute( 'echo=0' ) ); ?>" rel="bookmark"><?php the_post_thumbnail('featured-slider'); ?></a>
				<?php endif ?>

      </div>
		<?php endif; ?>
		
		<header class="entry-header">
		<?php if ( 'post' == get_post_type() ) : ?>
      <div class="date"><?php catchbox_posted_on(); ?></div>
      <h1>
      
      	<?php if (get_field('ext_url') == ""): ?>
					<!-- ext_url = empty -->
					<a href="<?php the_permalink(); ?>" title="<?php printf( esc_attr__( 'KIA Soul - %s', 'catchbox' ), the_title_attribute( 'echo=0' ) ); ?>" rel="bookmark"><?php the_title(); ?></a>
						<?php else: ?>
						<a href="<?php the_field('ext_url'); ?>" title="<?php printf( esc_attr__( 'KIA Soul - %s', 'catchbox' ), the_title_attribute( 'echo=0' ) ); ?>" rel="bookmark"><?php the_title(); ?></a>
				<?php endif ?>

      </h1>
		<?php endif; ?>
		</header><!-- .entry-header -->
        	
		 <?php 
		 	$options = catchbox_get_theme_options();
			$current_content_layout = $options['content_layout'];
			$catchbox_excerpt = get_the_excerpt();
			
			if ( is_search() ) : // Only display Excerpts for Search ?>
        <div class="entry-summary">
	        <?php the_excerpt(); ?>
        </div><!-- .entry-summary -->
        <?php elseif ( $current_content_layout=='excerpt' && !empty( $catchbox_excerpt ) ) : // Only display Featured Image and Excerpts if checked in Theme Option ?>
        <?php the_excerpt(); ?>
        
		<?php else : ?>
		<div class="entry-content">
			<?php the_content( __( 'Continue reading <span class="meta-nav">&rarr;</span>', 'catchbox' ) ); ?>
			<?php wp_link_pages( array( 
                'before'		=> '<div class="page-link"><span class="pages">' . __( 'Pages:', 'catchbox' ) . '</span>',
                'after'			=> '</div>',
                'link_before' 	=> '<span>',
                'link_after'   	=> '</span>',
            ) ); 
            ?>
		</div><!-- .entry-content -->
		<?php endif; ?>


			<!-- Переход с анонса на другую страницу или ресурс -->
			<?php if (get_field('ext_url') == ""): ?>
				<div class="div-more-link"><?php edit_post_link( __( 'Edit', 'catchbox' ), '<div class="div-edit-link"><span class="edit-link">', '</span></div>' ); ?><a class="more-link" href="<?php the_permalink(); ?>" title="<?php printf( esc_attr__( 'KIA Soul - %s', 'catchbox' ), the_title_attribute( 'echo=0' ) ); ?>">Читать далее</a></div>
				<?php else: ?>
				<div class="div-more-link"><?php edit_post_link( __( 'Edit', 'catchbox' ), '<div class="div-edit-link"><span class="edit-link">', '</span></div>' ); ?><a class="more-link" href="<?php the_field('ext_url'); ?>" title="<?php printf( esc_attr__( 'KIA Soul - %s', 'catchbox' ), the_title_attribute( 'echo=0' ) ); ?>">Читать далее</a></div>
			<?php endif ?>


		<footer class="entry-meta footer-meta">
			<?php $show_sep = false; ?>
			<?php if ( 'post' == get_post_type() ) : // Hide category and tag text for pages on Search ?>
			<?php
				/* translators: used between list items, there is a space after the comma */
				$categories_list = get_the_category_list( __( ', ', 'catchbox' ) );
				if ( $categories_list ):
			?>
			<?php endif; // End if categories ?>
			<?php
				/* translators: used between list items, there is a space after the comma */
				$tags_list = get_the_tag_list( '', __( ', ', 'catchbox' ) );
				if ( $tags_list ):
				if ( $show_sep ) : ?>
				<span class="sep"> | </span>
			<?php endif; // End if $show_sep ?>
			<span class="tag-links">
				<?php printf( __( '<span class="%1$s">Tagged</span> %2$s', 'catchbox' ), 'entry-utility-prep entry-utility-prep-tag-links', $tags_list );
				$show_sep = true; ?>
			</span>
			<?php endif; // End if $tags_list ?>
			<?php endif; // End if 'post' == get_post_type() ?>

			<?php if ( comments_open() ) : ?>
			<?php if ( $show_sep ) : ?>
			<span class="sep"> | </span>
			<?php endif; // End if $show_sep ?>
			<?php endif; // End if comments_open() ?>
			
		</footer><!-- #entry-meta -->
	</article><!-- #post-<?php the_ID(); ?> -->
