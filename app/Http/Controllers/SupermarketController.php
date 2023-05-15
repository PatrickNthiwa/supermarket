<?php

namespace App\Http\Controllers;

use App\Models\Supermarket;
use Illuminate\Http\Request;
use App\Http\Requests\SupermarketFormRequest;

class SupermarketController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    // public function index()
    // {

    //     $supermarkets= Supermarket::all();
    //     return view('supermarkets.index',compact('supermarkets'));
    // }

    public function index(Request $request)
    {
        try {
         
            $supermarkets = Supermarket::orderBy('name')->get();
    
            $view = $request->input('view', 'grid');
    
            if ($view === 'list') {
                return view('supermarkets.list', compact('supermarkets', 'view'));
            }
    
            // default view is grid
            return view('supermarkets.index', compact('supermarkets', 'view'));
        } catch (\Exception $e) {
            // exceptions
            return back()->with('error', 'Error: ' . $e->getMessage());
        }
    }
    


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('supermarkets.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(SupermarketFormRequest $request)
    {
        $data= $request->validated();

        $supermarket=Supermarket::create($data);

        return redirect('supermarkets')->with('message','Supermarket Added successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Supermarket $supermarket)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $supermarket = Supermarket::findOrFail($id);
        return view('supermarkets.edit', compact('supermarket'));
    }
    

    /**
     * Update the specified resource in storage.
     */
    public function update(SupermarketFormRequest $request, $id)
    {
        $data= $request->validated();

        $supermarket = Supermarket::where('id',$id)->update([
            'name'=>$data['name'],
            'location'=> $data['location'],
        ]);

        return redirect('supermarkets')->with('message','Supermarket updated sucessfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request,$id)
    {

        try {
         
            $supermarket = Supermarket::find($id)->delete();
    
            $view = $request->input('view', 'grid');
    
            if ($view === 'list') {
                return view('supermarkets.list', compact('supermarkets', 'view'))->with('message','Supermarket deleted sucessfully');
            }
    
            // default view is grid
            return view('supermarkets.index', compact('supermarkets', 'view'))->with('message','Supermarket deleted sucessfully');
        } catch (\Exception $e) {
            // exceptions
            return back()->with('error', 'Error: ' . $e->getMessage());
        }

    }
}
