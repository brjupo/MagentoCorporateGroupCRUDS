<?php

namespace Brjupo\CorporateGroup\Model\ResourceModel;


class CorporateGroup extends \Magento\Framework\Model\ResourceModel\Db\AbstractDb
{

    public function __construct(
        \Magento\Framework\Model\ResourceModel\Db\Context $context
    ) {
        parent::__construct($context);
    }

    protected function _construct()
    {
        $this->_init('corporate_group_entity', 'entity_id');
    }
}