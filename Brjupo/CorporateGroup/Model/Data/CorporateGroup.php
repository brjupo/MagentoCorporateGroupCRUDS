<?php
/**
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */

namespace Brjupo\CorporateGroup\Model\Data;

/**
 * Corporate Group data model.
 */
class CorporateGroup extends \Magento\Framework\Api\AbstractExtensibleObject implements
    \Brjupo\CorporateGroup\Api\Data\CorporateGroupInterface
{
    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->_get(self::ENTITY_ID);
    }
    /**
     * Get entity id
     *
     * @return int
     */
    public function getEntityId()
    {
        return $this->_get(self::ENTITY_ID);
    }

    /**
     * Get corporate group identifier
     *
     * @return string
     */
    public function getCorporateGroupIdentifier()
    {
        return $this->_get(self::CORPORATE_GROUP_IDENTIFIER);
    }

    /**
     * Get corporate group contact email
     *
     * @return string
     */
    public function getCorporateGroupContactEmail()
    {
        return $this->_get(self::CORPORATE_GROUP_CONTACT_EMAIL);
    }

    /**
     * Get corporate group contact telephone
     *
     * @return string
     */
    public function getCorporateGroupContactTelephone()
    {
        return $this->_get(self::CORPORATE_GROUP_CONTACT_TELEPHONE);
    }

    /**
     * Set entity id
     *
     * @param int $id
     * @return $this
     */
    public function setEntityId($id)
    {
        return $this->setData(self::ENTITY_ID, $id);
    }

    /**
     * Set corporate group identifier
     *
     * @param string $identifier
     * @return $this
     */
    public function setCorporateGroupIdentifier($identifier)
    {
        return $this->setData(self::CORPORATE_GROUP_IDENTIFIER, $identifier);
    }

    /**
     * Set corporate group contact email
     *
     * @param string $email
     * @return $this
     */
    public function setCorporateGroupContactEmail($email)
    {
        return $this->setData(self::CORPORATE_GROUP_CONTACT_EMAIL, $email);
    }

    /**
     * Get corporate group contact telephone
     *
     * @param string $telephone
     * @return $this
     */
    public function setCorporateGroupContactTelephone($telephone)
    {
        return $this->setData(self::CORPORATE_GROUP_CONTACT_TELEPHONE, $telephone);
    }
    
}
