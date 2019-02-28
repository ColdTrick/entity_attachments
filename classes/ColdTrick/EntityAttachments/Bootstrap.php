<?php

namespace ColdTrick\EntityAttachments;

use Elgg\DefaultPluginBootstrap;

class Bootstrap extends DefaultPluginBootstrap {
	
	/**
	 * {@inheritDoc}
	 */
	public function init() {
		
		elgg_extend_view('elgg.css', 'entity_attachments/list.css');
		
		elgg_register_ajax_view('forms/entity_attachments/add');
		
		// plugin hooks
		$hooks = $this->elgg()->hooks;
		$hooks->registerHandler('view_vars', 'object/elements/full', __NAMESPACE__ . '\Views::addAttachments');
	}
}
