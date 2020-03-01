<?php
if(isset($_POST["getMovieName"]))
{
    $Movie=$_POST["getMovieName"];
    $ServerName="localhost";
    $DbUserName="root";
    $DbPassword="";
    $DBName="mydb";
    $connection=new mysqli($ServerName,$DbUserName,$DbPassword,$DBName);
    $sql="DELETE FROM `movies` WHERE `moviename`='$Movie'";
    $result=$connection->query($sql);
      if($result===TRUE)
      {
          $r["status"]="success";
      }
      else
      {
          $r["status"]="error";
      }
      echo json_encode($r);
}
?>