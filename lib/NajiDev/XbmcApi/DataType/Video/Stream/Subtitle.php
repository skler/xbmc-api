<?php

namespace NajiDev\XbmcApi\DataType\Video\Stream;

use \NajiDev\XbmcApi\DataType\DataType;


class Subtitle extends DataType
{
	/**
	 * @var string
	 */
	protected $language;

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
		$instance->setLanguage($object->language);

		return $instance;
	}

	static function getFieldNames()
	{
		return array(
			'language'
		);
	}
}