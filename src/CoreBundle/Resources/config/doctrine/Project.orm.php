<?php

use Doctrine\ORM\Mapping\ClassMetadataInfo;

$metadata->setInheritanceType(ClassMetadataInfo::INHERITANCE_TYPE_NONE);
$metadata->customRepositoryClassName = 'CoreBundle\Repository\ProjectRepository';
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
   'columnName' => 'referent_id',
   'fieldName' => 'referentId',
   'type' => 'integer',
  ));
$metadata->mapField(array(
   'columnName' => 'responsible_id',
   'fieldName' => 'responsibleId',
   'type' => 'integer',
   'nullable' => true,
  ));
$metadata->mapField(array(
   'columnName' => 'cost_to_deliver',
   'fieldName' => 'costToDeliver',
   'type' => 'float',
   'nullable' => true,
  ));
$metadata->mapField(array(
   'columnName' => 'sell_cost',
   'fieldName' => 'sellCost',
   'type' => 'float',
   'nullable' => true,
  ));
$metadata->mapField(array(
   'columnName' => 'gain',
   'fieldName' => 'gain',
   'type' => 'float',
   'nullable' => true,
  ));
$metadata->mapField(array(
   'columnName' => 'resources_avarage_number',
   'fieldName' => 'resourcesAvarageNumber',
   'type' => 'integer',
   'nullable' => true,
  ));
$metadata->setIdGeneratorType(ClassMetadataInfo::GENERATOR_TYPE_AUTO);