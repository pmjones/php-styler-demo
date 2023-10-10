<?php
use Sapien\Request;
use PhpStyler\Styler;
use PhpStyler\Service;

require dirname(__DIR__) . '/vendor/autoload.php';
error_reporting(E_ALL);
ini_set('display_errors', true);
$request = new Request();
$service = new Service(new Styler(
    eol: "\n",
    lineLen: (int) ($request->input['line_len'] ?? 88),
    indentLen: (int) ($request->input['indent_len'] ?? 4),
    indentTab: (bool) ($request->input['indent_tab'] ?? false),
));
$code = $request->input['original_code'] ?? '';
$code = $service($code);
$highlighter = new \Highlight\Highlighter();
$highlighted = $highlighter->highlight('php', $code);
echo $highlighted->value;
