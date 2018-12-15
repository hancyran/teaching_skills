$(function(){
  'use strict';

  window.Validator = function (val,rule) {
    this.is_valide = function(new_val){
      var key;
      if(new_val!==undefined)
      {
        val=new_val;
      }
      // 如果不是必填项且无内容验证通过
      if(rule.required == false && !val )
      {
        return false;
      }
      for(key in rule){
        // 避开重复
        if(key === 'required')
          continue;

          // 调用对应的验证函数
          // console.log(key);
        var r = this['validate_'+key]();
        if(r==false) return false;
        return true;
      }
    },



    this.validate_max = function (){
      val = parseFloat(val);
      return val<=rule.max;
    },

    this.validate_min = function (){
      val = parseFloat(val);
      return val>=rule.min;
    },

    this.validate_maxlength = function () {
      val = val.toString();
      return val.length<=rule.maxlength;
    },


    this.validate_minlength = function () {
      val = val.toString();
      return val.length>=rule.minlength;
    },

    this.validate_numeric = function (){
      return $.isNumeric(val);
    },

    this.validate_required = function (){
      var str = $.trim(val);
      if(!str && str !== 0){
        return false;
      }
      return true;
    },

    this.validate_pattern = function () {
      var reg = new RegExp(rule.pattern);
      return reg.test(val);
    }

  };



});
