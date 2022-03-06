<?
class secrets {
    protected function bot_token(){
        $secretfile = file_get_contents("secret.json");
        $secret = json_decode($secretfile, true);
        return $secret["bot_token"];
    }
}


$id = parse_url($_SERVER['REQUEST_URI'], PHP_URL_QUERY);

class disgd extends secrets {
    public function get_users($id) {
        $url = "https://discord.com/api/v9";
        $curl = curl_init($url);

        curl_setopt($curl, CURLOPT_URL, $url.'/users/'.$id);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        $headers = array(
                       "Authorization: Bot ".$this->bot_token(),
                   );
        curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);

        $resp = curl_exec($curl);
        curl_close($curl);
        return $resp;
    }
}
$disgd = new disgd;
echo $disgd->get_users($id);
?>