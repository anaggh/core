<!-- Show each post on this page -->
<?php foreach ($posts as $Post): ?>

<article class="post">

	<!-- Show plugins, Hook: Post Begin -->
	<?php Theme::plugins('postBegin') ?>

	<!-- Post's header -->
	<header>
		<div class="title">
			<h1><a href="<?php echo $Post->permalink() ?>"><?php echo $Post->title() ?></a></h1>
			<p><?php echo $Post->description() ?></p>
		</div>
		<div class="meta">
	        <?php
	            // Get the user who created the post.
	            $User = $Post->user();

	            // Default author is the username.
	            $author = $User->username();

	            // If the user has entered the first name or last name, it would be set as author.
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
	<?php echo $Post->content(false) ?>

	<!-- Post's footer -->
	<footer>
		<!-- Read more button -->
	    <?php if($Post->readMore()) {
			echo "<a href=" . $Post->permalink() . " class='button read-more' title='read-more'>" .$Language->get('Read more'). "...</a>";
		}
		?>

		<!-- Post's tags -->
		<div class="tags">TAGS:
			<span class="tag-list">
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

		<!-- A horizontal rule after each post -->
		<hr class="end-post-hr">
	</footer>

	<!-- Plugins Post End -->
	<?php Theme::plugins('postEnd') ?>

</article>

<?php endforeach; ?>

<!-- Pagination -->
<ul class="actions pagination">
<?php
	if( Paginator::get('showNewer') ) {
		echo '<li><a href="'.Paginator::urlFirstPage().'" class="button" title="first-page">'.$Language->get('&#8676;').'</a></li>';
		echo '<li><a href="'.Paginator::urlPrevPage().'" class="button previous" title="previous-page">'.$Language->get('« Newer posts').'</a></li>';
	}

	if( Paginator::get('showOlder') ) {
		echo '<li><a href="'.Paginator::urlNextPage().'" class="button next" title="next-page">'.$Language->get('Older posts »').'</a></li>';
		echo '<li><a href="'.Paginator::urlLastPage().'" class="button" title="last-page">'.$Language->get('&#8677;').'</a></li>';
	}
?>
</ul>
