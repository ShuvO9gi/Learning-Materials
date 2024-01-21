<?php

namespace App\Http\Controllers;

use App\Models\Listing;
use Illuminate\Http\Request;

class ListingController extends Controller
{
    //Show all listing
    public function index(/* Request $request */) {
        //dd(request("tag")); //dd(request()->tag); //dd(request()); //dd($request);
        
        return view("listings.index", [
            // "listings" => Listing::all(), // Listing::latest()->get()
            // "listings" => Listing::latest()->try(request(["tag", "search"]))->get(),
            "listings" => Listing::latest()->filter(request(["tag", "search"]))->get(),
        ]);
    }

    //Show single listing
    public function show(Listing $listing) {
        return view("listings.show", [
            "listing" => $listing,
        ]);
    }
}