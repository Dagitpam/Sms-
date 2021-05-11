<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Department;
use App\Models\Course;

class PagesController extends Controller
{


    private $department;
    private $course;
    public function __construct(Department $department, Course $course)
    {
        $this->middleware('auth');
        $this->department = $department;
     
        $this->course = $course;
    
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function department()
    {
        //
        $departments = $this->department->all();
        return view('pages.department',compact('departments'));
    }

    public function course()
    {
        //
        $departments = $this->department->all();
        $courses = $this->course->all();
        return view('pages.course',compact('courses','departments'));
    }
    public function myCourse()
    {
        //
    
        $courses = $this->course->where('department_id',Auth::user()->department_id)->get();
        return view('pages.view-course',compact('courses'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }
    public function storeDepartment(Request $request)
    {
        //
        $this->validate($request,[
            'name'=>'required'
        ]);

        $this->department->create([
            'name'=>$request->name,
        ]);
        return back()->withStatus(__('Department added successfully'));
    }

    public function storeCourse(Request $request)
    {
        //
        $this->validate($request,[
            'course_code'=>'required',
            'course_title'=>'required',
            'course_name'=>'required',
            'type'=>'required',
        ]);

        $this->course->create([
            'course_code'=>$request->course_code,
            'course_title'=>$request->course_title,
            'course_name'=>$request->course_name,
            'type'=>$request->type,
            'department_id'=>$request->department_id,
        ]);
        return back()->withStatus(__('Course added successfully'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
    public function deletePayment(Request $request){
        $id = $request->id;
       $payment = $this->payment->find($id);
       $payment->delete();
       return back()->withAdvertStatus(__('Advert deleted successfully'));
       
    }
}
