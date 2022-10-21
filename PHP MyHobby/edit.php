<?php
    require_once "pdo.php";
    session_start();
    if (!isset($_SESSION["name"])){
      echo('Anda belum melakukan login');
      die();
    }
    $host = $_SERVER['HTTP_HOST'];
    $ruta = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
    $url = "http://$host$ruta"; // ruta completa construida
    if (isset($_POST["sport"]) && isset($_POST["expr"]) &&(!isset($_REQUEST['ed']))) {
      try {
      $statement = $pdo->prepare('INSERT INTO sport
      VALUES (?,?,?,?,?)');
      $j=$_SESSION['user_id'].$_POST['sport'];
   $statement->bindParam(1, $_SESSION['user_id']);
   $statement->bindParam(2, $_POST['sport']);
   $statement->bindParam(3, $_POST['expr']);
   $statement->bindParam(4, $_POST['url']);
   $statement->bindParam(5,$j);
   $statement->execute();
   // tampilkan hasil proses query
   echo $statement->rowCount()." data berhasil ditambahkan";
      }
      catch (PDOException $e) {
        // tampilkan pesan kesalahan jika koneksi gagal
        print "koneksi/query bermasalah: " . $e->getMessage() . "<br/>";
        die();}
  }
  if (!isset($_REQUEST['ed'])){
  $stmt = $pdo->prepare("SELECT sport, expr,url_pict,id_post from sport WHERE id=?");
  $stmt->bindParam(1, $_SESSION['user_id']);
  $stmt->execute();
  $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);}
  //$rows= $stmt->fetch();}
  //$rows = $stmt->fetchAll();}
else if(isset($_POST["sport1"]) && isset($_POST["expr1"])&& isset($_POST["url1"])&&isset($_REQUEST['ed'])){
  try {
    $statement = $pdo->prepare('UPDATE sport
    SET sport=:pid,expr=:uid,url_pict=:fn WHERE id_post=:ln');
    $statement->execute(array(
      ':ln' => $_REQUEST['ed'],
      ':pid' => $_POST['sport1'],
      ':uid' => $_POST['expr1'],
      ':fn' => $_POST['url1'],
      )
);
 // tampilkan hasil proses query
 echo $statement->rowCount()." data berhasil ditambahkan";
 echo 'awqs';
    }
    catch (PDOException $e) {
      // tampilkan pesan kesalahan jika koneksi gagal
      if (isset($_POST['url1'])){
      echo $_SESSION["user_id"];}
      else echo ('AWIK');
      print "Salah: " . $e->getMessage() . "<br/>";
      die();}
}
if (isset($_REQUEST['profile_id'])){
  $stmt = $pdo->prepare('DELETE FROM sport WHERE id_post=:pid');
    $stmt->execute(array(':pid' => $_REQUEST['profile_id']));
    #$_REQUEST['profile_id']=NULL;
}
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
          <a class="navbar-brand" href="Untitled-1.php">My Hobby</a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
              <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="Untitled-1.php">Home</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="about.php">About</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="logout.php">Log Out</a> 
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">Edit</a> 
              </li>
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
      <h2>Add Your Hobby!</h2>
    </header>
    <section class="vh-100" >
  <div class="mask d-flex align-items-center h-100 gradient-custom-3" >
    <div class="container h-100" style="background-color:#FFF7E9;">
      <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="col-12 col-md-9 col-lg-7 col-xl-6">
              <h2 class="text-uppercase text-center mb-5">Let's Share</h2>
              
              <form method="post">

                <div class="form-outline mb-4">
                  <input type="text" id="form3Example1cg" class="form-control form-control-lg" name="sport"/>
                  <label class="form-label" for="form3Example1cg">Your Sport</label>
                </div>
                <div class="form-outline mb-4">
                  <input type="text" id="form3Example1" class="form-control form-control-lg" name="url"/>
                  <label class="form-label" for="form3Example1">URL Picture Your Sport</label>
                </div>
                <div class="form-outline mb-4">
                <textarea class="form-control" id="exampleFormControlTextarea1" rows="5" name="expr"></textarea>
                  <label class="form-label" for="form3Example3cg">Your Experience</label>
                </div>
                <div class="d-flex justify-content-center">
                    <input type="submit" class="btn btn-primary btn-lg" style="padding-left: 2.5rem; padding-right: 2.5rem;"value='Add'
              onclick="return doValidate();">
                </div>
              </form>
        </div>
      </div>
    </div>
  </div>
</section>
<header>
      <h2>Edit</h2>
    </header>
    <?php
      if (!isset($_REQUEST['ed'])){
        foreach ($rows as $row) {

          echo('<a href="edit.php?profile_id='.$row['id_post'].'"class="link-primary">Delete</a>');
          echo('/');
          echo('<a href="edit.php?ed='.$row['id_post'].'"class="link-primary">Edit</a>');
          echo "<br>";
          echo('Sport : '.$row['sport']);
          echo "<br>";
          echo('Experience : '.$row['expr']);
          echo "<br>";
          echo('Url Picture : '.$row['url_pict']);
          echo "<br>";
          echo "<br>";
        }}
      else {
        echo('<section class="vh-100" >');
echo('  <div class="mask d-flex align-items-center h-100 gradient-custom-3" >');
echo('    <div class="container h-100" style="background-color:#FFF7E9;">');
echo('      <div class="row d-flex justify-content-center align-items-center h-100">');     
echo('        <div class="col-12 col-md-9 col-lg-7 col-xl-6">');
echo('              <h2 class="text-uppercase text-center mb-5">EDIT</h2>');
echo('              ');
echo('              <form method="post">');
echo('');
echo('                <div class="form-outline mb-4">');
echo('                  <input type="text" id="form3Example1cg" class="form-control form-control-lg" name="sport1"/>');
echo('                  <label class="form-label" for="form3Example1cg">Your Sport</label>');
echo('                </div>');
echo('                <div class="form-outline mb-4">');
echo('                  <input type="text" id="form3Example1" class="form-control form-control-lg" name="url1"/>');
echo('                  <label class="form-label" for="form3Example1">URL Picture Your Sport</label>');
echo('                </div>');
echo('                <div class="form-outline mb-4">');
echo('                <textarea class="form-control" id="exampleFormControlTextarea1" rows="5" name="expr1"></textarea>');
echo('                  <label class="form-label" for="form3Example3cg">Your Experience</label>');
echo('                </div>');
echo('                <div class="d-flex justify-content-center">');
echo('                    <input type="submit" class="btn btn-primary btn-lg" style="padding-left: 2.5rem; padding-right: 2.5rem;"value="Add"');
echo('              ">');
echo('                </div>');
echo('              </form>');
echo('        </div>');
echo('      </div>');
echo('    </div>');
echo('  </div>');
echo('</section>');
        
      }
        ?>
<script>
        function doValidate()
        {
            console.log("Validating...");
            try
            {
                sprt = document.getElementById("form3Example1cg").value;
                url = document.getElementById("form3Example1").value;
                ex = document.getElementById("exampleFormControlTextarea1").value;
                if (sprt == null || sprt == "" || ex == null || ex == ""||url == null || url == "")
                {
                    alert("Tirdth fields must be filled out");
                    return false;
                }
                return true;
            }
            catch(e)
            {
                return false;
            }
            return false;
        }
    </script>
    
</body>
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