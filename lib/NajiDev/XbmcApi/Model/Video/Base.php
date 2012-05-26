<?php

namespace NajiDev\XbmcApi\Model\Video;


abstract class Base extends \NajiDev\XbmcApi\Model\Media\Base
{
	/**
	 * @var int
	 */
	protected $playcount;

	public function __construct($object = null)
	{
		parent::__construct($object);

		if ($object instanceof \stdClass)
		{
			$this->setPlaycount($object->playcount);
		}
	}

	/**
	 * @param int $playcount
	 */
	public function setPlaycount($playcount)
	{
		$this->playcount = $playcount;
	}

	/**
	 * @return int
	 */
	public function getPlaycount()
	{
		return $this->playcount;
	}
}