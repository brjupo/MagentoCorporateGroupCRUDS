<?php
namespace Brjupo\CorporateGroup\Api;

/**
 * Corporate group CRUD interface
 * @api
 * @since may 10, 2022
 */
interface CorporateGroupRepositoryInterface
{
    /**
     * Save corporate customer group.
     *
     * @param \Brjupo\CorporateGroup\Api\Data\CorporateGroupInterface $corporateGroup
     * @return \Brjupo\CorporateGroup\Api\Data\CorporateGroupInterface 
     * @throws \Magento\Framework\Exception\InputException If there is a problem with the input
     * @throws \Magento\Framework\Exception\NoSuchEntityException If a group ID is sent but the group does not exist
     * @throws \Magento\Framework\Exception\State\InvalidTransitionException
     *      If saving customer group with customer group code that is used by an existing customer group
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function save(\Brjupo\CorporateGroup\Api\Data\CorporateGroupInterface $corporateGroup);

    /**
     * Get corporate group by group ID.
     *
     * @param int $id
     * @return \Brjupo\CorporateGroup\Api\Data\CorporateGroupInterface
     * @throws \Magento\Framework\Exception\NoSuchEntityException If $id is not found
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function getById($id);

    /**
     * Retrieve customer groups.
     *
     * The list of groups can be filtered to exclude the NOT_LOGGED_IN group using the first parameter and/or it can
     * be filtered by tax class.
     *
     * This call returns an array of objects, but detailed information about each object’s attributes might not be
     * included. See https://devdocs.magento.com/codelinks/attributes.html#GroupRepositoryInterface to determine
     * which call to use to get detailed information about all attributes for an object.
     *
     * @param \Magento\Framework\Api\SearchCriteriaInterface $searchCriteria
     * @return \Brjupo\CorporateGroup\Api\Data\CorporateGroupSearchResultsInterface
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function getList(\Magento\Framework\Api\SearchCriteriaInterface $searchCriteria);

    /**
     * Delete customer group by ID.
     *
     * @param int $id
     * @return bool true on success
     * @throws \Magento\Framework\Exception\NoSuchEntityException
     * @throws \Magento\Framework\Exception\StateException If customer group cannot be deleted
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function deleteById($id);
}
