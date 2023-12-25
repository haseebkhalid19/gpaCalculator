<!-- resources/views/map.blade.php -->

<form method="get" action="{{ url('/map') }}">
    <input type="text" name="location" placeholder="Enter a location">
    <button type="submit">Show on Map</button>
</form>

@isset($location)
    <p>Location: {{ $location }}</p>
    <p>City: {{ $city }}</p>
    <p>Province: {{ $province }}</p>
    <p>Postal Code: {{ $postalCode }}</p>
@endisset

<!-- Add the Google Maps API script to the view -->
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAJ7puhVNBesNx1J5h5wZ-C6qJlU0KpqHQ&callback=initMap" async defer></script>

<!-- Implement the map display using JavaScript -->
<script>
    function initMap() {
        // Assuming you have a map container with the id "map"
        var map = new google.maps.Map(document.getElementById('map'), {
            center: { lat: YOUR_DEFAULT_LATITUDE, lng: YOUR_DEFAULT_LONGITUDE },
            zoom: 8
        });

        // Assuming you have the location details from the backend
        var locationLatLng = { lat: YOUR_LOCATION_LATITUDE, lng: YOUR_LOCATION_LONGITUDE };

        // Marker for the location
        var marker = new google.maps.Marker({
            position: locationLatLng,
            map: map,
            title: 'Your Location'
        });

        // Center the map on the marker
        map.setCenter(locationLatLng);
    }
</script>
