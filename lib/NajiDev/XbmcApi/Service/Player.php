<?php

namespace NajiDev\XbmcApi\Service;

use \NajiDev\XbmcApi\Model\Player\VideoPlayer,
    \NajiDev\XbmcApi\Model\Video\Episode,
    \NajiDev\XbmcApi\Model\Video\Movie,
    \NajiDev\XbmcApi\Model\Video\MovieSet,
    \NajiDev\XbmcApi\Model\Video\MusicVideo,
    \NajiDev\XbmcApi\Model\Video\Season,
    \NajiDev\XbmcApi\Model\Video\TVShow;

use \NajiDev\XbmcApi\Exception\NotImplementedException;


class Player extends AbstractService
{
	/**
	 * @var VideoLibrary
	 */
	protected $videoLibrary;

	public function __construct(XbmcConnector $xbmcConnector)
	{
		parent::__construct($xbmcConnector);

		$this->videoLibrary = new VideoLibrary($xbmcConnector);
	}

	public function getActivePlayer($index)
	{
		$players = $this->getActivePlayers();

		if (!isset($players[$index]))
			return null;

		return $players[$index];
	}

	/**
	 * Assuming there can only be one active video player per xbmc instance, this method returns the first available
	 * VideoPlayer, if available
	 *
	 * @return \NajiDev\XbmcApi\Model\Player\VideoPlayer|null
	 */
	public function getActiveVideoPlayer()
	{
		$players = $this->getActivePlayers();

		foreach ($players as $player)
			if ($player instanceof VideoPlayer)
				return $player;

		return null;
	}

	/**
	 * Returns all active players
	 * @throws \NajiDev\XbmcApi\Exception\NotImplementedException
	 * @return \NajiDev\XbmcApi\Model\Player\Player[]
	 */
	public function getActivePlayers()
	{
		$service = $this;

		$response = $this->callXbmc('GetActivePlayers');

		$players = array();
		foreach ($response as $player)
		{
			$playerObj = null;
			switch ($player->type)
			{
				case 'video':
					$playerObj = new VideoPlayer($player);
					break;
				default:
					throw new NotImplementedException('Type ' . $player->type . ' unknown');
			}

			$playerObj->setCurrentItem(function() use ($service, $playerObj)
			{
				return $service->getCurrentItem($playerObj->getId());
			});

			$players[] = $playerObj;
		}
		return $players;
	}

    public function getPlayPause($playerId)
    {
        $service = $this;

        $response = $this->callXbmc('PlayPause', ['playerid' => $playerId]);

        return $response;
    }

	/**
	 * @param $playerId
	 * @return \NajiDev\XbmcApi\Model\Video\Episode|null
	 * @throws \NajiDev\XbmcApi\Exception\NotImplementedException
	 */
	public function getCurrentItem($playerId)
	{
		$response = $this->callXbmc('GetItem', array(
			'playerid'   => $playerId
		));

		switch($response->item->type)
		{
			case 'episode':
				return $this->videoLibrary->getEpisode($response->item->id);
			case 'movie':
				return $this->videoLibrary->getMovie($response->item->id);
			default:
				throw new NotImplementedException('Type ' . $response->item->type . ' unknown');
		}
	}

	public function open($id, $type)
    {
        switch ($type) {

            case 'movie':

                $item['movieid'] = $id;
                break;

            case 'episode':

                $item['episodeid'] = $id;
                break;

            default:
                throw new NotImplementedException('Type ' . $type . ' unknown');
        }

        return $this->callXbmc('Open', [
            'item' => $item
        ]);
    }

    public function somethingIsPlaying()
	{
		return 0 !== count($this->getActivePlayers());
	}
}
