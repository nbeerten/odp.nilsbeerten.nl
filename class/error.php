<?php
class errorhandler {
    public function exception($exception) {
        $error = preg_match_all('/(?(?=ERR:)[0-9A-Z:_-]*)/i', $exception);
        return $error;
    }
}