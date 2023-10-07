<x-dashboard-layout>
  <x-slot name="header">
    <h2 class="font-semibold text-xl text-red-100 leading-tight">
              {{ __('iNotify: Emergency Dashboard') }}
    </h2>
  </x-slot>
  <div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
      <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
        <div class="p-6 text-gray-900" style="font-weight: bold; font-size:22px">
          <h1>iNotfy: Emergency Dashboard</h1>

          <!-- Geolocation -->
          <div id="google-map" style="width: 100%; height: 600px; margin-top: 20px; border: solid 2px"></div>

          <script>
            document.addEventListener('DOMContentLoaded', function () {
              initMap();
            });

            function initMap() {
              var mapOptions = {
                center: { lat: 13.9391454, lng: 121.5879752 },
                zoom: 10,
              };
              var map = new google.maps.Map(document.getElementById('google-map'), mapOptions);

              // Add the department markers
              var departments = [
                { lat: 13.9288137, lng: 121.6138299, title: 'PDRRMO Quezon' },
                { lat: 13.9583909, lng: 121.6179121, title: 'BFP Quezon Provincional Office' },
                { lat: 13.9576048, lng: 121.6102651, title: 'OPFM, Quezon BFP' },
                { lat: 13.936238, lng: 121.6115862, title: 'Lucena City Police Station' },
                { lat: 14.0243143, lng: 121.5930297, title: 'Bureau of Fire Protection' },
                { lat: 13.8379493, lng: 121.9781512, title: 'New Municipal Police Station' },
                { lat: 13.958703, lng: 122.2937045, title: 'Bureau of Fire Protection BFP' },
                { lat: 14.1961131, lng: 121.9263413, title: 'BFP Fire Office' },
                { lat: 14.1781485, lng: 121.7187819, title: 'PNP Highway Patrol Group Mauban Quezon' },
                { lat: 14.1908101, lng: 121.7334507, title: '404B Maritime Police Precint - Mauban Quezon' },
              ];

              for (var i = 0; i < departments.length; i++) {
                var marker = new google.maps.Marker({
                  position: new google.maps.LatLng(departments[i].lat, departments[i].lng),
                  title: departments[i].title,
                });
                marker.setMap(map);
              }
            }
          </script>
        </div>
      </div>
    </div>
  </div>

</x-dashboard-layout>

<!-- Added endif statement -->
