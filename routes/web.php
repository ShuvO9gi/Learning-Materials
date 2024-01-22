<?php

use App\Http\Controllers\ListingController;
use App\Models\Listing;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
//Route With Controller
//All Listing
Route::get("/", [ListingController::class, "index"]);

//Show Create Form
Route::get("/listings/create", [ListingController::class, "create"]);

//Store Listing
Route::post("/listings", [ListingController::class, "store"]);

//Show Edit Form
Route::get("/listings/{listing}/edit", [ListingController::class, "edit"]);

//Update Listing
Route::put("/listings/{listing}", [ListingController::class, "update"]);

//Single Listing
Route::get("/listings/{listing}", [ListingController::class, "show"]);

//Common Resource Routes:
//index - Show all listings
//show - Show single listing
//create - Create form for new listing
//store - Store new lisitng
//edit - Show form to edit listing
//update - Update listing
//destory - Delete listing


//All Listing
/* Route::get('/', function() {
    return view("listings", [
        "listings" => Listing::all(),
    ]);
}); */

//Single Listing
/* Route::get("/listings/{id}", function($id) {
    return view("listing", [
        "listing" => Listing::find($id),
    ]);
}); */

//Catch Not Found Page Using Abort
/* Route::get("/listings/{id}", function($id) {
    $listing = Listing::find($id);

    if($listing) {
        return view("listing", [
            "listing" => $listing,
        ]);
    } else {
        abort('404');
    }
}); */

//Catch Not Found Page Using Eloquent Model 
/* Route::get("/listings/{listing}", function(Listing $listing) {
    return view("listing", [
        "listing" => $listing,
    ]);
}); */


//Practice Purpose
//Default Value
Route::get('/default', function () {
    return view('welcome');
});
//All Listing
Route::get("/listings", function() {
    return view("listings", [
        "heading" => "Latest Listings",
        "listings" => Listing::all(),
    ]);
});
//Single Listing
Route::get("/single-listing/{id}", function ($id) {
    return view("listing", ["listing" => Listing::find($id)]);
} );

//PHP
Route::get("/listingsphp", function() {
    return view("listingsphp", [
        "heading" => "Latest Listings",
        "listings" => [
            [
                "id"=> 1,
                "title" => "Listing One",
                "description" => "Description One: Lorem ipsum dolor sit amet consectetur adipisicing elit. Natus dolore neque architecto, cupiditate corporis facere? Minima perferendis officia quam, suscipit hic odio est magni eos. Atque dolor dolore dolores rem.<br>
                [eloquent => object relational mapper(ORM) makes easier to interact with database]", 
            ],
            [
                "id"=> 2,
                "title" => "Listing Two",
                "description" => "Description Two: Lorem ipsum dolor sit amet consectetur adipisicing elit. Natus dolore neque architecto, cupiditate corporis facere? Minima perferendis officia quam, suscipit hic odio est magni eos. Atque dolor dolore dolores rem.", 
            ]
        ]
    ]);
});

//Fundamentals
Route::get("/test", function() {
    return "Hello, This is for testing purpose.";
});

Route::get("/test/response", function() {
    return response("<h1>Hello, This is used for response testing.</h1>", 404);
});

Route::get("/test/response-custom", function() {
    return response("<h1>Hello, This is used for response testing.</h1>", 200) -> header("Content-Type", "text/plain") -> header("foo", "bar");
});

//Dynamic Value Using Wild Card{}
Route::get("/posts/{id}", function($id) {
    //Used For Debugging
    // dd($id);   //dd(Dump & Die) //helper function //prevent further script execution
    // ddd($id); //ddd(Dump, Die & Debug)
    return response("Post ". $id);
}) -> where("id", "[0-9]+"); //id value(= text is not allowed)

//Search
Route::get("/search", function(Request $request) {
    //dd($request); //show all data of the request variable
    // dd($request->name . ' ' . $request->city);
    return $request->name . ' ' . $request->city;
});