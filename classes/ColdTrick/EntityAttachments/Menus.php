<?php

namespace ColdTrick\EntityAttachments;

class Menus {
	
	/**
	 * Moves the delete action to a primary action (outside of the dropdown)
	 *
	 * @param \Elgg\Hook $hook 'register', 'menu:entity'
	 *
	 * @return []
	 */
	public static function makeDeletePrimaryAction(\Elgg\Hook $hook) {
		if (!$hook->getEntityParam() instanceof \EntityAttachment) {
			return;
		}
		
		$menu = $hook->getValue();
		
		/** @var \ElggMenuItem $delete */
		$delete = $menu->get('delete');
		if (empty($delete)) {
			return;
		}
		
		$delete->setSection('_first');
	}
}
