<?php
// Show each page
foreach ($content as $page) {
    \Theme\Core\renderPage($page, $partial = true);
    // A horizontal rule after each page
    echo '<hr class="end-post-hr">';
}
?>

<!-- Pagination -->
<ul class="actions pagination">
<?php
if (Paginator::get('showPrev')) {
    echo '<li><a href="'.Paginator::firstPageUrl().'" class="button" title="first-page">&#8676;</a></li>';
    echo '<li><a href="'.Paginator::previousPageUrl().'" class="button previous" title="previous-page">'.$L->get('Previous').'</a></li>';
}

if (Paginator::get('showNext')) {
    echo '<li><a href="'.Paginator::nextPageUrl().'" class="button next" title="next-page">'.$L->get('Next').'</a></li>';
    echo '<li><a href="'.Paginator::lastPageUrl().'" class="button" title="last-page">&#8677;</a></li>';
}
?>
</ul>
