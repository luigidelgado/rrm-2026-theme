async function initMap(childTermInfo) {
    //console.log(childTermInfo);
    const { Map } = await google.maps.importLibrary("maps");

    const center = { lat: 27.3674724, lng: -101.6700636 };

    let map = new Map(document.getElementById("map"), {
        center: center,
        zoom: 4,
        streetViewControl: false 
    });

    let styles = [
        {
          "elementType": "geometry",
          "stylers": [
            {
              "color": "#023E58"
            }
          ]
        },
        {
          "elementType": "labels.text.fill",
          "stylers": [
            {
              "color": "#000"
            }
          ]
        },
        {
          "elementType": "labels.text.stroke",
          "stylers": [
            {
              "color": "#ffffff"
            }
          ]
        },
        {
          "featureType": "administrative.country",
          "elementType": "geometry.stroke",
          "stylers": [
            {
              "color": "#4b6878"
            }
          ]
        },
        {
          "featureType": "administrative.land_parcel",
          "stylers": [
            {
              "visibility": "off"
            }
          ]
        },
        {
          "featureType": "administrative.land_parcel",
          "elementType": "labels.text.fill",
          "stylers": [
            {
              "color": "#64779e"
            }
          ]
        },
        {
          "featureType": "administrative.neighborhood",
          "stylers": [
            {
              "visibility": "off"
            }
          ]
        },
        {
          "featureType": "administrative.province",
          "elementType": "geometry.stroke",
          "stylers": [
            {
              "color": "#4b6878"
            }
          ]
        },
        {
          "featureType": "landscape.man_made",
          "elementType": "geometry.stroke",
          "stylers": [
            {
              "color": "#334e87"
            }
          ]
        },
        {
          "featureType": "landscape.natural",
          "elementType": "geometry",
          "stylers": [
            {
              "color": "#7592A5"
            }
          ]
        },
        {
          "featureType": "poi",
          "elementType": "geometry",
          "stylers": [
            {
              "color": "#283d6a"
            }
          ]
        },
        {
          "featureType": "poi",
          "elementType": "labels.text",
          "stylers": [
            {
              "visibility": "off"
            }
          ]
        },
        {
          "featureType": "poi",
          "elementType": "labels.text.fill",
          "stylers": [
            {
              "color": "#6f9ba5"
            }
          ]
        },
        {
          "featureType": "poi",
          "elementType": "labels.text.stroke",
          "stylers": [
            {
              "color": "#1d2c4d"
            }
          ]
        },
        {
          "featureType": "poi.business",
          "stylers": [
            {
              "visibility": "off"
            }
          ]
        },
        {
          "featureType": "poi.park",
          "elementType": "geometry.fill",
          "stylers": [
            {
              "color": "#023e58"
            }
          ]
        },
        {
          "featureType": "poi.park",
          "elementType": "labels.text",
          "stylers": [
            {
              "visibility": "off"
            }
          ]
        },
        {
          "featureType": "poi.park",
          "elementType": "labels.text.fill",
          "stylers": [
            {
              "color": "#3C7680"
            }
          ]
        },
        {
          "featureType": "road",
          "stylers": [
            {
              "visibility": "off"
            }
          ]
        },
        {
          "featureType": "road",
          "elementType": "geometry",
          "stylers": [
            {
              "color": "#304a7d"
            }
          ]
        },
        {
          "featureType": "road",
          "elementType": "labels",
          "stylers": [
            {
              "visibility": "off"
            }
          ]
        },
        {
          "featureType": "road",
          "elementType": "labels.text.fill",
          "stylers": [
            {
              "color": "#7592A5"
            }
          ]
        },
        {
          "featureType": "road",
          "elementType": "labels.text.stroke",
          "stylers": [
            {
              "color": "#1d2c4d"
            }
          ]
        },
        {
          "featureType": "road.highway",
          "elementType": "geometry",
          "stylers": [
            {
              "color": "#2c6675"
            }
          ]
        },
        {
          "featureType": "road.highway",
          "elementType": "geometry.stroke",
          "stylers": [
            {
              "color": "#255763"
            }
          ]
        },
        {
          "featureType": "road.highway",
          "elementType": "labels.text.fill",
          "stylers": [
            {
              "color": "#b0d5ce"
            }
          ]
        },
        {
          "featureType": "road.highway",
          "elementType": "labels.text.stroke",
          "stylers": [
            {
              "color": "#023e58"
            }
          ]
        },
        {
          "featureType": "transit",
          "elementType": "labels.text.fill",
          "stylers": [
            {
              "color": "#98a5be"
            }
          ]
        },
        {
          "featureType": "transit",
          "elementType": "labels.text.stroke",
          "stylers": [
            {
              "color": "#1d2c4d"
            }
          ]
        },
        {
          "featureType": "transit.line",
          "elementType": "geometry.fill",
          "stylers": [
            {
              "color": "#283d6a"
            }
          ]
        },
        {
          "featureType": "transit.station",
          "elementType": "geometry",
          "stylers": [
            {
              "color": "#3a4762"
            }
          ]
        },
        {
          "featureType": "water",
          "elementType": "geometry",
          "stylers": [
            {
              "color": "#21435B"
            }
          ]
        },
        {
          "featureType": "water",
          "elementType": "labels.text",
          "stylers": [
            {
              "visibility": "off"
            }
          ]
        },
        {
          "featureType": "water",
          "elementType": "labels.text.fill",
          "stylers": [
            {
              "color": "#4e6d70"
            }
          ]
        }
    ];

    map.setOptions({ styles });

    // Generar url para mapa estatico y poder compartir
    let mapStatic = `https://maps.googleapis.com/maps/api/staticmap?center=23,-102&zoom=5&size=700x500`;
    // console.log(typeof childTermInfo);
    // console.log(childTermInfo);
    if(typeof childTermInfo == "object"){
      childTermInfo = Object.entries(childTermInfo);
    }
    //console.log(childTermInfo);
    for (let i = 0; i < childTermInfo.length; i++) {
        const destinyPlace = childTermInfo[i][1];
        //console.log(destinyPlace);
        // Validar si tiene los datos necesarios para marcar el destino del mapa
        if(+destinyPlace['latitude'] == 0 || +destinyPlace['longitude'] == 0) continue;
        const icon = {
            url: destinyPlace['challengue_url'] || 'https://icons.iconarchive.com/icons/paomedia/small-n-flat/256/map-marker-icon.png', // url
            scaledSize: new google.maps.Size(32, 32), // scaled size
            origin: new google.maps.Point(0,0), // origin
            anchor: new google.maps.Point(0, 0) // anchor
        };
        //console.log("icon: ",icon);
        let lat = +destinyPlace['latitude'];
        let lng = +destinyPlace['longitude'];
        let name = destinyPlace['term_name'];
        new google.maps.Marker({
          position: { lat, lng},
          map,
          icon,
          title: name
        });
       
        //mapStatic += `&markers=anchor:32,32%7Cicon:${encodeURIComponent(icon.url)}%7C${lat},${lng}`;
        mapStatic += `&markers=anchor:32,32%7C${lat},${lng}`;
    }

    mapStatic += `&style=feature:road%7Cvisibility:off`;
    mapStatic += `&style=feature:water%7Ccolor:0x21435B`;
    mapStatic += `&style=feature:landscape.natural%7Ccolor:0x7592A5`;
    //mapStatic += `&key=AIzaSyBjQfylrEN0CBOQyR3xmoTeG84Glk6bMis`;
    //mapStatic += `&key=AIzaSyAdHv-Zgpn_k0JMorToRLz08Sj_RNZ9VTg`;
    mapStatic += `&key=AIzaSyDZHZwywpEp7gJ1xM3f8iCl-Tuurh-8Q5E`;
    console.log(mapStatic);
    
    return mapStatic;

}

export{
    initMap,
}