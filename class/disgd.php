<?php
    class secrets {
        //* Get bot_token from secret.json (Secrets file)
        protected function bot_token(){
            $secretfile = file_get_contents($_SERVER['DOCUMENT_ROOT']."/secret.json");
            $secret = json_decode($secretfile, true);
            return $secret["bot_token"];
        }
    }

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
            
            if(curl_errno($curl) !== 0) {
                throw new Error('ERR:CURL'.curl_error($curl));
            }

            curl_close($curl);
            return $resp;
        }

        //* Get the user object using the `/users/{user.id}` type
        public function get_users($id) {
            try {
                $resp = $this->call_API("/users/", $id);
                $data = json_decode($resp, true);

                if(isset($data['code'])) {
                    throw new Error('ERR:UNKNOWN_ID '.$data['message']);
                }
                
                return (array)$data;
            } catch (Error $e) {
                throw new Error($e);
            };
        }
    }
?>