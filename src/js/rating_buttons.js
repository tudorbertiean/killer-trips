// Used to call php function upon button click of upvote
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

// Used to call php function upon button click of downvote
$('.down-button').click(function() {
    $.ajax({
     type: "POST",
     url: "AddRating.php",
     data: { score: -1 }
    }).done(function( msg ) {
     alert( "Data Saved: " + msg );
    });    
});