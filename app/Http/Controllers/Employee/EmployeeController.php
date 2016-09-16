<?php

namespace App\Http\Controllers\Employee;

use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class EmployeeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('employee.index', ['employees' => User::where('id', '!=', Auth::user()->id)->get()]);
    }

    public function assignRoleEmployee(Request $request){
        $employee = User::where('nip', $request['nip'])->first();
        $employee->roles()->detach();
        if($request['role']=='User'){
            $employee->roles()->attach(Role::where('name', 'user')->first());
        }
        if($request['role']=='Author'){
            $employee->roles()->attach(Role::where('name', 'author')->first());
        }
        if($request['role']=='Admin'){
            $employee->roles()->attach(Role::where('name', 'admin')->first());
        }
        return redirect()->back()->with('success', 'Role has been asigned..');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('employee.add_form');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Validator::make($request->all(), [
            'nip' => 'required|min:6|max:6|unique:users',
            'name' => 'required|max:120',
            'email' => 'required|email|unique:users',
            'pob' => 'required',
            'dob' => 'required',
            'religion' => 'required',
            'gender' => 'required',
            'marital_status' => 'required',
            'number_of_children' => 'numeric',
            'address' => 'required',
            'phone_number' => 'required|numeric',
            'last_education' => 'required',
            'appointment_date' => 'required',
            'position' => 'required',
            'salary' => 'required',
            'employment_status' => 'required',
            'active' => 'required',
        ], [
            'nip.required' => 'We need to know the nip, Please fill out the field..',
            'name.required' => 'We need to know the name, Please fill out the field..',
            'email.required' => 'We need to know the e-mail address, Please fill out the field..',
            'pob.required' => 'We need to know the place of birth, Please fill out the field..',
            'dob.required' => 'We need to know the date of birth, Please fill out the field..',
            'religion.required' => 'We need to know the religion, Please fill out the field..',
            'gender.required' => 'We need to know the gender, Please fill out the field..',
            'marital_status.required' => 'We need to know the marital status, Please fill out the field..',
            'number_of_children.numeric' => 'Number of child must be numeric, Please fill properly',
            'address.required' => 'We need to know the address, Please fill out the field..',
            'phone_number.required' => 'We need to know the phone number, Please fill out the field..',
            'last_education.required' => 'We need to know the last education, Please fill out the field..',
            'appointment_date.required' => 'We need to know the appointment date, Please fill out the field..',
            'position.required' => 'We need to know the position, Please fill out the field..',
            'salary.required' => 'We need to know the salary, Please fill out the field..',
            'employment_status.required' => 'We need to know the employment status, Please fill out the field..',
            'active.required' => 'We need to know the active status, Please fill out the field..',
        ])->validate();

        $employee = new User();
        $employee->nip = $request['nip'];
        $employee->name = $request['name'];
        $employee->email = $request['email'];
        $employee->password = bcrypt('bawana123');
        $employee->pob = $request['pob'];
        $employee->dob = $request['dob'];
        $employee->religion = $request['religion'];
        $employee->gender = $request['gender'];
        $employee->marital_status = $request['marital_status'];
        if ($request['marital_status']=='married' || $request['marital_status']=='divorce'){
            $employee->number_of_children = $request['number_of_children'];
        }else{
            $employee->number_of_children = 0;
        }
        $employee->address = $request['address'];
        $employee->phone_number = $request['phone_number'];
        $employee->last_education = $request['last_education'];
        $employee->appointment_date = $request['appointment_date'];
        $employee->position = $request['position'];
        $employee->id_no = $request['id_no'];
        $employee->tax_no = $request['tax_no'];
        $employee->salary = $request['salary'];
        $employee->employment_status = $request['employment_status'];
        $employee->active = $request['active'];
        $employee->foto = 'Bawana.jpg';
        if($employee->save()){
            $employee->roles()->attach(Role::where('name', 'user')->first());
            return redirect()->route('employee.index')->with('success', 'Data has been saved..');
        }else{
            return redirect()->route('employee.index')->with('info', 'Nothing is change..');
        }
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
        return view('employee.edit_form',['employee' => User::findOrFail($id)]);
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
        Validator::make($request->all(), [
            'nip' => 'required|min:6|max:6',
            'name' => 'required|max:120',
            'email' => 'required|email',
            'pob' => 'required',
            'dob' => 'required',
            'religion' => 'required',
            'gender' => 'required',
            'marital_status' => 'required',
            'number_of_children' => 'numeric',
            'address' => 'required',
            'phone_number' => 'required|numeric',
            'last_education' => 'required',
            'appointment_date' => 'required',
            'position' => 'required',
            'salary' => 'required',
            'employment_status' => 'required',
            'active' => 'required',
        ], [
            'nip.required' => 'We need to know the nip, Please fill out the field..',
            'name.required' => 'We need to know the name, Please fill out the field..',
            'email.required' => 'We need to know the e-mail address, Please fill out the field..',
            'pob.required' => 'We need to know the place of birth, Please fill out the field..',
            'dob.required' => 'We need to know the date of birth, Please fill out the field..',
            'religion.required' => 'We need to know the religion, Please fill out the field..',
            'gender.required' => 'We need to know the gender, Please fill out the field..',
            'marital_status.required' => 'We need to know the marital status, Please fill out the field..',
            'number_of_children.numeric' => 'Number of child must be numeric, Please fill properly',
            'address.required' => 'We need to know the address, Please fill out the field..',
            'phone_number.required' => 'We need to know the phone number, Please fill out the field..',
            'last_education.required' => 'We need to know the last education, Please fill out the field..',
            'appointment_date.required' => 'We need to know the appointment date, Please fill out the field..',
            'position.required' => 'We need to know the position, Please fill out the field..',
            'salary.required' => 'We need to know the salary, Please fill out the field..',
            'employment_status.required' => 'We need to know the employment status, Please fill out the field..',
            'active.required' => 'We need to know the active status, Please fill out the field..',
        ])->validate();

        $employee = User::findOrFail($id);
        $employee->nip = $request['nip'];
        $employee->name = $request['name'];
        $employee->email = $request['email'];
        $employee->password = bcrypt('bawana123');
        $employee->pob = $request['pob'];
        $employee->dob = $request['dob'];
        $employee->religion = $request['religion'];
        $employee->gender = $request['gender'];
        $employee->marital_status = $request['marital_status'];
        $employee->number_of_children = $request['number_of_children'];
        $employee->address = $request['address'];
        $employee->phone_number = $request['phone_number'];
        $employee->last_education = $request['last_education'];
        $employee->appointment_date = $request['appointment_date'];
        $employee->position = $request['position'];
        $employee->id_no = $request['id_no'];
        $employee->tax_no = $request['tax_no'];
        $employee->salary = $request['salary'];
        $employee->employment_status = $request['employment_status'];
        $employee->active = $request['active'];
        if($employee->save()){
            return redirect()->back()->with('success', 'Data has been updated..');
        }else{
            return redirect()->back()->with('info', 'Nothing is change..');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroyEmployee($id)
    {
        $employee = User::findOrFail($id);
        if ($employee->delete()){
            return redirect()->route('employee.index')->with('success', 'Data has been deleted..');
        }else{
            return redirect()->route('employee.index')->with('info', 'Nothing is change..');
        }

    }
}
