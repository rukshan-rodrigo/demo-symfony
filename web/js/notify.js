/**
 * Created with JetBrains PhpStorm.
 * User: nishantha.weerakoon
 * Date: 5/23/13
 * Time: 3:23 PM
 * To change this template use File | Settings | File Templates.
 */
    $(document).ready(function(){
        $("#notify_block").hide();
        $("#error_mess").hide();

        $("#notify_to").change(function(){
            var var_name = $("input[name='notify_to']:checked").val();

            if ( var_name == 0 ) {
                $("#notify_block").hide();
                $("#brand_block").show();
            }
            if ( var_name == 1 ) {
                $("#brand_block").hide();
                $("#notify_block").show();
            }
        });
    });

    $(document).ready(function(){
        $("#notify_frm").submit(function() {
            var var_name = $("input[name='notify_to']:checked").val();
            if (var_name == 1) {
                if ( $("#notify_email").val() == "") {
                    $("#error_mess").show();
                    return false;
                }
                else{
                    return true;
                }
            }
            else{
                return true;
            }
        });
    });
