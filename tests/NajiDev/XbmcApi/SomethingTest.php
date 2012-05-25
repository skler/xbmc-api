<?php

namespace NajiDev\XbmcApi;

use \NajiDev\XbmcApi\Service\Application,
    \NajiDev\XbmcApi\Service\System,
    \NajiDev\XbmcApi\Service\VideoLibrary,
    \NajiDev\XbmcApi\Service\XbmcConnector;


class SomethingTest extends \PHPUnit_Framework_TestCase
{
	/**
	 * @var XbmcConnector
	 */
	protected $xbmcConnector;

	public function setUp()
	{
		$this->xbmcConnector = new XbmcConnector(
			$_SERVER['host'], $_SERVER['port'], $_SERVER['user'], $_SERVER['password']
		);
	}

	public function testSomething()
	{
		$videoLibrary = new VideoLibrary($this->xbmcConnector);

		// $videoLibrary->getMovies();
		//var_dump($videoLibrary->getRecentlyAddedEpisodes());
		//var_dump($videoLibrary->scan());
		//var_dump($videoLibrary->export());
		//var_dump($videoLibrary->getEpisodeDetails(1023));
		//var_dump($videoLibrary->getEpisodes(56, 1));
		$this->assertTrue(true);
	}

	public function testSystem()
	{
		$system = new System($this->xbmcConnector);
		// $system->suspend();
		/*
		var_dump(
			$system->isHibernateable(),
			$system->isRebootable(),
			$system->isShutdownable(),
			$system->isSuspendable()
		);
		*/
	}

	public function testApplication()
	{
		$application = new Application($this->xbmcConnector);

		/*
		$application->unmute();
		var_dump($application->isMuted());
		$application->setVolume(100);
		var_dump($application->isMuted());
		$application->unmute();

		var_dump($application->getName());
		*/

	}
}