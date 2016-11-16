window.$ = window.jQuery = require('jquery');
require('bootstrap-sass');

var inputs = $('input, textarea');

inputs.on('keyup', function() {
    var input = $(this);
   
    if(input.val().length == 0) {
       input.removeClass('in').prev('label').removeClass('in fade');
      
       return;
    }
   
    $(this).addClass('in').prev('label').addClass('in');
});

inputs.on('blur', function() {
    var input = $(this);
   
    if(input.val().length == 0) {
       return;
    }
   
    input.prev('label').addClass('fade');
});

inputs.on('focus', function() {
    var input = $(this);

    if(input.val().length == 0) {
        return;
    }

    input.prev('label').removeClass('fade');
});

$('.smooth-scroll').click(function() {

});