<div class="container">
	<h1 class="title">the cinemas that broadcasts this film</h1>
	<div class="line"></div>
</div>
<?php foreach($data->cinemas as $cinema): ?>
	<p class="cinema-name">
		<?= $cinema->name ?>
	</p>
	<p class="cinema-location">
		<?= $cinema->location->address->street ?>
	</p>
	<p class="cinema-city">
		<?= $cinema->location->address->zipcode ?>
			<?= $cinema->location->address->city ?>
	</p>
	<?php
	if($cinema->website){
		echo '<a class="cinema-view" href='.$cinema->website.'>View website</a>';
	}
	endforeach; ?>