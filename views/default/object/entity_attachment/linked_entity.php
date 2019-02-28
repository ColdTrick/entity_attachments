<?php

$entity = elgg_extract('entity', $vars);
if (!$entity instanceof ElggEntity) {
	return;
}

$linked_entity = get_entity($entity->entity_guid);
if (!$linked_entity instanceof ElggEntity) {
	return;
}

$icon = 'link';
if ($linked_entity instanceof \ElggUser) {
	$icon = 'user';
} elseif ($linked_entity instanceof \ElggGroup) {
	$icon = 'users';
}

$vars['icon'] = elgg_view_icon($icon);

$vars['title'] = elgg_view('output/url', [
	'text' => $linked_entity->getDisplayName(),
	'href' => $linked_entity->getURL(),
]);

echo elgg_view('object/entity_attachment/default', $vars);
