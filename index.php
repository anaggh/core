<?php
// Common Theme functions
include(THEME_DIR_PHP.'functions.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
<!-- Include HTML meta tags -->
<?php include_once(THEME_DIR_PHP.'head.php') ?>
</head>
<body>
<?php Theme::plugins('siteBodyBegin') ?>
<header class="nav">
    <span>
        <a href="<?= $site->url() ?>" title="site-title" class='large-text'><?= $site->title() ?></a>
        <span class="slogan"><?= $site->slogan() ?></span>
    </span>
    <!-- Search -->
    <form role="search" action="<?= DOMAIN_BASE.'search.php' ?>" target="_blank">
        <input type="text" name="q" class="form-control" placeholder="Search...">
    </form>
</header>

<main>
<div class="container">

    <div class="row">
        <div class="col content">
            <?php
            if ($WHERE_AM_I =='page') {
                include(THEME_DIR_PHP.'page.php');
            } else {
                include(THEME_DIR_PHP.'home.php');
            }
            ?>
        </div>

        <!-- Sidebar -->
        <div class="col sidebar">
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
