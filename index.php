<?php
require "koneksi.php";

$queryKategori = mysqli_query($con, "SELECT * FROM kategori");

if (isset($_GET['keyword'])) {
    $keyword = mysqli_real_escape_string($con, $_GET['keyword']);
    $keyword = strtolower($keyword); // untuk pencarian tidak sensitif huruf besar/kecil

    $queryProduk = mysqli_query($con, 
        "SELECT produk.* FROM produk 
        JOIN kategori ON produk.kategori_id = kategori.id 
        WHERE LOWER(produk.nama) LIKE '%$keyword%' 
        OR LOWER(kategori.nama) LIKE '%$keyword%'"
    );

} else if (isset($_GET['kategori'])) {
    $kategori = mysqli_real_escape_string($con, $_GET['kategori']);
    $queryGetKategoriId = mysqli_query($con, "SELECT id FROM kategori WHERE nama='$kategori'");
    $kategoriId = mysqli_fetch_array($queryGetKategoriId);
    $queryProduk = mysqli_query($con, "SELECT * FROM produk WHERE kategori_id='$kategoriId[id]'");

} else {
    $queryProduk = mysqli_query($con, "SELECT * FROM produk");
}

$countData = mysqli_num_rows($queryProduk);
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SavTea | Home</title>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@600&family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <link rel="stylesheet" href="css/style.css">

    <style>
        .banner {
        height: 85vh;
        background: linear-gradient(rgba(0,0,0,0.4), rgba(0,0,0,0.4)), url('image/banner.jpg') center/cover no-repeat;
        }
        .banner h1 {
        font-size: calc(2.5rem + 2vw);
        font-family: 'Playfair Display', serif;
        }
        .highlighted-cathegory {
        height: 250px;
        border-radius: 15px;
        transition: transform 0.3s ease;
        }
        .highlighted-cathegory:hover {
        transform: scale(1.03);
        }
        .card:hover {
        transform: translateY(-5px);
        box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1);
        transition: all 0.3s ease;
        }
        .content-subscribe {
        background-color: #2F5249;
        }
    </style>
</head>
<body>
    <?php require "navbar.php"; ?>

    <div class="container-fluid banner d-flex align-items-center">
        <div class="container text-center text-white">
        <h1>Herbal Tea Shop</h1>
        <h3>Start Your Tea Journey Here!</h3>
                <form method="get" action="produk.php" class="col-md-8 offset-md-2 mt-4">
                    <div class="input-group input-group-lg my-4">
                        <input type="text" class="form-control" placeholder="What are you looking for?" aria-label="Recipient’s username" aria-describedby="basic-addon2" name="keyword">
                        <button type="submit" class="btn warna2 text-white">Find</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <section class="container-fluid py-5 text-center">
        <h3 class="mb-5" data-aos="fade-down">Kategori Terlaris</h3>
        <div class="row">
                <div class="col-md-4 mb-3">
                    <div class="highlighted-cathegory kategori-teh-melati d-flex justify-content-center align-items-center" data-aos="zoom-in">
                        <h4 class="text-white"><a class="no-decoration" href="produk.php?kategori=Teh Melati"><i class="fas fa-leaf me-2"></i>Teh Melati</a></h4>
                    </div>
                </div>
                <div class="col-md-4 mb-3">
                    <div class="highlighted-cathegory kategori-teh-mawar d-flex justify-content-center align-items-center"data-aos="zoom-in">
                        <h4 class="text-white"><a class="no-decoration" href="produk.php?kategori=Teh Mawar"><i class="fas fa-seedling me-2"></i>Teh Mawar</a></h4>
                    </div>
                </div>
                <div class="col-md-4 mb-3">
                    <div class="highlighted-cathegory kategori-teh-lemon d-flex justify-content-center align-items-center"data-aos="zoom-in">
                        <h4 class="text-white"><a class="no-decoration" href="produk.php?kategori=Teh Lemon"><i class="fas fa-lemon me-2"></i>Teh Lemon</a></h4>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="container-fluid warna3 py-5">
        <div class="container text-center" data-aos="fade-up">
            <h3>Tentang Kami</h3>
            <p class="fs-5 mt-3">
            Selamat datang di SavTea — rumahnya teh herbal alami yang menenangkan tubuh dan menyegarkan jiwa. Kami percaya bahwa secangkir teh bukan hanya minuman, tapi juga momen untuk merawat diri.
            SavTea hadir dengan berbagai pilihan teh herbal berkualitas tinggi yang diracik dari bahan-bahan alami, tanpa pengawet dan tanpa pewarna buatan. Setiap daun teh kami dipilih dengan teliti untuk memberikan manfaat kesehatan seperti meningkatkan imun, meredakan stres, membantu tidur nyenyak, hingga menjaga keseimbangan tubuh.
            Kami berkomitmen untuk membawa kebaikan alam langsung ke cangkirmu, lewat rasa yang menenangkan dan aroma yang menyejukkan.
        </div>
    </section>

    <section class="container-fluid content-subscribe py-5 text-white text-center">
        <h3 data-aos="fade-up">Or Join Our Membership</h3>
        <p>to get exclusive promos dan special discount!</p>
        <form class="d-flex justify-content-center mt-3" data-aos="fade-up">
        <input type="email" class="form-control w-50 me-2" placeholder="Enter your email">
        <button class="btn btn-primary">JOIN</button>
        </form>
    </section>

    <section class="container-fluid py-5 text-center">
        <h3 data-aos="fade-down">Produk</h3>

            <div class="row mt-5">
                <?php
            if (mysqli_num_rows($queryProduk) > 0) {
                while($produk = mysqli_fetch_array($queryProduk)) {
                ?>
            <div class="col-sm-6 col-md-4 mb-3" data-aos="fade-up">
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
                        <div class="d-flex justify-content-center mt-auto">
                            <a href="produk-detail.php?nama=<?php echo $produk['nama']; ?>" 
                            class="btn btn-success btn-detail">Lihat Detail</a>
                        </div>
                    </div>
                </div>
            </div>
        <?php 
        } 
        } else {
            echo "<p class='text-muted'>Produk tidak ditemukan.</p>";
        }
        ?>
        </div>
        <a class="btn btn-outline-warning mt-4 p-2 fs-8" href="produk.php">See More</a>
    </section>

    <!-- footer -->
    <?php require "footer.php";?>
    <script src="bootsrap/js/bootstrap.bundle.min.js"></script>
    <script src="fontawesome/js/all.min.js"></script>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
        AOS.init();
    </script>
</body>
</html>