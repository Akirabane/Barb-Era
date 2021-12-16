<h1>Bravo <?php echo $profil[0]['user_pseudo'] ?></h1>

<h2 class="info">Vous êtes inscrits au grand concours</h2>

<div id="concours_div">
	<div class="div_centre">
		<h3 class="info">Participants</h3>
		<table class="table table-hover table-borderless table-sm table-light border-dark info classement2">
			<thead>
				<tr>
					<th scope="col">Pseudo</th>
				</tr>
			</thead>
			<tbody>
				<?php
				foreach ( $concours as $un):
					?>
					<tr>
						<td><?php echo $un['user_pseudo'] ?></td>
					</tr>
					<?php
				endforeach;
				?>
			</tbody>
		</table>
	</div>
	<div class="div_centre">
		<img src="<?php echo base_url(); ?>/assets/photos/concours.png">
	</div>
</div>