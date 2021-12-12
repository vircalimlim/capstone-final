<?php

namespace App\Http\Controllers;

use App\Models\Profile;
use App\Models\Work;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;
use RealRashid\SweetAlert\Facades\Alert;


class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $user = auth()->user();
        $profiles = Profile::latest()->get();

        //$this->authorize('update', $profiles);
        return view('Profile.index', compact(['profiles', 'user']));
    }

    public function paginated(Request $request){
    
      return $profiles = Profile::latest()->get();
      
    }

    public function sorted(Request $request){
      //return request('sort');
      if($request->sort == 1){
        return Profile::latest()->get();
      }
      else if($request->sort == 2){
        return Profile::orderBy('lastname', 'asc')->get();
      }
      else if($request->sort == 3){
        return Profile::orderBy('lastname', 'desc')->get();
      }
      else if($request->sort == 4){
        return Profile::orderBy('age', 'asc')->get();
      }
      else if($request->sort == 5){
        return Profile::orderBy('age', 'desc')->get();
      }
      else{
        return $profiles = Profile::latest()->get();
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

  return Profile::where('fullname', 'ilike', '%'.$search.'%')->get();
 // return "hell";
    
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Profile.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
    
      try{
         
        $data = request()->validate([
          'houseNum' => 'required|numeric',
          'firstname' => 'required|string|max:150|min:2',
          'middlename' => 'required|max:150',
          'lastname' => 'required|max:150|min:2',
          'birthdate' => 'required',
          'age' => 'required|numeric',
          'gender' => 'required|string',
          'barangay' => 'required',
          'street' => 'nullable|string',
          'contact' => 'nullable|numeric|digits:11'
          ]);

          $fullname = [
            'fullname' => $data['firstname'] . ' ' . $data['middlename'] . ' ' . $data['lastname']
          ];
          //dd($data->firstname);
        Profile::create(array_merge(array_map( 'strtolower', $data ), $fullname));
        //return redirect()->back()->with('success', 'Created successfully!');
        return ['success'    => 'success'];
        //return redirect()->back();
      }
      catch(ValidationException $exception){
        return $exception->errors();
      }
        //return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Profile  $profile
     * @return \Illuminate\Http\Response
     */
    public function show(Profile $profile)
    {
        $work = Work::where('profile_id', $profile->id)->first();
        
        $student = Student::where('profile_id', $profile->id)->first();
        
        return view('Profile.show', compact(['profile', 'work', 'student']));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Profile  $profile
     * @return \Illuminate\Http\Response
     */
    public function edit(Profile $profile)
    {
        return view('Profile.edit', compact(['profile']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Profile  $profile
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Profile $profile)
    {
      //$this->authorize('update', $profile);
       $dataOfProfile = request()->validate([
        'houseNum' => 'required|numeric',
        'firstname' => 'required|string|max:150|min:2',
        'middlename' => 'required|max:150',
        'lastname' => 'required|max:150|min:2',
        'birthdate' => 'required',
        'age' => 'required|numeric',
        'gender' => 'required|string',
        'barangay' => 'required',
        'street' => 'nullable|string',
        'contact' => 'nullable|numeric|digits:11'
          ]);
          
       $profile->update($dataOfProfile);
        
       /* 
        if($profile->work)
        {
          
        $dataOfWork = $request->validate([
          'work' => 'required',
          'workplace' => 'required'
          ]);
          
        $profile->work->update($dataOfWork);
          
        }
        
        else if($profile->student)
        {
          
        $dataOfStudent = $request->validate([
          'school' => 'required',
          'educ_level' => 'required',
          'year_level' => 'required'
          ]);
          
          $profile->student->update($dataOfStudent);
          
        }
        */
        return redirect('/profile/'.$profile->id)->with('success', 'Updated successfully!');
          
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Profile  $profile
     * @return \Illuminate\Http\Response
     */
    public function destroy(Profile $profile)
    {
         $profile->delete();
         return redirect('/profile')->with('success', 'Deleted successfully!');
    }
}
