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