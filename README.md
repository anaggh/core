### Bludit Theme: Core

#### Note: If you are using Bludit v1.x / v2.x, use the other branches instead.

#### Features:

* Lightweight
* Uses default system fonts.
* Optional: Automatic Code Syntax Highlighting - highlight.js - https://highlightjs.org/ `Uncomment it in head.php if needed`

#### Additional Notes:

* Referrer in links are disabled by default. Make sure you remove the line `<meta name="referrer" content="no-referrer" />` in `php/head.php` if you are running a public site.
* The theme currently uses https://github.com/anaggh/Bludit-Search for search. Use the below snippet in `index.php` if you want to use Google Search instead.

```
<!-- Custom Google Search -->
<form role="search" action="https://encrypted.google.com/search" target="_blank">
<div class="form-group">
  <input type="hidden" name="as_sitesearch" value="<?php echo preg_replace('/(?:https?:\/\/)?(?:www\.)?(.*)\/?$/i', '$1', $site->url()); /* http://stackoverflow.com/questions/6738752/regex-for-dropping-http-and-www-from-urls */?>">
  <input type="hidden" name="as_qdr" value="all">
  <input type="text" name="as_q" class="form-control" placeholder="Search...">
</div>
</form>
```
