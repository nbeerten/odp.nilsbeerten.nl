<?php
// Import Classes
require_once $_SERVER['DOCUMENT_ROOT'].'/class/BitwiseHandler.php'; // For "decoding" the user flags

    class secrets {
        //* Get bot_token from secret.json (Secrets file)
        protected function bot_token(){
            $secretfile = file_get_contents("secret.json");
            $secret = json_decode($secretfile, true);
            return $secret["bot_token"];
        }
    }

    //* Get url query for and validate
    preg_match('/([0-9]{0,18})/', $_SERVER['QUERY_STRING'], $matches);
    $id = $matches[1];

    class disgd extends secrets {
        //* Make an API call to Discord API
        protected function call_API($type, $id) {
            $url = "https://discord.com/api/v9";
            $curl = curl_init($url);

            curl_setopt($curl, CURLOPT_URL, $url.$type.$id);
            curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
            $headers = array(
                        "Authorization: Bot ".$this->bot_token(),
                    );
            curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);

            $resp = curl_exec($curl);
            curl_close($curl);
            return $resp;
        }

        //* Get the user object using the `/users/{user.id}` type
        public function get_users($id) {
            $resp = $this->call_API("/users/", $id);
            $data = $resp;
            return $data;
        }
    }

    //* Create instances
    $disgd = new disgd; //* Discord API connection
    echo $disgd->get_users($id);
    // $bitwisehandler = new BitwiseHandler; //* "Decoding" user flags

    // //* Get the data
    // $disgd_user = $disgd->get_users($id);

    // if($disgd_user)

    // //* "Decoding" user flags
    // $userflags = $bitwisehandler->get($disgd_user['public_flags']);
?>
