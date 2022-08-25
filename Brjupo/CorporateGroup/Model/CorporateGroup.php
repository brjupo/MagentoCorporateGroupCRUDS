<?php

namespace Brjupo\CorporateGroup\Model;

class CorporateGroup extends \Magento\Framework\Model\AbstractModel implements \Magento\Framework\DataObject\IdentityInterface 
{
    const CACHE_TAG = 'corporate_group_entity';

    protected $_cacheTag = 'corporate_group_entity';

    protected $_eventPrefix = 'corporate_group_entity';

    protected function _construct()
    {
        $this->_init(\Brjupo\CorporateGroup\Model\ResourceModel\CorporateGroup::class);
    }

    public function getIdentities()
    {
        return [self::CACHE_TAG . '_' . $this->getId()];
    }

    public function getDefaultValues()
    {
        $values = [];

        return $values;
    }
}
