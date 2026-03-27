<?php
use PhpStyler\Config;
use PhpStyler\Files;
use PhpStyler\Format\PlainFormat;

return new Config(
    files: new Files(__DIR__ . '/public'),
    cache: __DIR__ . '/.php-styler.cache',
    format: new PlainFormat(),
);
