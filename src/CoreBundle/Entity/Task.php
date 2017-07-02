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
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=255)
     */
    private $name;

    /**
     * @var int
     *
     * @ORM\Column(name="project_id", type="integer")
     */
    private $projectId;

    /**
     * @var float
     *
     * @ORM\Column(name="initial_workload", type="float")
     */
    private $initialWorkload;

    /**
     * @var float
     *
     * @ORM\Column(name="consumed_workload", type="float")
     */
    private $consumedWorkload;

    /**
     * @var float
     *
     * @ORM\Column(name="left_to_do", type="float")
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
}

