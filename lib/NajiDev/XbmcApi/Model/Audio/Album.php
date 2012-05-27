<?php

namespace NajiDev\XbmcApi\Model\Audio;


class Album extends Media
{
	/**
	 * @var string
	 */
	protected $style;

	/**
	 * @var string
	 */
	protected $mood;

	/**
	 * @var string
	 */
	protected $albumlabel;

	/**
	 * @var string
	 */
	protected $theme;

	/**
	 * @var int
	 */
	protected $artistid;

	/**
	 * @var string
	 */
	protected $type;

	/**
	 * @var string
	 */
	protected $description;

	/**
	 * @param string $albumlabel
	 */
	public function setAlbumlabel($albumlabel)
	{
		$this->albumlabel = $albumlabel;
	}

	/**
	 * @return string
	 */
	public function getAlbumlabel()
	{
		return $this->albumlabel;
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
	 * @param string $theme
	 */
	public function setTheme($theme)
	{
		$this->theme = $theme;
	}

	/**
	 * @return string
	 */
	public function getTheme()
	{
		return $this->theme;
	}

	/**
	 * @param string $type
	 */
	public function setType($type)
	{
		$this->type = $type;
	}

	/**
	 * @return string
	 */
	public function getType()
	{
		return $this->type;
	}
}