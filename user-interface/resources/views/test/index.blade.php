<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SB Admin 2 - Cards</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        @include('layouts.dashLayout')

        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->

                @include('layouts.header')
                
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                



                           <!-- Instructions Card -->
<div class="card mb-4 py-3 border-left-primary">
    <div class="card-body">
        <b>Instructions:</b> Make sure your webcam is enabled, and stay in a well-lit environment for accurate detection. 
        Answer honestly and remain focused throughout the test. Your facial expressions will be 
        recorded in real-time for analysis. All collected data is strictly confidential.
    </div>
</div>

<!-- Fill-up Form -->
<!-- Fill-up Form -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Fill Up Form</h6>
    </div>
    <div class="card-body">
        <form action="{{ route('test.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label>Full Name</label>
                <input type="text" id="full_name" name="full_name" class="form-control" placeholder="Your Full Name" required>
            </div>
            <div class="form-group">
                <label>College</label>
                <input type="text" id="college" name="college" class="form-control" placeholder="Select College" required>
            </div>
            <div class="form-group">
                <label>Course</label>
                <input type="text" id="course" name="course" class="form-control" placeholder="Select Course" required>
            </div>
            <div class="form-group">
                <label>Age</label>
                <input type="number" id="age" name="age" class="form-control" placeholder="Your Age" required>
            </div>
            <div class="form-group">
                <label>Contact Number</label>
                <input type="number" id="contact_number" name="contact_number" class="form-control" placeholder="Your Phone Number" required>
            </div>
            <div class="form-group">
                <label>Email</label>
                <input type="email" id="email" name="email" class="form-control" placeholder="Your Email" required>
            </div>

            <!-- Terms and Conditions Modal -->
            <div class="modal fade" id="termsModal" tabindex="-1" role="dialog" aria-labelledby="termsModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="termsModalLabel">Terms and Conditions</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <p><strong>1. Data Collection:</strong> Your face and voice will be recorded for analysis.</p>
                            <p><strong>2. Privacy:</strong> Your data will be kept confidential and used only for research purposes.</p>
                            <p><strong>3. Voluntary Participation:</strong> You can withdraw anytime before the analysis starts.</p>
                            <p><strong>4. Security:</strong> All stored data is encrypted and protected.</p>
                            <p>By proceeding, you agree to these terms.</p>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Checkbox with Modal Trigger -->
            <div class="form-group d-flex justify-content-between align-items-center">
                <div>
                    <input type="checkbox" id="accepted_terms" name="accepted_terms" value="1" required>
                    <label for="accepted_terms">I agree that my face and voice will be recorded for analysis.</label>
                </div>
                <button type="button" class="btn btn-link" data-toggle="modal" data-target="#termsModal">View Terms</button>
            </div>

            <button type="submit" class="btn btn-primary btn-block">Start Test</button>
        </form>
    </div>
</div>
                </div>
            </div>
        </div>
    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="login.html">Logout</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

</body>

</html>