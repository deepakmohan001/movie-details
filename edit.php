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
    </nav>
    <form method="GET">
    <table class="table">

    <h2>
        Edit
    </h2>
    <form method="GET">
    <table class="table">
        <tr>
            <td>
                Released year
            </td>
            <td>
                <input type="text" class="form-control"name="getReleasedYear">
            </td>
        </tr>
        <tr>
            <td>

            </td>
            <td>
                <button type="submit" class="btn btn-danger"name="submit">
                    Edit
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
    
    $Released=$_GET["getReleasedYear"];
    $Servername="localhost";
    $Dbusername="root";
    $Dbpassword="";
    $Dbname="mydb";
    $connection=new mysqli($Servername,$Dbusername,$Dbpassword,$Dbname);
    $Sql="SELECT `moviename`, `actor`, `actress`, `director`, `camera`, `producer`, `distributer` FROM `movies` WHERE `releasedyear`=$Released";
    if($result->num_rows>0)
    {
        while($row=$result->fetch_assoc())
        {
            
            $Movie=$row["MovieName"];
            $Actor=$row["ActorName"];
            $Acttress=$row["ActtressName"];
            $Director=$row["DirectorName"];
            $Camera=$row["CameraName"];
            $Producer=$row["ProducerName"];
            $Distributer=$row["DistributerName"];
            
            echo "<form method='POST'><table class='table'> <tr> <td> movie </td> <td> <input type='text'name='updatemoviename' value='$Movie'/> </td> </tr>
            <tr> <td> actor </td> <td><input type='text'name='updateactor' value='$Actor' </td> </tr>
            <tr> <td> acttress </td> <td> <input type='text'name='updateacttress' value='$Acttress' </td> </tr>
            <tr> <td> director </td> <td> <input type='text'name='updatedirector' value='$Director' </td> </tr>
            <tr> <td> camera </td> <td> <input type='text'name='updatecamera' value='$Camera' </td> </tr>
            <tr> <td> producer </td> <td> <input type='text'name='updateproducer' value='$Producer' </td> </tr>
            <tr> <td> distributer </td> <td> <input type='text'name='updatedistributer' value='$Distributer' </td> </tr>
            <tr><td><button type='submit' value=' $Released' name='updatebutton' class='btn btn-success'/>update</button> <br> </form>";
        }
    }
        else
        {
            echo "invalid";
        }
    }
    if(isset($_POST["updatebutton"]))
    {
        $upmovie=$_POST["updatemovie"];
        $upactor=$_POST["updateactor"];
        $upacttress=$_POST["updateacttress"];
        $updirector=$_POST["updatedirector"];
        $upcamera=$_POST["updatecamera"];
        $upproducer=$_POST["updateproducer"];
        $updistributer=$_POST["updatedistributer"];
        $releseyear=$_POST['updatebutton'];
        $Servername="localhost";
        $Dbusername="root";
        $Dbpassword="";
        $Dbname="mydb";
        $connection=new mysqli($Servername,$Dbusername,$Dbpassword,$Dbname);
        $sql="UPDATE `movies` SET `moviename`='$upmovie',`actor`='$upactor',`actress`='$upacttress',`director`='$updirector',`camera`='$upcamera',`producer`=' $upproducer',`distributer`='$updistributer' WHERE `releasedyear`=$releseyear";
        $result=$connection->query($sql);
        if($result===TRUE)
        {
            echo "success";
        }
        else{
            echo "failed";
        }
}
?>