<?php

namespace UserBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use FOS\UserBundle\Model\User as BaseUser;

use Doctrine\Common\Collections\Collection;

/**
 * Resource
 *
 * @ORM\Table(name="resource")
 * @ORM\Entity(repositoryClass="UserBundle\Repository\ResourceRepository")
 */
class Resource extends BaseUser
{
    /**
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @var string
     *
     * @ORM\Column(name="firstName", type="string", length=255)
     */
    private $firstName;

    /**
     * @var string
     *
     * @ORM\Column(name="lastName", type="string", length=255)
     */
    private $lastName;
  
    /**
     * @ORM\OneToMany(targetEntity="CoreBundle\Entity\Project", mappedBy="referent")
     */
    private $referent_projects;

    /**
     * @ORM\OneToMany(targetEntity="CoreBundle\Entity\Project", mappedBy="responsible")
     */
    private $responsible_projects;
  
    /**
     * Many Resources have Many Tasks.
     * @ORM\ManyToMany(targetEntity="CoreBundle\Entity\Task", inversedBy="resources")
     * @ORM\JoinTable(name="resources_tasks")
     */
    private $tasks;

    public function __construct()
    {
      $this->tasks = new \Doctrine\Common\Collections\ArrayCollection();
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
     * Set firstName
     *
     * @param string $firstName
     *
     * @return Resource
     */
    public function setFirstName($firstName)
    {
        $this->firstName = $firstName;

        return $this;
    }

    /**
     * Get firstName
     *
     * @return string
     */
    public function getFirstName()
    {
        return $this->firstName;
    }

    /**
     * Set lastName
     *
     * @param string $lastName
     *
     * @return Resource
     */
    public function setLastName($lastName)
    {
        $this->lastName = $lastName;

        return $this;
    }

    /**
     * Get lastName
     *
     * @return string
     */
    public function getLastName()
    {
        return $this->lastName;
    }

    /**
     * Add referentProject
     *
     * @param \CoreBundle\Entity\Project $referentProject
     *
     * @return Resource
     */
    public function addReferentProject(\CoreBundle\Entity\Project $referentProject)
    {
        $this->referent_projects[] = $referentProject;

        return $this;
    }

    /**
     * Remove referentProject
     *
     * @param \CoreBundle\Entity\Project $referentProject
     */
    public function removeReferentProject(\CoreBundle\Entity\Project $referentProject)
    {
        $this->referent_projects->removeElement($referentProject);
    }

    /**
     * Get referentProjects
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getReferentProjects()
    {
        return $this->referent_projects;
    }

    /**
     * Add responsibleProject
     *
     * @param \CoreBundle\Entity\Project $responsibleProject
     *
     * @return Resource
     */
    public function addResponsibleProject(\CoreBundle\Entity\Project $responsibleProject)
    {
        $this->responsible_projects[] = $responsibleProject;

        return $this;
    }

    /**
     * Remove responsibleProject
     *
     * @param \CoreBundle\Entity\Project $responsibleProject
     */
    public function removeResponsibleProject(\CoreBundle\Entity\Project $responsibleProject)
    {
        $this->responsible_projects->removeElement($responsibleProject);
    }

    /**
     * Get responsibleProjects
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getResponsibleProjects()
    {
        return $this->responsible_projects;
    }

    /**
     * Add task
     *
     * @param \CoreBundle\Entity\Project $task
     *
     * @return Resource
     */
    public function addTask(\CoreBundle\Entity\Project $task)
    {
        $this->tasks[] = $task;

        return $this;
    }

    /**
     * Remove task
     *
     * @param \CoreBundle\Entity\Project $task
     */
    public function removeTask(\CoreBundle\Entity\Project $task)
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
}
