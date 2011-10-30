<?php

ActiveSupport\Configuration::set('Sass', function($config) {
    /**
     * Scan on every request the sass_location folders and compiles sass and
     * scss files.
     */
    $config->scan = TRUE;

	/**
	 * Whether parsed Sass files should be cached, allowing greater speed.
	 */
	$config->cache = TRUE;

    /**
     * The path or array of paths where to search for sass files to compile.
     */
    $config->sass_location = 'app/stylesheets';

	/**
	 * The path where the cached sass files should be written to.
	 */
	$config->cache_location = 'tmp/sass';

	/**
	 * The path where CSS output should be written to.
	 */
	$config->css_location = 'public/stylesheets';

	/**
	 * When TRUE the line number and file where a selector is defined is
	 * emitted into the compiled CSS in a format that can be understood by the
	 * {@link https://addons.mozilla.org/en-US/firefox/addon/103988/ FireSass
	 * Firebug extension}.
	 * Disabled when using the compressed output style.
	 */
	$config->debug_info = FALSE;

	/**
	 * Sass extensions, e.g. Compass. An associative array of the form
	 * $name => $options where $name is the name of the extension and $options
	 * is an array of name=>value options pairs.
	 */
	$config->extensions = NULL;

	/**
	 * An array of filesystem paths which should be searched for SassScript
	 * functions.
	 */
	$config->function_paths = NULL;

	/**
	 * When TRUE the line number and filename where a selector is defined is
	 * emitted into the compiled CSS as a comment. Useful for debugging
	 * especially when using imports and mixins.
	 * Disabled when using the compressed output style or the debug_info option.
	 */
	 $config->line_numbers = FALSE;

	/**
	 * A path or array of paths which should be searched for Sass templates
	 * imported with the @import directive.
	 */
	$config->load_paths = 'app/stylesheets';

	/**
	 * Forces the document to use one syntax for properties. If the correct
	 * syntax isn't used, an error is thrown.
	 * Value can be:
	 *   - new: forces the use of a colon or equals sign after the property
	 *     name.
	 *     For example: color: #0f3 or width: $main_width.
	 *   - old: forces the use of a colon before the property name.
	 *     For example: :color #0f3 or :width = $main_width.
	 * Ignored for SCSS files which always use the new style.
	 */
	$config->property_syntax = NULL;

	/**
	 * When set to TRUE, causes warnings to be disabled.
	 */
	$config->quiet = TRUE;

	/**
	 * The style of the CSS output.
	 * Value can be:
	 *   - nested: Nested is the default Sass style, because it reflects the
	 *     structure of the document in much the same way Sass does. Each
	 *     selector and rule has its own line with indentation is based on how
	 *     deeply the rule is nested. Nested style is very useful when looking
	 *     at large CSS files as it allows you to very easily grasp the
	 *     structure of the file without actually reading anything.
	 *   - expanded: Expanded is the typical human-made CSS style, with each
	 *     selector and property taking up one line. Selectors are not
	 *     indented; properties are indented within the rules.
	 *   - compact: Each CSS rule takes up only one line, with every property
	 *     defined on that line. Nested rules are placed with each other while
	 *     groups of rules are separated by a blank line.
	 *   - compressed: Compressed has no whitespace except that necessary to
	 *     separate selectors and properties. It's not meant to be
	 *     human-readable.
	 */
	$config->style = 'expanded';

	/**
	 * The syntax of the input file.
	 * 'sass' for the indented syntax and 'scss' for the CSS-extension syntax.
	 */
	$config->syntax = NULL;

	/**
	 * If enabled a property need only be written in the standard form and
	 * vendor specific versions will be added to the style sheet.
	 *   - array: vendor properties merged with the built-in vendor properties,
	 *     to automatically apply.
	 *   - boolean TRUE: use built in vendor properties.
	 */
	$config->vendor_properties = TRUE;
});