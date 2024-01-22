<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Listing extends Model
{
    use HasFactory;

    //Inside AppServiceProvider <Model::unguard();> will elminate this requirement
    protected $fillable = ["title", "company", "website", "email", "location", "tags", 'description'];

    public function /* scopeTry */scopeFilter($query, array $filters) {
        //dd($filters["tag"]);
        if($filters["tag"] ?? false) {
            $query->where("tags", "like", "%" . request("tag"). "%");
        }

        if($filters["search"] ?? false) {
            $query->where("title", "like", "%" . request("search"). "%")
                ->orWhere("description", "like", "%". request("search") . "%" )
                ->orWhere("tags", "like", "%" . request("search") . "%");
        }
    }
}