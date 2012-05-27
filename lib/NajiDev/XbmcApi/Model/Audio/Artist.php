<?php

namespace NajiDev\XbmcApi\Model\Audio;


class Artist extends Base
{
	/**
	 * @var string
	 */
	protected $style;

	/**
	 * @var string
	 */
	protected $description;

	/**
	 * @var string
	 */
	protected $musicbrainzartistid;

	/**
	 * @var string
	 */
	protected $author;

	/**
	 * @var string
	 */
	protected $formed;

	/**
	 * @var string
	 */
	protected $disbanded;

	/**
	 * @var string
	 */
	protected $born;

	/**
	 * @var string
	 */
	protected $yearsactive;

	/**
	 * @var string
	 */
	protected $instrument;

	/**
	 * @var string
	 */
	protected $died;

	/**
	 * @var string
	 */
	protected $mood;

	/**
	 * @param string $author
	 */
	public function setAuthor($author)
	{
		$this->author = $author;
	}

	/**
	 * @return string
	 */
	public function getAuthor()
	{
		return $this->author;
	}

	/**
	 * @param string $born
	 */
	public function setBorn($born)
	{
		$this->born = $born;
	}

	/**
	 * @return string
	 */
	public function getBorn()
	{
		return $this->born;
	}

	/**
	 * @param string $description
	 */
	public function setDescription($description)
	{
		$this->description = $description;
	}

	/**
	 * @return string
	 */
	public function getDescription()
	{
		return $this->description;
	}

	/**
	 * @param string $died
	 */
	public function setDied($died)
	{
		$this->died = $died;
	}

	/**
	 * @return string
	 */
	public function getDied()
	{
		return $this->died;
	}

	/**
	 * @param string $disbanded
	 */
	public function setDisbanded($disbanded)
	{
		$this->disbanded = $disbanded;
	}

	/**
	 * @return string
	 */
	public function getDisbanded()
	{
		return $this->disbanded;
	}

	/**
	 * @param string $formed
	 */
	public function setFormed($formed)
	{
		$this->formed = $formed;
	}

	/**
	 * @return string
	 */
	public function getFormed()
	{
		return $this->formed;
	}

	/**
	 * @param string $instrument
	 */
	public function setInstrument($instrument)
	{
		$this->instrument = $instrument;
	}

	/**
	 * @return string
	 */
	public function getInstrument()
	{
		return $this->instrument;
	}

	/**
	 * @param string $mood
	 */
	public function setMood($mood)
	{
		$this->mood = $mood;
	}

	/**
	 * @return string
	 */
	public function getMood()
	{
		return $this->mood;
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
	 * @param string $style
	 */
	public function setStyle($style)
	{
		$this->style = $style;
	}

	/**
	 * @return string
	 */
	public function getStyle()
	{
		return $this->style;
	}

	/**
	 * @param string $yearsactive
	 */
	public function setYearsactive($yearsactive)
	{
		$this->yearsactive = $yearsactive;
	}

	/**
	 * @return string
	 */
	public function getYearsactive()
	{
		return $this->yearsactive;
	}
}