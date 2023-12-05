<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>DSS Santri Terbaik</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link href="https://cdn.datatables.net/v/bs5/jq-3.7.0/dt-1.13.8/datatables.min.css" rel="stylesheet">
    <script src="https://cdn.datatables.net/v/bs5/jq-3.7.0/dt-1.13.8/datatables.min.js"></script>
    <script>
        $(document).ready(function() {
            // const table = $('.card-body table')
            // if (table.length === 1) {
            //     table.DataTable();
            // }
        });
    </script>
    <style>
        .navbar-fixed {
            position: relative;
            min-height: 56px;
        }

        main {
            padding: 1rem 0;
            padding-bottom: 3rem;
        }
    </style>
</head>

<body class="bg-light">

    <!-- Navbar -->
    <div class="navbar-fixed">
        <nav class="navbar navbar-expand-lg bg-dark navbar-dark fixed-top">
            <div class="container">
                <a class="navbar-brand" href="/">Best Santri DSS</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarNavDropdown">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse justify-content-end" id="navbarNavDropdown">
                    <ul class="navbar-nav">
                        {{-- <li class="nav-item">
                            <a class="nav-link" href="#">Dashboard</a>
                        </li> --}}
                        <li class="nav-item">
                            <a class="nav-link" href="/">Ranking</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/students">Students</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/groups">Groups</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/criterias">Criterias</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/subcriterias">Sub Criterias</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                                aria-expanded="false">
                                Matrixes
                            </a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="/values">Values</a></li>
                                <li>
                                    <hr class="dropdown-divider">
                                </li>
                                <li>
                                    <h6 class="dropdown-header">SAW</h6>
                                </li>
                                <li><a class="dropdown-item" href="/saw/matrixes/decision">Decision</a></li>
                                <li><a class="dropdown-item" href="/saw/matrixes/normalization">Normalization</a></li>
                                <li><a class="dropdown-item" href="/saw/matrixes/optimization">Optimization</a></li>
                                <li>
                                    <hr class="dropdown-divider">
                                </li>
                                <li>
                                    <h6 class="dropdown-header">TOPSIS</h6>
                                </li>
                                <li><a class="dropdown-item" href="/topsis/matrixes/normalization">Normalization</a>
                                </li>
                                <li><a class="dropdown-item" href="/topsis/matrixes/weightrating">Weight Rating</a></li>
                            </ul>
                        </li>
                        {{-- <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                                aria-expanded="false">
                                Joe Doe
                            </a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="#">My Profile</a></li>
                                <li><a class="dropdown-item" href="#">Sign Out</a></li>
                            </ul>
                        </li> --}}
                    </ul>
                </div>
            </div>
        </nav>
    </div>

    @yield('content')

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        const deleteButton = document.querySelectorAll('.delete-button');
        deleteButton.forEach(button => {
            button.addEventListener('click', function(e) {
                e.preventDefault();
                Swal.fire({
                    title: 'Are you sure?',
                    text: "You won't be able to revert this!",
                    confirmButtonColor: '#0d6efd',
                    cancelButtonColor: '#6c757d',
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonText: 'Yes, delete it!',
                }).then((result) => {
                    if (result.isConfirmed) {
                        window.location.href = e.target.href
                    }
                })
            })
        })
    </script>


</body>

</html>
