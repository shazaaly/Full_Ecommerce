<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\Review;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReviewController extends Controller
{
    //

    public function storeReview(Request $request, $product_id)
    {

//        return $product_id;
        $request->validate([
            'summary' => 'required|max:250',
            'comment' => 'max:500'
        ]);

        Review::insert([
            'product_id' => $product_id,
            'summary' => $request->summary,
            'comment' => $request->comment,
            'rating' => $request->quality,
            'user_id' => Auth::id(),
            'created_at' => Carbon::now(),

        ]);
        $notification = array(
            'message' => 'Review submitted for review, Thanks!',
            'type' => 'success',

        );
        return redirect()->back()->with($notification);

    }

//Admin

    public function pending_reviews()
    {
        $reviews = Review::where('status', '0')->orderBy('id', 'DESC')->get();
        return view('backend.reviews.pending_reviews', compact('reviews'));

    }

    public function approveReview($review_id)
    {
        Review::where('id', $review_id)->update([
            'status' => 2
        ]);
        $notification = array(
            'message' => 'Review Approved successfully',
            'type' => 'success',

        );
        return redirect()->back()->with($notification);


    }

    public function Approved()
    {
        $reviews = Review::where('status', '2')->orderBy('id', 'DESC')->get();
        return view('backend.reviews.approved_reviews', compact('reviews'));

    }

    public function review_delete($id)
    {
        Review::findOrFail($id)->delete();
        $notification = array(
            'message' => 'Review deleted successfully',
            'type' => 'success',

        );
        return redirect()->back()->with($notification);

    }


}
