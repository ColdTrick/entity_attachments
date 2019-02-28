<?php

echo elgg_view_field([
	'#type' => 'text',
	'#label' => elgg_echo('title'),
	'name' => 'params[custom_link][title]',
]);

echo elgg_view_field([
	'#type' => 'url',
	'#label' => elgg_echo('entity_attachments:href'),
	'name' => 'params[custom_link][href]',
]);

echo elgg_view_field([
	'#type' => 'text',
	'#label' => elgg_echo('subtitle'),
	'name' => 'params[custom_link][subtitle]',
]);
