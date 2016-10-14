var objData = "";
var url = 'service/Resources/Base-expo-estudiantes.json';

$(document).ready(function() {
    
    $('#myCarousel').carousel({
        interval: 12500
    });
    
    $.ajax({
        url: url,
        dataType: 'json',
        async: false,
        success: function(data) {
            objData = data;
        },
    });

    contentCarousel();

    function contentCarousel() {
        
        var content = "";
        
        $.each(objData, function(k, register) {
            
            if(k == 0)
                content += "<div class='item active'>";
            else
                content += "<div class='item'>";
            
            content += "<div class='row'>";
            content += "<div class='col-md-5'>";
            content += "<div class='row'>";
            content += "<div class='col-md-12 nombre'>";
            content += "<h1>"+register.institucion+"</h1>";
            content += "<h2>"+register.localidad+"</h2>";
            content += "</div>";
            content += "</div>";
            content += "<div class='row'>";
            content += "<div class='col-md-12 fotografia'>";
            content += "<img src='"+register.pathSelfie+"' class='img-responsive'/>";
            content += "</div>";
            content += "</div>";
            content += "</div>";
            content += "<div class='col-md-7 pregunta'>";
            content += "<h3>"+register.question+"</h3>";
            content += "<h4>"+register.area+"</h4>";
            content += "<p>"+register.answer+"</p>";
            content += "</div>";
            content += "</div>";
            content += "</div>";
            
        });

        showContentCarousel(content);

    }

    function showContentCarousel(content) {
        $('#myCarousel').find('.carousel-inner').html(content);
    }

});