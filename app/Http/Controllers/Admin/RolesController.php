<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyRoleRequest;
use App\Http\Requests\StoreRoleRequest;
use App\Http\Requests\UpdateRoleRequest;
use App\Permission;
use App\Role;
use Illuminate\Support\Facades\Auth;
class RolesController extends Controller
{
    public function index()
    {
        $userLogin = Auth::user()->user_fullname;
        abort_unless(\Gate::allows('role_access'), 403);

        $roles = Role::all();

        return view('admin.roles.index', compact('roles','userLogin'));
    }

    public function create()
    {
        $userLogin = Auth::user()->user_fullname;
        abort_unless(\Gate::allows('role_create'), 403);

        $permissions = Permission::all()->pluck('title', 'id');

        return view('admin.roles.create', compact('permissions','userLogin'));
    }

    public function store(StoreRoleRequest $request)
    {
        abort_unless(\Gate::allows('role_create'), 403);

        $role = Role::create($request->all());
        $role->permissions()->sync($request->input('permissions', []));

        return redirect()->route('admin.roles.index');
    }

    public function edit(Role $role)
    {
        $userLogin = Auth::user()->user_fullname;
        abort_unless(\Gate::allows('role_edit'), 403);

        $permissions = Permission::all()->pluck('title', 'id');

        $role->load('permissions');

        return view('admin.roles.edit', compact('permissions', 'role','userLogin'));
    }

    public function update(UpdateRoleRequest $request, Role $role)
    {
        abort_unless(\Gate::allows('role_edit'), 403);

        $role->update($request->all());
        $role->permissions()->sync($request->input('permissions', []));

        return redirect()->route('admin.roles.index');
    }

    public function show(Role $role)
    {
        abort_unless(\Gate::allows('role_show'), 403);

        $role->load('permissions');

        return view('admin.roles.show', compact('role'));
    }

    public function destroy(Role $role)
    {
        abort_unless(\Gate::allows('role_delete'), 403);

        $role->delete();

        return back();
    }

    public function massDestroy(MassDestroyRoleRequest $request)
    {
        Role::whereIn('id', request('ids'))->delete();

        return response(null, 204);
    }
}
