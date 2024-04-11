<?php

/**
 * Defines the custom field type class.
 */

if (!defined('ABSPATH')) {
	exit;
}

/**
 * acf_inline_editor_field class.
 */
class acf_inline_editor_field extends \acf_field
{
	/**
	 * Controls field type visibilty in REST requests.
	 *
	 * @var bool
	 */
	public $show_in_rest = true;

	/**
	 * Environment values relating to the theme or plugin.
	 *
	 * @var array $env Plugin or theme context such as 'url' and 'version'.
	 */
	private $env;

	/**
	 * Constructor.
	 */
	public function __construct()
	{
		/**
		 * Field type reference used in PHP and JS code.
		 *
		 * No spaces. Underscores allowed.
		 */
		$this->name = 'acf_inline_editor_field';

		/**
		 * Field type label.
		 *
		 * For public-facing UI. May contain spaces.
		 */
		$this->label = __('ACF Inline Editor Field', 'acf-inline-editor-field');

		/**
		 * The category the field appears within in the field type picker.
		 */
		$this->category = 'basic'; // basic | content | choice | relational | jquery | layout | CUSTOM GROUP NAME

		/**
		 * Field type Description.
		 *
		 * For field descriptions. May contain spaces.
		 */
		$this->description = __('This field enables formatting text in a field without a toolbar.', 'acf-inline-editor-field');

		/**
		 * Field type Doc URL.
		 *
		 * For linking to a documentation page. Displayed in the field picker modal.
		 */
		$this->doc_url = 'https://github.com/adambichler/acf-inline-editor-field';

		/**
		 * Field type Tutorial URL.
		 *
		 * For linking to a tutorial resource. Displayed in the field picker modal.
		 */
		$this->tutorial_url = 'https://github.com/adambichler/acf-inline-editor-field';

		/**
		 * Defaults for your custom user-facing settings for this field type.
		 */
		$this->defaults = array(
			'button_bold' => true,
			'button_italic' => true,
			'button_underline' => true,
			'button_anchor' => true,
			'button_h1' => true,
			'button_h2' => true,
			'button_h3' => true,
			'button_quote' => true,
			'button_ul' => true,
			'button_ol' => true,
		);

		/**
		 * Strings used in JavaScript code.
		 *
		 * Allows JS strings to be translated in PHP and loaded in JS via:
		 *
		 * ```js
		 * const errorMessage = acf._e("acf_inline_editor_field", "error");
		 * ```
		 */
		$this->l10n = array(
			'error'	=> __('Error! Please enter a higher value', 'acf-inline-editor-field'),
		);

		$this->env = array(
			'url'     => site_url(str_replace(ABSPATH, '', __DIR__)), // URL to the acf-inline-editor-field directory.
			'version' => '1.0', // Replace this with your theme or plugin version constant.
		);

		/**
		 * Field type preview image.
		 *
		 * A preview image for the field type in the picker modal.
		 */
		$this->preview_image = $this->env['url'] . '/assets/images/field-preview-custom.png';

		parent::__construct();
	}

	/**
	 * Settings to display when users configure a field of this type.
	 *
	 * These settings appear on the ACF “Edit Field Group” admin page when
	 * setting up the field.
	 *
	 * @param array $field
	 * @return void
	 */
	public function render_field_settings($field)
	{
		/*
		 * Repeat for each setting you wish to display for this field type.
		 
		*/
		acf_render_field_setting(
			$field,
			array(
				'label'			=> __('Show "bold" option in toolbar', 'acf-inline-editor-field'),
				'instructions'	=> __('If the formatting option for "bold" should be visible', 'acf-inline-editor-field'),
				'type'			=> 'select',
				'name'			=> 'button_bold',
				'choices'		=> array(
					1 => __('Yes', 'acf-inline-editor-field'),
					0 => __('No', 'acf-inline-editor-field'),
				),
			)
		);
		acf_render_field_setting(
			$field,
			array(
				'label'			=> __('Show "italic" option in toolbar', 'acf-inline-editor-field'),
				'instructions'	=> __('If the formatting option for "italic" should be visible', 'acf-inline-editor-field'),
				'type'			=> 'select',
				'name'			=> 'button_italic',
				'choices'		=> array(
					1 => __('Yes', 'acf-inline-editor-field'),
					0 => __('No', 'acf-inline-editor-field'),
				),
			)
		);
		acf_render_field_setting(
			$field,
			array(
				'label'			=> __('Show "underline" option in toolbar', 'acf-inline-editor-field'),
				'instructions'	=> __('If the formatting option for "underline" should be visible', 'acf-inline-editor-field'),
				'type'			=> 'select',
				'name'			=> 'button_underline',
				'choices'		=> array(
					1 => __('Yes', 'acf-inline-editor-field'),
					0 => __('No', 'acf-inline-editor-field'),
				),
			)
		);
		acf_render_field_setting(
			$field,
			array(
				'label'			=> __('Show "link to" option in toolbar', 'acf-inline-editor-field'),
				'instructions'	=> __('If the formatting option for "link to" should be visible', 'acf-inline-editor-field'),
				'type'			=> 'select',
				'name'			=> 'button_anchor',
				'choices'		=> array(
					1 => __('Yes', 'acf-inline-editor-field'),
					0 => __('No', 'acf-inline-editor-field'),
				),
			)
		);
		acf_render_field_setting(
			$field,
			array(
				'label'			=> __('Show "h1" option in toolbar', 'acf-inline-editor-field'),
				'instructions'	=> __('If the formatting option for "h1" should be visible', 'acf-inline-editor-field'),
				'type'			=> 'select',
				'name'			=> 'button_h1',
				'choices'		=> array(
					1 => __('Yes', 'acf-inline-editor-field'),
					0 => __('No', 'acf-inline-editor-field'),
				),
			)
		);
		acf_render_field_setting(
			$field,
			array(
				'label'			=> __('Show "h2" option in toolbar', 'acf-inline-editor-field'),
				'instructions'	=> __('If the formatting option for "h2" should be visible', 'acf-inline-editor-field'),
				'type'			=> 'select',
				'name'			=> 'button_h2',
				'choices'		=> array(
					1 => __('Yes', 'acf-inline-editor-field'),
					0 => __('No', 'acf-inline-editor-field'),
				),
			)
		);
		acf_render_field_setting(
			$field,
			array(
				'label'			=> __('Show "h3" option in toolbar', 'acf-inline-editor-field'),
				'instructions'	=> __('If the formatting option for "h3" should be visible', 'acf-inline-editor-field'),
				'type'			=> 'select',
				'name'			=> 'button_h3',
				'choices'		=> array(
					1 => __('Yes', 'acf-inline-editor-field'),
					0 => __('No', 'acf-inline-editor-field'),
				),
			)
		);
		acf_render_field_setting(
			$field,
			array(
				'label'			=> __('Show "quote" option in toolbar', 'acf-inline-editor-field'),
				'instructions'	=> __('If the formatting option for "quote" should be visible', 'acf-inline-editor-field'),
				'type'			=> 'select',
				'name'			=> 'button_quote',
				'choices'		=> array(
					1 => __('Yes', 'acf-inline-editor-field'),
					0 => __('No', 'acf-inline-editor-field'),
				),
			)
		);
		acf_render_field_setting(
			$field,
			array(
				'label'			=> __('Show "unordered list" option in toolbar', 'acf-inline-editor-field'),
				'instructions'	=> __('If the formatting option for "unordered list" should be visible', 'acf-inline-editor-field'),
				'type'			=> 'select',
				'name'			=> 'button_ul',
				'choices'		=> array(
					1 => __('Yes', 'acf-inline-editor-field'),
					0 => __('No', 'acf-inline-editor-field'),
				),
			)
		);
		acf_render_field_setting(
			$field,
			array(
				'label'			=> __('Show "ordered list" option in toolbar', 'acf-inline-editor-field'),
				'instructions'	=> __('If the formatting option for "ordered list" should be visible', 'acf-inline-editor-field'),
				'type'			=> 'select',
				'name'			=> 'button_ol',
				'choices'		=> array(
					1 => __('Yes', 'acf-inline-editor-field'),
					0 => __('No', 'acf-inline-editor-field'),
				),
			)
		);

		// To render field settings on other tabs in ACF 6.0+:
		// https://www.advancedcustomfields.com/resources/adding-custom-settings-fields/#moving-field-setting
	}

	/**
	 * HTML content to show when a publisher edits the field on the edit screen.
	 *
	 * @param array $field The field settings and values.
	 * @return void
	 */
	public function render_field($field)
	{
		// Debug output to show what field data is available.
		/*
		echo '<pre>';
		print_r($field);
		echo '</pre>';
		*/

		// Display an input field that uses the 'font_size' setting.
		$rand_id = uniqid();
?>
<textarea class="acf-inline-editor-field-text medium-editor-field init medium-editor-field-<?php echo $rand_id; ?>"
    name="<?php echo esc_attr($field['name']) ?>" data-bold-button="<?php echo esc_attr($field['button_bold']) ?>"
    data-italic-button="<?php echo esc_attr($field['button_italic']) ?>"
    data-underline-button="<?php echo esc_attr($field['button_underline']) ?>"
    data-anchor-button="<?php echo esc_attr($field['button_anchor']) ?>"
    data-h1-button="<?php echo esc_attr($field['button_h2']) ?>"
    data-h2-button="<?php echo esc_attr($field['button_h2']) ?>"
    data-h3-button="<?php echo esc_attr($field['button_h3']) ?>"
    data-quote-button="<?php echo esc_attr($field['button_quote']) ?>"
    data-ul-button="<?php echo esc_attr($field['button_ul']) ?>"
    data-ol-button="<?php echo esc_attr($field['button_ol']) ?>"
    placeholder="<?php echo __('Type your text here', 'acf-inline-editor-field'); ?>"><?php echo esc_attr($field['value']) ?></textarea>
<p class="description">
    <?php echo __('Highlight some text to show formatting options.', 'acf-inline-editor-field'); ?></p>
<?php

	}

	/**
	 * Enqueues CSS and JavaScript needed by HTML in the render_field() method.
	 *
	 * Callback for admin_enqueue_script.
	 *
	 * @return void
	 */
	public function input_admin_enqueue_scripts()
	{
		$url     = trailingslashit($this->env['url']);
		$version = $this->env['version'];

		/***********
		 * SCRIPTS *
		 ***********/
		//Include the custom field script with dependencies
		wp_register_script(
			'acf_inline_editor_field-acf-inline-editor-field',
			"{$url}assets/js/field.js",
			array('acf-input', 'medium-editor-autolist', 'medium-editor'),
			$version
		);
		//Include the medium editor script
		wp_register_script(
			'medium-editor-autolist',
			"{$url}bower_components/medium-editor/dist/js/medium-editor.min.js",
			array(),
			$version
		);
		//Include the medium editor autolist script
		wp_register_script(
			'medium-editor',
			"{$url}bower_components/medium-editor-autolist/dist/autolist.min.js",
			array(),
			$version
		);

		/**********
		 * STYLES *
		 **********/
		//include custom field styles
		wp_register_style(
			'acf_inline_editor_field-acf-inline-editor-field',
			"{$url}assets/css/field.css",
			array('acf-input'),
			$version
		);

		//Include the medium editor styles
		wp_register_style(
			'medium-editor',
			"{$url}bower_components/medium-editor/dist/css/medium-editor.min.css",
			array(),
			$version
		);
		wp_register_style(
			'medium-editor-theme',
			"{$url}bower_components/medium-editor/dist/css/themes/beagle.css",
			array(),
			$version
		);

		wp_enqueue_script('acf_inline_editor_field-acf-inline-editor-field');
		wp_enqueue_style('acf_inline_editor_field-acf-inline-editor-field');

		//Medium editor
		wp_enqueue_script('medium-editor');
		wp_enqueue_style('medium-editor');
		wp_enqueue_style('medium-editor-theme');
	}
}