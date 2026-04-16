<?php

namespace App\Http\Controllers;

use App\Models\SocialLink;
use Illuminate\Http\Request;

class SocialLinkController extends Controller
{
    /**
     * Display a listing of social links.
     */
    public function index()
    {
        $socialLinks = SocialLink::orderBy('order')->get();
        return view('backend.social-links.index', ['socialLinks' => $socialLinks]);
    }

    /**
     * Show the form for creating a new social link.
     */
    public function create()
    {
        $platforms = [
            'twitter' => 'Twitter',
            'facebook' => 'Facebook',
            'instagram' => 'Instagram',
            'linkedin' => 'LinkedIn',
            'youtube' => 'YouTube',
            'github' => 'GitHub',
            'tiktok' => 'TikTok',
            'whatsapp' => 'WhatsApp',
        ];
        return view('backend.social-links.create', ['platforms' => $platforms]);
    }

    /**
     * Store a newly created social link in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'platform' => 'required|string|max:255',
            'url' => 'required|url',
            'icon' => 'nullable|string|max:255',
            'order' => 'nullable|integer',
            'is_active' => 'nullable|boolean',
        ]);

        $validated['is_active'] = $request->has('is_active');

        SocialLink::create($validated);

        return redirect()->route('admin.social-links.index')->with('success', 'Lien social créé avec succès.');
    }

    /**
     * Show the form for editing the specified social link.
     */
    public function edit(SocialLink $socialLink)
    {
        $platforms = [
            'twitter' => 'Twitter',
            'facebook' => 'Facebook',
            'instagram' => 'Instagram',
            'linkedin' => 'LinkedIn',
            'youtube' => 'YouTube',
            'github' => 'GitHub',
            'tiktok' => 'TikTok',
            'whatsapp' => 'WhatsApp',
        ];
        return view('backend.social-links.edit', ['socialLink' => $socialLink, 'platforms' => $platforms]);
    }

    /**
     * Update the specified social link in storage.
     */
    public function update(Request $request, SocialLink $socialLink)
    {
        $validated = $request->validate([
            'platform' => 'required|string|max:255',
            'url' => 'required|url',
            'icon' => 'nullable|string|max:255',
            'order' => 'nullable|integer',
            'is_active' => 'nullable|boolean',
        ]);

        $validated['is_active'] = $request->has('is_active');

        $socialLink->update($validated);

        return redirect()->route('admin.social-links.index')->with('success', 'Lien social mis à jour avec succès.');
    }

    /**
     * Remove the specified social link from storage.
     */
    public function destroy(SocialLink $socialLink)
    {
        $socialLink->delete();
        return redirect()->route('admin.social-links.index')->with('success', 'Lien social supprimé avec succès.');
    }
}
