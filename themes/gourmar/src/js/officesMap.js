export default class OfficesMap {
  constructor() {
    this.init();
  }

  init() {
    // Initialize Leaflet map and set it to the target div
    var map = L.map("mapOffices").setView([8.9824, -79.5199], 8); // Initial center and zoom level for Panamá

    // Add a tile layer from Mapbox (you can use any tile layer provider)
    L.tileLayer("https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png", {
      attribution: "&copy; OpenStreetMap contributors",
    }).addTo(map);

    // Define custom icon for markers
    var customIcon = L.icon({
      iconUrl:
        `${gourmar.homeurl}/wp-content/themes/gourmar/images/marker.png`,
      iconSize: [40, 49], // size of the icon
      iconAnchor: [20, 49], // point of the icon which will correspond to marker's location
      popupAnchor: [0, -50], // point from which the popup should open relative to the iconAnchor
    });

    // Add markers for each office
    var officeMarkers = [
      {
        name: "Provider X",
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
      {
        name: "Provider Z",
        location: [9.7489, -83.7534],
        info: "Provider Z Info",
      },
      {
        name: "Provider A",
        location: [10.3157, -84.8227],
        info: "Provider A Info",
      },
    ];

    // Add markers for each office
    officeMarkers.forEach(function (office) {
      var marker = L.marker(office.location, { icon: customIcon }).addTo(map);
      marker.bindPopup(`
        <div class="markerPopup">
          <h3>${office.name}</h3>
          <p>${office.info}</p>
        </div>
      `);
    });
  }
}
