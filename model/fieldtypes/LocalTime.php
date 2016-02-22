<?php

require_once 'Zend/Date.php';

class LocalTime extends Time {

	public function Nice($localized = true) {
		return $this->Format(null, $localized);
	}

	public function Format($format = null, $localized = true) {
		if ($this->value) {


			$zendDate = new Zend_Date($this->getValue(), 'HH:mm:ss');
			if ($localized)
				$zendDate->setLocale(i18n::get_locale());

			return $zendDate->toString($format);
		}
	}

	public function FormatFromSettings($member = null) {
		if (!$member) {
			if (!Member::currentUserID()) {
				return false;
			}
			$member = Member::currentUser();
		}

		$formatT = $member->getTimeFormat();

		$zendDate = new Zend_Date($this->getValue(), 'HH:mm:ss');
		return $zendDate->toString($formatT);
	}

}
