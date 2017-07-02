<?php

namespace CoreBundle\Entity;

/**
 * Task
 */
class Task
{
    /**
     * @var int
     */
    private $id;

    /**
     * @var string
     */
    private $name;

    /**
     * @var int
     */
    private $projectId;

    /**
     * @var int
     */
    private $advancement;

    /**
     * @var float
     */
    private $initialWokload;

    /**
     * @var float
     */
    private $consumedWorkload;

    /**
     * @var float
     */
    private $leftToDo;


    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set name
     *
     * @param string $name
     *
     * @return Task
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set projectId
     *
     * @param integer $projectId
     *
     * @return Task
     */
    public function setProjectId($projectId)
    {
        $this->projectId = $projectId;

        return $this;
    }

    /**
     * Get projectId
     *
     * @return int
     */
    public function getProjectId()
    {
        return $this->projectId;
    }

    /**
     * Set advancement
     *
     * @param integer $advancement
     *
     * @return Task
     */
    public function setAdvancement($advancement)
    {
        $this->advancement = $advancement;

        return $this;
    }

    /**
     * Get advancement
     *
     * @return int
     */
    public function getAdvancement()
    {
        return $this->advancement;
    }

    /**
     * Set initialWokload
     *
     * @param float $initialWokload
     *
     * @return Task
     */
    public function setInitialWokload($initialWokload)
    {
        $this->initialWokload = $initialWokload;

        return $this;
    }

    /**
     * Get initialWokload
     *
     * @return float
     */
    public function getInitialWokload()
    {
        return $this->initialWokload;
    }

    /**
     * Set consumedWorkload
     *
     * @param float $consumedWorkload
     *
     * @return Task
     */
    public function setConsumedWorkload($consumedWorkload)
    {
        $this->consumedWorkload = $consumedWorkload;

        return $this;
    }

    /**
     * Get consumedWorkload
     *
     * @return float
     */
    public function getConsumedWorkload()
    {
        return $this->consumedWorkload;
    }

    /**
     * Set leftToDo
     *
     * @param float $leftToDo
     *
     * @return Task
     */
    public function setLeftToDo($leftToDo)
    {
        $this->leftToDo = $leftToDo;

        return $this;
    }

    /**
     * Get leftToDo
     *
     * @return float
     */
    public function getLeftToDo()
    {
        return $this->leftToDo;
    }
}

