<?php
/**
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */
declare(strict_types=1);

namespace Brjupo\CorporateGroup\Model;

use Brjupo\CorporateGroup\Api\Data\CorporateGroupSearchResultsInterface;
use Magento\Framework\Api\SearchResults;

/**
 * Service Data Object with Corporate Groups search results.
 */
class CorporateGroupSearchResults extends SearchResults implements CorporateGroupSearchResultsInterface
{
}
