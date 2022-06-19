<?php
require 'partials/db_conn.php';
// $sno=18;
if($_SERVER['REQUEST_METHOD']=='POST'){

//    $sno++;
    $name =$_POST['name'];
    $email=$_POST['email'];
    $amount =$_POST['amount'];

    $sql ="INSERT INTO `users` (`name`, `email`, `amount`) VALUES ('$name', '$email', '$amount');";
    $res =mysqli_query($conn,$sql);
    if($res){
        echo '<script type="text/JavaScript"> 
        alert("Congratulations, Account Created!");
        </script>';
    }
    else{
        echo 'error:'.mysqli_error($conn);
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Account</title>
    <link rel="stylesheet" href="partials/style.css">

    <link rel="stylesheet" href="partials/createAcc.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"
        integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/a6103e5724.js" crossorigin="anonymous"></script>

    <!-- fonts  -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Pacifico&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@600&display=swap" rel="stylesheet">
    <style>
        body {
            background: url('images/home2.webp') no-repeat;
            margin: 0;
        }

        .containeracc {
            /* background-color:rgba(204, 204, 204, 0.5); */
            /* color:white; */
            /* border-radius:9px; */
            width: 800px;
            margin-top: 40px;
            /* display:flex;
            align-items:center;
            justify-content:center;
            padding:8px 10px;
            font-size:35px; */
        }

        .main {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
        }

        form h2 {
            margin-bottom: 20px;
        }

        .containeracc input {
            margin: 5px 0;
            border: none;
            background: none;
            border-bottom: 3px solid #37393c;
            color: black;

        }

        .containeracc input:hover {
            box-shadow: 5px 3px #aaa;

        }

        ::placeholder {
            color: rgb(31, 24, 24);
            font-size: 15px;
            font-weight: 500;
        }

        #submit {
            background: rgb(25, 150, 25);
            border: none;
            border-radius: 5px;
            color: white;
            padding: 9px 8px;
            cursor: pointer;
            outline:none;
        }

        #submit:hover {
            background: green;
        }
    </style>
</head>

<body>
    <?php  require 'partials/navbar.php';     ?>
    <div class="main">
        <div class="containeracc">
            <form action="createAccount.php" method="post">
                <h2>CREATE ACCOUNT</h2>
                <p>
                    <input id="name" name="name" type="text" placeholder="Full Name">
                </p>
                <p>
                    <input id="Email" name="email" type="email" placeholder="Email">
                </p>
                <p>
                    <input id="amount" name="amount" type="text" placeholder="Amount">
                </p>
                <p>
                    <button type="submit" id="submit">Create Account</button>
                </p>
            </form>
        </div>
    </div>

    <div class="end">
        <?php  require 'partials/footer.php';   ?>
    </div>
</body>

</html>