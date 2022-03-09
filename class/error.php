<?php 
class error {
    public function invalid_ID() {
        header('Location: /?err=invalid_id');
        exit();
    }
};
?>