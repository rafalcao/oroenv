<?php

namespace Training\Bundle\UserNamingBundle\ImportExport;

use Oro\Bundle\ImportExportBundle\Configuration\ImportExportConfiguration;
use Oro\Bundle\ImportExportBundle\Configuration\ImportExportConfigurationInterface;
use Oro\Bundle\ImportExportBundle\Configuration\ImportExportConfigurationProviderInterface;

/**
 * Class UserNamingImportExportConfigurationProvider
 *
 * @package \Training\Bundle\UserNamingBundle\ImportExport
 */
class UserNamingImportExportConfigurationProvider implements ImportExportConfigurationProviderInterface
{
    /**
     * @return ImportExportConfigurationInterface
     */
    public function get(): ImportExportConfigurationInterface
    {
        return new ImportExportConfiguration([
            ImportExportConfiguration::FIELD_ENTITY_CLASS => UserNamingType::class,
            ImportExportConfiguration::FIELD_EXPORT_PROCESSOR_ALIAS => 'training_user_naming_type',
            ImportExportConfiguration::FIELD_IMPORT_PROCESSOR_ALIAS => 'training_user_naming_type'
        ]);
    }
}
