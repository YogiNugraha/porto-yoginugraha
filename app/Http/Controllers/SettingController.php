<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Setting;
use Illuminate\Support\Facades\Storage;

class SettingController extends Controller
{
    public function index()
    {
        $settings = Setting::latest()->paginate(10);
        return view('admin.settings.index', compact('settings'));
    }

    public function create()
    {
        return view('admin.settings.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'key' => 'required|string|unique:settings,key|max:255',
            'type' => 'required|in:text,textarea,image,boolean',
            'value' => 'nullable',
        ]);

        $data = $request->only(['key', 'type']);
        
        if ($request->type === 'image' && $request->hasFile('value')) {
            $data['value'] = $request->file('value')->store('settings', 'public');
        } else {
            $data['value'] = $request->value;
        }

        Setting::create($data);

        return redirect()->route('settings.index')->with('success', 'Setting created successfully.');
    }

    public function edit(Setting $setting)
    {
        return view('admin.settings.edit', compact('setting'));
    }

    public function update(Request $request, Setting $setting)
    {
        $request->validate([
            'key' => 'required|string|max:255|unique:settings,key,' . $setting->id,
            'type' => 'required|in:text,textarea,image,boolean',
            'value' => 'nullable',
        ]);

        $data = $request->only(['key', 'type']);

        if ($request->type === 'image') {
            if ($request->hasFile('value')) {
                if ($setting->value && $setting->type === 'image') {
                    Storage::disk('public')->delete($setting->value);
                }
                $data['value'] = $request->file('value')->store('settings', 'public');
            } else {
                $data['value'] = $setting->value; // keep old image if not uploading new one
            }
        } else {
            $data['value'] = $request->value;
        }

        $setting->update($data);

        return redirect()->route('settings.index')->with('success', 'Setting updated successfully.');
    }

    public function destroy(Setting $setting)
    {
        if ($setting->type === 'image' && $setting->value) {
            Storage::disk('public')->delete($setting->value);
        }
        $setting->delete();

        return redirect()->route('settings.index')->with('success', 'Setting deleted successfully.');
    }
}
