<?php
    require "koneksi.php";

    $nama=htmlspecialchars($_GET['nama']);
    $queryProduk=mysqli_query($con, "SELECT*FROM produk WHERE nama='$nama'");
    $produk=mysqli_fetch_array($queryProduk);

    $queryProdukTerkait=mysqli_query($con, "SELECT * FROM produk WHERE kategori_id='$produk[kategori_id]' AND id!='$produk[id]' LIMIT 4");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Online Shop | Product Detail</title>
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="fontawesome/css/all.min.css">
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <?php require "navbar.php"; ?>
<!-- product detail -->
    <div class="container-fluid py-5">
        <div class="container">
            <div class="row">
                <div class="col-lg-5 mb-4">
                <img src="image/<?php echo $produk ['foto']; ?>" class="w-100"alt="">
                </div>
                <div class="col-md-6 offset-lg-1">
                    <h1><?php echo $produk ['nama']; ?></h1>
                    <p class="fs-6 text-muted">
                         <?php echo $produk['detail']; ?>
                    </p>
                    <p class="text-harga fw-bold text-success">
                        Rp <?php echo number_format($produk['harga'], 0, ',', '.'); ?>
                    </p>
                    </p>
                    <p class="fs-5">
                    Status Ketersediaan:
                    <?php if ($produk['ketersediaan_stok'] == 'habis') { ?>
                        <span class="badge bg-danger">Stok Habis</span>
                    <?php } else { ?>
                        <span class="badge bg-success"><?= $produk['ketersediaan_stok']; ?></span>
                    <?php } ?>
                    </p>

                </div>
            </div>
        </div>
    </div>

    <!-- produk terkait -->
    <div class="container-fluid py-5 warna2">
    <div class="container">
        <h2 class="text-center text-white mb-5">Produk Terkait</h2>
        <div class="row">
            <?php while($data = mysqli_fetch_array($queryProdukTerkait)) { ?>
                <div class="col-md-6 col-lg-3 mb-4">
                    <div class="card h-100">
                        <a href="produk-detail.php?nama=<?php echo $data['nama']; ?>">
                            <img src="image/<?php echo $data['foto']; ?>" class="produk-terkait-img card" alt="">
                        </a>
                        <div class="card text-center p-2">
                            <h6 class="card-title mb-0" style="font-size: 14px;"><?php echo $data['nama']; ?></h6>
                        </div>
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>
</div>

 </div>

    <?php require "footer.php"; ?>

    <script src="bootsrap/js/bootstrap.bundle.min.js"></script>
    <script src="fontawesome/js/all.min.js"></script>
</body>
</html>