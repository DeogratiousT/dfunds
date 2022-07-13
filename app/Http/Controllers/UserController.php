<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Partner;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Mail\UserAccountCreated;
use App\Mail\UserPasswordUpdated;
use Spatie\Permission\Models\Role;
use App\Laratables\UsersLaratables;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Freshbitsweb\Laratables\Laratables;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rules\Password;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (request()->ajax()) {
            return Laratables::recordsOf(User::class, UsersLaratables::class);
        }

        return view('dashboard.users.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $partners = Partner::all();
        $roles = Role::whereNotIn('name', ['Admin'])->get();
        return view('dashboard.users.create', ['roles'=>$roles, 'partners'=>$partners] );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'first_name' => ['required', 'string', 'max:255'],
            'last_name' => ['required', 'string', 'max:255'],
            'email' => [
                'required',
                'string',
                'email',
                'max:255',
                Rule::unique(User::class),
            ],
            'roles' => ['required', 'array'],
            'partner_id' => ['nullable', 'exists:partners,id']
        ]);

        if ($validator->fails()) {
            return redirect()->route('users.create')->withErrors($validator)->withInput();
        }

        $validated = $validator->safe();

        try {
            $user = new User;
            
            $user->name = $validated['first_name'] . ' ' . $validated['last_name'];
            $user->email = $validated['email'];
            $user->password = Hash::make('password');
            
            if (isset($validated['partner_id'])) {
                $user->partner_id = $validated['partner_id'];
            }

            $user->save();
    
            $user->assignRole($validated['roles']);

            // Send Email
            Mail::to($user->email)->send(new UserAccountCreated($user));

            return redirect()->route('users.index')->with('success','User Created Successfully');
        } catch (\Throwable $th) {
            return redirect()->route('users.create')->with('error', 'Create Failed. Please try again later');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        $partners = Partner::all();
        $roles = Role::whereNotIn('name', ['Admin'])->get();
        return view('dashboard.users.edit', ['user'=>$user, 'roles'=>$roles, 'partners'=>$partners]);
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
        $validator = Validator::make($request->all(), [
            'name' => ['required', 'string', 'max:255'],
            'email' => [
                'required',
                'string',
                'email',
                'max:255',
            ],
            'roles' => ['required', 'array'],
            'password' => [
                            'nullable', 
                            'string',   
                            'confirmed', 
                            Password::min(8)
                        ->mixedCase()
                    ->numbers()
                ->symbols() 
            ],
            'partner_id' => ['nullable', 'exists:partners,id']
        ]);

        if ($validator->fails()) {
            return redirect()->route('users.edit', $user)->withErrors($validator)->withInput();
        }

        $validated = $validator->safe();

        try {
            $user->name = $validated['name'];
            $user->email = $validated['email'];

            if (isset($validated['password'])) {
                $user->password = $validated['password'];
            }

            if (isset($validated['partner_id'])) {
                $user->partner_id = $validated['partner_id'];
            }

            $user->save();
    
            $user->syncRoles($validated['roles']);

            if (isset($validated['password'])) {
                // Send Email
                Mail::to($user->email)->send(new UserPasswordUpdated($user));
            }

            return redirect()->route('users.index')->with('success','User Updated Successfully');
        } catch (\Throwable $th) {
            return redirect()->route('users.edit', $user)->with('error', 'Create Failed. Please try again later');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        try{
            if ($user->active == true) {
                $user->active = false;
                $user->save();
                return redirect()->route('users.index')->with('success','User Blocked Updated');
            }
            else {
                $user->active = true;
                $user->save();
                return redirect()->route('users.index')->with('success','User Activated Updated');
            }
        } catch (\Throwable $th) {
            return redirect()->route('users.index')->with('error', 'Update Failed. Please try again later');
        }



    }
}
