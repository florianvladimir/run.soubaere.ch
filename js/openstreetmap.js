var map;
var lat=46.749061;
var lon=7.644008;
var zoom=12;
var mapFile="";


function init(lat,lon,mapFile) {
    console.log(lat);
    console.log(mapFile);
    map = new OpenLayers.Map ("map", {
        maxExtent: new OpenLayers.Bounds(-20037508.34,-20037508.34,20037508.34,20037508.34),
        maxResolution: 156543.0399,
        numZoomLevels: 19,
        units: 'm',
        projection: new OpenLayers.Projection("EPSG:900913"),
        displayProjection: new OpenLayers.Projection("EPSG:4326")
    } );

    // Define the map layer
    // Here we use a predefined layer that will be kept up to date with URL changes
    layerMapnik = new OpenLayers.Layer.OSM.Mapnik("Mapnik");
    map.addLayer(layerMapnik);
    layerCycleMap = new OpenLayers.Layer.OSM.CycleMap("CycleMap");
    map.addLayer(layerCycleMap);
    layerMarkers = new OpenLayers.Layer.Markers("Marker");
    map.addLayer(layerMarkers);

    // *********************************************************************
    // Block "Layer mit GPX-Track" - Start
    var GPXVariable_1 = new OpenLayers.Layer.Vector("strecke", {
        strategies: [new OpenLayers.Strategy.Fixed()],
        protocol: new OpenLayers.Protocol.HTTP({
            url: mapFile,
            format: new OpenLayers.Format.GPX()
        }),
        style: {strokeColor: "#f44242", strokeWidth: 5, strokeOpacity: 0.7},
        projection: new OpenLayers.Projection("EPSG:4326")
    });
    map.addLayer(GPXVariable_1);
    // Block "Layer mit GPX-Track" - Ende
    // *********************************************************************

    var lonLat = new OpenLayers.LonLat(lon, lat).transform(new OpenLayers.Projection("EPSG:4326"), map.getProjectionObject());
    map.setCenter(lonLat, zoom);



}
