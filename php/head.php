<?php
echo Theme::charset('utf-8');
echo Theme::viewport('width=device-width, initial-scale=1');

echo Theme::metaTagTitle();
echo Theme::metaTagDescription();

echo Theme::favicon('img/favicon.png');
?>

<link rel="stylesheet" href="<?= HTML_PATH_THEME ?>assets/css/style.css">
<!-- Syntax Highlighting - Highlight.js v9.13.1 (Automatic detection) -->
<!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/highlight.js/9.13.1/styles/default.min.css" integrity="sha256-Zd1icfZ72UBmsId/mUcagrmN7IN5Qkrvh75ICHIQVTk=" crossorigin="anonymous" /> -->
<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/highlight.js/9.13.1/highlight.min.js" integrity="sha256-iq71rXEe/fvjCUP9AfLY0cKudQuKAQywiUpXkRFSkLc=" crossorigin="anonymous"></script> -->
<!-- Init -->
<!-- <script>hljs.initHighlightingOnLoad();</script> -->

<!-- Disable referrer -->
<meta name="referrer" content="no-referrer" />

<?php
// Load plugins, hook: Site head
Theme::plugins('siteHead');
?>
