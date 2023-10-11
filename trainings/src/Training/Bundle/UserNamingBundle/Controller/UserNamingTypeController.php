<?php

namespace Training\Bundle\UserNamingBundle\Controller;

use Oro\Bundle\SecurityBundle\Annotation\Acl;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Component\Routing\Annotation\Route;
use Training\Bundle\UserNamingBundle\Entity\UserNamingType;
use Oro\Bundle\SecurityBundle\Annotation\AclAncestor;

/**
 * Class UserNamingTypeController
 *
 * @package \Training\Bundle\UserNamingBundle\Controller
 */
class UserNamingTypeController
{
    /**
     * @Route("/", "training_user_naming_index")
     * @Template
     * @AclAncestor("training_user_naming_view")
     */
    public function indexAction()
    {
        return [
            'entity_class' => UserNamingType::class
        ];
    }

    /**
     * @Route("/view/{id}", name="training_user_naming_view", requirements={"id"="\d+"})
     * @Template
     * @Acl(
     *     id="training_user_naming_view",
     *     type="entity",
     *     class="TrainingUserNamingBundle:UserNamingType",
     *     permission="VIEW"
     * )
     */
    public function viewAction(UserNamingType $userNamingType): array
    {
        return [
            'entity' => $userNamingType
        ];
    }
}
