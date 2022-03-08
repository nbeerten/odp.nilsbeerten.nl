<?php
    class secrets {
        //* Get bot_token from secret.json (Secrets file)
        protected function bot_token(){
            $secretfile = file_get_contents("secret.json");
            $secret = json_decode($secretfile, true);
            return $secret["bot_token"];
        }
    }

    //* Get url query for and validate
    preg_match('/([0-9]{18})/', $_SERVER['QUERY_STRING'], $matches);
    $id = $_SERVER['QUERY_STRING'];

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
            $data = json_decode($resp, true);
            return (array)$data;
        }
    }

    //* Create disgd instance
    $disgd = new disgd;

    //* Get the data
    $disgd_user = $disgd->get_users($id);
    echo json_encode($disgd_user);
    echo $_SERVER['QUERY_STRING'];
?>
<!doctype html>
<html lang="en">
	<head>
        <!-- Required meta tags -->
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">

        <title><? echo $disgd_user['username']; ?> - ODP</title> 

		<!-- Custom CSS-->
		<link rel="stylesheet" href="/css/custom.css">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap-reboot.min.css">
    </head>
    <body>
        <main>
            <div class="nb-odp-main">
                <div class="nb-odp-profile">
                    <div class="nb-odp-profile-banner" style="background-color: #<? echo dechex($disgd_user['accent_color']); ?>;">
                        <div>
                            <? // Url for banner images is: https://cdn.discordapp.com/banners/{id}/{image}?size=desired_size ?>
                            <? if($disgd_user['banner'] !== null) { ?>
                                <img src="<? echo "https://cdn.discordapp.com/banners/".$disgd_user['id']."/".$disgd_user['banner']."?size=300"; ?>">
                            <? }; ?>
                        </div>
                    </div>
                    <div class="nb-odp-profile-name">
                        <div class="nb-odp-profile-picture">
                            <div class="nb-odp-profile-picture-pic">
                                <? // Url for banner images is: https://cdn.discordapp.com/avatars/{id}/{image} ?>
                                <? if($disgd_user['banner'] !== "") { ?>
                                    <img src="<? echo "https://cdn.discordapp.com/avatars/".$disgd_user['id']."/".$disgd_user['avatar']; ?>">
                                <? }; ?>
                            </div>
                            <div class="nb-odp-profile-picture-status">
                            </div>
                        </div>
                        <div class="nb-odp-profile-badges">
                            <div><img src="/assets/balancebadge.svg"></div>
                            <div><img src="/assets/nitrobadge.svg"></div>
                        </div>
                        <h1><? echo $disgd_user['username']."#".$disgd_user['discriminator']; ?></h1>
                    </div>
                    <div class="nb-odp-profile-usercontent">    
                        <div class="nb-odp-profile-divider"></div>
                    </div>
                    <div class="nb-odp-profile-addfriend">
                        <button>Copy Username#0000</button>
                    </div>
                </div>
            </div>
        </main>
    </body>
</html>
