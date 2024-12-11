<?php
    $title = 'Login';
    include './../layouts/header.php';


    if(isset($_POST['email']) && isset($_POST['pass'])){
        $email = strval($_POST['email']);
        $pass = strval($_POST['pass']);

        if($email == 'admin@gmail.com' &&  $pass == '123'){
            header('Location:/index.php');
            exit();
        }
        elseif(empty($_POST['email']) || empty($_POST['pass'])){
            $message = 'Please fill the fields.';
        }
        else{
            $message = 'Incorrect email or password.';
        }
        
        // elseif($email != 'admin@gmail.com' &&  $pass != '123'){
        //     if($email != 'admin@gmail.com'){
        //         $message = 'Incorrect email.';
        //     }
        //     elseif($pass != '123'){
        //         $message = 'Incorrect password.';
        //     }
        // }

    }

?>

    <main class="d-flex justify-content-center align-items-center" style="height:100vh; background-color: white;">
        <section class="container-fluid">
            <div class="row">
                
                <div class="col-6 bg-blue d-flex justify-content-center align-items-end">
                    <div class="row">
                        <div class="col-12 d-flex justify-content-center align-items-end px-5" style="height:30vh; ">
                            <h1 class="text-center text-white">SurSdey!! Welcome to <span class="shadow-1">ReanCode</span> platform</h1>
                        </div>
                        <div class="col-12 d-flex justify-content-center align-items-end" style="height:70vh; ">
                        <img src="/../assets/img/person.png" class="w-50 " alt="">
                        </div>
                    </div>
                    
                </div>
                <div class="col-6 my-auto">
                    <div class="row">
                        <div class="col-7 mx-auto">
                            <h1 class="text-center">Login</h1>
                            <p class="fw-medium fs-5 text-center">Please enter your details below to log in</p>
                                <span>
                                        <?php
                                            if(isset($message)){
                                                    echo '<div class="alert alert-danger">'.$message.'</div>';  
                                                    // echo '<p class="text-danger">'.$message.'</p>';  
                                            }
                                        ?>
                                </span>
                            <form action="./login.php" method="POST">
                                <div class="form-floating mb-3">
                                    <input type="email" class="form-control" id="email" name="email" placeholder="Email">
                                    <label for="email">Email address</label>
                                </div>
                                <div class="form-floating">
                                    <input type="password" class="form-control" id="pass" name="pass" placeholder="Password">
                                    <label for="pass">Password</label>
                                </div>
                                <button type="submit" class="btn bg-blue fw-bold w-100 my-3 py-2 text-white rounded-1">Login</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>

<?php
    include './../layouts/footer.php';
?>