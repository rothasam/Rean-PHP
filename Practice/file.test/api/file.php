<?php

    $name = strval($_POST['name']); // name is the key from form date
    $photo  = $_FILES['photo'];
    print_r($photo);

    $path = pathinfo($photo['name']);

    $fileName = uniqid() . '.' . $path['extension'];  // generate a unique id for image file name + its original extension 

    /*
    output :
        Array(
            [name] => painting-woman-s-portrait.jpg
            [full_path] => painting-woman-s-portrait.jpg   // validate this later to prevent user from uploading any other file or folder
            [type] => image/jpeg
            [tmp_name] => C:\xampp\tmp\php1E70.tmp         // save this fileTemporary into folder storage
            [error] => 0
            [size] => 1056706
        )
    */

    if(!is_dir('../storage')){
        mkdir('../storage');
    }

    copy($photo['tmp_name'], '../storage/' . $fileName); 

    echo json_encode([
        'result' => true,
        'message' => 'Save hz hz'
    ]);

    // MIME file ?
?>