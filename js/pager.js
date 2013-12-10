$(document).ready(function () {


//hide view and settings on load
$("#view").hide();
$("#stats").hide();
$("#settings").hide();



/*on click of view project hide all and show view*/
$("#view-project").click(function(){

$("#create").hide();
$("#stats").hide();
$("#settings").hide();
$("#view").show(0,'linear');



})

/*hide all and show account settings*/
$("#account-settings").click(function(){

$("#view").hide();
$("#create").hide();
$("#stats").hide();
$("#settings").show(0,'linear');


})
 
/*hide all and show create project*/

$("#create-project").click(function(){

$("#settings").hide();
$("#view").hide();
$("#stats").hide();
$("#create").show(0,'linear');

})

/*hide all and show project stats*/
$("#project-stats").click(function(){

$("#settings").hide();
$("#view").hide();
$("#create").hide();
$("#stats").show(0,'linear');

})


})