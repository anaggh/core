<div class="footer">
	<?php echo $Site->footer() ?>
		
	<!-- Social Media Links, Sitemap and RSS -->
	<?php
		if($Site->twitter()) {
			echo '<a href="'.$Site->twitter().'"><span> Twitter</span></a> |';
		}

		if($Site->facebook()) {
			echo '<a href="'.$Site->facebook().'"><span> Facebook</span></a> |';
		}

		if($Site->instagram()) {
			echo '<a href="'.$Site->instagram().'"><span> Instagram</span></a> |';
		}

		if($Site->github()) {
			echo '<a href="'.$Site->github().'"><span> Github</span></a> |';
		}

		if( $plugins['all']['pluginRSS']->installed() ) {
			echo '<a href="'.DOMAIN_BASE.'rss.xml'.'"><span> RSS</span></a> |';
		}

		if( $plugins['all']['pluginSitemap']->installed() ) {
			echo '<a href="'.DOMAIN_BASE.'sitemap.xml'.'"><span> Sitemap</span></a> |';
		}
		?>	
		
	<!-- Go Top! Link -->
	| <a href="#">Go Top!</a> |		
</div>