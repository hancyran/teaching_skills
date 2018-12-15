// 选中页面中所有有data-rule属性的input

// 解析规则

//验证是否符合规则

$(function() {
  'use strict';

  var card = $('#mainCard');
  card.fadeIn();
  // card.animate({marginTop:'6%',opacity:0.85}, 500);
  var $inputs = $('[data-rule]');
  var input_v = [];
  var form_s = $('#signup');
  var form_l = $('#login');
  console.log(form_s);
  $inputs.each(function (index,node) {
    var tmp = new Input(node);
    input_v.push(tmp);
  });

  form_s.on('submit',function (e) {
    $inputs.trigger('blur');
    var r = true;
    for (var i = 0;i<input_v.length;i++){
      var item = input_v[i];
      r = item.validator.is_valide();
      if(r==false){
        alert('信息填写有误！');
        e.preventDefault();
        return;
      }
    }
  })


});
