<?php

require "vendor/autoload.php";

$faker = Faker\Factory::create();
$f3 = Base::instance();

$f3->config("config/config.ini");
$f3->config("config/routes.ini");

$f3->run();
