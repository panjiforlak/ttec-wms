<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Pages / Login - NiceAdmin Bootstrap Template</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href="assets/img/favicon.psng" rel="icon">
    <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.gstatic.com" rel="preconnect">
    <link
        href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
        rel="stylesheet">

    <!-- Vendor CSS Files -->
    <!-- <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
    <link href="assets/vendor/quill/quill.snow.css" rel="stylesheet">
    <link href="assets/vendor/quill/quill.bubble.css" rel="stylesheet">
    <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
    <link href="assets/vendor/simple-datatables/style.css" rel="stylesheet"> -->

    <!-- Template Main CSS File -->
    <link href="assets/css/style.css" rel="stylesheet">

    <!-- =======================================================
  * Template Name: NiceAdmin - v2.5.0
  * Template URL: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>
    <main>
        <!-- toast -->
        <?php if ($this->session->flashdata('success_login')) : ?>
        <div class="position-fixed bottom-0 right-0 p-3" style="z-index: 5; right: 0; top: 0; width:300px">
            <div id="liveToast" class="toast hide" role="alert" aria-live="assertive" aria-atomic="true"
                data-delay="2000">
                <div class="toast-header bg-success text-white">
                    <i class="fas fa-fw fa-exclamation-triangle"></i>
                    <strong class="mr-auto">&nbsp; Notification</strong>
                    <small>just now</small>
                    <button type="button" class="ml-2 mb-1 close" data-dismiss="toast" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="toast-body">
                    <?php echo $this->session->flashdata('success_login'); ?>
                </div>
            </div>
        </div>
        <?php endif; ?>
        <?php if ($this->session->flashdata('error_login')) : ?>
        <div class="position-fixed bottom-0 right-0 p-3" style="z-index: 5; right: 0; top: 0; width:300px">
            <div id="liveToast" class="toast hide" role="alert" aria-live="assertive" aria-atomic="true"
                data-delay="2000">
                <div class="toast-header bg-danger text-white">
                    <i class="fas fa-fw fa-exclamation-triangle"></i>
                    <strong class="mr-auto">&nbsp; Oops !</strong>
                    <small>just now</small>
                    <button type="button" class="ml-2 mb-1 close" data-dismiss="toast" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="toast-body">
                    <?php echo $this->session->flashdata('error_login'); ?>

                </div>
            </div>
        </div>
        <?php endif; ?>
        <!-- end toast -->
        <div class="container">

            <section
                class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center py-0">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-lg-4 col-md-6 d-flex flex-column align-items-center justify-content-center">
                            <div class="card mb-5">
                                <div class="card-body">
                                    <div class="pt-4 pb-2">
                                        <div class="d-flex justify-content-center py-0">
                                            <a href="index.html" width='100'
                                                class="logo d-flex align-items-center w-auto ">
                                                <img src="assets/img/ttec-logo.jpg" alt="">
                                                <span class="d-none d-lg-block"></span>
                                            </a>
                                        </div><!-- End Logo -->
                                        <h5 class="card-title text-center pb-0 fs-4">.: WAREHOUSE MANAGEMENT :.</h5>
                                        <p class="text-center small">Enter your email & password to login</p>
                                    </div>

                                    <form class="row g-3 needs-validation" method="post"
                                        action="<?php echo base_url('auth'); ?>" novalidate>

                                        <div class="col-12">
                                            <label for="yourUsername" class="col-form-label">Email</label>
                                            <div class="input-group">
                                                <div class="input-group-prepend ">
                                                    <span class="input-group-text "
                                                        id="inputGroupPrepend1 basic-addon1"><i
                                                            class="fas fa-envelope"></i></span>
                                                </div>
                                                <input type="text" id="inputEmailAddress" class="form-control"
                                                    name="email" placeholder="Enter email address"
                                                    aria-describedby="inputGroupPrepend1" required>
                                                <?php echo form_error('email', '<small class="text-danger pl-2 mt-0">', '</small>'); ?>
                                            </div>
                                        </div>

                                        <div class="col-12">
                                            <label for="yourPassword" class="col-form-label">Password</label>
                                            <div class="input-group">
                                                <div class="input-group-prepend ">
                                                    <span class="input-group-text "
                                                        id="inputGroupPrepend2 basic-addon1"><i
                                                            class="fas fa-lock"></i></span>
                                                </div>
                                                <input class="form-control" id="inputPassword" type="password"
                                                    name="password" placeholder="Enter password"
                                                    aria-describedby="inputGroupPrepend2" required />
                                                <?php echo form_error('password', '<small class="text-danger pl-2">', '</small>'); ?>
                                            </div>
                                            <div class="invalid-feedback">Please enter your password!</div>
                                        </div>

                                        <div class="col-12 mt-5">
                                            <button class="btn btn-dark w-100 mr-3" type="submit">Login</button>
                                        </div>
                                        <div class="col-12">
                                            <p class="small mb-0">Don't have account? <a href="#">Create an
                                                    account</a></p>
                                            <!-- disable auth register <?php echo base_url('auth/register'); ?> -->
                                        </div>
                                    </form>

                                </div>
                            </div>


                        </div>
                    </div>
                </div>

            </section>

        </div>
    </main><!-- End #main -->

    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
            class="bi bi-arrow-up-short"></i></a>

    <!-- Vendor JS Files -->
    <!-- <script src="assets/vendor/apexcharts/apexcharts.min.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/chart.js/chart.umd.js"></script>
  <script src="assets/vendor/echarts/echarts.min.js"></script>
  <script src="assets/vendor/quill/quill.min.js"></script>
  <script src="assets/vendor/simple-datatables/simple-datatables.js"></script>
  <script src="assets/vendor/tinymce/tinymce.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script> -->

    <!-- Template Main JS File -->
    <!-- <script src="assets/js/main.js"></script> -->

</body>

</html>