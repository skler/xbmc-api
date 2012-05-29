<?php

namespace NajiDev\XbmcApi\Model\Video;

use \NajiDev\XbmcApi\Model\Item\Base,
    \NajiDev\XbmcApi\Utils\LazyLoader;


class MovieSet extends Base
{
	/**
	 * @var int[]
	 */
	protected $movieIds = array();

	/**
	 * @var string[]
	 */
	protected $movieNames = array();

	/**
	 * @var closure
	 */
	protected $movies;

	public function __construct($object = null)
	{
		parent::__construct($object);

		$this->setMovies(array());

		if ($object instanceof \stdClass)
		{
			$this->id = $object->setid;
			foreach ($object->items->movies as $movie)
			{
				$this->movieIds[]   = $movie->movieid;
				$this->movieNames[] = $movie->label;
			}
		}
	}

	/**
	 * @param Movie[]|closure $movies array of Movie objects or a closure, which provides such an array
	 */
	public function setMovies($movies)
	{
		$this->movies = new LazyLoader($movies);
	}

	/**
	 * @return Movie[]
	 */
	public function getMovies()
	{
		return call_user_func($this->movies);
	}

	public function setMovieIds($movieIds)
	{
		$this->movieIds = $movieIds;
	}

	public function getMovieIds()
	{
		return $this->movieIds;
	}

	public function setMovieNames($movieNames)
	{
		$this->movieNames = $movieNames;
	}

	public function getMovieNames()
	{
		return $this->movieNames;
	}
}