<?php

namespace Orm;

use ActiveRecordInterface;

/**
 * ActiveRecord
 *
 * Abstract class that all child datbase models inherit from.
 *
 * Assume that this class contains boiler plate functionality for handling
 * database reads and writes and that the `save` method is fully implemented.
 */
abstract class ActiveRecord implements ActiveRecordInterface
{
    use ValueTypeChecker;

    protected $isModified = false;

    /**
     * Saves a models data to the database
     *
     * @return void
     */
    public function save(): void
    {
        // Assume a full working implementation
    }

    protected function setNumericField(&$field, $value): void
    {
        $this->isNumber($value);    // Throws exception if $value is not numeric

        if($value != $field){

            $field = $value;
            $this->isModified = true;
        }        
    }

    public function destroy(): void
    {
        // TODO: destroy row in DB
    }
}
