
<div class="more-info-modal info-<?php echo str_replace(" ", "-", strtolower($startCity))."-".strtolower(str_replace(" ","-",$city)); ?>">

	<img class="icon close-modal" src="images/cross.svg" alt="Close icon">

	<div class="hero-img-wrap">
		<img src="images/content/heros/<?php echo strtolower(str_replace(' ','-',$city)); ?>.jpg" alt="<?php echo $city; ?>">
		<?php if($heroCredit != ""): ?>
			<a target="_blank" rel="nofollow" class="img-credit" href="<?php echo $heroLink; ?>"><?php echo $heroCredit; ?></a>
		<?php endif; ?>
	</div>

	<div class="trip-info">
		<h2><?php echo $city; ?></h2>
		<p class="top-dish"><span>Sedap Gila:</span> <?php echo $dishes['01']['name']; ?></p>
		<p class="distance">
			<span><?php echo $distance; ?></span>
			<strong><?php echo $length; ?></strong>
		</p>
	</div>

	<ul class="tabs-nav">
		<li class="active"><img class="icon off" src="images/more-info-dark.svg" alt="More Info icon"><img class="icon on" src="images/more-info-light.svg" alt="More Info icon"></li>
		<li><img class="icon off" src="images/food-dark.svg" alt="Food icon"><img class="icon on" src="images/food-light.svg" alt="Food icon"></li>
		<li><img class="icon off" src="images/hotel-dark.svg" alt="Hotel icon"><img class="icon on" src="images/hotel-light.svg" alt="Hotel icon"></li>
		<li><img class="icon off" src="images/sights-dark.svg" alt="More Info icon"><img class="icon on" src="images/sights-light.svg" alt="More Info icon"></li>
	</ul>


	<div class="tabs">

		<article class="active tab-panel tab-more-info">
			<h3>Destination Information</h3>
			<?php echo $description; ?>
		</article>

		<article class="tab-panel tab-food">
			<h3>Best local dishes in <?php echo $city; ?></h3>
			<ul>
				<?php $n=0; foreach ($dishes as $dish): $n++; ?>

					<li class="list-item-block">
						<div class="img-wrap">
							<?php if($dish['noimg'] != "true"): ?>
								<img src="images/content/dishes/<?php echo strtolower(str_replace(' ','-',$city)); ?>/<?php echo str_replace(' ','-',$city)."-Dish-".$n; ?>.jpg" alt="<?php echo $dish['name']; ?>">
							<?php endif; ?>
							<?php if($dish['dishCredit'] != ""): ?>
								<a target="_blank" rel="nofollow" class="img-credit" href="<?php echo $dish['dishLink']; ?>"><?php echo $dish['dishCredit']; ?></a>
							<?php endif; ?>
						</div>

						<div class="copy-block">
							<h3><?php echo $dish['name']; ?></h3>
							<p><?php echo $dish['description']; ?></p>
							<p class="address"><?php echo $dish['address']; ?></p>
						</div>
					</li>
					
				<?php endforeach; ?>
			</ul>
		</article>

		<article class="tab-panel tab-hotels">
			<h3>Hotels in <?php echo $city; ?></h3>
			<ul>
				<?php $n=0; foreach ($hotels as $hotel): $n++; ?>

					<li class="list-item-block">
						<div class="img-wrap">
							<?php if($hotel['noimg'] != "true"): ?>
								<img src="images/content/hotels/<?php echo str_replace(' ','-',$city)."-Hotel-".$n; ?>.jpg" alt="<?php echo $hotel['name']; ?>">
							<?php endif; ?>
							<?php if($hotel['hotelCredit'] != ""): ?>
								<a target="_blank" rel="nofollow" class="img-credit" href="<?php echo $hotel['hotelLink']; ?>"><?php echo $hotel['hotelCredit']; ?></a>
							<?php endif; ?>
						</div>

						<div class="copy-block">
							<h3><?php echo $hotel['name']; ?></h3>
							<p><?php echo $hotel['desc']; ?></p>
							<p class="address"><?php echo $hotel['address']; ?></p>
							<a class="cta" target="_blank" href="<?php echo $hotel['link']; ?>">Book Now</a>
						</div>
					</li>
					
				<?php endforeach; ?>
			</ul>
		</article>

		<article class="tab-panel tab-landmarks">
			<h3>Top attractions in <?php echo $city; ?></h3>
			<ul>
				<?php $n=0; foreach ($landmarks as $landmark): $n++; ?>

					<li class="list-item-block">
						<div class="img-wrap">
							<?php if($landmark['noimg'] != "true"): ?>
								<img src="images/content/landmarks/<?php echo str_replace(' ','-',$city)."-Attraction-".$n; ?>.jpg" alt="<?php echo $landmark['name']; ?>">
							<?php endif; ?>
							<?php if($landmark['landmarkCredit'] != ""): ?>
								<a target="_blank" rel="nofollow" class="img-credit" href="<?php echo $landmark['landmarkLink']; ?>"><?php echo $landmark['landmarkCredit']; ?></a>
							<?php endif; ?>
						</div>

						<div class="copy-block">
							<h3><?php echo $landmark['name']; ?></h3>
							<p><?php echo $landmark['desc']; ?></p>
							<p class="address"><?php echo $landmark['address']; ?></p>
						</div>
					</li>
					
				<?php endforeach; ?>
			</ul>
		</article>
	</div>


</div>