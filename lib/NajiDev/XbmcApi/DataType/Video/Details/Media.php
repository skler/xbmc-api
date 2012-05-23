<?php

namespace NajiDev\XbmcApi\DataType\Video\Details;


class Media extends Base
{
	/**
	 * @var string
	 */
	protected $title;

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

	public static function getFieldNames()
	{
		return array_merge(parent::getFieldNames(), array(
			'title'
		));
	}

	static function createInstance(\stdClass $object)
	{
		$instance = self::cast(parent::createInstance($object), new self);
		$instance->setTitle($object->title);

		return $instance;
	}
}