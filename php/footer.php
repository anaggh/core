<div class="footer">
    <?php echo $site->footer() ?>

    <!-- Social Media Links, Sitemap and RSS -->
    <?php
    if ($site->twitter()) {
        echo '<a href="'.$site->twitter().'" title="twitter-url"><span> Twitter</span></a> |';
    }

    if ($site->facebook()) {
        echo '<a href="'.$site->facebook().'" title="facebook-url"><span> Facebook</span></a> |';
    }

    if ($site->instagram()) {
        echo '<a href="'.$site->instagram().'" title="instagram-url"><span> Instagram</span></a> |';
    }

    if ($site->github()) {
        echo '<a href="'.$site->github().'" title="github-url"><span> Github</span></a> |';
    }

    if ($plugins['all']['pluginRSS']->installed()) {
        echo '<a href="'.DOMAIN_BASE.'rss.xml'.'" title="rss-url"><span> RSS</span></a> |';
    }

    if ($plugins['all']['pluginSitemap']->installed()) {
        echo '<a href="'.DOMAIN_BASE.'sitemap.xml'.'" title="sitemap-url"><span> Sitemap</span></a> |';
    }
    ?>

    <!-- Go Top! Link -->
    <a href="#" title="go-top">Go Top!</a> |
</div>
