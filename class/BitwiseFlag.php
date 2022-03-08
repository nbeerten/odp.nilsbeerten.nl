<?php
// Source: https://www.php.net/manual/en/language.operators.bitwise.php#108679

# BitwiseFlag.php

abstract class BitwiseFlag {
    protected $flags;

    /*
   * Note: these functions are protected to prevent outside code
   * from falsely setting BITS. See how the extending class 'User'
   * handles this.
   *
   */
    protected function isFlagSet($flag) {
        return (($this->flags >> $flag) == $flag);
    }
}
?>