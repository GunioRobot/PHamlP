<?php

use Comodo\Application;

mkdir(Application::$ROOT . 'app/stylesheets');
mkdir(Application::$ROOT . 'tmp/haml');
copy(__DIR__ . '/install/init.php', __DIR__ . '/init.php');
copy(__DIR__ . '/install/haml.php', Application::$ROOT . 'config/haml.php');
copy(__DIR__ . '/install/sass.php', Application::$ROOT . 'config/sass.php');