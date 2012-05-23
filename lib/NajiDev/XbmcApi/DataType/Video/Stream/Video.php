<?php

namespace NajiDev\XbmcApi\DataType\Video\Stream;

use NajiDev\XbmcApi\DataType\DataType;


class Video extends DataType
{
	/**
	 * @var float
	 */
	protected $aspect;

	/**
	 * @var string
	 */
	protected $codec;

	/**
	 * @var int
	 */
	protected $duration;

	/**
	 * @var int
	 */
	protected $height;

	/**
	 * @var int
	 */
	protected $width;

	/**
	 * @param float $aspect
	 */
	public function setAspect($aspect)
	{
		$this->aspect = $aspect;
	}

	/**
	 * @return float
	 */
	public function getAspect()
	{
		return $this->aspect;
	}

	/**
	 * @param string $codec
	 */
	public function setCodec($codec)
	{
		$this->codec = $codec;
	}

	/**
	 * @return string
	 */
	public function getCodec()
	{
		return $this->codec;
	}

	/**
	 * @param int $duration
	 */
	public function setDuration($duration)
	{
		$this->duration = $duration;
	}

	/**
	 * @return int
	 */
	public function getDuration()
	{
		return $this->duration;
	}

	/**
	 * @param int $height
	 */
	public function setHeight($height)
	{
		$this->height = $height;
	}

	/**
	 * @return int
	 */
	public function getHeight()
	{
		return $this->height;
	}

	/**
	 * @param int $width
	 */
	public function setWidth($width)
	{
		$this->width = $width;
	}

	/**
	 * @return int
	 */
	public function getWidth()
	{
		return $this->width;
	}

	static function createInstance(\stdClass $object)
	{
		$instance = new self();
		$instance->setAspect($object->aspect);
		$instance->setCodec($object->codec);
		$instance->setDuration($object->duration);
		$instance->setHeight($object->height);
		$instance->setWidth($object->width);

		return $instance;
	}

	static function getFieldNames()
	{
		return array(
			'aspect', 'codec', 'duration', 'height', 'width'
		);
	}
}