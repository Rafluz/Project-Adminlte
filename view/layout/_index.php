 <?php 
 session_start();
 if (empty(($_SESSION['user']))){
    echo"<center>
        <font color ='red'>gagalllll</font>
        </center>";
 } else{
        echo"<h1>Selamat Datang</h1>";
        echo"heloo".$_SESSION['user'];
 }
 ?>