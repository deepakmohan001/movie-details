<?php
    $r=array();
    $Servername="localhost";
    $Dbusername="root";
    $Dbpassword="";
    $Dbname="mydb";
    $connection=new mysqli($Servername,$Dbusername,$Dbpassword,$Dbname);
    $sql="SELECT `moviename`, `actor`, `actress`, `director`, `camera`, `producer`, `distributer`, `releasedyear` FROM `movies`";
    $result=$connection->query($sql);

    if($result->num_rows>0)
    {
      while($row=$result->fetch_assoc())
      {
        $r["data"][]=$row;
      }
      echo json_encode($r);
    }
    


?>