<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>المحاضرات</title>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@400;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/malihu-custom-scrollbar-plugin/3.1.5/jquery.mCustomScrollbar.min.css">

    <link rel="stylesheet" href="/assets/css/main.css">

    <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.20.0/axios.min.js" integrity="sha512-quHCp3WbBNkwLfYUMd+KwBAgpVukJu5MncuQaWXgCrfgcxCJAq/fo+oqrRKOj+UKEmyMCG3tb8RB63W+EmrOBg==" crossorigin="anonymous"></script>
    <style>
        #admin-link-1 {
            display: none;
        }
        #admin-link-2 {
            display: none
        }
    </style>

</head>
<body>
    <!-- Navbar -->

    <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
        <div class="container-fluid">
            <a class="navbar-brand" href="main.html">AlBaath.IT</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item mr-1" id="admin-link-1">
                        <a href="/admin/upload-daily-program" class="nav-link text-light">
                            رفع برنامج الدوام
                            <i class="fas fa-upload ml-2"></i>
                        </a>
                    </li>
                    <li class="nav-item mr-3" id="admin-link-2">
                        <a href="/admin/upload-news" class="nav-link text-light">
                            إنشاء خبر جديد
                            <i class="fas fa-plus ml-2"></i>
                        </a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link text-light" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                          <i class="fas fa-bell" style="font-size: 1.3rem;"></i>
                        </a>
                          <ul class="dropdown-menu">

                            <li class="head text-light bg-dark">
                              <div class="row">
                                <div class="col-lg-12 col-sm-12 col-12">
                                  <span>Notifications</span>
                                </div>
                            </li>

                            <li class="notification-box">
                                <div class="row">
                                  <div class="col-lg-8 col-sm-8 col-8">
                                    <strong class="text-info pl-2">
                                        <i class="fas fa-dot-circle"></i>
                                        Title
                                    </strong>
                                    <div class="pl-2">
                                      Lorem ipsum dolor sit amet, consectetur
                                    </div>
                                    <small class="text-warning pl-2">27.11.2015, 15:00</small>
                                  </div>
                                </div>
                              </li>

                          </ul>
                      </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- End Navbar -->

    <div class="row mt-5">
        <div class="col-9 mt-5 text-right">
            <div class="row">
                <form action="" method="GET" id="lectures" class="lectures">
                    <div class="form-row">
                        <div class="col">
                            <select name="year" id="year" class="form-control" style="width: 250px;" required>
                                <option value="" selected disabled> السنة الدراسية... </option>
                                <option value="1">السنة اﻷولى</option>
                                <option value="2">السنة الثانية</option>
                                <option value="3">السنة الثالثة</option>
                                <option value="4">السنة الرابعة</option>
                                <option value="5">السنة الخامسة</option>
                            </select>
                        </div>
                        <div class="col">
                            <select name="subjects" id="subjects"  class="form-control" style="width: 250px;" required>
                                <option value="" selected disabled> اسم المادة... </option>
                            </select>
                        </div>
                        <div class="col">
                            <select name="type" id="type" class="form-control" style="width: 250px;" required>
                                <option value="" selected disabled> نوع المحاضرات... </option>
                                <option value="theoretical">نظري</option>
                                <option value="practical">عملي</option>
                            </select>
                        </div>
                        <div class="col">
                            <input type="submit" value="البحث" class="btn btn-info pl-4 pr-4">
                        </div>
                    </div>
                </form>
            </div>
            <hr>
            <div class="row" id="lectures_wrapper">
            </div>
        </div>
        <div class="col-3 mt-5">

            <div class="wrapper">
                <nav id="sidebar" class="text-right pr-3">

                    <ul class="list-unstyled components">
                        <li>
                            <a href="/student/dashboard">
                                الأخبار
                                <i class="fas fa-newspaper ml-1"></i>
                            </a>
                        </li>
                        <hr>
                        <li>
                            <a href="/student/dailyprogram">
                                برنامج الدوام
                                <i class="fas fa-calendar-alt ml-1"></i>
                            </a>
                        </li>
                        <hr>
                        <li>
                            <a href="/student/grades">
                                العلامات الامتحانية
                                <i class="fas fa-user-graduate ml-1"></i>
                            </a>
                        </li>
                        <hr>
                        <li class="mr-1">
                            <a href="/student/lectures">
                                المحاضرات
                                <i class="fas fa-book ml-1"></i>
                            </a>
                        </li>
                        <hr>
                        <li class="mr-1">
                            <a href="/about">
                                حول الكلية
                                <i class="fas fa-info ml-1"></i>
                            </a>
                        </li>
                        <hr>
                    </ul>

                </nav>
            </div>

        </div>

    </div>

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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/malihu-custom-scrollbar-plugin/3.1.5/jquery.mCustomScrollbar.concat.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.20.0/axios.min.js" integrity="sha512-quHCp3WbBNkwLfYUMd+KwBAgpVukJu5MncuQaWXgCrfgcxCJAq/fo+oqrRKOj+UKEmyMCG3tb8RB63W+EmrOBg==" crossorigin="anonymous"></script>

    <script src="{{ URL::asset('js/main.js') }}"></script>

    <script>

        let IsAdmin = sessionStorage.getItem("IsAdmin");
        if ( IsAdmin == 1 ) {
            document.getElementById('admin-link-1').style.display = "block"
            document.getElementById('admin-link-2').style.display = "block"
        }

        function GetCourses(res) {
            if ( res.data.length == 0 ) {
                let div = document.getElementById('lectures_wrapper');
                div.innerHTML += `
                <br><br>
                <h1 class='mt-5'>! لا يوجد محاضرات في قاعدة البيانات</h1>
                `
            }
            else {
                for ( let i = 0; i < res.data.length ; i++ ) {
                    let div = document.getElementById('lectures_wrapper');
                    div.innerHTML += `

                    <div class="col-3 mt-4">
                        <div class="card">
                            <div class="card-img-top">
                                <img src="/assets/images/${res.data[i].CourseFileType}.png" alt="" width="100%" height="180px">
                            </div>
                            <div class="card-header text-right font-weight-bold">
                                ${res.data[i].CourseNameAR}
                            </div>
                            <div class="card-footer">
                                <a href="${res.data[i].CourseDownloadLink}" class="btn btn-block btn-info" download>
                                    <i class="fas fa-download ml-1"></i>
                                    تحميل
                                </a>
                            </div>
                        </div>
                    </div>

                    `
                }
            }
        }

        var form = document.getElementById('lectures');
        form.addEventListener('submit', function(e) {
            e.preventDefault()
            let year = document.getElementById('year').value;
            let subject = document.getElementById('subjects').value;
            let type = document.getElementById('type').value;

            axios
            .get("http://127.0.0.1:8000/api/student/courses", {
                CourseNameAR: subject,
                CourseType: type,
            })
            .then((res) => GetCourses(res))
            .catch((err) => console.error(err));

        })

    </script>

</body>
</html>
