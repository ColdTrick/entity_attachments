<?php

elgg_require_js('forms/entity_attachments/types/linked_entity');

// filter
$fields = [];

// subtype filter
$registered_subtypes = get_registered_entity_types('object');
$supported_subtypes = elgg_extract('supported_subtypes', $vars, $registered_subtypes);
$supported_subtypes = array_intersect($supported_subtypes, $registered_subtypes);

$options = [];
foreach ($supported_subtypes as $subtype) {
	$label = $subtype;
	if (elgg_language_key_exists("collection:object:{$subtype}")) {
		$label = elgg_echo("collection:object:{$subtype}");
	} elseif (elgg_language_key_exists("item:object:{$subtype}")) {
		$label = elgg_echo("item:object:{$subtype}");
	}
	
	$options[$subtype] = $label;
}
natcasesort($options);
$options = [
	'' => elgg_echo('all'),
] + $options;

$fields[] = [
	'#type' => 'select',
	'#label' => elgg_echo('entity_attachments:linked_entity:subtype'),
	'name' => 'linked_entity[subtype]',
	'options_values' => $options,
];

// group filter
$fields[] = [
	'#type' => 'grouppicker',
	'#label' => elgg_echo('entity_attachments:linked_entity:group'),
	'name' => 'linked_entity[container_guids]',
];

echo elgg_view_field([
	'#type' => 'fieldset',
	'#class' => 'hidden',
	'id' => 'entity-attachments-linked-entity-filter',
	'fields' => $fields,
]);

// search for content
echo elgg_view_field([
	'#type' => 'objectpicker',
	'#label' => elgg_echo('entity_attachments:linked_entity:search'),
	'name' => 'params[linked_entity][entity_guid]',
	'limit' => 1,
	'match_on' => 'linked_entity',
]);
