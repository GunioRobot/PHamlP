<?php

use Comodo\Application,
    ActiveSupport\ClassLoader,
    ActiveSupport\Configuration,
    ActionPack\ActionView\View;

// load configuration
Application::loadConfigFrom('haml.php');
Application::loadConfigFrom('sass.php');

// load plugin environment configuration (if exists)
$paths = array(
    'environments/' . Application::$config->environment . '/haml.php',
    'environments/' . Application::$config->environment . '/sass.php'
);

foreach ($paths as $path) {
    if (file_exists(Application::$ROOT . "config/$path")) {
        Application::loadConfigFrom($path);
    }
}

// register autoloads
$loader = new ClassLoader('PHamlP', dirname(__DIR__));
$loader->register();

$loader = new ClassLoader(NULL, __DIR__ . '/haml');
$loader->register();

$loader = new ClassLoader(NULL, __DIR__ . '/sass');
$loader->register();

// register view extension
Application::$config->viewHandlers = array_merge(
    Application::$config->viewHandlers,
    array('haml' => 'PHamlP\HamlView')
);

// convert sass and scss files if setted in options
$path = Application::$ROOT;

$config = Configuration::get('Sass');

// set absolute paths
$config->sass_location = array_map(function($sassPath) use ($path) {
    return $path . $sassPath;
}, (array)$config->sass_location);

$config->cache_location = $config->cache_location ? $path . $config->cache_location : NULL;

$config->css_location = $config->css_location ? $path . $config->css_location : NULL;

$config->extensions = array_map(function($extension) use ($path) {
    return $path . $extension;
}, (array)$config->extensions);

$config->function_paths = array_map(function($functionPath) use ($path) {
    return $path . $functionPath;
}, (array)$config->function_paths);

$config->load_paths = array_map(function($loadPath) use ($path) {
    return $path . $loadPath;
}, (array)$config->load_paths);

// scan sass and scss files if needed
if ($config->scan) {
    $aconfig = (array)$config;
    $aconfig = array_shift($aconfig);

    $parser = new SassParser($aconfig);

    foreach ($config->sass_location as $path) {
        $files = array_merge(
            glob("$path/*.sass"),
            glob("$path/*.scss")
        );

        foreach ($files as $file) {
            $content = $parser->toCss($file);
            $name = preg_replace('/^.*\/(\w*)\.(sass|scss)$/', '$1', $file);
            file_put_contents("$config->css_location/$name.css", $content);
        }
    }
}