silverstripe-localdatetime
=====================

Translatable fieldtypes for:

 - Date
 - Time
 - DateTime


Maintainer Contact
------------------

 - Hernold Koch <hernold.koch@et-innovations.org>

Requirements
------------

 - SilverStripe 3.0


Installation
------------

Install via composer `composer require et-innovations/silverstripe-localdatetime`
or extract the contents of this repository into the root-folder of your project.

Usage Overview
--------------

Simply create the wished field in the array `$db`:

	class MyDataObject extends DataObject {

		public static $db = array(
			'SomeDateField' => "LocalDate",
			'SomeTimeField' => "LocalTime",
			'SomeDateTimeField' => "LocalDatetime",
		);

	}

To get translated value in GridField, you need to declare a function with the same name as the field
and return the value as wished:

	class MyDataObject extends DataObject {
		
		...
		
		public function SomeDateField() {
			if($this->{__FUNCTION__})
				return DBField::create_field('LocalDate', $this->{__FUNCTION__})->Nice();
		}
		
	}
