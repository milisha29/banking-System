<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>TRANSFER HISTORY</title>
  <link rel="stylesheet" href="partials/style.css">

  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"
    integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
  <script src="https://kit.fontawesome.com/a6103e5724.js" crossorigin="anonymous"></script>
  <!-- gooogle fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Pacifico&display=swap" rel="stylesheet">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@600&display=swap" rel="stylesheet">
  <style>
    body {
      background-image: linear-gradient(to right, rgb(190, 211, 132), rgb(66, 96, 226));
    }

    section {
      width: 800px;
      margin-left: auto;
      margin-right: auto;
      margin-top: 30px;
    }

    tr {
      text-align: center;
    }

    tbody td {
      font-family: Cambria, Cochin, Georgia, Times, 'Times New Roman', serif;
      font-style: bold;
      font-weight: bold;
      text-align: center;
    }

    .container {
      margin-top: 20px;
    }
    .end{
      margin-top:450px;
    }
  </style>
</head>

<body>
  <!-- //navbar -->
  <?php require 'partials/navbar.php';
$count=0;?>
  <div class="container">
    <h2 style="text-align:center;">TRANSFER HISTORY</h2>

    <section>

      <!-- new  -->
      <table class="table table-striped table-dark">
        <thead>
          <tr>
            <th scope="col">SNO</th>
            <th scope="col">Sender</th>
            <th scope="col">Receiver</th>
            <th scope="col">Amount Transferred</th>
            <th scope="col">Date & Time</th>
          </tr>
        </thead>
        <tbody>
          <?php
    
    //connection to database
     require 'partials/db_conn.php';

     $sql ="SELECT * FROM `transferhistory` ORDER BY sno DESC";
     $res =mysqli_query($conn,$sql);
     while($row =mysqli_fetch_assoc($res)){
         $count++;
   echo"<tr>
     <td>".$count."</td>
     <td>".$row['Sender']."</td>
     <td>".$row['Receiver']."</td>
     <td>".$row['Amount']."</td>
     <td>".$row['Date & Time']."</td>
   </tr>";
     }
  ?>
        </tbody>
      </table>
    </section>
  </div>

  <div class="end">
    <?php  require 'partials/footer.php';   ?>
  </div>
</body>

</html>