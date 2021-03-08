<?php if ($uid == false || '') : ?>
    <li class='log'><a href="/login/" class='hlink'>Login</a></li>
<?php else : ?>
    <li class='log'><a href="/login/logout.php" class='hlink'>Logout</a></li>
<?php endif; ?>
<li class='account_img'>
    <a href="/mypage/">
        <?php if ($uid) { ?>
            <?php if ($aimg === null) : ?>
                <img src="/images/account3.png" class='aimg' alt="">
            <?php else : ?>
                <img src="/upload/<?= $aimg; ?>" class='aimg' alt="">
            <?php endif; ?>
        <?php } ?>
    </a>
</li>