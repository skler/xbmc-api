<?php

namespace NajiDev\XbmcApi\Model\Video;


class Cast
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

	public function __construct($object = null)
	{
		if ($object instanceof \stdClass)
		{
			if (isset($object->name))
				$this->setName($object->name);

			if (isset($object->role))
				$this->setRole($object->role);

			if (isset($object->thumbnail))
				$this->setThumbnail($object->thumbnail);
		}
	}

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
}