<?php


if (!function_exists('objToStringArray')) {
	function objToStringArray($o) {
        $res = array();
        foreach($o as $i){
            $res[] = "'$i'";
        }
        return $res;
    }
}
//////////////////////////////////////////////////////////////////////////////
if (!function_exists('endsWith')) {
	function endsWith($string, $endString) {
        $len = strlen($endString); 
        if ($len == 0) 
            return true; 
        return (substr($string, -$len) === $endString); 
    }
}
//////////////////////////////////////////////////////////////////////////////
if (!function_exists('getStudentCourses')) {
	function getStudentCourses($year) {

        $season = date('m') >= env('first_season_end_month', null) && date('m') <= env('first_season_start_month', null) ? 2 : 1;

        $where = "";
        //check if this year is specialiste year to get shared courses also
        $tmp = explode(".", $year);
        if(count($tmp) > 1)
            $get_courses = DB::table('courses')->whereBetween('CourseYear', [$tmp[0], $year])
            ->where('CourseSeason', $season)->get();
        else
            $get_courses = DB::table('courses')->where('CourseYear',$year)
            ->where('CourseSeason', $season)->get();
            

        if(!$get_courses->isEmpty()){
            $courses = array();
            foreach($get_courses as $c)
            {
                //'Name' , 'CourseTeacher',  'CourseYear' , 'CourseSeason','HaveLabCourse' ,'CourseNameAR'
                if(!endsWith($c->Name, "#LAB"))
                {
                    array_push($courses,[
                        "CourseNameAR" => $c->CourseNameAR ,
                        "Name" => $c->Name,
                        "CourseTeacher" => $c->CourseTeacher,
                        "CourseYear" => $c->CourseYear,
                        "CourseSeason" => $c->CourseSeason,
                        "HaveLabCourse" => $c->HaveLabCourse
                    ]
                   );
                }
            }
            return $courses;
        }
        return [];
	}
}
//////////////////////////////////////////////////////////////////////////////
if (!function_exists('getStudentOtherCourses')) {
	function getStudentOtherCourses($other) {
        if(strlen($other) > 0){
            $other_courses = explode(",", $other);
            $courses = array();

            $in = "(" .join(",", objToStringArray($other_courses)) .")";
            $get_courses = DB::select( DB::raw("SELECT * FROM courses WHERE Name IN $in") );
        
            
            //echo $get_courses;
            if(!empty($get_courses)){
                foreach($get_courses as $c)
                {
                        //'Name' , 'CourseTeacher',  'CourseYear' , 'CourseSeason','HaveLabCourse' ,'CourseNameAR'
                        if(!endsWith($c->Name, "#LAB"))
                        {
                           array_push($courses,[
                               "CourseNameAR" => $c->CourseNameAR ,
                               "Name" => $c->Name,
                               "CourseTeacher" => $c->CourseTeacher,
                               "CourseYear" => $c->CourseYear,
                               "CourseSeason" => $c->CourseSeason,
                               "HaveLabCourse" => $c->HaveLabCourse
                             ]
                           );
                        }
                }
            }
            return $courses;
        }
        return [];
    }
}

