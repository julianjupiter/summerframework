function setFooterPosition() {
  if ($(document).height() > $(window).height()) {
	  $('.footer').css('position', 'relative'); 
  } else {
    $('.footer').css('position', 'absolute'); 
  }
}

$(document).ready(function(){
  setFooterPosition();
});

$(window).resize(function(){
  setFooterPosition();
});