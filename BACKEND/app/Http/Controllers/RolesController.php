<?php

namespace App\Http\Controllers;

use App\Models\Roles;
use Illuminate\Http\Request;
use App\Events\RoleDeleted;

class RolesController extends Controller
{
    public function index()
    {
        $roles = Roles::all();

        return response()->json(['data' => $roles], 200);
    }

    public function getRoles()
    {
        $roles = Roles::pluck('nama'); // Mengambil nilai dari kolom 'role' saja

        return response()->json(['data' => $roles], 200);
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|unique:roles|max:255',
        ]);

        $role = Roles::create([
            'nama' => $request->input('nama'),
        ]);

        return response()->json(['message' => 'Role created successfully', 'data' => $role], 201);
    }

    public function destroy($id)
    {

        $deletedRole = Roles::find($id);
        if ($deletedRole) {
            $deletedRole->delete();

            // Melempar event RoleDeleted
            event(new RoleDeleted($deletedRole));

            return response()->json([
                'message' => 'Role Successfully Deleted',
            ], 200);
        } else {
            return response()->json([
                'message' => 'Role Not Found',
            ], 404);
        }
        //        return redirect()->back();
    }

    public function update(Request $request, $id)
    {

        $this->validate($request, [
            'nama' => 'nullable',
            // 'email' => 'required|email:dns',
        ]);
        $uprole = Roles::find($id);
        $uprole->role = $request->role;
        $uprole->save();
        return response()->json([
            'message' => 'Data Anda Berhasil Di Update',
            'Success' => true,
        ]);
    }
}
