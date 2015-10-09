$(document).ready(function(){
    $(".nav-pills a").click(function(){
        $(this).tab('show');
    });
});

$(function(){
  $('#loginform').submit(function(e){
    return false;
  });

   $('#modaltrigger').leanModal({ top: 110, overlay: 0.45, closeButton: ".hidemodal" });
});

$(".email-signup").hide();
$("#signup-box-link").click(function() {
  $(".email-login").fadeOut(100);
  $(".email-signup").delay(100).fadeIn(100);
  $("#login-box-link").removeClass("active");
  $("#signup-box-link").addClass("active");
});
$("#login-box-link").click(function() {
  $(".email-login").delay(100).fadeIn(100);;
  $(".email-signup").fadeOut(100);
  $("#login-box-link").addClass("active");
  $("#signup-box-link").removeClass("active");
});

function validateMyForm ( ) {
    var extensions = new Array("jpg","jpeg","gif","png","bmp"); 
    var isValid = true;
    if ( document.myForm.product_name.value == "" ) { 
      alert ( "Product name cannot be empty." ); 
      isValid = false;
    } else if ( document.myForm.price.value == "" ) { 
            alert ( "Product price cannot be empty." ); 
            isValid = false;
    } else if ( document.myForm.details.value == "" ) { 
            alert ( "Please describe the product." ); 
            isValid = false;
    } else if ( document.myForm.fileField.value == "" ) { 
            alert ( "Please upload an image file for the product." ); 
            isValid = false;
    }
    return isValid;
}