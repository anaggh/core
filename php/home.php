<!-- Show each page -->
<?php foreach ($content as $page) : ?>
<article class="post">

    <!-- Show plugins, Hook: Page Begin -->
    <?php Theme::plugins('pageBegin') ?>

    <!-- Header -->
    <header>
        <div class="title">
            <h2><a href="<?php echo $page->permalink() ?>"><?php echo $page->title() ?></a></h2>
            <p><?php echo $page->description() ?></p>
        </div>
        <div class="meta">
            <?php
            // Get the user who created the page.
            $User = $page->user();

            // Default author is the username.
            $author = $User->username();

            // If the user has entered the first name or last name, it would be set as author.
            if (Text::isNotEmpty($User->firstName()) || Text::isNotEmpty($User->lastName())) {
                $author = $User->firstName().' '.$User->lastName();
            }
            ?>

            
            <span class="timestamp">Posted <time class="published" datetime="<?php echo $Page->dateModified(); ?>"><?php echo $page->date() ?></time> by <?php echo $author ?></span>
        </div>
    </header>

    <!-- Cover Image -->
    <?php
    if ($page->coverImage()) {
        echo '<a href="'.$page->permalink().'" class="image featured"><img src="'.$page->coverImage().'" alt="Cover Image"></a>';
    }
    ?>

    <!-- Page's content, the first part if has pagebrake -->
    <?php echo $page->content(false) ?>

    <!-- Page's footer -->
    <footer>
        <!-- Read more button -->
        <?php
        if ($page->readMore()) {
            echo "<a href=" . $page->permalink() . " class='button read-more' title='read-more'>" .$L->get('Read more'). "...</a>";
        }
        ?>

        <!-- Page's tags -->
        <div class="tags">TAGS:
            <span class="tag-list">
                <?php
                $page_tags = $page->tags(true);
                if (count($page_tags) == 0) {
                    echo "No tags found.";
                } else {
                    $listOfTags = '';
                    foreach ($page_tags as $tagKey => $tagName) {
                        $listOfTags .= '<a href="'.HTML_PATH_ROOT.$url->filters('tag').'/'.$tagKey.'">'.$tagName.'</a>, ';
                    }
                    echo substr($listOfTags, 0, -2) . '.'; // Remove final ", '" and add "." after the last tag.
                }
                ?>
            </span>
        </div>

        <!-- A horizontal rule after each page -->
        <hr class="end-post-hr">
    </footer>

    <!-- Plugins Page End -->
    <?php Theme::plugins('pageEnd') ?>

</article>

<?php endforeach; ?>

<!-- Pagination -->
<ul class="actions pagination">
<?php
if (Paginator::get('showPrev')) {
    echo '<li><a href="'.Paginator::firstPageUrl().'" class="button" title="first-page">'.$L->get('&#8676;').'</a></li>';
    echo '<li><a href="'.Paginator::previousPageUrl().'" class="button previous" title="previous-page">'.$L->get('« Newer posts').'</a></li>';
}

if (Paginator::get('showNext')) {
    echo '<li><a href="'.Paginator::nextPageUrl().'" class="button next" title="next-page">'.$L->get('Older posts »').'</a></li>';
    echo '<li><a href="'.Paginator::lastPageUrl().'" class="button" title="last-page">'.$L->get('&#8677;').'</a></li>';
}
?>
</ul>
