<?php

namespace App\Http\Controllers\Menu;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreMenuItemRequest;
use App\Models\MenuGroup;
use App\Models\MenuItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;

class MenuItemController extends Controller
{
    public function index(Request $request)
    {
        //
        $menuItems = DB::table('menu_items')
            ->select('menu_items.*', 'menu_groups.name as menu_group_name')
            ->join('menu_groups', 'menu_items.menu_group_id', '=', 'menu_groups.id')
            ->when($request->input('name'), function ($query, $name) {
                return $query->where('menu_items.name', 'like', '%' . $name . '%');
            })
            ->when($request->input('url'), function ($query, $url) {
                return $query->where('url', 'like', '%' . $url . '%');
            })
            ->paginate(10);
        return view('menu.menu-item.index', compact('menuItems'));
    }

    public function create()
    {
        //
        $routeCollection = Route::getRoutes();
        $menuGroups = MenuGroup::all();
        return view('menu.menu-item.create', compact('routeCollection', 'menuGroups'));
    }

    public function store(StoreMenuItemRequest $request)
    {
        MenuItem::create($request->validated());
        return redirect()->route('menu-item.index')->with('success', 'Data berhasil ditambahkan');
    }

    public function show(MenuItem $menuItem)
    {
        //
    }

    public function edit(MenuItem $menuItem)
    {
        return view('menu.menu-item.edit', compact('menuItem'));
    }

    public function update(UpdateMenuItemRequest $request, MenuItem $menuItem)
    {
        $menuItem->update($request->validated());
        return redirect()->route('menu-item.index')->with('success', 'Data berhasil diubah');
    }

    public function destroy(MenuItem $menuItem)
    {
        $menuItem->delete();
        return redirect()->route('menu-item.index')->with('success', 'Data berhasil dihapus');
    }
}