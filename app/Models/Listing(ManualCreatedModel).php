<?php 
namespace App\Models;

class Listing {
    public static function all() {
        return
            [
                [
                    "id"=> 1,
                    "title" => "Listing One",
                    "description" => "Lorem ipsum dolor sit amet consectetur adipisicing elit. Natus dolore neque architecto, cupiditate corporis facere? Minima perferendis officia quam, suscipit hic odio est magni eos. Atque dolor dolore dolores rem.", 
                ],
                [
                    "id"=> 2,
                    "title" => "Listing Two",
                    "description" => "Description Two: Lorem ipsum dolor sit amet consectetur adipisicing elit. Natus dolore neque architecto, cupiditate corporis facere? Minima perferendis officia quam, suscipit hic odio est magni eos. Atque dolor dolore dolores rem.", 
                ]
            ];
    }

    public static function find($id) {
        $listings = self::all();

        foreach($listings as $listing) {
            if($listing["id"] == $id) {
                return $listing;
            }
        }
    }
}
?>