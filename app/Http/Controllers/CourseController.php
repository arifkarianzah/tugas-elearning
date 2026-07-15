<?php

namespace App\Http\Controllers;

use App\Models\Course;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = auth()->user();
        if ($user->hasRole('owner')) {
            $courses = Course::orderByDesc('id')->get();
        } else {
            $courses = Course::where('teacher_id', $user->teacher->id ?? 0)->orderByDesc('id')->get();
        }
        return view('admin.courses.index', compact('courses'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = \App\Models\Category::all();
        $teachers = \App\Models\Teacher::with('user')->get();
        return view('admin.courses.create', compact('categories', 'teachers'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'path_trailer' => ['required', 'string', 'max:255'],
            'thumbnail' => ['required', 'image', 'mimes:png,jpg,jpeg'],
            'teacher_id' => ['required', 'integer'],
            'category_id' => ['required', 'integer'],
            'about' => ['required', 'string'],
            'course_keypoints' => ['required', 'array'],
            'course_keypoints.*' => ['nullable', 'string'],
        ]);

        \Illuminate\Support\Facades\DB::transaction(function () use ($validated, $request) {
            $thumbnailPath = $request->file('thumbnail')->store('thumbnails', 'public');
            $slug = \Illuminate\Support\Str::slug($validated['name']);

            $course = Course::create([
                'name' => $validated['name'],
                'slug' => $slug,
                'path_trailer' => $validated['path_trailer'],
                'thumbnail' => $thumbnailPath,
                'about' => $validated['about'],
                'category_id' => $validated['category_id'],
                'teacher_id' => $validated['teacher_id'],
            ]);

            foreach ($validated['course_keypoints'] as $keypointText) {
                if (!empty($keypointText)) {
                    \App\Models\CourseKeypoint::create([
                        'course_id' => $course->id,
                        'name' => $keypointText,
                    ]);
                }
            }
        });

        return redirect()->route('admin.courses.index')->with('success', 'Berhasil menambahkan kelas baru!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Course $course)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Course $course)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Course $course)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Course $course)
    {
        //
    }
}
