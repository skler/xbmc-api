<?php

namespace NajiDev\XbmcApi\DataType\Media\Details;


class Base extends \NajiDev\XbmcApi\DataType\Item\Details\Base
{
	/**
	 * @var string
	 */
	protected $fanart;

	/**
	 * @var string
	 */
	protected $thumbnail;


	/**
	 * @param string $fanart
	 */
	public function setFanart($fanart)
	{
		$this->fanart = $fanart;
	}

	/**
	 * @return string
	 */
	public function getFanart()
	{
		return $this->fanart;
	}

	/**
	 * @param string $thumbnail
	 */
	public function setThumbnail($thumbnail)
	{
		$this->thumbnail = $thumbnail;
	}

	/**
	 * @return string
	 */
	public function getThumbnail()
	{
		return $this->thumbnail;
	}

	public static function getFieldNames()
	{
		return array_merge(parent::getFieldNames(), array(
			'fanart', 'thumbnail'
		));
	}

	static function createInstance(\stdClass $object)
	{
		$instance = self::cast(parent::createInstance($object), new self);

		$instance->setFanart($object->fanart);
		$instance->setThumbnail($object->thumbnail);

		return $instance;
	}
}