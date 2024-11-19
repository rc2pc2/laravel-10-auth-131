<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\LeadStoreRequest;
use App\Mail\NewContactForm;
use App\Models\Lead;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;

class LeadController extends Controller
{
    public function store(Request $request){
        $validator = Validator::make($request->all(), [
            "name" => "required|string|min:2|max:80",
            "email" => "required|string|email|max:60",
            "message" => "required|string|min:10|max:2000"
        ]);

        if ($validator->fails()) {
            return response()->json([
                "success" => false,
                "errors" => $validator->errors(),
            ]);
        }

        $lead = Lead::create($validator->validated()); // creo la mia lead e la aggiungo nella tabella relativa

        Mail::to("mailacuivoglioinviarla@gmail.com")->send(new NewContactForm($lead));

        return response()->json([
            "success" => true
        ]);
    }
}
