<?php

namespace CoreBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Project
 *
 * @ORM\Table(name="project")
 * @ORM\Entity(repositoryClass="CoreBundle\Repository\ProjectRepository")
 */
class Project
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
     * @ORM\ManyToOne(targetEntity="UserBundle\Entity\Resource", inversedBy="referent_projects")
     * @ORM\JoinColumn(name="referent_id", referencedColumnName="id")
     */
    private $referent;
  
    /**
     * @ORM\ManyToOne(targetEntity="UserBundle\Entity\Resource", inversedBy="responsible_projects")
     * @ORM\JoinColumn(name="responsible_id", referencedColumnName="id")
     */
    private $responsible;

    /**
     * @var float
     *
     * @ORM\Column(name="cost_to_deliver", type="float")
     */
    private $costToDeliver;

    /**
     * @var float
     *
     * @ORM\Column(name="sell_cost", type="float")
     */
    private $sellCost;

    /**
     * @var int
     *
     * @ORM\Column(name="gain", type="float", nullable=true)
     */
    private $gain;

    /**
     * @var int
     *
     * @ORM\Column(name="progress", type="integer")
     */
    private $progress;

    /**
     * @var int
     *
     * @ORM\Column(name="resource_average_number", type="integer")
     */
    private $resourceAverageNumber;
  
    /**
     * @ORM\OneToMany(targetEntity="Task", mappedBy="project")
     */
    private $tasks;

    public function __construct()
    {
        $this->tasks = new ArrayCollection();

        $progress = 0;
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

    /**
     * Set name
     *
     * @param string $name
     *
     * @return Project
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
     * Set referentId
     *
     * @param integer $referentId
     *
     * @return Project
     */
    public function setReferentId($referentId)
    {
        $this->referentId = $referentId;

        return $this;
    }

    /**
     * Get referentId
     *
     * @return int
     */
    public function getReferentId()
    {
        return $this->referentId;
    }

    /**
     * Set responsibleId
     *
     * @param integer $responsibleId
     *
     * @return Project
     */
    public function setResponsibleId($responsibleId)
    {
        $this->responsibleId = $responsibleId;

        return $this;
    }

    /**
     * Get responsibleId
     *
     * @return int
     */
    public function getResponsibleId()
    {
        return $this->responsibleId;
    }

    /**
     * Set costToDeliver
     *
     * @param float $costToDeliver
     *
     * @return Project
     */
    public function setCostToDeliver($costToDeliver)
    {
        $this->costToDeliver = $costToDeliver;

        return $this;
    }

    /**
     * Get costToDeliver
     *
     * @return float
     */
    public function getCostToDeliver()
    {
        return $this->costToDeliver;
    }

    /**
     * Set sellCost
     *
     * @param float $sellCost
     *
     * @return Project
     */
    public function setSellCost($sellCost)
    {
        $this->sellCost = $sellCost;

        return $this;
    }

    /**
     * Get sellCost
     *
     * @return float
     */
    public function getSellCost()
    {
        return $this->sellCost;
    }

    /**
     * Set gain
     *
     * @param integer $gain
     *
     * @return Project
     */
    public function setGain($gain)
    {
        $this->gain = $gain;

        return $this;
    }

    /**
     * Get gain
     *
     * @return int
     */
    public function getGain()
    {
        return $this->gain;
    }

    /**
     * Set progress
     *
     * @param integer $progress
     *
     * @return Project
     */
    public function setProgress($progress)
    {
        $this->progress = $progress;

        return $this;
    }

    /**
     * Get progress
     *
     * @return int
     */
    public function getProgress()
    {
        return $this->progress;
    }

    /**
     * Set resourceAverageNumber
     *
     * @param integer $resourceAverageNumber
     *
     * @return Project
     */
    public function setResourceAverageNumber($resourceAverageNumber)
    {
        $this->resourceAverageNumber = $resourceAverageNumber;

        return $this;
    }

    /**
     * Get resourceAverageNumber
     *
     * @return int
     */
    public function getResourceAverageNumber()
    {
        return $this->resourceAverageNumber;
    }

    /**
     * Add task
     *
     * @param \CoreBundle\Entity\Task $task
     *
     * @return Project
     */
    public function addTask(\CoreBundle\Entity\Task $task)
    {
        $this->tasks[] = $task;

        return $this;
    }

    /**
     * Remove task
     *
     * @param \CoreBundle\Entity\Task $task
     */
    public function removeTask(\CoreBundle\Entity\Task $task)
    {
        $this->tasks->removeElement($task);
    }

    /**
     * Get tasks
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getTasks()
    {
        return $this->tasks;
    }

    /**
     * Set referent
     *
     * @param \UserBundle\Entity\Resource $referent
     *
     * @return Project
     */
    public function setReferent(\UserBundle\Entity\Resource $referent = null)
    {
        $this->referent = $referent;

        return $this;
    }

    /**
     * Get referent
     *
     * @return \UserBundle\Entity\Resource
     */
    public function getReferent()
    {
        return $this->referent;
    }

    /**
     * Set responsible
     *
     * @param \UserBundle\Entity\Resource $responsible
     *
     * @return Project
     */
    public function setResponsible(\UserBundle\Entity\Resource $responsible = null)
    {
        $this->responsible = $responsible;

        return $this;
    }

    /**
     * Get responsible
     *
     * @return \UserBundle\Entity\Resource
     */
    public function getResponsible()
    {
        return $this->responsible;
    }
}
