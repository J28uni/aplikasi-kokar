<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Tipe Kebutuhan</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

</head>

<body>
    <nav class="navbar navbar-expand-md navbar-light bg-success sticky-top">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarToggler" aria-controls="navbarToggler" aria-expanded="true" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarToggler">
            <a class="navbar-brand nav-link" href="home.php"><img src="img/home.svg" height="30px" width="30"></a>
            <ul class="navbar-nav mr-auto mt-2 mt-md-0">
                <li class="nav-item">
                    <a class="nav-link" href="cari.php">Absensi</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active bg-light" href="activity.php">Activity</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="report.php">Report</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="logout.php"><b>KELUAR</b></a>
                </li>
            </ul>
        </div>
    </nav>
    <?php
    $pages = isset($_GET['pages']) ? $_GET['pages'] : "";

    if ($pages == "") {
    ?>
        <div class="container mt-4">
            <?php
            require_once "./db/db.php";
            $get_data = $db->query("SELECT * FROM tipe_kebutuhan");
            ?>
            <h4>Tipe Kebutuhan <span class="float-right"><a href="?pages=add_tipe_kebutuhan" class="btn btn-success btn-sm">Tambah</a></span></h4>
            <hr style="border:none;border-bottom: 1px dashed #ddd">
            <table class="table table-bordered table-condensed table-sm">
                <thead>
                    <tr>
                        <th>Tipe Kebutuhan</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    foreach ($get_data->fetchAll() as $key => $val) {
                    ?>
                        <tr>
                            <td><?= $val['nama_tipe']; ?></td>
                            <td style="width:12%">
                                <a href="?pages=edit_tipe_kebutuhan&id=<?= $val['id']; ?>" class="btn btn-primary btn-sm">Edit</a>
                                <a href="proses/tipe_kebutuhan_action.php?act=delete&id=<?= $val['id']; ?>" class="btn btn-danger btn-sm">Hapus</a>
                            </td>
                        </tr>
                    <?php
                    }
                    ?>
                </tbody>
            </table>
        </div>
    <?php
    } else {
        ?>
        <div class="container mt-4">
        <?php
        if (file_exists("pages/" . $pages . ".php")) {
            require_once "pages/" . $pages . ".php";
        }
        ?>
        </div>
        <?php
    }
    ?>

</body>

</html>