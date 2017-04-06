function afisare1(){
$(".articolp").fadeIn(1000);
$("button").hide();
}
var i=0;
function imga(){
if(i==0){$(".imagini").fadeIn(1000);
$("a#imgbuton").html("Ascunde imaginile");
i++;
}else{
$(".imagini").hide(1000);
$("a#imgbuton").html("Arata imaginile");
i--;}
}