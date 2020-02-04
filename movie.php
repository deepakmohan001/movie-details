<!DOCTYPE html>
<html lang="en">
<head>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
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
              <a class="nav-link" href="edit.php">Movie edit</a>
            </li>
            <li class="nav-item">
            <a class="nav-link" href="delete.php">Movie delete</a>
          </li>
          </ul>
    </nav>
    <form method="GET">
    <table class="table">
        <tr>
            <td>
                Movie name
            </td>
            <td>
                <input type="text"name="getMovieName"class="form-control">
            </td>
        </tr>
        <tr>
            <td>
                Actor name
            </td>
            <td>
                <input type="text"name="getActorName"class="form-control">
            </td>
        </tr>
        <tr>
            <td>
                Acttress
            </td>
            <td>
                <input type="text"name="getActtressName"class="form-control">
            </td>
        </tr>
        <tr>
            <td>
                Director
            </td>
            <td>
                <input type="text"name="getDirectorName"class="form-control">
            </td>
        </tr>
        <tr>
            <td>
                Camera
            </td>
            <td>
                <input type="text"name="getCameraName"class="form-control">
            </td>
        </tr>
        <tr>
            <td>
                Producer
            </td>
            <td>
                <input type="text"name="getProducerName"class="form-control">
            </td>
        </tr>
        <tr>
            <td>
                Distributer
            </td>
            <td>
                <input type="text"name="getDistributerName"class="form-control">
            </td>
        </tr>
        <tr>
            <td>
                Released year
            </td>
            <td>
                <input type="text"name="getReleasedYear"class="form-control">
            </td>
        </tr>
        <tr>
            <td>
                <button type="reset" class="btn btn-warning">
                    RESET
                </button>

            </td>
            <td>
                <button type="submit"name="submit" class=" btn btn-danger">
                    SUBMIT
                </button>
            </td>
        </tr>
    </table>
</form>
</body>
</html>
<?php
if(isset($_GET["submit"]))
{
    $Movie=$_GET["getMovieName"];
    $Actor=$_GET["getActorName"];
    $Acttress=$_GET["getActtressName"];
    $Director=$_GET["getDirectorName"];
    $Camera=$_GET["getCameraName"];
    $Producer=$_GET["getProducerName"];
    $Distributer=$_GET["getDistributerName"];
    $Released=$_GET["getReleasedYear"];
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
     echo "successfull";
     }
     else{
         echo $connection->error;
     }
 
}
?>