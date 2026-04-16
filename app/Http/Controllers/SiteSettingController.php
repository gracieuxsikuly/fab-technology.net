<?php

namespace App\Http\Controllers;

use App\Models\SiteSetting;
use Illuminate\Http\Request;

class SiteSettingController extends Controller
{
    /**
     * Show the form for editing site settings.
     */
    public function edit()
    {
        $setting = SiteSetting::getSetting();
        return view('backend.settings.edit', ['setting' => $setting]);
    }

    /**
     * Update the site settings.
     */
    public function update(Request $request)
    {
        $request->validate([
            'site_name' => 'required|string|max:255',
            'site_description' => 'nullable|string',
            'email' => 'nullable|email',
            'phone' => 'nullable|string',
            'metadata_keywords' => 'nullable|string',
            'metadata_description' => 'nullable|string',
            'logo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'favicon' => 'nullable|image|mimes:jpeg,png,jpg,gif,ico|max:1024',
        ]);

        $setting = SiteSetting::getSetting();

        // Handle logo upload
        if ($request->hasFile('logo')) {
            // Delete old logo if it exists
            if ($setting->logo) {
                $oldPath = str_replace('storage/', 'storage/app/public/', $setting->logo);
                if (file_exists(base_path($oldPath))) {
                    unlink(base_path($oldPath));
                }
            }
            $path = $request->file('logo')->store('logos', 'public');
            $request->merge(['logo' => 'storage/' . $path]);
        }

        // Handle favicon upload
        if ($request->hasFile('favicon')) {
            // Delete old favicon if it exists
            if ($setting->favicon) {
                $oldPath = str_replace('storage/', 'storage/app/public/', $setting->favicon);
                if (file_exists(base_path($oldPath))) {
                    unlink(base_path($oldPath));
                }
            }
            $path = $request->file('favicon')->store('favicon', 'public');
            $request->merge(['favicon' => 'storage/' . $path]);
        }

        $setting->update($request->only([
            'site_name',
            'site_description',
            'email',
            'phone',
            'metadata_keywords',
            'metadata_description',
            'logo',
            'favicon',
        ]));

        return redirect()->route('admin.settings.edit')->with('success', 'Paramètres du site mis à jour avec succès.');
    }
}
