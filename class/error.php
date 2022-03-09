<?php
class errorhandler {
    public function exception($exception) {
        if(str_contains($exception, 'ERR:INVALID_ID')) {
            return 'Invalid ID';
        }

        else {
            return 'Unknown error occured';
        }
    }
}