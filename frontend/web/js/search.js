//Call jQuery before below code
$('.main-btn').click(function() {
  $('.search-description').slideToggle(100);
});
$('.search-description li').click(function() {
  var target = $(this).html();
  var toRemove = 'By ';
  var newTarget = target.replace(toRemove, '');
  //remove spaces
  newTarget = newTarget.replace(/\s/g, '');
  $(".search-large").html(newTarget);
  $('.search-description').hide();
  // $('.main-input').hide();
  newTarget = newTarget.toLowerCase();
  $('.main-' + newTarget).show();
});
$('#main-submit-mobile').click(function() {
  $('#main-submit').trigger('click');
});
$(window).resize(function() {
  replaceMatches();
});

function replaceMatches() {
  var width = $(window).width();
  if (width < 516) {
    $('.main-location').attr('value', 'City or postal code');
  } else {
    $('.main-location').attr('value', 'Search by city or postal code');
  }
};
replaceMatches();

function clearText(thefield) {
  if (thefield.defaultValue == thefield.value) {
    thefield.value = " "
  }
}

function replaceText(thefield) {
  if (thefield.value == " ") {
    thefield.value = thefield.defaultValue
  }
}

var examplesButtons = document.querySelectorAll('#examples-wrapper .btn');
for (var i = 0; i < examplesButtons.length; i++) {
  examplesButtons[i].addEventListener('click', function (event) {
    document.querySelector('.main-input').value = event.currentTarget.innerHTML;
    document.querySelector('#main-submit').click();
  })
}

$("#main-submit").on("click", function(e) {
  e.preventDefault();
  $(".main-location").val($(".search-large").text());
  console.log($(".main-location").val());
  $("form").submit();
});



