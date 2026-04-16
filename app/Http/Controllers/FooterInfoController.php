<?php

namespace App\Http\Controllers;

use App\Models\FooterInfo;
use Illuminate\Http\Request;

class FooterInfoController extends Controller
{
    /**
     * Display a listing of footer infos.
     */
    public function index()
    {
        $footerInfos = FooterInfo::orderBy('order')->get();
        return view('backend.footer-infos.index', ['footerInfos' => $footerInfos]);
    }

    /**
     * Show the form for creating a new footer info.
     */
    public function create()
    {
        return view('backend.footer-infos.create');
    }

    /**
     * Store a newly created footer info in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'description' => 'nullable|string',
            'address' => 'nullable|string|max:255',
            'email' => 'nullable|email',
            'phone' => 'nullable|string|max:20',
            'order' => 'nullable|integer',
            'is_active' => 'nullable|boolean',
        ]);

        $validated['is_active'] = $request->has('is_active');

        FooterInfo::create($validated);

        // Clear footer infos cache
        FooterInfo::clearCache();

        return redirect()->route('admin.footer-infos.index')->with('success', 'Information de pied de page créée avec succès.');
    }

    /**
     * Show the form for editing the specified footer info.
     */
    public function edit(FooterInfo $footerInfo)
    {
        return view('backend.footer-infos.edit', ['footerInfo' => $footerInfo]);
    }

    /**
     * Update the specified footer info in storage.
     */
    public function update(Request $request, FooterInfo $footerInfo)
    {
        $validated = $request->validate([
            'description' => 'nullable|string',
            'address' => 'nullable|string|max:255',
            'email' => 'nullable|email',
            'phone' => 'nullable|string|max:20',
            'order' => 'nullable|integer',
            'is_active' => 'nullable|boolean',
        ]);

        $validated['is_active'] = $request->has('is_active');

        $footerInfo->update($validated);

        // Clear footer infos cache
        FooterInfo::clearCache();

        return redirect()->route('admin.footer-infos.index')->with('success', 'Information de pied de page mise à jour avec succès.');
    }

    /**
     * Remove the specified footer info from storage.
     */
    public function destroy(FooterInfo $footerInfo)
    {
        $footerInfo->delete();

        // Clear footer infos cache
        FooterInfo::clearCache();

        return redirect()->route('admin.footer-infos.index')->with('success', 'Information de pied de page supprimée avec succès.');
    }
}
