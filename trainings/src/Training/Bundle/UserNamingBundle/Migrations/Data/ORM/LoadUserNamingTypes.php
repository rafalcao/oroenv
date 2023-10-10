<?php

namespace Training\Bundle\UserNamingBundle\Migrations\Data\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Persistence\ObjectManager;
use Training\Bundle\UserNamingBundle\Entity\UserNamingType;

/**
 * Class LoadUserNamingTypes
 *
 * @package \Training\Bundle\UserNamingBundle\Migrations\Data\ORM
 */
class LoadUserNamingTypes extends AbstractFixture
{
    private array $types = [
        'Official'          => 'PREFIX FIRST MIDDLE LAST SUFFIX',
        'Unofficial'        => 'FIRST LAST',
        'First name only'   => 'FIRST'
    ];

    public function load(ObjectManager $manager)
    {
        foreach ($this->types as $key => $value) {
            $type = new UserNamingType();
            $type->setTitle($key);
            $type->setFormat($value);

            $manager->persist($type);
        }

        $manager->flush();
    }

}
