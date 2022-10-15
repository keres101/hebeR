<?php

namespace App\Http\Controllers;

use App\Models\Role;
use Illuminate\Http\Request;
use Inertia\Inertia;

class RoleController extends Controller
{
    public function show()
    {
        return Inertia::render('Role/Index', ["roles" => Role::all()]);
    }

    public function create()
    {
        return Inertia::render('Role/Create');
    }

    public function save(Request $req)
    {
        Role::create([
            'role' => $req['role']
        ]);
        return redirect('/roles');
    }

    public function delete($id)
    {
        Role::find($id)->delete();
        return redirect('/roles');
    }
}
