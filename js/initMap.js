    function initMap() {
        var uluru = {lat: -34.698639, lng: -58.669250};
        var secretMessages = '<span style="color:black"><b>Corralón Casa Licata</b><br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Donofrio 1544<br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Barrio Libertad<br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Buenos Aires</span>';
        var map = new google.maps.Map(document.getElementById('map'), {
            zoom: 15,
            center: uluru
        });

        var marker = new google.maps.Marker({
            position: uluru,
            map: map,
            animation: google.maps.Animation.BOUNCE,
            title: 'Hacé click para ver la dirección'
        });
        attachSecretMessage(marker, secretMessages);

        function attachSecretMessage(marker, secretMessages) {
            var infowindow = new google.maps.InfoWindow({
                content: secretMessages
            });

            marker.addListener('click', function() {
                infowindow.open(marker.get('map'), marker);
            });
        }

    }