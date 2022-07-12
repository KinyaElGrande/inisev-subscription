<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Website;
use App\Notifications\NewPost;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Notification;
use Illuminate\Support\Facades\Validator;

class WebsiteController extends Controller
{
    public function createWebsite(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'url' => 'required|string|url|max:255|unique:websites',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        Website::create($validator->validated());

        return response()->json("Website created successfully", 200);
    }

    public function createPost(Request $request, Website $website)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required|string|max:255|unique:posts',
            'description' => 'required|string',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

         $website->posts()->create([
            'title' => $validator->validated()['title'],
            'description' => $validator->validated()['description'],
        ]);

        return response()->json("Post created successfully", 200);
    }
}
