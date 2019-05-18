<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Register account</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="main.css">
    <script src="main.js"></script>
</head>
<body>
<div id="main_div">
    <div class="center">
    <h2>Register to become member of The Book Club!</h2>
        <p><i>Fill in the form to become member:</i></p>
        <div id="reg_form">
            <form method="POST" action="register.php">
            <input type="text" name="customerName"><caption><i> Name</i></caption><br><br>
            <input type="text" name="userName"><caption><i> Username</i></caption><br><br>
            <input type="text" name="passWord"><caption><i> Password</i></caption><br><br>
            <input type="submit" name="Skicka" value="Create account"><caption><br><br><i> GDPR: By submitting this form you agree to allowing The Book Club to keep and handle your name and adress info! </i></caption><br>   
            </form><br>
        </div>
        
    </div>    
</div>    
</body>
</html>