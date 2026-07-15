<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Category;
use App\Models\CourseVideo;
use App\Models\SubscribeTransaction;
use Illuminate\Http\Request;

class FrontController extends Controller
{   
    public function index()
    {
        $categories = Category::all();
        $courses = Course::with(['category', 'teacher', 'students'])->orderBy('id', 'desc')->get();
        return view('front.index', compact('categories', 'courses'));
    }

    public function details(Course $course)
    {
        return view('front.details', compact('course'));
    }

    public function category(Category $category)
    {
        return view('front.category', compact('category'));
    }

    public function pricing()
    {
        return view('front.pricing');
    }

    public function checkout()
    {
        return view('front.checkout');
    }

    public function checkout_store(Request $request)
    {
        $request->validate([
            'proof' => ['required', 'image', 'mimes:png,jpg,jpeg'],
        ]);

        $proofPath = $request->file('proof')->store('proofs', 'public');

        SubscribeTransaction::create([
           'user_id' => (int) auth()->id(),
            'total_amount' => 429000,
            'is_paid' => false,
            'proof' => $proofPath,
        ]);

        return redirect()->route('front.index');
    }

    public function learning(Course $course, int $courseVideoId)
    {
        $courseVideo = CourseVideo::findOrFail($courseVideoId);
        return view('front.learning', compact('course', 'courseVideo'));
    }
}