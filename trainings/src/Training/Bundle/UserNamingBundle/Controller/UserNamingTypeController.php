<?php

namespace Training\Bundle\UserNamingBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Component\Routing\Annotation\Route;
use Training\Bundle\UserNamingBundle\Entity\UserNamingType;

/**
 * Class UserNamingTypeController
 *
 * @package \Training\Bundle\UserNamingBundle\Controller
 */
class UserNamingTypeController
{
    /**
     * @Route("/", "training_user_naming_index")
     * @Template()
     */
    public function indexAction(): array
    {
        return [
          'entity_class' => UserNamingType::class
        ];
    }
}
