<?php
require('require/top.php');
authorise_user2();
$sid = $_SESSION['USER_ID'];
$r = mysqli_fetch_assoc(mysqli_query($con, "select * from user_wallet where user_id='$sid'"));
$sr = mysqli_query($con, "select * from user_w_msg where u_id='$sid'");
?>
<div class="path">
    <div class="container">
        <a href="index.php">الرئيسية</a>
        /
        <a href="wallet.php">محفظتي</a>
    </div>
</div>
<section class="mywallet">
    <?php require('require/headbanner.php'); ?>
    <section class="myac-body">
        <div class="flex row">
            <?php require('require/ac-left.php'); ?>
            <div class="right">
                <h4><i class="uil uil-wallet"></i>محفظتي</h4>
                <div class="col-lg-12 col-md-12">
                    <div class="pdpt-bg2">
                        <div class="imgbox">
                            <img src="assets/images/money.svg" alt="">
                        </div>
                        <span class="rewrd-title">رصيدي</span>
                        <h4 class="cashbk-price"> ريال <?php echo $r['ballance']; ?></h4>
                    </div>
                    <div class="pdpt-bg">
                        <div class="pdpt-title">
                            <h4>التاريخ</h4>
                        </div>
                        <div class="order-body10">
                            <ul class="history-list">
                                <?php
                                while ($row = mysqli_fetch_assoc($sr)) {
                                ?>
                                    <li>
                                        <div class="purchase-history">
                                            <div class="purchase-history-left">
                                                <h4><?php
                                                    if ($row['cod'] == 1) {
                                                        echo "مُعتمد";
                                                    } else {
                                                        echo "مُخصَّر";
                                                    }
                                                    ?></h4>
                                                <p>الرسالة: <ins><?php echo $row['msg'] ?></ins></p>
                                                <span> <?php
                                                        echo $row['added_on'];
                                                        ?></span>
                                            </div>
                                            <div class="purchase-history-right">
                                                <span>
                                                    <?php
                                                    if ($row['cod'] == 1) {
                                                        echo "+";
                                                    } else {
                                                        echo "-";
                                                    }
                                                    echo " ريال " . $row['balance'];
                                                    ?>
                                                </span>

                                            </div>
                                        </div>
                                    </li>
                                <?php } ?>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</section>
<?php require('require/foot.php'); ?>
<?php require('require/last.php'); ?>
