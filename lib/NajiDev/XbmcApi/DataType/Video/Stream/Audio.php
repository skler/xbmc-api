<?php

namespace NajiDev\XbmcApi\DataType\Video\Stream;

use NajiDev\XbmcApi\DataType\DataType;


class Audio extends DataType
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

	static function createInstance(\stdClass $object)
	{
		$instance = new self();

		$instance->setChannels($object->channels);
		$instance->setCodec($object->codec);
		$instance->setLanguage($object->language);

		return $instance;
	}

	static function getFieldNames()
	{
		return array(
			'channels', 'codec', 'language'
		);
	}
}