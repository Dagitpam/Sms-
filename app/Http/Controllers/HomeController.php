<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Course;
use App\Models\User;
use App\Models\Department;
use App\Models\Payment;


class HomeController extends Controller
{


    
    /**
     * Create a new controller instance.
     *
     * @return void
     */

    private $course;
    private $department;
    private $payment;
    private $student;
    public function __construct(Course $course, Department $department, Payment $payment, User $student)
    {
        $this->middleware('auth');
        $this->course = $course;
        $this->department = $department;
        $this->payment = $payment;
        $this->student = $student;
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $courses = $this->course->all();
        $stu_courses = $this->course->where('department_id',Auth::user()->department_id)->get();
        $departments = $this->department->all();
        $students = $this->student->all();
        $payment = $this->payment->all();
        return view('dashboard',compact('courses','departments','students','payment','stu_courses'));
    }
}
