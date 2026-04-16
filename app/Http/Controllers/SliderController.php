<?php

namespace App\Http\Controllers;

use App\Models\Slider;
use Illuminate\Http\Request;

class SliderController extends Controller
{
    /**
     * Display all sliders (max 3 active for frontend).
     */
    public function index()
    {
        $sliders = Slider::orderBy('order')->get();
        return view('backend.sliders.index', ['sliders' => $sliders]);
    }

    /**
     * Show the form for creating a new slider.
     */
    public function create()
    {
        return view('backend.sliders.create');
    }

    /**
     * Store a newly created slider in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,webp|max:5120',
            'order' => 'nullable|integer',
            'is_active' => 'nullable|boolean',
        ]);

        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('sliders', 'public');
            $validated['image'] = 'storage/' . $path;
        }

        $validated['is_active'] = $request->has('is_active');

        Slider::create($validated);

        // Clear sliders cache
        Slider::clearCache();

        return redirect()->route('admin.sliders.index')->with('success', 'Slider créé avec succès.');
    }

    /**
     * Show the form for editing the specified slider.
     */
    public function edit(Slider $slider)
    {
        return view('backend.sliders.edit', ['slider' => $slider]);
    }

    /**
     * Update the specified slider in storage.
     */
    public function update(Request $request, Slider $slider)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:5120',
            'order' => 'nullable|integer',
            'is_active' => 'nullable|boolean',
        ]);

        if ($request->hasFile('image')) {
            if ($slider->image && file_exists(public_path($slider->image))) {
                unlink(public_path($slider->image));
            }
            $path = $request->file('image')->store('sliders', 'public');
            $validated['image'] = 'storage/' . $path;
        }

        $validated['is_active'] = $request->has('is_active');

        $slider->update($validated);

        // Clear sliders cache
        Slider::clearCache();

        return redirect()->route('admin.sliders.index')->with('success', 'Slider mis à jour avec succès.');
    }

    /**
     * Remove the specified slider from storage.
     */
    public function destroy(Slider $slider)
    {
        if ($slider->image && file_exists(public_path($slider->image))) {
            unlink(public_path($slider->image));
        }
        $slider->delete();

        // Clear sliders cache
        Slider::clearCache();

        return redirect()->route('admin.sliders.index')->with('success', 'Slider supprimé avec succès.');
    }
}
