<?php

namespace App\Http\Controllers;

use App\Models\Manager;
use App\Models\Employee;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $employees = Employee::all();
        return view('employees.index',compact('employees'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $managers = Manager::all();
        return view('employees.create',compact('managers'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        // dd($request->all());
        // Validate the request data
        $validatedData = $request->validate([
            'name' => 'required|string',
            'type' => 'required|in:backoffice,cashier',
            'gender' => 'required|in:male,female,custom,other',
        ]);

        try{
       // Create the employee
       $employee = Employee::create($validatedData);
        }catch(Exception $e){
           error_log($e->getMessage());
        }
 
        
        return redirect()->route('employees.assign_manager', $employee)->with('success','Employee created succesfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
       
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $employees = Employee::find($id);

        return  view('employees.edit',compact('employees'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $employee =Employee::where('id',$id)->delete();
        return redirect('employees')->with('message','Emplooyee deleted successfully');
    }

    public function assignManager(Employee $employee)
    {
        $managers = Manager::all();
        return view('employees.assign_manager', compact('employee', 'managers'));
    }

    public function updateManager(Request $request, Employee $employee)
    {
        // Validate the request data
        $validatedData = $request->validate([
            'manager_id' => 'required|exists:managers,id',
        ]);

        // Assign the manager to the employee
        $employee->manager_id = $validatedData['manager_id'];
        $employee->save();

        return redirect()->route('employees.index');
    }
}
