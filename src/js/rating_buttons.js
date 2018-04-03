$('.up-button').click(function() {
    alert( "Data Saved: ");
    $.ajax({
     type: "POST",
     url: "AddRating.php",
     data: { score: 1 }
    }).done(function( msg ) {
     alert( "Data Saved: " + msg );
    });    
});

$('.down-button').click(function() {
    $.ajax({
     type: "POST",
     url: "AddRating.php",
     data: { score: -1 }
    }).done(function( msg ) {
     alert( "Data Saved: " + msg );
    });    
});