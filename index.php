<?php
/**
 * The main template file.
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package Catch Themes
 * @subpackage Catch_Box
 */

get_header(); ?>            	

	<div class="indexText">
		<h1 class="h1mainsite">KIA Soul Club Russia - Все об автомобиле KIA Soul</h1>
		<p>Приветствуем Вас на сайте <strong>KIA Soul Club Russia</strong> (Российский клуб владельцев Kia Soul), клуба владельцев и любителей легкого кроссовера от компании <strong>Kia</strong>.</p>
		<p>Для Вашего общения и обмена информацией сайт содержит <a title="Форум KIA Soul Club Russia (форум КИА Соул)" href="../forum"><strong>тематический форум</strong></a>. На форуме Вы сможете получить детальную информацию о комплектациях и характеристиках <strong>Kia Soul</strong>. Ознакомиться с <strong>отзывами владельцев Kia Soul</strong>, которые помогут сделать выбор. Узнаете их мнение об автомобиле.</p>
		<p>Мы рады всем владельцам и любителям <strong>Kia Soul</strong> (КИА Соул). И предлагаем объединиться в зоне .SU всем автовладельцам Kia Soul на территории бывшего Союза.</p>
		<p align="right">С уважением, Администрация</p>
		<h3 class="widget-title">Новости KIA Soul Club Russia</h3>
	</div>

			<?php if ( have_posts() ) : ?>

				<?php /* Start the Loop */ ?>
				<?php while ( have_posts() ) : the_post(); ?>

					<?php get_template_part( 'content', get_post_format() ); ?>

				<?php endwhile; ?>

				<?php catchbox_content_nav( 'nav-below' ); ?>

			<?php else : ?>
				<article id="post-0" class="post no-results not-found">
					<header class="entry-header">
						<h1 class="entry-title"><?php _e( 'Nothing Found', 'catchbox' ); ?></h1>
					</header><!-- .entry-header -->

					<div class="entry-content">
						<p><?php _e( 'Apologies, but no results were found for the requested archive. Perhaps searching will help find a related post.', 'catchbox' ); ?></p>
						<?php get_search_form(); ?>
					</div><!-- .entry-content -->
				</article><!-- #post-0 -->
			<?php endif; ?>

			</div><!-- #content -->
		</div><!-- #primary -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>