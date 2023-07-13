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
		'Crystalline Caverns' => 'DRG_CrystalCaves_1080p.jpg',
		'Salt Pits' => 'Wallpaper_Team_4k.jpg',
		'Fungus Bogs' => 'DRG_FungusBogs_1080p.jpg',
		'Radioactive Exclusion Zone' => 'DRG_RadioactiveZone_1080p.jpg',
		'Dense Biozone' => 'DRG_DenseBiozone_1080p.jpg',
		'Glacial Strata' => 'DRG_GlacialStrata_1080p.jpg',
		'Hollow Bough' => 'Wallpaper_Team_4k.jpg',
		'Azure Weald' => 'AzureWeald_Wallpaper16x9.jpg',
		'Magma Core' => 'DRG_Magmacaves_1080p.jpg',
		'Sandblasted Corridors' => 'Wallpaper_Team_4k.jpg',
	];

	$basePath = '/drg/img/bg/';

	if (isset($biomeImages[$biome])) {
		return $basePath . $biomeImages[$biome];
	}

	return '';
}





//Determine which icon to use for the mission types.
function renderMissionIcon($type)
{
	$imagePath = '';

	switch (true) {
		case str_contains($type, 'Morkite'):
			$imagePath = 'Mining_expedition_icon-2.webp';
			break;
		case str_contains($type, 'Mule'):
			$imagePath = 'Salvage_icon-2.webp';
			break;
		case str_contains($type, 'Egg'):
			$imagePath = 'Egg_collection_icon-2.webp';
			break;
		case str_contains($type, 'Escort'):
			$imagePath = 'Escort_icon-2.webp';
			break;
		case str_contains($type, 'Black'):
			$imagePath = 'Blackbox_icon-2.webp';
			break;
		case str_contains($type, 'Aquarq'):
			$imagePath = 'Point_extraction_icon-2.webp';
			break;
		case str_contains($type, 'Refin'):
			$imagePath = 'Refining_icon-2.webp';
			break;
		case str_contains($type, 'Sabotage'):
			$imagePath = 'Sabotage_icon-2.webp';
			break;
		case str_contains($type, 'Dread'):
			$imagePath = 'Elimination_icon-2.webp';
			break;
	}

	if ($imagePath !== '') {
		return '<img src="/drg/img/mission/' . $imagePath . '" width="60%" height="auto">';
	}

	return '';
}




//Determine which icon to use for the anomalies.
function renderAnomalyIcon($anomaly)
{
	$anomalyIcons = [
		"Critical Weakness" => "Mutator_critical_weakness_icon.webp",
		"Double XP" => "Mutator_triple_xp_icon.webp",
		"Gold Rush" => "Mutator_gold_rush_icon.webp",
		"Golden Bugs" => "Mutator_golden_bugs_icon.webp",
		"Low Gravity" => "Mutator_low_gravity_icon.webp",
		"Mineral Mania" => "Mutator_mineral_mania_icon.webp",
		"Rich Atmosphere" => "Mutator_rich_atmosphere_icon.webp",
		"Volatile Guts" => "Mutator_volatile_guts_icon.webp",	
	];

	if (isset($anomalyIcons[$anomaly])) {
		$iconPath = "/drg/img/mutator/" . $anomalyIcons[$anomaly];
		return '<img src="' . $iconPath . '" width="32px" height="auto" data-bs-toggle="tooltip" data-bs-placement="top" title="' . $anomaly . '">';
	}

	return '';
}




//Determine which icon to use for the warnings.
function renderWarningIcon($warning)
{
	$warningIcons = [
		"Cave Leech Cluster" => "Warning_cave_leech_cluster_icon.webp",
		"Elite Threat" => "Warning_elite_threat_icon.webp",
		"Exploder Infestation" => "Warning_exploder_infestation_icon.webp",
		"Haunted Cave" => "Warning_haunted_cave_icon.webp",
		"Lethal Enemies" => "Warning_lethal_enemies_icon.webp",
		"Low Oxygen" => "Warning_low_oxygen_icon.webp",
		"Mactera Plague" => "Warning_mactera_plague_icon.webp",
		"Parasites" => "Warning_parasites_icon.webp",
		"Regenerative Bugs" => "Warning_regenerative_bugs_icon.webp",
		"Rival Presence" => "Warning_rival_presence_icon.webp",
		"Shield Disruption" => "Warning_shield_disruption_icon.webp",
		"Swarmageddon" => "Warning_swarmageddon_icon.webp",
	];

	if (isset($warningIcons[$warning])) {
		$iconPath = "/drg/img/warning/" . $warningIcons[$warning];
		return '<img src="' . $iconPath . '" width="32px" height="auto" data-bs-toggle="tooltip" data-bs-placement="top" title="' . $warning . '">';
	}

	return '';
}