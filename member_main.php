<?php
    $path = 'dir1/myfile.php';
    echo basename($path) . '<br>';
    echo basename($path, '.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" type="text/css" href="main.css">
    <title>The Book Club Member Main</title>
</head>
<body>
    <div class="main_div">
        <div class="content_div">
        <h1 class="center">The Book Club Member Main Page</h1>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Provident recusandae laboriosam magnam voluptate architecto quae inventore laudantium maxime vel fugit ullam accusamus enim est, placeat, itaque iusto error tempore qui.</p>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. In vitae recusandae provident voluptatem ipsam quisquam nulla, odio labore velit exercitationem optio eligendi quos, eaque, quaerat quas autem aspernatur! Voluptatibus, accusantium?</p>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. In vitae recusandae provident voluptatem ipsam quisquam nulla, odio labore velit exercitationem optio eligendi quos, eaque, quaerat quas autem aspernatur! Voluptatibus, accusantium?</p>
        </div>
        <div>    
            <p class="center"><i>Uppload CSV-file to retreive book-data</i></p>
            <form action="upload.php" method="post" enctype="multipart/form-data" class="center">
            <input type="file" name="fileToUpload" id="fileToUpload">
            <input type="submit" value="Upload file" name="submit">
            </form>
    
            <!-- <h3 class="center">Current Chuck Norris Joke: </h3><p class="center"> -->
            <?php 
            //$url = 'http://api.icndb.com/jokes/random?';
    
            //$file_content = file_get_contents($url);
            
            // var_dump($file_content);
            
            //$jokes = json_decode($file_content);
            
            // $sek = $currency->rates->USD;
            
            //$theJoke = ($jokes->value->joke);
            //echo ($theJoke);
            ?>
            <!-- <br><br><h3 class="center">Current authors in file: </h3><p class="center"> -->
            
            <?php
            
            // $url = 'https://apicrudproject.000webhostapp.com/Authors/read.php/?apikey=5ce1642337e67';

            // $file_content_auth = file_get_contents($url);
            
            // print_r($file_content_auth);

            // echo json_decode($file_content_auth);

            // echo ($authors);

             ?>
            </p>

        </div>        
    </div>
</body>
</html>