$(document).ready(function ()) ({
    $('#signup-tab').click(function () {
        //$('#logind').hide();
        $("#login").css("display", "none");
        //$('#signup').fadeIn('slow');
        console.log('AWS');
    });
    $('#login-tab').click(function () {
        //$('#yellow-box').hide();
        $('#logind').fadeIn('slow');     
    });
});