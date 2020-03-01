<?php
if(isset($_POST["getMovieName"]))
{
    $Movie=$_POST["getMovieName"];
    $Actor=$_POST["getActorName"];
    $Acttress=$_POST["getActtressName"];
    $Director=$_POST["getDirectorName"];
    $Camera=$_POST["getCameraName"];
    $Producer=$_POST["getProducerName"];
    $Distributer=$_POST["getDistributerName"];
    $Released=$_POST["getReleasedYear"];
    $Servername="localhost";
    $Dbusername="root";
    $Dbpassword="";
    $Dbname="mydb";
    $connection=new mysqli($Servername,$Dbusername,$Dbpassword,$Dbname);
    $Sql="INSERT INTO `movies`( `moviename`, `actor`, `actress`, `director`, `camera`, `producer`, `distributer`, `releasedyear`)
     VALUES ('$Movie','$Actor','$Acttress','$Director','$Camera','$Producer','$Distributer',$Released)";
     $result=$connection->query($Sql);
     if($result===TRUE)
     {
     $r["status"]="success";
     }
     else{
     $r["status"]="error";
     }
     echo json_encode($r);
 
}
?>