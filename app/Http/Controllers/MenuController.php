<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use Illuminate\Http\Request;

class MenuController extends Controller
{
    /**
     * Display a listing of menus.
     */
    public function index()
    {
        $menus = Menu::orderBy('order')->get();
        return view('backend.menus.index', ['menus' => $menus]);
    }

    /**
     * Show the form for creating a new menu.
     */
    public function create()
    {
        return view('backend.menus.create');
    }

    /**
     * Store a newly created menu in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'name_en' => 'nullable|string|max:255',
            'url' => 'required|string|max:255',
            'url_en' => 'nullable|string|max:255',
            'order' => 'nullable|integer',
            'is_active' => 'nullable|boolean',
        ]);

        $validated['is_active'] = $request->has('is_active');

        Menu::create($validated);

        // Clear menus cache
        Menu::clearCache();

        return redirect()->route('admin.menus.index')->with('success', 'Menu créé avec succès.');
    }

    /**
     * Show the form for editing the specified menu.
     */
    public function edit(Menu $menu)
    {
        return view('backend.menus.edit', ['menu' => $menu]);
    }

    /**
     * Update the specified menu in storage.
     */
    public function update(Request $request, Menu $menu)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'name_en' => 'nullable|string|max:255',
            'url' => 'required|string|max:255',
            'url_en' => 'nullable|string|max:255',
            'order' => 'nullable|integer',
            'is_active' => 'nullable|boolean',
        ]);

        $validated['is_active'] = $request->has('is_active');

        $menu->update($validated);

        // Clear menus cache
        Menu::clearCache();

        return redirect()->route('admin.menus.index')->with('success', 'Menu mis à jour avec succès.');
    }

    /**
     * Remove the specified menu from storage.
     */
    public function destroy(Menu $menu)
    {
        $menu->delete();

        // Clear menus cache
        Menu::clearCache();

        return redirect()->route('admin.menus.index')->with('success', 'Menu supprimé avec succès.');
    }

    /**
     * Update order of menus.
     */
    public function updateOrder(Request $request)
    {
        $validated = $request->validate([
            'items' => 'required|array',
            'items.*.id' => 'required|exists:menus,id',
            'items.*.order' => 'required|integer',
        ]);

        foreach ($validated['items'] as $item) {
            Menu::where('id', $item['id'])->update(['order' => $item['order']]);
        }

        // Clear menus cache
        Menu::clearCache();

        return response()->json(['success' => true]);
    }
}
