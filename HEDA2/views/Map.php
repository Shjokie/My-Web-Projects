<?php
include ("session.php");
?>
<?php
require_once '../model/DBConnect.php';
$model = new DBConnect();
$db = $model->getConnection();
$points = array();
$result = mysqli_query($db, "SELECT first_name, second_name,mobile_number, gps FROM client_table WHERE deleted=0");
while ($row = mysqli_fetch_array($result)) {
    $gps = explode(',', $row['gps'], 2);
    $points[] = array('name' => $row['first_name'] . ' ' . $row['second_name'], 'mob' => $row['mobile_number'], 'lat' => $gps[0], 'lng' => $gps[1]);
}
?>
<html>
    <head>
        <meta charset="UTF-8">
        <link href="../css/style.css" rel="stylesheet" type="text/css"/>
        <title>Clients Map</title>
        <style type="text/css">
            p2{
                color: #ff0307;
                font-family: Cambria;
                font-size: 14px; 
                font-weight: bold;
                //text-align: center;
            }
        </style>
        <style type="text/css">
            #map {
                width:  100%;
                height: 700px;
            }
        </style>
        <script src="http://maps.googleapis.com/maps/api/js"></script>
        <script type="text/javascript">
            var blueIcon = "http://www.google.com/intl/en_us/mapfiles/ms/micons/blue-dot.png";
            var redIcon = "http://www.google.com/intl/en_us/mapfiles/ms/micons/red-dot.png";
            var greenIcon = "http://www.google.com/intl/en_us/mapfiles/ms/micons/green-dot.png";
            var points = <?php echo json_encode($points); ?>;
            var l = points.length;
            
            var infowindow = new google.maps.InfoWindow({
                maxWidth: 750
            });
            var mapOptions = {
                zoom: 7,
                center: new google.maps.LatLng(0.488596, 37.762009),
                styles: [{featureType: "administrative", elementType: "all", stylers: [{visibility: "on"}, {saturation: -100}, {lightness: 20}]}, {featureType: "road", elementType: "all", stylers: [{visibility: "on"}, {saturation: -100}, {lightness: 40}]}, {featureType: "water", elementType: "all", stylers: [{visibility: "on"}, {saturation: -10}, {lightness: 30}]}, {featureType: "landscape.man_made", elementType: "all", stylers: [{visibility: "simplified"}, {saturation: -60}, {lightness: 10}]}, {featureType: "landscape.natural", elementType: "all", stylers: [{visibility: "simplified"}, {saturation: -60}, {lightness: 60}]}, {featureType: "poi", elementType: "all", stylers: [{visibility: "off"}, {saturation: -100}, {lightness: 60}]}, {featureType: "transit", elementType: "all", stylers: [{visibility: "off"}, {saturation: -100}, {lightness: 60}]}]
            };

            google.maps.event.addDomListener(window, 'load', init);
            function setInfoWindow(marker) {
                google.maps.event.addListener(marker1, 'click', (function () {
                    infowindow.setContent("content");
                    infowindow.open(map, marker1);
                }));
            }
            function init() {

                var mapElement = document.getElementById('map');
                var map = new google.maps.Map(mapElement, mapOptions);
                //var line = document.write("<br/>");
                var content = "";
                for (var i = 0;  i < l; i++) {
                    var latLng = new google.maps.LatLng(points[i].lat, points[i].lng);
                    //window.alert(l);
                    content = (points[i].name).toString() + " " + (points[i].mob).toString();
                    var marker1 = new google.maps.Marker({position: latLng, map: map, icon: blueIcon, title: content})
                    
                    
                }
                //setInfoWindow(marker1);
            }


        </script>
    </head>
    <body>
        <div id="tooplate_wrapper" >
            <div id="tooplate_header">

                <div id="tooplate_menu">
                    <ul>
                        <li>
                            <a href="dashboard.php" >Dashboard</a>
                        </li>
                        <li>User Page
                            <ul>
                                <li>
                                    <a href="new-user.php">New User</a>
                                </li>
                                <li>
                                    <a href="users.php"><c1>View Users</c1></a>
                                </li>
                            </ul>
                        </li>

                        <li>
                        <c1>Client Page</c1>
                        <ul>
                            <li>
                                <a href="new-client.php">New Client</a>
                            </li>
                            <li>
                                <a href="clients.php">View Clients</a>
                            </li>
                            <li>
                                <a href="Map.php"><c1>Clients Map</c1></a>
                            </li>

                        </ul>
                        </li>
                        <li>
                            Fuel Data
                            <ul>
                                <li>
                                    <a href="fuel-data.php">Household Usage</a>
                                </li>
                                <li>
                                    <a href="">Kerosene</a>
                                </li>
                                <li>
                                    <a href="">Fire Wood</a>
                                </li>
                                <li>
                                    <a href="">Charcoal</a>
                                </li>
                            </ul>
                        </li>
                        <li>System Set Up
                            <ul>
                                <li>
                                    <a href="system-messages.php">System Messages</a>
                                </li>
                                <li>
                                    <a href="sent-messages.php">Sent Messages</a>
                                </li>

                            </ul>
                        </li>
                        <li>Contact</li>
                    </ul>
                    <div id="toolplate_session">
                        <b><p1>Welcome</p1> </style>:<p2> <i><?php echo $login_session; ?></i></p2></b>
                        <b id="logout"><a href="logout.php"><p1>Log Out</p1></a></b>&nbsp; &nbsp;
                    </div>
                </div>
            </div><!-- End of Header-->
            <div id="tooplate_main">
                <div id="tooplate_content" >
                    <p1>Number of Clients : <?php echo count($points); ?></p1>
                    <div id="map" style="width:100%;height:100%;"></div>
                </div>
            </div>
            <div id="tooplate_footer">    
                Copyright © 2015 <a href="http://www.eedadvisory.com" target="_blank">EED Advisory Limited </a> | Designed for Household Energy Data Aggregator (HEDA).
            </div>
        </div><!-- End of Wrapper-->
    </body>
</html>