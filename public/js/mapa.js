mapboxgl.accessToken='pk.eyJ1IjoiaW1mcmFuY2lzOTgiLCJhIjoiY2tkbjkzb2E0MWc5NDJxczJ2NjlmanIwdiJ9.HGVNdu1VrkYagDYT_5tRFw';
var map=new mapboxgl.Map({
    container: 'map',
    style: 'mapbox://styles/mapbox/streets-v11',
    zoom: 16,
    center: [-80.165149,-0.847334]
});

map.on('load',function() {
    map.loadImage(
        'https://docs.mapbox.com/mapbox-gl-js/assets/custom_marker.png',
        // Add an image to use as a custom marker
        function(error,image) {
            if(error) throw error;
            map.addImage('custom-marker',image);

            map.addSource('places',{
                'type': 'geojson',
                'data': {
                    'type': 'FeatureCollection',
                    'features': [
                        {
                            'type': 'Feature',
                            'properties': {
                                'description':
                                    '<strong>Base 1: </strong><p>Esta es nuestra base principal, aqui encontrará nuestras oficinas centrales</p>'
                            },
                            'geometry': {
                                'type': 'Point',
                                'coordinates': [-80.165149,-0.847334]
                            }
                        },
                        {
                            'type': 'Feature',
                            'properties': {
                                'description':
                                    '<strong>Base 2: </strong><p>Esta es nuestra segunda base de taxi, aqui dispondra de nuestro servicio taxis</p>'
                            },
                            'geometry': {
                                'type': 'Point',
                                'coordinates': [-80.165396, -0.846353]
                            }
                        },
                        {
                            'type': 'Feature',
                            'properties': {
                                'description':
                                    '<strong>Base 3: </strong><p>Esta es nuestra tercera base de taxis, aqui dispondra de nuestro servicio taxis</p>'
                            },
                            'geometry': {
                                'type': 'Point',
                                'coordinates': [-80.164190,-0.846002]
                            }
                        },
                        {
                            'type': 'Feature',
                            'properties': {
                                'description':
                                '<strong>Base 4: </strong><p>Esta es nuestra cuarta base de taxis, aqui dispondra de nuestro servicio taxis</p>'
                            },
                            'geometry': {
                                'type': 'Point',
                                'coordinates': [-80.163237,-0.847626]
                            }
                        }
                    ]
                }
            });

            // Add a layer showing the places.
            map.addLayer({
                'id': 'places',
                'type': 'symbol',
                'source': 'places',
                'layout': {
                    'icon-image': 'custom-marker',
                    'icon-allow-overlap': true
                }
            });
        }
    );

    // Create a popup, but don't add it to the map yet.
    var popup=new mapboxgl.Popup({
        closeButton: false,
        closeOnClick: false
    });

    map.on('mouseenter','places',function(e) {
        // Change the cursor style as a UI indicator.
        map.getCanvas().style.cursor='pointer';

        var coordinates=e.features[0].geometry.coordinates.slice();
        var description=e.features[0].properties.description;

        // Ensure that if the map is zoomed out such that multiple
        // copies of the feature are visible, the popup appears
        // over the copy being pointed to.
        while(Math.abs(e.lngLat.lng-coordinates[0])>180) {
            coordinates[0]+=e.lngLat.lng>coordinates[0]? 360:-360;
        }

        // Populate the popup and set its coordinates
        // based on the feature found.
        popup.setLngLat(coordinates).setHTML(description).addTo(map);
    });

    map.on('mouseleave','places',function() {
        map.getCanvas().style.cursor='';
        popup.remove();
    });
});
