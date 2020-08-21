

<?php

   include "./config.php";

   function isSteamID( $steamid ) {
      $regex = "/^STEAM_0:[01]:[0-9]{7,9}$/";
      return preg_match( $regex, trim( $steamid ) );
   }
   
   $steamid    = isset( $_GET['us_steamid'] ) ? $_GET['us_steamid'] : null;
   $amount     = isset( $_GET['oa'] ) ? intval( $_GET['oa'] ) : null;
   $order_id = 1;

   $sign = md5($id.':'.$amount.':'.$secret.':'.$order_id);

?>

<!doctype html>
<html lang="en">

<head>
   <meta charset="utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
   <link rel="stylesheet" href="css/main.css">
   <link rel="stylesheet" href="css/media.css">
   <link rel="stylesheet" href="css/bootstrap-grid.min.css">
   <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500&display=swap&subset=cyrillic" rel="stylesheet">
   <title>form</title>
</head>
<?php if ( $steamid && isSteamID($steamid) && $amount ) :?>
   <body>
        <div class="section h-100">
            <div class="container-fluid h-100">
                <div class="row justify-content-center align-items-center h-100">
                    <div class="col-auto">
                        <div class="pay">
                           <div class="col-auto Name">PROJECT NAME</div>
                           <div class="info col-auto">Аккаунт: <?php echo@$steamid; ?></div>
                           <div class="info col-auto">Сумма: <?php echo@$amount; ?> <?php echo@$data['currency']; ?></div>
                            
                           <form action='http://www.free-kassa.ru/merchant/cash.php' method='GET'>
                              <input type="hidden" name="us_steamid" value="<?=$steamid;?>" >
                              <input type="hidden" name="m" value="<?=$id;?>" >
                              <input type="hidden" name="oa" value="<?=$amount;?>" >
                              <input type="hidden" name="o" value="<?=$order_id;?>" >
                              <input type="hidden" name="s" value="<?=$sign;?>" >
                              <input type="submit" name="submit" value="Оплатить">
                           </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>
    <div class = 'text_container'>
        <div class = 'content_spacer'></div>
        <div class = 'content_spacer'></div>
    </div>
<?php else : ?>
<body>
   <div class="section h-100">
      <div class="container-fluid h-100">
         <div class="row justify-content-center align-items-center h-100">
            <div class="col-auto">
               <div class="pay">
                  <div class="col-auto Name">PROJECT NAME</div>
                  <form action="" name="form">
                     <input type="text"  name="us_steamid" placeholder="Введите SteamID">
                     <br>
                     <input type="number" name="oa" placeholder="Введите сумму">
                     <br>
                     <input type="submit" name="submit" value="Продолжить">
                  </form>
                  <div style="height: 0.75rem;"></div>
                  <a href="//showstreams.tv/"><img src="//www.free-kassa.ru/img/fk_btn/14.png" title="Бесплатный видеохостинг"></a>
               </div>
            </div>
         </div>
      </div>
   </div>
</body>
<?php endif ; ?>
</html>