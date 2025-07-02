<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Toko Teh Herbal |Tentang kami</title>
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="fontawesome/css/all.min.css">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <link rel="stylesheet" href="css/style.css">
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display&family=Open+Sans&display=swap" rel="stylesheet">
    <style>
    body {
        font-family: 'Open Sans', sans-serif;
        background-color: #f8f9f5;
    }
    h1, h2, h3 {
        font-family: 'Playfair Display', serif;
    }
    </style>

</head>
<body>
    <?php require "navbar.php"; ?>

    <div class="container-fluid banner-produk d-flex align-items-center">
        <div class="container">
            <h1 class="text-white text-center"  data-aos="fade-up">Tentang Kami</h1>
        </div>
    </div>

    <div class="container py-5">
        <div class="row align-items-center g-0">
            <div class="col-md-6" data-aos="fade-right">
                <img src="image/store.jpg" alt="Tentang SavTea" class="img-fluid rounded-circle shadow" style="max-width: 400px;">
            </div>
            <div class="col-md-6 fs-5 ps-md-4" data-aos="fade-left">
                <p>✨ <strong>SavTea</strong> adalah brand teh herbal yang menghadirkan ketenangan dalam setiap tegukan. Kami percaya bahwa kesehatan dimulai dari kebiasaan sederhana—seperti menikmati secangkir teh alami setiap hari.</p>
                <p>🌿 Berawal dari kecintaan kami terhadap tanaman herbal lokal, kami menghadirkan varian teh berkualitas tinggi tanpa bahan kimia tambahan.</p>
                <p>🌎 Dengan komitmen terhadap keberlanjutan, SavTea hadir sebagai sahabat setia Anda dalam rutinitas sehat dan menenangkan.</p>
            </div>
        </div>
    </div>

    <div class="container my-5">
        <h2 class="text-center mb-4">🌱 Misi Kami</h2>
        <p class="text-center fs-5">Membawa manfaat herbal ke dalam setiap rumah melalui produk alami, sehat, dan berkualitas tinggi.</p>
    </div>


 <?php require "footer.php"; ?>

    <script src="bootsrap/js/bootstrap.bundle.min.js"></script>
    <script src="fontawesome/js/all.min.js"></script>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
        AOS.init();
    </script>
</body>
</html>