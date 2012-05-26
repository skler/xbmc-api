<?php

namespace NajiDev\XbmcApi\Model\Media;


abstract class Base extends \NajiDev\XbmcApi\Model\Item\Base
{
	/**
	 * @var string
	 */
	protected $fanart;

	/**
	 * @var string
	 */
	protected $thumbnail;

	public function __construct($object = null)
	{
		parent::__construct($object);

		if ($object instanceof \stdClass)
		{
			$this->setFanart($this->fanart);
			$this->setThumbnail($this->thumbnail);
		}
	}

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
}