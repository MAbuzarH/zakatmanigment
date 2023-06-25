<!DOCTYPE html>
<html>

<head>
    <title>Zakat Management System</title>
    <link rel="stylesheet" href="css/bootstrap.css">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="css/styles.css">
</head>
<body>
    <style>
        * {
            margin: 0%;
            padding: 0%;
            overflow-y: hidden;
            box-sizing: border-box;
        }

        .main {
            height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            background-color: gainsboro;
        }

        h1 {
            padding-bottom: 10px;
        }
    </style>
    <div class="main">
        <div class="container card p-4 bg-body-secondary">
            <h1 class="text-center pb-4">Welcome to Zakat Management System</h1>

            <div class="row  pt-20">
                <div class="col-md-4">
                    <a href="./admin/index.php" class="btn btn-primary btn-lg btn-block">Admin</a>
                </div>
                <div class="col-md-4">
                    <a href="./donor/index.php" class="btn btn-primary btn-lg btn-block">Donor</a>
                </div>
                <div class="col-md-4">
                    <a href="./recevier/index.php" class="btn btn-primary btn-lg btn-block">Receiver</a>
                </div>
            </div>
        </div>
    </div>

</body>

</html>