<?php

namespace NajiDev\XbmcApi\DataType\Video\Details;


class Base extends \NajiDev\XbmcApi\DataType\Media\Details\Base
{
	/**
	 * @var int
	 */
	protected $playcount;

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

	public static function getFieldNames()
	{
		return array_merge(parent::getFieldNames(), array(
			'playcount'
		));
	}

	static function createInstance(\stdClass $object)
	{
		$instance = self::cast(parent::createInstance($object), new self);
		$instance->setPlaycount($object->playcount);

		return $instance;
	}
}