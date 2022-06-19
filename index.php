<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Bank</title>
    <link rel="stylesheet" href="partials/style.css">

    <!-- bootstrapcdn  -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"
        integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

    <!-- font-awesome cdn-->
    <script src="https://kit.fontawesome.com/a6103e5724.js" crossorigin="anonymous"></script>

    <!-- gooogle fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Pacifico&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@600&display=swap" rel="stylesheet">

    <style>
        .heading {
            display: flex;
        }

        .content {
            width: 50%;
            display: flex;
            flex-direction: column;
            align-items: flex-start;
            justify-content: center;
            box-sizing: border-box;
            margin-left: 50px;
        }

        .content h1 {
            font-family: 'Montserrat', sans-serif;
        }

        .content p {
            font-size: 20px;
            font-weight: 500;
            color: #4e54fb;
        }
        button a {
            color: white;
            text-decoration: none;
        }

        button a:hover {
            color: white;
            text-decoration: none;
        }

        @media screen and (max-width:950px) {
            .heading {
                display: flex;
                flex-direction: column;
            }

            .content {
                width: 100%;
            }

            .content h1 {
                padding: 5px 5px;

            }

            .content p {
                margin-left: auto;
                margin-right: auto;
                width: 100%;
            }

            .image {
                box-sizing: border-box;
                padding: 10px 10px;
                width: 100%;
            }
        }
    </style>
</head>

<body>
    <?php  require 'partials/navbar.php';   ?>



    <div class="heading">
        <div class="content">
            <h1>We're here for you.</h1>
            <p>
                We are here to provide best online banking services to our customers and community.
            </p>
            <div class="buttons">
                <button type="button" class="btn btn-secondary btn-lg"><a href="createAccount.php">Create
                        Account</a></button>
                <button type="button" class="btn btn-info btn-lg"><a href="users.php">Transfer Money</a></button>
                <button type="button" class="btn btn-secondary btn-lg"><a href="transferHistory.php">Transaction
                        History</a></button>

            </div>
        </div>

        <div class="image">
            <img src="images/bank.webp" alt="bankImage" id="sideimg">
        </div>
    </div>
    <div class="end">
        <?php  require 'partials/footer.php';   ?>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
        crossorigin="anonymous"></script>
</body>

</html>