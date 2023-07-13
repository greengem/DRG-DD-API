<?php 
include '/var/www/html/drg/header.php';
include '/var/www/html/drg/nav.php';
$variants = $DeepDiveData['variants'];
foreach ($variants as $variant) {
	$biome = $variant['biome'];
	$backgroundImageUrl = getBackgroundImageUrl($biome);
?>
	
<section style="background-image: url('<?php echo $backgroundImageUrl; ?>')" class="makeclassfordiffbackgrounds">
	<div class="container text-center">
		<div class="dd-titles">
		<?php if ($biome == 'Glacial Strata') {
			echo "<h2 style='color: #000;'>{$variant['type']}: {$variant['name']}</h2><p style='color: #000;'>{$variant['biome']}</p>";
		} else {
			echo "<h2>{$variant['type']}: {$variant['name']}</h2><p>{$variant['biome']}</p>";
		}
		?>
		</div>
		
		<div class="card-group">
			<?php 
			$stages = $variant['stages'];
			$i = 1;
			
			foreach ($stages as $stage) {
			?>
			<div class="card">
				<div class="card-body">
					<h5 class="card-title">Stage <?php echo $i; ?></h5>
					
					<div class="row mission-type">
						<div class="col">
							<?php echo renderMissionIcon($stage['primary']); ?>
							<br />
							<p><?php echo $stage['primary']; ?></p>
						</div>
						<div class="col">
							<?php echo renderMissionIcon($stage['secondary']); ?>
							<br />
							<p><?php echo $stage['secondary']; ?></p>
						</div>
					</div>
				</div>

				<?php if ($stage['anomaly'] !== null || $stage['warning'] !== null) { ?>
					<div class="card-footer text-muted">
						<?php if ($stage['anomaly'] !== null) {
							echo renderAnomalyIcon($stage['anomaly']);
						}
						
						if ($stage['warning'] !== null) {
							echo renderWarningIcon($stage['warning']);
						}
						?>
					</div>
				<?php } ?>

			</div>
			<?php $i++; } ?>
		</div>
	</div>
</section>

<?php } ?>

<!-- Bootstrap JavaScript and Tooltip initialisation -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>

<script>
	document.addEventListener('DOMContentLoaded', function() {
		var tooltips = Array.from(document.querySelectorAll('[data-bs-toggle="tooltip"]'));
		tooltips.map(function (tooltip) {
			return new bootstrap.Tooltip(tooltip);
		});
	});
</script>

<footer>
	<section>
		<div class="container">

		<?php
			$salutes = $SalutesData['salutes'];
			$trivia = $TriviaData['trivia'];
			echo "<h4 class='display-4'>" . $salutes[array_rand($salutes)] . "</h4>";
			echo "<p style='display: none;'>" . $trivia[array_rand($trivia)] . "</p>";
		?>

		</div>
	</section>
</footer>


</body>
</html>
