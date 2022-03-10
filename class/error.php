<?php
class errorhandler {
    public function exception($exception) {
        if(str_contains($exception, 'ERR:INVALID_ID')) {
            
        }

        if(str_contains($exception, 'ERR:UNKNOWN_ID')) {
            
        }

        else {
            return 'Unknown error occured';
        }
    }
}