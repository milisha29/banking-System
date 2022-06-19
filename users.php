<?php
//Connection to the database
require 'partials/db_conn.php';
$count=0;
$sql ='SELECT * FROM users';
$result =mysqli_query($conn,$sql);
if(!$result){
die("Error: ".mysqli_error($conn));
}


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Users</title>
    <link rel="stylesheet" href="partials/style.css">

    <!-- font-awesome cdn  -->
    <script src="https://kit.fontawesome.com/a6103e5724.js" crossorigin="anonymous"></script>

    <!-- bootstrap  -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

    <!-- gooogle fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Pacifico&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@600&display=swap" rel="stylesheet">
</head>
<style>
 
    body{
      background: url('images/home2.webp') no-repeat;
        background-size:cover;
    }
    .table{
      width:800px;
     margin:auto;
     margin-top:30px;

    }
    tr,td{
      text-align:center;
    }
    .table-hover a{
     color:white;
    }
    .btn-custom{
      background-color:#2d8cb5;
      color:white;
    }
    .btn-custom:hover{
      background-color:#063b52;
    }
   

  @media screen and (min-width:800px){
    .end{
      width:100vw;
    }
  }
  /* if the browser window is at least 800px-s wide: */
@media screen and (min-width: 800px) {
  table {
  width: 90%;}
}

/* if the browser window is at least 1000px-s wide: */
@media screen and (min-width: 1000px) {
  table {
  width: 80%;}
}
</style>
<body>
<?php require 'partials/navbar.php'; ?>


<div class="table">
<table class="table table-striped">
  <thead>
    <tr>
      <th scope="col">SNo</th>
      <th scope="col">Name</th>
      <th scope="col">Email</th>
      <th scope="col">Amount</th>
      <th>Transact</th>
    </tr>
  </thead>
  <tbody class=".table-hover">
     <?php  
    
     while ($row = mysqli_fetch_assoc($result)) {
       
        echo" <tr>
           <td>".$row['sno']."</td>
           <td>".$row['name']."</td>
           <td>".$row['email']."</td>
           <td>".$row['amount']."</td>
           <td><a href='transfer.php?id=". $row['sno']."'><button type='button' class='btn btn-custom' id='transfer'>Transfer Money</button></a></td>
         </tr>";
    }
    ?>
  </tbody>
</table>
</div>

<div class="end">
<?php require 'partials/footer.php'; ?>
</div>

<script>
    
</script>
</body>
</html>