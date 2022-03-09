<?php
class errorhandler {
    public function exception($exception) {
        $exception = preg_match_all('/(?(?=ERR:)[0-9A-Z:_-]*)/i', $exception, $matches);
        return $exception[0];
    }
}