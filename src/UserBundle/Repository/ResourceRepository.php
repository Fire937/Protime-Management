<?php

namespace UserBundle\Repository;

/**
 * ResourceRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class ResourceRepository extends \Doctrine\ORM\EntityRepository
{
   public function findProjects()
    {
      return $this->getEntityManager()
            ->createQuery(
                'SELECT * FROM CoreBundle:projects p INNER JOIN CoreBundle:tasks t ON p.id = t.project_id INNER JOIN resources_tasks ON t.id = resources_tasks.task_id WHERE tasks_users.resources_id = ?1'
            )->setParameter(1, $this->getId())
            ->getResult();
    }
}
