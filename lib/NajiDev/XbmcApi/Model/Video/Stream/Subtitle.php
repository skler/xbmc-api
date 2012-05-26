<?php

namespace NajiDev\XbmcApi\Model\Video\Stream;


class Subtitle
{
	/**
	 * @var string
	 */
	protected $language;

	public function __construct($object = null)
	{
		if ($object instanceof \stdClass)
		{
			$this->setLanguage($object->language);
		}
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