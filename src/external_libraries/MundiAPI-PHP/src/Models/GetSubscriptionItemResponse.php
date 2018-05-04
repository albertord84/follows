<?php
/*
 * MundiAPILib
 *
 * This file was automatically generated by APIMATIC v2.0 ( https://apimatic.io ).
 */

namespace MundiAPILib\Models;

use JsonSerializable;

/**
 * @todo Write general description for this model
 */
class GetSubscriptionItemResponse implements JsonSerializable
{
    /**
     * @todo Write general description for this property
     * @required
     * @var string $id public property
     */
    public $id;

    /**
     * @todo Write general description for this property
     * @required
     * @var string $description public property
     */
    public $description;

    /**
     * @todo Write general description for this property
     * @required
     * @var string $status public property
     */
    public $status;

    /**
     * @todo Write general description for this property
     * @required
     * @maps created_at
     * @var string $createdAt public property
     */
    public $createdAt;

    /**
     * @todo Write general description for this property
     * @required
     * @maps updated_at
     * @var string $updatedAt public property
     */
    public $updatedAt;

    /**
     * @todo Write general description for this property
     * @required
     * @maps pricing_scheme
     * @var GetPricingSchemeResponse $pricingScheme public property
     */
    public $pricingScheme;

    /**
     * @todo Write general description for this property
     * @required
     * @var GetDiscountResponse[] $discounts public property
     */
    public $discounts;

    /**
     * @todo Write general description for this property
     * @required
     * @var GetSubscriptionResponse $subscription public property
     */
    public $subscription;

    /**
     * @todo Write general description for this property
     * @var integer|null $quantity public property
     */
    public $quantity;

    /**
     * @todo Write general description for this property
     * @var integer|null $cycles public property
     */
    public $cycles;

    /**
     * @todo Write general description for this property
     * @maps deleted_at
     * @var string|null $deletedAt public property
     */
    public $deletedAt;

    /**
     * Constructor to set initial or default values of member properties
     * @param string                   $id            Initialization value for $this->id
     * @param string                   $description   Initialization value for $this->description
     * @param string                   $status        Initialization value for $this->status
     * @param string                   $createdAt     Initialization value for $this->createdAt
     * @param string                   $updatedAt     Initialization value for $this->updatedAt
     * @param GetPricingSchemeResponse $pricingScheme Initialization value for $this->pricingScheme
     * @param array                    $discounts     Initialization value for $this->discounts
     * @param GetSubscriptionResponse  $subscription  Initialization value for $this->subscription
     * @param integer                  $quantity      Initialization value for $this->quantity
     * @param integer                  $cycles        Initialization value for $this->cycles
     * @param string                   $deletedAt     Initialization value for $this->deletedAt
     */
    public function __construct()
    {
        if (11 == func_num_args()) {
            $this->id            = func_get_arg(0);
            $this->description   = func_get_arg(1);
            $this->status        = func_get_arg(2);
            $this->createdAt     = func_get_arg(3);
            $this->updatedAt     = func_get_arg(4);
            $this->pricingScheme = func_get_arg(5);
            $this->discounts     = func_get_arg(6);
            $this->subscription  = func_get_arg(7);
            $this->quantity      = func_get_arg(8);
            $this->cycles        = func_get_arg(9);
            $this->deletedAt     = func_get_arg(10);
        }
    }


    /**
     * Encode this object to JSON
     */
    public function jsonSerialize()
    {
        $json = array();
        $json['id']             = $this->id;
        $json['description']    = $this->description;
        $json['status']         = $this->status;
        $json['created_at']     = $this->createdAt;
        $json['updated_at']     = $this->updatedAt;
        $json['pricing_scheme'] = $this->pricingScheme;
        $json['discounts']      = $this->discounts;
        $json['subscription']   = $this->subscription;
        $json['quantity']       = $this->quantity;
        $json['cycles']         = $this->cycles;
        $json['deleted_at']     = $this->deletedAt;

        return $json;
    }
}
