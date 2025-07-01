<?php
    require "koneksi.php";
    $queryProduk = mysqli_query($con, "SELECT id, nama, harga, foto, detail FROM produk LIMIT 6")
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@600&family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SavTea | Home</title>
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="fontawesome/css/all.min.css">
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <?php require "navbar.php"; ?>

    <div class="container-fluid banner d-flex align-items-center">
        <div class="container text-center text-white">
        <h1>Herbal Tea Shop</h1>
        <h3>Start Your Tea Journey Here!</h3>
        <div class="col-md-8 offset-md-2">
                <form method="get" action="produk.php">
                    <div class="input-group input-group-lg my-4">
                        <input type="text" class="form-control" placeholder="What are you looking for?" aria-label="Recipient’s username" aria-describedby="basic-addon2" name="keyword">
                        <button type="submit" class="btn warna2 text-white">Find</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="container-fluid py-5">
        <div class="container text-center">
            <h3>Kategori Terlaris</h3>

            <div class="row mt-5">
                <div class="col-md-4 mb-3">
                    <div class="highlighted-cathegory kategori-teh-melati d-flex justify-content-center align-items-center">
                        <h4 class="text-white"><a class="no-decoration" href="produk.php?kategori=Teh Melati">Teh Melati</a></h4>
                    </div>
                </div>
                <div class="col-md-4 mb-3">
                    <div class="highlighted-cathegory kategori-teh-mawar d-flex justify-content-center align-items-center">
                        <h4 class="text-white"><a class="no-decoration" href="produk.php?kategori=Teh Mawar">Teh Mawar</a></h4>
                    </div>
                </div>
                <div class="col-md-4 mb-3">
                    <div class="highlighted-cathegory kategori-teh-lemon d-flex justify-content-center align-items-center">
                        <h4 class="text-white"><a class="no-decoration" href="produk.php?kategori=Teh Lemon">Teh Lemon</a></h4>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container-fluid warna3 py-5">
        <div class="container text-center">
            <h3>Tentang Kami</h3>
            <p class="fs-5 mt-3">
            Selamat datang di SavTea — rumahnya teh herbal alami yang menenangkan tubuh dan menyegarkan jiwa. Kami percaya bahwa secangkir teh bukan hanya minuman, tapi juga momen untuk merawat diri.
            SavTea hadir dengan berbagai pilihan teh herbal berkualitas tinggi yang diracik dari bahan-bahan alami, tanpa pengawet dan tanpa pewarna buatan. Setiap daun teh kami dipilih dengan teliti untuk memberikan manfaat kesehatan seperti meningkatkan imun, meredakan stres, membantu tidur nyenyak, hingga menjaga keseimbangan tubuh.
            Kami berkomitmen untuk membawa kebaikan alam langsung ke cangkirmu, lewat rasa yang menenangkan dan aroma yang menyejukkan.
        </div>
    </div>

<div class="container-fluid py-5">
    <div class="container text-center">
        <h3>Produk</h3>

        <div class="row mt-5">
    <?php while($produk = mysqli_fetch_array($queryProduk)) { ?>
        <div class="col-sm-6 col-md-4 mb-3">
            <div class="card h-100">
                <div class="image-box">
                    <img src="image/<?php echo $produk['foto']; ?>" class="card-img-top" alt="...">
                </div>
                <div class="card-body">
                    <h4 class="card-title"><?php echo $produk['nama']; ?></h4>
                    <p class="card-text">
                        <?php echo substr($produk['detail'], 0, 100) . '...'; ?>
                    </p>
                    <p class="card-text text-harga">
                        Rp <?php echo number_format($produk['harga'], 0, ',', '.'); ?>
                    </p>
                    <a href="produk-detail.php?nama=<?php echo $produk['nama']; ?>" class="btn btn-primary">Lihat Detail</a>
                </div>
            </div>
        </div>
    <?php } ?>
</div>
        <a class="btn btn-outline-warning mt-4 p-2 fs-8" href="produk.php">See More</a>
    </div>
</div>

    <!-- footer -->
    <?php require "footer.php";?>
    <script src="bootsrap/js/bootstrap.bundle.min.js"></script>
    <script src="fontawesome/js/all.min.js"></script>
</body>
</html>