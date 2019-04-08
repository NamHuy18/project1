$(document).ready(function(){
    $('#datepicker').datepicker({ dateFormat: 'yy-mm-dd' });
});

$(document).ready(function(){
    $('#datepicker1').datepicker({ dateFormat: 'yy-mm-dd' });
});

$(document).ready(function(){
    $("#check").change(function(){
        if($(this).is(":checked")){
            // $("#promotion").removeAttr('enabled');
            $("#promotion").prop('disabled', false);
        }
        else{
            // $("#promotion").attr('disabled','');
            $("#promotion").prop('disabled', true);
        }
    });
});

$(document).ready(function(){
    $("#check2").change(function(){
        if($(this).is(":checked")){
            // $("#promotion").removeAttr('enabled');
            $("#promotion").prop('disabled', false);
        }
        else{
            // $("#promotion").attr('disabled','');
            $("#promotion").prop('disabled', true);
        }
    });
});

$(document).ready(function(){
    $("#check1").change(function(){
        if($(this).is(":checked")){
            // $("#promotion").removeAttr('enabled');
            $("#category").prop('disabled', false);
        }
        else{
            // $("#promotion").attr('disabled','');
            $("#category").prop('disabled', true);
        }
    });
});

$(document).ready(function(){
    $("#changePassword").change(function(){
        if($(this).is(":checked")){
            // $("#password").removeAttr('enabled');
            $("#password").prop('disabled', false);
        }
        else{
            // $("#password").attr('disabled','');
            $("#password").prop('disabled', true);
        }
    });
});
