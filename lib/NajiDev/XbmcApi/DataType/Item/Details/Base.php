<?php

namespace NajiDev\XbmcApi\DataType\Item\Details;

use NajiDev\XbmcApi\DataType\DataType;


class Base extends DataType
{
	/**
	 * @var string
	 */
	protected $label;

	/**
	 * @param string $label
	 */
	public function setLabel($label)
	{
		$this->label = $label;
	}

	/**
	 * @return string
	 */
	public function getLabel()
	{
		return $this->label;
	}

	public static function getFieldNames()
	{
		return array(
			'label'
		);
	}

	static function createInstance(\stdClass $object)
	{
		$instance = new self;

		$instance->setLabel($object->label);

		return $instance;
	}
}