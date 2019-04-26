jQuery(function($){
  
   $('form').areYouSure();

   $('[data-toggle="tooltip"]').tooltip();

   $('.alert').on('click', function(e){
     $(e.target).fadeOut();
   });

   jQuery('.delete').on('click', function(e){
     e.preventDefault();
     if(confirm("Are you sure? This cannot be reversed.")){
       window.location = e.currentTarget.attributes['href'].value;
     }
   });

});
