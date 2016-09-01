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
	<?php echo $Post->content(false) ?>

	<!-- Post's footer -->
	<footer>

		<!-- Read more button -->
	        <?php if($Post->readMore()) { ?>
		<ul class="actions">
			<li><a href="<?php echo $Post->permalink() ?>" class="button"><?php $Language->p('Read more') ?></a></li>
		</ul>
		<?php } ?>

		<!-- Post's tags -->
		<ul class="stats"> TAGS:
		<?php
			$tags = $Post->tags(true);
			if(count($tags) == 0){ echo "No tags found.";}
			foreach($tags as $tagKey=>$tagName) {
				echo '<li><a href="'.HTML_PATH_ROOT.$Url->filters('tag').'/'.$tagKey.'">'.$tagName.'</a></li>';
			}
		?>
		</ul>

		<!-- A horizontal rule after each post -->
		<hr class="endPostHr">
	</footer>

	<!-- Plugins Post End -->
	<?php Theme::plugins('postEnd') ?>

</article>

<?php endforeach; ?>

<!-- Pagination -->
<ul class="actions pagination">
<?php
	if( Paginator::get('showNewer') ) {
		echo '<li><a href="'.Paginator::urlPrevPage().'" class="button previous">'.$Language->get('<< Older posts').'</a></li>';
	}

	if( Paginator::get('showOlder') ) {
		echo '<li><a href="'.Paginator::urlNextPage().'" class="button next">'.$Language->get('Newer posts >>').'</a></li>';
	}
?>
</ul>
