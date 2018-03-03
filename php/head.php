<?php
echo Theme::charset('utf-8');
echo Theme::viewport('width=device-width, initial-scale=1');

echo Theme::headTitle();
echo Theme::headDescription();

echo Theme::favicon('img/favicon.png');
?>

<link rel="stylesheet" href="<?php echo HTML_PATH_THEME ?>assets/css/style.css">
<!-- Syntax Highlighting - Highlight.js v9.12 (Automatic detection) -->
<!-- <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/highlight.js/9.12.0/styles/default.min.css" integrity="sha256-Zd1icfZ72UBmsId/mUcagrmN7IN5Qkrvh75ICHIQVTk=" crossorigin="anonymous" /> -->
<!-- <script src="//cdnjs.cloudflare.com/ajax/libs/highlight.js/9.12.0/highlight.min.js" integrity="sha256-/BfiIkHlHoVihZdc6TFuj7MmJ0TWcWsMXkeDFwhi0zw=" crossorigin="anonymous"></script> -->
<!-- Init -->
<!-- <script>hljs.initHighlightingOnLoad();</script> -->

<!-- Disable referrer -->
<meta name="referrer" content="no-referrer" />

<?php
// Load plugins, hook: Site head
Theme::plugins('siteHead');
?>
