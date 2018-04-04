$(document).ready( function() {
    // Get files name and trigger the function below
    $(document).on('change', '.btn-city :file', function() {
        var input = $(this),
            label = input.val().replace(/\\/g, '/').replace(/.*\//, '');
        input.trigger('fileselect', [label]);
    });

    // Get files name and trigger the function below
    $(document).on('change', '.btn-attraction :file', function() {
        var input = $(this),
            label = input.val().replace(/\\/g, '/').replace(/.*\//, '');
        input.trigger('fileselect', [label]);
    });

    // When adding an image for a city, show the image name in the box
    $('.btn-city :file').on('fileselect', function(event, label) {
        var input = $(this).parents('.input-group').find(':text'),
            log = label;
        if( input.length ) {
            input.val(log);
        } else {
            if( log ) alert(log);
        }
    
    });

    // When adding an attraction to a city, show the image name in the box
    $('.btn-attraction :file').on('fileselect', function(event, label) {
        var input = $(this).parents('.input-group').find('.attraction-file'),
            log = label;
        
        if( input.length ) {
            input.val(log);
        } else {
            if( log ) alert(log);
        }
    
    });

    // Load the image into the jumbotron in the create city page once image is selected
    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            
            reader.onload = function (e) {
                $(".jumbotron").css('background-image','url("' + e.target.result + '")');
            }
            
            reader.readAsDataURL(input.files[0]);
        }
    }

    // Selector
    $("#cityImg").change(function(){
        readURL(this);
    }); 	
});