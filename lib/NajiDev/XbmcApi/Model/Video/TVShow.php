<?php

namespace NajiDev\XbmcApi\Model\Video;

use \NajiDev\XbmcApi\Model\Video\Cast,
    \NajiDev\XbmcApi\Utils\LazyLoader;


class TVShow extends Item
{
	/**
	 * @var string
	 */
	protected $episodeguide;

	/**
	 * @var int
	 */
	protected $episodeCount;

	/**
	 * @var string
	 */
	protected $imdbnumber;

	/**
	 * @var float
	 */
	protected $rating;

	/**
	 * @var string
	 */
	protected $mpaa;

	/**
	 * @var int
	 */
	protected $year;

	/**
	 * @var string
	 */
	protected $votes;

	/**
	 * @var string
	 */
	protected $premiered;

	/**
	 * @var string
	 */
	protected $originaltitle;

	/**
	 * @var Cast[]
	 */
	protected $cast;

	/**
	 * @var string
	 */
	protected $studio;

	/**
	 * @var string
	 */
	protected $sorttitle;

	/**
	 * @var string
	 */
	protected $genre;

	/**
	 * @var closure
	 */
	protected $episodes;

	/**
	 * @var closure
	 */
	protected $seasons;

	public function __construct($object = null)
	{
		parent::__construct($object);

		$this->setEpisodes(function()
		{
			return array();
		});

		$this->setSeasons(function()
		{
			return array();
		});

		if ($object instanceof \stdClass)
		{
			$this->id = $object->tvshowid;

			$this->setEpisodeguide($object->episodeguide);
			$this->setEpisodeCount($object->episode);
			$this->setImdbnumber($object->imdbnumber);
			$this->setRating($object->rating);
			$this->setMpaa($object->mpaa);
			$this->setYear($object->year);
			$this->setVotes($object->votes);
			$this->setPremiered($object->premiered);
			$this->setOriginaltitle($object->originaltitle);

			$casts = array();
			foreach ($object->cast as $cast)
				$casts[] = new Cast($cast);
			$this->setCast($casts);

			$this->setStudio($object->studio);
			$this->setSorttitle($object->sorttitle);
			$this->setGenre($object->genre);
		}
	}

	public function setCast($cast)
	{
		$this->cast = $cast;
	}

	public function getCast()
	{
		return $this->cast;
	}

	/**
	 * @param int $episodeCount
	 */
	public function setEpisodeCount($episodeCount)
	{
		$this->episodeCount = $episodeCount;
	}

	/**
	 * @return int
	 */
	public function getEpisodeCount()
	{
		return $this->episodeCount;
	}

	/**
	 * @param string $episodeguide
	 */
	public function setEpisodeguide($episodeguide)
	{
		$this->episodeguide = $episodeguide;
	}

	/**
	 * @return string
	 */
	public function getEpisodeguide()
	{
		return $this->episodeguide;
	}

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

	/**
	 * @param string $imdbnumber
	 */
	public function setImdbnumber($imdbnumber)
	{
		$this->imdbnumber = $imdbnumber;
	}

	/**
	 * @return string
	 */
	public function getImdbnumber()
	{
		return $this->imdbnumber;
	}

	/**
	 * @param string $mpaa
	 */
	public function setMpaa($mpaa)
	{
		$this->mpaa = $mpaa;
	}

	/**
	 * @return string
	 */
	public function getMpaa()
	{
		return $this->mpaa;
	}

	/**
	 * @param string $originaltitle
	 */
	public function setOriginaltitle($originaltitle)
	{
		$this->originaltitle = $originaltitle;
	}

	/**
	 * @return string
	 */
	public function getOriginaltitle()
	{
		return $this->originaltitle;
	}

	/**
	 * @param string $premiered
	 */
	public function setPremiered($premiered)
	{
		$this->premiered = $premiered;
	}

	/**
	 * @return string
	 */
	public function getPremiered()
	{
		return $this->premiered;
	}

	/**
	 * @param float $rating
	 */
	public function setRating($rating)
	{
		$this->rating = $rating;
	}

	/**
	 * @return float
	 */
	public function getRating()
	{
		return $this->rating;
	}

	/**
	 * @param string $sorttitle
	 */
	public function setSorttitle($sorttitle)
	{
		$this->sorttitle = $sorttitle;
	}

	/**
	 * @return string
	 */
	public function getSorttitle()
	{
		return $this->sorttitle;
	}

	/**
	 * @param string $studio
	 */
	public function setStudio($studio)
	{
		$this->studio = $studio;
	}

	/**
	 * @return string
	 */
	public function getStudio()
	{
		return $this->studio;
	}

	/**
	 * @param string $votes
	 */
	public function setVotes($votes)
	{
		$this->votes = $votes;
	}

	/**
	 * @return string
	 */
	public function getVotes()
	{
		return $this->votes;
	}

	/**
	 * @param int $year
	 */
	public function setYear($year)
	{
		$this->year = $year;
	}

	/**
	 * @return int
	 */
	public function getYear()
	{
		return $this->year;
	}

	/**
	 * @return Episode[]
	 */
	public function getEpisodes()
	{
		return call_user_func($this->episodes);
	}

	/**
	 * @param Episode[]|closure $episodes An array of episodes or closure, which returns an array of Episode objects
	 */
	public function setEpisodes($episodes)
	{
		$this->episodes = new LazyLoader($episodes);
	}

	/**
	 * @return Season|null
	 */
	public function getSeasons()
	{
		return call_user_func($this->seasons);
	}

	/**
	 * @param Season|closure $seasons a Season object or a closure, which returns one
	 */
	public function setSeasons($seasons)
	{
		$this->seasons = new LazyLoader($seasons);
	}

	public static function getFields()
	{
		return array_merge(parent::getFields(), array(
			'episodeguide', 'episode', 'imdbnumber', 'rating', 'mpaa', 'year', 'votes', 'premiered', 'originaltitle',
			'cast', 'studio', 'sorttitle', 'genre'
		));
	}
}