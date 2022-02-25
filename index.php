<?php
    require_once "class/site.class.php";
    $site = new Site;
    $site
         ->set_password("mypassword123")
         ->try_login();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="assets/css/global.min.css?v=6">
</head>
<body>
    <div class="website-container">
        <form method="post" class="container--form-box" spellcheck="false">
            <div class="form--box-title">My secret website</div>
            <input type="password" name="password" class="form-box--input" placeholder="Enter secret passphrase...">
            <button class="form--box-button">Log in</button>
            <?php 
                if ($error = $site->has_error()){
                    echo <<<HTML
                        <div class="error-message">$error->message</div>
                    HTML;
                } else {
                    if ($site->login_success()){
                        echo <<<HTML
                            <div class="success-message">Login success</div>
                            <!-- redirecting the user to the next page -->
                            <script type="text/javascript">
                                let     next_page = "http://terrorist.test"    // the page where the user will be redirected
                                let     seconds   = 1   // seconds to redirect the user

                                // setting the timer
                                setTimeout(() => {
                                    // redirecting the user
                                    window.location.href = next_page
                                }, (1000 * seconds))
                            </script>
                        HTML;
                    }
                }
            ?>
        </form>
    </div>
    <video class="background-video" autoplay muted loop><source type="video/mp4" src="assets/img/Untitled2.mp4" /></video>
    <div class="background-video--dim"></div>
</body>
</html>