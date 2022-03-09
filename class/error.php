<?php 
class errorhandler {
    public function invalid_ID() {
        header('Location: /?err=invalid_id');
        exit();
    }
};
?>