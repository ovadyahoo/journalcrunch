</div>
<!-- End #content -->
	</div>
	<!-- End #wrapper -->
	<!-- Begin #footer -->
	<footer>
		<div id="footerInner">
		<?php if ( is_active_sidebar( 'footer_jc' ) ) : ?>
						<?php dynamic_sidebar( 'footer_jc' ); ?>
                <?php endif; ?>
		<!-- BEGIN COPYRIGHT -->
		<div id="copyright">
                <div id="owners">
                    <?php if (of_get_option('journal_footer_copyright') <> ""){
				echo stripslashes(stripslashes(of_get_option('journal_footer_copyright')));
				}else{
					echo 'Just go to Theme Options Page and edit copyright text';
				}?>
                </div>

				<div id="site5bottom">Created by <a href="http://www.s5themes.com/">Site5 WordPress
Themes</a>. Experts in <a href="http://gk.site5.com/t/545">WordPress Hosting</a>. </div>
		</div>
		<!-- END COPYRIGHT -->
		</div>
	</footer>
	<!-- End #footer -->
</div>
<!-- End #mainWrapper -->

	<!-- Header Twitter Tooltip -->
	<div class="tooltip">
				<ul id="twitter_update_list"></ul>
				<script src="http://twitter.com/javascripts/blogger.js" type="text/javascript"></script>
				<script src="http://api.twitter.com/1/statuses/user_timeline.json?screen_name=<?php echo of_get_option('journal_twitter_user'); ?>&include_rts=1&callback=twitterCallback2&count=1" type="text/javascript"></script>

	</div>

<?php wp_footer(); ?>

</body>
</html>
