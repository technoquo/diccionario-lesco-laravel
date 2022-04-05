
$( document ).ready(function() {


    $(document).on("click", ".inicio", function(event) {

       window.location.href = '/diccionario';

    });

$('.btn-group').html('');
$('.btn-group').append('<a class="ml-2 uppercase text-white seleccionar" id="todas">Todas</a>')
for (var i = 65; i <= 90; i++) {
    $('.btn-group').append('<a class="btn btn-default seleccionar" id="'+String.fromCharCode(i) +'">' + String.fromCharCode(i) + '</a>');
}

$(document).on("click", ".modal", function(event) {
    
    SenaFavoritaUsuario(this.id);
    $( '.open-modal-'+ this.id).html('');
    $( '.open-modal-'+ this.id).show();
     var $modal =  '<div id="popup-modal">';
         $modal +=  '<div class="relative w-full">';
         $modal += '<div class="relative bg-white rounded-lg shadow dark:bg-gray-700">';
         $modal += '<div class="flex justify-end p-2">';
         $modal += '<button id="'+ this.id +'" type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-800 dark:hover:text-white close" data-modal-toggle="popup-modal">';
         $modal += '<svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>'; 
         $modal += '</button>';
         $modal += '</div>';        
         $modal += '<div class="p-6 pt-0 text-center">';
         $modal += '<iframe width="420" height="315" src="https://www.youtube.com/embed/'+ $('#video_'+this.id).html() +'"></iframe>';
         $modal += '<h3 class="text-sky-500 dark:text-sky-400 text-center uppercase bg-white h-8 mt-10">'+ $('#nombre_palabra_'+ this.id).html() +'</h3>';
        //  $modal += '<button data-modal-toggle="popup-modal" type="button" class="text-white bg-red-600 hover:bg-red-800  font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center mr-2 agregarsenafavorita_'+ this.id +' agregarsenafavorita" id="'+ this.id +'">';
        //  $modal += 'Añadir tu seña favorita';
        //  $modal += '</button>';    
         $modal += '</div>';
         $modal += '</div>';
         $modal += '</div>';
         $modal += '</div>';
     $( '.open-modal-'+ this.id).append($modal);

  });


  $(document).on('click','.close',function(){
   
    $('.open-modal-'+ this.id).hide();
  
  
});


 


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
    
  
     var url;
    if ($('input[name=tipo').val() == 'mosaico'){
         url = '/diccionario/MostrarLetra';        
    } else {
         url = '/listasenas/MostrarLetra';
    }

    
    event.preventDefault();
    var OrdenarPalabras = [];
    $(".orden_letra").html('');
    
    var list = "";
    $.ajax({
        method: "POST",
        dataType: "json",
        url: url,
        data: {
            'letra': this.id,
            'cod_categoria': $(".form-select").val()
        },
        success: function(response) {
           
            $.each(response['data'], function(index, value) {
                
                var Obj = {
                    id: value.id,
                    palabra: value.palabra,
                    video: value.video,
                    estado: value.estado,
                    

                }

                OrdenarPalabras.push(Obj);


            });
            if ($('input[name=tipo').val() == 'mosaico'){
            $.each(OrdenarPalabras, function(index, value) {
          
                if (value.estado =='A') {
                    list +='<div class="p-8 card hidden estado_'+ value.estado +'" id="'+ value.id +'">';
                    list +='          <div class="hidden" id="video_'+ value.id +'">'+ value.video +'</div>';
                    list +='             <img class="mostrar_'+ value.id +'  card-img-left ico_heart_favorito heart-fill" id="'+ value.id +'">'
                    list +='    <div class="modal" id="'+ value.id +'">';
                    list +='                <img src="http://img.youtube.com/vi/'+ value.video +'/mqdefault.jpg" alt="'+ value.palabra +'">';                                  
                    list +='                  <div class="text-sky-500 dark:text-sky-400 text-center uppercase bg-white h-8">';
                    list +='                    <div class="nombre_palabra" id="nombre_palabra_'+ value.id +'">'+ value.palabra + '</div>';                 
                    list +='                  </div>';
                    list +='    </div>';
                    list +='</div>';
                    list +='<div class="open-modal-'+ value.id +' overflow-y-auto overflow-x-hidden fixed top-40  z-50" tabindex="-1"></div>';
                }
            });
                  
            $(".orden_letra").append(list);
            $('#mostrarLetra').html('Todas (' + $('.card').length + ')');   
            $("#loadMore").text("Mostrar más");

            BottonMostrar();
            MostrarSenasMinimo();
            CorazonFavorito();

            } else {
                $.each(OrdenarPalabras, function(index, value) {
                 
                if (value.estado =='A') {
                    list +='<option value="'+ value.id +'" class="w-56 count">'+ value.palabra +'</option>';
                
                }
            });
            $(".orden_letra").append(list);
            $('#cantidadPalabras').html('Palabras (' +  $('.count').length +')');
            }
            
          
            
           
    
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
          
                event.preventDefault();S               
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

                      if ($('input[name=tipo').val() == 'mosaico'){
             
                        $.each(OrdenarPalabras, function(index, value) {
                                
                            if (value.estado =='A') {
                               
                                list +='<div class="p-8 card hidden estado_'+ value.estado +'" id="'+ value.id +'">';
                                list +='          <div class="hidden" id="video_'+ value.id +'">'+ value.video +'</div>';
                                list +='             <img class="mostrar_'+ value.id +'  card-img-left ico_heart_favorito heart-fill" id="'+ value.id +'">'
                                list +='    <div class="modal" id="'+ value.id +'">';
                                list +='                <img src="http://img.youtube.com/vi/'+ value.video +'/mqdefault.jpg" alt="'+ value.palabra +'">';                                  
                                list +='                  <div class="text-sky-500 dark:text-sky-400 text-center uppercase bg-white h-8">';
                                list +='                    <div class="nombre_palabra" id="nombre_palabra_'+ value.id +'">'+ value.palabra + '</div>';                 
                                list +='                  </div>';
                                list +='    </div>';
                                list +='</div>';
                                list +='<div class="open-modal-'+ value.id +' overflow-y-auto overflow-x-hidden fixed top-40  z-50" tabindex="-1"></div>';
                            }
                        });
                        
                          
                        $(".orden_letra").append(list);
                        $('#mostrarLetra').html('Todas (' + $('.card').length + ')');         
                        BottonMostrar();
                        MostrarSenasMinimo();
                        CorazonFavorito();
                     } else {
                        $(".orden_letra").html('');
                  
                        $.each(OrdenarPalabras, function(index, value) {
                        
                        if (value.estado =='A') {
                            list +='<option value="'+ value.id +'" class="w-56 count">'+ value.palabra +'</option>';
                        
                        }
                    });
                    $(".orden_letra").append(list);
                    }
                     $('#cantidadPalabras').html('Palabras (' +  $('.count').length +')');
                    },
                    error: function(error) {
                    console.log(error);
                    }
                });

            });


            $(".form-input").on("keyup", function() {
                var value = $(this).val().toLowerCase();
        
        
                $(".card").filter(function() {
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


            $(document).on("click", ".agregarsenafavorita", function(event) {

             
               
               $.ajax({
                    url: '/diccionario/AgregarSenaFavorita',              
                    method: "POST",
                    dataType: "json",
                    data: {
                        'id': this.id
                    },
                    success: function(response){
                     
                   if (response['message']=='success') {                   
                      $('.agregarsenafavorita_'+response['id']).removeClass('bg-red-600 hover:bg-red-800').removeClass('agregarsenafavorita').addClass('bg-gray-400  quitarsenafavorita').text('Quitar tu seña favorita');
                      $('.mostrar_'+ response['id']).removeClass('heart-fill').addClass('heart'); 
                      }
                    },
                    error: function(error) {
                    console.log(error);
                    }
                });

            });

            




            

            
            $(document).on("click", ".agregarcorazonfavorito", function(event) {

             
               
                $.ajax({
                     url: '/diccionario/AgregarSenaFavorita',              
                     method: "POST",
                     dataType: "json",
                     data: {
                         'id': this.id
                     },
                     success: function(response){
                      
                    if (response['message']=='success') {    

                       $('.agregarsenafavorita_'+response['id']).removeClass('bg-red-600 hover:bg-red-800').removeClass('agregarsenafavorita').addClass('bg-gray-400  quitarsenafavorita').text('Quitar tu seña favorita');
                       $('.mostrar_'+ response['id']).removeClass('heart-fill agregarcorazonfavorito').addClass('heart quitarsena'); 
                       
                       }
                     },
                     error: function(error) {
                     console.log(error);
                     }
                 });
 
             });


             $(document).on("click", ".quitarsena", function(event) {

              console.log('dafdas');
              
                $.ajax({
                    url: '/diccionario/QuitarSenaFavorita',              
                    method: "POST",
                    dataType: "json",
                    data: {
                        'id': this.id
                    },
                    success: function(response){
                       
                    if (response['message']=='success') {

                    
                    //   $('.agregarsenafavorita_'+response['id']).removeClass('bg-gray-400  quitarsena').addClass('agregarsenafavorita').addClass('bg-red-600 hover:bg-red-800').text('Añadir tu seña favorita');
                       $('.mostrar_'+ response['id']).removeClass('heart quitarsena').addClass('heart-fill agregarcorazonfavorito');
                     
                     }
                    },
                    error: function(error) {
                    console.log(error);
                    }
                });

            });


            $(document).on("click", ".quitarsenafavorita", function(event) {

              
              
                $.ajax({
                    url: '/diccionario/QuitarSenaFavorita',              
                    method: "POST",
                    dataType: "json",
                    data: {
                        'id': this.id
                    },
                    success: function(response){
                      
                    if (response['message']=='success') {

                    
                       $('.favorito_'+ response['id']).remove();
                      
                       $('#cantidadLetra').html('Tus señas favoritas  ('+ $('.card').length +')');
                     }
                    },
                    error: function(error) {
                    console.log(error);
                    }
                });

            });


            // GLOBAL

            MostrarSenasMinimo();
            BottonMostrar();         
            CorazonFavorito();

});


function BottonMostrar() {
    
    if (($('.card').length == 0) || ($('.card').length <= 12)) {
          
        $('#loadMore').hide(); 
    } else {
        
        $('#loadMore').show();
    }
}

function MostrarSenasMinimo(){
    var x = 1;
    $('.card').each(function(index, value) {
          
        if (x <= 12) {        
    
           
         $('#' + this.id).removeClass('hidden');
    
            
        } else {
            $('#' + this.id).addClass('hidden');
        }
        x++;
    });
  }


  function SenaFavoritaUsuario(id){


    $.ajax({
        url: '/diccionario/SenaFavoritaUsuario',              
        method: "POST",
        dataType: "json",  
        data: {'id_sena': id },            
        success: function(response){      
           
             if (jQuery.isEmptyObject(response['data']) == false){
             
               $('.agregarsenafavorita_'+ response['data'][0]['id_sena']).removeClass('bg-red-600 hover:bg-red-800').removeClass('agregarsenafavorita').addClass('bg-gray-400  quitarsenafavorita').text('Quitar tu seña favorita');
            }
        },
        error: function(error) {
        console.log(error);
        }
    });

}

function CorazonFavorito(){


    $.ajax({
        url: '/diccionario/CorazonFavorito',              
        method: "POST",
        dataType: "json",                
        success: function(response){      
          
            $(response['data']).each(function(index, value) {          
               $('.mostrar_'+ value.id_sena).removeClass('heart-fill').addClass('heart');
            });
               
        },
        error: function(error) {
        console.log(error);
        }
    });

}



  
