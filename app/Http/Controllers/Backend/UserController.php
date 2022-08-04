<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
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
        $allUsers = User::all();
        return view('backend.users.index',compact('allUsers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.users.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
         // Validation


         $validator = Validator::make($request->all(), [
            'name' => 'required',
            'password' => 'required|min:2',
            'email' => 'required|email|unique:users'
        ], [
            'name.required' => 'Name field is required.',
            'password.required' => 'Password field is required.',
            'email.required' => 'Email field is required.',
            'email.email' => 'Email field must be email address.',
            'email.unique' => 'Email address already exists',
        ]);
        if($validator->fails()){
            return back()->withErrors($validator->errors())->withInput();
        }   

        $user = new User;

        $user->name = $request->name;
        $user->email = $request->email;
        $user->role = $request->role;
        
        $user->password = Hash::make($request->password);
        
        //$user = User::create($user);
        $user->save();

        return back()->with('success', 'User created successfully.');
            
    
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        return view('backend.users.show',compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        return view('backend.users.edit',compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
         // Validation
       

         $validator = Validator::make($request->all(), [
            'name' => 'required',
            //'email' => 'required|email|unique:users ,email,'.$this->user->id        //later
        ], [
            'name.required' => 'Name field is required.',
            'email.required' => 'Email field is required.',
            'email.email' => 'Email field must be email address.',
            'email.unique' => 'Email address already exists',
        ]);
        if($validator->fails()){
            return back()->withErrors($validator->errors())->withInput();
        }   

        //dd($request);

        $user->name = $request->name;
        $user->email = $request->email;
        $user->role = $request->role;
        if(Hash::make($request->password) != $user->password)
            $user->password = Hash::make($request->password);
        
        $user->save();
        //return redirect()->route('users.index');

        return back()->with('success', 'User updated successfully.',compact('user'));
            
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        $user->delete();
    
        return back()->with('success','User deleted successfully');
    }
}
