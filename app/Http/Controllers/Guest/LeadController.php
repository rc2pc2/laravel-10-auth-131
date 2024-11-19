<?php

namespace App\Http\Controllers\Guest;

use App\Http\Controllers\Controller;
use App\Http\Requests\LeadStoreRequest;
use App\Mail\NewContactForm;
use Illuminate\Support\Facades\Mail;
use App\Models\Lead;

class LeadController extends Controller
{
    //

    public function create(){
        // mostrare il form di contatto
        return view("guest.pages.contact-us");
    }

    public function store(LeadStoreRequest $request){
        $data = $request->validated();

        $lead = Lead::create($data); // creo la mia lead e la aggiungo nella tabella relativa

        Mail::to("mailacuivoglioinviarla@gmail.com")->send(new NewContactForm($lead));

        return redirect()->route("guest.posts.index");
    }
}
