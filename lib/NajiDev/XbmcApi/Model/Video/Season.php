<?php

namespace NajiDev\XbmcApi\Model\Video;

use NajiDev\XbmcApi\Utils\LazyLoader;


class Season extends Base
{
	/**
	 * @var int
	 */
	protected $seasonNumber;

	/**
	 * @var int
	 */
	protected $tvshowid;

	/**
	 * @var closure
	 */
	protected $tvshow;

	/**
	 * @var int
	 */
	protected $episodeCount;

	/**
	 * @var string
	 */
	protected $showtitle;

	public function __construct($object = null)
	{
		parent::__construct($object);

		$this->setTvshow(function ()
		{
			return null;
		});

		if ($object instanceof \stdClass)
		{
			// xbmc does not provide an id for a season object. Concatinating the tvshowid and the
			// season number should be rather unique
			$this->id = $object->tvshowid . '-' . $object->season;

			$this->setSeasonNumber($object->season);
			$this->setTvshowid($object->tvshowid);
			$this->setEpisodeCount($object->episode);
		}
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
	 * @param int $seasonNumber
	 */
	public function setSeasonNumber($seasonNumber)
	{
		$this->seasonNumber = $seasonNumber;
	}

	/**
	 * @return int
	 */
	public function getSeasonNumber()
	{
		return $this->seasonNumber;
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
	 * @return TVShow|null
	 */
	public function getTvshow()
	{
		return call_user_func($this->tvshow);
	}

	/**
	 * @param TVShow|closure $tvshow a tvshow or a closure, which returns a TVShow object
	 */
	public function setTvshow($tvshow)
	{
		$this->tvshow = new LazyLoader($tvshow);
	}

	public static function getFields()
	{
		return array_merge(parent::getFields(), array(
			'season', 'tvshowid', 'episode', 'showtitle',
		));
	}
}