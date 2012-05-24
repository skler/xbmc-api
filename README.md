# Interface for the XBMC RPC v4 (Eden)

This is a library, which handles the connection to the json-rpc interface of xbmc. Therefore nearly all datatypes of the interface are mapped to php classes. That way, you have a consistent way of interacting with xbmc.

The interface allows to fetch only certain attributes, when - for example - a movie should be fetched. However, this library will always provide you with the full data set.

## Installation

Installation is prefered by composer. This is what you need in your composer.json:

    "require" : {
        "najidev/xbmc-rpc" : "*"
    }

## Basic Usage

First, the XbmcConnector will be initialized. All other Services depend only on the connector:

    // initialize connector and two services
    $connector    = new XbmcConnector($host, $port, $username, $password);
    $videoLibrary = new VideoLibrary($connector)
    $system       = new System($connector);

    // print name of all movies
    $movies = $videoLibrary->getMovies();
    foreach ($movies as $movie)
        echo $movie->getTitle() . "\n";

    // suspend xbmc host
    $system->suspend();
