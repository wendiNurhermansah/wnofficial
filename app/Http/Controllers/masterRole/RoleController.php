<?php

namespace App\Http\Controllers\masterRole;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Spatie\Permission\Models\Role;
use App\Models\role_has_permission;
use App\Models\permission;
use DataTables;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('masterRole.role');
    }

    public function api(){
        $role = Role::all();
        return DataTables::of($role)
        ->addColumn('permissions', function ($p) {
            return   " <a href='" .route('MasterRole.role.addpermission',$p->id) . "' class='text-success pull-right' title='Edit Permissions'><i class='icon-clipboard-list2 mr-1'></i></a>";
        })

            ->addColumn('action', function ($p) {
                return "
                    <a href='#' onclick='edit(" . $p->id . ")' title='Edit Role'><i class='icon-pencil mr-1'></i></a>
                    <a href='#' onclick='remove(" . $p->id . ")' class='text-danger' title='Hapus Role'><i class='icon-remove'></i></a>";
            })
            ->addIndexColumn()
            ->rawColumns(['action', 'permissions'])
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
            'name' => 'required|unique:roles,name',
            'guard_name' => 'required'
        ]);
        $input = $request->all();
        Role::create($input);
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
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return Role::find($id);
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
        $request->validate([
            'name' => 'required|unique:roles,name,' . $id,
            'guard_name' => 'required'
        ]);

        $input = $request->all();
        $role = Role::findOrfail($id);
        $role->update($input);
        return response()->json([
            'message' => 'Data berhasil di perbaharui.'
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
        Role::destroy($id);
        return response()->json([
            'massage' => 'data berhasil di hapus.'
        ]);
    }

    public function permission($id)
    {


        $role  = Role::findOrFail($id);
        $exist_permission = role_has_permission::select('permission_id')->whererole_id($id)->get()->toArray();
        $permission      = Permission::select('id', 'name')->whereNotIn('id', $exist_permission)->get();

        return view('masterRole.formPermission', compact(
            'role',
            'permission'
        ));
    }

    public function storePermission(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'permission' => 'required'
        ]);

        $role = Role::findOrFail($request->id);
        $role->givePermissionTo($request->permission);

        return response()->json([
            'message' => 'Data permission berhasil tersimpan.'
        ]);
    }

    public function getPermission($id)
    {
        $Role = Role::findOrFail($id);
        return $Role->permissions;
    }

    public function destroyPermission(Request $request, $name)
    {
        $role = Role::findOrFail($request->id);
        $role->revokePermissionTo($name);

        return response()->json([
            'success' => true
        ]);
    }
}
