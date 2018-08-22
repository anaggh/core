<article class="post">

    <!-- Plugins Page Begin -->
    <?php Theme::plugins('pageBegin') ?>

    <!-- Page's header -->
    <header>
        <div class="title">
            <h1><a href="<?php echo $page->permalink() ?>"><?php echo $page->title() ?></a></h1>
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

            <span class="timestamp">Posted <time class="published" datetime="2016-12-01">
                <?php echo $page->date() ?></time> by <?php echo $author ?>
            </span>
        </div>
    </header>

    <!-- Cover Image -->
    <?php
    if ($page->coverImage()) {
        echo '<a href="'.$page->permalink().'" class="image featured"><img src="'.$page->coverImage().'" alt="Cover Image"></a>';
    }
    ?>

    <!-- Page's content, the first part if has pagebrake -->
    <?php echo $page->content() ?>

    <!-- Page's footer -->
    <footer>
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
    </footer>

    <!-- Plugins Page End -->
    <?php Theme::plugins('pageEnd') ?>

</article>
