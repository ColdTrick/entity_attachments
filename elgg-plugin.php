<?php

return [
	'plugin' => [
		'version' => '5.0',
	],
	'entities' => [
		[
			'type' => 'object',
			'subtype' => 'entity_attachment',
			'class' => \EntityAttachment::class,
			'capabilities' => [
				'commentable' => false,
			],
		],
	],
	'actions' => [
		'entity_attachments/add' => [],
		'entity_attachments/sort' => [],
	],
	'hooks' => [
		'view_vars' => [
			'object/elements/full' => [
				'ColdTrick\EntityAttachments\Views::addAttachments' => [],
			],
		],
	],
	'view_extensions' => [
		'elgg.css' => [
			'entity_attachments/list.css' => [],
		],
	],
	'view_options' => [
		'forms/entity_attachments/add' => ['ajax' => true],
	],
];
