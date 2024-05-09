export default class LeaftleftFindUs {
  constructor() {
    this.init();
  }

  init() {
    // Initialize Leaflet map
    var map = L.map("map").setView([8.986791944526546, -79.52523636079269], 8); // Initial center and zoom level for RD

    // Add a tile layer from Mapbox (you can use any tile layer provider)
    L.tileLayer("https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png", {
      attribution: "&copy; OpenStreetMap contributors",
    }).addTo(map);

    // Define custom icon for markers
    var customIcon = L.icon({
      iconUrl: `${gourmar.homeurl}/wp-content/themes/gourmar/images/marker.png`,
      iconSize: [40, 49], // size of the icon
      iconAnchor: [20, 49], // point of the icon which will correspond to marker's location
      popupAnchor: [0, -50], // point from which the popup should open relative to the iconAnchor
    });

    // Define providers
    let providersList = [];
    (async () => {
      try {
        const response = await fetch(
          `${gourmar.apiurl}/providers`
        );
        if (!response.ok) {
          throw new Error("Network response was not ok");
        } else {
          providersList = await response.json();
          await addMarkers(providersList);
        }
      } catch (error) {
        console.error("There was a problem with the fetch operation:", error);
      }
    })();

    // Event listener for the dropdown menu change
    document
      .getElementById("country-select")
      .addEventListener("change", function () {
        const selectedCountry = this.value;
        const selectedOption = this.options[this.selectedIndex];
        const selectedCoordinates = selectedOption
          .getAttribute("coordinates")
          .split(",");
        map.setView(selectedCoordinates, 6); // Change the zoom level as needed
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
    function addMarkers(providers) {
      if (providers) {
        providers.forEach(function (provider) {
          var marker = L.marker(provider.cooridinates.split(","), {
            icon: customIcon,
          }).addTo(map);
          marker.bindPopup("<b>" + provider.name + "</b><br>" + provider.info);
          marker.on("click", function () {
            map.setView(provider.cooridinates.split(","), 10); // Change the zoom level as needed
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
      providersList.forEach(function (provider) {
        if (provider.name.toLowerCase().indexOf(query) !== -1) {
          var marker = L.marker(provider.cooridinates.split(","), {
            icon: customIcon,
          }).addTo(map);
          marker.bindPopup(`
                <div class="markerPopup">
                  <h3>${provider.name}</h3>
                  <p>${provider.info}</p>
                </div>
              `);
          map.setView(provider.cooridinates.split(","), 10); // Change the zoom level as needed
          return; // Stop searching after finding the first matching provider
        }
      });
    }
  }
}
