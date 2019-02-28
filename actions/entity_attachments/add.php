<?php

$guid = (int) get_input('guid');
$entity = get_entity($guid);

$type = get_input('type');
$params = elgg_extract($type, get_input('params'));

if (!$entity instanceof \ElggObject || empty($params)) {
	return elgg_error_response(elgg_echo('error:missing_data'));
}

if (!$entity->canEdit()) {
	return elgg_error_response(elgg_echo('actionunauthorized'));
}

$attachment = new \EntityAttachment();
$attachment->owner_guid = $guid;
$attachment->container_guid = $guid;
$attachment->order = time();

$attachment->attachment_type = $type;

foreach ($params as $key => $value) {
	$attachment->$key = $value;
}

$attachment->save();

$attachments = elgg_list_entities([
	'type' => 'object',
	'subtype' => 'entity_attachment',
	'container_guid' => $guid,
	'limit' => false,
	'list_class' => 'entity-attachments',
	'order_by_metadata' => [
		'name' => 'order',
		'order' => 'asc',
	],
]);

return elgg_ok_response($attachments, elgg_echo('saved'));
