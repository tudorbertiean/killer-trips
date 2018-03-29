var template_attraction = '<div class="input-group"><input type="text" class="form-control" placeholder="Attraction Title" name="attractionNames[]" id="attractionNames[]"/><input type="text" class="form-control" placeholder="Attraction Description" rows="3" name="attractionDesc[]" id="attractionDesc[]"/></div>',
    minus_attraction = '<span class="btn btn-danger input-group-addon delete-attraction glyphicon glyphicon-minus"></span>';

$('.add-attraction').click(function() {
  var temp = $(template_attraction).insertBefore('.attraction-help');
  temp.append(minus_attraction);
});

$('.attraction-fields').on('click', '.delete-attraction', function(){
  $(this).parent().remove();
});

var template_killer = '<div class="input-group"><input type="text" class="form-control" placeholder="Killer Title" name="killerNames[]" id="killerNames[]"/><input type="text" class="form-control" placeholder="Killer Description" rows="3" name="killerDesc[]" id="killerDesc[]"/></div>',
    minus_killer = '<span class="btn btn-danger input-group-addon delete-killer glyphicon glyphicon-minus"></span>';

$('.add-killer').click(function() {
  var temp = $(template_killer).insertBefore('.killer-help');
  temp.append(minus_killer);
});

$('.killer-fields').on('click', '.delete-killer', function(){
  $(this).parent().remove();
});