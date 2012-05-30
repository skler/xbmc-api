<?php

namespace NajiDev\XbmcApi\Model\Video;


abstract class Media extends Base
{
	/**
	 * @var string
	 */
	protected $title;

	public function __construct($object = null)
	{
		parent::__construct($object);

		if ($object instanceof \stdClass)
		{
			$this->setTitle($object->title);
		}
	}

	/**
	 * @param string $title
	 */
	public function setTitle($title)
	{
		$this->title = $title;
	}

	/**
	 * @return string
	 */
	public function getTitle()
	{
		return $this->title;
	}

	public static function getFields()
	{
		return array_merge(parent::getFields(), array(
			'title'
		));
	}
}