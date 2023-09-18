<html>
<head>
    <title>PHP-Styler Demo</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/open-fonts@1.1.1/fonts/inter.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@exampledev/new.css@1.1.2/new.css">
    <script src="https://unpkg.com/htmx.org@1.9.5"></script>
    <style>
        body {
            max-width: 80em;
        }
    </style>
</head>
<body>
    <header><h1>PHP-Styler Demo</h1>
    <main>
        <p>Paste your code below:</p>
        {{= form ( method: "post" ) }}
            <p>{{= textarea (
                name: 'original_code',
                hx_post: '/styler.php',
                hx_target: '#restyled-code',
                hx_trigger: 'input throttle:500ms',
                value: '<' . '?php',
                style: 'width: 100%; height: 18em',
            ) }}</p>
            <p>
                <label>Line Length: {{= select (
                    name: 'line_len',
                    value: '88',
                    options: [
                        '72' => '72',
                        '80' => '80',
                        '88' => '88',
                        '100' => '100',
                        '120' => '120',
                        '150' => '150',
                    ],
                    hx_post: '/styler.php',
                    hx_target: '#restyled-code',
                    hx_trigger: 'change',
                ) }}</label>
                &nbsp;
                <label>Indent length: {{= select (
                    name: 'indent_len',
                    value: '4',
                    options: [
                        '2' => '2',
                        '4' => '4',
                        '6' => '6',
                        '8' => '8',
                    ],
                    hx_post: '/styler.php',
                    hx_target: '#restyled-code',
                    hx_trigger: 'change',
                ) }}</label>
                &nbsp;
                <label>Use tabs? {{= checkboxField (
                    name: 'indent_tab',
                    value: 1,
                    hx_post: '/styler.php',
                    hx_target: '#restyled-code',
                    hx_trigger: 'change',
                ) }}</label>
            </p>
        </form>
        <pre id="restyled-code">&lt;?php</pre>
    </main>
</body>
</html>
