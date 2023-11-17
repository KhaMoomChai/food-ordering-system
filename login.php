
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
</head>
<body>
    <div class="contianer">
        <div class="row">
            <div class="">
            <section class="vh-100" style="background-color: #364f6b;">
  <div class="container py-5 h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col col-xl-10">
        <div class="card" style="border-radius: 1rem;">
          <div class="row g-0">
            <div class="col-md-6 col-lg-5 d-none d-md-block">
                <!-- image size= 1280 * 1970 -->
              <img src="img/login.jpg"
                alt="login form" class="img-fluid" style="border-radius: 1rem 0 0 1rem;" />
            </div>
            <div class="col-md-6 col-lg-7 d-flex align-items-center">
              <div class="card-body p-4 p-lg-5 text-black">

                <form method="post" action="controller/loginController.php">
                
                  <div class="d-flex align-items-center mb-3 pb-1">
                    <i class="fas fa-cubes fa-2x me-3" style="color: #ffa010;">Logo</i>
                    <span class="h1 fw-bold mb-0">Eat Me</span>
                  </div>
                  <?php include_once __DIR__."/message.php" ?>
                  <h4 class="fw-normal mb-3 pb-3" style="letter-spacing: 1px;">Sign into your account</h4>
                  <div class="form-outline mb-4">
                  <label class="form-label">Email address</label>
                    <input type="email" name="email"  value="<?php if(isset($email))echo $email; ?>" class="form-control form-control-lg" />
                  </div>

                  <div class="form-outline mb-4">
                  <label class="form-label">Password</label>
                    <input type="password" name="password"  value="<?php if(isset($password))echo $password; ?>" class="form-control form-control-lg" />
                  </div>

                  <div class="pt-1 mb-4">
                    <button class="btn btn-lg " name="login" type="submit" style="background-color:#ffa010;color:white;">Login</button>
                    <a href="index.php" class="btn btn-lg border border-danger" name="login" type="submit" style="background-color:white;">Back</a>
                  
                  </div>
                  

                  <p class="mb-5 pb-lg-2" style="color: #393f81;">Don't have an account? 
                  <a href="register.php" class="text-warning"
                      style="color: #393f81;">Register here</a></p>
                </form>

              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
            </div>
        </div>
    </div>
</body>
</html>