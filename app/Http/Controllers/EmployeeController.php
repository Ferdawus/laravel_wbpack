<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $employee = DB::table('employees')->get();
        $employee = Employee::all();
        return response()->json($employee);

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

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validate = $request->validate([
            'EmployeeName'=>'required|max:255',
            'Phone'=>'required | max:11',
            'Address'=>'required'
        ]);

        $employee = new Employee();
        $employee->EmployeeName = $request->EmployeeName;
        $employee->Phone = $request->Phone;
        $employee->Address = $request->Address;
        $employee->save();
        return response()->json('data inserted');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // $showEmployee = Employee::find($id)->first();
        $showEmployee = DB::table('employees')->where('id',$id)->first();
        return response()->json($showEmployee);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function edit(Employee $employee)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $updateEmployee = DB::table('employees')->where('id',$id)->update([

            'EmployeeName'=>$request->EmployeeName,
            'Phone'=>$request->Phone,
            'Address'=>$request->Address
        ]);
        return response()->json('Data Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $deleteEmployee = DB::table('employees')->where('id', $id)->delete();
        return response()->json('delete successfull');
    }
}
