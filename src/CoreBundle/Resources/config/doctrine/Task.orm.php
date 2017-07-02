<?php

use Doctrine\ORM\Mapping\ClassMetadataInfo;

$metadata->setInheritanceType(ClassMetadataInfo::INHERITANCE_TYPE_NONE);
$metadata->customRepositoryClassName = 'CoreBundle\Repository\TaskRepository';
$metadata->setChangeTrackingPolicy(ClassMetadataInfo::CHANGETRACKING_DEFERRED_IMPLICIT);
$metadata->mapField(array(
   'fieldName' => 'id',
   'type' => 'integer',
   'id' => true,
   'columnName' => 'id',
  ));
$metadata->mapField(array(
   'columnName' => 'name',
   'fieldName' => 'name',
   'type' => 'string',
   'length' => 255,
  ));
$metadata->mapField(array(
   'columnName' => 'project_id',
   'fieldName' => 'projectId',
   'type' => 'integer',
  ));
$metadata->mapField(array(
   'columnName' => 'advancement',
   'fieldName' => 'advancement',
   'type' => 'integer',
  ));
$metadata->mapField(array(
   'columnName' => 'initial_wokload',
   'fieldName' => 'initialWokload',
   'type' => 'float',
  ));
$metadata->mapField(array(
   'columnName' => 'consumed_workload',
   'fieldName' => 'consumedWorkload',
   'type' => 'float',
  ));
$metadata->mapField(array(
   'columnName' => 'left_to_do',
   'fieldName' => 'leftToDo',
   'type' => 'float',
  ));
$metadata->setIdGeneratorType(ClassMetadataInfo::GENERATOR_TYPE_AUTO);