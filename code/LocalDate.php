<?php

require_once 'Zend/Date.php';

/**
 * Localized date names, extension of {@link Date}
 */
class LocalDate extends Date {

	public function Nice($localized = true) {
		return $this->Format(null, $localized);
	}

	public function Year($localized = true) {
		return $this->Format(Zend_Date::YEAR, $localized);
	}

	public function Month($localized = true) {
		return $this->Format(Zend_Date::MONTH_NAME, $localized);
	}

	public function Day($localized = true) {
		return $this->Format(Zend_Date::DAY, $localized);
	}

	public function ShortMonth($localized = true) {
		return $this->Format(Zend_Date::MONTH_SHORT, $localized);
	}

	public function Long($localized = true) {
		return $this->Format(Zend_Date::DATE_LONG, $localized);
	}

	public function Full($localized = true) {
		return $this->Format(Zend_Date::DATE_FULL, $localized);
	}

	public function Format($format = null, $localized = true) {
		if ($this->value) {
			require_once 'Zend/Date.php';


			$zendDate = new Zend_Date($this->getValue(), 'y-MM-dd');
			if ($localized)
				$zendDate->setLocale(i18n::get_locale());

			return $zendDate->toString($format);
		}
	}

}
