<?php

namespace NajiDev\XbmcApi\Model\Item;


abstract class Base
{
	/**
	 * @var int
	 */
	protected $id;

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
	 * @return int
	 */
	public function getId()
	{
		return $this->id;
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