<?php

use Elgg\BadRequestException;

$entity = elgg_extract('entity', $vars);
if (!$entity instanceof \ElggObject) {
	throw new BadRequestException();
}

$body = elgg_view_field([
	'#type' => 'hidden',
	'name' => 'guid',
	'value' => $entity->guid,
]);

$options_values = [
	'linked_entity' => elgg_echo('entity_attachments:forms:add:type:linked_entity'),
	'custom_link' => elgg_echo('entity_attachments:forms:add:type:custom_link'),
	'download_link' => elgg_echo('entity_attachments:forms:add:type:download_link'),
];

$body .= elgg_view_field([
	'#type' => 'radio',
	'#label' => elgg_echo('entity_attachments:forms:add:type'),
	'name' => 'type',
	'options_values' => $options_values,
]);

foreach ($options_values as $key => $label) {
	$view_contents = elgg_view('forms/entity_attachments/types/' . $key, $vars);
	$view_contents .= elgg_view_field([
		'#type' => 'submit',
		'value' => elgg_echo('save'),
	]);
	
	$body .= elgg_view_module('inline', $label, $view_contents, [
		'class' => [
			'hidden',
			'entity-attachments-type',
			'entity-attachments-type-' . $key,
		],
	]);
}

echo elgg_view_module('info', elgg_echo('item:object:entity_attachment:add'), $body);
