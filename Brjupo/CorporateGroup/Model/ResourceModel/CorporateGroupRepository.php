<?php

/**
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */

namespace Brjupo\CorporateGroup\Model\ResourceModel;


use Brjupo\CorporateGroup\Model\CorporateGroupFactory;
use Brjupo\CorporateGroup\Api\Data\CorporateGroupInterfaceFactory;
use Brjupo\CorporateGroup\Model\ResourceModel\CorporateGroup;
use Brjupo\CorporateGroup\Api\Data\CorporateGroupSearchResultsInterfaceFactory;

use Magento\Framework\Api\Search\FilterGroup;
use Magento\Framework\Api\SearchCriteriaInterface;
use Magento\Framework\Api\SearchCriteria\CollectionProcessorInterface;
use Magento\Framework\Exception\InputException;
use Magento\Framework\Exception\State\InvalidTransitionException;
use Magento\Framework\Api\ExtensibleDataInterface;

use Magento\Framework\Reflection\DataObjectProcessor;
use Magento\Framework\Api\ExtensionAttribute\JoinProcessorInterface;

/**
 * Corporate group CRUD class
 *
 * @SuppressWarnings(PHPMD.CouplingBetweenObjects)
 */
class CorporateGroupRepository implements \Brjupo\CorporateGroup\Api\CorporateGroupRepositoryInterface
{

    /**
     * @var \Brjupo\CorporateGroup\Model\CorporateGroupFactory
     */
    protected $groupFactory;

    /**
     * @var \Brjupo\CorporateGroup\Api\Data\CorporateGroupInterfaceFactory
     */
    protected $groupDataFactory;

    /**
     * @var \Brjupo\CorporateGroup\Model\ResourceModel\CorporateGroup
     */
    protected $groupResourceModel;

    /**
     * @var \Brjupo\CorporateGroup\Api\Data\GroupSearchResultsInterfaceFactory
     */
    protected $searchResultsFactory;

    /**
     * @var CollectionProcessorInterface
     */
    private $collectionProcessor;

    /**
     * @param CorporateGroupFactory $groupFactory
     * @param CorporateGroupInterfaceFactory $groupDataFactory
     * @param CorporateGroup $groupResourceModel
     * @param CorporateGroupSearchResultsInterfaceFactory $searchResultsFactory
     * @param CollectionProcessorInterface $collectionProcessor
     */
    public function __construct(
        CorporateGroupFactory $groupFactory,
        CorporateGroupInterfaceFactory $groupDataFactory,
        CorporateGroup $groupResourceModel,
        CorporateGroupSearchResultsInterfaceFactory $searchResultsFactory,
        CollectionProcessorInterface $collectionProcessor = null
    ) {
        $this->groupFactory = $groupFactory;
        $this->groupDataFactory = $groupDataFactory;
        $this->groupResourceModel = $groupResourceModel;
        $this->searchResultsFactory = $searchResultsFactory;
        $this->collectionProcessor = $collectionProcessor ?: $this->getCollectionProcessor();
    }

    /**
     * @inheritdoc
     */
    public function save(\Brjupo\CorporateGroup\Api\Data\CorporateGroupInterface $corporateGroup)
    {
        /** @var \Brjupo\CorporateGroup\Model\CorporateGroup $groupModel */
        $groupModel = null;

        $groupModel = $this->groupFactory->create();
        $groupModel->setCorporateGroupIdentifier($corporateGroup->getCorporateGroupIdentifier());
        $groupModel->setCorporateGroupContactEmail($corporateGroup->getCorporateGroupContactEmail());
        $groupModel->setCorporateGroupContactTelephone($corporateGroup->getCorporateGroupContactTelephone());

        try {
            $this->groupResourceModel->save($groupModel);
        } catch (\Magento\Framework\Exception\LocalizedException $e) {
            /**
             * Would like a better way to determine this error condition but
             *  difficult to do without imposing more database calls
             */
            if ($e->getMessage() == (string)__('Corporate Group already exists.')) {
                throw new InvalidTransitionException(__('Corporate Group already exists.'));
            }
            throw $e;
        }

        $groupDataObject = $this->groupDataFactory->create()
            ->setEntityId($groupModel->getEntityId())
            ->setCorporateGroupIdentifier($groupModel->getCorporateGroupIdentifier())
            ->setCorporateGroupContactEmail($groupModel->getCorporateGroupContactEmail())
            ->setCorporateGroupContactTelephone($groupModel->getCorporateGroupContactTelephone());

        return $groupDataObject;
    }

    /**
     * @inheritdoc
     */
    public function getById($id)
    {
        $group = $this->groupFactory->create();
        $group->load($id);
        if ($group->getEntityId() === null || $group->getEntityId() != $id) {
            throw \Magento\Framework\Exception\NoSuchEntityException::singleField(\Brjupo\CorporateGroup\Api\Data\CorporateGroupInterface::ENTITY_ID, $id);
        }
        return $group;
    }

    /**
     * @inheritdoc
     */
    public function getList(SearchCriteriaInterface $searchCriteria)
    {
        $searchResults = $this->searchResultsFactory->create();
        $searchResults->setSearchCriteria($searchCriteria);
        /** @var \Brjupo\CorporateGroup\Model\ResourceModel\CorporateGroup\Collection $collection */
        $collection = $this->groupFactory->create()->getCollection();


        $this->collectionProcessor->process($searchCriteria, $collection);

        /** @var \Brjupo\CorporateGroup\Api\Data\CorporateGroupInterface[] $groups */
        $groups = [];
        /** @var \Brjupo\CorporateGroup\Model\CorporateGroup $group */
        foreach ($collection as $group) {
            /** @var \Brjupo\CorporateGroup\Api\Data\CorporateGroupInterface $groupDataObject */
            $groupDataObject = $this->groupDataFactory->create()
                ->setEntityId($group->getEntityId())
                ->setCorporateGroupIdentifier($group->getCorporateGroupIdentifier())
                ->setCorporateGroupContactEmail($group->getCorporateGroupContactEmail())
                ->setCorporateGroupContactTelephone($group->getCorporateGroupContactTelephone());
            $groups[] = $groupDataObject;
        }
        $searchResults->setTotalCount($collection->getSize());
        return $searchResults->setItems($groups);
    }


    /**
     * Delete corporate group by ID.
     *
     * @param int $id
     * @return bool true on success
     * @throws \Magento\Framework\Exception\NoSuchEntityException
     * @throws \Magento\Framework\Exception\StateException If customer group cannot be deleted
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function deleteById($id)
    {
        if ($id <= 0) {
            throw new \Magento\Framework\Exception\StateException(__('Please verify your id.'));
            return false;
        }
        /** @var \Brjupo\CorporateGroup\Api\Data\CorporateGroupInterface $group */
        $group = $this->getById($id);
        $group->delete($id);
        return true;
    }


    /**
     * Retrieve collection processor
     *
     * @deprecated 101.0.0
     * @return CollectionProcessorInterface
     */
    private function getCollectionProcessor()
    {
        if (!$this->collectionProcessor) {
            $this->collectionProcessor = \Magento\Framework\App\ObjectManager::getInstance()->get(
                'Brjupo\CorporateGroup\Model\Api\SearchCriteria\CorporateGroupCollectionProcessor'
            );
        }
        return $this->collectionProcessor;
    }
}
