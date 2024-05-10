<?php
use Qiq\Template;

require dirname(__DIR__) . '/vendor/autoload.php';
$template = Template::new(dirname(__DIR__) . '/resources', extension: '.qiq.php');
$template->setView('index');
echo $template();
