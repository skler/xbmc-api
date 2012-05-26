<?php

namespace NajiDev\XbmcApi\DataType\Application;


class Version
{
	/**
	 * @var int
	 */
	protected $major;

	/**
	 * @var string
	 */
	protected $tag;

	/**
	 * @var int
	 */
	protected $minor;

	/**
	 * @var mixed
	 */
	protected $revision;

	public function __construct($object = null)
	{
		if ($object instanceof \stdClass)
		{
			$this->setMajor($object->major);
			$this->setMinor($object->minor);
			$this->setTag($object->tag);

			if (isset($object->revision) && 'Unknown' !== $object->revision)
				$this->setRevision($object->revision);
		}
	}

	/**
	 * @param int $major
	 */
	public function setMajor($major)
	{
		$this->major = $major;
	}

	/**
	 * @return int
	 */
	public function getMajor()
	{
		return $this->major;
	}

	/**
	 * @param int $minor
	 */
	public function setMinor($minor)
	{
		$this->minor = $minor;
	}

	/**
	 * @return int
	 */
	public function getMinor()
	{
		return $this->minor;
	}

	/**
	 * @param mixed $revision
	 */
	public function setRevision($revision)
	{
		$this->revision = $revision;
	}

	/**
	 * @return mixed
	 */
	public function getRevision()
	{
		return $this->revision;
	}

	/**
	 * @param string $tag
	 */
	public function setTag($tag)
	{
		$this->tag = $tag;
	}

	/**
	 * @return string
	 */
	public function getTag()
	{
		return $this->tag;
	}
}