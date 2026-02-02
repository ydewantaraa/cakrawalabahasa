<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Course;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function add(Course $course)
    {
        Cart::create([
            'user_id' => Auth::id(),
            'course_id' => $course->id,
            'quantity' => 1
        ]);

        return redirect()->route('cart.index')->with('success', 'Course added to cart.');
    }

    public function index()
    {
        $carts = Cart::where('user_id', Auth::id())->with('course')->get();
        return view('cart.index', compact('carts'));
    }
}
