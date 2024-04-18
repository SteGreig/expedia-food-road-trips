<li data-start="<?php echo $startCity; ?>" data-end="<?php echo $city; ?>" class="<?php echo $tripLength; ?>">

	<div class="info">
		<h3><?php echo $city; ?></h3>
		<p class="top-dish"><strong>Sedap Gila:</strong> <?php echo $dishes['01']['name']; ?></p>

		<?php if($stopover1 != ""): ?>
		<div class="toggle-wrap stopover-toggle">
			<img class="icon" src="images/stopover.svg" alt="Stopover icon">
			<p>Stopover Suggestions</p>
		</div>
		<?php endif; ?>

		<div class="toggle-wrap more-info-toggle">
			<img class="icon" src="images/more-info-mid.svg" alt="More info icon">
			<p>More Info</p>
		</div>
	</div>

	<?php $citySlug = strtolower(str_replace(' ','-',$city)); ?>
	<div style="background-image:url(images/content/heros/<?php echo $citySlug; ?>.jpg);" class="img-wrap">
		<p class="distance">
			<span><?php echo $distance; ?></span>
			<strong><?php echo $length; ?></strong>
		</p>
	</div>

	<button class="select">Select Destination</button>

	<?php include('stopovers.php'); ?>

</li>