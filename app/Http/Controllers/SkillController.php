<?php

namespace App\Http\Controllers;

use App\Models\Skill;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SkillController extends Controller
{
    public function index()
    {
        $skills = Skill::orderBy('order')->orderBy('created_at', 'desc')->paginate(15);
        return view('admin.skills.index', compact('skills'));
    }

    public function create()
    {
        return view('admin.skills.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'order' => 'required|integer',
            'image_url' => 'nullable|string', // Support devicon urls
            'image' => 'nullable|file|mimes:png,jpg,jpeg,svg,webp|max:2048',
        ]);

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('skills', 'public');
        } elseif (!empty($data['image_url'])) {
            $data['image'] = $data['image_url'];
        }

        unset($data['image_url']);

        Skill::create($data);

        return redirect()->route('skills.index')->with('success', 'Skill created successfully.');
    }

    public function edit(Skill $skill)
    {
        return view('admin.skills.edit', compact('skill'));
    }

    public function update(Request $request, Skill $skill)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'order' => 'required|integer',
            'image_url' => 'nullable|string',
            'image' => 'nullable|file|mimes:png,jpg,jpeg,svg,webp|max:2048',
        ]);

        if ($request->hasFile('image')) {
            if ($skill->image && !str_starts_with($skill->image, 'http')) {
                Storage::disk('public')->delete($skill->image);
            }
            $data['image'] = $request->file('image')->store('skills', 'public');
        } elseif (!empty($data['image_url'])) {
            if ($skill->image && !str_starts_with($skill->image, 'http')) {
                Storage::disk('public')->delete($skill->image);
            }
            $data['image'] = $data['image_url'];
        }

        unset($data['image_url']);

        $skill->update($data);

        return redirect()->route('skills.index')->with('success', 'Skill updated successfully.');
    }

    public function destroy(Skill $skill)
    {
        if ($skill->image && !str_starts_with($skill->image, 'http')) {
            Storage::disk('public')->delete($skill->image);
        }
        $skill->delete();

        return redirect()->route('skills.index')->with('success', 'Skill deleted successfully.');
    }
}
