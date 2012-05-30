<?php

namespace NajiDev\XbmcApi\Model\Player;


class VideoPlayer extends Player
{
	/**
	 * @return \NajiDev\XbmcApi\Model\Video\Movie|\NajiDev\XbmcApi\Model\Video\Episode
	 */
	public function getCurrentItem()
	{
		return parent::getCurrentItem();
	}
}