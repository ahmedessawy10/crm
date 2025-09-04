<?php
namespace App\Http\Controllers;

use App\Models\SponsorRequest;
use Illuminate\Http\Request;

class SponsorRequestController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'company_name'   => 'required|string|max:255',
            'contact_person' => 'required|string|max:255',
            'email'          => 'required|email|max:255',
            'phone'          => 'required | string | max: 20',
            'note'           => 'nullable|string',
        ]);

        SponsorRequest::create($request->all());

        return response()->json(['message' => __("messages.request sponsor success")]);
    }
}
