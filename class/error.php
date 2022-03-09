<?php
class errorhandler {
    public function exception($exception) {
        if(str_contains($exception, 'ERR:INVALID_ID')) {
            return 'Invalid ID';
        }

        if(str_contains($exception, 'ERR:UNKNOWN_ID')) {
            return 'Unknown ID';
        }

        else {
            return 'Unknown error occured';
        }
    }
}