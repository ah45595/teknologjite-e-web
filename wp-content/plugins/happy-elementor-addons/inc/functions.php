<?php

/**
 * Helper functions
 *
 * @package Happy_Addons
 */
defined('ABSPATH') || die();

use Happy_Addons\Elementor\Widget\Mailchimp\Mailchimp_api;

/**
 * Call a shortcode function by tag name.
 *
 * @since  1.0.0
 *
 * @param string $tag     The shortcode whose function to call.
 * @param array  $atts    The attributes to pass to the shortcode function. Optional.
 * @param array  $content The shortcode's content. Default is null (none).
 *
 * @return string|bool False on failure, the result of the shortcode on success.
 */
function ha_do_shortcode($tag, array $atts = [], $content = null) {
	global $shortcode_tags;
	if (!isset($shortcode_tags[$tag])) {
		return false;
	}
	return call_user_func($shortcode_tags[$tag], $atts, $content, $tag);
}

/**
 * Sanitize html class string
 *
 * @param $class
 * @return string
 */
function ha_sanitize_html_class_param($class) {
	$classes   = !empty($class) ? explode(' ', $class) : [];
	$sanitized = [];
	if (!empty($classes)) {
		$sanitized = array_map(function ($cls) {
			return sanitize_html_class($cls);
		}, $classes);
	}
	return implode(' ', $sanitized);
}

function ha_is_script_debug_enabled() {
	return (defined('SCRIPT_DEBUG') && SCRIPT_DEBUG);
}

/**
 * @param $settings
 * @param array $field_map
 */

function ha_prepare_data_prop_settings(&$settings, $field_map = []) {
	$data = [];
	foreach ($field_map as $key => $data_key) {
		$setting_value                          = ha_get_setting_value($settings, $key);
		list($data_field_key, $data_field_type) = explode('.', $data_key);
		$validator                              = $data_field_type . 'val';

		if (is_callable($validator)) {
			$val = call_user_func($validator, $setting_value);
		} else {
			$val = $setting_value;
		}
		$data[$data_field_key] = $val;
	}
	return wp_json_encode($data);
}

/**
 * @param $settings
 * @param $keys
 * @return mixed
 */
function ha_get_setting_value(&$settings, $keys) {
	if (!is_array($keys)) {
		$keys = explode('.', $keys);
	}
	if (is_array($settings[$keys[0]])) {
		return ha_get_setting_value($settings[$keys[0]], array_slice($keys, 1));
	}
	return $settings[$keys[0]];
}

function ha_is_localhost() {
	return isset($_SERVER['REMOTE_ADDR']) && in_array($_SERVER['REMOTE_ADDR'], ['127.0.0.1', '::1']);
}

function ha_get_css_cursors() {
	return [
		'default'      => __('Default', 'happy-elementor-addons'),
		'alias'        => __('Alias', 'happy-elementor-addons'),
		'all-scroll'   => __('All scroll', 'happy-elementor-addons'),
		'auto'         => __('Auto', 'happy-elementor-addons'),
		'cell'         => __('Cell', 'happy-elementor-addons'),
		'context-menu' => __('Context menu', 'happy-elementor-addons'),
		'col-resize'   => __('Col-resize', 'happy-elementor-addons'),
		'copy'         => __('Copy', 'happy-elementor-addons'),
		'crosshair'    => __('Crosshair', 'happy-elementor-addons'),
		'e-resize'     => __('E-resize', 'happy-elementor-addons'),
		'ew-resize'    => __('EW-resize', 'happy-elementor-addons'),
		'grab'         => __('Grab', 'happy-elementor-addons'),
		'grabbing'     => __('Grabbing', 'happy-elementor-addons'),
		'help'         => __('Help', 'happy-elementor-addons'),
		'move'         => __('Move', 'happy-elementor-addons'),
		'n-resize'     => __('N-resize', 'happy-elementor-addons'),
		'ne-resize'    => __('NE-resize', 'happy-elementor-addons'),
		'nesw-resize'  => __('NESW-resize', 'happy-elementor-addons'),
		'ns-resize'    => __('NS-resize', 'happy-elementor-addons'),
		'nw-resize'    => __('NW-resize', 'happy-elementor-addons'),
		'nwse-resize'  => __('NWSE-resize', 'happy-elementor-addons'),
		'no-drop'      => __('No-drop', 'happy-elementor-addons'),
		'not-allowed'  => __('Not-allowed', 'happy-elementor-addons'),
		'pointer'      => __('Pointer', 'happy-elementor-addons'),
		'progress'     => __('Progress', 'happy-elementor-addons'),
		'row-resize'   => __('Row-resize', 'happy-elementor-addons'),
		's-resize'     => __('S-resize', 'happy-elementor-addons'),
		'se-resize'    => __('SE-resize', 'happy-elementor-addons'),
		'sw-resize'    => __('SW-resize', 'happy-elementor-addons'),
		'text'         => __('Text', 'happy-elementor-addons'),
		'url'          => __('URL', 'happy-elementor-addons'),
		'w-resize'     => __('W-resize', 'happy-elementor-addons'),
		'wait'         => __('Wait', 'happy-elementor-addons'),
		'zoom-in'      => __('Zoom-in', 'happy-elementor-addons'),
		'zoom-out'     => __('Zoom-out', 'happy-elementor-addons'),
		'none'         => __('None', 'happy-elementor-addons'),
	];
}

function ha_get_css_blend_modes() {
	return [
		'normal'      => __('Normal', 'happy-elementor-addons'),
		'multiply'    => __('Multiply', 'happy-elementor-addons'),
		'screen'      => __('Screen', 'happy-elementor-addons'),
		'overlay'     => __('Overlay', 'happy-elementor-addons'),
		'darken'      => __('Darken', 'happy-elementor-addons'),
		'lighten'     => __('Lighten', 'happy-elementor-addons'),
		'color-dodge' => __('Color Dodge', 'happy-elementor-addons'),
		'color-burn'  => __('Color Burn', 'happy-elementor-addons'),
		'saturation'  => __('Saturation', 'happy-elementor-addons'),
		'difference'  => __('Difference', 'happy-elementor-addons'),
		'exclusion'   => __('Exclusion', 'happy-elementor-addons'),
		'hue'         => __('Hue', 'happy-elementor-addons'),
		'color'       => __('Color', 'happy-elementor-addons'),
		'luminosity'  => __('Luminosity', 'happy-elementor-addons'),
	];
}

/**
 * Check elementor version
 *
 * @param string $version
 * @param string $operator
 * @return bool
 */
function ha_is_elementor_version($operator = '<', $version = '2.6.0') {
	return defined('ELEMENTOR_VERSION') && version_compare(ELEMENTOR_VERSION, $version, $operator);
}

/**
 * Render icon html with backward compatibility
 *
 * @param array $settings
 * @param string $old_icon_id
 * @param string $new_icon_id
 * @param array $attributes
 */
function ha_render_icon($settings = [], $old_icon_id = 'icon', $new_icon_id = 'selected_icon', $attributes = []) {
	// Check if its already migrated
	$migrated = isset($settings['__fa4_migrated'][$new_icon_id]);
	// Check if its a new widget without previously selected icon using the old Icon control
	$is_new = empty($settings[$old_icon_id]);

	$attributes['aria-hidden'] = 'true';

	if (ha_is_elementor_version('>=', '2.6.0') && ($is_new || $migrated)) {
		\Elementor\Icons_Manager::render_icon($settings[$new_icon_id], $attributes);
	} else {
		if (empty($attributes['class'])) {
			$attributes['class'] = $settings[$old_icon_id];
		} else {
			if (is_array($attributes['class'])) {
				$attributes['class'][] = $settings[$old_icon_id];
			} else {
				$attributes['class'] .= ' ' . $settings[$old_icon_id];
			}
		}
		printf('<i %s></i>', \Elementor\Utils::render_html_attributes($attributes));
	}
}

/**
 * List of happy icons
 *
 * @return array
 */
function ha_get_happy_icons() {
	return \Happy_Addons\Elementor\Icons_Manager::get_happy_icons();
}

/**
 * Get elementor instance
 *
 * @return \Elementor\Plugin
 */
function ha_elementor() {
	return \Elementor\Plugin::instance();
}

/**
 * Escaped title html tags
 *
 * @param string $tag input string of title tag
 * @return string $default default tag will be return during no matches
 */

function ha_escape_tags($tag, $default = 'span', $extra = []) {

	$supports = ['h1', 'h2', 'h3', 'h4', 'h5', 'h6', 'div', 'span', 'p'];

	$supports = array_merge($supports, $extra);

	if (!in_array($tag, $supports, true)) {
		return $default;
	}

	return $tag;
}

/**
 * Get a list of all the allowed html tags.
 *
 * @param string $level Allowed levels are basic and intermediate
 * @return array
 */
function ha_get_allowed_html_tags($level = 'basic') {
	$allowed_html = [
		'b'      => [
			'class' => [],
			'id'    => [],
			'style' => [],
		],
		'i'      => [
			'class' => [],
			'id'    => [],
			'style' => [],
		],
		'u'      => [
			'class' => [],
			'id'    => [],
			'style' => [],
		],
		's'      => [
			'class' => [],
			'id'    => [],
			'style' => [],
		],
		'br'     => [
			'class' => [],
			'id'    => [],
			'style' => [],
		],
		'em'     => [
			'class' => [],
			'id'    => [],
			'style' => [],
		],
		'del'    => [
			'class' => [],
			'id'    => [],
			'style' => [],
		],
		'ins'    => [
			'class' => [],
			'id'    => [],
			'style' => [],
		],
		'sub'    => [
			'class' => [],
			'id'    => [],
			'style' => [],
		],
		'sup'    => [
			'class' => [],
			'id'    => [],
			'style' => [],
		],
		'code'   => [
			'class' => [],
			'id'    => [],
			'style' => [],
		],
		'mark'   => [
			'class' => [],
			'id'    => [],
			'style' => [],
		],
		'small'  => [
			'class' => [],
			'id'    => [],
			'style' => [],
		],
		'strike' => [
			'class' => [],
			'id'    => [],
			'style' => [],
		],
		'abbr'   => [
			'title' => [],
			'class' => [],
			'id'    => [],
			'style' => [],
		],
		'span'   => [
			'class' => [],
			'id'    => [],
			'style' => [],
		],
		'strong' => [
			'class' => [],
			'id'    => [],
			'style' => [],
		],
	];

	if ('intermediate' === $level) {
		$tags = [
			'a'       => [
				'href'  => [],
				'title' => [],
				'class' => [],
				'id'    => [],
				'style' => [],
			],
			'q'       => [
				'cite'  => [],
				'class' => [],
				'id'    => [],
				'style' => [],
			],
			'img'     => [
				'src'    => [],
				'alt'    => [],
				'height' => [],
				'width'  => [],
				'class'  => [],
				'id'     => [],
				'style'  => [],
			],
			'dfn'     => [
				'title' => [],
				'class' => [],
				'id'    => [],
				'style' => [],
			],
			'time'    => [
				'datetime' => [],
				'class'    => [],
				'id'       => [],
				'style'    => [],
			],
			'cite'    => [
				'title' => [],
				'class' => [],
				'id'    => [],
				'style' => [],
			],
			'acronym' => [
				'title' => [],
				'class' => [],
				'id'    => [],
				'style' => [],
			],
			'hr'      => [
				'class' => [],
				'id'    => [],
				'style' => [],
			],
		];

		$allowed_html = array_merge($allowed_html, $tags);
	}

	return $allowed_html;
}

/**
 * Strip all the tags except allowed html tags
 *
 * The name is based on inline editing toolbar name
 *
 * @param string $string
 * @return string
 */
function ha_kses_intermediate($string = '') {
	return wp_kses($string, ha_get_allowed_html_tags('intermediate'));
}

/**
 * Strip all the tags except allowed html tags
 *
 * The name is based on inline editing toolbar name
 *
 * @param string $string
 * @return string
 */
function ha_kses_basic($string = '') {
	return wp_kses($string, ha_get_allowed_html_tags('basic'));
}

/**
 * Get a translatable string with allowed html tags.
 *
 * @param string $level Allowed levels are basic and intermediate
 * @return string
 */
function ha_get_allowed_html_desc($level = 'basic') {
	if (!in_array($level, ['basic', 'intermediate'])) {
		$level = 'basic';
	}

	$tags_str = '<' . implode('>,<', array_keys(ha_get_allowed_html_tags($level))) . '>';
	return sprintf(__('This input field has support for the following HTML tags: %1$s', 'happy-elementor-addons'), '<code>' . esc_html($tags_str) . '</code>');
}

function ha_has_pro() {
	return defined('HAPPY_ADDONS_PRO_VERSION');
}

function ha_get_b64_icon() {
	return 'data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHZpZXdCb3g9IjAgMCAzMiAzMiI+PGcgZmlsbD0iI0ZGRiI+PHBhdGggZD0iTTI4LjYgNy44aC44Yy41IDAgLjktLjUuOC0xIDAtLjUtLjUtLjktMS0uOC0zLjUuMy02LjgtMS45LTcuOC01LjMtLjEtLjUtLjYtLjctMS4xLS42cy0uNy42LS42IDEuMWMxLjIgMy45IDQuOSA2LjYgOC45IDYuNnoiLz48cGF0aCBkPSJNMzAgMTEuMWMtLjMtLjYtLjktMS0xLjYtMS0uOSAwLTEuOSAwLTIuOC0uMi00LS44LTctMy42LTguNC03LjEtLjMtLjYtLjktMS4xLTEuNi0xQzguMyAxLjkgMS44IDcuNC45IDE1LjEuMSAyMi4yIDQuNSAyOSAxMS4zIDMxLjIgMjAgMzQuMSAyOSAyOC43IDMwLjggMTkuOWMuNy0zLjEuMy02LjEtLjgtOC44em0tMTEuNiAxLjFjLjEtLjUuNi0uOCAxLjEtLjdsMy43LjhjLjUuMS44LjYuNyAxLjFzLS42LjgtMS4xLjdsLTMuNy0uOGMtLjQtLjEtLjgtLjYtLjctMS4xek0xMC4xIDExYy4yLTEuMSAxLjQtMS45IDIuNS0xLjYgMS4xLjIgMS45IDEuNCAxLjYgMi41LS4yIDEuMS0xLjQgMS45LTIuNSAxLjYtMS0uMi0xLjgtMS4zLTEuNi0yLjV6bTE0LjYgMTAuNkMyMi44IDI2IDE3LjggMjguNSAxMyAyN2MtMy42LTEuMi02LjItNC41LTYuNS04LjItLjEtMSAuOC0xLjcgMS43LTEuNmwxNS40IDIuNWMuOSAwIDEuNCAxIDEuMSAxLjl6Ii8+PHBhdGggZD0iTTE3LjEgMjIuOGMtMS45LS40LTMuNy4zLTQuNyAxLjctLjIuMy0uMS43LjIuOS42LjMgMS4yLjUgMS45LjcgMS44LjQgMy43LjEgNS4xLS43LjMtLjIuNC0uNi4yLS45LS43LS45LTEuNi0xLjUtMi43LTEuN3oiLz48L2c+PC9zdmc+';
}

/**
 * @param $suffix
 */
function ha_get_dashboard_link($suffix = '#home') {
	return add_query_arg(['page' => 'happy-addons' . $suffix], admin_url('admin.php'));
}

/**
 * @return mixed
 */
function ha_get_current_user_display_name() {
	$user = wp_get_current_user();
	$name = 'user';
	if ($user->exists() && $user->display_name) {
		$name = $user->display_name;
	}
	return $name;
}

/**
 * Twitter Feed Ajax call
 */
function ha_twitter_feed_ajax() {

	$security = check_ajax_referer('happy_addons_nonce', 'security');

	if (true == $security && isset($_POST['query_settings'])) :
		$settings    = $_POST['query_settings'];
		$loaded_item = $_POST['loaded_item'];

		$user_name      = trim($settings['user_name']);
		$ha_tweets_cash = '_' . $settings['id'] . '_tweet_cash';

		$transient_key = $user_name . $ha_tweets_cash;
		$twitter_data  = get_transient($transient_key);
		$credentials   = $settings['credentials'];

		$auth_response = wp_remote_post(
			'https://api.twitter.com/oauth2/token',
			[
				'method'      => 'POST',
				'httpversion' => '1.1',
				'blocking'    => true,
				'headers'     => [
					'Authorization' => 'Basic ' . $credentials,
					'Content-Type'  => 'application/x-www-form-urlencoded;charset=UTF-8',
				],
				'body'        => ['grant_type' => 'client_credentials'],
			]
		);

		$body = json_decode(wp_remote_retrieve_body($auth_response));

		if (!empty($body)) {
			$token           = $body->access_token;
			$tweets_response = wp_remote_get(
				'https://api.twitter.com/1.1/statuses/user_timeline.json?screen_name=' . $settings['user_name'] . '&count=999&tweet_mode=extended',
				[
					'httpversion' => '1.1',
					'blocking'    => true,
					'headers'     => ['Authorization' => "Bearer $token"],
				]
			);

			if (!is_wp_error($tweets_response)) {
				$twitter_data = json_decode(wp_remote_retrieve_body($tweets_response), true);
				set_transient($transient_key, $twitter_data, 0);
			}
		}
		if ('yes' == $settings['remove_cache']) {
			delete_transient($transient_key);
		}

		switch ($settings['sort_by']) {
			case 'old-posts':
				usort($twitter_data, function ($a, $b) {
					if ($a['created_at'] == $b['created_at']) {
						return 0;
					}

					return ($a['created_at'] < $b['created_at']) ? -1 : 1;
				});
				break;
			case 'favorite_count':
				usort($twitter_data, function ($a, $b) {
					if ($a['favorite_count'] == $b['favorite_count']) {
						return 0;
					}

					return ($a['favorite_count'] > $b['favorite_count']) ? -1 : 1;
				});
				break;
			case 'retweet_count':
				usort($twitter_data, function ($a, $b) {
					if ($a['retweet_count'] == $b['retweet_count']) {
						return 0;
					}

					return ($a['retweet_count'] > $b['retweet_count']) ? -1 : 1;
				});
				break;
			default:
				$twitter_data;
		}

		$items = array_splice($twitter_data, $loaded_item, $settings['tweets_limit']);

		foreach ($items as $item) :
			if (!empty($item['entities']['urls'])) {
				$content = str_replace($item['entities']['urls'][0]['url'], '', $item['full_text']);
			} else {
				$content = $item['full_text'];
			}

			$description = explode(' ', $content);
			if (!empty($settings['content_word_count']) && count($description) > $settings['content_word_count']) {
				$description_shorten = array_slice($description, 0, $settings['content_word_count']);
				$description         = implode(' ', $description_shorten) . '...';
			} else {
				$description = $content;
			}
?>
			<div class="ha-tweet-item">

				<?php if ('yes' == $settings['show_twitter_logo']) : ?>
					<div class="ha-tweeter-feed-icon">
						<i class="fa fa-twitter"></i>
					</div>
				<?php endif; ?>

				<div class="ha-tweet-inner-wrapper">

					<div class="ha-tweet-author">
						<?php if ('yes' == $settings['show_user_image']) : ?>
							<a href="<?php echo esc_url('https://twitter.com/' . $user_name); ?>">
								<img src="<?php echo esc_url($item['user']['profile_image_url_https']); ?>" alt="<?php echo esc_attr($item['user']['name']); ?>" class="ha-tweet-avatar">
							</a>
						<?php endif; ?>

						<div class="ha-tweet-user">
							<?php if ('yes' == $settings['show_name']) : ?>
								<a href="<?php echo esc_url('https://twitter.com/' . $user_name); ?>" class="ha-tweet-author-name">
									<?php echo esc_html($item['user']['name']); ?>
								</a>
							<?php endif; ?>

							<?php if ('yes' == $settings['show_user_name']) : ?>
								<a href="<?php echo esc_url('https://twitter.com/' . $user_name); ?>" class="ha-tweet-username">
									<?php echo esc_html($settings['user_name']); ?>
								</a>
							<?php endif; ?>
						</div>
					</div>

					<div class="ha-tweet-content">
						<p>
							<?php echo esc_html($description); ?>

							<?php if ('yes' == $settings['read_more']) : ?>
								<a href="<?php echo esc_url('//twitter.com/' . $item['user']['screen_name'] . '/status/' . $item['id']); ?>" target="_blank">
									<?php echo esc_html($settings['read_more_text']); ?>
								</a>
							<?php endif; ?>
						</p>

						<?php if ('yes' == $settings['show_date']) : ?>
							<div class="ha-tweet-date">
								<?php echo esc_html(date("M d Y", strtotime($item['created_at']))); ?>
							</div>
						<?php endif; ?>
					</div>

				</div>

				<?php if ('yes' == $settings['show_favorite'] || 'yes' == $settings['show_retweet']) : ?>
					<div class="ha-tweet-footer-wrapper">
						<div class="ha-tweet-footer">

							<?php if ('yes' == $settings['show_favorite']) : ?>
								<div class="ha-tweet-favorite">
									<?php echo esc_html($item['favorite_count']); ?>
									<i class="fa fa-heart-o"></i>
								</div>
							<?php endif; ?>

							<?php if ('yes' == $settings['show_retweet']) : ?>
								<div class="ha-tweet-retweet">
									<?php echo esc_html($item['retweet_count']); ?>
									<i class="fa fa-retweet"></i>
								</div>
							<?php endif; ?>

						</div>
					</div>
				<?php endif; ?>

			</div>
		<?php
		endforeach;
	endif;
	wp_die();
}
add_action('wp_ajax_ha_twitter_feed_action', 'ha_twitter_feed_ajax');
add_action('wp_ajax_nopriv_ha_twitter_feed_action', 'ha_twitter_feed_ajax');

/**
 * Get All Post Types
 * @param array $args
 * @param array $diff_key
 * @return array|string[]|WP_Post_Type[]
 */
function ha_get_post_types($args = [], $diff_key = []) {
	$default = [
		'public'            => true,
		'show_in_nav_menus' => true,
	];
	$args       = array_merge($default, $args);
	$post_types = get_post_types($args, 'objects');
	$post_types = wp_list_pluck($post_types, 'label', 'name');

	if (!empty($diff_key)) {
		$post_types = array_diff_key($post_types, $diff_key);
	}
	return $post_types;
}

/**
 * Get All Taxonomies
 * @param array $args
 * @param string $output
 * @param bool $list
 * @param array $diff_key
 * @return array|string[]|WP_Taxonomy[]
 */
function ha_get_taxonomies($args = [], $output = 'object', $list = true, $diff_key = []) {

	$taxonomies = get_taxonomies($args, $output);
	if ('object' === $output && $list) {
		$taxonomies = wp_list_pluck($taxonomies, 'label', 'name');
	}

	if (!empty($diff_key)) {
		$taxonomies = array_diff_key($taxonomies, $diff_key);
	}

	return $taxonomies;
}

/**
 * Post Tab Ajax call
 */
function ha_post_tab() {

	$security = check_ajax_referer('happy_addons_nonce', 'security');

	if (true == $security) :
		$settings   = $_POST['post_tab_query'];
		$post_type  = $settings['post_type'];
		$taxonomy   = $settings['taxonomy'];
		$item_limit = $settings['item_limit'];
		$excerpt    = $settings['excerpt'];
		$term_id    = $_POST['term_id'];

		$args = [
			'post_status'      => 'publish',
			'post_type'        => $post_type,
			'posts_per_page'   => $item_limit,
			'suppress_filters' => false,
			'tax_query'        => [
				[
					'taxonomy' => $taxonomy,
					'field'    => 'term_id',
					'terms'    => $term_id,
				],
			],
		];

		$posts = get_posts($args);

		if (count($posts) !== 0) :
		?>
			<div class="ha-post-tab-item-wrapper active" data-term="<?php echo esc_attr($term_id); ?>">
				<?php foreach ($posts as $post) : ?>
					<div class="ha-post-tab-item">
						<div class="ha-post-tab-item-inner">
							<?php if (has_post_thumbnail($post->ID)) : ?>
								<a href="<?php echo esc_url(get_the_permalink($post->ID)); ?>" class="ha-post-tab-thumb">
									<?php echo get_the_post_thumbnail($post->ID, 'full'); ?>
								</a>
							<?php endif; ?>
							<h2 class="ha-post-tab-title">
								<a href="<?php echo esc_url(get_the_permalink($post->ID)); ?>"> <?php echo esc_html($post->post_title); ?></a>
							</h2>
							<div class="ha-post-tab-meta">
								<span class="ha-post-tab-meta-author">
									<i class="fa fa-user-o"></i>
									<a href="<?php echo esc_url(get_author_posts_url($post->post_author)); ?>"><?php echo esc_html(get_the_author_meta('display_name', $post->post_author)); ?></a>
								</span>
								<?php
								$archive_year  = get_the_time('Y', $post->ID);
								$archive_month = get_the_time('m', $post->ID);
								$archive_day   = get_the_time('d', $post->ID);
								?>
								<span class="ha-post-tab-meta-date">
									<i class="fa fa-calendar-o"></i>
									<a href="<?php echo esc_url(get_day_link($archive_year, $archive_month, $archive_day)); ?>"><?php echo get_the_date("M d, Y", $post->ID); ?></a>
								</span>
							</div>
							<?php if ('yes' === $excerpt && !empty($post->post_excerpt)) : ?>
								<div class="ha-post-tab-excerpt">
									<p><?php echo esc_html($post->post_excerpt); ?></p>
								</div>
							<?php endif; ?>
						</div>
					</div>
				<?php endforeach; ?>
			</div>
<?php

		endif;
	endif;
	wp_die();
}
add_action('wp_ajax_ha_post_tab_action', 'ha_post_tab');
add_action('wp_ajax_nopriv_ha_post_tab_action', 'ha_post_tab');

if (!function_exists('ha_get_section_icon')) {
	/**
	 * Get happy addons icon for panel section heading
	 *
	 * @return string
	 */
	function ha_get_section_icon() {
		return '<i style="float: right" class="hm hm-happyaddons ha-section-icon"></i>';
	}
}

/**
 * Render icon html with backward compatibility
 *
 * @param array $settings
 * @param string $old_icon_id
 * @param string $new_icon_id
 * @param array $attributes
 */
function ha_render_button_icon($settings = [], $old_icon_id = 'icon', $new_icon_id = 'selected_icon', $attributes = []) {
	// Check if its already migrated
	$migrated = isset($settings['__fa4_migrated'][$new_icon_id]);
	// Check if its a new widget without previously selected icon using the old Icon control
	$is_new = empty($settings[$old_icon_id]);

	$attributes['aria-hidden'] = 'true';
	$is_svg                    = (isset($settings[$new_icon_id], $settings[$new_icon_id]['library']) && 'svg' === $settings[$new_icon_id]['library']);

	if (ha_is_elementor_version('>=', '2.6.0') && ($is_new || $migrated)) {
		if ($is_svg) {
			echo '<span class="ha-btn-icon ha-btn-icon--svg">';
		}
		\Elementor\Icons_Manager::render_icon($settings[$new_icon_id], $attributes);
		if ($is_svg) {
			echo '</span>';
		}
	} else {
		if (empty($attributes['class'])) {
			$attributes['class'] = $settings[$old_icon_id];
		} else {
			if (is_array($attributes['class'])) {
				$attributes['class'][] = $settings[$old_icon_id];
			} else {
				$attributes['class'] .= ' ' . $settings[$old_icon_id];
			}
		}
		printf('<i %s></i>', \Elementor\Utils::render_html_attributes($attributes));
	}
}

/**
 * Get database settings of a widget by widget id and element
 *
 * @param array $elements
 * @param string $widget_id
 * @param array $value
 */

function ha_get_ele_widget_element_settings($elements, $widget_id) {

	if (is_array($elements)) {
		foreach ($elements as $d) {
			if ($d && !empty($d['id']) && $d['id'] == $widget_id) {
				return $d;
			}
			if ($d && !empty($d['elements']) && is_array($d['elements'])) {
				$value = ha_get_ele_widget_element_settings($d['elements'], $widget_id);
				if ($value) {
					return $value;
				}
			}
		}
	}

	return false;
}

/**
 * Get database settings of a widget by widget id and post id
 *
 * @param number $post_id
 * @param string $widget_id
 * @param array
 */

function ha_get_ele_widget_settings($post_id, $widget_id) {

	$elementor_data = @json_decode(get_post_meta($post_id, '_elementor_data', true), true);

	if ($elementor_data) {
		$element = ha_get_ele_widget_element_settings($elementor_data, $widget_id);
		return isset($element['settings'])? $element['settings']: '';
	}

	return false;
}

include_once HAPPY_ADDONS_DIR_PATH . 'widgets/mailchimp/mailchimp-api.php';
Mailchimp_api::set_ajax_call();