
<?php
    $str = '/Songs/Khmer/tnrm.mp3';
    $path = pathinfo($str);

    print_r($path); // output : Array ( [dirname] => /Songs/Khmer [basename] => tnrm.mp3 [extension] => mp3 [filename] => tnrm )

    echo '<br/>';
    echo $path['dirname'] . "<br>"; // output: /Songs/Khmer
    echo $path['basename'] . "<br>"; // output: tnrm.mp3
    echo $path['extension'] . "<br>"; // output: mp3
    echo $path['filename'] . "<br>"; // output: tnrm
    




    

?>
