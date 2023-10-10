<?php

namespace Training\Bundle\UserNamingBundle\Provider;

use Oro\Bundle\EntityBundle\Provider\EntityNameProviderInterface;
use Oro\Bundle\UserBundle\Entity\User;


class EntityNameProviderDecorator implements EntityNameProviderInterface
{
    public function __construct(public EntityNameProviderInterface $originalNameProvider)
    {

    }


    /**
     * {@inheritDoc}
     */
    public function getName($format, $locale, $entity)
    {
        if ($entity instanceof User) {
            return sprintf('%s %s %s', $entity->getLastName(), $entity->getFirstName(), 'ASDASDUIAGS');
        }

        return $this->originalNameProvider->getName($format, $locale, $entity);
    }

    /**
     * {@inheritDoc}
     */
    public function getNameDQL($format, $locale, $className, $alias)
    {
        $this->originalNameProvider->getNameDQL($format, $locale, $className, $alias);
    }
}
