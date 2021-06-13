<?php

namespace App\Http\Controllers;

use App\Review;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ReviewController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->review = new Review;
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $user = Auth::user();
        $reviews = Review::get();
        return view('hometalk', compact('reviews', 'user'));
    }

    public function add(Request $request)
    {
        $user = Auth::user();
        $this->validate($request, $this->review->rules());
        $review = $request->input('review');
        Review::create([
            'login_id' => $user->id,
            'first_name' => $user->first_name,
            'review' => $review
        ]);

        return redirect()->route('home.chat');
    }

    public function getData()
    {
        $reviews = Review::orderBy('created_at', 'desc')->get();
        $json = ["reviews" => $reviews];
        return $this->jsonResponse($json);
    }
}
