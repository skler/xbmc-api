<?php

namespace NajiDev\XbmcApi\Model\Video;


abstract class Item extends Media
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

	public function __construct($object = null)
	{
		parent::__construct($object);

		if ($object instanceof \stdClass)
		{
			$this->setFile($object->file);
			$this->setLastplayed($object->lastplayed);
			$this->setPlot($object->plot);
		}
	}

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
}