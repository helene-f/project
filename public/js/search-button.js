$(document).ready(function () {
    $("#test").click(function () {
        $("#demo").toggle();
    });

	$(".close").click(function(){
        $("#myAlert").alert("close");
    });



});
