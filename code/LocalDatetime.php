<?php

/**
 * Localized date names, extension of {@link SS_Datetime}
 */
class LocalDatetime extends SS_Datetime {

	public function Month() {
		if ($this->value) {
			require_once 'Zend/Date.php';

			$zendDate = new Zend_Date($this->getValue(), 'y-MM-dd HH:mm:ss');
			$zendDate->setLocale(i18n::get_locale());
			return $zendDate->toString(_t('LocalDatetime.MONTH_NAME', Zend_Date::MONTH_NAME));
		}
	}

}
