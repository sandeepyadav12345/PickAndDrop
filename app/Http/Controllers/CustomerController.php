<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Model;
use App\Customer;


class CustomerController extends Controller
{

    // function_construct()
    // {

    // }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
public function index(){

    $locations = Customer::All();

    return view('home',compact('locations'));
}

//for sorted data

    public function sortedLocation($x,$y)
    {

    $locations = Customer::All();

    $base_location = array(
  'latitude' => $x,
  'longitude' => $y
);

$distances = array();

foreach($locations as $key => $location)
{
  $a = $base_location['latitude'] - $location['latitude'];
  $b = $base_location['longitude'] - $location['longitude'];
  $distance = sqrt(($a**2) + ($b**2));
  $distances[$key] = $distance;
}

asort($distances);


$distance_key = array_keys($distances);
$sort_location =array();
//$closest = $locations[key($distances)];
foreach ($distance_key as $key => $distances) {

    array_push($sort_location,$locations[$distances]);
    
}

//print_r($closest);

//echo "Closest foreach suburb is: " . $closest['city_name'];
   
   // return view('home',compact('sort_location'));

return response()->json(["sorted_location"=>$sort_location]);
    
}

//for creating data

public function insertLocation(Request $request){

    $customer = new Customer();

    $customer->full_name = $request->input('full_name');
    $customer->mobile_no = $request->input('mobile_no');
    $customer->country_name = $request->input('country_name');
    $customer->city_name = $request->input('city_name');
    $customer->latitude = $request->input('latitude');
    $customer->longitude = $request->input('longitude');

    $customer->save();

   return response()->json($customer);
}

// for fetching all data api

public function getAllData(){

$locations = Customer::All();

return response()->json($locations);

}

//for update

 public function updateLocation(Request $request,$id)
    {
    
        $customer =Customer::find($id);
        $customer->update($request->all());
    
        return response()->json($customer);

    }

    public function destroy($id)
    {
        //
         Customer::destroy($id);

         return response()->json("deleted successfully");
    }

}



 