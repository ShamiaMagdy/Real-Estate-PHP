<?php

namespace App\Http\Controllers;

use App\Http\Requests\InquiryRequest;
use App\Models\Inquiry;

class InquiryController extends Controller
{
    public function createInquiry(InquiryRequest $request)
    {
        $inquiry = Inquiry::create([
            'message' => $request->message,
            'propertyID'=>$request->propertyID,
            'userID'=>$request->userID
        ]);
        return response()->json($inquiry);
    }

    public function showSpecificPropertyInquiries($propertyID)
    {
        $reviews = Inquiry::where('propertyID', $propertyID)->get();
        if ($reviews->isEmpty()) {
            return response()->json(["message" => 'No reviews found for this property']);
        }
        return response()->json(['reviews' => $reviews]);
    }

    public function showSpecificUserInquiries($userID)
    {
        $reviews = Inquiry::where('userID', $userID)->get();
        if ($reviews->isEmpty()) {
            return response()->json(["message" => 'No reviews found for this user']);
        }
        return response()->json(['reviews' => $reviews]);
    }
}
