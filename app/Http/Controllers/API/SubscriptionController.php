<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Website;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class SubscriptionController extends Controller
{
    public function subscribe(Request $request, User $user)
    {
        $validator = Validator::make($request->all(), [
            'website_id' => 'required|numeric|exists:websites,id|unique:website_subscriptions',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        $website = Website::find($validator->validated()['website_id']);

        $website->subscribe($user);

        return response()->json("Subscribed successfully", 200);
    }
}
