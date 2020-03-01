<!DOCTYPE html>
<html lang="en">
<head>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<nav class="navbar navbar-expand-sm bg-danger navbar-dark">
        <ul class="navbar-nav">
            <li class="nav-item Active">
              <a class="nav-link" href="movie.php">Movie entry</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="search.php">Movie search</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="update.php">Movie edit</a>
            </li>
            <li class="nav-item">
            <a class="nav-link" href="delete.php">Movie delete</a>
          </li>
          </ul>
    </nav>
    <form method="POST">
    <table class="table">
    <tr>
    <td>
     Movie name:
    </td>
    <td>
    <input type="text" class="form-control" name="getMovieName">
    </td>
    <tr>
    <td>

    </td>
    <td>
    <button type="submit" class="btn btn-warning" name="submit">
    Movie Details
    </button>
    </td>
    </tr>
    </tr>
    </table>
    </form>
</body>
</html>
<?php
if(isset($_POST["submit"]))
{
    $Movie=$_POST["getMovieName"];
    $Servername="localhost";
    $Dbusername="root";
    $Dbpassword="";
    $Dbname="mydb";
    $Connection=new mysqli($Servername,$Dbusername,$Dbpassword,$Dbname);

    $sql="SELECT  `actor`, `actress`, `director`, `camera`, `producer`,
     `distributer`, `releasedyear` FROM `movies` WHERE `moviename`='$Movie'";
     $result=$Connection->query($sql);
     if($result->num_rows>0)
     {
        while($row=$result->fetch_assoc())
        {
            $Actor=$row["actor"];
            $Accttress=$row["actress"];
            $Director=$row["director"];
            $Camera=$row["camera"];
            $Producer=$row["producer"];
            $Distributer=$row["distributer"];
            $Release=$row["releasedyear"];
            echo"<form method='POST'><table class='table'> 
            <tr> <td> Actor </td> <td> <input type='text' value='$Actor' class='form-control' name='Actor'/> </td> </tr>
            <tr> <td> actress </td> <td> <input type='text' value='$Accttress' class='form-control' name='Accttress'/> </td> </tr>
            <tr> <td> director </td> <td> <input type='text' value='$Director' class='form-control' name='Director'/> </td> </tr>
            <tr> <td> camera </td> <td> <input type='text' value='$Camera' class='form-control' name='Camera'/> </td> </tr>
            <tr> <td> producer </td> <td> <input type='text' value='$Producer' class='form-control' name='Producer'/> </td> </tr>
            <tr> <td> distributer </td> <td> <input type='text' value='$Distributer' class='form-control' name='Distributer'/> </td> </tr>
            <tr> <td> releasedyear </td> <td> <input type='text' value='$Release' class='form-control' name='Releasedyr'/> </td> </tr>
            <tr> <td> </td> <td> <button type='sumbit' class='btn btn-success' value='$Movie' name='upsubmit'>
            Update </button> </td> </tr> </form>";
        }

     }
     else{
         echo "invalid";
     }

}
if(isset($_POST["upsubmit"]))
{
    $UpActor=$_POST["Actor"];
    $UpAccttress=$_POST["Accttress"];
    $UpDirector=$_POST["Director"];
    $UpCamera=$_POST["Camera"];
    $UpProducer=$_POST["Producer"];
    $UpDistributer=$_POST["Distributer"];
    $Uprelease=$_POST["Releasedyr"];
    $Upname=$_POST["upsubmit"];
    
    $Servername="localhost";
    $Dbusername="root";
    $Dbpassword="";
    $Dbname="mydb";
    $connection=new mysqli($Servername,$Dbusername,$Dbpassword,$Dbname);
    $sql="UPDATE `movies` SET `actor`='$UpActor',`actress`='$UpAccttress',`director`='$UpDirector',`camera`='$UpCamera',`producer`='$UpProducer',
    `distributer`='$UpDistributer',`releasedyear`=$Uprelease WHERE `moviename`='$Upname'";
    $result=$connection->query($sql);
    if($result===TRUE)
    {
        echo "success";
    }
    else{
        echo "error";
    }


}

?>