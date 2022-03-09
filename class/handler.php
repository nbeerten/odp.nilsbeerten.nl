<?php 
class handler {
    public function obj_userid($query) {
        if(preg_match('/([0-9]{17,18})/', $query)) {
            preg_match('/([0-9]{17,18})/', $query, $matches);
            $id = $matches[1];
            return $id;
        } elseif(isset($_GET['err'])) {

        } else {
            echo 'Invalid ID';
            exit();
        }
    }
};
?>