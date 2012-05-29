<?php

namespace NajiDev\XbmcApi\Service;

use \NajiDev\XbmcApi\Model\Video\Episode,
    \NajiDev\XbmcApi\Model\Video\Movie,
    \NajiDev\XbmcApi\Model\Video\MovieSet,
    \NajiDev\XbmcApi\Model\Video\MusicVideo,
    \NajiDev\XbmcApi\Model\Video\Season,
    \NajiDev\XbmcApi\Model\Video\TVShow;


class VideoLibrary extends AbstractService
{
	protected static $movieProperties = array(
		'director', 'streamdetails', 'runtime', 'resume', 'rating', 'set', 'year', 'setid', 'votes', 'tagline',
		'writer', 'plotoutline', 'sorttitle', 'imdbnumber', 'studio', 'showlink', 'genre', 'productioncode', 'country',
		'premiered', 'originaltitle', 'cast', 'mpaa', 'top250', 'trailer',

		'plot', 'lastplayed', 'file',

		'title',

		'playcount',

		'fanart', 'thumbnail',
	);

	protected static $episodeProperties = array(
		'director', 'streamdetails', 'runtime', 'resume', 'rating', 'tvshowid', 'votes', 'episode', 'productioncode',
		'season', 'writer', 'originaltitle', 'cast', 'firstaired', 'showtitle',

		'plot', 'lastplayed', 'file',

		'title',

		'playcount',

		'fanart', 'thumbnail',
	);

	protected static $tvshowProperties = array(
		'episodeguide', 'episode', 'imdbnumber', 'rating', 'mpaa', 'year', 'votes', 'premiered', 'originaltitle',
		'cast', 'studio', 'sorttitle', 'genre',

		'plot', 'lastplayed', 'file',

		'title',

		'playcount',

		'fanart', 'thumbnail'
	);

	protected static $seasonProperties = array(
		'season', 'tvshowid', 'episode', 'showtitle',

		'playcount',

		'fanart', 'thumbnail'
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
	 * Retrieve details about a specific tv show episode
	 *
	 * @param $episodeId
	 * @return \NajiDev\XbmcApi\Model\Video\Episode|null
	 */
	public function getEpisode($episodeId)
	{
		if (null !== $episode = $this->getByIdentityMap('Video\Episode', $episodeId))
			return $episode;

		try
		{
			$response = $this->callXbmc('GetEpisodeDetails', array(
					'episodeid'  => $episodeId,
					'properties' => self::$episodeProperties
				));

			return $this->buildEpisode($response->episodedetails);
		}
		catch (\InvalidArgumentException $e)
		{
			return null;
		}
	}

	/**
	 * Retrieve all tv show episodes
	 *
	 * @param int $tvshowid
	 * @param int $season
	 * @return \NajiDev\XbmcApi\Model\Video\Episode[]
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
			$episodes[] = $this->buildEpisode($episode);

		return $episodes;
	}

	/**
	 * Retrieve details about a specific movie
	 *
	 * @param $movieId
	 * @return Movie|null A Movie object, if found. Null otherwise.
	 */
	public function getMovie($movieId)
	{
		if (null !== $movie = $this->getByIdentityMap('Video\Movie', $movieId))
			return $movie;

		try
		{
			$response = $this->callXbmc('GetMovieDetails', array(
				'movieid'    => $movieId,
				'properties' => self::$movieProperties
			));

			return $this->buildMovie($response->moviedetails);
		}
		catch (\InvalidArgumentException $e)
		{
			return null;
		}
	}

	/**
	 * @param int $setid
	 * @return MovieSet|null A MovieSet object, if found. Null otherwise
	 */
	public function getMovieSet($setid)
	{
		if (null !== $movieSet = $this->getByIdentityMap('Video\MovieSet', $setid))
			return $movieSet;

		try
		{
			$response = $this->callXbmc('GetMovieSetDetails', array(
				'setid'	=> $setid
			));

			return $this->buildMovieSet($response->setdetails);
		}
		catch (\InvalidArgumentException $e)
		{
			return null;
		}
	}

	/**
	 * Beware: This costs a bit more then the other ones. We query the xbmc instance for the list of the sets and then
	 * fetch for each the details
	 *
	 * @see VideoLibrary::getMovieSetsAsIds
	 * @throws \NajiDev\XbmcApi\Exception\NotImplementedException
	 * @return MovieSet[]
	 */
	public function getMovieSets()
	{
		$ids = array_keys($this->getMovieSetsAsArray());

		foreach ($ids as $id)
			$movieSets[] = $this->getMovieSet($id);

		return $movieSets;
	}

	/**
	 * @return array build this way: MovieSetId => MovieSetName
	 */
	public function getMovieSetsAsArray()
	{
		$response = $this->callXbmc('GetMovieSets');

		$movieSets = array();
		foreach ($response->sets as $movieSet)
			$movieSets[$movieSet->setid] = $movieSet->label;

		return $movieSets;
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
			$movies[] = $this->buildMovie($movie);

		return $movies;
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
			$episodes[] = $this->buildEpisode($episode);

		return $episodes;
	}

	/**
	 * Retrieve all recently added movies
	 *
	 * @return Movie[]
	 */
	public function getRecentlyAddedMovies()
	{
		$response = $this->callXbmc('GetRecentlyAddedMovies', array(
			'properties' => self::$movieProperties
		));

		$movies = array();
		foreach($response->movies as $movie)
			$movies[] = $this->buildMovie($movie);

		return $movies;
	}

	/**
	 * Retrieve all tv seasons
	 *
	 * @param int $tvshowid
	 * @return Season[]
	 */
	public function getSeasons($tvshowid)
	{
		$response = $this->callXbmc('GetSeasons', array(
			'tvshowid'   => $tvshowid,
			'properties' => self::$seasonProperties
		));

		$service = $this;
		$seasons = array();
		foreach ($response->seasons as $season)
		{
			$seasonObj = new Season($season);
			$seasonObj->setTvshow(function() use ($service, $seasonObj)
			{
				return $service->getTVShow($seasonObj->getTvshowid());
			});
			$this->addToIdentityMap($seasonObj);
			$seasons[] = $seasonObj;
		}

		return $seasons;
	}

	/**
	 * Retrieve details about a specific tv show
	 *
	 * @param $tvshowId
	 * @throws \InvalidArgumentException
	 * @return TVShow|null
	 */
	public function getTVShow($tvshowId)
	{
		if (!is_int($tvshowId))
			throw new \InvalidArgumentException('The $tvshowid has to be an integer');

		if (null !== $show = $this->getByIdentityMap('Video\TVShow', $tvshowId))
			return $show;

		try
		{
			$response = $this->callXbmc('GetTVShowDetails', array(
				'tvshowid'   => $tvshowId,
				'properties' => self::$tvshowProperties
			));

			return $this->buildTvShow($response->tvshowdetails);
		}
		catch (\InvalidArgumentException $e)
		{
			return null;
		}
	}

	/**
	 * Retrieve all tv shows
	 *
	 * @return TVShow[]
	 */
	public function getTVShows()
	{
		$response = $this->callXbmc('GetTVShows', array(
			'properties' => self::$tvshowProperties
		));

		$shows = array();
		foreach ($response->tvshows as $show)
			$shows = $this->buildTvShow($show);

		return $shows;
	}

	/**
	 * Scans the video sources for new library items
	 *
	 * @return bool
	 */
	public function scan()
	{
		return 'OK' === $this->callXbmc('Scan');
	}

	protected function buildTvShow(\stdClass $show)
	{
		$service = $this;

		$showObj = new TVShow($show);
		$id      = $showObj->getId();
		$showObj->setEpisodes(function() use ($service, $id)
		{
			return $service->getEpisodes($id);
		});
		$showObj->setSeasons(function() use ($service, $id)
		{
		 	return $service->getSeasons($id);
		});

		$this->addToIdentityMap($showObj);

		return $showObj;
	}

	/**
	 * @param \stdClass $episode
	 * @return \NajiDev\XbmcApi\Model\Video\Episode
	 */
	protected function buildEpisode(\stdClass $episode)
	{
		$service = $this;

		$episodeObj = new Episode($episode);
		$episodeObj->setTvshow(function() use ($service, $episodeObj)
		{
			return $service->getTVShow($episodeObj->getTvshowid());
		});

		$episodeObj->setSeason(function() use ($service, $episodeObj)
		{
			$seasons = $service->getSeasons($episodeObj->getTvshowid());

			foreach ($seasons as $season)
			{
				if ($season->getSeasonNumber() == $episodeObj->getSeasonNumber())
					return $season;
			}

			return null;
		});

		$this->addToIdentityMap($episodeObj);

		return $episodeObj;
	}

	/**
	 * @param \stdClass $movie
	 * @return \NajiDev\XbmcApi\Model\Video\Movie
	 */
	protected function buildMovie(\stdClass $movie)
	{
		$service = $this;

		$movieObj = new Movie($movie);

		$movieObj->setMovieSets(function() use ($service, $movieObj)
		{
			$movieSets = array();
			foreach ($movieObj->getMovieSetIds() as $movieSetId)
				$movieSets[] = $service->getMovieSet($movieSetId);

			return $movieSets;
		});

		$this->addToIdentityMap($movieObj);

		return $movieObj;
	}

	/**
	 * @param \stdClass $movieSet
	 * @return \NajiDev\XbmcApi\Model\Video\MovieSet
	 */
	protected function buildMovieSet(\stdClass $movieSet)
	{
		$service = $this;

		$movieSetObj = new MovieSet($movieSet);
		$movieSetObj->setMovies(function() use($movieSetObj, $service)
		{
			$movies = array();
			foreach ($movieSetObj->getMovieIds() as $movieId)
				$movies[] = $service->getMovie($movieId);

			return $movies;
		});

		$this->addToIdentityMap($movieSetObj);

		return $movieSetObj;
	}
}