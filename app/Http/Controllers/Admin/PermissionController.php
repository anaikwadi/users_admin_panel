<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Role;
use App\Models\Permission;
use Illuminate\Support\Facades\DB;

class PermissionController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }
    
    // Permission Listing Page
    public function index()
    {
        $inc = 1;
        $permissions = Permission::all();

        $params = [
            'title' => 'Permissions Listing',
            'inc' => $inc,
            'permissions' => $permissions,
        ];

        return view('admin.permission.perm_list')->with($params);
    }

    // Permission Create Page
    public function create()
    {
        //
        $params = [
            'title' => 'Create Permission',
        ];

        return view('admin.permission.perm_create')->with($params);
    }

    // Permission Store to DB
    public function store(Request $request)
    {
        //
        $this->validate($request, [
            'name' => 'required|unique:permissions',
            'display_name' => 'required',
            'description' => 'required',
        ]);

        $permission = Permission::create([
            'name' => $request->input('name'),
            'display_name' => $request->input('display_name'),
            'description' => $request->input('description'),
        ]);

        $ip = \Request::ip();
        \Log::info('Permissions Control Panel Permission "'.$permission->name .'" Added by User '.\Auth::User()->name.' with IP Address = '.($ip));   

        return redirect()->route('permission.index')->with('success', "The Permission <strong>$permission->name</strong> has successfully been created.");
    }

    // Permission Delete Confirmation Page
    public function show($id)
    {
        //
        try {
            $permission = Permission::findOrFail($id);

            $params = [
                'title' => 'Delete Permission',
                'permission' => $permission,
            ];

            return view('admin.permission.perm_delete')->with($params);
        } catch (ModelNotFoundException $ex) {
            if ($ex instanceof ModelNotFoundException) {
                return response()->view('errors.' . '404');
            }
        }
    }

    // Permission Editing Page
    public function edit($id)
    {
        //
        try {
            $permission = Permission::findOrFail($id);

            $params = [
                'title' => 'Edit Permission',
                'permission' => $permission,
            ];

            //dd($role_permissions);

            return view('admin.permission.perm_edit')->with($params);
        } catch (ModelNotFoundException $ex) {
            if ($ex instanceof ModelNotFoundException) {
                return response()->view('errors.' . '404');
            }
        }
    }

    // Permission update to DB
    public function update(Request $request, $id)
    {
        //
        try {
            $permission = Permission::findOrFail($id);

            $this->validate($request, [
                'display_name' => 'required',
                'description' => 'required',
            ]);

            $permission->name = $request->input('name');
            $permission->display_name = $request->input('display_name');
            $permission->description = $request->input('description');

            $permission->save();

            $ip = \Request::ip();
            \Log::warning('Permissions Control Panel Permission "'.$permission->name .'" Updated by User '.\Auth::User()->name.' with IP Address = '.($ip));   

            return redirect()->route('permission.index')->with('success', "The permission <strong>$permission->name</strong> has successfully been updated.");
        } catch (ModelNotFoundException $ex) {
            if ($ex instanceof ModelNotFoundException) {
                return response()->view('errors.' . '404');
            }
        }
    }

    // Permission Delete from DB
    public function destroy($id)
    {
        //
        try {
            $permission = Permission::findOrFail($id);
            DB::table("permission_role")->where('permission_id', $id)->delete();
            $permission->delete();

            $ip = \Request::ip();
            \Log::alert('Permissions Control Panel Permission "'.$permission->name .'" Deleted by User '.\Auth::User()->name.' with IP Address = '.($ip));   
            
            return redirect()->route('permission.index')->with('success', "The Role <strong>$permission->name</strong> has successfully been archived.");
        } catch (ModelNotFoundException $ex) {
            if ($ex instanceof ModelNotFoundException) {
                return response()->view('errors.' . '404');
            }
        }
    }
}
