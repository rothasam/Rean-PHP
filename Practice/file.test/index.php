<?php
    // echo __DIR__ . '<br>'; // return current file path 
    // echo __FILE__ . '<br>'; // return file name that we're currently working on (include its file path)

    // $file = is_dir('storage'); // if file exists return 1(true) if not exists return nothing
    // echo $file ? "Mean" : "Ot mean";

    // mkdir("storage"); // make or create directory


    // if(!is_dir('data')){
    //     mkdir('data');
    // }

    // rmdir('storage'); // remove directory (make sure the directory doesn't contain any files)
    //                    // if there are any flies => Warning: rmdir(storage): Directory not empty 
    //                    // so we must remove those files before remove the folder     


    // file_put_contents(  // write string or content to file.  If the file doesn't exist => file automatically created 
    //     'storage/rotha.txt', 
    //     'HI!!' ,     // data or content
    //     FILE_APPEND  // flag
    // );

    // echo file_get_contents(
    //     'storage/rotha.txt'
    // );

    
    // unlink('storage/hey.txt');     // delete or free file from the directory or memory



    // echo file_exists('storage/hey.txt');  // similar to is_dir() but only for directories

    // $fileName = 'storage/hey.txt';
    // if(file_exists($fileName)){
    //     unlink($fileName);
    // }


    // copy('storage/rotha.txt', 'rotha.txt');


    // rename('rotha.txt','yii.txt')


    // rename('storage/hey.txt', 'hello.txt');  // rename and move it outside the directory

    $files = scandir('storage');
    // print_r($files); 
    /*
        one dot = current directory
        two dot = parent directory

    */ 

    foreach($files as $file){
        // echo $file;  // print each file 
        // echo "<br>";

        if(!($file == '.' || $file == '..') ){
            unlink('storage/', $file);  // remove all files
        }
    }
                                                   

    //  recurive function ?
?>