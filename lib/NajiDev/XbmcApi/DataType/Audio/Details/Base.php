<?php

namespace NajiDev\XbmcApi\DataType\Audio\Details;


class Base extends \NajiDev\XbmcApi\DataType\Media\Details\Base
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