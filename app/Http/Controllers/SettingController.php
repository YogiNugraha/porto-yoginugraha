<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Setting;
use Illuminate\Support\Facades\Storage;

class SettingController extends Controller
{
    public function index()
    {
        // Fetch all settings and map them by key for the view
        $settings = Setting::pluck('value', 'key')->toArray();
        return view('admin.settings.index', compact('settings'));
    }

    public function store(Request $request)
    {
        // Define fields we expect from the form
        $fields = [
            'hero_title' => 'text',
            'hero_desc' => 'textarea',
            'hero_location' => 'text',
            'hero_stats_1_number' => 'text',
            'hero_stats_1_label' => 'text',
            'hero_stats_2_number' => 'text',
            'hero_stats_2_label' => 'text',
            'hero_stats_3_number' => 'text',
            'hero_stats_3_label' => 'text',
            'btn_konsultasi_text' => 'text',
            'btn_konsultasi_link' => 'text',
            'logo_title' => 'text',
            'linkedin_url' => 'text',
            'github_url' => 'text',
            'email_address' => 'text',
            'footer_copyright' => 'text',
        ];

        // Handle text fields
        foreach ($fields as $key => $type) {
            if ($request->has($key)) {
                Setting::updateOrCreate(
                    ['key' => $key],
                    ['value' => $request->input($key), 'type' => $type]
                );
            }
        }

        // Handle file uploads separately
        $fileFields = ['logo', 'hero_image'];
        foreach ($fileFields as $fileKey) {
            if ($request->hasFile($fileKey)) {
                // Delete old if exists
                $oldSetting = Setting::where('key', $fileKey)->first();
                if ($oldSetting && $oldSetting->value) {
                    Storage::disk('public')->delete($oldSetting->value);
                }

                $path = $request->file($fileKey)->store('settings', 'public');
                Setting::updateOrCreate(
                    ['key' => $fileKey],
                    ['value' => $path, 'type' => 'image']
                );
            }
        }

        return redirect()->route('settings.index')->with('success', 'Settings updated successfully.');
    }
}
