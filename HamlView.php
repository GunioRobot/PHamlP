<?php

namespace PHamlP;

use Comodo\Application,
    ActiveSupport\Configuration,
    ActionPack\ActionView\View,
    HamlParser;

class HamlView extends View {
    /**
     * Parses the given template file.
     *
     * @param  string $file The file to parse.
     * @return string       The file's content.
     */
    public function compile($file, array $localAssigns) {
        // load local variables
        foreach ($localAssigns as $variable => $value) {
            $$variable = $value;
        }

        // get options
        $configuration = (array)Configuration::get('Haml');
        $configuration = array_shift($configuration);

        // get the template content
        $parser = new HamlParser($configuration);
        $path = $parser->parse($file, Application::$ROOT . 'tmp/haml/' . md5(dirname($file)));

        // get the template content
        ob_start();
        require $path;
        $content = ob_get_contents();
        ob_end_clean();

        // return the rendered template
        return $content;
    }
}