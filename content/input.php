<!doctype html>
<html lang="en">
	<head>
        <!-- Required meta tags -->
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">

        <title>ODP</title>
        <link rel="icon" href="/assets/favicon.png" type="image/x-icon"/>

		<!-- Custom CSS-->
		<link rel="stylesheet" href="/css/input.css">
        <link rel="stylesheet" href="/css/bootstrap-reboot.min.css">
        <link href="/assets/fa/css/fontawesome.min.css" rel="stylesheet">
        <link href="/assets/fa/css/brands.min.css" rel="stylesheet">
        <link href="/assets/fa/css/solid.min.css" rel="stylesheet">
    </head>
    <body>
        <main>
            <div class="nb-odp-main">
                <div class="nb-odp-box">
                    <div class="nb-odp-banner">
                        <div class="nb-odp-logo"></div>
                        <h1>OpenDiscordProfile</h1>
                    </div>
                    <div class="nb-odp-contents">
                        <div class="nb-odp-lookupsection">
                            <h2>Look up a profile</h2>
                            <div class="nb-odp-input">
                                <input id="odpinput" placeholder="User ID">
                                <button id="odpsubmit"><i class="fa-solid fa-magnifying-glass"></i></button>
                            </div>
                        </div>
                        <span id="odperror"></span>
                    </div>
                    <div class="nb-odp-contents">
                        <div class="nb-odp-info">
                            <h3>Help & FAQ</h3>
                            <ul>
                                <li><a href="https://support.discord.com/hc/en-us/articles/206346498" target="_blank" rel="noopener">Get user ID</a></li>
                                <li><a href="https://github.com/nbeerten/odp.nilsbeerten.nl/wiki/Q:-Why-doesnt-%5Bx%5D-badge-show-up%3F" target="_blank">Why doesnt [x] badge show up?</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="nb-odp-footer">
                        <div class="nb-odp-credits">
                            <p>©<script>document.write(new Date().getFullYear())</script> <a href="https://nilsbeerten.nl" target="_blank">Nils Beerten</a></p>
                        </div>
                        <div class="nb-odp-links">
                            <a href="https://github.com/nbeerten/odp.nilsbeerten.nl" target="_blank" rel="noopener"><i class="fa-brands fa-github"></i></a>
                            <a href="https://odp.nilsbeerten.nl/543059753669230623/" target="_blank"><i class="fa-brands fa-discord"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </main>
        <script src="/js/input.js" type="application/javascript"></script>
    </body>
</html>