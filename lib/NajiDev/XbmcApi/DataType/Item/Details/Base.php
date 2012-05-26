<?php

namespace NajiDev\XbmcApi\DataType\Item\Details;


class Base
{
	/**
	 * @var string
	 */
	protected $label;

	public function __construct($object = null)
	{
		if ($object instanceof \stdClass)
		{
			$this->setLabel($object->label);
		}
	}

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
}