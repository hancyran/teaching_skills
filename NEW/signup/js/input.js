$(function () {

  window.Input = function (selector) {
    var $ele,$error_ele,rule={required:true};
    var me = this;

    this.get_val = function () {
      return $ele.val();
    };

    this.load_validator = function () {
      var val = this.get_val();
      this.validator=new Validator(val,rule);
    };
    // this.validator=new Validator($ele.val(),rule);
    // this.load_validator = load_validate_fun();
    function init() {
      find_ele();
      find_error_ele();
      parse_rule();
      me.load_validator();
      listen();
    }

    function listen() {
      $ele.on('blur',function () {
        var valid = me.validator.is_valide(me.get_val());
        if(valid==true)
        {
          $error_ele.hide();
        }
        else
        {
          $error_ele.show();
        }
      });
    }

    function find_error_ele() {
      $error_ele = $("#" + $ele.attr('name') + "-input-error");
    }

    function find_ele() {
      if(selector instanceof jQuery){
        $ele = selector;
      }
      else
      {
        $ele = $(selector);
      }
    }

    function parse_rule() {
      var i = 0;
      var rule_str = $ele.data('rule');
      if(!rule_str) return;

      var rule_arr = rule_str.split('|');
      for(i=0;i<rule_arr.length;i++){
        var item_str = rule_arr[i];
        var item_arr = item_str.split(":");
        rule[item_arr[0]]=JSON.parse(item_arr[1]);
        // console.log(item_arr[0],rule[item_arr[0]]);
      }
    }
    init();
  };

});
