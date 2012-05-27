<?php

namespace NajiDev\XbmcApi\Utils;


class IdentityMap
{
	protected $map = array();

	public function add($entity)
	{
		if (null === $id = $entity->getId())
			throw new \InvalidArgumentException('Entity has to have an id');

		$class = get_class($entity);
		if (!array_key_exists($class, $this->map))
			$this->map[$class] = array();

		$this->map[$class][$id] = $entity;
	}

	public function get($class, $id)
	{
		if ($this->_isIn($class, $id))
			return $this->map[$class][$id];

		return null;
	}

	/**
	 * @param $entity
	 * @return boolean
	 */
	public function isIn($entity)
	{
		return $this->_isIn(get_class($entity), $entity->getId());
	}

	/**
	 * @param $class
	 * @param $id
	 * @return boolean
	 */
	protected function _isIn($class, $id)
	{
		$classMapExists = array_key_exists($class, $this->map);

		if (!$classMapExists)
			return false;

		return array_key_exists($id, $this->map[$class]);
	}

	public function remove($entity)
	{
		if ($this->isIn($entity))
			return false;

		$class = get_class($entity);

		unset($this->map[$class][$entity->getId()]);

		if (empty($this->map[$class]));
			unset($this->map[$class]);

		return true;
	}
}