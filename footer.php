<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Zuragon
 */

?>

	<footer>
		<div class="container">
			<div class="row">
				<div class="col-12">
					<div class="footer-top">
						<div class="row">
							<div class="col-lg-3 widget-border"><?php dynamic_sidebar('footer-1'); ?></div>
							<div class="col-lg-5 widget-border"><?php dynamic_sidebar('footer-2'); ?></div>
							<div class="col-lg-4"><?php dynamic_sidebar('footer-3'); ?></div>
						</div>
					</div>
					<div class="footer-bottom">
						<?php printf( esc_html__( '2018 &copy; Zuragon. All rights reserved.', 'zuragon' ) ); ?>
					</div>
				</div>
			</div>
		</div>
	</footer>
	<div class="toTop"><img src="/wp-content/themes/zuragon/images/site-icons/icon-arrow-top.png"></div>



	<link rel="stylesheet" type="text/css" href="http://kenwheeler.github.io/slick/slick/slick.css"/>
	<script type="text/javascript" src="//code.jquery.com/jquery-1.11.0.min.js"></script>
	<script type="text/javascript" src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
	<script type="text/javascript" src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
	<script type="text/javascript" src="http://kenwheeler.github.io/slick/slick/slick.js"></script>

	  <script type="text/javascript">
		$(document).ready(function(){
		  $('.fade').slick({
			  dots: false,
			  infinite: true,
			  arrows: true,
			  autoplay: true,
			  autoplaySpeed: 8000,
			  speed: 500,
			  fade: true,
			  cssEase: 'linear'
			});
			$('.testimonials').slick({
			  dots: true,
			  infinite: true,
			  arrows: false,
			  autoplay: true,
			  autoplaySpeed: 5000,
			  speed: 500,
			  fade: true,
			  cssEase: 'linear'
			});
		});
	  </script>
	<script type="text/javascript">
		$(function() {
			$(window).scroll(function() {
				if($(this).scrollTop() != 0) {
					$('.toTop').fadeIn();
				} else {
					$('.toTop').fadeOut();
				}
			});
			$('.toTop').click(function() {
				$('body,html').animate({scrollTop:0},800);
			});
		});
	</script>
	
	<div class="popup_overlay"></div>
	<div class="popup">
		<div class="close"><img src="/wp-content/themes/zuragon/images/site-icons/icon-close.png"></div>
		<script>
		(function($) {
$(function() {

	$('ul.tabs__caption_user').on('click', 'li:not(.active)', function() {
		$(this)
			.addClass('active').siblings().removeClass('active')
			.closest('div.tabs_user').find('div.tabs__content_user').removeClass('active').eq($(this).index()).addClass('active');
	});

});
})(jQuery);
		</script>
		<div class="popup_content tabs_user">
			<ul class="tabs__caption_user">
				<li class="active"><span>Login</span></li>
				<li><span>Sign up</span></li>
			</ul>
			<div class="tabs__content_user active">
				<h3>Login</h3>
				<?php echo'<form name="loginform" id="loginform" action="'; bloginfo('url'); echo'/wp-login.php" method="post"> 
					<label><input type="email" placeholder="Your email" name="log" id="user_login" /></label> 
					<label><input type="password" placeholder="Password" name="pwd" id="user_pass" /></label> 
					<label class="checkbox-label"><div class="custom-control custom-checkbox" style="display: inherit;"><input name="rememberme" class="custom-control-input" type="checkbox" id="customCheck1" value="forever" /> <label class="custom-control-label" for="customCheck1">stay signed in</label></div><a href="/wp-login.php?action=lostpassword">Forgit password?</a></label>
					<input type="submit" name="wp-submit" id="wp-submit" value="Sign Up" /> 
					<input type="hidden" name="redirect_to" value="'; bloginfo('url'); echo'" /> 
					<input type="hidden" name="testcookie" value="1" /> 
				</form>';?>
				<p class="bottom-form"><a href="#">Any problem contact a support</a></p>
			</div>
			<div class="tabs__content_user">
				<h3>Create a new account</h3>
				<?php echo do_shortcode('[erforms id="152"]'); ?> 
				<p class="bottom-form"><a href="#">Any problem contact a support</a></p>
			</div>
		</div>
	</div>
	
	<script>
		$(function(){
			$('.open_window').click(function(){
				$('.popup,.popup_overlay').fadeIn(400);
			});
			$('.close,.popup_overlay').click(function(){
				$('.popup,.popup_overlay').fadeOut(400);
			});
		});
	</script>
	<script>
$(document).ready(function() {


   $("a").click(function() {
      $("html, body").animate({
         scrollTop: $($(this).attr("href")).offset().top + "px"
      }, {
         duration: 500,
         easing: "swing"
      });
      return false;
   });


});
	</script>
	
	
	<script>
		jQuery('.wpcf7-list-item-label').on('click', function() {
			var corrChkbx = jQuery(this).prev('input[type="checkbox"]'),
			checkedVal = corrChkbx.prop('checked');
			corrChkbx.prop('checked', !checkedVal);
		})
		
		
		jQuery('.wpcf7-radio .wpcf7-list-item-label').on('click', function() {
			var corrChkbx2 = jQuery(this).prev('input[name="pciecards"]'),
			checkedVal2 = corrChkbx2.prop('checked');
			corrChkbx2.prop('checked', !checkedVal2);
		})
	</script>
	
<?php wp_footer(); ?>

	<style>
	.erf-container .erf-form .erf-submit-button .form-group {
		width: 100% !important;
	}
	</style>
	
</body>
</html>
