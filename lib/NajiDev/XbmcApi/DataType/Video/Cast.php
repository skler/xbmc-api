<?php

namespace NajiDev\XbmcApi\DataType\Video;

use \NajiDev\XbmcApi\DataType\DataType;


class Cast extends DataType
{
	/**
	 * @var string
	 */
	protected $name;

	/**
	 * @var string
	 */
	protected $role;

	/**
	 * @var string
	 */
	protected $thumbnail;

	/**
	 * @param string $name
	 */
	public function setName($name)
	{
		$this->name = $name;
	}

	/**
	 * @return string
	 */
	public function getName()
	{
		return $this->name;
	}

	/**
	 * @param string $role
	 */
	public function setRole($role)
	{
		$this->role = $role;
	}

	/**
	 * @return string
	 */
	public function getRole()
	{
		return $this->role;
	}

	/**
	 * @param string $thumbnail
	 */
	public function setThumbnail($thumbnail)
	{
		$this->thumbnail = $thumbnail;
	}

	/**
	 * @return string
	 */
	public function getThumbnail()
	{
		return $this->thumbnail;
	}

	static function createInstance(\stdClass $object)
	{
		$instance = new self();
		if (isset($object->name))
			$instance->setName($object->name);

		if (isset($object->role))
			$instance->setRole($object->role);

		if (isset($object->thumbnail))
			$instance->setThumbnail($object->thumbnail);

		return $instance;
	}

	static function getFieldNames()
	{
		// TODO: Implement getFieldNames() method.
	}
}