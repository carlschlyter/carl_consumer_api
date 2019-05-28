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
<body id="mem_body">
    <div class="main_div">
        <div class="content_div">
        <h1 class="center">The Book Club Member Main Page</h1>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Provident recusandae laboriosam magnam voluptate architecto quae inventore laudantium maxime vel fugit ullam accusamus enim est, placeat, itaque iusto error tempore qui.</p>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. In vitae recusandae provident voluptatem ipsam quisquam nulla, odio labore velit exercitationem optio eligendi quos, eaque, quaerat quas autem aspernatur! Voluptatibus, accusantium?</p>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. In vitae recusandae provident voluptatem ipsam quisquam nulla, odio labore velit exercitationem optio eligendi quos, eaque, quaerat quas autem aspernatur! Voluptatibus, accusantium?</p>
        </div>
        <div>    
            <p class="center"><i>Upload CSV-file to retreive book-data (Price:USD1)</i></p>            
            <form action="member_main.php" method="post" enctype="multipart/form-data" class="center">
            <input type="file" name="fileToUpload" id="fileToUpload">
            <input type="submit" value="Upload file" name="submit">
            </form>
    
            <!-- <h3 class="center">Current Chuck Norris Joke: </h3><p class="center"> -->
    <pre>
    <?php 

    
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
    $books[] = ['Isbn', 'Title', 'Author Id', 'Publisher ID', 'Pages'];

    if ($file_handle = fopen($filename, 'r')) {
        while ($data = fgetcsv($file_handle)){
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
            if($book[0] === '9789150943351'){
                // var_dump($book[0]);
                // die;
                // $book = complete_book($book[0]);
            $all_is_good = $all_is_good && fputcsv($file_to_write, $book, ';');         
            }

        }



        fclose($file_to_write);

        if ($all_is_good){
            ?><p class="center"><?php echo '<a href="uploads/new_books.csv">Your completed book file!</a>';?></p><?php
        } else {
            echo 'Something happened';
        }

    }


    // new curl test

    
    //Complete book table
    function complete_book($isbn)
    {

        //Curl
    
    $url = 'https://5ce8007d9f2c390014dba45e.mockapi.io/books/9789150943351';
    // $url = 'http://api.icndb.com/jokes';
    // $url = 'postman.stellasinawebb.se/api/book_api/read.php?apiKey=5cdc665eac26c';
    // $url = 'https://apicrudproject.000webhostapp.com/Books/read.php/?apikey=5ce1642337e67';
    // $url ='http://localhost/projects/rest_api2/index.php?books'

    $ch = curl_init($url);

    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    // curl_setopt($ch, CURLOPT_HTTPHEADER, ['content-type: application/json']);

    // Configuring curl options
    // $options = array(
    //     CURLOPT_RETURNTRANSFER => true,
    //     CURLOPT_HTTPHEADER => array('Content-type: application/json'),
    //     CURLOPT_POSTFIELDS => $url
    //     );

    // Setting curl options
    // curl_setopt_array($ch, $options);

    $response = curl_exec($ch);

    curl_close($ch);

    // var_dump($response);

    $book_arr = (json_decode($response, true));

    // var_dump($book_arr);
    
    // $book_title = ($book_arr['title']);

        // var_dump($isbn);
        $book = [];
        $book[0] = $isbn;
        $book[1] = $book_arr['title'];
        $book[2] = $book_arr['author_id']; 
        $book[3] = $book_arr['publisher_id'];
        $book[4] = $book_arr['pages'];
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