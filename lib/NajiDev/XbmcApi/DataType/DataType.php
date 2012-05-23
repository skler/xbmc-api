<?php

namespace NajiDev\XbmcApi\DataType;


abstract class DataType
{
	abstract static function createInstance(\stdClass $object);

	abstract static function getFieldNames();

	static function cast($parentInstance, $instance)
	{
		foreach ($parentInstance::getFieldNames() as $field)
			call_user_func(
				array($instance, 'set' . ucfirst($field)),
				call_user_func(array($parentInstance, 'get' . ucfirst($field)))
			);

		return $instance;
	}

}