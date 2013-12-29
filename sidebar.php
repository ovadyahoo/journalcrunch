<!-- Begin #colRight -->
	<aside>
			<?php // Widgetized sidebar 
			if ( ! dynamic_sidebar( 'sidebar' ) ) :?>
			<div class="rightBox">
				<div class="rightBoxInner">
				<h2><?php _e("WIDGETS NEEDED!", "site5framework"); ?></h2>
				<p><?php _e("Go ahead and add some widgets here! Admin &gt; Appearance &gt; Widgets", "site5framework"); ?></p>
				</div>
			</div>
			<?php endif; ?>
	</aside>
	
<!-- End #colRight -->