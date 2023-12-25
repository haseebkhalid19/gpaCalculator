<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Geocoder\Query\GeocodeQuery;
use Geocoder\Query\GeocodeAddressQuery;
use Geocoder\Provider\GoogleMaps\GoogleMaps as GoogleMapsProvider;
use Geocoder\StatefulGeocoder;
use Geocoder\Model\Address;
use GoogleMaps\GoogleMaps;

class MapController extends Controller
{
    public function showMap(Request $request)
    {
        $location = $request->input('location');

        // Initialize the Geocoder with the Google Maps provider
        $provider = new GoogleMapsProvider(new \Http\Adapter\Guzzle7\Client());
        $geocoder = new StatefulGeocoder($provider);

        try {
            // Geocode the location entered by the user
            $result = $geocoder->geocodeQuery(GeocodeQuery::create($location));

            if ($result instanceof Address) {
                // Extract the necessary details like city, province, and postal code
                $city = $result->getLocality();
                $province = $result->getAdminLevels()->first()->getName();
                $postalCode = $result->getPostalCode();

                // Pass the location details to the view
                return view('map', compact('location', 'city', 'province', 'postalCode'));
            } else {
                // Handle error case, e.g., invalid location entered
                return view('map', compact('location'))->with(['error' => 'Invalid location']);
            }
        } catch (\Exception $e) {
            // Handle any exceptions that occur during geocoding
            return view('map', compact('location'))->with(['error' => 'Geocoding error']);
        }
    }
}
