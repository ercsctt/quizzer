jQuery(function($){
   $('[data-toggle="tooltip"]').tooltip();

   $(document.body).on('click', '.answer-wrapper i', function() {
     if(confirm("Are you sure?")){
       var childrenSize = this.parentElement.parentElement.parentElement.children.length - 1;

       console.log(childrenSize);

       if(childrenSize < 5){
         console.log(jQuery('#' + this.parentElement.parentElement.parentElement.parentElement.id + " .add-answer"));
         jQuery('#' + this.parentElement.parentElement.parentElement.parentElement.id + " .add-answer").attr('hidden', false);
       }

       this.parentElement.parentElement.remove();
     }
   });

   $(document.body).on('click', '.add-answer', function(e) {
     var ol = $(e.currentTarget.offsetParent).find('ol')[0];

     if(ol.children.length >= 5) return;

     var toAppend = "";

     toAppend += "<li>";
     toAppend += "<div class='answer-wrapper'>";
     toAppend += "<input type='text' class='qzr-input' placeholder='Answer...' />";
     toAppend += "<label class='radio-container'>";
     toAppend += "<input type='radio' name='question-1-answer' class='qzr-input-radio'>";
     toAppend += "<span class='checkmark'></span>";
     toAppend += "</label>";
     toAppend += "<i class='fas fa-trash'></i>";
     toAppend += "</div>";
     toAppend += "</li>";

     $(e.currentTarget.offsetParent).find('ol').append(toAppend);

     if(ol.children.length >= 5){
       e.target.hidden = true;
     }

   });
});
