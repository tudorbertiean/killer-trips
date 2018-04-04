// Contains the code blocks to be inserted
var template_attraction = '<div class="input-group input-text"><input type="text" class="form-control" placeholder="Attraction Title" name="attractionNames[]" id="attractionNames[]"/><input type="text" class="form-control" placeholder="Attraction Description" rows="3" name="attractionDesc[]" id="attractionDesc[]"/><div class="input-group input-img"><span class="input-group-btn"><span class="btn btn-default btn-file btn-attraction">Browse… <input type="file" name="attractionImg[]" id="attractionImg[]"></span></span><input type="text" class="form-control attraction-file" placeholder="Add an image" readonly></div></div>',
  minus_attraction = '<span class="btn btn-danger input-group-addon delete-attraction glyphicon glyphicon-minus"></span>';

// Used to insert multiple attractions in the create city page
$('.add-attraction').click(function() {
  var temp = $(template_attraction).insertBefore('.attraction-help');
  temp.append(minus_attraction);
  
  // To get images filename and set trigger for below function
  $(document).on('change', '.btn-attraction :file', function() {
    var input = $(this),
        label = input.val().replace(/\\/g, '/').replace(/.*\//, '');
    input.trigger('fileselect', [label]);
  });

  // To show images filename in the box
  $('.btn-attraction :file').on('fileselect', function(event, label) {
    var input = $(this).parents('.input-group').find('.attraction-file'),
        log = label;
    
    if( input.length ) {
        input.val(log);
    } else {
        if( log ) alert(log);
    }
  });
});

// Removing an attraction
$('.attraction-fields').on('click', '.delete-attraction', function(){
  $(this).parent().remove();
});

var template_killer = '<div class="input-group"><input type="text" class="form-control" placeholder="Killer Title" name="killerNames[]" id="killerNames[]"/><input type="text" class="form-control" placeholder="Killer Description" rows="3" name="killerDesc[]" id="killerDesc[]"/></div>',
    minus_killer = '<span class="btn btn-danger input-group-addon delete-killer glyphicon glyphicon-minus"></span>';

// Used to insert multiple killer information in the create city page
$('.add-killer').click(function() {
  var temp = $(template_killer).insertBefore('.killer-help');
  temp.append(minus_killer);
});

// Removing a killer-info field
$('.killer-fields').on('click', '.delete-killer', function(){
  $(this).parent().remove();
});