<?php
require('require/top.php');
authorise_user2();
user_vfd_efd2($con);
$id = $_SESSION['USER_ID'];
$gui = mysqli_fetch_assoc(mysqli_query($con, "select * from users where id='$id'"));
?>
<div class="path">
    <div class="container">
        <a href="index.php">الرئيسية</a>
        /
        <a href="verify_ME.php">التحقق</a>
    </div>
</div>
<section class="newaddress">
    <section class="myac-body">
        <div class="flex row flex-center">
            <div class="right">
                <h4><i class="uil uil-location-point"></i>التحقق من الهاتف المحمول والبريد الإلكتروني</h4>
                <div class="col-lg-12 col-md-12">
                    <div class="pdpt-bg">
                        <div class="pdpt-title">
                            <h4>الهاتف المحمول</h4>
                        </div>
                        <div class="formbody">
                            <form action="javascript:void(0)">
                                <div class="address-fieldset">
                                    <div class="row">
                                        <label for="ft">رقم الهاتف</label>
                                        <input type="number" placeholder="رقم الهاتف المحمول" id="verify_mobile" value="<?php echo $gui['mobile'] ?>" oninput="validate_number2()" />
                                        <label for="ft" id="verifymobile_otp_label" style="display:none;">OTP</label>
                                        <input type="text" placeholder="أدخل رمز التحقق" id="verifymobile_otp" style="display:none;" />
                                        <div class="row2">
                                            <?php
                                            if (!is_mobile_verified($con)) {
                                            ?>
                                                <button class="save-address" onclick="mobile_sent_otp()" id="mobile-sent_otp">
                                                    إرسال رمز التحقق
                                                </button>
                                            <?php } else {
                                            ?>
                                                <button class="save-address" id="mobile-sent_otp">
                                                    تم التحقق
                                                </button>
                                            <?php
                                            } ?>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-lg-12 col-md-12">
                    <div class="pdpt-bg">
                        <div class="pdpt-title">
                            <h4>البريد الإلكتروني</h4>
                        </div>
                        <div class="formbody">
                            <form action="javascript:void(0)">
                                <div class="address-fieldset">
                                    <div class="row">
                                        <label for="ft">البريد الإلكتروني</label>
                                        <input type="email" placeholder="عنوان البريد الإلكتروني" id="verify_email" value="<?php echo $gui['email'] ?>" />
                                        <label for="ft" id="verifyemail_otp_label" style="display:none;">OTP</label>
                                        <input type="text" placeholder="أدخل رمز التحقق" id="verifyemail_otp" style="display:none;" />
                                        <div class="row2">
                                            <?php
                                            if (!is_email_verified($con)) {
                                            ?>
                                                <button class="save-address" onclick="email_sent_otp()" id="email-sent_otp">
                                                    إرسال رمز التحقق
                                                </button>
                                            <?php } else {
                                            ?>
                                                <button class="save-address" id="email-sent_otp">
                                                    تم التحقق
                                                </button>
                                            <?php
                                            } ?>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</section>
<?php require('require/foot.php'); ?>
<?php require('require/last.php'); ?>
