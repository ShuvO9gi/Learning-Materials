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
        //Check the output
        //dd(Listing::latest()->filter(request(['tag', 'search']))->paginate(2));
        
        return view("listings.index", [
            // "listings" => Listing::all(), // Listing::latest()->get()
            // "listings" => Listing::latest()->try(request(["tag", "search"]))->get(),
            
            //"listings" => Listing::latest()->filter(request(["tag", "search"]))->get(), //Same result //"listings" => Listing::latest()->filter(request(["tag", "search"]))->paginate(),

            //For pagination
            //"listings" => Listing::latest()->filter(request(["tag", "search"]))->simplePaginate(2), //pagination with Next & Previous
            "listings" => Listing::latest()->filter(request(["tag", "search"]))->paginate(6), //pagination with show results
        ]);
    }

    //Show create form
    public function create() {
        return view("listings.create");
    }

    //Store Form
    public function store(Request $request) {
        //dd($request->all());
        //dd($request->file("logo")->store());
        
        $formFields = $request->validate([
            "title" => "required",
            "company" => ["required", Rule::unique("listings", "company")],
            "location" => "",
            "website" => "required",
            "email" => ["required", "email"],
            "tags" => "required",
            "description" => "required"
        ]);

        //For File Upload
        if($request->hasFile("logo")) {
            $formFields["logo"] = $request->file("logo")->store("logos", "public");
        }

        //Add Ownership To A Listing
        $formFields["user_id"] = auth()->id();

        //Save the data to the database
        //Listing::create($request->all()); //Not Recommended
        Listing::create($formFields);

        //Flash Message
        // Session::flash("message", "Listing Created Successfully.");
        //session()->flash("message", "Listing Created Successfully.");

        return redirect("/")->with("message"/* "success"/"error" */, "Listing Created Successfully");
    }

    //Show Single Listing
    public function show(Listing $listing) {
        return view("listings.show", [
            "listing" => $listing,
        ]);
    }
    
    //Show Edit Form
    public function edit(Listing $listing) {
        //dd($listing);
        return view("listings.edit", [
            "listing" => $listing
        ]);
    }

    //Update Listing Data
    public function update(Request $request, Listing $listing) {
        //Make Sure Logged In User Is Owner
        //dd($listing);
        //dd(auth()->id());
        if($listing->user_id != auth()->id()) {
            abort(403, "Unautorized Action!");
        }
        
        $formFields = $request->validate([
            "title" => "required",
            "company" => ["required"],
            "location" => "",
            "website" => "required",
            "email" => ["required", "email"],
            "tags" => "required",
            "description" => "required"
        ]);

        //For File Upload
        if($request->hasFile("logo")) {
            $formFields["logo"] = $request->file("logo")->store("logos", "public");
        }

        //Update Database Data
        $listing->update($formFields);

        return back()->with("message", "Listing Updated Successfully!");
    }

    //Delete Listing Data
    public function destroy(Listing $listing) {
        //dd($listing);
        if($listing->user_id != auth()->id()) {
            abort(403, "Unautorized Action!");
        }

        $listing->delete();

        return redirect("/")->with("message", "Listing deleted successfully!");
    }

    //Manage Listing
    public function manage() {
        return view("listings.manage", ["listings" => auth()->user()->listings()->get()]);
    }

}