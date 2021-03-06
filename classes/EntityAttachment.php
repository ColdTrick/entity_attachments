<?php

class EntityAttachment extends ElggObject {

	/**
	 * {@inheritDoc}
	 */
	protected function initializeAttributes() {
		parent::initializeAttributes();

		$this->attributes['subtype'] = 'entity_attachment';
		$this->attributes['access_id'] = ACCESS_PUBLIC;
	}

	/**
	 * {@inheritDoc}
	 */
	public function canComment($user_guid = 0, $default = null) {
		return false;
	}

	/**
	 * {@inheritDoc}
	 */
	public function getURL() {
		return $this->href ?: parent::getURL();
	}
	
	/**
	 * {@inheritDoc}
	 */
	public function canEdit($user_guid = 0) {
		$result = parent::canEdit($user_guid);
		
		if ($result === true) {
			return $result;
		}
		
		$container = elgg_call(ELGG_IGNORE_ACCESS, function() {
			// some containers might be private (and not owned by logged in user)
			return $this->getContainerEntity();
		});
		
		if ($container instanceof \ElggEntity) {
			return $container->canEdit($user_guid);
		}
		
		return false;
	}
}
