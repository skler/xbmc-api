<?php

namespace NajiDev\XbmcApi\Model\Audio;


abstract class Media extends Base
{
	/**
	 * @var int
	 */
	protected $rating;

	/**
	 * @var string
	 */
	protected $title;

	/**
	 * @var string
	 */
	protected $artist;

	/**
	 * @var string
	 */
	protected $musicbrainzalbumartistid;

	/**
	 * @var int
	 */
	protected $year;

	/**
	 * @var string
	 */
	protected $musicbrainzalbumid;

	/**
	 * @param string $artist
	 */
	public function setArtist($artist)
	{
		$this->artist = $artist;
	}

	/**
	 * @return string
	 */
	public function getArtist()
	{
		return $this->artist;
	}

	/**
	 * @param string $musicbrainzalbumartistid
	 */
	public function setMusicbrainzalbumartistid($musicbrainzalbumartistid)
	{
		$this->musicbrainzalbumartistid = $musicbrainzalbumartistid;
	}

	/**
	 * @return string
	 */
	public function getMusicbrainzalbumartistid()
	{
		return $this->musicbrainzalbumartistid;
	}

	/**
	 * @param string $musicbrainzalbumid
	 */
	public function setMusicbrainzalbumid($musicbrainzalbumid)
	{
		$this->musicbrainzalbumid = $musicbrainzalbumid;
	}

	/**
	 * @return string
	 */
	public function getMusicbrainzalbumid()
	{
		return $this->musicbrainzalbumid;
	}

	/**
	 * @param int $rating
	 */
	public function setRating($rating)
	{
		$this->rating = $rating;
	}

	/**
	 * @return int
	 */
	public function getRating()
	{
		return $this->rating;
	}

	/**
	 * @param string $title
	 */
	public function setTitle($title)
	{
		$this->title = $title;
	}

	/**
	 * @return string
	 */
	public function getTitle()
	{
		return $this->title;
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