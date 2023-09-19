function initMap() {
  var location = { lat: 44.123, lng: 26.456 };
  var mapOptions = {
    zoom: 12,
    center: location
  };
  var map = new google.maps.Map(document.getElementById(".map-container"), mapOptions);
  var marker = new google.maps.Marker({
    position: location,
    map: map,
    title: "Diamond Residence Resort"
  });
}
