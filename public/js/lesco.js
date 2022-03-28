
$( document ).ready(function() {

$('.btn-group').html('');
$('.btn-group').append('<button class="btn btn-default seleccionar" id=' + 0 + '>Todas</div>')
for (var i = 65; i <= 90; i++) {
    $('.btn-group').append('<button class="btn btn-default seleccionar" id=' + String.fromCharCode(i) + '>' + String.fromCharCode(i) + '</div>');
}

$(".modal").click(function() {
    $( '.open-modal-'+ this.id).html('');
    $( '.open-modal-'+ this.id).show();
     var $modal =  '<div id="popup-modal">';
         $modal =  '<div class="relative w-full">';
         $modal += '<div class="relative bg-white rounded-lg shadow dark:bg-gray-700">';
         $modal += '<div class="flex justify-end p-2">';
         $modal += '<button id="'+ this.id +'" type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-800 dark:hover:text-white close" data-modal-toggle="popup-modal">';
         $modal += '<svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>'; 
         $modal += '</button>';
         $modal += '</div>';        
         $modal += '<div class="p-6 pt-0 text-center">';
         $modal += '<iframe width="420" height="315" src="https://www.youtube.com/embed/'+ $('#video_'+this.id).html() +'"></iframe>';
         $modal += '<h3 class="text-sky-500 dark:text-sky-400 text-center uppercase bg-white h-8 mt-5">'+ $('#nombre_palabra_'+ this.id).html() +'</h3>';
         $modal += '<button data-modal-toggle="popup-modal" type="button" class="text-white bg-red-600 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center mr-2">';
         $modal += 'Añadir tu seña favorita';
         $modal += '</button>';    
         $modal += '</div>';
         $modal += '</div>';
         $modal += '</div>';
         $modal += '</div>';
     $( '.open-modal-'+ this.id).append($modal);

  });


  $(document).on('click','.close',function(){
    $('.open-modal-'+ this.id).hide();
  
});

});

