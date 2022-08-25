<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Http\Request;
use DB;

class BackendController extends Controller
{
    public function dashboard(){
        return view('backend.pages.dashboard');
    }

    public function employees(){
       // return view('backend.pages.dashboard');
       //return "OK";
       //อ่านจากตาราง employees ทั้งหมด 
       //       $employees = DB::table('employees')->get();
        
        //อ่านจากตาราง employees เพียงรายการเดียว
        //      $employees =DB::table('employees')->first();

        //อ่านจากตาราง employees ระบุ field
        //     $employees =DB::table('employees')->first(['fullname','gender','email']);

         //อ่านจากตาราง employees แบบมีเงื่อนไข
           /* $employees =DB::table('employees')->where('age','=','10')
                            ->where('gender','Female')
                            ->get(['fullname','gender','age','address']);
            */


            //ค้นหาโดยระบุ ID โดยตรง
            // $employees =DB::table('employees')->find(5);

            // การนับจำนวน record ที่พบ
           // $employees =DB::table('employees')->count();


            //การหาค่าสูงสุด ต่ำสุด ค่าเฉลี่ย 
            // $employees = DB::table('employees')->max('age');
            // $employees = DB::table('employees')->min('age');
            // $employees = DB::table('employees')->avg('age');


        // การจัดเรียงข้อมูล และการเลือกข้อมูลบางส่วน
        // $employees = DB::table('employees')->orderBy('age')->get(); // order asc


        //การเพิ่มข้อมูลเข้าตาราง 
        //  $data = array(
        //      'fullname' => 'Samit Koyom',
        //      'gender' => 'Male',
        //      'email' => 'samit@email.com',
        //      'tel' => '0898938889389',
        //      'age' => 38,
        //      'address' => '20/2 moo.2 bangkok',
        //      'avatar' => 'noavatar.jpg',
        //      'status' => 1
        //  );

        //  $data = array(
        //     'fullname' => 'Wichai Jaidee',
        //     'gender' => 'Male',
        //     'email' => 'wichai@email.com',
        //     'tel' => '0898938889389',
        //     'age' => 38,
        //     'address' => '20/2 moo.2 bangkok',
        //     'avatar' => 'noavatar.jpg',
        //     'status' => 1
        // );
        // $employees = DB::table('employees')->insert($data);


// การแก้ไขข้อมูลเข้าไปในตาราง --------------------------------------------
// $data = array(
//     'email' => 'samitkk@gmail.com',
//     'tel' => '02222333444',
//     'age' => 42
// );

// $employees = DB::table('employees')->where('id', 7)->update($data);



// การลบข้อมูลเข้าไปในตาราง --------------------------------------------
$employees = DB::table('employees')->where('id',503)->delete();

              return $employees;
    }
    

public function employeelist(){
//อ่านข้อมูลทั้งหมดจากตาราง ใช้ :: ในการเรียกแทน ->
//    $employees = Employee::all();
   
// อ่านระบุเงื่อนไข
//    $employees = Employee::where('age','>','18')->orderBy('age')->get();


//อ่านข้อมูลทั้งหมดจากตารางแบ่งหน้า
    $employees = Employee::orderBy('id','desc')->paginate(25);

// การส่งข้อมูลที่ได้ไปยัง view    

return view('backend.pages.employeelist',compact('employees'));

}

}
