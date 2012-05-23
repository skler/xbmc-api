<?php

namespace NajiDev\XbmcApi\DataType\Video\Details;

use \NajiDev\XbmcApi\DataType\Video\Resume,
    \NajiDev\XbmcApi\DataType\Video\Streams;


class File extends Item
{
	/**
	 * @var string
	 */
	protected $director;

	/**
	 * @var \NajiDev\XbmcApi\DataType\Video\Streams
	 */
	protected $streamdetails;

	/**
	 * @var string
	 */
	protected $runtime;

	/**
	 * @var \NajiDev\XbmcApi\DataType\Video\Resume
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
	 * @param \NajiDev\XbmcApi\DataType\Video\Resume $resume
	 */
	public function setResume(Resume $resume)
	{
		$this->resume = $resume;
	}

	/**
	 * @return \NajiDev\XbmcApi\DataType\Video\Resume
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
	 * @param \NajiDev\XbmcApi\DataType\Video\Streams $streamdetails
	 */
	public function setStreamdetails(Streams $streamdetails)
	{
		$this->streamdetails = $streamdetails;
	}

	/**
	 * @return \NajiDev\XbmcApi\DataType\Video\Streams
	 */
	public function getStreamdetails()
	{
		return $this->streamdetails;
	}

	static function createInstance(\stdClass $object)
	{
		$instance = self::cast(parent::createInstance($object), new self);

		$instance->setDirector($object->director);
		$instance->setResume(Resume::createInstance($object->resume));
		$instance->setRuntime($object->runtime);
		$instance->setStreamdetails(Streams::createInstance($object->streamdetails));

		return $instance;
	}

	static function getFieldNames()
	{
		return array_merge(parent::getFieldNames(), array(
			'director', 'streamdetails', 'runtime', 'resume'
		));
	}
}