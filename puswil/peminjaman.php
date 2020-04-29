<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perpustakaan Kota</title>

    <!--css-->
    <link rel="stylesheet" href="css/styleindexpuswil.css" />

    <!--fonts-->
    <link href="https://fonts.googleapis.com/css?family=Bree+Serif|Carter+One&display=swap" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css?family=Lemon&display=swap" rel="stylesheet">
</head>

<body>

    <!--navbar-->
    <nav>
        <div class=logo>
            <a href="indexpuswil.php">PERPUSTAKAAN KOTA</a>
        </div>
        <ul>
            <li><a href="tambahbuku.php">Tambah Buku</a></li>
            <li><a href="databuku.php">Data Buku</a></li>
            <li><a href="peminjaman.php">Peminjaman</a></li>
            <!-- <li><a href="profil.php">Profil</a></li> -->
            <li><a href="logout.php">Logout</a></li>
        </ul>
        <!-- hambuerger menu -->
        <div class="menu-toggle">
            <input type="checkbox">
            <span></span>
            <span></span>
            <span></span>
        </div>
    </nav>

    <section id="data" class="data">
    <center>
    <div class="container">
    <table border="2">
        <tr>
            <th>No</th>
            <th>Nama Peminjam</th>
            <th>Kode Buku</th>
            <th>Judul Buku</th>
            <th>Tanggal Peminjaman</th>
            <th>Tanggal Pengebalian</th>
        </tr>

        <?php

        try{

        require_once'koneksi.php';

        $con = koneksi::connect();

        $select = $con->prepare("SELECT * FROM buku");

        $select->setFetchMode(PDO::FETCH_ASSOC);

        $select->execute();

        $no=1;

        while($data=$select->fetch()){

        ?>

        <tr>
        <th><?php echo $no++; ?></th>
        <th><?php echo $data['nama'];?></th>
        <th><?php echo $data['kodebuku'];?></th>
        <th><?php echo $data['judulbuku'];?></th>
        <th><?php echo $data['tglpinjam'];?></th>
        <th><?php echo $data['tglkembali'];?></th>
        </tr>
        
        <?php

        }
    }
        catch(PDOException $e){
            echo "error:".$e->getMessage ();
        }
        
        ?>
    </table>
    </div>
    </center>
    </section>

    <script src="js/script.js"></script>
</body>
</html>