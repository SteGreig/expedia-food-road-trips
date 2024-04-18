<?php if($stopover1 != ""): ?>
<div class="stopovers">

	<img class="close-stopovers" src="images/cross.svg" alt="Close icon">

	<h3><?php echo "<strong>".$startCity."</strong> to <strong>".$city."</strong>"; ?> stopovers</h3>

	<div class="stopover">
		<div class="stopover-img-wrap" style="background-image:url(images/content/stopovers/<?php echo strtolower(str_replace(' ','-',$city)); ?>.jpg);"><a rel="nofollow" target="_blank" href="<?php echo $stopover1Link; ?>"><?php echo $stopover1Credit; ?></a></div>
		<div class="stopover-info">
			<h4><?php echo $stopover1; ?></h4>
			<p><?php echo $stopover1desc; ?></p>
			<p class="stopover-address"><?php echo $stopover1add; ?></p>
		</div>
		<div class="add-to-route active" data-stopover="<?php echo $stopover1; ?>" data-num="<?php echo str_replace(" ","-",$city); ?>-one">
			<p>Add to route</p>
			<img class="icon" src="images/add.svg" alt="Add icon">
		</div>
		<div class="remove-from-route" data-num="<?php echo str_replace(" ","-",$city); ?>-one">
			<p>Remove from route</p>
			<img class="icon" src="images/minus.svg" alt="Remove icon">
		</div>
	</div>

</div>
<?php endif; ?>