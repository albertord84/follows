<?php
/*
 * MundiAPILib
 *
 * This file was automatically generated by APIMATIC v2.0 ( https://apimatic.io ).
 */

namespace MundiAPILib\Models;

use JsonSerializable;

/**
 * Checkout card payment request
 */
class CreateCheckoutCardPaymentRequest implements JsonSerializable
{
    /**
     * Card invoice text descriptor
     * @maps statement_descriptor
     * @var string|null $statementDescriptor public property
     */
    public $statementDescriptor;

    /**
     * Payment installment options
     * @var CreateCheckoutCardInstallmentOptionRequest[]|null $installments public property
     */
    public $installments;

    /**
     * Constructor to set initial or default values of member properties
     * @param string $statementDescriptor Initialization value for $this->statementDescriptor
     * @param array  $installments        Initialization value for $this->installments
     */
    public function __construct()
    {
        if (2 == func_num_args()) {
            $this->statementDescriptor = func_get_arg(0);
            $this->installments        = func_get_arg(1);
        }
    }


    /**
     * Encode this object to JSON
     */
    public function jsonSerialize()
    {
        $json = array();
        $json['statement_descriptor'] = $this->statementDescriptor;
        $json['installments']         = $this->installments;

        return $json;
    }
}
