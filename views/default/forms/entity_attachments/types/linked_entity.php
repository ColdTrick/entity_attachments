<?php

echo elgg_view_field([
	'#type' => 'objectpicker',
	'name' => 'params[linked_entity][entity_guid]',
	'limit' => 1,
	'subtype' => get_registered_entity_types('object'),
]);
