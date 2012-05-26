<?php

namespace NajiDev\XbmcApi\Model\Video;


class Season extends Base
{
	/**
	 * @var int
	 */
	protected $season;

	/**
	 * @var int
	 */
	protected $tvshowid;

	/**
	 * @var int
	 */
	protected $episode;

	/**
	 * @var string
	 */
	protected $showtitle;

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
}