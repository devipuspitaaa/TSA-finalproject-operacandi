<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>OPERA CANDI | Sistem Monitoring & Evaluasi Kelurahan Cantik</title>
    <!-- Favicon-->
    <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
    <!-- Font Awesome icons (free version)-->
    <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
    <!-- Google fonts-->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css" />
    <link href="https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700" rel="stylesheet" type="text/css" />
    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="css/styles.css" rel="stylesheet" />
    <link href="css/styles2.css" rel="stylesheet" />
    <link href="css/bootstrap2.min.css" rel="stylesheet">
     <!-- Icon Font Stylesheet -->
     <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">

</head>

<body>
    <!-- Navigation-->
    <nav class="navbar navbar-expand-lg navbar-dark fixed-top" id="mainNav">
        <div class="container">
            <a class="navbar-brand">Portal OPERA CANDI</a>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav text-uppercase ms-auto py-4 py-lg-0">
                    <li class="nav-item"><a class="nav-link scrollto active" href="{{ url('/') }}">Home</a></li>
                    <li class="nav-item"><a class="nav-link" href="#tentang">Tentang</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('login') }}">Aplikasi</a></li>
                </ul>
            </div>
        </div>
    </nav>
    {{-- @include('layouts.nav') --}}
  <!-- ======= Home Section ======= -->  
    
    <header class="masthead">
        <div class="container">
            <div class="masthead-heading">SELAMAT DATANG di Portal Monitoring & Evaluasi</div>
            <div class="masthead-heading">OPERA CANDI</div>
            <div class="masthead-subheading">(Optimalisasi Pendampingan Petugas Kelurahan Cinta Statistik Kota Madiun)</div>
            <a class="btn btn-warning btn-lg text-uppercase text-white" href="{{ route('login') }}">Mulai</a>
        </div>
    </header> <!-- End Home -->

    <!-- ======= About Section ======= -->
    <section id="tentang" class="tentang">
        <div class="container">
            <i class="bi bi-geo-fill"></i>
            <center><h3>PETA KOTA MADIUN</h3></center>
            <br>
            <div class="embed-responsive embed-responsive-21by9">
                <iframe
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d63271.893040272866!2d111.49303169146093!3d-7.629975418913439!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e79be537c813a33%3A0xafe2f173545a53ae!2sMadiun%2C%20Kota%20Madiun%2C%20Jawa%20Timur!5e0!3m2!1sid!2sid!4v1658296052969!5m2!1sid!2sid"
                    width="1100" height="800" style="border:0;" allowfullscreen="" loading="lazy"
                    referrerpolicy="no-referrer-when-downgrade"></iframe>
                <br><br>
                <div>
                <center ><h3>Madiun</h3></center><br>
                    <p style="text-align:justify; width:1100px;">(bahasa Jawa: Hanacaraka: ꦩꦝꦶꦪꦸꦤ꧀, Pegon: مادييون, translit. Madhiyun)
                        adalah sebuah kota di Provinsi Jawa Timur, Indonesia. Kota ini terletak 160 km sebelah barat
                        Surabaya, atau 111 km sebelah timur Surakarta, Jawa Tengah. Di kota ini terdapat Industri kereta
                        api (INKA) dan memiliki sekolah tinggi perkeretaapian, yakni salah satunya Politeknik Perkeretaapian
                        Indonesia. Kota Madiun mendapat julukan sebagai "Kota Gadis", "Kota Brem", "Kota Pecel", "Kota Budaya",
                        "Kota Industri", "Kota Karismatik", dan "Kota Pendekar".</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer Start -->
    @include('layouts.footer')
    <!-- Footer End -->


    <!-- Bootstrap core JS-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Core theme JS-->
    <script src="js/scripts.js"></script>
    <!-- * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *-->
    <!-- * *                               SB Forms JS                               * *-->
    <!-- * * Activate your form at https://startbootstrap.com/solution/contact-forms * *-->
    <!-- * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *-->
    <script src="https://cdn.startbootstrap.com/sb-forms-latest.js"></script>
</body>

</html>