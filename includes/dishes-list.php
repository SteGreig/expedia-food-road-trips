<ul class="dishes-<?php echo str_replace(" ", "-", strtolower($startCity))."-".str_replace(" ", "-", strtolower($city)); ?>">
	<?php $n=0; foreach ($dishes as $dish): $n++; ?>

		<li class="list-item-block">
			<div class="img-wrap">
				<?php if($dish['noimg'] != "true"): ?>
					<img src="images/content/dishes/<?php echo strtolower(str_replace(' ','-',$city)); ?>/<?php echo str_replace(' ','-',$city)."-Dish-".$n; ?>.jpg" alt="<?php echo $dish['name']; ?>">
				<?php endif; ?>
				<?php if($dish['dishCredit'] != ""): ?>
					<a rel="nofollow" target="_blank" class="img-credit" href="<?php echo $dish['dishLink']; ?>"><?php echo $dish['dishCredit']; ?></a>
				<?php endif; ?>
			</div>

			<div class="copy-block">
				<h4><?php echo $dish['name']; ?></h4>
			</div>
		</li>
		
	<?php endforeach; ?>
</ul>