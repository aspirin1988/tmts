<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package tmts
 */

?>

	<!-- Footer -->
	<footer class="main-footer">
		<div class="uk-container uk-container-center">
			<section class="footer-inner uk-grid">
				<aside class="footer-nav uk-width-1-1 uk-width-medium-4-6 uk-width-large-5-6">
					<h3><?php bloginfo('description'); ?></h3>
					<?php $primaryMenuItems = wp_get_nav_menu_items('primary'); ?>
					<div class="uk-list uk-hidden-small">
						<?php foreach($primaryMenuItems as $key => $value) : ?>
							<li><a href="<?=$value->url ?>"><?=$value->title ?></a></li>
						<?php endforeach; ?>
					</div>
				</aside>
				<aside class="footer-contacts uk-width-1-1 uk-width-medium-2-6 uk-width-large-1-6">
					<p><?php the_field('address', 5)?></p>
					<p>
						<p><?php the_field('phone-1', 5)?></p>
						<p><?php the_field('phone-2', 5)?></p>
					</p>
					<p><p><?php the_field('email', 5)?></p></p>
				</aside>
				<div class="copyright uk-text-center uk-width-1-1">
					<p class="copyright-top">&copy; Все права защищены 2016 tmts.kz</p>
					<p><span>Разработано компанией<a href="https://b-link.kz" target="_blank"> B-Link.kz</a></span></p>
				</div>
			</section>
		</div>
	</footer><!-- Footer end -->

	<!-- Callback modal -->
	<div id="callback" class="uk-modal">
		<div class="uk-modal-dialog">
			<a class="uk-modal-close uk-close"></a>
			<form class="uk-form blink-mailer">
				<h2>Обратный звонок</h2>
				<div class="uk-form-row">
					<label for="">ФИО</label>
					<input type="text" name="ФИО" id="" placeholder="ФИО">
				</div>
				<div class="uk-form-row">
					<label for="">Телефон</label>
					<input type="text" name="Телефон" id="" placeholder="+7 777 777 77 77">
				</div>
				<div class="uk-form-row">
					<label for="">E-mail</label>
					<input type="text" name="Почта" id="" placeholder="E-mail">
				</div>
				<div class="uk-form-row uk-text-right">
					<input type="submit" value="Заказать" class="uk-button uk-button-primary">
				</div>
			</form>
		</div>
	</div><!-- Callback -->

	<!-- Scripts -->
	<script src="<?php bloginfo('template_url'); ?>/bower_components/jquery/dist/jquery.min.js"></script>
	<script src="<?php bloginfo('template_url'); ?>/bower_components/uikit/js/uikit.min.js"></script>
	<script src="<?php bloginfo('template_url'); ?>/bower_components/uikit/js/components/parallax.min.js"></script>
	<script src="<?php bloginfo('template_url'); ?>/bower_components/uikit/js/components/slideshow.min.js"></script>
	<script src="<?php bloginfo('template_url'); ?>/bower_components/uikit/js/components/slideshow-fx.min.js"></script>
	<script src="<?php bloginfo('template_url'); ?>/bower_components/uikit/js/components/lightbox.min.js"></script>
	<script src="<?php bloginfo('template_url'); ?>/public/js/app.js"></script>
	<script src="https://callback.blink.kz/resources/callback/js/mailer.js"></script>
	<script type="text/javascript">
		var submitSMG = new BMModule();
		submitSMG.submitForm(function(success) {}, function(error) {});
	</script>
	<script type="text/javascript" src="http://callback.blink.kz/client/script/GET/"></script>

	<?php the_field('google-metrics', 5); ?>
	<?php the_field('yandex-metrics', 5); ?>

</body>
</html>


