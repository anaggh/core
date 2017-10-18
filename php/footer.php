<div class="footer">
	<?php echo $Site->footer() ?>
		
	<!-- Social Media Links, Sitemap and RSS -->
	<?php
		if($Site->twitter()) {
			echo '<a href="'.$Site->twitter().'" title="twitter-url"><span> Twitter</span></a> |';
		}

		if($Site->facebook()) {
			echo '<a href="'.$Site->facebook().'" title="facebook-url"><span> Facebook</span></a> |';
		}

		if($Site->instagram()) {
			echo '<a href="'.$Site->instagram().'" title="instagram-url"><span> Instagram</span></a> |';
		}

		if($Site->github()) {
			echo '<a href="'.$Site->github().'" title="github-url"><span> Github</span></a> |';
		}

		if( $plugins['all']['pluginRSS']->installed() ) {
			echo '<a href="'.DOMAIN_BASE.'rss.xml'.'" title="rss-url"><span> RSS</span></a> |';
		}

		if( $plugins['all']['pluginSitemap']->installed() ) {
			echo '<a href="'.DOMAIN_BASE.'sitemap.xml'.'" title="sitemap-url"><span> Sitemap</span></a> |';
		}
		?>	
		
	<!-- Go Top! Link -->
	<a href="#" title="go-top">Go Top!</a> |		
</div>