<?php

namespace CoreBundle\Entity;

/**
 * Project
 */
class Project
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
     * @var \UserBundle\Entity\User Un utilisateur de type ROLE_CP
     */
    private $referent;
  
    /**
     * @var \UserBundle\Entity\User Un utilisateur de type ROLE_DP (sauf exception, ie: changement de rôle)
     */
    private $responsible;

    /**
     * @var float
     */
    private $costToDeliver;

    /**
     * @var float
     */
    private $sellCost;

    /**
     * @var int
     */
    private $gain;

    /**
     * @var int
     */
    private $progress;

    /**
     * @var int
     */
    private $resourceAverageNumber;
  
    /**
     * @var array The tasks attached to the project, in an array.
     */
    private $tasks;

    /**
     * @var array An array containing users, the resources attached to the project
     */
    private $resources;

    public function __construct()
    {
        $this->setProgress(0);
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

    public function setTasks($tasks)
    {
        $this->tasks = $tasks;

        return $this;
    }

    /**
     * Get tasks
     *
     * @return array
     */
    public function getTasks()
    {
        return $this->tasks;
    }

    public function setResources($resources)
    {
        $this->resources = $resources;

        return $this;
    }

    public function getResources()
    {
        return $this->resources;
    }

    /**
     * Set referent
     *
     * @param \UserBundle\Entity\User $referent
     *
     * @return Project
     */
    public function setReferent(\UserBundle\Entity\User $referent = null)
    {
        $this->referent = $referent;

        return $this;
    }

    /**
     * Get referent
     *
     * @return \UserBundle\Entity\User
     */
    public function getReferent()
    {
        return $this->referent;
    }

    /**
     * Set responsible
     *
     * @param \UserBundle\Entity\User $responsible
     *
     * @return Project
     */
    public function setResponsible(\UserBundle\Entity\User $responsible = null)
    {
        $this->responsible = $responsible;

        return $this;
    }

    /**
     * Get responsible
     *
     * @return \UserBundle\Entity\User
     */
    public function getResponsible()
    {
        return $this->responsible;
    }
}
