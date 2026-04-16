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

        // Prepare data for update
        $data = $request->only([
            'site_name',
            'site_description',
            'email',
            'phone',
            'metadata_keywords',
            'metadata_description',
        ]);

        // Handle logo upload
        if ($request->hasFile('logo')) {
            // Delete old logo if it exists
            if ($setting->logo) {
                $oldPath = public_path($setting->logo);
                if (file_exists($oldPath)) {
                    unlink($oldPath);
                }
            }
            
            // Upload to public/assets/logos with original filename
            $file = $request->file('logo');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('assets/logos'), $filename);
            $data['logo'] = '/assets/logos/' . $filename;
        }

        // Handle favicon upload
        if ($request->hasFile('favicon')) {
            // Delete old favicon if it exists
            if ($setting->favicon) {
                $oldPath = public_path($setting->favicon);
                if (file_exists($oldPath)) {
                    unlink($oldPath);
                }
            }
            
            // Upload to public/assets/favicon with original filename
            $file = $request->file('favicon');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('assets/favicon'), $filename);
            $data['favicon'] = '/assets/favicon/' . $filename;
        }

        // Update with clean data (no temporary file paths)
        $setting->update($data);

        // Clear site setting cache
        SiteSetting::clearCache();

        return redirect()->route('admin.settings.edit')->with('success', 'Paramètres du site mis à jour avec succès.');
    }
}
