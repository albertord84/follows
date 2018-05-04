<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <title>DUMBU Account Confirmation!</title>
    </head>
    <body>
        <div style="width: 640px; font-family: Arial, Helvetica, sans-serif; font-size: 11px;">
            <h1>DUMBU Account Confirmation!</h1>
            <!--  <div align="center">
                <a href="https://github.com/PHPMailer/PHPMailer/"><img src="images/phpmailer.png" height="90" width="340" alt="PHPMailer rocks"></a>
              </div>-->
            <p>Hello, <strong><?php echo $_GET["username"]; ?></strong>:</p>
            <p>You just made the first step to sign in <a href="https://www.dumbu.one/dumbu/src/">Dumbu</a> services, congratulations! :D</p>
            <p>Your username in our system is: <strong><?php echo $_GET["instaname"]; ?></strong></p> 
            <p>Please, use the following code of 4 digits to continue your registration:</p>
            
            <h1><strong><?php echo $_GET["purchase_access_token"]; ?></strong></h1>
            
            <p>If you have any questions, please write us!</p>
            <p>Thank you for using our services,</p>
            <p>DUMBU SYSTEM</p>
        </div>
    </body>
</html>
