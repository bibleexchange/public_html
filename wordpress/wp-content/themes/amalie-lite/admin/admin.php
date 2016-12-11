<?php

/***** Theme Info Page *****/

if (!function_exists('amalie_theme_info_page')) {
	function amalie_theme_info_page() {
		add_theme_page(esc_html__('Welcome to Amalie Lite', 'amalie'), esc_html__('Theme Info', 'amalie'), 'edit_theme_options', 'blog', 'amalie_display_theme_page');
	}
}
add_action('admin_menu', 'amalie_theme_info_page');

if (!function_exists('amalie_display_theme_page')) {
	function amalie_display_theme_page() {
		$theme_data = wp_get_theme(); ?>
		<div class="theme-info-wrap">
			<h1>
				<?php printf(esc_html__('Welcome to %1s %2s', 'amalie'), $theme_data->Name, $theme_data->Version); ?>
			</h1>
			<div class="theme-description">
				<?php echo $theme_data->Description; ?>
			</div>
			<hr>
			<div id="getting-started">
				<h3>
					<?php printf(esc_html__('Getting Started with %s', 'amalie'), $theme_data->Name); ?>
				</h3>
				<div class="ad-row clearfix">
					<div class="ad-col-1-2">
						<div class="section">
							<h4>
								<?php esc_html_e('Theme Documentation', 'amalie'); ?>
							</h4>
							<p class="about">
								<?php printf(esc_html__('Please check the documentation to get better overview of how the theme is structured.', 'amalie'), $theme_data->Name); ?>
							</p>
							<p>
								<a href="<?php echo esc_url('http://www.anarieldesign.com/documentation/amalielite/'); ?>" target="_blank" class="button button-secondary">
									<?php esc_html_e('Visit Documentation', 'amalie'); ?>
								</a>
							</p>
						</div>
						<div class="section">
							<h4>
								<?php esc_html_e('Theme Options', 'amalie'); ?>
							</h4>
							<p class="about">
								<?php printf(esc_html__('Click "Customize" to open the Customizer.',  'amalie'), $theme_data->Name); ?>
							</p>
							<p>
								<a href="<?php echo admin_url('customize.php'); ?>" class="button button-primary">
									<?php esc_html_e('Customize', 'amalie'); ?>
								</a>
							</p>
						</div>
						<div class="section">
							<h4>
								<?php esc_html_e('Amalie Pro', 'amalie'); ?>
							</h4>
							<p class="about">
								<?php esc_html_e('Full version of this theme includes additional features; additional page templates, WooCommerce support, color options & premium theme support.', 'amalie'); ?>
							</p>
							<p>
								<a href="<?php echo esc_url('http://www.anarieldesign.com/themes/personal-blog-wordpress-theme/'); ?>" target="_blank" class="button button-secondary">
									<?php esc_html_e('Read more about Amalie', 'amalie'); ?>
								</a>
							</p>
						</div>
					</div>
					<div class="ad-col-1-2">
						<img src="<?php echo get_template_directory_uri(); ?>/screenshot.png" alt="<?php esc_html_e('Theme Screenshot', 'amalie'); ?>" />
					</div>
				</div>
			</div>
			<hr>
			<div id="theme-author">
				<p>
					<?php printf(esc_html__('%1s is proudly brought to you by %2s. If you like %3s: %4s.', 'amalie'), $theme_data->Name, '<a target="_blank" href="http://www.anarieldesign.com/" title="Anariel Design">Anariel Design</a>', $theme_data->Name, '<a target="_blank" href="https://wordpress.org/support/view/theme-reviews/amalie-lite?filter=5" title="Amalie Lite Review">' . esc_html__('Rate this theme', 'amalie') . '</a>'); ?>
				</p>
			</div>
		</div><?php
	}
}

?>