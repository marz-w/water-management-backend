<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Location;

class LocationController extends Controller
{
    public function createLocation(Request $request)
    {
         $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string|max:1000',
        ]);

        $location = new Location();
        $location->name = $request->name;
        $location->description = $request->description;

        try{
            $location->save();
            return response([
                'message' => 'Location created successfully', 
                'saved location' => $location]);
                } catch (\Exception $e) {
                return response([
                    'message' => 'Failed to save',
                    'error' => $e->getMessage()
                ]);
            }

    }
    public function readAllLocations(){
        try{
            $locations = Location::all();
            return response()->json($locations);
        } catch (\Exception $exception) {
            return response([
                'message' => 'Failed to fetch',
                'error' => $exception->getMessage()
            ]);
        }
    }
    public function readLocation($id){
        try{
            $location = Location::where('id', $id)->first();
            return response()->json($location);
        } catch (\Exception $exception) {
            return response([
                'message' => 'Failed to fetch',
                'error' => $exception->getMessage()
            ]);
        }
    }
}