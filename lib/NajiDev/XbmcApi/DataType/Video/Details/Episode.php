<?php

namespace NajiDev\XbmcApi\DataType\Video\Details;

use NajiDev\XbmcApi\DataType\Video\Cast;


class Episode extends File
{
	/**
	 * @var float
	 */
	protected $raiting;

	/**
	 * @var int
	 */
	protected $tvshowid;

	/**
	 * @var string
	 */
	protected $votes;

	/**
	 * @var int
	 */
	protected $episode;

	/**
	 * @var string
	 */
	protected $productioncode;

	/**
	 * @var int
	 */
	protected $season;

	/**
	 * @var string
	 */
	protected $writer;

	/**
	 * @var int
	 */
	protected $episodeId;

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
	protected $firstaired;

	/**
	 * @var string
	 */
	protected $showtitle;

	public function setCast($cast)
	{
		$this->cast = $cast;
	}

	/**
	 * @return \NajiDev\XbmcApi\DataType\Video\Cast[]
	 */
	public function getCast()
	{
		return $this->cast;
	}

	/**
	 * @param int $episode
	 */
	public function setEpisode($episode)
	{
		$this->episode = $episode;
	}

	/**
	 * @return int
	 */
	public function getEpisode()
	{
		return $this->episode;
	}

	/**
	 * @param int $episodeId
	 */
	public function setEpisodeId($episodeId)
	{
		$this->episodeId = $episodeId;
	}

	/**
	 * @return int
	 */
	public function getEpisodeId()
	{
		return $this->episodeId;
	}

	/**
	 * @param string $firstaired
	 */
	public function setFirstaired($firstaired)
	{
		$this->firstaired = $firstaired;
	}

	/**
	 * @return string
	 */
	public function getFirstaired()
	{
		return $this->firstaired;
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
	 * @param float $raiting
	 */
	public function setRaiting($raiting)
	{
		$this->raiting = $raiting;
	}

	/**
	 * @return float
	 */
	public function getRaiting()
	{
		return $this->raiting;
	}

	/**
	 * @param int $season
	 */
	public function setSeason($season)
	{
		$this->season = $season;
	}

	/**
	 * @return int
	 */
	public function getSeason()
	{
		return $this->season;
	}

	/**
	 * @param string $showtitle
	 */
	public function setShowtitle($showtitle)
	{
		$this->showtitle = $showtitle;
	}

	/**
	 * @return string
	 */
	public function getShowtitle()
	{
		return $this->showtitle;
	}

	/**
	 * @param int $tvshowid
	 */
	public function setTvshowid($tvshowid)
	{
		$this->tvshowid = $tvshowid;
	}

	/**
	 * @return int
	 */
	public function getTvshowid()
	{
		return $this->tvshowid;
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

	public static function createInstance(\stdClass $object)
	{
		/** @var $instance Episode */
		$instance = self::cast(parent::createInstance($object), new self);

		$instance->setRaiting($object->rating);
		$instance->setTvshowid($object->tvshowid);
		$instance->setVotes($object->votes);
		$instance->setEpisode($object->episode);
		$instance->setProductioncode($object->productioncode);
		$instance->setSeason($object->season);
		$instance->setWriter($object->writer);
		$instance->setEpisodeId($object->episodeid);
		$instance->setOriginaltitle($object->originaltitle);
		$instance->setCast($object->cast);
		$instance->setFirstaired($object->firstaired);
		$instance->setShowtitle($object->showtitle);

		$casts = array();
		foreach ($object->cast as $cast)
			$casts[] = Cast::createInstance($cast);
		$instance->setCast($casts);

		return $instance;
	}

	public static function getFieldNames()
	{
		return array_merge(parent::getFieldNames(), array(
			'rating', 'tvshowid', 'votes', 'episode', 'productioncode', 'season', 'writer', 'episodeid',
			'originaltitle', 'cast', 'firstaired', 'showtitle'
		));
	}
}