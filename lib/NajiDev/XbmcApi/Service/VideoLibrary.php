<?php

namespace NajiDev\XbmcApi\Service;

use \NajiDev\XbmcApi\DataType\Video\Details\Episode;
use \NajiDev\XbmcApi\DataType\Video\Details\Movie;
use \NajiDev\XbmcApi\DataType\Video\Details\MovieSet;
use \NajiDev\XbmcApi\DataType\Video\Details\MusicVideo;
use \NajiDev\XbmcApi\DataType\Video\Details\Season;
use \NajiDev\XbmcApi\DataType\Video\Details\TVShow;

use \NajiDev\XbmcApi\Exception\NotImplementedException;


class VideoLibrary extends AbstractService
{
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
	public function clean()
	{
		return 'OK' === $this->callXbmc('Clean');
	}

	/**
	 * Exports all items from the video library
	 * @throws NotImplementedException
	 */
	public function export()
	{
		throw new NotImplementedException;
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
		throw new NotImplementedException;
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

	/**
	 * @param $setid
	 * @throws \NajiDev\XbmcApi\Exception\NotImplementedException
	 * @return MovieSet
	 */
	public function getMovieSet($setid)
	{
		throw new NotImplementedException;
	}

	/**
	 * @throws \NajiDev\XbmcApi\Exception\NotImplementedException
	 * @return MovieSet[]
	 */
	public function getMovieSets()
	{
		throw new NotImplementedException;
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
	 * @throws NotImplementedException
	 */
	public function getMusicVideoDetails()
	{
		throw new NotImplementedException;
	}

	/**
	 * Retrieve all music videos
	 *
	 * @throws NotImplementedException
	 */
	public function getMusicVideos()
	{
		throw new NotImplementedException;
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

	/**
	 * Retrieve all recently added movies
	 *
	 * @throws \NajiDev\XbmcApi\Exception\NotImplementedException
	 * @return Movie[]
	 */
	public function getRecentlyAddedMovies()
	{
		throw new NotImplementedException;
	}

	/**
	 * Retrieve all recently added music videos
	 *
	 * @throws \NajiDev\XbmcApi\Exception\NotImplementedException
	 * @return MusicVideo[]
	 */
	public function getRecentlyAddedMusicVideos()
	{
		throw new NotImplementedException;
	}

	/**
	 * Retrieve all tv seasons
	 *
	 * @throws \NajiDev\XbmcApi\Exception\NotImplementedException
	 * @return Season[]
	 */
	public function getSeasons()
	{
		throw new NotImplementedException;
	}

	/**
	 * Retrieve details about a specific tv show
	 *
	 * @throws \NajiDev\XbmcApi\Exception\NotImplementedException
	 * @return TVShow
	 */
	public function getTVShowDetails()
	{
		throw new NotImplementedException;
	}

	/**
	 * Retrieve all tv shows
	 *
	 * @throws \NajiDev\XbmcApi\Exception\NotImplementedException
	 * @return TVShow[]
	 */
	public function getTVShows()
	{
		throw new NotImplementedException;
	}

	/**
	 * Scans the video sources for new library items
	 *
	 * @throws \NajiDev\XbmcApi\Exception\NotImplementedException
	 */
	public function scan()
	{
		throw new NotImplementedException;
	}
}