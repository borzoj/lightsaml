<?php

namespace AerialShip\LightSaml\Model;

use AerialShip\LightSaml\Helper;
use AerialShip\LightSaml\Model\Service\AbstractService;


class SpSsoDescriptor extends AbstractDescriptor
{

    public function addService(AbstractService $service) {
        $class = Helper::getClassNameOnly($service);
        if ($class != 'SingleLogoutService' &&
            $class != 'AssertionConsumerService'
        ) {
            throw new \InvalidArgumentException("Invalid service type $class for SPSSODescriptor");
        }
        return parent::addService($service);
    }

    /**
     * @return string
     */
    public function getXmlNodeName() {
        return 'SPSSODescriptor';
    }

}