<?php

namespace NajiDev\XbmcApi\DataType\Application;

use \NajiDev\XbmcApi\DataType\DataType;


class Version extends DataType
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

	static function createInstance(\stdClass $object)
	{
		$instance = new self();
		$instance->setMajor($object->major);
		$instance->setMinor($object->minor);
		$instance->setTag($object->tag);

		if (isset($object->revision) && 'Unknown' !== $object->revision)
			$instance->setRevision($object->revision);

		return $instance;
	}

	static function getFieldNames()
	{
		return array(
			'major', 'tag', 'minor', 'revision'
		);
	}
}