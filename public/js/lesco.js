
$( document ).ready(function() {

$('.btn-group').html('');
$('.btn-group').append('<a class="ml-2 uppercase text-white seleccionar" id="todas">Todas</a>')
for (var i = 65; i <= 90; i++) {
    $('.btn-group').append('<a class="btn btn-default seleccionar" id="'+String.fromCharCode(i) +'">' + String.fromCharCode(i) + '</a>');
}

$(document).on("click", ".modal", function(event) {
    $( '.open-modal-'+ this.id).html('');
    $( '.open-modal-'+ this.id).show();
     var $modal =  '<div id="popup-modal">';
         $modal +=  '<div class="relative w-full">';
         $modal += '<div class="relative bg-white rounded-lg shadow dark:bg-gray-700">';
         $modal += '<div class="flex justify-end p-2">';
         $modal += '<button id="'+ this.id +'" type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-800 dark:hover:text-white close" data-modal-toggle="popup-modal">';
         $modal += '<svg class="w-5 h-5 equis" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>'; 
         $modal += '</button>';
         $modal += '</div>';        
         $modal += '<div class="p-6 pt-0 text-center">';
         $modal += '<iframe width="420" height="315" src="https://www.youtube.com/embed/'+ $('#video_'+this.id).html() +'"></iframe>';
         $modal += '<h3 class="text-sky-500 dark:text-sky-400 text-center uppercase bg-white h-8 mt-10">'+ $('#nombre_palabra_'+ this.id).html() +'</h3>';
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


  MostrarSenasMinimo()

  BottonMostrar();


$("#loadMore").on("click", function(e) {
    e.preventDefault();
    $(".estado_A:hidden").slice(0, 12).slideDown();
       
    if ($(".estado_A:hidden").length == 0) {
        $("#loadMore").css('display', 'none');
    }
});


$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});


$(document).on("click", ".seleccionar", function(event) {
    
    
    event.preventDefault();
    var OrdenarPalabras = [];
    $(".orden_letra").html('');
    
    var list = "";
    $.ajax({
        method: "POST",
        dataType: "json",
        url: '/diccionario/MostrarLetra',
        data: {
            'letra': this.id,
            'cod_categoria': $(".form-select").val()
        },
        success: function(response) {
            $(".orden_letra").append(list);
            $.each(response['data'], function(index, value) {
                
                var Obj = {
                    id: value.id,
                    palabra: value.palabra,
                    video: value.video,
                    estado: value.estado,
                    

                }

                OrdenarPalabras.push(Obj);


            });
 
            $.each(OrdenarPalabras, function(index, value) {
          
                if (value.estado =='A') {
                    list +='<div class="modal hidden  estado_'+ value.estado +'" id="'+ value.id +'">';
                    list +='   <div class="p-8">';
                    list +='          <div class="hidden" id="video_'+ value.id +'">'+ value.video +'</div>';
                    list +='                <img src="http://img.youtube.com/vi/'+ value.video +'/mqdefault.jpg" alt="'+ value.palabra +'">';                                  
                    list +='                  <div class="text-sky-500 dark:text-sky-400 text-center uppercase bg-white h-8">';
                    list +='                    <div class="nombre_palabra" id="nombre_palabra_'+ value.id +'">'+ value.palabra + '</div>';                 
                    list +='          </div>';
                    list +='    </div>';
                    list +='</div>';
                    list +='<div class="open-modal-'+ value.id +' overflow-y-auto overflow-x-hidden fixed top-40  z-50" tabindex="-1"></div>';
                }
            });
            
            
            $(".orden_letra").append(list);
            $('#mostrarLetra').html('Todas (' + $('.modal').length + ')');   
            $("#loadMore").text("Mostrar más");  
            
            BottonMostrar();
            MostrarSenasMinimo();
        },
        error: function(error) {
            console.log(error);
        }
    });
          
    if (this.id == 'todas'){
       $(".form-select").val(0).change();
    }

});


      $(".form-select").change(function(event){
          
                event.preventDefault();
                var OrdenarPalabras = [];
                $(".orden_letra").html('');
                var list = "";

            
                $.ajax({
                    url: '/diccionario/MostrarCategoria',              
                    method: "POST",
                    dataType: "json",
                    data: {
                        'cod_categoria': $(".form-select").val()
                    },
                    success: function(response){
                        $.each(response['data'], function(index, value) {
                            var Obj = {
                                id: value.id,
                                palabra: value.palabra,
                                video: value.video,
                                estado: value.estado,
                                
            
                            }
            
                            OrdenarPalabras.push(Obj);
            
            
                        });
             
                        $.each(OrdenarPalabras, function(index, value) {
                          
                            if (value.estado =='A') {
                                list +='<div class="modal hidden  estado_'+ value.estado +'" id="'+ value.id +'">';
                                list +='   <div class="p-8">';
                                list +='          <div class="hidden" id="video_'+ value.id +'">'+ value.video +'</div>';
                                list +='                <img src="http://img.youtube.com/vi/'+ value.video +'/mqdefault.jpg" alt="'+ value.palabra +'">';                                  
                                list +='                  <div class="text-sky-500 dark:text-sky-400 text-center uppercase bg-white h-8">';
                                list +='                    <div class="nombre_palabra" id="nombre_palabra_'+ value.id +'">'+ value.palabra + '</div>';                 
                                list +='          </div>';
                                list +='    </div>';
                                list +='</div>';
                                list +='<div class="open-modal-'+ value.id +' overflow-y-auto overflow-x-hidden fixed top-40  z-50" tabindex="-1"></div>';
                            }
                        });
                        
                          
                        $(".orden_letra").append(list);
                        $('#mostrarLetra').html('Todas (' + $('.modal').length + ')');         
                        BottonMostrar();
                        MostrarSenasMinimo();
                    
                    
                    },
                    error: function(error) {
                    console.log(error);
                    }
                });

            });


            $(".form-input").on("keyup", function() {
                var value = $(this).val().toLowerCase();
        
        
                $(".modal").filter(function() {
                    $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
                    if (value == "") {

                    var x = 1;
                    $('.estado_A').each(function(index, value) {
    
                        if (x <= 12) {
    
    
                            if (this.id != "") { // el caso Favorito si esta vacio entonces omite .
                                $('#' + this.id).removeClass('hidden');
    
                            }
                        } else {
                            $('#' + this.id).attr("style", "none");
                        }
    
                        x++;
                    });
    
                    $('#loadMore').show();
    
                } else {
    
                    $('#loadMore').hide();
                }
                    //BuscarSena($(this).toggle($(this).text().toLowerCase().indexOf(value) > -1));
                });
        
            });
         

});


function BottonMostrar() {
    
    if (($('.modal').length == 0) || ($('.modal').length <= 12)) {
          
        $('#loadMore').hide(); 
    } else {
        
        $('#loadMore').show();
    }
}

function MostrarSenasMinimo(){
    var x = 1;
    $('.modal').each(function(index, value) {
  
        if (x <= 12) {        
    
            if (this.id != "") { // el caso Favorito si esta vacio entonces omite .
                $('#' + this.id).removeClass('hidden');
    
            }
        }
        x++;
    });
  }
