<?php

namespace App\Http\Controllers\masterRole;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use DataTables;

// Models
use App\Models\User;
use App\Models\admin_detail;
use App\Models\model_has_role;
use Spatie\Permission\Models\Role;




class PenggunaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $roles = Role::select('id', 'name')->get();
        return view('masterRole.pengguna', compact('roles'));
    }

    public function api(){
        $pengguna = admin_detail::all();
        return DataTables::of($pengguna)
            ->addColumn('action', function ($p) {
                return "
                <a href='#' onclick='remove(" . $p->id . ")' class='text-danger' title='Hapus Permission'><i class='icon-remove'></i></a>";
            })
            ->editColumn('admin_id', function ($p) {
                return "<a href='" . route( 'MasterRole.pengguna.show', $p->id) . "' class='text-primary' title='Show Data'>".$p->admins->username."</a>";
            })
            ->addIndexColumn()
            ->rawColumns(['action', 'admin_id'])
            ->toJson();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'username' => 'required|unique:admins',
            'password' => 'required',
            'nama'     => 'required',
            'email'    => 'required|email|unique:admin_details',
            'role_id'  => 'required'
        ]);

        /** Tahapan :
         * 1. admins
         * 2. admins_details
         * 3. model_has_roles
         */

        // Tahap 1
        $username = $request->username;
        $password = $request->password;

        $admins = new User();
        $admins->username = $username;
        $admins->password = Hash::make($password);
        $admins->save();

        // Tahap 2
        $nama    = $request->nama;
        $email   = $request->email;
        $get_admin_id = User::select('id')->latest()->first();


        $admin_details = new admin_detail();
        $admin_details->nama     = $nama;
        $admin_details->email    = $email;
        $admin_details->admin_id = $get_admin_id->id;
        $admin_details->save();

        // Tahap 3
        $path    = 'App\Models\User';
        $role_id = $request->role_id;

        $model_has_roles = new model_has_role();
        $model_has_roles->role_id    = $role_id;
        $model_has_roles->model_type = $path;
        $model_has_roles->model_id   = $get_admin_id->id;
        $model_has_roles->save();

        return response()->json([
            'message' => 'Data berhasil tersimpan.'
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $admin_details = admin_detail::findOrFail($id);
        $admins = User::whereid($admin_details->admin_id)->first();
        $roles = Role::select('id', 'name')->get();

        // get role_id by user
        $model_has_roles = model_has_role::where('model_id', $admin_details->admin_id)->first();
        $role = Role::select('id', 'name')->whereid($model_has_roles->role_id)->first();

        return view('masterRole.show', compact(

            'admin_details',
            'admins',
            'roles',
            'role'

        ));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $admin_details = admin_detail::find($id);
        $request->validate([
            'username' => 'required|unique:admins,username,' . $admin_details->admin_id,
            'nama'     => 'required',
            'email'    => 'required|email|unique:admin_details,email,' . $id,
            'role_id'  => 'required'
        ]);

        /** Tahapan :
         * 1. admins
         * 2. admins_details
         * 3. model_has_roles
         */

        //  Tahap 1
        $username = $request->username;
        $admin    = User::find($admin_details->admin_id);
        $admin->update([
            'username' => $username
        ]);

        // Tahap 2
        $nama    = $request->nama;
        $email   = $request->email;

        if ($request->foto != null) {
            $request->validate([
                'foto' => 'required|mimes:png,jpg,jpeg|max:1024'
            ]);
            $admin_details->update([
                'nama'    => $nama,
                'email'   => $email,
            ]);
        } else {
            $admin_details->update([
                'nama'    => $nama,
                'email'   => $email,

            ]);
        }

        // Tahap 3
        $role_id = $request->role_id;

        $model_has_roles = model_has_role::wheremodel_id($admin_details->admin_id);
        $model_has_roles->update([
            'role_id' => $role_id
        ]);

        return response()->json([
            'message' => 'Data berhasil diperbaharui.'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $admin_detail = admin_detail::findOrFail($id);

        // delete from table admin_details
        $admin_detail->delete();

        // delete from table model_has_roles
        model_has_role::wheremodel_id($admin_detail->admin_id)->delete();

        // delete from table admins
        User::whereid($admin_detail->admin_id)->delete();

        return response()->json([
            'message' => 'Data berhasil dihapus.'
        ]);
    }

    public function editPassword($id)
    {

        $admin_details = admin_detail::findOrFail($id);

        return view('masterRole.form_password', compact(
            'admin_details'
        ));
    }

    public function updatePassword(Request $request, $id)
    {
        $admin_details = admin_detail::find($id);
        $request->validate([
            'password'         => 'required|string|min:8',
            'confirm_password' => 'required|same:password'
        ]);

        $password = $request->password;
        $admins    = User::find($admin_details->admin_id);
        $admins->update([
            'password' => Hash::make($password)
        ]);

        return response()->json([
            'message' => 'Data berhasil diperbaharui.'
        ]);
    }
}
