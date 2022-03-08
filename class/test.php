<? 
require_once 'BitwiseHandler.php';

$bitwise = new BitwiseHandler;
echo json_encode($bitwise->get(640));
?>