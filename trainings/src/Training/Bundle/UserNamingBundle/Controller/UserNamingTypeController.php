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
     * @Template("@TrainingUserNaming/UserNamingType/index.html.twig")
     */
    public function indexAction()
    {
        return [
            'entity_class' => UserNamingType::class
        ];
    }

    /**
     * @Route("/view/{id}", name="training_user_naming_view", requirements={"id"="\d+"})
     * @Template("@TrainingUserNaming/UserNamingType/view.html.twig")
     */
    public function viewAction(UserNamingType $userNamingType): array
    {
        return [
            'entity' => $userNamingType
        ];
    }
}
