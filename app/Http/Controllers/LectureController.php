<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use File;

class LectureController extends Controller
{
        public function index()
        {
            $path = storage_path("app/public");
            $res = [];

            $res0 = array();
            $dirs = scandir($path);
            foreach($dirs as $dir)//Y1 Y2 Y3 Y4
            {
                if($dir == '.' || $dir == '..') continue;
                array_push($res0, $dir);
            }
            

            $res1 = array();
            $res2 = array();
            $dirs = File::directories($path);
            foreach($dirs as $dir){
                $dirdir = scandir($dir);
                $dirdir1 = File::directories($dir);
                foreach($dirdir as $dd)//practical theoretical
                {
                    if($dd == '.' || $dd == '..') continue;
                    array_push($res1,$dd);
                }
                foreach($dirdir1 as $dd)//pdf
                {
                    $files = File::files($dd);
                    foreach($files as $f){
                      array_push($res2, $f->getRelativePathname()); 
                    }
                }
            }
            $res['level0'] = $res0;
            $res['level1'] = $res1;
            $res['level2'] = $res2;

            //print_r('///////////////////////////////////////////'.PHP_EOL);
            return $res;
        } 


        public function lecture(Request $request)
        {
            $validation = $request->validate([
                'lec' => 'required|file|mimes:pdf,doc,docm,docx,dot'
                // for multiple file uploads
                // 'lec.*' => 'required|file|mimes:pdf,doc,docm,docx,dot|max:2048'
            ]);
            $file = $validation['lec'];
            $year = $request->year;
            $f = $request->f;
       
            $filename = $file->getClientOriginalName() ;
            $path ='/Y'.$year.'/'.$f;
            \Storage::disk('public')->putFileAs($path, $file, $filename);
    
            return url('/').'/storage/app/public'.$path.'/'.$filename;
            //http://127.0.0.1:8000/storage/Y4/theoretical/test.pdf
            //return \Storage::url($filename, $file);
        }

        
        public function downloadlecture(Request $request)
        {
    
            $year = $request->year;
            $f = $request->f;
            $file = $request->file;
            return response()->download(
                storage_path("app/public/Y".$year."/".$f."/".$file.".pdf")
            );
        }
}
