<?php
    $title = 'Login';
    include './../layouts/header.php';
?>

    <main class="d-flex justify-content-center align-items-center flex-column" style="height:100vh; background-color: #10AAC2;">

    <div class="container">
        <div class="row">
            <div class="col-md-9 col-lg-6 mx-auto">
                <div class="form-container">
                    <form class="form-horizontal" method="POST" id="frm-info">
                        <h3 class="title">Hi there.</h3>
                        <span class="description">To log into your account please fill the info below</span>
                    <div class="form-group">
                        <input class="form-control" type="text" id="email" placeholder="Enter your Email">
                    </div>
                    
                    <div class="form-group">
                        <div class="input-group">
                            <input class="form-control" type="password" id="password" placeholder="Enter your Password">
                            <span class="input-group-text" id="togglePassword" style="cursor: pointer;">
                                <i class="bi bi-eye-slash" id="eyeIcon"></i> 
                            </span>
                        </div>
                    </div>
                    <button type="submit" class="btn signin">Login</button>
                    <span class="signup">or <a href="#">Sign up</a></span>
                    <span class="forgot"><a href="">Forgot Password?</a></span>
                    </form>
                </div>
            </div>
        </div>
    </div>


    <div class="modal fade" id="mdl-message" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content rounded-0">
            <div class="modal-body">
                <div>
                    <img src="/../assets/img/fail-icon.png"  alt="">
                </div>
                <h3 class="text-danger fw-bold mt-3">Login failed</h3>
                <p id="message-fail" class="text-danger fw-medium"></p>
            </div>
            <div class="modal-footer border-0">
                <button type="button" class="btn btn-dark w-100 rounded-5" data-bs-dismiss="modal">Close</button>
            </div>
            </div>
        </div>
        </div>
        

    </main>

<?php
    include './../layouts/footer.php';
?>