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
          </ul>
    </nav>
   <h1>
       search
   </h1> 
</body>
<form method="GET">
<table class="table">
  <tr>
    <td>
      Name of the movie:
    </td>
    <td>
      <input type="text"class="form-control"name="getName">
    </td>
  </tr>
  <tr>
    <td>

    </td>
    <td>
      <button type="submit" class="btn btn-success"name="submit">
        Search
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
  $Movie=$_GET["getName"];
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
        $actor=$row["actor"];
        $actress=$row["actress"];
        $director=$row["director"];
        $camera=$row["camera"];
        $producer=$row["producer"];
        $distributer=$row["distributer"];
        $releasedyear=$row["releasedyear"];
        echo "<table class='table'><tr><td>actor</td><td>$actor</td></tr>
        <tr><td>actress</td><td>$actress</td></tr>
        <tr><td>director</td><td>$director</td></tr>
        <tr><td>camera</td><td>$camera</td></tr>
        <tr><td>producer</td><td>$producer</td></tr>
        <tr><td>distributer</td><td>$distributer</td></tr>
        <tr><td>releasedyear</td><td>$releasedyear</td></tr>";
      }
    }
    else{
      echo "invalid";
    }
}
?>