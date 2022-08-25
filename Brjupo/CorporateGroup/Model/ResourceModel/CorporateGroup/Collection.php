<?php

namespace Brjupo\CorporateGroup\Model\ResourceModel\CorporateGroup;

/**
 * Corporate group collection
 *
 * @author      Magento Core Team <core@magentocommerce.com>
 */
class Collection extends \Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection
{
    protected $_idFieldName = 'entity_id';

    /**
     * Resource initialization
     *
     * @return void
     */
    protected function _construct()
    {
        $this->_init(\Brjupo\CorporateGroup\Model\CorporateGroup::class, \Brjupo\CorporateGroup\Model\ResourceModel\CorporateGroup::class);
    }
}
