<?php

namespace Training\Bundle\UserNamingBundle\Migrations\Schema\v1_1;

use Doctrine\DBAL\Schema\Schema;
use Oro\Bundle\EntityExtendBundle\EntityConfig\ExtendScope;
use Oro\Bundle\EntityExtendBundle\Migration\Extension\ExtendExtension;
use Oro\Bundle\EntityExtendBundle\Migration\Extension\ExtendExtensionAwareInterface;
use Oro\Bundle\MigrationBundle\Migration\Migration;
use Oro\Bundle\MigrationBundle\Migration\QueryBag;
use Training\Bundle\UserNamingBundle\Migrations\Schema\TrainingUserNamingBundleInstaller;

/**
 * Class AddUserRelation
 *
 * @package \Training\Bundle\UserNamingBundle\Migrations\Schema\v1_1
 */
class AddUserRelation implements Migration, ExtendExtensionAwareInterface
{
    /**
     * @var ExtendExtension
     */
    private ExtendExtension $extendExtension;

    /**
     * @param ExtendExtension $extendExtension
     *
     * @return AddUserRelation
     */
    public function setExtendExtension(ExtendExtension $extendExtension): AddUserRelation
    {
        $this->extendExtension = $extendExtension;
        return $this;
    }

    /**
     * Modifies the given schema to apply necessary changes of a database
     * The given query bag can be used to apply additional SQL queries before and after schema changes
     *
     * @param Schema   $schema
     * @param QueryBag $queries
     *
     * @return void
     */
    public function up(Schema $schema, QueryBag $queries)
    {
        $this->extendExtension->addManyToOneRelation(
            $schema,
            'oro_user',
            'userNaming',
            TrainingUserNamingBundleInstaller::TABLE_NAME,
            'title',
            [
                'extend' => ['owner' => ExtendScope::OWNER_CUSTOM]
            ]
        );
    }
}
