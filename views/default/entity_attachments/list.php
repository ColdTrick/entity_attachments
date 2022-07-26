<?php

$entity = elgg_extract('entity', $vars);
if (!$entity instanceof \ElggObject) {
	return;
}

if (!$entity->hasCapability('searchable')) {
	return;
}

if ($entity->getContainerEntity() instanceof \ElggObject) {
	return;
}

$attachments = elgg_list_entities([
	'type' => 'object',
	'subtype' => 'entity_attachment',
	'container_guid' => $entity->guid,
	'limit' => false,
	'list_class' => 'entity-attachments',
	'sort_by' => [
		'property' => 'order',
		'direction' => 'asc',
		'signed' => true,
	],
]);

$menu = '';
$title = '';
if ($entity->canEdit()) {
	$title = '&nbsp'; // required to force existence of header
	
	elgg_require_js('entity_attachments/list');

	$menu = elgg_view('output/url', [
		'text' => elgg_echo('item:object:entity_attachment:add'),
		'icon' => 'paperclip',
		'href' => elgg_http_add_url_query_elements('ajax/form/entity_attachments/add', [
			'guid' => $entity->guid,
		]),
		'class' => [
			'elgg-lightbox',
			'elgg-button',
			'elgg-button-action',
		],
		'data-colorbox-opts' => json_encode([
			'width' => 500,
		]),
	]);
}

if (empty($menu) && empty($attachments)) {
	return;
}

echo elgg_view_module('entity_attachments', $title, $attachments, ['menu' => $menu]);
