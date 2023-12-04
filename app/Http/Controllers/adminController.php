<?php

namespace App\Http\Controllers;

use App\Http\Requests\usersAddValidation;
use App\Http\Requests\usersEditValidation;
use App\Models\Company;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;

class adminController extends Controller
{
    public function check()
    {
        //if users is admin
        if (auth()->user()->is_admin) {
            return Redirect::route("companies.index");
        } else {
            return Redirect::route('profile.edit');
        }
    }
    public function index()
    {
        $this->authorize('isAdmin',  User::class);
        $users = User::paginate(6);
        return view('admin.users.index', compact('users'));
    }
    public function create()
    {
        $this->authorize('isAdmin',  User::class);
        return view('admin.users.create');
    }
    public function store(usersAddValidation $request)
    {
        $this->authorize('isAdmin',  User::class);
        $users = new user();
        if ($request->isAdmin) {
            $users->is_admin = true;
        }
        $users->name = $request->name;
        $users->phone = $request->phone;
        $users->email = $request->email;
        $users->address = $request->address;
        $users->postal_code = $request->postal_code;
        $users->city = $request->city;
        $users->password = Hash::make($request->password_confirmation);
        $users->created_at = date('y-m-d');
        $users->save();
        return redirect()->route('users.index')->with('success', 'gebruiker succesvol aangemaakt');
    }
    //search
    public function search(Request $request)
    {
        $this->authorize('isAdmin',  User::class);
        $bar = $request->search;
        $searchTerm = "%" . $bar . "%";
        if ($searchTerm) {
            $users = User::where('name', 'LIKE', $searchTerm);
        } else {
            $users = User::query();
        }
        $users = $users->orderBy('created_at', 'desc')
            ->paginate(6)
            ->appends(request()->query());
        return view('admin.users.index', compact('users', 'bar'));
    }
    public function edit(User $user)
    {
        $this->authorize('isAdmin',  User::class);
        return view('admin.users.edit', compact('user'));
    }

    public function destroy(User $user)
    {
        $this->authorize('isAdmin',  User::class);
        $user->delete();
        return redirect()->route('users.index')->with('success', 'gebruiker succesvol verwijderd');
    }
    //update
    public function update(usersEditValidation  $request, User $user)
    {
        $this->authorize('isAdmin',  User::class);
        if ($request->isAdmin) {
            $user->is_admin = true;
        }
        $user->name = $request->name;
        $user->phone = $request->phone;
        $user->address = $request->address;
        $user->postal_code = $request->postal_code;
        $user->city = $request->city;
        $user->email = $request->email;
        $user->save();
        return redirect()->route('users.index')->with('success', 'gebruiker succesvol aangepast');
    }
}
