<?php

namespace NajiDev\XbmcApi\Model\Audio;


abstract class Base extends \NajiDev\XbmcApi\Model\Media\Base
{
	/**
	 * @var string
	 */
	protected $genre;

	/**
	 * @param string $genre
	 */
	public function setGenre($genre)
	{
		$this->genre = $genre;
	}

	/**
	 * @return string
	 */
	public function getGenre()
	{
		return $this->genre;
	}
}