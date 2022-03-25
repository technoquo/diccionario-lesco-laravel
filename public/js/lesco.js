
$( document ).ready(function() {
   
$('.btn-group').html('');
$('.btn-group').append('<button class="btn btn-default seleccionar" id=' + 0 + '>Todas</div>')
for (var i = 65; i <= 90; i++) {
    $('.btn-group').append('<button class="btn btn-default seleccionar" id=' + String.fromCharCode(i) + '>' + String.fromCharCode(i) + '</div>');
}


});

