document.addEventListener("DOMContentLoaded", function () {
    var mymap = L.map('maCarte').setView([48.8566, 2.3522], 13); 

    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
        attribution: '© OpenStreetMap contributors'
    }).addTo(mymap);

    var marker = L.marker([48.8566, 2.3522]).addTo(mymap);
    marker.bindPopup("<b>123 Rue de la Liberté</b><br>75000 Paris, France").openPopup();
});
