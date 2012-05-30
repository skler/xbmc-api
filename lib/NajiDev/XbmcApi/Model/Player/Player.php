<?php

namespace NajiDev\XbmcApi\Model\Player;


class Player
{
	protected $id;

	/**
	 * @var closure
	 */
	protected $currentItem;

	public function __construct($object = null)
	{
		if ($object instanceof \stdClass)
		{
			$this->id = $object->playerid;
		}
	}

	public function getId()
	{
		return $this->id;
	}

	public function getCurrentItem()
	{
		return call_user_func($this->currentItem);
	}

	/**
	 * @param closure $currentItem
	 */
	public function setCurrentItem($currentItem)
	{
		$this->currentItem = $currentItem;
	}
}