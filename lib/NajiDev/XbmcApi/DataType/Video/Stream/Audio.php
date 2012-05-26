<?php

namespace NajiDev\XbmcApi\DataType\Video\Stream;


class Audio
{
	/**
	 * @var int
	 */
	protected $channels;

	/**
	 * @var string
	 */
	protected $codec;

	/**
	 * @var string
	 */
	protected $language;

	public function __construct($object = null)
	{
		if ($object instanceof \stdClass)
		{
			$this->setChannels($object->channels);
			$this->setCodec($object->codec);
			$this->setLanguage($object->language);
		}
	}

	/**
	 * @param int $channels
	 */
	public function setChannels($channels)
	{
		$this->channels = $channels;
	}

	/**
	 * @return int
	 */
	public function getChannels()
	{
		return $this->channels;
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
	 * @param string $language
	 */
	public function setLanguage($language)
	{
		$this->language = $language;
	}

	/**
	 * @return string
	 */
	public function getLanguage()
	{
		return $this->language;
	}
}