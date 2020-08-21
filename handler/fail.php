<?php

	include "../config.php";



?>



<!DOCTYPE html>

<html lang="ru">

<head>

    <title>EQDonate</title>

    <meta charset="utf-8">

    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">

    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>

    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

    <link href="../css/main.css" rel="stylesheet">

</head>

<body id="LoginForm">

    <div class="container">

        <h1 class="form-heading"><a href = "https://vk.com/trynight">PROJECT_NAME</a></h1>

        <div class="login-form">

            <div class="main-div">

                <div class="panel">

                    <h2><?=$title;?></h2>

                    <p><?=$ftext1;?></p>

                </div>

                <div class="form-group">

                    <?=$ftext2;?>

                </div>

                <div class="form-group">

                    <?=$ftext3;?>

                </div>

            </div>

        </div>

    </div>

</body>

</html>