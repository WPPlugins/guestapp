<div class="ga-widget-container <?php echo $color ?>">
	<?php if ($compact): ?>
		<div id="<?php echo $id ?>" class="ga-review-container liquid-slider">
	<?php elseif ($count > 3): ?>
		<div id="<?php echo $id ?>" class="ga-review-container ga-review-perfectable">
	<?php else: ?>
		<div id="<?php echo $id ?>" class="ga-review-container">
	<?php endif ?>
