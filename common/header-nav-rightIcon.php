<?php if ($uid == false || '') : ?>
    <li class='log'><a href="/src/View/login.php" class='hlink'>Login</a></li>
<?php else : ?>
    <li class='log'><a href="/src/View/logout.php" class='hlink'>Logout</a></li>
<?php endif; ?>
<li class='account_img'>
    <a href="/src/View/mypage.php">
        <?php if ($uid) { ?>
            <?php if ($aimg === null) : ?>
                <img src="/public/images/account3.png" class='aimg' alt="">
            <?php else : ?>
                <img src="/public/upload/<?= $aimg; ?>" class='aimg' alt="">
            <?php endif; ?>
        <?php } ?>
    </a>
</li>