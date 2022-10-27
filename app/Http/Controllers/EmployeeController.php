<?php

namespace App\Http\Controllers;

use App\Models\Role;
use Auth;

use App\Models\User;
use GuzzleHttp\Psr7\Response;
use Inertia\Inertia;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class EmployeeController extends Controller
{
    public function show()
    {
        // return "Lista de empleados";
        return Inertia::render('Employee/Create', ["roles" => Role::all()]);
    }

    public function save(Request $req)
    {
        // validacion
        try {

            $req->validate([
                'name' => 'required',
                'last_name' => 'required',
                'DNI' => 'required | unique:users',
                'date_of_birth' => 'required | date ',
                'direction' => 'required',
                'email' => 'required | email | unique:users',
                'password' => 'required | confirmed',
                'role_id' => 'required'
            ]);
            print('role iddd' . $req['role_id']);
            User::create([
                'name' => $req['name'],
                'last_name' => $req['last_name'],
                'DNI' => $req['DNI'],
                'date_of_birth' => $req['date_of_birth'],
                'direction' => $req['direction'],
                'email' => $req['email'],
                'role_id' => $req['role_id'],
                'password' => Hash::make($req['password'])
            ]);
            return redirect('/employee');
        } catch (\Throwable $th) {
            return response()->json(["error" => $th]);
        }
    }

    public function list()
    {
        $email_current = Auth()->user()->email;
        $users = User::where('email', '!=', $email_current)->get();
        return Inertia::render('Employee/List', ["users" => $users]);
    }

    public function delete($id)
    {
        User::find($id)->delete();
        return redirect('/employee');
    }
}
