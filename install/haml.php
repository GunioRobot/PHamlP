<?php

ActiveSupport\Configuration::set('Haml', function($config) {
    /**
      * Doctype format. Determines how the Haml Doctype declaration is rendered.
      */
    $config->format = 'xhtml';

    /**
     * Custom Doctype. If not null and the Doctype declaration in the Haml
     * Document is not a built in Doctype this will be used as the Doctype.
     * This allows Haml to be used for non-(X)HTML documents that are XML
     * compliant.
     */
    $config->doctype;

    /**
     * Whether or not to escape X(HT)ML-sensitive characters in script.
     * If this is TRUE, = behaves like &=; otherwise, it behaves like !=.
     * Note that if this is set, != should be used for yielding to subtemplates
     * and rendering partials.
     */
    $config->escapeHtml = FALSE;

    /**
     * Whether or not attribute hashes and scripts designated by = or ~ should
     * be evaluated. If TRUE, the scripts are rendered as empty strings.
     */
    $config->suppressEval = FALSE;

    /**
     * The character that should wrap element attributes. Characters of this
     * type within attributes will be escaped (e.g. by replacing them with
     * &apos;) if the character is an apostrophe or a quotation mark.
     */
    $config->attrWrapper = '"';

    /**
     * Available output styles:
     *   - nested: output is nested according to the indent level in the
     *     source.
     *   - expanded: block tags have their own lines as does content which is
     *     indented.
     *   - compact: block tags and their content go on one line.
     *   - compressed: all unneccessary whitepaces is removed. If ugly is TRUE
     *     this style is used.
     */
    $config->styles = array('nested', 'expanded', 'compact', 'compressed');

    /**
     * Output style. Note: ugly must be FALSE to allow style.
     */
    $config->style = 'nested';

    /**
     * If TRUE no attempt is made to properly indent or format the output.
     * Reduces size of output file but is not very readable; equivalent of
     * style == compressed. Note: ugly must be FALSE to allow style.
     */
    $config->ugly = TRUE;

    /**
     * If TRUE comments are preserved in ugly mode. If not in ugly mode
     * comments are always output.
     */
    $config->preserveComments = FALSE;

    /**
     * Initial debug setting:
     *   - no debug (0).
     *   - show source (1).
     *   - show output (2).
     *   - show all (3).
     * Debug settings can be controlled in the template.
     */
    $config->debug = 0;

    /**
     * Path to the directory containing user defined filters. If specified this
     * directory will be searched before PHamlP looks for the filter in it's
     * collection. This allows the default filters to be overridden and new
     * filters to be installed. Note: No trailing directory separator.
     */
    $config->filterDir;

    /**
     * Path to the file containing user defined Haml helpers.
     */
    $config->helperFile;

    /**
     * Haml helper class. This must be an instance of HamlHelpers.
     */
    $config->helperClass = 'HamlHelpers';

    /**
     * Built in Doctypes.
     */
    $config->doctypes = array(
        'html4' => array(
            '<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">', //HTML 4.01 Transitional
            'Strict' => '<!DOCTYPE html PUBLIC "-//W3C//DTD 4.01 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">', //HTML 4.01 Strict
            'Frameset' => '<!DOCTYPE html PUBLIC "-//W3C//DTD 4.01 Frameset//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-frameset.dtd">', //HTML 4.01 Frameset
        ),
        'html5' => array(
            '<!DOCTYPE html>', // XHTML 5
        ),
        'xhtml' => array(
            '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">', //XHTML 1.0 Transitional
            'Strict' => '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">', //XHTML 1.0 Strict
            'Frameset' => '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Frameset//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-frameset.dtd">', //XHTML 1.0 Frameset
            '5' => '<!DOCTYPE html>', // XHTML 5
            '1.1' => '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">', // XHTML 1.1
            'Basic' => '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML Basic 1.1//EN" "http://www.w3.org/TR/xhtml-basic/xhtml-basic11.dtd">', //XHTML Basic 1.1
            'Mobile' => '<!DOCTYPE html PUBLIC "-//WAPFORUM//DTD XHTML Mobile 1.2//EN" "http://www.openmobilealliance.org/tech/DTD/xhtml-mobile12.dtd">', //XHTML Mobile 1.2
        )
    );

    /**
     * A list of tag names that should be automatically self-closed if they
     * have no content.
     */
    $config->emptyTags = array(
        'meta', 'img', 'link', 'br', 'hr', 'input', 'area', 'param', 'col',
        'base'
    );

    /**
     * A list of inline tags.
     */
    $config->inlineTags = array(
        'a', 'abbr', 'accronym', 'b', 'big', 'cite', 'code', 'dfn', 'em', 'i',
        'kbd', 'q', 'samp', 'small', 'span', 'strike', 'strong', 'tt', 'u',
        'var'
    );

    /**
     * Attributes that are minimised
     */
    $config->minimizedAttributes = array(
        'compact', 'checked', 'declare', 'readonly', 'disabled', 'selected',
        'defer', 'ismap', 'nohref', 'noshade', 'nowrap', 'multiple', 'noresize'
    );

    /**
     * A list of tag names that should automatically have their newlines preserved.
     */
    $config->preserve = array('pre', 'textarea');
});