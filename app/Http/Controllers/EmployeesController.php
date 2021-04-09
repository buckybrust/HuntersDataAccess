<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Employee;
use App\Models\Business;

class EmployeesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    //Shows One Specific Employee
    public function show(Employee $employee){
        return view('employees.show', ['employee' => $employee]);
    }

    //Shows All Employees
    public function index(){
        $employee = Employee::paginate(10);
        return view('employees.index', ['employees' => $employee]);
    }

    
    //Creates An Employee
    public function create(){
        return view('employees.create', [
            'businesses' => Business::all(),
            'employer' => request('employer')
        ]);
    }

    //Saves A Created Employee
    public function store(){
        $this->validateEmployee();

        $employee = new Employee(request(['fname', 'lname', 'email','phone','business_id']));
        $employee->save();

        return redirect('/employees');
    }

    
    //Edits An Employee
    public function edit($id){
        $employee = Employee::find($id);
        return view('employees.edit', [
            'Employee' => $employee,
            'businesses' => Business::all(),
            ]);
    }

    //Updates The Employee
    public function update(Employee $employee){
        $employee->update($this->validateEmployee());

        return redirect($employee->path());
    }
    
    //Destroy/Delete An Employee
    public function destroy(Employee $employee){
        //Delete Database Info
        Employee::where('id', request('id'))->delete();

        //Return To Employees Directory
        return redirect('/employees');
    }
    
    //Will Validate And Return The Different Inputs
    protected function validateEmployee(){
        return request()->validate([
            'fname' => ['string','required','max:255'],
            'lname' => ['string','required','max:255'],
            'email' => ['string','required','max:255'],
            'phone' => ['string','required','max:255'],
            'business_id' => ['exists:businesses,id', 'required'],
        ]);
    }
}
