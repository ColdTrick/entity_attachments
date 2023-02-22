<?php

namespace ColdTrick\EntityAttachments;

/**
 * Menu related callbacks
 */
class Menus {
	
	/**
	 * Moves the delete action to a primary action (outside of the dropdown)
	 *
	 * @param \Elgg\Event $event 'register', 'menu:entity'
	 *
	 * @return []
	 */
	public static function makeDeletePrimaryAction(\Elgg\Event $event) {
		if (!$event->getEntityParam() instanceof \EntityAttachment) {
			return;
		}
		
		$menu = $event->getValue();
		
		/** @var \ElggMenuItem $delete */
		$delete = $menu->get('delete');
		if (empty($delete)) {
			return;
		}
		
		$delete->setSection('_first');
	}
}
