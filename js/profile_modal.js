/* #####################################################################
 #
 #   File          : Login Modal Popup JQuery
 #   Project       : Game Magazine Project
 #   Author        : Béo Sagittarius
 #   Created       : 07/29/2015
 #   Last Change   : 10/14/2015
 #
 ##################################################################### */

$(function () {

    var $formProfile = $('#profile-form');
    var $formUpdate = $('#update-form');
    var $formChangePass = $('#changepass-form');
    var $divFormsProfile = $('#div-forms-profile');
    var $modalAnimateTime = 300;
    var $msgAnimateTime = 150;
    var $msgShowTime = 4000;

    $("form").submit(function () {
        switch (this.id) {
            case "update-form":
                var $rg_firstname = $('#register_firstname').val();
                var $rg_lastname = $('#register_lastname').val();
                var $rg_username = $('#register_username').val();
                var $rg_email = $('#register_email').val();
                var $rg_password = $('#register_password').val();
                var $rg_gender = $('#register_gender').val();
                var $rg_dateofbirth = $('#register_date_of_birth').val();
                var dataString = 'firstname=' + $rg_firstname
                                + '&lastname=' + $rg_lastname 
                                + '&username=' + $rg_username
                                + '&email=' + $rg_email
                                + '&password=' + $rg_password
                                + '&gender=' + $rg_gender
                                + '&dateofbirth=' + $rg_dateofbirth;
                if ($rg_firstname == ""){
                    msgChange($('#div-register-msg'), $('#icon-register-msg'), $('#text-register-msg'), "error", "glyphicon-remove", "Firstname is required");
                } else if ($rg_lastname == ""){
                    msgChange($('#div-register-msg'), $('#icon-register-msg'), $('#text-register-msg'), "error", "glyphicon-remove", "Lastname is required");
                } else if ($rg_username == ""){
                    msgChange($('#div-register-msg'), $('#icon-register-msg'), $('#text-register-msg'), "error", "glyphicon-remove", "Username is required");
                } else if ($rg_email == ""){
                    msgChange($('#div-register-msg'), $('#icon-register-msg'), $('#text-register-msg'), "error", "glyphicon-remove", "Email is required");
                } else if ($rg_password == ""){
                    msgChange($('#div-register-msg'), $('#icon-register-msg'), $('#text-register-msg'), "error", "glyphicon-remove", "Password is required");
                }
                
                
                //==========================
                else {
                    $.ajax({
                        type: "POST",
                        url: "register.php",
                        dataType: "json",
                        data: dataString,
                        success: function (response) {
                            if (response.status == "OK" ){
                                msgChange($('#div-register-msg'), $('#icon-register-msg'), $('#text-register-msg'), "success", "glyphicon-remove", "OK");
//                                location.href = 'index.php';
//                                $('#login-modal').modal('hide');             
                            } else if(response.status == "FAIL"){              
                                msgChange($('#div-register-msg'), $('#icon-register-msg'), $('#text-register-msg'), "error", "glyphicon-remove", "FAIL");

                            }
                        }
                    }); 
                }
                return false;
                break;
            case "changepass-form":
                var $ls_email = $('#lost_email').val();
                var pattern = /^((([a-z]|\d|[!#\$%&'\*\+\-\/=\?\^_`{\|}~]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])+(\.([a-z]|\d|[!#\$%&'\*\+\-\/=\?\^_`{\|}~]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])+)*)|((\x22)((((\x20|\x09)*(\x0d\x0a))?(\x20|\x09)+)?(([\x01-\x08\x0b\x0c\x0e-\x1f\x7f]|\x21|[\x23-\x5b]|[\x5d-\x7e]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(\\([\x01-\x09\x0b\x0c\x0d-\x7f]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]))))*(((\x20|\x09)*(\x0d\x0a))?(\x20|\x09)+)?(\x22)))@((([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])*([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])))\.)+(([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])*([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])))\.?$/i;
                var dataString = 'email=' + $ls_email ;
                if ($ls_email == "") {
                    msgChange($('#div-lost-msg'), $('#icon-lost-msg'), $('#text-lost-msg'), "error", "glyphicon-remove", "Email is required");
                }else if ($ls_email.length > 255){
                    msgChange($('#div-lost-msg'), $('#icon-lost-msg'), $('#text-lost-msg'), "error", "glyphicon-remove", "Email address is too long");
                }else if(!pattern.test($ls_email)){
                    msgChange($('#div-lost-msg'), $('#icon-lost-msg'), $('#text-lost-msg'), "error", "glyphicon-remove", "Email address is invalid");
                }else {
                    $.ajax({
                        type: "POST",
                        url: "changepass.php",
                        dataType: "json",
                        data: dataString,
                        success: function (response) {
                            if (response.status == "OK" ){
                                msgChange($('#div-lost-msg'), $('#icon-lost-msg'), $('#text-lost-msg'), "error", "glyphicon-ok", "Send ERROR");
                                location.href = 'index.php';
                                $('#login-modal').modal('hide');             
                            }
                            if(response.status == "FAIL"){              
                                msgChange($('#div-lost-msg'), $('#icon-lost-msg'), $('#text-lost-msg'), "error", "glyphicon-ok", "Send ERROR");
                            }
                        }
                    });                  
                }
                return false;
                break;
                
            
            default:
                return false;
        }
        return false;
    });

    $('#profile_update_btn').click(function () {
        modalAnimate($formProfile, $formUpdate)
    });
    $('#profile_changepass_btn').click(function () {
        modalAnimate($formProfile, $formChangePass);
    });
    $('#update_view_btn').click(function () {
        modalAnimate($formUpdate, $formProfile);
    });
    $('#update_changepass_btn').click(function () {
        modalAnimate($formUpdate, $formChangePass);
    });
    $('#changepass_view_btn').click(function () {
        modalAnimate($formChangePass, $formProfile);
    });
    $('#changepass_update_btn').click(function () {
        modalAnimate($formChangePass, $formUpdate);
    });

    function modalAnimate($oldForm, $newForm) {
        var $oldH = $oldForm.height();
        var $newH = $newForm.height();
        $divFormsProfile.css("height", $oldH);
        $oldForm.fadeToggle($modalAnimateTime, function () {
            $divFormsProfile.animate({height: $newH}, $modalAnimateTime, function () {
                $newForm.fadeToggle($modalAnimateTime);
            });
        });
    }

    function msgFade($msgId, $msgText) {
        $msgId.fadeOut($msgAnimateTime, function () {
            $(this).text($msgText).fadeIn($msgAnimateTime);
        });
    }

    function msgChange($divTag, $iconTag, $textTag, $divClass, $iconClass, $msgText) {
        var $msgOld = $divTag.text();
        msgFade($textTag, $msgText);
        $divTag.addClass($divClass);
        $iconTag.removeClass("glyphicon-chevron-right");
        $iconTag.addClass($iconClass + " " + $divClass);
        setTimeout(function () {
            msgFade($textTag, $msgOld);
            $divTag.removeClass($divClass);
            $iconTag.addClass("glyphicon-chevron-right");
            $iconTag.removeClass($iconClass + " " + $divClass);
        }, $msgShowTime);
    }
});