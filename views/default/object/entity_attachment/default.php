<?php

$entity = elgg_extract('entity', $vars);
if (!$entity instanceof ElggEntity) {
	return;
}

$defaults = [
	'icon' => false,
	'access' => false,
	'byline' => false,
	'time' => false,
	
	// set custom metada because we can't pass dropdown = false to summary
	'metadata' => elgg_view_menu('entity', [
		'entity' => elgg_extract('entity', $vars),
		'handler' => elgg_extract('handler', $vars),
		'dropdown' => false,
	]),
	'show_social_menu' => false,
	'subtitle' => $entity->subtitle
];

$vars = array_merge($defaults, $vars);

if (!isset($vars['title']) && empty($entity->getDisplayName())) {
	$vars['title'] = get_class($entity);
}

echo elgg_view('object/elements/summary', $vars);
