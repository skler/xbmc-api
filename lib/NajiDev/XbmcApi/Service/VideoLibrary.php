<?php

namespace NajiDev\XbmcApi\Service;

use \NajiDev\XbmcApi\DataType\Video\Details\Episode;
use \NajiDev\XbmcApi\DataType\Video\Details\Movie;


class VideoLibrary extends AbstractService
{
	const NS = 'VideoLibrary';

	protected static $movieProperties = array(
		'fanart', 'thumbnail', 'playcount', 'title', 'plot', 'lastplayed', 'file', 'director', 'streamdetails',
		'runtime', 'resume',
		'rating', 'set', 'year', 'setid', 'votes', 'tagline', 'writer',
		'plotoutline', 'sorttitle', 'imdbnumber', 'studio', 'showlink',
		'genre', 'productioncode', 'country', 'premiered',
		'originaltitle', 'cast', 'mpaa', 'top250', 'trailer'
	);

	protected static $episodeProperties = array(
		'fanart', 'thumbnail', 'playcount', 'title', 'plot', 'lastplayed', 'file', 'director',
		'streamdetails', 'runtime', 'resume', 'rating', 'tvshowid', 'votes', 'episode', 'productioncode', 'season',
		'writer', 'originaltitle', 'cast', 'firstaired', 'showtitle'
	);

	/**
	 * Cleans the video library from non-existent items
	 *
	 * @return boolean whether scanning was started
	 */
	public function scan()
	{
		return 'OK' === $this->callXbmc('Clean');
	}

	/**
	 * Exports all items from the video library
	 * @throws \Exception
	 */
	public function export()
	{
		throw new \Exception('Not yet implemented');
		//return $this->callXbmc('Export');
	}

	/**
	 * Retrieve details about a specific tv show episode
	 *
	 * @param $episodeId
	 * @return \NajiDev\XbmcApi\DataType\Video\Details\Episode
	 */
	public function getEpisodeDetails($episodeId)
	{
		$response = $this->callXbmc('GetEpisodeDetails', array(
			'episodeid'  => $episodeId,
			'properties' => self::$episodeProperties
		));

		return Episode::createInstance($response->episodedetails);
	}

	/**
	 * Retrieve all tv show episodes
	 *
	 * @param int $tvshowid
	 * @param int $season
	 * @return \NajiDev\XbmcApi\DataType\Video\Details\Episode[]
	 */
	public function getEpisodes($tvshowid = null, $season = null)
	{
		$params = array(
			'properties' => self::$episodeProperties
		);

		if (is_int($tvshowid))
			$params['tvshowid'] = $tvshowid;
		if (is_int($season))
			$params['season'] = $season;

		$response = $this->callXbmc('GetEpisodes', $params);

		$episodes = array();
		foreach ($response->episodes as $episode)
			$episodes[] = Episode::createInstance($episode);

		return $episodes;
	}

	public function getGenres()
	{
		throw new \Exception;
	}

	/**
	 * @param $movieId
	 * @return Movie
	 */
	public function getMovieDetails($movieId)
	{
		$response = $this->callXbmc('GetMovieDetails', array(
			'movieid'    => $movieId,
			'properties' => self::$movieProperties
		));

		return Movie::createInstance($response->moviedetails);
	}

	public function getMovieSetDetails()
	{
		throw new \Exception;
	}

	public function getMovieSets()
	{
		throw new \Exception;
	}


	/**
	 * Retrieve all movies
	 *
	 * @return Movie[]
	 */
	public function getMovies()
	{
		$response = $this->callXbmc('GetMovies', array(
			'properties' => self::$movieProperties
		));

		$movies = array();
		foreach ($response->movies as $movie)
			$movies[] = Movie::createInstance($movie);

		return $movies;
	}

	/**
	 * Retrieve details about a specific music video
	 *
	 * @throws \Exception
	 */
	public function getMusicVideoDetails()
	{
		throw new \Exception;
	}

	/**
	 * Retrieve all music videos
	 *
	 * @throws \Exception
	 */
	public function getMusicVideos()
	{
		throw new \Exception;
	}

	/**
	 * Retrieve all recently added tv episodes
	 *
	 * @return Episode[]
	 */
	public function getRecentlyAddedEpisodes()
	{
		$response = $this->callXbmc('GetRecentlyAddedEpisodes', array(
			'properties' => self::$episodeProperties
		));

		$episodes = array();
		foreach ($response->episodes as $episode)
			$episodes[] = Episode::createInstance($episode);

		return $episodes;
	}

	public function getNamespace()
	{
		return 'VideoLibrary';
	}
}