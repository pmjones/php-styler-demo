<html>
<head>
    <title>PHP-Styler Demo</title>
    {{= linkStylesheet( 'https://cdn.jsdelivr.net/npm/open-fonts@1.1.1/fonts/inter.min.css' ) }}
    {{= linkStylesheet( 'https://cdn.jsdelivr.net/npm/@exampledev/new.css@1.1.2/new.min.css' ) }}
    {{= script ( 'https://unpkg.com/htmx.org@1.9.5' ) }}
    <style>
        body {
            max-width: 80em;
        }
    </style>
</head>
<body>
    <header><h1>PHP-Styler Demo</h1>
    <main>
        <p><a href="https://github.com/pmjones/php-styler">PHP-Styler</a> is a companion to <a href="https://github.com/nikic/PHP-Parser">PHP-Parser</a> for reconstructing PHP code after it has been deconstructed into an abstract syntax tree.</p>
        <p>Try it out yourself! Paste your code below, and in a moment PHP-Styler will reformat it below.</p>
        {{= form ( method: "post" ) }}
            <p>{{= textarea (
                name: 'original_code',
                hx_post: '/styler.php',
                hx_target: '#restyled-code',
                hx_trigger: 'input delay:500ms',
                value: '<' . '?php',
                style: 'width: 100%; height: 18em',
            ) }}</p>
            <p>
                <label>Line Length: {{= select (
                    name: 'line_len',
                    value: 88,
                    options: [
                        80 => 80,
                        88 => 88,
                        100 => 100,
                        110 => 110,
                        120 => 120,
                        132 => 132,
                        150 => 150,
                        165 => 165,
                    ],
                    hx_post: '/styler.php',
                    hx_target: '#restyled-code',
                ) }}</label>
                &nbsp;
                <label>Indent length: {{= select (
                    name: 'indent_len',
                    value: 4,
                    options: [
                        2 => 2,
                        4 => 4,
                        6 => 6,
                        8 => 8,
                    ],
                    hx_post: '/styler.php',
                    hx_target: '#restyled-code',
                ) }}</label>
                &nbsp;
                <label>Use tabs? {{= checkboxField (
                    name: 'indent_tab',
                    value: 1,
                    hx_post: '/styler.php',
                    hx_target: '#restyled-code',
                ) }}</label>
            </p>
        </form>
        <pre id="restyled-code">&lt;?php</pre>
    </main>
</body>
</html>
