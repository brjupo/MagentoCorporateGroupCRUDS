<?php
/**
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */

namespace Brjupo\CorporateGroup\Api\Data;

/**
 * Interface for corporate groups search results.
 * @api
 * @since 100.0.2
 */
interface CorporateGroupSearchResultsInterface extends \Magento\Framework\Api\SearchResultsInterface
{
    /**
     * Get corporate groups list.
     *
     * @return \Brjupo\CorporateGroup\Api\Data\CorporateGroupInterface[]
     */
    public function getItems();

    /**
     * Set corporate groups list.
     *
     * @api
     * @param \Brjupo\CorporateGroup\Api\Data\CorporateGroupInterface[] $items
     * @return $this
     */
    public function setItems(array $items);
}
