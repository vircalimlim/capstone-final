<?php

namespace App\Http\Controllers;

use App\Models\Medicine;
use Illuminate\Http\Request;

class MedicineController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = auth()->user();
        $medicines = Medicine::get();
        return view('Medicine.index', compact('medicines', 'user'));
    }

    public function paginated(Request $request){
    
        return Medicine::latest()->get();
        
      }
  
      public function sorted(Request $request){
        //return request('sort');
        if($request->sort == 1){
          return Medicine::latest()->get();
        }
        else if($request->sort == 2){
          return Medicine::orderBy('med_name', 'asc')->get();
        }
        else if($request->sort == 3){
          return Medicine::orderBy('med_name', 'desc')->get();
        }
        else if($request->sort == 4){
          return Medicine::orderBy('quantity', 'asc')->get();
        }
        else if($request->sort == 5){
          return Medicine::orderBy('quantity', 'desc')->get();
        }
        else{
          return $profiles = Medicine::latest()->get();
        }
      }
  
      public function search(Request $request){
        //return Profile::where('lastname','LIKE','%'.request('search').'%')->orWhere('firstname','LIKE','%'.request('search').'%')->get();
  
        /* Profile::where(function($query){
          $query->orWhere(DB::raw('CONCAT(firstname, " ", middlename," ",lastname)'), 'LIKE', '%'.request('search').'%')
                  ->orWhere('first_name', 'LIKE', '%'.request('search').'%')
                  ->orWhere('middle_name', 'LIKE', '%'.request('search').'%')
                  ->orWhere('last_name', 'LIKE', '%'.request('search').'%');
      });*/
     //$query = Profile::get();
     $search = $request->search;
    
     /* $lol = $query->where(function($query) use($search)  {
        $query->where(DB::raw("CONCAT('firstname', ' ', 'middlename')"), 'ilike', '%'.$search.'%')
                ->orWhere(DB::raw("CONCAT('firstname', ' ', 'lastname')"), 'ilike', '%'.$search.'%')
                ->orWhere(DB::raw("CONCAT('lastname', ', ', 'firstname')"), 'ilike', '%'.$search.'%')
                ->orWhere(DB::raw("CONCAT('firstname', ' ', 'middlename', ' ', 'lastname')"), 'ilike', '%'.$search.'%')
                ->orWhere(DB::raw("CONCAT('lastname', ', ', 'firstname', ' ', 'middlename')"), 'ilike', '%'.$search.'%')
                ->orWhere('firstname', 'ilike', '%'.$search.'%')
                ->orWhere('middlename', 'ilike', '%'.$search.'%')
                ->orWhere('lastname', 'ilike', '%'.$search.'%');
    });*/
  
    return Medicine::where('med_name', 'ilike', '%'.$search.'%')->get();
   // return "hell";
      
      }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $medicines = Medicine::latest()->get();
        return view('Medicine.create', compact('medicines'));
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->validate([
          'med_name' => 'required',
          'med_type' => 'required',
          'quantity' => 'required',
          'date_received' => 'required',
          ]);
 
        Medicine::create(array_map('strtolower', $data));
        return redirect('medicine/create')->with('success', 'Saved');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Medicine  $medicine
     * @return \Illuminate\Http\Response
     */
    public function show(Medicine $medicine)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Medicine  $medicine
     * @return \Illuminate\Http\Response
     */
    public function edit(Medicine $medicine)
    {
        return view('Medicine.edit', compact(['medicine']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Medicine  $medicine
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Medicine $medicine)
    {
        $data = $request->validate([
          'med_name' => 'required',
          'med_type' => 'required',
          'quantity' => 'required|numeric'
        ]);
        
        $medicine->update($data);
        return redirect('/medicine/'.$medicine->id. '/edit')->with('success', 'Updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Medicine  $medicine
     * @return \Illuminate\Http\Response
     */
    public function destroy(Medicine $medicine)
    {
        //
    }
}
