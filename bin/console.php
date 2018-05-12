#!/usr/bin/env php
<?php

use Symfony\Component\Config\FileLocator;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Loader\YamlFileLoader;
use Symfony\Component\Dotenv\Dotenv;

$root = __DIR__ . '/..';
require_once "${root}/vendor/autoload.php";

$dotenv = new Dotenv();
$dotenv->load("${root}/config/.env");

$container = new ContainerBuilder;
$loader = new YamlFileLoader($container, new FileLocator($root));
$loader->load('config/config.yaml');

$container->compile(true);
