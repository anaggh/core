<div class="footer">
	<?php echo $Site->footer() ?> | Powered by <a href="https://www.bludit.com/" target="_blank">BLUDIT</a> | Theme: <a href="https://github.com/anaggh/core" target="_blank">Core</a> |
		
	<!-- Sitemap and RSS -->
	<?php
		if( $plugins['all']['pluginRSS']->installed() ) {
			echo '<a href="'.DOMAIN_BASE.'rss.xml'.'"><span> RSS</span></a> |';
		}

		if( $plugins['all']['pluginSitemap']->installed() ) {
			echo '<a href="'.DOMAIN_BASE.'sitemap.xml'.'"><span> Sitemap</span></a> |';
		}
	?>	
		
	<!-- Go Top! Link -->
	<a href="#">Go Top!</a> |		
</div>