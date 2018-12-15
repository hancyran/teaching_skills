$(function(){
  var username = $('.info input[name="username"]');
  username.attr('disabled', 'disabled');
  $('.info input').attr('disabled', 'disabled');
  $('.info select').attr('disabled', 'disabled');

  $('button[name="alterInfo"]').click(function () {
    $('.info input').removeAttr('disabled', 'disabled');
    $('.info input[name="username"]').attr('disabled', 'disabled');
    $('.info select').removeAttr('disabled', 'disabled');
    $('button[name="submit"]').removeClass('disabled');
  })


});
