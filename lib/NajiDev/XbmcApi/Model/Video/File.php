<?php

namespace NajiDev\XbmcApi\Model\Video;

use \NajiDev\XbmcApi\Model\Video\Resume,
    \NajiDev\XbmcApi\Model\Video\Streams;


abstract class File extends Item
{
	/**
	 * @var string
	 */
	protected $director;

	/**
	 * @var \NajiDev\XbmcApi\Model\Video\Streams
	 */
	protected $streamdetails;

	/**
	 * @var string
	 */
	protected $runtime;

	/**
	 * @var \NajiDev\XbmcApi\Model\Video\Resume
	 */
	protected $resume;

	/**
	 * @param string $director
	 */
	public function setDirector($director)
	{
		$this->director = $director;
	}

	/**
	 * @return string
	 */
	public function getDirector()
	{
		return $this->director;
	}

	/**
	 * @param \NajiDev\XbmcApi\Model\Video\Resume $resume
	 */
	public function setResume(Resume $resume)
	{
		$this->resume = $resume;
	}

	/**
	 * @return \NajiDev\XbmcApi\Model\Video\Resume
	 */
	public function getResume()
	{
		return $this->resume;
	}

	/**
	 * @param string $runtime
	 */
	public function setRuntime($runtime)
	{
		$this->runtime = $runtime;
	}

	/**
	 * @return string
	 */
	public function getRuntime()
	{
		return $this->runtime;
	}

	/**
	 * @param \NajiDev\XbmcApi\Model\Video\Streams $streamdetails
	 */
	public function setStreamdetails(Streams $streamdetails)
	{
		$this->streamdetails = $streamdetails;
	}

	/**
	 * @return \NajiDev\XbmcApi\Model\Video\Streams
	 */
	public function getStreamdetails()
	{
		return $this->streamdetails;
	}

	public function __construct($object = null)
	{
		parent::__construct($object);

		if ($object instanceof \stdClass)
		{
			$this->setDirector($object->director);
			$this->setResume(new Resume($object->resume));
			$this->setRuntime($object->runtime);
			$this->setStreamdetails(new Streams($object->streamdetails));
		}
	}
}