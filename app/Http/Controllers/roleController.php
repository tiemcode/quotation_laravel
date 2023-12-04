<?php

namespace App\Http\Controllers;

use App\Http\Requests\roleValidation;
use App\Models\role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class roleController extends Controller
{
    public function index()
    {
        $this->authorize('isAdmin',  User::class);
        $roles = role::paginate(6);
        return view('admin.roles.index', compact('roles'));
    }
    public function store(roleValidation $request)
    {
        $this->authorize('isAdmin',  User::class);
        $check = Role::where('name', $request->name);
        if ($check) {
            role::insert([
                'name' => $request->name,
                'created_at' => date('y-m-d'),
                'updated_at' => date('y-m-d'),
            ]);
            return redirect()->route("roles.index")->with('success', 'rol succesvol aangemaakt');
        } else {
            return redirect()->route("roles.index")->with('error', 'rol bestaat al');
        }
    }
    public function edit(role $role)
    {
        $this->authorize('isAdmin',  User::class);
        return view('admin.roles.edit', compact('role'));
    }
    public function update(roleValidation $request, $id)
    {
        $this->authorize('isAdmin',  User::class);
        role::where('id', $id)->update([
            'name' => $request->name,
            'updated_at' => date('y-m-d'),
        ]);
        return Redirect::route('roles.index')
            ->with('success', 'rol succesvol aangepast');
    }
    public function destroy($id)
    {
        $this->authorize('isAdmin',  User::class);
        role::where('id', $id)->delete();
        return Redirect::route('roles.index')
            ->with('success', 'rol succesvol verwijderd');
    }
    public function search(Request $request)
    {
        $this->authorize('isAdmin',  User::class);
        $bar = $request->search;
        $searchTerm = "%" . $bar . "%";
        if ($searchTerm) {
            $roles = role::where('name', 'LIKE', $searchTerm);
        } else {
            $roles = role::query();
        }
        $roles = $roles->orderBy('created_at', 'desc')
            ->paginate(6)
            ->appends(request()->query());
        return view('admin.roles.index', compact('roles', 'bar'));
    }
}
