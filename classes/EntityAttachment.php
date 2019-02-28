<?php

class EntityAttachment extends ElggObject {

	/**
	 * {@inheritDoc}
	 */
	protected function initializeAttributes() {
		parent::initializeAttributes();

		$this->attributes['subtype'] = 'entity_attachment';
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
}
