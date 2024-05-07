export default class LeaftleftFindUs {
  constructor() {
    this.init();
    console.log('gourmar', gourmar)
  }

  init() {
    // Initialize Leaflet map
    var map = L.map("map").setView([8.9824, -79.5199], 5); // Initial center and zoom level for Panamá

    // Add a tile layer from Mapbox (you can use any tile layer provider)
    L.tileLayer("https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png", {
      attribution: "&copy; OpenStreetMap contributors",
    }).addTo(map);

    var countryCoordinates = {
      costarica: [9.7489, -83.7534], // Costa Rica
      nicaragua: [12.8654, -85.2072], // Nicaragua
      panama: [8.9824, -79.5199], // Panama
      // Add more countries and their coordinates as needed
    };

    // Define custom icon for markers
    var customIcon = L.icon({
      iconUrl:
        `${gourmar.homeurl}/wp-content/themes/gourmar/images/marker.png`,
      iconSize: [40, 49], // size of the icon
      iconAnchor: [20, 49], // point of the icon which will correspond to marker's location
      popupAnchor: [0, -50], // point from which the popup should open relative to the iconAnchor
    });

    // Add markers for each country
    /*for (var country in countryCoordinates) {
      var marker = L.marker(countryCoordinates[country], {
        icon: customIcon,
      }).addTo(map);
      marker.bindPopup(country); // Display country name on marker click
    }*/

    // Define providers for each country
    var countryProviders = {
      costarica: [
        {
          name: "Provider A",
          location: [9.7489, -83.7534],
          info: "Provider A Info",
        },
        {
          name: "Provider B",
          location: [10.3157, -84.8227],
          info: "Provider B Info",
        },
        // Add more providers for Costa Rica
      ],
      nicaragua: [
        {
          name: "Provider 1",
          location: [12.8654, -85.2072],
          info: "Provider 1 Info",
        },
        {
          name: "Provider 2",
          location: [11.8251, -85.9083],
          info: "Provider 2 Info",
        },
        // Add more providers for Nicaragua
      ],
      panama: [
        {
          name: '<p class="markerPopup__title">Provider X</p>',
          location: [8.9824, -79.5199],
          info: `
          <div class="markerPopup__info">
            <ul>
              <li>Address: 123 Main Street</li>
              <li>City: Panamá</li>
              <li>Phone: (123) 456-7890</li>
            </ul>
          </div>
        `,
        },
        {
          name: "Provider Y",
          location: [9.1018, -79.4029],
          info: "Provider Y Info",
        },
        // Add more providers for Panama
      ],
      // Add more countries and their providers as needed
    };

    //Load first markers//
    addMarkers('panama');

    // Event listener for the dropdown menu change
    document
      .getElementById("country-select")
      .addEventListener("change", function () {
        var selectedCountry = this.value;
        centerMapOnCountry(selectedCountry);
        clearMarkers();
        addMarkers(selectedCountry);
      });

    // Event listener for the provider search
    document
      .getElementById("provider-search")
      .addEventListener("input", function () {
        var searchQuery = this.value.trim().toLowerCase();
        searchProviders(searchQuery);
      });

    // Function to center the map based on selected country
    function centerMapOnCountry(countryCode) {
      map.setView(countryCoordinates[countryCode], 6); // Change the zoom level as needed
    }

    // Function to add markers for providers in the selected country
    function addMarkers(countryCode) {
      var providers = countryProviders[countryCode];
      if (providers) {
        providers.forEach(function (provider) {
          var marker = L.marker(provider.location, { icon: customIcon }).addTo(
            map
          );
          marker.bindPopup("<b>" + provider.name + "</b><br>" + provider.info);
          marker.on("click", function () {
            map.setView(provider.location, 10); // Change the zoom level as needed
          });
        });
      }
    }

    // Function to clear all markers from the map
    function clearMarkers() {
      map.eachLayer(function (layer) {
        if (layer instanceof L.Marker) {
          map.removeLayer(layer);
        }
      });
    }

    // Function to search for providers by name and center the map on the first matching provider
    function searchProviders(query) {
      clearMarkers();
      for (var country in countryProviders) {
        var providers = countryProviders[country];
        if (providers) {
          for (var i = 0; i < providers.length; i++) {
            var provider = providers[i];
            if (provider.name.toLowerCase().indexOf(query) !== -1) {
              var marker = L.marker(provider.location, {
                icon: customIcon,
              }).addTo(map);
              marker.bindPopup(`
                <div class="markerPopup">
                  <h3>${provider.name}</h3>
                  <p>${provider.info}</p>
                </div>
              `);
              map.setView(provider.location, 10); // Change the zoom level as needed
              return; // Stop searching after finding the first matching provider
            }
          }
        }
      }
    }
  }
}
