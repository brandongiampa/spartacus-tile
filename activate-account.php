<?php session_start(); ?>
<?php include_once 'php/db.php';?>

<?php include_once 'inc/head.php';?>

<div class="index">
  <?php include_once 'inc/navbar.php';?>
</div>
<script>
  isIndex = false;
  scrollTop = 0;
</script>

<main class="non-index bg-white" id="account-created-page">
    <?php

    if(!isset($_GET['vkey'])){
        $output = '';
        $output.='<div class="header-sm">';
            $output.='<h1>There has been a problem (account not found)</h1>';
        $output.='</div>';
        $output.='<div class="container">';
            $output.='<p>Please take another look at the link you have clicked.</p>';
        $output.='</div>';
        echo $output;
    }
    else {
        $vkey = $_GET['vkey'];
        $db = new Database();
        $db->connect();

        if($db->checkVkey($vkey)){
            $db->activateAccount($vkey);

            $output = '';
            $output.='<div class="header-sm">';
                $output.='<h1>Your Account has been Activated!</h1>';
            $output.='</div>';
            $output.='<div class="container">';
                $output.='<a href="login.php">Log In</a>';
            $output.='</div>';
            echo $output;
        }
        else {
            $output = '';
            $output.='<div class="header-sm">';
                $output.='<h1>There has been a problem (incorrect acct info)</h1>';
            $output.='</div>';
            $output.='<div class="container">';
                $output.='<p>Please take another look at the link you have clicked.</p>';
            $output.='</div>';
            echo $output;
        }
    }
    ?>
</main>
<?php include_once 'inc/foot.php'; ?>
