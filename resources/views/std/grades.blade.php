<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>العلامات الامتحانية</title>

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

        <div class="col-9 mt-5" style="direction: rtl;">
            <div class="col-2"></div>

            <div class="col-10">

                <h3 style="font-size: 1.2rem;" class="mt-5 mb-5 text-center font-weight-bold">أدخل رقمك الجامعي :</h3>
                <form action="" method="GET">
                    <div class="form-group has-search">
                        <span class="fa fa-id-card form-control-feedback"></span>
                        <input type="text" name="StudentID" id="StudentID" class="form-control"
                            placeholder="الرقم الجامعي">
                    </div>
                    <input type="submit" value="البحث عن النتائج" class="btn btn-block mt-4" style="background-color: #17c0eb; color: #fff;">
                </form>
                <br><br><br>
                <div id="grades-results" class="mt-5">
                </div>

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

<!--  End Side Bar -->

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

        var grades_results = document.getElementById('grades-results');
        var StudentID = document.getElementById('StudentID')

        function createMarksTable(res) {

            grades_results.innerHTML += `
            <div class="row">
            <div class="col-9 mt-5" style="font-size: 1.1rem;">
                <div class="main-content mt-5 ml-5" style="direction: rtl; text-align: right;">
                    <table class="table" style="border-radius: 10px; box-shadow: 1px 1px 15px #a3a3a3;">
                        <thead class="thead-dark" style="background-color: #4b4b4b;">
                        <tr>
                            <th scope="col">السنة</th>
                            <th scope="col">اسم المادة</th>
                            <th scope="col">علامة العملي</th>
                            <th scope="col">علامة النظري</th>
                            <th scope="col">المجموع</th>
                        </tr>
                        </thead>
                        <tbody>
            `

            for ( let i = 0 ; i < res.data.length ; i++ ) {
                grades_results.innerHTML += `

                        <tr>
                            <td>${res.data.CourseYear}</td>
                            <td>${res.data.CourseName}</td>
                            <td>${res.data.LabHomeworkMark}</td>
                            <td>${res.data.LabExamMark}</td>
                            <td>${res.data.FinalExamMark}</td>
                            <td>${ res.data.LabExamMark + res.data.LabHomeworkMark + res.data.FinalExamMark }</td>
                        </tr>
                `
            }

            grades_results.innerHTML += `
                    </tbody>
                    </table>

                    <br><br>
            `
        }

        axios
        .get("/api/marks", {
            StudentID: StudentID,
        })
        .then( (res) => {
            createMarksTable(res)
        })
    </script>

</body>
</html>
