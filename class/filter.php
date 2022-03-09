<?php 
class filter {
    public function userid($query) {
        if(preg_match('/([0-9]{17,18})/', $query)) {
            preg_match('/([0-9]{17,18})/', $query, $matches);
            $id = $matches[1];
            return $id;
        } else {
            throw new Exception('Invalid ID');
        }
    }
};
?>