$(document).ready( function() {
    $(document).on('change', '.btn-city :file', function() {
        var input = $(this),
            label = input.val().replace(/\\/g, '/').replace(/.*\//, '');
        input.trigger('fileselect', [label]);
    });

    $(document).on('change', '.btn-attraction :file', function() {
        var input = $(this),
            label = input.val().replace(/\\/g, '/').replace(/.*\//, '');
        input.trigger('fileselect', [label]);
    });

    $('.btn-city :file').on('fileselect', function(event, label) {
        var input = $(this).parents('.input-group').find(':text'),
            log = label;
        
        if( input.length ) {
            input.val(log);
        } else {
            if( log ) alert(log);
        }
    
    });

    $('.btn-attraction :file').on('fileselect', function(event, label) {
        var input = $(this).parents('.input-group').find('.attraction-file'),
            log = label;
        
        if( input.length ) {
            input.val(log);
        } else {
            if( log ) alert(log);
        }
    
    });

    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            
            reader.onload = function (e) {
                $(".jumbotron").css('background-image','url("' + e.target.result + '")');
            }
            
            reader.readAsDataURL(input.files[0]);
        }
    }

    $("#cityImg").change(function(){
        readURL(this);
    }); 	
});