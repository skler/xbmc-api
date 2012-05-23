<?php

namespace NajiDev\XbmcApi\DataType\Video\Details;


class Item extends Media
{
	/**
	 * @var string
	 */
	protected $plot;

	/**
	 * @var string
	 */
	protected $lastplayed;

	/**
	 * @var string
	 */
	protected $file;

	/**
	 * @param string $file
	 */
	public function setFile($file)
	{
		$this->file = $file;
	}

	/**
	 * @return string
	 */
	public function getFile()
	{
		return $this->file;
	}

	/**
	 * @param string $lastplayed
	 */
	public function setLastplayed($lastplayed)
	{
		$this->lastplayed = $lastplayed;
	}

	/**
	 * @return string
	 */
	public function getLastplayed()
	{
		return $this->lastplayed;
	}

	/**
	 * @param string $plot
	 */
	public function setPlot($plot)
	{
		$this->plot = $plot;
	}

	/**
	 * @return string
	 */
	public function getPlot()
	{
		return $this->plot;
	}

	static function createInstance(\stdClass $object)
	{
		$instance = self::cast(parent::createInstance($object), new self);
		$instance->setFile($object->file);
		$instance->setLastplayed($object->lastplayed);
		$instance->setPlot($object->plot);

		return $instance;
	}

	public static function getFieldNames()
	{
		return array_merge(parent::getFieldNames(), array(
			'plot', 'lastplayed', 'file'
		));
	}
}