<?php
    $k=$_POST["key"] ;
    if ($k=="Djerba" or $k=="Monastir" or $k=="Tozeur") {
    echo '
    <script>
    window.location="../dest/'.$k.'/home/home.html";
    </script>';
    }
    else{
        echo '
        <script>
        window.location="404.php";
        </script>' ;
    }

?>