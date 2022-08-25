<?php

namespace Brjupo\CorporateGroup\Api\Data;

use Magento\Framework\Api\ExtensibleDataInterface;

/**
 * Corporate group interface.
 * @api
 * @since may 10, 2022
 */
interface CorporateGroupInterface extends ExtensibleDataInterface
{
    /**#@+
     * Constants for keys of data array
     */
    const ENTITY_ID = 'entity_id';
    const CORPORATE_GROUP_IDENTIFIER = 'corporate_group_identifier';
    const CORPORATE_GROUP_CONTACT_EMAIL = 'corporate_group_contact_email';
    const CORPORATE_GROUP_CONTACT_TELEPHONE = 'corporate_group_contact_telephone';
    const DEFAULT_ENTITY_ID = 0;
    /**#@-*/

    /**
     * Get id
     *
     * @return int|null
     */
    public function getId();

    /**
     * Get entity id
     *
     * @return int|null
     */
    public function getEntityId();

    /**
     * Get corporate group identifier
     *
     * @return string
     */
    public function getCorporateGroupIdentifier();

    /**
     * Get corporate group contact email
     *
     * @return string
     */
    public function getCorporateGroupContactEmail();

    /**
     * Get corporate group contact telephone
     *
     * @return string
     */
    public function getCorporateGroupContactTelephone();

    /**
     * Set entity id
     *
     * @param int $id
     * @return $this
     */
    public function setEntityId($id);

    /**
     * Set corporate group identifier
     *
     * @param string $identifier
     * @return $this
     */
    public function setCorporateGroupIdentifier($identifier);

    /**
     * Set corporate group contact email
     *
     * @param string $email
     * @return $this
     */
    public function setCorporateGroupContactEmail($email);

    /**
     * Get corporate group contact telephone
     *
     * @param string $telephone
     * @return $this
     */
    public function setCorporateGroupContactTelephone($telephone);

}
