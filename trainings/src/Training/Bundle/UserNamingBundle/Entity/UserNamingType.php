<?php

namespace Training\Bundle\UserNamingBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Oro\Bundle\EntityConfigBundle\Metadata\Annotation\Config;
use Oro\Bundle\EntityExtendBundle\Entity\ExtendEntityInterface;
use Oro\Bundle\EntityExtendBundle\Entity\ExtendEntityTrait;

/**
 * @ORM\Table(name="training_user_naming_type")
 * @ORM\Entity()
 * @Config(
 *     routeName="training_user_naming_index",
 *     defaultValues={
 *          "security"={
 *              "type" = "ACL",
 *              "group_name" = "",
 *              "category" = "account_management"
 *          }
 *     }
 * )
 */

class UserNamingType implements ExtendEntityInterface
{
    use ExtendEntityTrait;

    /**
     * @ORM\Id
     * @ORM\Column(type="integer", name="id")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var  @ORM\Column(type="string", length=64, nullable=false)
     */
    private $title;

    /**
     * @var  @ORM\Column(type="string", length=255, nullable=false)
     */
    private $format;

    /**
     * @return int|null
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return mixed
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @param mixed $title
     *
     * @return UserNamingType
     */
    public function setTitle($title)
    {
        $this->title = $title;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getFormat()
    {
        return $this->format;
    }

    /**
     * @param mixed $format
     *
     * @return UserNamingType
     */
    public function setFormat($format)
    {
        $this->format = $format;
        return $this;
    }
}
