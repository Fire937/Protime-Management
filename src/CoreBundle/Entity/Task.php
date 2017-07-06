<?php

namespace CoreBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Task
 *
 * @ORM\Table(name="task")
 * @ORM\Entity(repositoryClass="CoreBundle\Repository\TaskRepository")
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
     * @var float
     */
    private $initialWorkload;

    /**
     * @var float
     */
    private $consumedWorkload;

    /**
     * @var float
     */
    private $leftToDo;
  
    /**
     * @var \CoreBundle\Entity\Project
     */
    private $project;

    /**
     * @var \CoreBundle\Entity\Task La tâche parente
     */
    private $task;
    
    /**
     * @var array A list containing \UserBundle\Entity\User objects
     */
    private $resources;

    private $estimatedWorkload;

    private $gain;
    
    private $progress;

    public function __construct() 
    {
        // @todo Will have to put calculations here
        $this->estimatedWorkload = 0;
        $this->gain = 0;
        $this->progress = 0;
    }


    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;

        return $this;
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
     * Set initialWorkload
     *
     * @param float $initialWorkload
     *
     * @return Task
     */
    public function setInitialWorkload($initialWorkload)
    {
        $this->initialWorkload = $initialWorkload;

        return $this;
    }

    /**
     * Get initialWorkload
     *
     * @return float
     */
    public function getInitialWorkload()
    {
        return $this->initialWorkload;
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

    /**
     * Set project
     *
     * @param \CoreBundle\Entity\Project $project
     *
     * @return Task
     */
    public function setProject(\CoreBundle\Entity\Project $project = null)
    {
        $this->project = $project;

        return $this;
    }

    /**
     * Get project
     *
     * @return \CoreBundle\Entity\Project
     */
    public function getProject()
    {
        return $this->project;
    }

    /**
     * Add resource
     *
     * @param \UserBundle\Entity\Resource $resource
     *
     * @return Task
     */
    public function addResource(\UserBundle\Entity\Resource $resource)
    {
        $this->resources[] = $resource;

        return $this;
    }

    /**
     * Remove resource
     *
     * @param \UserBundle\Entity\Resource $resource
     */
    public function removeResource(\UserBundle\Entity\Resource $resource)
    {
        $this->resources->removeElement($resource);
    }

    /**
     * Get resources
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getResources()
    {
        return $this->resources;
    }
}
