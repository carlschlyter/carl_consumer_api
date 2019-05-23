<?php
    // $path = 'dir1/myfile.php';
    // echo basename($path) . '<br>';
    // echo basename($path, '.php') . '<br>';
    // echo dirname($path) . '<br>';
    // echo file_exists('csvdummy.csv') . '<br>';
    // echo realpath('csvdummy.csv') . '<br>';
    // echo is_file('csvdummy.csv') . '<br>';
    // echo is_writable('csvdummy.csv'). '<br>';
    // echo is_readable('csvdummy.csv'). '<br>';
    // echo filesize('csvdummy.csv') . '<br>';
    // $handle = fopen('csvdummy.csv', 'r'); 
    // $data = fread($handle, filesize('csvdummy.csv'));
    // fclose($handle);
    // echo $data;
    // $handle = fopen('csvdummy2.csv', 'w'); 
    // $item = '888888';
    // fwrite($handle, $item);
    // fclose(); 
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
            <form action="member_main.php" method="post" enctype="multipart/form-data" class="center">
            <input type="file" name="fileToUpload" id="fileToUpload">
            <input type="submit" value="Upload file" name="submit">
            </form>
    
            <!-- <h3 class="center">Current Chuck Norris Joke: </h3><p class="center"> -->
    <pre>
    <?php 
            //Lektion
    // var_dump($_FILES);
    if (isset($_FILES)) {
        $check = true;
    
        if ($_FILES['fileToUpload']['type'] !== 'application/vnd.ms-excel'){
     
            $check = false;
        } 

        if ($check){
            // $path = realpath('./') . '/uploads/bookstest.csv';
            $path = realpath('./') . '/uploads/' . $_FILES['fileToUpload']['name'];
            // echo ($path . '/uploads/');
            // print_r($_FILES['fileToUpload']['tmp_name']);
            move_uploaded_file($_FILES['fileToUpload']['tmp_name'], "$path");
        }
    }
    
    $filename = $path;
    $books = [];
    $books[] = ['Isbn', 'Title', 'Author'];
    if ($file_handle = fopen($filename, 'r')) {
         while ($data = fgetcsv($file_handle, 100, ',')){
            // var_dump($data[0]);
            $books[] = complete_book($data[0]);
         }
         fclose($file_handle);
    }

    // var_dump($books);

    if($books){
        $file_to_write = fopen('uploads/new_books.csv', 'w');

        $all_is_good = true;

        foreach($books as $book){
            // $book = complete_book($book[0]);
            $all_is_good = $all_is_good && fputcsv($file_to_write, $book, ';');
            
        }
        fclose($file_to_write);

        if ($all_is_good){
            echo '<a href="uploads/new_books.csv">All is good!</a>';
        } else {
            echo 'Something happened';
        }
    }

    function complete_book($isbn)
    {
        // var_dump($isbn);
        $book = [];
        $book[0] = $isbn;
        $book[1] = 'Da Vinci Code';
        $book[2] = 'Dan Brown'; 
    
        return $book;    
    }



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
            <!-- </p> -->

        </div>        
    </div>
</body>
</html>