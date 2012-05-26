<?php

namespace NajiDev\XbmcApi\DataType\Video;

use \NajiDev\XbmcApi\DataType\DataType;


class Resume extends DataType
{
	/**
	 * @var int
	 */
	protected $position;

	/**
	 * @var int
	 */
	protected $total;

	public function __construct($object = null)
	{
		if ($object instanceof \stdClass)
		{
			$this->setPosition($object->position);
			$this->setTotal($object->total);
		}
	}

	/**
	 * @param int $position
	 */
	public function setPosition($position)
	{
		$this->position = $position;
	}

	/**
	 * @return int
	 */
	public function getPosition()
	{
		return $this->position;
	}

	/**
	 * @param int $total
	 */
	public function setTotal($total)
	{
		$this->total = $total;
	}

	/**
	 * @return int
	 */
	public function getTotal()
	{
		return $this->total;
	}
}