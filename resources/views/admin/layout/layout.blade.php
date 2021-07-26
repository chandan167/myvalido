<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>{{ config('app.name') }} ADMIN | {{ $page_title }}</title>

    <!-- Custom fonts for this template-->
    <link href="{{ asset('admin/vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="{{ asset('admin/css/sb-admin-2.min.css') }}" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/crumina-fonts.css') }}">
    <link href="{{ asset('admin/vendor/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet">

</head>

<body id="page-top" class="@auth
    @else
                    bg-gradient-primary
@endauth">
    @auth
        <!-- Page Wrapper -->
        <div id="wrapper">


            <!-- Sidebar -->
            @include('admin.layout.sidenav')
            <!-- End of Sidebar -->



            <!-- Content Wrapper -->
            <div id="content-wrapper" class="d-flex flex-column">

                <!-- Main Content -->
                <div id="content">


                    <!-- Topbar -->
                    @include('admin.layout.nav')
                    <!-- End of Topbar -->



                    <!-- Begin Page Content -->
                    @yield('main')
                    <!-- /.container-fluid -->

                </div>
                <!-- End of Main Content -->

                <!-- Footer -->
                <footer class="sticky-footer bg-white">
                    <div class="container my-auto">
                        <div class="copyright text-center my-auto">
                            <span>Copyright &copy; Your Website 2020</span>
                        </div>
                    </div>
                </footer>
                <!-- End of Footer -->



            </div>
            <!-- End of Content Wrapper -->

        </div>
        <!-- End of Page Wrapper -->

        <a class="scroll-to-top rounded" href="#page-top">
            <i class="fas fa-angle-up"></i>
        </a>

        <!-- Logout Modal-->
        @include('admin.layout.logout_popup')

        <!-- Scroll to Top Button-->
    @else
        <!-- Begin Page Content -->
        @yield('main')
        <!-- /.container-fluid -->
    @endauth


    <script>
        const images = document.getElementsByTagName('img');
        Array(...images).forEach(image => {
            image.addEventListener('error', () => {
                image.src = "{{ asset(config('constant.default_image')) }}";
            })

        })

        const imgprev = document.getElementById('img-prev')
        if (imgprev) {
            const input = imgprev.querySelector('input');
            const img = imgprev.querySelector('img');

            input.addEventListener('change', (e) => {
                const [file] = input.files;
                if (file) {
                    var reader = new FileReader();
                    reader.onload = function() {
                        img.src = reader.result;
                    };
                    reader.readAsDataURL(file);
                }
            });

        }
    </script>
    <!-- Bootstrap core JavaScript-->
    <script src="{{ asset('admin/vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('admin/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

    <!-- Core plugin JavaScript-->
    <script src="{{ asset('admin/vendor/jquery-easing/jquery.easing.min.js') }}"></script>

    <!-- Custom scripts for all pages-->
    <script src="{{ asset('admin/js/sb-admin-2.min.js') }}"></script>

    <!-- Page level plugins -->
    <script src="{{ asset('admin/vendor/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('admin/vendor/datatables/dataTables.bootstrap4.min.js') }}"></script>

    <!-- Page level custom scripts -->
    <script src="{{ asset('admin/js/demo/datatables-demo.js') }}"></script>

    @yield('customjs')

</body>

</html>
