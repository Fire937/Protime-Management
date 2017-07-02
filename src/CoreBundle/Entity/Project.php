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
     * @var int
     */
    private $referentId;

    /**
     * @var int
     */
    private $responsibleId;

    /**
     * @var float
     */
    private $costToDeliver;

    /**
     * @var float
     */
    private $sellCost;

    /**
     * @var float
     */
    private $gain;

    /**
     * @var int
     */
    private $resourcesAvarageNumber;


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
     * @param float $gain
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
     * @return float
     */
    public function getGain()
    {
        return $this->gain;
    }

    /**
     * Set resourcesAvarageNumber
     *
     * @param integer $resourcesAvarageNumber
     *
     * @return Project
     */
    public function setResourcesAvarageNumber($resourcesAvarageNumber)
    {
        $this->resourcesAvarageNumber = $resourcesAvarageNumber;

        return $this;
    }

    /**
     * Get resourcesAvarageNumber
     *
     * @return int
     */
    public function getResourcesAvarageNumber()
    {
        return $this->resourcesAvarageNumber;
    }
}

