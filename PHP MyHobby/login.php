<?php
    require_once "pdo.php";
    
    session_start();
    if (isset($_SESSION["name"])){
      echo('Anda sudah melakukan login');
      die();
    }
    /*
    Construir la ruta a la cual va a ser redireccionado
    en caso de colocar la password correcta o de darle click
    a "Cancel"
    */
    $host = $_SERVER['HTTP_HOST'];
    $ruta = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
    $url = "http://$host$ruta"; // ruta completa construida

    // si el botón "Cancel fue presionado"
    /*
if (isset($_POST["cancel"])) {
    header("Location: $url/Untitled-1.php");
    die();
}*/
    /*
    Verificar si todos los campos del formulario fueron llenados
    para luego verificar si la contraseña escrita es la correcta
    */
if (isset($_POST["email"]) && isset($_POST["pass"])) {
    //unset($SESSION["name"]);
    
        
    $salt = 'XyZzy12*_';
    // md5 is generado al concatenar $salt y "pass"
    $check = hash("md5", $salt . $_POST["pass"]);
    $stmt = $pdo->prepare(
        'SELECT id, name
        FROM account
        WHERE
        email =:em AND 
        password=:pw'
    );
    $stmt->execute(array( ':em' => $_POST['email'],':pw' => $check));
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
    
    
    if ($row !== false) {
        error_log("Login success " . $_POST['email'] . "\n", 3, "logs.log");
        $_SESSION["user_id"] = $row["id"];
        $_SESSION["name"] = $row["name"];
        header("Location: $url/Untitled-1.php");
        //die();
    } else {
        $_SESSION["error"] = "Incorrect email or password";
        error_log("Login fail " .$_POST['email']. " $check" . "\n", 3, "logs.log");
        header("Location: $url/login.php");
        die();
    }
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
                <a class="nav-link" href="login.php">Log In</a> 
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
      <h2>Log In</h2>
    </header>
    <section class="vh-100">
      <div class="container-fluid h-custom">
        <div class="row d-flex justify-content-center align-items-center h-100">
          <div class="col-md-9 col-lg-6 col-xl-5">
            <img src="https://images.unsplash.com/photo-1592091077268-001e76b9d3a8?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1548&q=80"
              class="img-fluid" alt="Sample image">
          </div>
          
          <div class="col-md-8 col-lg-6 col-xl-4 offset-xl-1">
          <?php
              if (isset($_SESSION["error"])) {
                  echo('<p style="color: red;">'. $_SESSION["error"]);
                  //unset($_SESSION["error"]);
              }
              
            ?>
            <form method="post">
              <!-- Email input -->
              <div class="form-outline mb-4">
                <input type="email" id="form3Example3" class="form-control form-control-lg" name="email"
                  placeholder="Enter a valid email address" />
                <label class="form-label" for="form3Example3">Email address</label>
              </div>
    
              <!-- Password input -->
              <div class="form-outline mb-3">
                <input type="password" id="form3Example4" class="form-control form-control-lg" name="pass"
                  placeholder="Enter password" />
                <label class="form-label" for="form3Example4">Password</label>
              </div>
    
              <div class="d-flex justify-content-between align-items-center">
                <!-- Checkbox -->
                <div class="form-check mb-0">
                  <input class="form-check-input me-2" type="checkbox" value="" id="form2Example3" />
                  <label class="form-check-label" for="form2Example3">
                    Remember me
                  </label>
                </div>
                <a href="#!" class="text-body">Forgot password?</a>
              </div>
    
              <div class="text-center text-lg-start mt-4 pt-2">
              <input type="submit" class="btn btn-primary btn-lg" style="padding-left: 2.5rem; padding-right: 2.5rem;"value='Login'
              onclick="return doValidate();">
                <p class="small fw-bold mt-2 pt-1 mb-0">Don't have an account? <a href="signup.php"
                    class="link-danger">Register</a></p>
              </div>
    
            </form>
          </div>
        </div>
      </div>
      <script>
        function doValidate()
        {
            console.log("Validating...");
            try
            {
                email = document.getElementById("form3Example3").value;
                pw = document.getElementById("form3Example4").value;
                console.log("Validating email="+email);
                console.log("Validating pw="+pw);
                if (pw == null || pw == "" || email == null || email == "")
                {
                    alert("Both fields must be filled out");
                    return false;
                }
                if(email.search("@") === -1)
                {
                    alert("Email address must contain @");
                    return false;
                }
                console.log(pw);
                return true;
            }
            catch(e)
            {
              console.log(pw);
                return false;
            }
            console.log(pw);
            return false;
        }
    </script>
      <div
        class="d-flex flex-column flex-md-row text-center text-md-start justify-content-between py-4 px-4 px-xl-5 bg-primary">
        <!-- Copyright -->
        <div class="text-white mb-3 mb-md-0">
          Copyright © 2020. All rights reserved.
        </div>
        <!-- Copyright -->
    
        <!-- Right -->
        <div>
          <a href="#!" class="text-white me-4">
            <i class="fab fa-facebook-f"></i>
          </a>
          <a href="#!" class="text-white me-4">
            <i class="fab fa-twitter"></i>
          </a>
          <a href="#!" class="text-white me-4">
            <i class="fab fa-google"></i>
          </a>
          <a href="#!" class="text-white">
            <i class="fab fa-linkedin-in"></i>
          </a>
        </div>
        <!-- Right -->
      </div>
    </section>
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