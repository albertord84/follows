<?php
/*
 * MundiAPILib
 *
 * This file was automatically generated by APIMATIC v2.0 ( https://apimatic.io ).
 */

namespace MundiAPILib\Models;

use JsonSerializable;

/**
 * Generic response object for getting a transaction.
 *
 * @discriminator transaction_type
 * @discriminatorType transaction
 */
class GetTransactionResponse implements JsonSerializable
{
    /**
     * Gateway transaction id
     * @required
     * @maps gateway_id
     * @var string $gatewayId public property
     */
    public $gatewayId;

    /**
     * Amount in cents
     * @required
     * @var integer $amount public property
     */
    public $amount;

    /**
     * Transaction status
     * @required
     * @var string $status public property
     */
    public $status;

    /**
     * Indicates if the transaction ocurred successfuly
     * @required
     * @var bool $success public property
     */
    public $success;

    /**
     * Creation date
     * @required
     * @maps created_at
     * @var string $createdAt public property
     */
    public $createdAt;

    /**
     * Last update date
     * @required
     * @maps updated_at
     * @var string $updatedAt public property
     */
    public $updatedAt;

    /**
     * Number of attempts tried
     * @required
     * @maps attempt_count
     * @var integer $attemptCount public property
     */
    public $attemptCount;

    /**
     * Max attempts
     * @required
     * @maps max_attempts
     * @var integer $maxAttempts public property
     */
    public $maxAttempts;

    /**
     * Splits
     * @required
     * @var GetSplitResponse[] $splits public property
     */
    public $splits;

    /**
     * Date and time of the next attempt
     * @maps next_attempt
     * @var string|null $nextAttempt public property
     */
    public $nextAttempt;

    /**
     * @todo Write general description for this property
     * @maps transaction_type
     * @var string|null $transactionType public property
     */
    public $transactionType;

    /**
     * Constructor to set initial or default values of member properties
     * @param string  $gatewayId       Initialization value for $this->gatewayId
     * @param integer $amount          Initialization value for $this->amount
     * @param string  $status          Initialization value for $this->status
     * @param bool    $success         Initialization value for $this->success
     * @param string  $createdAt       Initialization value for $this->createdAt
     * @param string  $updatedAt       Initialization value for $this->updatedAt
     * @param integer $attemptCount    Initialization value for $this->attemptCount
     * @param integer $maxAttempts     Initialization value for $this->maxAttempts
     * @param array   $splits          Initialization value for $this->splits
     * @param string  $nextAttempt     Initialization value for $this->nextAttempt
     * @param string  $transactionType Initialization value for $this->transactionType
     */
    public function __construct()
    {
        if (11 == func_num_args()) {
            $this->gatewayId       = func_get_arg(0);
            $this->amount          = func_get_arg(1);
            $this->status          = func_get_arg(2);
            $this->success         = func_get_arg(3);
            $this->createdAt       = func_get_arg(4);
            $this->updatedAt       = func_get_arg(5);
            $this->attemptCount    = func_get_arg(6);
            $this->maxAttempts     = func_get_arg(7);
            $this->splits          = func_get_arg(8);
            $this->nextAttempt     = func_get_arg(9);
            $this->transactionType = func_get_arg(10);
        }
    }


    /**
     * Encode this object to JSON
     */
    public function jsonSerialize()
    {
        $json = array();
        $json['gateway_id']       = $this->gatewayId;
        $json['amount']           = $this->amount;
        $json['status']           = $this->status;
        $json['success']          = $this->success;
        $json['created_at']       = $this->createdAt;
        $json['updated_at']       = $this->updatedAt;
        $json['attempt_count']    = $this->attemptCount;
        $json['max_attempts']     = $this->maxAttempts;
        $json['splits']           = $this->splits;
        $json['next_attempt']     = $this->nextAttempt;
        $json['transaction_type'] = $this->transactionType;

        return $json;
    }
}
