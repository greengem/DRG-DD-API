<?php 

// Fetch the JSON for Salutes
function fetchJSONData($url)
{
	$jsonData = file_get_contents($url);
	return json_decode($jsonData, true);
}

// Fetch the JSON for Salutes
$SalutesData = fetchJSONData('https://drgapi.com/v1/salutes');

// Fetch the JSON for Trivia
$TriviaData = fetchJSONData('https://drgapi.com/v1/trivia');

// Fetch the JSON for Deep Dive
$DeepDiveData = fetchJSONData('https://drgapi.com/v1/deepdives');




function getBackgroundImageUrl($biome)
{
	$biomeImages = [
		'Azure Weald' => 'azure_weald.jpg',
		'Crystalline Caverns' => 'crystal_caves.jpg',
		'Dense Biozone' => 'dense_biozone.jpg',
		'Fungus Bogs' => 'fungus_bogs.jpg',
		'Glacial Strata' => 'glacial_strata.jpg',
		'Hollow Bough' => 'fallback.jpg',
		'Magma Core' => 'magma_caves.jpg',
		'Radioactive Exclusion Zone' => 'radioactive_zone.jpg',
		'Salt Pits' => 'fallback.jpg',
		'Sandblasted Corridors' => 'fallback.jpg',
	];

	$basePath = 'img/bg/';

	if (isset($biomeImages[$biome])) {
		return $basePath . $biomeImages[$biome];
	}

	return '';
}





//Determine which icon to use for the mission types.
//TODO use exact matches instead of contains, cant find list of exact outputs
function renderMissionIcon($type)
{
	$imagePath = '';

	switch (true) {
		case str_contains($type, 'Aquarq'):
			$imagePath = 'point_extraction.webp';
			break;
		case str_contains($type, 'Black'):
			$imagePath = 'blackbox.webp';
			break;
		case str_contains($type, 'Dread'):
			$imagePath = 'elimination.webp';
			break;
		case str_contains($type, 'Egg'):
			$imagePath = 'egg_collection.webp';
			break;
		case str_contains($type, 'Escort'):
			$imagePath = 'escort.webp';
			break;		
		case str_contains($type, 'Morkite'):
			$imagePath = 'mining_expedition.webp';
			break;
		case str_contains($type, 'Mule'):
			$imagePath = 'salvage.webp';
			break;
		case str_contains($type, 'Refin'):
			$imagePath = 'refining.webp';
			break;
		case str_contains($type, 'Sabotage'):
			$imagePath = 'sabotage.webp';
			break;
	}

	if ($imagePath !== '') {
		return '<img src="img/mission/' . $imagePath . '" width="60%" height="auto">';
	}

	return '';
}




//Determine which icon to use for the anomalies.
function renderAnomalyIcon($anomaly)
{
	$anomalyIcons = [
		"Critical Weakness" => "critical_weakness.webp",
		"Double XP" => "triple_xp.webp",
		"Gold Rush" => "gold_rush.webp",
		"Golden Bugs" => "golden_bugs.webp",
		"Low Gravity" => "low_gravity.webp",
		"Mineral Mania" => "mineral_mania.webp",
		"Rich Atmosphere" => "rich_atmosphere.webp",
		"Volatile Guts" => "volatile_guts.webp",	
	];

	if (isset($anomalyIcons[$anomaly])) {
		$iconPath = "img/mutator/" . $anomalyIcons[$anomaly];
		return '<img src="' . $iconPath . '" width="32px" height="auto" data-bs-toggle="tooltip" data-bs-placement="top" title="' . $anomaly . '">';
	}

	return '';
}




//Determine which icon to use for the warnings.
function renderWarningIcon($warning)
{
	$warningIcons = [
		"Cave Leech Cluster" => "cave_leech_cluster.webp",
		"Elite Threat" => "elite_threat.webp",
		"Exploder Infestation" => "exploder_infestation.webp",
		"Haunted Cave" => "haunted_cave.webp",
		"Lethal Enemies" => "lethal_enemies.webp",
		"Low Oxygen" => "low_oxygen.webp",
		"Mactera Plague" => "mactera_plague.webp",
		"Parasites" => "parasites.webp",
		"Regenerative Bugs" => "regenerative_bugs.webp",
		"Rival Presence" => "rival_presence.webp",
		"Shield Disruption" => "shield_disruption.webp",
		"Swarmageddon" => "swarmageddon.webp",
	];

	if (isset($warningIcons[$warning])) {
		$iconPath = "img/warning/" . $warningIcons[$warning];
		return '<img src="' . $iconPath . '" width="32px" height="auto" data-bs-toggle="tooltip" data-bs-placement="top" title="' . $warning . '">';
	}

	return '';
}