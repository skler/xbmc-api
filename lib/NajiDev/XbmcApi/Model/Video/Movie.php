<?php

namespace NajiDev\XbmcApi\Model\Video\Details;

use \NajiDev\XbmcApi\Model\Video\Cast,
    \NajiDev\XbmcApi\Model\Video\Streams;



class Movie extends File
{
	/**
	 * @var float
	 */
	protected $rating;

	/**
	 * @var string[]
	 */
	protected $set = array();

	/**
	 * @var int
	 */
	protected $year;

	/**
	 * @var int[]
	 */
	protected $setid = array();

	/**
	 * @var string
	 */
	protected $votes;

	/**
	 * @var string
	 */
	protected $tagline;

	/**
	 * @var string
	 */
	protected $writer;

	/**
	 * @var string
	 */
	protected $plotoutline;

	/**
	 * @var string
	 */
	protected $sorttitle;

	/**
	 * @var string
	 */
	protected $imdbnummer;

	/**
	 * @var string
	 */
	protected $studio;

	/**
	 * @var string
	 */
	protected $showlink;

	/**
	 * @var string
	 */
	protected $genre;

	/**
	 * @var int
	 */
	protected $movieid;

	/**
	 * @var string
	 */
	protected $productioncode;

	/**
	 * @var string
	 */
	protected $country;

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
	protected $cast = array();

	/**
	 * @var string
	 */
	protected $mpaa;

	/**
	 * @var int
	 */
	protected $top250;

	/**
	 * @var string
	 */
	protected $trailer;

	public function __construct($object = null)
	{
		parent::__construct($object);

		if ($object instanceof \stdClass)
		{
			$this->setRating($object->rating);
			$this->setSet($object->set);
			$this->setYear($object->year);
			$this->setSetid($object->setid);
			$this->setVotes($object->votes);
			$this->setTagline($object->tagline);
			$this->setWriter($object->writer);
			$this->setPlotoutline($object->plotoutline);
			$this->setSorttitle($object->sorttitle);
			$this->setImdbnummer($object->imdbnumber);
			$this->setStudio($object->studio);
			$this->setShowlink($object->showlink);
			$this->setGenre($object->genre);
			$this->setMovieid($object->movieid);
			$this->setProductioncode($object->productioncode);
			$this->setCountry($object->country);
			$this->setPremiered($object->premiered);
			$this->setOriginaltitle($object->originaltitle);
			$this->setCast($object->cast);
			$this->setMpaa($object->mpaa);
			$this->setTop250($object->top250);
			$this->setTrailer($object->trailer);

			$casts = array();
			foreach ($object->cast as $cast)
				$casts[] = new Cast($cast);
			$this->setCast($casts);
		}
	}

	public function setCast($cast)
	{
		$this->cast = $cast;
	}

	/**
	 * @return \NajiDev\XbmcApi\Model\Video\Cast[]
	 */
	public function getCast()
	{
		return $this->cast;
	}

	/**
	 * @param string $country
	 */
	public function setCountry($country)
	{
		$this->country = $country;
	}

	/**
	 * @return string
	 */
	public function getCountry()
	{
		return $this->country;
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
	 * @param string $imdbnummer
	 */
	public function setImdbnummer($imdbnummer)
	{
		$this->imdbnummer = $imdbnummer;
	}

	/**
	 * @return string
	 */
	public function getImdbnummer()
	{
		return $this->imdbnummer;
	}

	/**
	 * @param int $movieid
	 */
	public function setMovieid($movieid)
	{
		$this->movieid = $movieid;
	}

	/**
	 * @return int
	 */
	public function getMovieid()
	{
		return $this->movieid;
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
	 * @param string $plotoutline
	 */
	public function setPlotoutline($plotoutline)
	{
		$this->plotoutline = $plotoutline;
	}

	/**
	 * @return string
	 */
	public function getPlotoutline()
	{
		return $this->plotoutline;
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
	 * @param string $productioncode
	 */
	public function setProductioncode($productioncode)
	{
		$this->productioncode = $productioncode;
	}

	/**
	 * @return string
	 */
	public function getProductioncode()
	{
		return $this->productioncode;
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

	public function setSet($set)
	{
		$this->set = $set;
	}

	public function getSet()
	{
		return $this->set;
	}

	public function setSetid($setid)
	{
		$this->setid = $setid;
	}

	public function getSetid()
	{
		return $this->setid;
	}

	/**
	 * @param string $showlink
	 */
	public function setShowlink($showlink)
	{
		$this->showlink = $showlink;
	}

	/**
	 * @return string
	 */
	public function getShowlink()
	{
		return $this->showlink;
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
	 * @param string $tagline
	 */
	public function setTagline($tagline)
	{
		$this->tagline = $tagline;
	}

	/**
	 * @return string
	 */
	public function getTagline()
	{
		return $this->tagline;
	}

	/**
	 * @param int $top250
	 */
	public function setTop250($top250)
	{
		$this->top250 = $top250;
	}

	/**
	 * @return int
	 */
	public function getTop250()
	{
		return $this->top250;
	}

	/**
	 * @param string $trailer
	 */
	public function setTrailer($trailer)
	{
		$this->trailer = $trailer;
	}

	/**
	 * @return string
	 */
	public function getTrailer()
	{
		return $this->trailer;
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
	 * @param string $writer
	 */
	public function setWriter($writer)
	{
		$this->writer = $writer;
	}

	/**
	 * @return string
	 */
	public function getWriter()
	{
		return $this->writer;
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
}