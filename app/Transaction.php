<?php

namespace yuridik;
use yuridik\Paycom\Format;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    public $timestamps = false;
    
    const TIMEOUT = 43200000;

    const STATE_CREATED = 1;
    const STATE_COMPLETED = 2;
    const STATE_CANCELLED = -1;
    const STATE_CANCELLED_AFTER_COMPLETE = -2;

    const REASON_RECEIVERS_NOT_FOUND = 1;
    const REASON_PROCESSING_EXECUTION_FAILED = 2;
    const REASON_EXECUTION_FAILED = 3;
    const REASON_CANCELLED_BY_TIMEOUT = 4;
    const REASON_FUND_RETURNED = 5;
    const REASON_UNKNOWN = 10;

    public function isExpired()
    {
        // todo: Implement transaction expiration check
        // for example, if transaction is active and passed TIMEOUT milliseconds after its creation, then it is expired
        return $this->state == self::STATE_CREATED && Format::datetime2timestamp($this->create_time) - time() > self::TIMEOUT;
    }
    public function cancel($reason)
    {
        // todo: Implement transaction cancelling on data store

        // todo: Populate $cancel_time with value
        $this->cancel_time = Format::timestamp2datetime(Format::timestamp());

        // todo: Change $state to cancelled (-1 or -2) according to the current state
        // Scenario: CreateTransaction -> CancelTransaction
        $this->state = self::STATE_CANCELLED;
        // Scenario: CreateTransaction -> PerformTransaction -> CancelTransaction
        if ($this->state == self::STATE_COMPLETED) {
            $this->state = self::STATE_CANCELLED_AFTER_COMPLETE;
        }

        // set reason
        $this->reason = $reason;

        // todo: Update transaction on data store
    }


}
