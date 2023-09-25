<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $student = Student::get();
        $student = Student::paginate(1);
        return view('student.index',compact('student'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('student.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Student::create([
            'firstname'=>$request->firstname,
            'lastname'=> $request->lastname ,
            'rollno'=>$request->rollno,
            'contact'=>$request->contact,
            'email'=>$request->email,
            'password'=>Hash::make($request->password),
        ]);

        return back()->with('success','Registered Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $student= Student::findorfail($id);
        return view('student.show',compact('student'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $student=Student::findorfail($id);
        return view('student.edit',compact('student'));
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
        // method 1 
        // $student = Student::findorfail($id);
        // $student->firstname = $request->firstname;
        // $student->lastname = $request->lastname;
        // $student->rollno = $request->rollno;
        // $student->contact = $request->contact;
        // $student->email = $request->email;
        // $student->save();

        // method 2 

        // $studentdata=Student::where('id',$id)->where('email',$email)->update([]);        //for more than two conditions with AND operator
        // $studentdata=Student::where('id',$id)->orWhere('email',$email)->update([]);      //for more than two conditions with OR operator

        $studentdata = Student::where('id',$id)->update([
            'firstname' => $request->firstname,
            'lastname' => $request->lastname,
            'rollno' => $request->rollno,
            'contact' => $request->contact,
            'email' => $request->email,
        ]);

        return redirect()->route('studentroute.index')->with('success','Record Updated');

        // return view('student.index');          //without msg


        //used rarely with condition
        // if($studentdata == 1)
        // {
        //     return redirect()->route('studentroute.index')->with('success','Record Updated');
        // }
        // else{
        //     return redirect()->route('studentroute.index')->with('error','Try again');
        // }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $student=Student::findorfail($id);
        $student->delete();
        return back()->with('success','Record Deleted');
    }
}
