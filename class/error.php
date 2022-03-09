<?php
class errorhandler {
    public function exception($exception) {
        $exception = preg_match('/(?(?=ERR:)[0-9A-Z:_-]*)/i', $exception, $matches)[0];
        return $exception;
    }
}