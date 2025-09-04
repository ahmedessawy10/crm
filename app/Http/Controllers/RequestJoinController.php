<?php
namespace App\Http\Controllers;

use App\Models\RequestJoin;
use Illuminate\Http\Request;

class RequestJoinController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'brand_name'  => 'required|string|max:255',
            'phone'       => 'required|string|max:20',
            'email'       => 'required|email|max:255',
            'website_url' => 'nullable|url',
            'note'        => 'nullable|string',
        ]);

        RequestJoin::create($request->all());

        return response()->json(['message' => __("messages.request join success")]);
    }
}
