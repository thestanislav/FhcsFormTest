<?php

namespace FhcsFormTest\Form;

use Zend\Form\Fieldset;
use FhcsFormTest\Entity\Order;
use DoctrineModule\Stdlib\Hydrator\DoctrineObject as DoctrineHydrator;

class OrderFieldset extends Fieldset{
    
    protected $entityManager;
    
    public function getEntityManager() {
        return $this->entityManager;
    }

    public function setEntityManager($entityManager) {
        $this->entityManager = $entityManager;
    }

    public function init(){
        $this->setHydrator(new DoctrineHydrator($this->getEntityManager(), 'FhcsFormTest\Entity\Order'))->setObject(new Order());
        $this->add(array(
            'type' => 'Zend\Form\Element\Collection',
            'name' => 'freights',
            'options' => array(
                'target_element' => array(
                    'type' => 'FhcsFormTest\Form\FreightFieldset'
                )
            )
        ));
    }
}