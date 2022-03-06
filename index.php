<?
$secretfile = file_get_contents("secret.json");
$secret = json_decode($secretfile, true);

$id = parse_url($_SERVER['REQUEST_URI'], PHP_URL_QUERY);

class disgd_users {
    public function get($id) {
        global $secret;
        $url = "https://discord.com/api/v9";
        $curl = curl_init($url);

        curl_setopt($curl, CURLOPT_URL, $url.'/users/'.$id);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        $headers = array(
            "Authorization: Bot ".$secret["bot_token"],
            );
            curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);

        $resp = curl_exec($curl);
        curl_close($curl);
        return $resp;
    }
}
$disgd_users = new disgd_users;
echo $disgd_users->get($id);
?>