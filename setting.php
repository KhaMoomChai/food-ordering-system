<?php
if(!isset($_SESSION)){ session_start();}
include_once __DIR__."/user_auth.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Food Ordering System</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

</head>
<body>
    <div class="contianer">
        <div class="row">
            <section class="vh-120 m-0 py-5" style="background-color: #364f6b;">
            <div class="container py-2 h-100">
                <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col col-xl-6">
                    <div class="card" style="border-radius: 1rem;">
                    <div class="row g-0">       
                        <div class="col-md-12 col-lg-12 d-flex align-items-center">
                        <div class="card-body pt-5 px-lg-5 text-black">
                            <!-- <div class=" d-flex align-items-center mb-2 pb-1">
                                <i class="fas fa-cubes fa-2x me-3" style="color: #ffa010;">Logo</i>
                                <span class="h1 fw-bold mb-0">Eat Me</span>
                            </div> -->
                            <h4 class="fw-normal mb-3 " style="letter-spacing: 1px;"><i class="bi bi-pencil-square"></i>Account Setting</h4>
                            <?php include "message.php"?>
                            <form action="controller/settingController.php" method="post">
                            <div class="form-outline mb-3">
                                <label class="form-label">Name</label>
                                <input type="text" name="name" class="form-control form-control-lg" value="<?php echo $_SESSION['my_login']['name']?>" required/>
                            </div>
                            <div class="form-outline mb-3">
                                <label class="form-label">Current Password</label>
                                <input type="text" name="c_password" class="form-control form-control-lg" required/>
                            </div>
                            <div class="form-outline mb-3">
                                <label class="form-label">New Password</label>
                                <input type="text" name="n_password" class="form-control form-control-lg" required/>
                            </div>
                            <div class="form-outline mb-3">
                                <label class="form-label">Comfirm New Password</label>
                                <input type="text" name="c_n_password" class="form-control form-control-lg" required/>
                            </div>
                            <div class="pt-1 mb-3">
                                <button class="btn btn-lg" name="change" type="submit" style="background-color:#ffa010;color:white">Save Change</button>
                                <a href="menudetails.php" class="btn btn-lg mx-4 border border-warning" name="change" type="submit">Back</a>

                            </div>
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
</body>
</html>