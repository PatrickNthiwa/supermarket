<?php

namespace App\Http\Controllers;

use App\Models\Manager;
use App\Models\Supermarket;
use Illuminate\Http\Request;
use App\Http\Requests\ManagersFormRequest;

class ManagersController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $managers = Manager::all();
        return view('managers.index', compact('managers'));
    }
    

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $supermarkets = Supermarket::all();
     
        return view('managers.create', compact('supermarkets'));
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(ManagersFormRequest $request)
    {
        $data= $request->validated();

        $managers = Manager::create($data);

        return redirect('managers')->with('success','Manager created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $manager= Manager::find($id);
        return view('managers.edit',compact('manager'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ManagersFormRequest $request, string $id)
    {
        $data = $request->validated();

        $manager = Manager::where('id',$id)->update([
            'name'=>$data['name'],
            'phone'=>$data['phone'],
            'email'=>$data['email'],
        ]);

        return redirect('managers')->with('message','Manager updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $managers = Manager::find($id)->delete();
        return redirect('managers')->with('message','Manager deleted successfully');
    }
}
