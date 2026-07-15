<?php

namespace App\Http\Controllers;

use App\Models\Teacher;
use Illuminate\Http\Request;

class TeacherController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $teachers = Teacher::with('user')->orderByDesc('id')->get();
        return view('admin.teachers.index', compact('teachers'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.teachers.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'occupation' => ['required', 'string', 'max:255'],
            'avatar' => ['required', 'image', 'mimes:png,jpg,jpeg'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users,email'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);

        \Illuminate\Support\Facades\DB::transaction(function () use ($validated, $request) {
            $avatarPath = $request->file('avatar')->store('avatars', 'public');

            $user = \App\Models\User::create([
                'name' => $validated['name'],
                'email' => $validated['email'],
                'occupation' => $validated['occupation'],
                'avatar' => $avatarPath,
                'password' => \Illuminate\Support\Facades\Hash::make($validated['password']),
            ]);

            $user->assignRole('teacher');

            \App\Models\Teacher::create([
                'user_id' => $user->id,
                'is_active' => true,
            ]);
        });

        return redirect()->route('admin.teachers.index')->with('success', 'Berhasil menambahkan guru baru!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Teacher $teacher)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Teacher $teacher)
    {
        return view('admin.teachers.edit', compact('teacher'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Teacher $teacher)
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'occupation' => ['required', 'string', 'max:255'],
            'avatar' => ['nullable', 'image', 'mimes:png,jpg,jpeg'],
            'email' => ['required', 'string', 'email', 'max:255', \Illuminate\Validation\Rule::unique('users')->ignore($teacher->user->id)],
            'password' => ['nullable', 'string', 'min:8', 'confirmed'],
        ]);

        \Illuminate\Support\Facades\DB::transaction(function () use ($validated, $request, $teacher) {
            $user = $teacher->user;
            
            $userData = [
                'name' => $validated['name'],
                'email' => $validated['email'],
                'occupation' => $validated['occupation'],
            ];

            if ($request->hasFile('avatar')) {
                $userData['avatar'] = $request->file('avatar')->store('avatars', 'public');
            }

            if (!empty($validated['password'])) {
                $userData['password'] = \Illuminate\Support\Facades\Hash::make($validated['password']);
            }

            $user->update($userData);
        });

        return redirect()->route('admin.teachers.index')->with('success', 'Berhasil memperbarui data guru!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Teacher $teacher)
    {
        //
    }
}
