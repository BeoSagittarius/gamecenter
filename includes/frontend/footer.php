<!-- Footer -->
<div class="footer">
    <div class="footer-middle">
        <div class="container">
            <div class="footer-middle-in">
                <h6><?= $lang['FOOTER_ABOUTUS']?></h6>
                <p style="text-align: justify">Posts and Telecommunications Institute of Technology - D11CNPM4 - Lê Ngọc Hoàn - Béo Sagittarius</p>
            </div>
            <div class="footer-middle-in">
                <h6><?= $lang['FOOTER_SOCIAL'] ?></h6>
                <ul>
                    <li><a href="#">Facebook</a></li>
                    <li><a href="#">Twitter</a></li>
                    <li><a href="#">Google+</a></li>
                </ul>
            </div>

            <div class="footer-middle-in">
                <h6><?= $lang['FOOTER_SERVICE'] ?></h6>
                <ul>
                    <li><a href="contact_us.php"><?= $lang['FOOTER_ContactUs'] ?></a></li>
                    <li><a href="contact_us.php"><?= $lang['FOOTER_MAP'] ?></a></li>
                </ul>
            </div>
            <div class="footer-middle-in">
                <h6><?= $lang['FOOTER_ACCOUNT'] ?></h6>
                <ul>
                    <?php if (isset($_SESSION['fullname'])) { ?>
                        <li><a href="#" >Hi, <?= $_SESSION['fullname'] ?></a></li>
                        <li><a href="#" role="button" data-toggle="modal" data-target="#profile-modal"><?= $lang['FOOTER_Profile'] ?></a></li>
                        <li><a href="logout.php"><?= $lang['FOOTER_LogOut'] ?></a></li>
                    <?php } else { ?>
                        <li><a href="#" >Hi, Anonymous!</a></li>
                        <li><a href="#" role="button" data-toggle="modal" data-target="#login-modal"><?= $lang['FOOTER_LogIn'] ?></a></li>
                    <?php } ?>
                </ul>
            </div>
            <div class="footer-middle-in">
                <h6><?= $lang['FOOTER_LANGUAGE'] ?></h6>
                <ul>
                    <li><a href="?lang=en"><?= $lang['FOOTER_Eng']?></a></li>
                    <li><a href="?lang=vi"><?= $lang['FOOTER_Viet']?></a></li>
                </ul>
            </div>
            <div class="clearfix"> </div>
        </div>
    </div>
    <!---------------------------- MODAL LOGIN POPUP [start] -------------------------->
    <div class="modal fade" id="login-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header" align="center">
                    <img class="img-circle" id="img_logo" src="../images/web/logo.png">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span class="glyphicon glyphicon-remove" aria-hidden="true"></span>
                    </button>
                </div>

                <!-- Begin # DIV Form -->
                <div id="div-forms">

                    <!-- Begin # Login Form -->
                    <form id="login-form" method="post">
                        <div class="modal-body">
                            <div id="div-login-msg">
                                <div id="icon-login-msg" class="glyphicon glyphicon-chevron-right"></div>
                                <span id="text-login-msg"><?= $lang['LOGIN_msg'] ?></span>
                            </div>
                            <input id="login_username" class="form-control" type="text" placeholder="<?= $lang['LOGIN_Username'] ?>">
                            <input id="login_password" class="form-control" type="password" placeholder="<?= $lang['LOGIN_Password'] ?>">
                        </div>
                        <div class="modal-footer">
                            <div>
                                <button type="submit" class="btn btn-success btn-lg btn-block"><?= $lang['FOOTER_LogIn'] ?></button>
                            </div>
                            <div>
                                <button id="login_lost_btn" type="button" class="btn btn-link"><?= $lang['LOGIN_ForgotPass'] ?>?</button>
                                <button id="login_register_btn" type="button" class="btn btn-link"><?= $lang['LOGIN_SignUp'] ?></button>
                            </div>
                        </div>
                    </form>
                    <!-- End # Login Form -->

                    <!-- Begin | Forgot Password Form -->
                    <form id="lost-form" style="display:none;" method="post">
                        <div class="modal-body">
                            <div id="div-lost-msg">
                                <div id="icon-lost-msg" class="glyphicon glyphicon-chevron-right"></div>
                                <span id="text-lost-msg"><?= $lang['FORGOT_Email'] ?></span>
                            </div>
                            <input id="lost_email" class="form-control" type="text" placeholder="E-Mail" >
                        </div>
                        <div class="modal-footer">
                            <div>
                                <button type="submit" class="btn btn-success btn-lg btn-block"><?= $lang['Send'] ?></button>
                            </div>
                            <div>
                                <button id="lost_login_btn" type="button" class="btn btn-link"><?= $lang['FOOTER_LogIn'] ?></button>
                                <button id="lost_register_btn" type="button" class="btn btn-link"><?= $lang['LOGIN_SignUp'] ?></button>
                            </div>
                        </div>
                    </form>
                    <!-- End | Forgot Password Form -->

                    <!-- Begin | Register Form -->
                    <form id="register-form" style="display:none;" method="post">
                        <div class="modal-body"  style="height: 350px">
                            <div id="div-register-msg">
                                <div id="icon-register-msg" class="glyphicon glyphicon-chevron-right"></div>
                                <span id="text-register-msg"><?= $lang['REG_msg'] ?></span>
                            </div>
                            <div style="width: 48%; padding-bottom: 10px; float: left"><input id="register_firstname" class="form-control" type="text" placeholder="<?= $lang['FIRST_NAME'] ?> " ></div>
                            <div style="width: 48%; margin-left: 12px; float: left"><input id="register_lastname" class="form-control" type="text" placeholder="<?= $lang['LAST_NAME'] ?> " ></div>

                            <input id="register_username" class="form-control" type="text" placeholder="<?= $lang['LOGIN_Username'] ?>">
                            <input id="register_password" class="form-control" type="password" placeholder="<?= $lang['LOGIN_Password'] ?>">
                            <input id="register_email" class="form-control" type="text" placeholder="<?= $lang['Email'] ?>">

                            <div style="width: 25%; margin-top: 10px; float: left; ">
                                <div class="form-group">
                                    <select class="form-control" name="day" id="day">
                                        <option value=''><?= $lang['DAY'] ?></option>
                                    <?php
                                        for($i=1; $i<=31; $i++) {
                                    ?>
                                        <option value='<?= $i ?>'><?= $i ?></option>
                                    <?php
                                        }
                                    ?>
                                    </select>
                                </div>
                            </div>
                            <div style="width: 30%; margin-top: 10px; float: left; margin-left: 5px ">
                                <div class="form-group">
                                    <select class="form-control" name="month" id="month">
                                        <option value=''><?= $lang['MONTH'] ?></option>
                                        <option value='1'>Jan</option>
                                        <option value='2'>Feb</option>
                                        <option value='3'>Mar</option>
                                        <option value='4'>Apr</option>
                                        <option value='5'>May</option>
                                        <option value='6'>June</option>
                                        <option value='7'>July</option>
                                        <option value='8'>Aug</option>
                                        <option value='9'>Sept</option>
                                        <option value='10'>Oct</option>
                                        <option value='11'>Nov</option>
                                        <option value='12'>Dec</option>
                                    </select>
                                </div>
                            </div>
                            <div style="padding-top: 10px; width: 40%; margin-left: 5px; float: left">
                                <div class="form-group">
                                    <select class="form-control" name="year" id="year">
                                        <option value=''><?= $lang['YEAR'] ?></option>
                                    <?php
                                        for($i=1905; $i<=2015; $i++) {
                                    ?>
                                        <option value='<?= $i ?>'><?= $i ?></option>
                                    <?php
                                        }
                                    ?>
                                    </select>
                                </div>
                            </div>
                            <div style="width: 40%; margin-top: 10px; float: left;">
                                <div class="form-group">
                                    <select class="form-control" name="gender" id="gender">
                                        <option value="Male"><?= $lang['Male'] ?></option>
                                        <option value="Female"><?= $lang['Female'] ?></option>
                                    </select>
                                </div>
                            </div>



                        </div>
                        <div class="modal-footer">
                            <div>
                                <button type="submit" class="btn btn-success btn-lg btn-block"><?= $lang['LOGIN_SignUp'] ?></button>
                            </div>
                            <div>
                                <button id="register_login_btn" type="button" class="btn btn-link"><?= $lang['FOOTER_LogIn'] ?></button>
                                <button id="register_lost_btn" type="button" class="btn btn-link"><?= $lang['LOGIN_ForgotPass']?></button>
                            </div>
                        </div>
                    </form>
                    <!-- End | Register Form -->

                </div>
                <!-- End # DIV Form -->

            </div>
        </div>
    </div>
    <!-- END # MODAL LOGIN -->
    <script type="text/javascript" src="/js/login_modal.js"></script>

<!---------------------------- PROFILE POPUP [start] -------------------------->
    <div class="modal fade" id="profile-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header" align="center">
                    <img class="img-circle" id="img_logo" src="../images/web/logo.png">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span class="glyphicon glyphicon-remove" aria-hidden="true"></span>
                    </button>
                </div>

                <!-- Begin # DIV Form -->
                <div id="div-forms-profile">

                    <!-- Begin # Profile Form -->
                    <form id="profile-form" >
                        <div class="modal-body">
                            <div id="div-login-msg">
                                <div id="icon-login-msg" class="glyphicon glyphicon-chevron-right"></div>
                                <span id="text-login-msg">Welcome to Game Magazine</span>
                            </div>
                            <?php if(isset($user)):?>
                            <br>
                            <label class="col-xs-5"><?= $lang['FULLNAME']?> :</label> <label><?= $user['fullname'] ?></label><br>
                            <label class="col-xs-5"><?= $lang['LOGIN_Username']?> :</label> <label><?= $user['username'] ?></label><br>
                            <label class="col-xs-5"><?= $lang['Email']?> :</label> <label><?= $user['email'] ?></label><br>
                            <label class="col-xs-5"><?= $lang['Gender']?> :</label> <label><?= $user['gender'] ?></label><br>
                            <label class="col-xs-5"><?= $lang['Date_Of_Birth'] ?> :</label> <label><?= date('Y-m-d', strtotime($user['date_of_birth'])) ?></label><br>
                            <label class="col-xs-5"><?= $lang['Website']?> :</label> <label><?= $user['website'] ?></label><br>
                            <label class="col-xs-5"><?= $lang['Bio']?> :</label> <label><?= $user['bio'] ?></label><br>
                            <?php
                                endif;
                            ?>
                            </div>
                        <div class="modal-footer">

                            <div>
                                <button id="profile_update_btn" type="button" class="btn btn-link"><?= $lang['Update_Profile']?></button>
                                <button id="profile_changepass_btn" type="button" class="btn btn-link"><?= $lang['Change_pass']?></button>
                            </div>
                        </div>
                    </form>
                    <!-- End # Profile Form -->

                    <!-- Begin | Update Profile Form -->
                    <form id="update-form" style="display:none;" method="post">
                        <div class="modal-body">
                            <div id="div-update-msg">
                                <div id="icon-update-msg" class="glyphicon glyphicon-chevron-right"></div>
                                <span id="text-update-msg"><?= $lang['UPD_msg']?></span>
                            </div>
                            <div style="width: 48%; padding-bottom: 10px; float: left"><input id="change_firstname" class="form-control" type="text" value="<?php if(isset($user['first_name'])) echo $user['first_name'] ?>" placeholder="<?= $lang['FIRST_NAME'] ?> " ></div>
                            <div style="width: 48%; margin-left: 12px; float: left"><input id="change_lastname" class="form-control" type="text" value="<?php if(isset($user['last_name'])) echo $user['last_name'] ?>" placeholder="<?= $lang['LAST_NAME'] ?>  " ></div>
                            <input id="change_website" class="form-control" type="text" value="<?php if(isset($user['website'])) echo $user['website'] ?>" placeholder="<?= $lang['Website'] ?>">
                            <input id="change_bio" class="form-control" type="text" value="<?php if(isset($user['bio'])) echo $user['bio'] ?>" placeholder="<?= $lang['Bio']?>">

                            <div style="width: 25%; margin-top: 10px; float: left; ">
                                <div class="form-group">
                                    <select class="form-control" name="changeday" id="changeday">
                                        <option value=''><?= $lang['DAY'] ?></option>
                                    <?php
                                        for($i=1; $i<=31; $i++) {
                                    ?>
                                        <option value='<?= $i ?>'><?= $i ?></option>
                                    <?php
                                        }
                                    ?>
                                    </select>
                                </div>
                            </div>
                            <div style="width: 30%; margin-top: 10px; float: left; margin-left: 5px ">
                                <div class="form-group">
                                    <select class="form-control" name="changemonth" id="changemonth">
                                        <option value=''><?= $lang['MONTH'] ?></option>
                                        <option value='1'>Jan</option>
                                        <option value='2'>Feb</option>
                                        <option value='3'>Mar</option>
                                        <option value='4'>Apr</option>
                                        <option value='5'>May</option>
                                        <option value='6'>June</option>
                                        <option value='7'>July</option>
                                        <option value='8'>Aug</option>
                                        <option value='9'>Sept</option>
                                        <option value='10'>Oct</option>
                                        <option value='11'>Nov</option>
                                        <option value='12'>Dec</option>
                                    </select>
                                </div>
                            </div>
                            <div style="padding-top: 10px; width: 40%; margin-left: 5px; float: left">
                                <div class="form-group">
                                    <select class="form-control" name="changeyear" id="changeyear">
                                        <option value=''><?= $lang['YEAR'] ?></option>
                                    <?php
                                        for($i=1905; $i<=2015; $i++) {
                                    ?>
                                        <option value='<?= $i ?>'><?= $i ?></option>
                                    <?php
                                        }
                                    ?>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <div>
                                <button type="submit" class="btn btn-success btn-lg btn-block"><?= $lang['Send']?></button>
                            </div>
                            <div>
                                <button id="update_view_btn" type="button" class="btn btn-link"><?= $lang['Profile'] ?></button>
                                <button id="update_changepass_btn" type="button" class="btn btn-link"><?= $lang['Change_Pass']?></button>
                            </div>
                        </div>
                    </form>
                    <!-- End | Update Profile  Form -->

                    <!-- Begin | Change Password Form -->
                    <form id="changepass-form" style="display:none;" method="post">
                        <div class="modal-body">
                            <div id="div-change-msg">
                                <div id="icon-change-msg" class="glyphicon glyphicon-chevron-right"></div>
                                <span id="text-change-msg"><?= $lang['Change_msg']?></span>
                            </div>
                            <input id="old_pass" class="form-control" type="text" placeholder="<?= $lang['old_pass']?>" >
                            <input id="new_pass" class="form-control" type="text" placeholder="<?= $lang['new_pass']?>" >
                            <input id="renew_pass" class="form-control" type="text" placeholder="<?= $lang['re_pass']?>" >
                        </div>
                        <div class="modal-footer">
                            <div>
                                <button type="submit" class="btn btn-success btn-lg btn-block"><?= $lang['Change']?></button>
                            </div>
                            <div>
                                <button id="changepass_view_btn" type="button" class="btn btn-link"><?= $lang['Profile'] ?></button>
                                <button id="changepass_update_btn" type="button" class="btn btn-link"><?= $lang['Update_Profile']?></button>
                            </div>
                        </div>
                    </form>
                    <!-- End | Change Password Form -->

                </div>
                <!-- End # DIV Form -->

            </div>
        </div>
    </div>
    <!-- END # MODAL LOGIN -->
    <script type="text/javascript" src="/js/profile_modal.js"></script>

    <p class="footer-class">
        Copyright © 2015 - Game Magazine. All rights reserved<br>
        Design by  <a href="http://facebook.com/beo.sagittarius.93" target="_blank">Béo Sagitarius</a>
    </p>

    <!-------------------------------- onTop Button -------------------------------->
    <div id="goTop">
        <script type="text/javascript">
            $(function () {
                $(window).scroll(function () {
                    if ($(this).scrollTop() > 100)
                        $('#goTop').fadeIn();
                    else
                        $('#goTop').fadeOut();
                });
                $('#goTop').click(function () {
                    $('body,html').animate({scrollTop: 0}, 'slow');
                });
            });
        </script>
    </div>

    <!-------------------------------- onTop Button -------------------------------->
</div>
</body>
</html>