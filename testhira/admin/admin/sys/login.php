<!DOCTYPE html>
<html >
<head>
  <meta charset="UTF-8">
  <title>Master Login</title>
<!--  //<link rel="shortcut icon" href="favicon/1496827652.ico">-->
  
   <link rel="shortcut icon" href="assets/images/favicon_1.ico">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/meyer-reset/2.0/reset.min.css">

  <link rel='stylesheet prefetch' href='https://fonts.googleapis.com/css?family=Roboto:400,100,300,500,700,900'>
<link rel='stylesheet prefetch' href='https://fonts.googleapis.com/css?family=Montserrat:400,700'>
<link rel='stylesheet prefetch' href='https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css'>

      <link rel="stylesheet" href="css/style.css">

  
</head>

<body>
  
<div class="container" style="margin-bottom: 2%">
    <div class="info" style="margin-bottom: 0%">
      <img src="Untitled-1.png" width="280" height="150"/>
  </div>
</div>
    <div class="form" style="margin-top: 0%">
  <div class="thumbnail"><img src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/169963/hat.svg"/></div>
  
  <form class="login-form" method="post" action="backend/login.php">
    <div class="form-group ">
                            <div class="col-xs-12">
                                <input class="form-control" type="text" name="un" required="" placeholder="Username">
                            </div>
                        </div>
    <div class="form-group">
                            <div class="col-xs-12">
                                <input class="form-control" type="password" name="pw" required="" placeholder="Password">
                            </div>
                        </div>
      <button type="submit">login</button>
    
  </form>
</div>

  <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>

    <script src="js/index.js"></script>
    
    
    
    
    

</body>
</html>
