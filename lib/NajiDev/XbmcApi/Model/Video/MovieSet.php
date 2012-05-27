<?php

namespace NajiDev\XbmcApi\Model\Video;


class MovieSet extends Media
{
	/**
	 * @var int
	 */
	protected $id;

	/**
	 * @var Movie[]
	 */
	protected $movies;

	/**
	 * @param $movies Movie[]
	 */
	public function setMovies($movies)
	{
		$this->movies = $movies;
	}

	/**
	 * @return Movie[]
	 */
	public function getMovies()
	{
		return $this->movies;
	}
}