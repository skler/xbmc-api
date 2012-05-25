<?php

namespace NajiDev\XbmcApi\Service;

use \NajiDev\XbmcApi\Exception\NotImplementedException;


class AudioLibrary extends AbstractService
{
	/**
	 * Cleans the audio library from non-existent items
	 */
	public function clean()
	{
		$this->callXbmc('Clean');
	}

	public function export()
	{
		throw new NotImplementedException;
	}

	public function getAlbumDetails($albumid)
	{
		throw new NotImplementedException;
	}

	public function getAlbums()
	{
		throw new NotImplementedException;
	}

	public function getArtistDetails()
	{
		throw new NotImplementedException;
	}

	public function getArtists()
	{
		throw new NotImplementedException;
	}

	public function getGenres()
	{
		throw new NotImplementedException;
	}

	public function getRecentlyAddedAlbums()
	{
		throw new NotImplementedException;
	}

	public function getRecentlyAddedSongs()
	{
		throw new NotImplementedException;
	}

	public function getSongDetails()
	{
		throw new NotImplementedException;
	}

	public function getSongs()
	{
		throw new NotImplementedException;
	}

	public function scan()
	{
		throw new NotImplementedException;
	}
}