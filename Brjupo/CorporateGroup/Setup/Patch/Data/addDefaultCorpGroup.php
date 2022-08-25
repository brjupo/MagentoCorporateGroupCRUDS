<?php

/**
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */

declare(strict_types=1);

namespace Brjupo\CorporateGroup\Setup\Patch\Data;

use Magento\Framework\Setup\ModuleDataSetupInterface;
use Magento\Framework\Setup\Patch\DataPatchInterface;

/**
 * Patch is mechanism, that allows to do atomic upgrade data changes.
 * As relation between CORPORATE_GROUP_ENTITY and  CUSTOMER_ENTITY is CORPORATE_GROUP_ENTITY_ENTITY_ID__CUSTOMER_ENTITY_CORP_GROUP_ID [both integers], I will set a "default", like the Customer Group "NOT LOGGED IN", to prevent the assignation to a corporate_group_identifier with entity_id=0
 * 
 * @author Brandon Juarez Ponce
 */
class addDefaultCorpGroup implements DataPatchInterface
{
    /**
     * @var ModuleDataSetupInterface $moduleDataSetup
     */
    private $moduleDataSetup;

    /**
     * @param ModuleDataSetupInterface $moduleDataSetup
     */
    public function __construct(ModuleDataSetupInterface $moduleDataSetup)
    {
        $this->moduleDataSetup = $moduleDataSetup;
    }

    /**
     * Do Upgrade
     *
     * @return void
     */
    public function apply()
    {
        $this->moduleDataSetup->getConnection()->startSetup();
        //The code that you want apply in the patch
        //Please note, that one patch is responsible only for one setup version
        //So one UpgradeData can consist of few data patches

        $this->moduleDataSetup->getConnection()->insert($this->moduleDataSetup->getTable('corporate_group_entity'), ['entity_id' => 0, 'corporate_group_identifier' => 'DEFAULT']);
        $this->moduleDataSetup->getConnection()->endSetup();
    }

    /**
     * @inheritdoc
     */
    public function getAliases()
    {
        return [];
    }

    /**
     * @inheritdoc
     */
    public static function getDependencies()
    {
        return [];
    }
}
