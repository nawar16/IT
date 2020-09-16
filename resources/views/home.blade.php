<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Home</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="assets/css/main.css">
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@400;800&display=swap" rel="stylesheet">
</head>

<body>

    <!-- Navbar -->

    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="index.html">AlBaath.IT</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="index.html">
                            الصفحة الرئيسية
                            <i class="fa fa-home ml-1" aria-hidden="true"></i>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- End Navbar -->

    <!-- Header -->

    <div class="header d-flex align-items-center">
        <div class="overlay"></div>
        <div class="container header_content">
            <div class="row d-flex justify-content-center">
                <div class="col-md-5">
                    <form method="POST" id="login-form" action= "/login">

                        @csrf

                        <div class="form-group has-search">
                            <span class="fa fa-id-card form-control-feedback"></span>
                            <input  name="email" id="email" class="form-control"
                                placeholder="الإيميل">
                        </div>

                        <div class="form-group has-search">
                            <span class="fas fa-unlock-alt form-control-feedback"></span>
                            <input type="password" name="password" id="password" class="form-control"
                                placeholder="كلمة السر">
                        </div>
                        <div class="form-group">
                            <select name="mode" id="mode" class="form-control" style="min-height: 45px">
                                <option value="student">طالب</option>
                                <option value="doctor">دكتور \ أستاذ</option>
                            </select>
                        </div>

                        <input type="submit" value="تسجيل الدخول" class="mt-3 btn btn-primary btn-block">
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- End Header -->

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
    </script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
    </script>
    <script src="https://kit.fontawesome.com/0841c37263.js" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.20.0/axios.min.js" integrity="sha512-quHCp3WbBNkwLfYUMd+KwBAgpVukJu5MncuQaWXgCrfgcxCJAq/fo+oqrRKOj+UKEmyMCG3tb8RB63W+EmrOBg==" crossorigin="anonymous"></script>
    <script src="{{ URL::asset('js/main.js') }}"></script>
</body>


</html>
