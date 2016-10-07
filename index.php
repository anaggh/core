<!DOCTYPE html>
<html lang="en">
<head>
<!-- Include HTML meta tags -->
<?php include(THEME_DIR_PHP.'head.php') ?>
</head>
<body>

<header class="nav">
	<span>
		<a href="<?php echo $Site->url() ?>"><?php echo $Site->title() ?></a>
		<span class="slogan"><?php echo $Site->slogan() ?></span>
	</span>
</header>

<main>
<div class="container">
	<div class="row">
		<div class="col content">
			<?php
			    if( ($Url->whereAmI()=='home') || ($Url->whereAmI()=='tag') || ($Url->whereAmI()=='blog') )
			    {
			        include(THEME_DIR_PHP.'home.php');
			    }
			    elseif($Url->whereAmI()=='post')
			    {
			        include(THEME_DIR_PHP.'post.php');
			    }
			    elseif($Url->whereAmI()=='page')
			    {
			        include(THEME_DIR_PHP.'page.php');
			    }
			?>
		</div>

		<!-- Sidebar -->
		<div class="col sidebar">
		
		<!-- Custom Google Search | Disabled in theme for now. Uncomment if required. Also uncomment the php statement in hidden input.
		<form role="search" action="https://encrypted.google.com/search">
		<div class="form-group">
			<input type="hidden" name="as_sitesearch" value="<?php// echo preg_replace('/(?:https?:\/\/)?(?:www\.)?(.*)\/?$/i', '$1', $Site->url()); /* http://stackoverflow.com/questions/6738752/regex-for-dropping-http-and-www-from-urls */?>">
			<input type="hidden" name="as_qdr" value="all">
			<input type="text" name="as_q" class="form-control" placeholder="Search...">
		</div>
		</form> -->
		
		<!-- Search -->
		<form role="search" action="<?php echo $Site->url() . 'search.php';?>">
		<div class="form-group">
			<input type="hidden" name="filter" value="all">
			<input type="text" name="searchQuery" class="form-control" placeholder="Search...">
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