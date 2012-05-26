<?php

namespace NajiDev\XbmcApi\DataType\Video\Details;


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
	 * @param int $id
	 */
	public function setId($id)
	{
		$this->id = $id;
	}

	/**
	 * @return int
	 */
	public function getId()
	{
		return $this->id;
	}

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