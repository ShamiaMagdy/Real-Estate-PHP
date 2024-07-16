<?php

namespace App\Http\Controllers;

use App\Http\Requests\PropertyRequest;
use App\Models\Property;

class PropertyController extends Controller
{
    // public function displayProperties()
    // {
    //     $properties = Property::with('images')->get();

    //     return view('home',['properties' => $properties]);
    // }
    public function displayProperties()
    {
        $properties = Property::get();
        if ($properties->isEmpty()) {
            return response()->json(["message" => 'No properties found']);
        }
        return response()->json(['Properties' => $properties->load('images')]);
    }
    public function displaySpecificTypeOfProperties($type)
    {
        $properties = Property::where('type', $type)->get();
        if ($properties->isEmpty()) {
            return response()->json(["message" => 'No properties found for this type']);
        }
        return response()->json(['Properties' => $properties->load('images')]);
    }

    public function AddProperty(PropertyRequest $request)
    {
        $property = Property::create([
            'type' => $request->type,
            'location' => $request->location,
            'description' => $request->description,
            'price' => $request->price,
            'area' => $request->area,
            'bedrooms' => $request->bedrooms,
            'bathrooms' => $request->bathrooms,
            'garden' => $request->garden,
            'garage' => $request->garage,
            'pool' => $request->pool,
            'rentvssell' => $request->rentvssell,
            'userID' => $request->userID,
            'image' => 'sd',
        ]);

        if ($request->hasFile('images')) {
            $imagePaths = [];
            foreach ($request->file('images') as $file) {
                $originalName = $file->getClientOriginalName();
                $newName = time() . '-' . $originalName;
                $file->move(public_path('images/new'), $newName);
                $imagePaths[] = 'images/new/' . $newName;
            }

            foreach ($imagePaths as $imagePath) {
                $property->images()->create(['imagepath' => $imagePath]);
            }
        }
        $property->save();
        return response()->json($property->load('images'));
    }
    public function EditProperty(PropertyRequest $request, $id)
    {
        $property = Property::find($id);
        $property->update([
            'type' => $request->type,
            'location' => $request->location,
            'description' => $request->description,
            'price' => $request->price,
            'area' => $request->area,
            'bedrooms' => $request->bedrooms,
            'bathrooms' => $request->bathrooms,
            'garden' => $request->garden,
            'garage' => $request->garage,
            'pool' => $request->pool,
            'rentvssell' => $request->rentvssell,
            'userID' => $request->userID,
            'image' => 'sd',
        ]);
        if ($request->hasFile('images')) {
            $imagePaths = [];
            foreach ($request->file('images') as $file) {
                $originalName = $file->getClientOriginalName();
                $newName = time() . '-' . $originalName;
                $file->move(public_path('images/new'), $newName);
                $imagePaths[] = 'images/new/' . $newName;
            }

            foreach ($imagePaths as $imagePath) {
                $property->images()->create(['imagepath' => $imagePath]);
            }
        }
        return response()->json($property->load('images'));
    }
    public function DeleteProperty($id)
    {
        Property::find($id)->delete();
    }
}
