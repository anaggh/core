<article class="post">

    <!-- Plugins Page Begin -->
    <?php Theme::plugins('pageBegin') ?>

    <!-- Page's header -->
    <header>
        <div class="title">
            <h2><a href="<?= $page->permalink() ?>"><?= $page->title() ?></a></h2>
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

            $timestamp = empty($page->dateModified()) ? $page->date() : Date::format($page->dateModified(), DB_DATE_FORMAT, $site->dateFormat());
            $zuluTime = gmdate("Y-m-d\TH:i:s\Z", strtotime($page->dateRaw()));
            ?>

            <span class="timestamp">Posted <time class="published" datetime="<?= $zuluTime ?>">
                <?= $timestamp ?></time> by <?= $author ?>
            </span>
        </div>
    </header>

    <!-- Cover Image -->
    <?php
    if ($page->coverImage()) {
        echo '<a href="'.$page->permalink().'" class="image featured"><img src="'.$page->coverImage().'" alt="Cover Image"></a>';
    }

    // Content
    echo $page->content();
    ?>

    <!-- Page's footer -->
    <footer>
        <!-- Page's tags -->
        <div class="tags">TAGS:
            <span class="tag-list">
                <?php
                $pageTags = $page->tags(true);
                if (empty($pageTags)) {
                    echo 'No tags found.';
                } else {
                    $listOfTags = '';
                    foreach ($pageTags as $tagKey => $tagName) {
                        $listOfTags .= '<a href="'.HTML_PATH_ROOT.$url->filters('tag').'/'.$tagKey.'">'.$tagName.'</a>, ';
                    }
                    // Remove final ", '" and add "." after the last tag.
                    echo substr($listOfTags, 0, -2) . '.';
                }
                ?>
            </span>
        </div>
    </footer>

    <!-- Plugins Page End -->
    <?php Theme::plugins('pageEnd') ?>

</article>
