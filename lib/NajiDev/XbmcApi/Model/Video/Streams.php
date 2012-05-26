<?php

namespace NajiDev\XbmcApi\Model\Video;

use \NajiDev\XbmcApi\Model\Video\Stream\Audio,
    \NajiDev\XbmcApi\Model\Video\Stream\Subtitle,
	\NajiDev\XbmcApi\Model\Video\Stream\Video;


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

	public function __construct($object = null)
	{
		if ($object instanceof \stdClass)
		{
			// audio
			if (isset($object->audio))
			{
				$streams = array();
				foreach ($object->audio as $stream)
					$streams[] = new Audio($stream);
				$this->setAudio($streams);
			}

			// video
			if (isset($object->video))
			{
				$streams = array();
				foreach ($object->video as $stream)
					$streams[] = new Video($stream);
				$this->setVideo($streams);
			}

			// subtitle
			if (isset($object->subtitle))
			{
				$streams = array();
				foreach ($object->subtitle as $stream)
					$streams[] = new Subtitle($stream);
				$this->setSubtitle($streams);
			}
		}
	}

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
}