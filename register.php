<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Register account</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="main.css">
    <!-- <script src="main.js"></script> -->
</head>
<body>
<div id="main_div">
    <div class="content_div">
        <h2 class="center">Register to become member of The Book Club!</h2>
        <p class="center"><i>Fill in the form to become member:</i></p>
    </div>
    <div id="reg_form_div">
            <form method="POST" action="member_main.php" class="reg_form">
            <caption><i> Name &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</i></caption><input type="text" name="customerName"><br><br>
            <caption><i> Username </i></caption><input type="text" name="userName"><br><br>
            <caption><i> Password &nbsp;</i></caption><input type="text" name="passWord"><br><br>
            <input type="submit" name="Skicka" value="Create account"><caption><br><br><i> GDPR: By submitting this form you agree to allowing The Book Club to keep and handle your name and adress info! </i></caption><br>   
            </form><br>
    </div>    
</div>    
</body>
</html>