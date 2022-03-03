<?php
    $connect = mysqli_connect('remotemysql.com','Lo1PDPIPiz','JNCgTGyPHC','Lo1PDPIPiz');
    if($connect){
        mysqli_query($connect, "SET NAMES 'UTF8'");
    }else{
        echo "Ket noi that bai!!!";
    }
?>  
