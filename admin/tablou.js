$(document).ready(function(){
var val = 1;
var inaltime = $('#siderbar').height();
var lungime = $('#siderbar').width();
var blungime = $('#button').width();
var bh = $('body').height();
if(bh < 721){$('#button').css('top', 100).removeAttr('bottom').css('height', 20);}
else if(bh > 721 && bh < 1030){$('#button').css('bottom', 20).removeAttr('top').css('height', 20);}
else if(bh > 1030){$('#button').css('top', 100).removeAttr('bottom').css('height', 20);}
$('#panou').animate({right: -300},1);
//$('#panou').css('height', inaltime-20);
$('#panou').css('height', inaltime-20).css('width', lungime+30);
var va = $('#button').text();

$('#button').hover(function(){
$('#button').css('cursor','pointer')


},function(){

$('#button').css('cursor','default')

});


$('#button').click(function(){
$(this).addClass('activ');



if(val == 1){
$('#panou').animate({right:0}, 1000);
$('#button').text("Inchide");
$('#button').css('width', blungime)
val = 0;

} else{val = 1;
$('#panou').animate({right: -300}, 1000);
$('#button').text("Meniu");
$('#button').removeAttr('width');
$(this).removeClass('activ');

}

})
});