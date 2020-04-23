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
    
    <pre>
    <?php 

    //Check if there is an uploaded file of the csv type and in that case move it from the temp folder to the
    //uploads folder within this project. 
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

    //Create the empty array, "$books", fill it first with the captions of each column in the new file to be. 
    //Then open the uploaded file for reading and if there is csv data in it, put it in the $data variable
    //and use the complete_book function to put the csv data in the $books array on the index 0 position, being 
    //the isbn column.   
    $filename = $path;
    $books = [];
    $books[] = ['Isbn', 'Title', 'Author Id', 'Publisher ID', 'Pages'];
    print_r($books);

    if ($file_handle = fopen($filename, 'r')) {
        while ($data = fgetcsv($file_handle)){
            $books[] = complete_book($data[0]);  
            print_r($data);           
        }
        fclose($file_handle);
    }

    print_r($books);

    //If there now is a $books array at all, create a new file in the uploads folder, "new_books.csv", and open it 
    //for writing. Loop through each book in the $books array and use the complete_book function to complete each book's
    //isb-number with more data from the api that the complete_book function is connected to.   
    if($books){
        $file_to_write = fopen('uploads/new_books.csv', 'w');

        $all_is_good = true;

        foreach($books as $book){
            // var_dump($book);
            // if($book[0] === '9789188743121'){
                // var_dump($book[0]);  
                // die;
                // $book[0] = complete_book($data[1]);

                $all_is_good = $all_is_good && fputcsv($file_to_write, $book, ';');
         
            // }
        }

        fclose($file_to_write);

            print_r($book);

        if ($all_is_good){
            ?><p class="center"><?php echo '<a href="uploads/new_books.csv">Your completed book file!</a>';?></p><?php
        } else {
            echo 'Something happened';
        }

    }

    
    //Complete book table
        function complete_book($isbn)
        {

        //Curl
        
        // $url = 'https://5ce8007d9f2c390014dba45e.mockapi.io/books/9789150943351';
        $url = 'http://localhost/projects/rest_api2/index.php?books';
        // $url = 'http://api.icndb.com/jokes';
        // $url = 'postman.stellasinawebb.se/api/book_api/read.php?apiKey=5cdc665eac26c';
        // $url = 'https://apicrudproject.000webhostapp.com/Books/read.php/?apikey=5ce1642337e67';
        // $url ='http://localhost/projects/rest_api2/index.php?books';

        $ch = curl_init($url);

        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        $response = curl_exec($ch);

        curl_close($ch);

        // print_r($response);

        $book_arr = (json_decode($response, true));

        // var_dump($book_arr);
        
        // $book_title = ($book_arr['title']);

            // var_dump($isbn);
            $book = [];
            $book[0] = $isbn;
            $book[1] = $book_arr[0]['bookTitle']; 
            $book[2] = $book_arr[0]['authorId'];
            // $book[3] = $book_arr[0]['publisher_id'];
            // $book[4] = $book_arr[0]['pages'];
            // $book[0] = 'Kalle';
            // $book[1] = 'KajsaStina'; 
            // $book[2] = 'Knatte';
            $book[4] = 'Tjatte';
            $book[5] = 'Fnatte';
            return $book;               

        }    

    
    ?>

        </div>        
    </div>
</body>
</html>