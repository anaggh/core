<!DOCTYPE html>
<html lang="en">
<head>
<!-- Include HTML meta tags -->
<?php include_once(THEME_DIR_PHP.'head.php') ?>
</head>
<body>

<header class="nav">
	<span>
		<a href="<?php echo $Site->url() ?>" title="company-title"><?php echo $Site->title() ?></a>
		<span class="slogan"><?php echo $Site->slogan() ?></span>
	</span>
</header>

<main>
<div class="container">
	<div class="row">
		<div class="col content">
			<?php
			if($Url->whereAmI()=='post') {
						include(THEME_DIR_PHP.'post.php');
					}
			elseif($Url->whereAmI()=='page') {
				include(THEME_DIR_PHP.'page.php');
			}
			else {
				include(THEME_DIR_PHP.'home.php');
			}
			?>
		</div>

		<!-- Sidebar -->
		<div class="col sidebar">

		<!-- Search -->
		<form role="search" action="<?php echo $Site->url() . 'search.php';?>" target="_blank">
		<div class="form-group">
			<input type="text" name="q" class="form-control" placeholder="Search...">
		</div>
		</form>


		<!-- Load sidebar -->
		<?php Theme::plugins('siteSidebar') ?>
		</div>
	</div>
</div>
</main>

<footer>
	<?php include(THEME_DIR_PHP.'footer.php') ?>
</footer>

<!-- Add Scripts here (if required) -->

<!-- Plugins Site Body End -->
<?php Theme::plugins('siteBodyEnd') ?>

</body>
</html>
