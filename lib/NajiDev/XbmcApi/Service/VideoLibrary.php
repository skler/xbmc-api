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
     *
     * @return \NajiDev\XbmcApi\Model\Video\Episode|null
     */
    public function getEpisode($episodeId)
    {
        if (null !== $episode = $this->getByIdentityMap('Video\Episode', $episodeId)) {
            return $episode;
        }

        try {
            $response = $this->callXbmc('GetEpisodeDetails', [
                'episodeid'  => $episodeId,
                'properties' => Episode::getFields(),
            ]);

            return $this->buildEpisode($response->episodedetails);
        } catch (\InvalidArgumentException $e) {
            return null;
        }
    }

    /**
     * @param \stdClass $episode
     *
     * @return \NajiDev\XbmcApi\Model\Video\Episode
     */
    protected function buildEpisode(\stdClass $episode)
    {
        $service = $this;

        $episodeObj = new Episode($episode);
        $episodeObj->setTvshow(function () use ($service, $episodeObj) {
            return $service->getTVShow($episodeObj->getTvshowid());
        });

        $episodeObj->setSeason(function () use ($service, $episodeObj) {
            $seasons = $service->getSeasons($episodeObj->getTvshowid());

            foreach ($seasons as $season) {
                if ($season->getSeasonNumber() == $episodeObj->getSeasonNumber()) {
                    return $season;
                }
            }

            return null;
        });

        $this->addToIdentityMap($episodeObj);

        return $episodeObj;
    }

    /**
     * Retrieve details about a specific tv show
     *
     * @param $tvshowId
     *
     * @throws \InvalidArgumentException
     * @return TVShow|null
     */
    public function getTVShow($tvshowId)
    {
        if (!is_int($tvshowId)) {
            throw new \InvalidArgumentException('The $tvshowid has to be an integer');
        }

        if (null !== $show = $this->getByIdentityMap('Video\TVShow', $tvshowId)) {
            return $show;
        }

        try {
            $response = $this->callXbmc('GetTVShowDetails', [
                'tvshowid'   => $tvshowId,
                'properties' => TVShow::getFields(),
            ]);

            return $this->buildTvShow($response->tvshowdetails);
        } catch (\InvalidArgumentException $e) {
            return null;
        }
    }

    protected function buildTvShow(\stdClass $show)
    {
        $service = $this;

        $showObj = new TVShow($show);
        $id      = $showObj->getId();
        $showObj->setEpisodes(function () use ($service, $id) {
            return $service->getEpisodes($id);
        });
        $showObj->setSeasons(function () use ($service, $id) {
            return $service->getSeasons($id);
        });

        $this->addToIdentityMap($showObj);

        return $showObj;
    }

    /**
     * Retrieve all tv show episodes
     *
     * @param null|int   $showId
     * @param null|int   $season
     * @param int        $offset
     * @param null|int   $limit
     * @param string     $sort
     * @param string     $order
     * @param null|array $properties
     * @param array      $filters
     *
     * @return Episode[]
     */
    public function getEpisodes(
        $showId = null,
        $season = null,
        $offset = 0,
        $limit = null,
        $sort = "none",
        $order = "ascending",
        $properties = null,
        $filters = []
    ) {
        $params = [
            'tvshowid'   => $showId ?? null,
            'season'     => $season ?? null,
            'properties' => $properties ? $properties : Movie::getFields(),
            'sort'       => [
                'order'  => $order,
                'method' => $sort,
            ],
            'limits'     => [
                'start' => $offset,
                'end'   => $offset + $limit,
            ],
        ];

        if (count($filters)) {
            foreach ($filters as $filterType => $values) {

                if (!is_array($values)) {
                    $values = [$values];
                }

                foreach ($values as $value) {
                    $params['filter']['and'][] = [
                        'operator' => 'contains',
                        'field'    => $filterType,
                        'value'    => $value,
                    ];
                }
            }
        }

        $response = $this->callXbmc('GetEpisodes', $params);

        $episodes = [];
        foreach ($response->episodes as $episode) {
            $episodes[] = $this->buildEpisode($episode);
        }

        return $episodes;
    }

    /**
     * Retrieve all tv seasons
     *
     * @param int $tvshowid
     *
     * @return Season[]
     */
    public function getSeasons($tvshowid)
    {
        $response = $this->callXbmc('GetSeasons', [
            'tvshowid'   => $tvshowid,
            'properties' => Season::getFields(),
        ]);

        $service = $this;
        $seasons = [];
        foreach ($response->seasons as $season) {
            $seasonObj = new Season($season);
            $seasonObj->setTvshow(function () use ($service, $seasonObj) {
                return $service->getTVShow($seasonObj->getTvshowid());
            });
            $this->addToIdentityMap($seasonObj);
            $seasons[] = $seasonObj;
        }

        return $seasons;
    }

    /**
     * Retrieve details about a specific movie
     *
     * @param $movieId
     *
     * @return Movie|null A Movie object, if found. Null otherwise.
     */
    public function getMovie($movieId)
    {
        if (null !== $movie = $this->getByIdentityMap('Video\Movie', $movieId)) {
            return $movie;
        }

        try {
            $response = $this->callXbmc('GetMovieDetails', [
                'movieid'    => $movieId,
                'properties' => Movie::getFields(),
            ]);

            return $this->buildMovie($response->moviedetails);
        } catch (\InvalidArgumentException $e) {
            return null;
        }
    }

    /**
     * @param \stdClass $movie
     *
     * @return \NajiDev\XbmcApi\Model\Video\Movie
     */
    protected function buildMovie(\stdClass $movie)
    {
        $service = $this;

        $movieObj = new Movie($movie);

        $movieObj->setMovieSets(function () use ($service, $movieObj) {
            $movieSets = [];
            foreach ($movieObj->getMovieSetIds() as $movieSetId) {
                $movieSets[] = $service->getMovieSet($movieSetId);
            }

            return $movieSets;
        });

        $this->addToIdentityMap($movieObj);

        return $movieObj;
    }

    /**
     * @param int $setid
     *
     * @return MovieSet|null A MovieSet object, if found. Null otherwise
     */
    public function getMovieSet($setid)
    {
        if (null !== $movieSet = $this->getByIdentityMap('Video\MovieSet', $setid)) {
            return $movieSet;
        }

        try {
            $response = $this->callXbmc('GetMovieSetDetails', [
                'setid' => $setid,
            ]);

            return $this->buildMovieSet($response->setdetails);
        } catch (\InvalidArgumentException $e) {
            return null;
        }
    }

    /**
     * @param \stdClass $movieSet
     *
     * @return \NajiDev\XbmcApi\Model\Video\MovieSet
     */
    protected function buildMovieSet(\stdClass $movieSet)
    {
        $service = $this;

        $movieSetObj = new MovieSet($movieSet);
        $movieSetObj->setMovies(function () use ($movieSetObj, $service) {
            $movies = [];
            foreach ($movieSetObj->getMovieIds() as $movieId) {
                $movies[] = $service->getMovie($movieId);
            }

            return $movies;
        });

        $this->addToIdentityMap($movieSetObj);

        return $movieSetObj;
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

        foreach ($ids as $id) {
            $movieSets[] = $this->getMovieSet($id);
        }

        return $movieSets;
    }

    /**
     * @return array build this way: MovieSetId => MovieSetName
     */
    public function getMovieSetsAsArray()
    {
        $response = $this->callXbmc('GetMovieSets');

        $movieSets = [];
        foreach ($response->sets as $movieSet) {
            $movieSets[$movieSet->setid] = $movieSet->label;
        }

        return $movieSets;
    }


    /**
     * @param int    $offset
     * @param null   $limit
     * @param string $sort
     * @param string $order
     * @param null   $properties
     * @param array  $filters
     *
     * @return Movie[]
     */
    public function getMovies(
        $offset = 0,
        $limit = null,
        $sort = "none",
        $order = "ascending",
        $properties = null,
        $filters = []
    ) {
        $params = [
            'properties' => $properties ? $properties : Movie::getFields(),
            'sort'       => [
                'order'  => $order,
                'method' => $sort,
            ],
            'limits'     => [
                'start' => $offset,
                'end'   => $offset + $limit,
            ],
        ];

        if (count($filters)) {
            foreach ($filters as $filterType => $values) {

                if (!is_array($values)) {
                    $values = [$values];
                }

                foreach ($values as $value) {
                    $params['filter']['and'][] = [
                        'operator' => 'contains',
                        'field'    => $filterType,
                        'value'    => $value,
                    ];
                }
            }
        }

        $response = $this->callXbmc('GetMovies', $params);

        if (!$response->movies) {

            return [];
        }

        $movies = [];
        foreach ($response->movies as $movie) {
            $movies[] = $this->buildMovie($movie);
        }

        return $movies;
    }

    /**
     * Retrieve all recently added tv episodes
     *
     * @return Episode[]
     */
    public function getRecentlyAddedEpisodes()
    {
        $response = $this->callXbmc('GetRecentlyAddedEpisodes', [
            'properties' => Episode::getFields(),
        ]);

        $episodes = [];
        foreach ($response->episodes as $episode) {
            $episodes[] = $this->buildEpisode($episode);
        }

        return $episodes;
    }

    /**
     * Retrieve all recently added movies
     *
     * @return Movie[]
     */
    public function getRecentlyAddedMovies($offset = 0, $limit = null, $sort = "none", $order = "ascending")
    {
        $params = [
            'properties' => Movie::getFields(),
            'sort'       => [
                'order'  => $order,
                'method' => $sort,
            ],
            'limits'     => [
                'start' => $offset,
                'end'   => $offset + $limit,
            ],
        ];

        $response = $this->callXbmc('GetRecentlyAddedMovies', $params);

        $movies = [];
        foreach ($response->movies as $movie) {
            $movies[] = $this->buildMovie($movie);
        }

        return $movies;
    }

    /**
     * Retrieve all tv shows
     *
     * @param int    $offset
     * @param null   $limit
     * @param string $sort
     * @param string $order
     * @param null   $properties
     * @param array  $filters
     *
     * @return TVShow[]
     */
    public function getTVShows(
        $offset = 0,
        $limit = null,
        $sort = "none",
        $order = "ascending",
        $properties = null,
        $filters = []
    )
    {
        $params = [
            'properties' => $properties ? $properties : Movie::getFields(),
            'sort'       => [
                'order'  => $order,
                'method' => $sort,
            ],
            'limits'     => [
                'start' => $offset,
                'end'   => $offset + $limit,
            ],
        ];

        if (count($filters)) {
            foreach ($filters as $filterType => $values) {

                if (!is_array($values)) {
                    $values = [$values];
                }

                foreach ($values as $value) {
                    $params['filter']['and'][] = [
                        'operator' => 'contains',
                        'field'    => $filterType,
                        'value'    => $value,
                    ];
                }
            }
        }

        $response = $this->callXbmc('GetTVShows', $params);

        $shows = [];
        foreach ($response->tvshows as $show) {
            $shows[] = $this->buildTvShow($show);
        }

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
}