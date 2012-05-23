<?php

namespace NajiDev\XbmcApi\DataType\Video;

use \NajiDev\XbmcApi\DataType\Video\Stream\Audio;
use \NajiDev\XbmcApi\DataType\Video\Stream\Video;
use \NajiDev\XbmcApi\DataType\Video\Stream\Subtitle;


class Streams
{
	/**
	 * @var Video[]
	 */
	protected $video = array();

	/**
	 * @var Audio[]
	 */
	protected $audio = array();

	/**
	 * @var Subtitle[]
	 */
	protected $subtitle = array();

	public function setAudio($audio)
	{
		$this->audio = $audio;
	}

	public function getAudio()
	{
		return $this->audio;
	}

	public function setSubtitle($subtitle)
	{
		$this->subtitle = $subtitle;
	}

	public function getSubtitle()
	{
		return $this->subtitle;
	}

	public function setVideo($video)
	{
		$this->video = $video;
	}

	public function getVideo()
	{
		return $this->video;
	}

	public static function createInstance($object)
	{
		$instance = new self();

		// audio
		if (isset($object->audio))
		{
			$streams = array();
			foreach($object->audio as $audio)
				$streams[] = Audio::createInstance($audio);
			$instance->setAudio($streams);
		}

		// video
		if (isset($object->video))
		{
			$streams = array();
			foreach($object->video as $video)
				$streams[] = Video::createInstance($video);
			$instance->setVideo($streams);
		}

		if (isset($object->subtitle))
		{
			// subtitle
			$streams = array();
			foreach($object->subtitle as $subtitle)
				$streams[] = Subtitle::createInstance($subtitle);
			$instance->setSubtitle($streams);
		}

		return $instance;
	}
}