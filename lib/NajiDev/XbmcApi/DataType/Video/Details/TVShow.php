<?php

namespace NajiDev\XbmcApi\DataType\Video\Details;

use \NajiDev\XbmcApi\DataType\Video\Cast;


class TVShow extends Item
{
	/**
	 * @var string
	 */
	protected $episodeguide;

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
}