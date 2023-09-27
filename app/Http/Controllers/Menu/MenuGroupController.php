<?php

namespace App\Http\Controllers\Menu;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreMenuGroupRequest;
use App\Http\Requests\UpdateMenuGroupRequest;
use App\Models\MenuGroup;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Permission;

class MenuGroupController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('permission:dashboard.index')->only('index');
        $this->middleware('permission:dashboard.create')->only('create', 'store');
        $this->middleware('permission:dashboard.edit')->only('edit', 'update');
        $this->middleware('permission:dashboard.destroy')->only('destroy');
    }
    public function index(Request $request)
    {
        //
        $menuGroups = DB::table('menu_groups')
            ->when($request->input('name'), function ($query, $name) {
                return $query->where('name', 'like', '%' . $name . '%');
            })
            ->paginate(10);
        return view('menu.menu-group.index', compact('menuGroups'));
    }

    public function create()
    {
        //
        $permissions = Permission::all();
        return view('menu.menu-group.create', compact('permissions'));
    }

    public function store(StoreMenuGroupRequest $request)
    {
        //
        MenuGroup::create($request->validated());
        return redirect()->route('menu-group.index')->with('success', 'Data berhasil ditambahkan');
    }

    public function show(MenuGroup $menuGroup)
    {
        //
    }

    public function edit(MenuGroup $menuGroup)
    {
        //
        return view('menu.menu-group.edit', compact('menuGroup'));
    }

    public function update(UpdateMenuGroupRequest $request, MenuGroup $menuGroup)
    {
        //
        $menuGroup->update($request->validated());
        return redirect()->route('menu-group.index')->with('success', 'Data berhasil diubah');
    }

    public function destroy(MenuGroup $menuGroup)
    {
        //
        $menuGroup->delete();
        return redirect()->route('menu-group.index')->with('success', 'Data berhasil dihapus');
    }
}