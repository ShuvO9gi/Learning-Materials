<?php

namespace App\Http\Controllers;

use App\Models\Listing;
use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

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

    //Show create form
    public function create() {
        return view("listings.create");
    }

    //Store Form
    public function store(Request $request) {
        //dd($request->all());
        $formFields = $request->validate([
            "title" => "required",
            "company" => ["required", Rule::unique("listings", "company")],
            "location" => "",
            "website" => "required",
            "email" => ["required", "email"],
            "tags" => "required",
            "description" => "required"
        ]);

        //Save the data to the database
        //Listing::create($request->all()); //Not Recommended
        Listing::create($formFields);

        //Flash Message
        // Session::flash("message", "Listing Created Successfully.");
        //session()->flash("message", "Listing Created Successfully.");

        return redirect("/")->with("message"/* "success"/"error" */, "Listing Created Successfully");
    }

    //Show single listing
    public function show(Listing $listing) {
        return view("listings.show", [
            "listing" => $listing,
        ]);
    }
}