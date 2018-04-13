<p>List of cinemas near you that broadcast the movie:</p>
<?php foreach($data->cinemas as $cinema): ?>
	<p>
		<?= $cinema->name ?>
	</p>
	<p >
		<?= $cinema->location->address->street ?>
	</p>
	<p style=" margin-bottom:25px">
		<?= $cinema->location->address->zipcode ?>
			<?= $cinema->location->address->city ?>
	</p>
	<?php
	if($cinema->website){
		echo '<a href='.$cinema->website.'>View website</a>';
	}
	endforeach; ?>