<?php
require 'partials/db_conn.php';

$sender = $_GET['id'];
if($_SERVER['REQUEST_METHOD']=='POST'){

    $receiver = $_POST['recName'];
    $amount =$_POST['amount'];
    // echo $receiver;
    //query to select record of the sender
    $sql1 = "SELECT * FROM users WHERE sno =$sender";
    $res1=mysqli_query($conn,$sql1);
    $row1 =mysqli_fetch_assoc($res1);

    //query to select record of the receiver
   
    $sql2 ="SELECT * FROM users WHERE sno =$receiver";
    $res2=mysqli_query($conn,$sql2);
    $row2 =mysqli_fetch_assoc($res2);

    if($amount<=0){
        echo '<script type="text/JavaScript"> 
        alert("Amount should be greater then zero");
        </script>';
    }
    else if($amount>$row1['amount']){
        echo '<script type="text/JavaScript"> 
        alert("Insufficient Balance");
        </script>';
    }
    else{
    $updatedBalance = $row1['amount'] - $amount;
    $sql ="UPDATE users SET amount = '$updatedBalance' WHERE sno = '$sender';";
    $res =mysqli_query($conn,$sql);

    $updatedBalance = $amount +$row2['amount'];

    $sql ="UPDATE `users` SET `amount` = $updatedBalance WHERE `users`.`sno` = '$receiver';";
    $res =mysqli_query($conn,$sql);

    $senderName =$row1['name'];
  
    $receiverName =$row2['name'];
   
    $sequeal ="INSERT INTO `transferhistory` (`Sender`, `Receiver`, `Amount`) VALUES ( ' $senderName', '$receiverName', '$amount')";
     $result =mysqli_query($conn,$sequeal);
     if($result){
        echo '<script type="text/JavaScript"> 
        alert("Transcation done Successfully");
        location.href ="transferHistory.php";
        </script>';
     }
    }
}

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Transfer</title>

    <!-- custom styles  -->
    <link rel="stylesheet" href="partials/style.css">

    <!-- bootstrap  -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"
        integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

        <!-- font-awesome cdn-->
    <script src="https://kit.fontawesome.com/a6103e5724.js" crossorigin="anonymous"></script>

    <!-- gooogle fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Pacifico&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@600&display=swap" rel="stylesheet">
    <style>
        body {
            background: url('images/money.jpg') no-repeat;
            background-size: cover;
            font-family: 'Roboto', sans-serif;
        }

        #table {
            width: 500px;
            margin: auto;
            margin-top: 12px;
            color: white;
        }

        td {
            font-weight: 400;
        }

        .Transferform {

            border-radius: 9px;
            display: flex;
            justify-content: center;
            align-items: center;
            width: 390px;
            margin: auto;
            height: 390px;
            margin-top: 60px;
            background-image: linear-gradient(to right, #c3ba84, #ebda7e);

        }

        form {
            display: flex;
            flex-direction: column;
        }

        .Transferform label {
            font-weight: 600;
            font-size: 30px;

        }

        #transferbtn {
            text-align: center;
            background-color: rgb(28 104 18);
            border-radius: 5px;
            outline: none;
            border: 1px solid rgb(28 104 18);
            color: white;
            font-size: 19px;
            font-weight: 400;
            margin-top: 8px;
            cursor: pointer;
        }

        select {
            width: 180px;
        }

        #amount {
            margin-top: -13px;
            border: none;
            /* background-color: #c3ba84; */
            box-shadow: 4px 4px 4px grey;
            /* border-bottom:3px solid #ccc; */
            outline: none;
        }

        #amount:hover {
            box-shadow: 4px 4px 10px grey;
        }
    </style>
</head>

<body>
    <?php
require 'partials/navbar.php';

?>

    <div id="table">
        <h5 style="text-align:center;">SENDER'S DETAILS</h5>
        <table class="table table-striped ">
            <thead>
                <tr>
                    <th scope="col">SNo</th>
                    <th scope="col">Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">Amount</th>
                </tr>
            </thead>
            <tbody class=".table-hover">
                <?php
$sender = $_GET['id'];
$sql  = "SELECT * FROM users WHERE sno = '$sender'";
$res =mysqli_query($conn,$sql);
while ($row = mysqli_fetch_assoc($res))
{echo "<tr>
    <td>".$row['sno']."</td>
    <td>".$row['name']."</td>
    <td>".$row['email']."</td>
    <td>".$row['amount']."</td>
  </tr>";

}
?>
            </tbody>
        </table>
    </div>

    <div class="Transferform">
        <form method="POST">
            <label for="recName">Transfer to</label>
            <br>
            <select name="recName" id="recName">
                <option value="" selected disabled>Choose</option>
                <?php
    $sender =$_GET['id'];
    
    $sql = "SELECT * FROM users WHERE sno!=$sender";
    $res =mysqli_query($conn,$sql);
    if($res){
        while($row = mysqli_fetch_assoc($res)){

            ?>
                <option value="<?php echo $row["sno"];?>">
                    <?php echo $row["name"];?>
                </option>
                <?php
        }
    }
    else{
        die("Error: ".mysqli_error($conn));
    }
  
    ?>
            </select>
            <br>
            <label for="amount">Amount</label>
            <br>
            <input type="text" name="amount" id="amount" required>
            <br>
            <input type="submit" name="submit" value="Transfer" id="transferbtn">
        </form>
    </div>

</body>

</html>