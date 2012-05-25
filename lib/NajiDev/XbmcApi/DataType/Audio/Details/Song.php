<?php

namespace NajiDev\XbmcApi\DataType\Audio\Details;


class Song extends Media
{
	/**
	 * @var string
	 */
	protected $album;

	/**
	 * @var string
	 */
	protected $comment;

	/**
	 * @var int
	 */
	protected $songid;

	/**
	 * @var string
	 */
	protected $musicbrainzartistid;

	/**
	 * @var string
	 */
	protected $lyrics;

	/**
	 * @var int
	 */
	protected $track;

	/**
	 * @var string
	 */
	protected $musicbrainztrackid;

	/**
	 * @var int
	 */
	protected $albumid;

	/**
	 * @var int
	 */
	protected $artistid;

	/**
	 * @var string
	 */
	protected $albumartist;

	/**
	 * @var string
	 */
	protected $file;

	/**
	 * @var int
	 */
	protected $duration;

	/**
	 * @var int
	 */
	protected $playcount;

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
	 * @param string $albumartist
	 */
	public function setAlbumartist($albumartist)
	{
		$this->albumartist = $albumartist;
	}

	/**
	 * @return string
	 */
	public function getAlbumartist()
	{
		return $this->albumartist;
	}

	/**
	 * @param int $albumid
	 */
	public function setAlbumid($albumid)
	{
		$this->albumid = $albumid;
	}

	/**
	 * @return int
	 */
	public function getAlbumid()
	{
		return $this->albumid;
	}

	/**
	 * @param int $artistid
	 */
	public function setArtistid($artistid)
	{
		$this->artistid = $artistid;
	}

	/**
	 * @return int
	 */
	public function getArtistid()
	{
		return $this->artistid;
	}

	/**
	 * @param string $comment
	 */
	public function setComment($comment)
	{
		$this->comment = $comment;
	}

	/**
	 * @return string
	 */
	public function getComment()
	{
		return $this->comment;
	}

	/**
	 * @param int $duration
	 */
	public function setDuration($duration)
	{
		$this->duration = $duration;
	}

	/**
	 * @return int
	 */
	public function getDuration()
	{
		return $this->duration;
	}

	/**
	 * @param string $file
	 */
	public function setFile($file)
	{
		$this->file = $file;
	}

	/**
	 * @return string
	 */
	public function getFile()
	{
		return $this->file;
	}

	/**
	 * @param string $lyrics
	 */
	public function setLyrics($lyrics)
	{
		$this->lyrics = $lyrics;
	}

	/**
	 * @return string
	 */
	public function getLyrics()
	{
		return $this->lyrics;
	}

	/**
	 * @param string $musicbrainzartistid
	 */
	public function setMusicbrainzartistid($musicbrainzartistid)
	{
		$this->musicbrainzartistid = $musicbrainzartistid;
	}

	/**
	 * @return string
	 */
	public function getMusicbrainzartistid()
	{
		return $this->musicbrainzartistid;
	}

	/**
	 * @param string $musicbrainztrackid
	 */
	public function setMusicbrainztrackid($musicbrainztrackid)
	{
		$this->musicbrainztrackid = $musicbrainztrackid;
	}

	/**
	 * @return string
	 */
	public function getMusicbrainztrackid()
	{
		return $this->musicbrainztrackid;
	}

	/**
	 * @param int $playcount
	 */
	public function setPlaycount($playcount)
	{
		$this->playcount = $playcount;
	}

	/**
	 * @return int
	 */
	public function getPlaycount()
	{
		return $this->playcount;
	}

	/**
	 * @param int $songid
	 */
	public function setSongid($songid)
	{
		$this->songid = $songid;
	}

	/**
	 * @return int
	 */
	public function getSongid()
	{
		return $this->songid;
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
}