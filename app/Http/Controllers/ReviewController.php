<?php

namespace App\Http\Controllers;

use App\Http\Requests\ReviewRequest;
use App\Models\Review;

class ReviewController extends Controller
{
    public function sendReview(ReviewRequest $request)
    {
        $review = Review::create([
            'comment' => $request->comment,
            'rating' => $request->rating,
            'userID' => $request->userID,
            'propertyID' => $request->propertyID,
        ]);
        return response()->json($review);
    }

    public function showReviews()
    {
        $reviews = Review::get();

        return response()->json(['reviews' => $reviews]);
    }

    public function showSpecificPropertyReviews($propertyID)
    {
        $reviews = Review::where('propertyID', $propertyID)->get();
        if ($reviews->isEmpty()) {
            return response()->json(["message" => 'No reviews found for this property']);
        }
        return response()->json(['reviews' => $reviews]);
    }

    public function showSpecificUserReviews($userID)
    {
        $reviews = Review::where('userID', $userID)->get();
        if ($reviews->isEmpty()) {
            return response()->json(["message" => 'No reviews found for this user']);
        }
        return response()->json(['reviews' => $reviews]);
    }

    public function DeleteReview($id)
    {
        Review::find($id)->delete();
    }
}
