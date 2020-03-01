<?php
$r=array();
if(isset($_POST["getName"]))
{
    $Movie=$_POST["getName"];
    $Servername="localhost";
    $Dbusername="root";
    $Dbpassword="";
    $Dbname="mydb";
    $connection=new mysqli($Servername,$Dbusername,$Dbpassword,$Dbname);
    $sql="SELECT  `actor`, `actress`, `director`, `camera`, `producer`, `distributer`, `releasedyear` FROM `movies`where`moviename`='$Movie'";
    $result=$connection->query($sql);
    if($result->num_rows>0)
    {
        while($row=$result->fetch_assoc())
        {
            $r["data"][]=$row;
        }
        echo json_encode($r);
    }
    else{
        echo "no data";
    }
      
}
?>