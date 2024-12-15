<?php
    $title = 'Home';
    include './layouts/header.php';
    include './layouts/navbar.php';
?>

    <main class="bg-blue 90vh">
        <section class="container">
            <div class="row">
                <div class="col-6 h-90 d-flex justify-content-center align-items-start flex-column">
                    <div class="row ">
                        <div class="col-12 mb-5">
                            <h1>The Best Online Courses You'll Find</h1>
                            <button class="btn btn-dark rounded-1 mt-4">Explore Courses</button>
                        </div>
                        <div class="col-6 mt-5">
                            <div class="box rounded-1 px-4 py-1 fw-semibold bg-purple">
                                <div class="d-flex justify-content-between py-3">
                                    <span >Happy <br>Students</span>
                                    <span>/2024</span>
                                </div>
                                <div class="py-3">
                                    <span class="fs-3">10,000+</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-6 mt-5">
                            <div class="box rounded-1 px-4 py-1 fw-semibold bg-yellow">
                                <div class="d-flex justify-content-between py-3">
                                    <span >Expert <br>Teachers</span>
                                    <span>/2024</span>
                                </div>
                                <div class="py-3">
                                    <span class="fs-3">500+</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-6 ps-5 h-90 d-flex justify-content-center align-items-center">
                    <img src="/assets/img/herobanner/herobanner.png" class="w-100" alt="">
                </div>
            </div>
        </section>
    </main>
    
<?php
    include './layouts/footer.php';
?>
    
