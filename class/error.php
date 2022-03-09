<?php
class errorhandler {
    public function exception($exception) {
        if(str_contains($exception, 'ERR:INVALID_ID')) {
            echo 'Invalid ID';
        }
    }
}