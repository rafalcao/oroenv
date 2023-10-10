<?php

namespace Training\Bundle\UserNamingBundle\Migrations\Schema;

use Doctrine\DBAL\Schema\Schema;
use Oro\Bundle\EntityExtendBundle\EntityConfig\ExtendScope;
use Oro\Bundle\EntityExtendBundle\Migration\Extension\ExtendExtension;
use Oro\Bundle\EntityExtendBundle\Migration\Extension\ExtendExtensionAwareInterface;
use Oro\Bundle\MigrationBundle\Migration\Installation;
use Oro\Bundle\MigrationBundle\Migration\QueryBag;
use Training\Bundle\UserNamingBundle\Migrations\Schema\v1_1\AddUserRelation;

/**
 * Class TrainingUserNamingBundleInstaller
 *
 * @package \Training\Bundle\UserNamingBundle\Migrations\Schema
 */
class TrainingUserNamingBundleInstaller implements Installation, ExtendExtensionAwareInterface
{
    /** @var string */
    const TABLE_NAME = 'training_user_naming_type';

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
     * Gets a number of the last migration version implemented by this installation script
     *
     * @return string
     */
    public function getMigrationVersion(): string
    {
        return 'v1_1';
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
    public function up(Schema $schema, QueryBag $queries): void
    {
        $this->addUserNamingTypeTable($schema);
        $this->addUserRelation($schema);
    }

    /**
     * @param \Doctrine\DBAL\Schema\Schema $schema
     *
     * @return void
     */
    private function addUserNamingTypeTable(Schema $schema): void
    {
        $table = $schema->createTable(self::TABLE_NAME);
        $table->addColumn('id', 'integer', ['autoincrement' => true]);
        $table->addColumn('title', 'string', ['length' => 64]);
        $table->addColumn('format', 'string', ['length' => 255]);
        $table->setPrimaryKey(['id']);
    }


    /**
     * @param \Doctrine\DBAL\Schema\Schema $schema
     *
     * @return void
     */
    public function addUserRelation(Schema $schema)
    {
        $this->extendExtension->addManyToOneRelation(
            $schema,
            'oro_user',
            'userNaming',
            self::TABLE_NAME,
            'title',
            [
                'extend' => ['owner' => ExtendScope::OWNER_CUSTOM]
            ]
        );
    }
}
