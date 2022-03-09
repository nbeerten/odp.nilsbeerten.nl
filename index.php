<?php
    // Import Classes
    require_once $_SERVER['DOCUMENT_ROOT'].'/class/BitwiseHandler.php'; // For "decoding" the user flags
    require_once $_SERVER['DOCUMENT_ROOT'].'/class/handler.php'; // For general error handling
    require_once $_SERVER['DOCUMENT_ROOT'].'/class/disgd.php'; // Discord API communication

    //* Create instances
    $disgd = new disgd; //* Discord API connection
    $handler = new handler; //* Error handling and key validation
    $bitwisehandler = new BitwiseHandler; //* "Decoding" user flags
    
    //* Get url query for and validate
    $id = $handler->obj_userid($_GET['id']);

    //* Get the data
    $disgd_user = $disgd->get_users($id);

    if(isset($disgd_user['code'])) {
        echo "404";
        exit;
    }

    //* "Decoding" user flags
    $userflags = $bitwisehandler->get($disgd_user['public_flags']);
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
