<?php
  session_start();
  require_once "pdo.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <link rel="stylesheet" href="style/Untitled-2.css">
    <title>My Hobby</title>
</head>
<body>
  <!--NAVBAR-->
    <nav class="navbar navbar-expand-lg" style="background-color:#FF731D;">
        <div class="container-fluid" >
          <a class="navbar-brand" href="#">My Hobby</a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
              <!--<li class="nav-item">
                <a class="nav-link active" aria-current="page" href="#">Home</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="about.php">About</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="login.php">Log In</a>
              </li>-->
              <?php
                if (isset($_SESSION["name"])) {
                  echo('
                  <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="#">Home</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="about.php">About</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="logout.php">Log Out</a>
              </li>
                    <li class="nav-item">
                  <a class="nav-link" href="edit.php">Edit</a>
                </li>');
                }
                else {
                  echo('
                  <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="#">Home</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="about.php">About</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="login.php">Log In</a>
              </li>');
                }
              ?>
            </ul>
            <form class="d-flex" role="search">
              <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
              <button class="btn btn-outline-success" type="submit">Search</button>
            </form>
          </div>
        </div>
      </nav>
  
  <!--MAIN-->
  <main>
    <!--HEADER-->
  <header>
    <h2>Merajut masa depan dengan passion</h2>
  </header>
  <div class="row">
    <div class="col-8">  
    <p>
      Hobi adalah kegiatan rekreasi yang dilakukan pada waktu luang untuk menenangkan pikiran seseorang. Sementara menurut Kamus Besar Bahasa Indonesia (KBBI), Hobi adalah kata benda (noun) yang dapat diartikan sebagai kegemaran; kesenangan istimewa pada waktu senggang, bukan sebagai pekerjaan utama.[1]
      Kata Hobi merupakan sebuah kata serapan dari Bahasa Inggris "Hobby". Turunan kata dari hobi dalam Kamus Besar Bahasa Indonesia yaitu pehobi. Pehobi merupakan orang yang memiliki hobi atau kegemaran.
    </p>
    
    </div>
    
    <div class="col-4">
        <img src="https://cdf.orami.co.id/unsafe/cdn-cas.orami.co.id/parenting/images/quote-albert-einstein.width-800.jpegquality-80.jpg" alt="einstein" class="img-fluid img-thumbnail">
        <p>“Life is like riding a bicycle. To keep your balance, you must keep moving.” ~Albert Einstein</p>
    </div>  
    <div class="col-12">
    <p>
      Bila banyak orang yang melakukan hobi untuk mengurangi rasa stres akibat tekanan pekerjaan, ada pula orang orang yang bekerja untuk menikmati waktu dan terhindar dari stres. Kondisi itu sangat mungkin terjadi saat kamu menikmati apa yang kamu kerjakan di kantor, layaknya melakukan sebuah hobi. Menariknya, semakin berkembangnya zaman dan cakupan lapangan pekerjaan, kini ada sejumlah jurusan yang dapat membimbing kamu mendapatkan pekerjaan sesuai dengan hobi. Tak hanya pada saat bekerja saja, bila kamu memilih jurusan sesuai dengan minat atau hobi yang ditekuni, maka proses belajar tentu menjadi lebih mudah sehingga kamu sangat mungkin berprestasi.
    </p>
  </div>
    
  </div>
  <!--Carousel-->
  <div class="row">
    <div class="d-flex justify-content-center">
    <div class="col-md-4" style="margin-left:15px;">
      
  <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="false">
    <div class="carousel-indicators">
      <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
      <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
      <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
    </div>
    <div class="carousel-inner">
      <div class="carousel-item active">
        <img src="https://asset.kompas.com/crops/w1GzbMvF7D-B9cPX_t4jiC4u6Q4=/0x0:800x533/750x500/data/photo/2018/02/14/2062104060.jpg" class="d-block w-100" alt="...">
        <div class="carousel-caption d-none d-md-block">
          <h5>Travelling</h5>
          <p>Some representative placeholder content for the first slide.</p>
        </div>
      </div>
      <div class="carousel-item">
        <img src="https://media.istockphoto.com/photos/portrait-of-cheerful-young-woman-looking-at-seedlings-in-pot-through-picture-id1309809092?k=20&m=1309809092&s=612x612&w=0&h=MZTYoAWL4fhJ95pCPku4zmEHDa6VOOlPlIVYqGt-Zyc=" class="d-block w-100" alt="...">
        <div class="carousel-caption d-none d-md-block">
          <h5>Planters</h5>
          <p>Some representative placeholder content for the second slide.</p>
        </div>
      </div>
      <div class="carousel-item">
        <img src="https://media.istockphoto.com/photos/master-works-on-the-potters-wheel-creating-a-jug-of-clay-picture-id1205314798?s=612x612" class="d-block w-100" alt="...">
        <div class="carousel-caption d-none d-md-block">
          <h5>Artist</h5>
          <p>Some representative placeholder content for the third slide.</p>
        </div>
      </div>
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Next</span>
    </button>
  </div>
  <p>Wujudkan Impian dengan Kegemaran dan Semangat !</p>
  </div>
  </div>
  </div>
  <!--END CAROUSEL-->
  
  <header>
    <h2>Ini Hobiku !</h2>
  </header>
  <div class="row">
    <div class="col-8">
      <p>
        <img src="https://media.istockphoto.com/photos/female-swimmer-at-the-swimming-pool-picture-id465383082?s=612x612" alt=".." class="img-fluid img-thumbnail" width="70%"> <br>
        Berenang adalah gerakan sewaktu bergerak di air. Berenang biasanya dilakukan tanpa perlengkapan buatan. Kegiatan ini dapat dimanfaatkan untuk rekreasi dan olahraga. Berenang dipakai sewaktu bergerak dari satu tempat ke tempat lainnya di air, mencari ikan, mandi, atau melakukan olahraga air.

Berenang sangat berguna sebagai alat pendidikan, sebagai rekreasi yang sehat, menanamkan keberanian, percaya diri, dan sebagai terapi yang terkadang dianjurkan oleh dokter, serta untuk keselamatan diri atau orang lain.[1] Berenang untuk keperluan rekreasi dan kompetisi dilakukan di kolam renang. Manusia juga berenang di sungai, danau, dan laut sebagai bentuk rekreasi. Olahraga renang membuat tubuh sehat karena hampir semua otot tubuh dipakai sewaktu berenang.
      </p>
    </div>
    <div class="col-4">
      <p>
        Nama : Muhammad Haikal Rahman <br>
        NIM  : 211401104 <br>

      </p>
    </div>
  </div>
  <div class="row">
    <div class="col-8">
      <p>
        <img src="https://images.unsplash.com/photo-1546519638-68e109498ffc?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1790&q=80" alt=".."class="img-fluid img-thumbnail" width="70%"><br>
        Bola basket adalah olahraga bola berkelompok yang terdiri atas dua tim beranggotakan masing-masing lima orang yang saling bertanding mencetak poin dengan memasukkan bola ke dalam keranjang lawan.[1] Bola basket dapat di lapangan terbuka, walaupun pertandingan profesional pada umumnya dilakukan di ruang tertutup. Lapangan pertandingan yang diperlukan juga relatif tidak besar, misal dibandingkan dengan sepak bola.[2] Selain itu, permainan bola basket juga lebih kompetitif karena tempo permainan cenderung lebih cepat jika dibandingkan dengan olahraga bola yang lain, seperti voli dan sepak bola.[3]

Bola basket menjadi salah satu olahraga yang paling digemari oleh penduduk Amerika Serikat dan penduduk di belahan bumi lainnya, antara lain di Amerika Selatan, Eropa Selatan, Lithuania, dan juga di Indonesia. Banyak kompetisi bola basket yang diselenggarakan setiap tahun, seperti British Basketball League (BBL) di Inggris, National Basketball Association (NBA) di Amerika, dan Indonesia Basketball League (IBL) di Indonesia.[4] Bola basket merupakan salah satu cabang olahraga yang menuntut VO2 max tinggi. Dengan latihan VO2 max ini dapat ditingkatkan yang menghasilkan peningkatan hanya berkisar 25% dari kondisi awal latihan. Dari latihan tersebut elebihnya ditentukan oleh potensi fisik yang ada pada setiap individu.[5][butuh sumber yang lebih baik] Bola basket merupakan cabang olahraga dengan waktu istirahat yang lebih lama, sehingga dapat memanfaatkan teknik recovery dengan tepat.[6]
      </p>
    </div>
    <div class="col-4">
      <p>
        Nama : Muhammad Haikal Rahman <br>
        NIM  : 211401104 <br>
      </p>
    </div>
  </div>
  <?php
  if (isset($_SESSION["name"])){
    
    try{
      $stmt = $pdo->prepare("SELECT * FROM sport");
      $stmt->execute();
  
      // set the resulting array to associative
      $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
      if ($result !== false) {
        echo('BERHASIL');//die();
        while ($row = $stmt->fetch()) {
          $stmte = $pdo->prepare("SELECT name from account WHERE id=?");
          $stmte->bindParam(1, $row['id']);
          $stmte->execute();
          $rowq = $stmte->fetchAll(PDO::FETCH_ASSOC);
          foreach ($rowq as $rowx) $namas=$rowx['name']; 
          echo ('
          <div class="row">
    <div class="col-8">
      <p>
        <img src="'.$row['url_pict'].'"alt="'.$row['sport'].'"class="img-fluid img-thumbnail" width="70%"><br>'.$row['expr'].'</p>
        </div>
    <div class="col-4">
      <p>
        Nama :'.$namas.'<br>
        NIM  : 211401104 <br>

      </p>
    </div>
  </div>');
      }
      
    }
    }
    catch(PDOException $e) {
      echo "Error: " . $e->getMessage();
  }
}

  ?>
</main>
  
  <!--FOOTER-->
  <!-- Footer -->
<footer class="text-center text-lg-start bg-white text-muted">
  <!-- Section: Social media -->
  <section class="d-flex justify-content-center justify-content-lg-between p-4 border-bottom">
    <!-- Left -->
    <div class="me-5 d-none d-lg-block">
      <span>Get connected with us on social networks:</span>
    </div>
    <!-- Left -->

    <!-- Right -->
    <div>
      <a href="" class="me-4 link-secondary">
        <i class="fab fa-facebook-f"></i>
      </a>
      <a href="" class="me-4 link-secondary">
        <i class="fab fa-twitter"></i>
      </a>
      <a href="" class="me-4 link-secondary">
        <i class="fab fa-google"></i>
      </a>
      <a href="" class="me-4 link-secondary">
        <i class="fab fa-instagram"></i>
      </a>
      <a href="" class="me-4 link-secondary">
        <i class="fab fa-linkedin"></i>
      </a>
      <a href="" class="me-4 link-secondary">
        <i class="fab fa-github"></i>
      </a>
    </div>
    <!-- Right -->
  </section>
  <!-- Section: Social media -->

  <!-- Section: Links  -->
  <section class="">
    <div class="container text-center text-md-start mt-5">
      <!-- Grid row -->
      <div class="row mt-3">
        <!-- Grid column -->
        <div class="col-md-3 col-lg-4 col-xl-3 mx-auto mb-4">
          <!-- Content -->
          <h6 class="text-uppercase fw-bold mb-4">
            <i class="fas fa-gem me-3 text-secondary"></i>Company name
          </h6>
          <p>
            Here you can use rows and columns to organize your footer content. Lorem ipsum
            dolor sit amet, consectetur adipisicing elit.
          </p>
        </div>
        <!-- Grid column -->

        <!-- Grid column -->
        <div class="col-md-2 col-lg-2 col-xl-2 mx-auto mb-4">
          <!-- Links -->
          <h6 class="text-uppercase fw-bold mb-4">
            Products
          </h6>
          <p>
            <a href="#!" class="text-reset">Angular</a>
          </p>
          <p>
            <a href="#!" class="text-reset">React</a>
          </p>
          <p>
            <a href="#!" class="text-reset">Vue</a>
          </p>
          <p>
            <a href="#!" class="text-reset">Laravel</a>
          </p>
        </div>
        <!-- Grid column -->

        <!-- Grid column -->
        <div class="col-md-3 col-lg-2 col-xl-2 mx-auto mb-4">
          <!-- Links -->
          <h6 class="text-uppercase fw-bold mb-4">
            Useful links
          </h6>
          <p>
            <a href="#!" class="text-reset">Pricing</a>
          </p>
          <p>
            <a href="#!" class="text-reset">Settings</a>
          </p>
          <p>
            <a href="#!" class="text-reset">Orders</a>
          </p>
          <p>
            <a href="#!" class="text-reset">Help</a>
          </p>
        </div>
        <!-- Grid column -->

        <!-- Grid column -->
        <div class="col-md-4 col-lg-3 col-xl-3 mx-auto mb-md-0 mb-4">
          <!-- Links -->
          <h6 class="text-uppercase fw-bold mb-4">Contact</h6>
          <p><i class="fas fa-home me-3 text-secondary"></i> New York, NY 10012, US</p>
          <p>
            <i class="fas fa-envelope me-3 text-secondary"></i>
            info@example.com
          </p>
          <p><i class="fas fa-phone me-3 text-secondary"></i> + 01 234 567 88</p>
          <p><i class="fas fa-print me-3 text-secondary"></i> + 01 234 567 89</p>
        </div>
        <!-- Grid column -->
      </div>
      <!-- Grid row -->
    </div>
  </section>
  <!-- Section: Links  -->

  <!-- Copyright -->
  <div class="text-center p-4" style="background-color: rgba(0, 0, 0, 0.025);">
    © 2021 Copyright:
    <a class="text-reset fw-bold" href="https://mdbootstrap.com/">MDBootstrap.com</a>
  </div>
  <!-- Copyright -->
</footer>
<!-- Footer -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
</body>
</html>