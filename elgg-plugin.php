<?php

use ColdTrick\EntityAttachments\Bootstrap;

return [
	'bootstrap' => Bootstrap::class,
	'entities' => [
		[
			'type' => 'object',
			'subtype' => 'entity_attachment',
			'class' => \EntityAttachment::class,
		],
	],
	'actions' => [
		'entity_attachments/add' => [],
		'entity_attachments/sort' => [],
	],
];
