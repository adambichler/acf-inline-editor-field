=== ACF Inline Editor Field ===

Contributors: theadam123
Tags: custom field, ACF, inline, editor
Requires at least: 6.0
Requires PHP: 7.4
Tested up to: 6.5.2
Stable tag: 1.0.2
License: GPLv2 or later

License URI: http://www.gnu.org/licenses/gpl-2.0.html
A simple plugin for adding an additional inline editor field to Advanced Custom Fields (ACF).

== Description ==
The ACF Inline Editor Field is a simple plugin designed to enhance the functionality of Advanced Custom Fields (ACF) by adding an additional inline editor field that allows you to format text without the need of a toolbar like the WYSIWYG editor uses.
The plugin relies on the medium editor library (https://raw.github.com/yabwe/medium-editor) to provide a simple and clean interface for editing text.

## Supports the following features:
- bold
- italic
- underline
- link
- unordered list
- ordered list
- blockquote

## Issues management
Please open a new issue over on github


== Installation ==
This section describes how to install the plugin and get it working.

1. Upload CF Inline Editor Field (https://github.com/adambichler/acf-inline-editor-field) to the `/wp-content/plugins/` directory

2. Activate the plugin through the 'Plugins' menu in WordPress

3. Go to the ACF section in the WordPress admin and create a new field group or modify an existing one. In the field type dropdown choose "ACF Inline Editor Field". Then use the field settings to modify the options.


== Frequently Asked Questions ==
= Is this a standalone plugin? =
No, ACF (Advanced Custom Fields) is required for this plugin to work. Both versions, free and pro, are supported.

== Screenshots ==
1. The field options, there are more options available than shown in the screenshot.
2. The view when you edit the field.

== Changelog ==

= v1.0.2 =
* Change the order and place where scripts and styles are loaded 

= v1.0.1 =
* Escape all strings, add banners and icons for the plugin and force all scripts and styles to load in the footer, to better comply with WordPress coding standards.

= v1.0.0 =
* Initial release

== Upgrade Notice ==
= 1.0.0 =
* Initial release