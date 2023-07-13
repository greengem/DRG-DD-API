<?php 
	include '/var/www/html/drg/header.php';
	include '/var/www/html/drg/nav.php';

?>

<!-- Set Wallpaper for each Deep Dive section based on Biome -->
<?php
$variants = $DeepDiveData['variants'];
foreach ($variants as $variant) {
	$biome = $variant['biome'];
	$backgroundImageUrl = getBackgroundImageUrl($biome);
	echo '<section style="background-image: url(\'' . $backgroundImageUrl . '\')">';
?>
	
		<div class="container text-center">
			
			<div class="dd-titles">
				<h2><?php echo $variant['type']; ?>: <?php echo $variant['name']; ?></h2>
				<p class="text-muted"><?php echo $variant['biome']; ?></p>
			</div>
			
			<div class="card-group">
			<?php 
				$stages = $variant['stages']; $i = 1;
				foreach ($stages as $stage) {
			?>
				<div class="card">
					<div class="card-body">
						<?php echo '<h5 class="card-title">Stage ' . $i . '</h5>'; $i++; ?>
						<div class="row">
							<div class="col">
								<?php echo renderImage($stage['primary']); ?>
								<br />
								<small><?php echo $stage['primary']; ?></small>
							</div>
							<div class="col">
								<?php echo renderImage($stage['secondary']); ?>
								<br />
								<small><?php echo $stage['secondary']; ?></small>
							</div>
						</div>
					</div>


					<?php if ($stage['anomaly'] !== null || $stage['warning'] !== null) {
						echo '<div class="card-footer text-muted">';
						if ($stage['anomaly'] !== null) {
							renderAnomalyIcon($stage['anomaly']);
						}
						if ($stage['warning'] !== null) {
							renderWarningIcon($stage['warning']);
						}
						echo '</div>';
					} ?>
			</div>
			<?php } ?>
	</div>
</div>
		</section>

<?php } ?>


<!-- Bootstrap JavaScript and Tooltip initialization -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>

  <script>
	document.addEventListener('DOMContentLoaded', function() {
	  var tooltips = Array.from(document.querySelectorAll('[data-bs-toggle="tooltip"]'));
	  tooltips.map(function (tooltip) {
		return new bootstrap.Tooltip(tooltip);
	  });
	});
  </script>

</body>
</html>