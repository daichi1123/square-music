<?php

namespace App\Http\Controllers;

use App\Review;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReviewController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $reviews = Review::get();
        return view('hometalk', compact('reviews'));
    }

    public function add(Request $request)
    {
        $user = Auth::user();
        $review = $request->input('review');
        Review::create([
            'login_id' => $user->id,
            'first_name' => $user->first_name,
            'review' => $review
        ]);

        return redirect()->route('home');
    }

    public function getData()
    {
        $reviews = Review::orderBy('created_at', 'desc')->get();
        $json = ["reviews" => $reviews];
        return response()->json($json);
    }
}
