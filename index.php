<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Desa Namo Buaya</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i">
    <style>
        body {
            font-family: 'Open Sans', sans-serif;
            margin: 0;
            padding: 0;
            color: #333;
            background-image: url('assets/images/image1.jpeg');
            background-size: cover;
            background-position: center;
            background-attachment: fixed;
        }
        .navbar {
            background-color: rgba(0, 77, 64, 0.8);
        }
        .navbar-brand, .nav-link {
            color: #fff !important;
        }
        .nav-link {
            margin-right: 15px;
        }
        .nav-link:hover {
            color: #ffeb3b !important;
        }
        .navbar-toggler-icon {
            background-image: url('data:image/svg+xml;charset=utf8,%3Csvg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 30 30"%3E%3Cpath stroke="%23fff" stroke-width="2" d="M5 7h20M5 15h20M5 23h20" /%3E%3C/svg%3E');
        }
        .hero {
            background-color: rgba(0, 77, 64, 0.7);
            height: 60vh;
            display: flex;
            justify-content: center;
            align-items: center;
            color: #fff;
            text-align: center;
            padding: 0 20px;
        }
        .hero h1 {
            font-size: 3rem;
            font-weight: bold;
            margin: 0;
        }
        .hero h2 {
            font-size: 2rem;
            margin: 0;
        }
        .hero p {
            font-size: 1.25rem;
        }
        .content {
            padding: 60px 15px;
            background-color: #cfe8d4; /* Changed to white background */
            border-radius: 8px;
            color: #333;
            margin-top: -30px;
            position: relative;
            z-index: 1;
            text-align: center; /* Center text */
        }
        .content h1 {
            font-size: 2.5rem;
            margin-bottom: 20px;
            color: #008000; /* Ganti dengan warna yang Anda inginkan */
        }
        .content p {
            font-size: 1.125rem;
            line-height: 1.6;
            margin: 0 auto; /* Center text block */
            max-width: 800px; /* Limit width for better readability */
        }
        .content img {
            border-radius: 8px;
            margin-top: 20px;
            max-width: 100%; /* Ensure the image fits within its container */
            height: auto; /* Maintain aspect ratio */
        }
        .btn-primary {
            background-color: #004d40;
            border-color: #004d40;
        }
        .btn-primary:hover {
            background-color: #00332c;
            border-color: #00332c;
        }
        .footer {
            background-color: #004d40;
            color: #ffffff;
            text-align: center;
            padding: 20px 0;
            width: 100%;
        }
        .testimonial {
            background-color: rgba(0, 0, 0, 0.6);
            padding: 30px 15px;
            border-radius: 8px;
            margin: 30px 0;
            color: #fff;
        }
        .testimonial h3 {
            font-size: 2rem;
            margin-bottom: 20px;
        }
        .testimonial p {
            font-size: 1.125rem;
            line-height: 1.6;
            margin-bottom: 20px;
        }
        .card {
            border: none;
            border-radius: 8px;
            background-color: rgba(255, 255, 255, 0.8);
            margin-bottom: 30px;
        }
        .card-img-top {
            border-radius: 8px;
        }
        .card-body {
            background-color: rgba(0, 0, 0, 0.5);
            color: #fff;
        }
        .card-title, .card-text {
            color: #fff;
        }
        .dropdown-item {
            color: #004d40;
        }
        .dropdown-item:hover {
            background-color: #004d40;
            color: #fff;
        }
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light">
        <a class="navbar-brand" href="#">Desa Namo Buaya</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" href="index.php">Beranda</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Profile Desa
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="sejarah desa.html">Sejarah Desa</a>
                        <a class="dropdown-item" href="struktur desa.html">Struktur Desa</a>
                        <a class="dropdown-item" href="galeri.html">Galeri Desa</a>
                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="login.php">Masuk</a>
                </li>
            </ul>
        </div>
    </nav>

    <!-- Hero Section -->
    <div class="hero">
        <div>
            <h1>Selamat Datang di Website Enkripsi</h1>
            <h2>Desa Namo Buaya</h2>
        </div>
    </div>

    <!-- Content Section -->
    <div class="content">
        <h1>Desa Kami Sekilas !</h1>
        <p>Desa Namo Buaya adalah Desa yang terletak di Kota Subulussalam, Kec. Sultan Daulat, Prov Aceh.</p>
        <p>Kami memiliki sejarah yang kaya dan rasa kebersamaan yang kuat.</p>
        <img src="assets/images/img1.jpeg" alt="Desa Namo Buaya" class="img-fluid">
    </div>

    <!-- Footer -->
    <div class="footer">
        <p>&copy; 2024 Desa Namo Buaya. Hak cipta dilindungi.</p>
    </div>

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
</body>
</html>
