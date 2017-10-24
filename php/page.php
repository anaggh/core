<article class="post">

	<!-- Plugins Page Begin -->
	<?php Theme::plugins('pageBegin') ?>

	<!-- Page's header -->
	<header>
        <div class="title">
            <h1><a href="<?php echo $Page->permalink() ?>"><?php echo $Page->title() ?></a></h1>
        </div>
        <div class="meta">
            <?php
                // Get the user who created the page.
                $User = $Page->user();

                // Default author is the username.
                $author = $User->username();

                // If the user has entered the first name or last name, it would be set as author.
                if( Text::isNotEmpty($User->firstName()) || Text::isNotEmpty($User->lastName()) ) {
                    $author = $User->firstName().' '.$User->lastName();
                }
            ?>

            <span class="timestamp">Posted <time class="published" datetime="2016-12-01"><?php echo $Page->date() ?></time> by <?php echo $author ?></span>
        </div>
	</header>

	<!-- Cover Image -->
	<?php
		if($Page->coverImage()) {
			echo '<a href="'.$Page->permalink().'" class="image featured"><img src="'.$Page->coverImage().'" alt="Cover Image"></a>';
		}
	?>

	<!-- Page's content, the first part if has pagebrake -->
	<?php echo $Page->content() ?>


    <!-- Page's footer -->
    <footer>
        <!-- Page's tags -->
        <div class="tags">TAGS:
            <span class="tag-list">
                <?php
                    $tags = $Page->tags(true);
                    if(count($tags) == 0){
                        echo "No tags found.";
                    }

                    else{
                        $listOfTags = '';
                        foreach($tags as $tagKey=>$tagName) {
                            $listOfTags .= '<a href="'.HTML_PATH_ROOT.$Url->filters('tag').'/'.$tagKey.'">'.$tagName.'</a>, ';
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
