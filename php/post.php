<article class="post">

	<!-- Show plugins, Hook: Post Begin -->
	<?php Theme::plugins('postBegin') ?>

	<!-- Post's header -->
	<header>
		<div class="title">
			<h1><a href="<?php echo $Post->permalink() ?>"><?php echo $Post->title() ?></a></h1>
		</div>
		<div class="meta">
	                <?php
	                	// Get the user who created the post.
	                	$User = $Post->user();

	                	// Default author is the username.
	                	$author = $User->username();

	                	// If the user complete the first name or last name this will be the author.
				if( Text::isNotEmpty($User->firstName()) || Text::isNotEmpty($User->lastName()) ) {
					$author = $User->firstName().' '.$User->lastName();
				}
			?>

			<span class="timestamp">Posted <time class="published" datetime="2016-12-01"><?php echo $Post->date() ?></time> by <?php echo $author ?></span>
		</div>
	</header>

	<!-- Cover Image -->
	<?php
		if($Post->coverImage()) {
			echo '<a href="'.$Post->permalink().'" class="image featured"><img src="'.$Post->coverImage().'" alt="Cover Image"></a>';
		}
	?>

	<!-- Post's content, the first part if has pagebrake -->
	<?php echo $Post->content() ?>

	<!-- Post's footer -->
	<footer>
		<!-- Post's tags -->
		<div class="tags">TAGS:<span class="listOfTags">
		<?php
			$tags = $Post->tags(true);
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

	<!-- Show plugins, Hook: Post End -->
	<?php Theme::plugins('postEnd') ?>

</article>
