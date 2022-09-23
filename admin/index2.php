<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <!-- CSS -->
    <link href="../assets/css/bootstrap.min.css" rel="stylesheet">
    <!-- <link href="../assets/css/sb-admin.css" rel="stylesheet"> -->
    <link href="../assets/css/plugins/morris.css" rel="stylesheet">
    <link href="../assets/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="../assets/css/jquery-ui/jquery-ui.css" rel="stylesheet" type="text/css">

</head>

<body>
    <div id="wrapper">

        <?php include 'header.php';
        ?>

        <div id="page-wrapper">
            <?php
            include '../koneksi.php';
            ?>
            <div class="container-fluid">
                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            <?php echo $login_session; ?>,
                            <p></p>
                            Selamat Datang Di
                            <p></p>
                            TOKO OBAT BERIZIN & KOSMETIK RENDY
                        </h1>
                    </div>
                </div>
            </div>

        </div>
    </div>

    <!-- jQuery -->
    <script src="../assets/js/jquery.js"></script>
    <script src="../assets/js/jquery-3.2.0.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="../assets/js/bootstrap.min.js"></script>

    <!-- Morris Charts JavaScript -->
    <script src="../assets/js/plugins/morris/raphael.min.js"></script>
    <script src="../assets/js/plugins/morris/morris.min.js"></script>
    <script src="../assets/js/plugins/morris/morris-data.js"></script>
</body>

</html>