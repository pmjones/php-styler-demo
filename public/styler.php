<?php
use Sapien\Request;
use PhpStyler\Styler;
use PhpStyler\Format\PlainFormat;

require dirname(__DIR__) . '/vendor/autoload.php';
error_reporting(E_ALL);
ini_set('display_errors', true);
$request = new Request();

$styler = new Styler(
    new PlainFormat(
        eol: "\n",
        lineLen: (int) ($request->input['line_len'] ?? 88),
        indentLen: (int) ($request->input['indent_len'] ?? 4),
        indentTab: (bool) ($request->input['indent_tab'] ?? false),
    ),
);

$code = $request->input['original_code'] ?? '';
$code = $styler($code);
$highlighter = new \Highlight\Highlighter();
$highlighted = $highlighter->highlight('php', $code);
echo $highlighted->value;
