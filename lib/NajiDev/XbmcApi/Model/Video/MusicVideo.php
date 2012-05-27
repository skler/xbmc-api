<?php

namespace NajiDev\XbmcApi\Model\Video;


class MusicVideo extends File
{
	/**
	 * @var string
	 */
	protected $album;

	/**
	 * @var string
	 */
	protected $artist;

	/**
	 * @var int
	 */
	protected $track;

	/**
	 * @var string
	 */
	protected $studio;

	/**
	 * @var int
	 */
	protected $year;

	/**
	 * @var string
	 */
	protected $genre;

	/**
	 * @param string $album
	 */
	public function setAlbum($album)
	{
		$this->album = $album;
	}

	/**
	 * @return string
	 */
	public function getAlbum()
	{
		return $this->album;
	}

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
	 * @param int $track
	 */
	public function setTrack($track)
	{
		$this->track = $track;
	}

	/**
	 * @return int
	 */
	public function getTrack()
	{
		return $this->track;
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
