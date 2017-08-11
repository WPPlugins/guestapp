    </div>
    <div class="arrows">
    <?php if ($compact): ?>
    	<div class="ls-nav-left-arrow" style="float: left; text-indent: -9999px;">
	    	<a href="#left" data-liquidslider-ref="<?php echo $id ?>">Left</a>
    	</div>
    <?php endif ?>
    <?php if ($compact): ?>
    	<div class="ls-nav-right-arrow" style="float: right; text-indent: -9999px; margin-top: -24px !important;">
	    	<a href="#right" data-liquidslider-ref="<?php echo $id ?>">Right</a>
    	</div>
    <?php endif ?>
	</div>
    <div class="ga-source">
    	<?php _e('Reviews verified by ', 'guestapp') ?>
    	<a href="http://guestapp.me/confiance" target="_blank"><img alt="Guestapp Logo" src="<?php echo plugin_dir_url(__FILE__) ?>../images/logo-<?php echo $color ?>.png" class="ga-logo"></a>
    </div>
</div>
