<?php
include_once('class/class.manageUsers.php');
$datetime = date_create()->format('Y-m-d H:i:s');
//error_reporting(0);
$users = new ManageUsers();

$username = $_GET['username'];
$server = "http://mlm";

$data = $users->GetUserInfo($username);
$firstName = $data[0]["firstName"];
$lastName = $data[0]["lastName"];
$username = $data[0]["username"];
$fullName = "".$firstName." ".$lastName."";
$leftDownline = $data[0]["leftDownline"];
$rightDownline = $data[0]["rightDownline"];

$a = $users->GetUserInfo($leftDownline);
$afirstName = $a[0]["firstName"];
$alastName = $a[0]["lastName"];
$aUsername = $a[0]["username"];
$aDownlineLeft = $a[0]["leftDownline"];
$aDownlineRight = $a[0]["rightDownline"];
$aFullName = "".$afirstName." ".$alastName."";

var_dump($rightDownline);


$b = $users->GetUserInfo($rightDownline);
$bfirstName = $b[0]["firstName"];
$blastName = $b[0]["lastName"];
$bUserName = $b[0]["username"];
$bDownlineLeft = $b[0]["leftDownline"];
$bDownlineRight = $b[0]["rightDownline"];
$bFullName = "".$bfirstName." ".$blastName."";





?>

 

<!DOCTYPE html>
<html lang="en">

<head>
    <meta name="robots" content="noindex, follow">
    <link rel="stylesheet" href="assets/css/styles.css">
    <link rel="stylesheet" href="assets/vendor/jquery-orgchart/orgchart.css">
    <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Roboto:300,400,500,300italic">
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
</head>

<body style="opacity: 1;">
    <div class="genealogy-actions">
        <ul class="list-unstyled">
            <li class="title">Legend:</li>
            <li class="active">Active</li>
            <li class="onhold">Onhold</li>
            <li class="inactive">Inactive</li>
        </ul>
    </div>
    <input type="button" class="pull-right" value="Back" onclick="history.back()">

    <!--    
        <?php if($leftDownline === null) : ?>
            HTML HERE
         <?php elseif($leftDownline) : ?>
            HTML HERE
        <?php else : ?>
            even more html
        <?php endif; ?>

        <ul>
            <li class="">
                <div class="midtext-table">
                    <div class="midtext-cell"><span class="status empty">0</span>Empty</div>
                </div>
            </li>
            <li class="">
                <div class="midtext-table">
                    <div class="midtext-cell"><span class="status empty">0</span>Empty</div>
                </div>
            </li>
        </ul>
    -->

    <div id="genealogy" class="hidden">
        <ul>
            <li>
                <div class="midtext-table">
<div class="midtext-cell"><a href="<?php echo "".$server."/geneology.php?username=".$username.""; ?>" class="status active "><span><?php echo $username;?></span><?php echo "(".$fullName.")";?></a></div>
                </div>
                    <ul>

                        <?php if($leftDownline == NULL && $rightDownline == NULL) : ?>
                            <li class="">
                                <div class="midtext-table">
                                       <div class="midtext-cell"><span class="status empty">0</span>Empty</div>
                                </div>
                            </li>
                            <li class="">
                                <div class="midtext-table">
                                    <div class="midtext-cell"><span class="status empty">0</span>Empty</div>
                                </div>
                            </li>
                        <?php elseif($leftDownline == NULL && $rightDownline):?>  
                            <li class="">
                                <div class="midtext-table">
                                    <div class="midtext-cell"><span class="status empty">0</span>Empty</div>
                                </div>
                            </li>
                            <li class="">
                                <div class="midtext-table">
                                    <div class="midtext-table">
<div class="midtext-cell"><a href="<?php echo "".$server."/geneology.php?username=".$bUserName.""; ?>" class="status active "><span><?php echo $bUserName;?></span><?php echo "(".$bFullName.")";?></a></div>
                                </div>
                                </div>
                            </li>
                        <?php elseif($leftDownline && $rightDownline == NULL):?>
                            <li class="">
                                <div class="midtext-table">
                                    <div class="midtext-table">
<div class="midtext-cell"><a href="<?php echo "".$server."/geneology.php?username=".$aUsername.""; ?>" class="status active "><span><?php echo $aUsername;?></span><?php echo "(".$aFullName.")";?></a></div>
                                </div>
                            </li>
                            <li class="">
                                <div class="midtext-table">
                                    <div class="midtext-cell"><span class="status empty">0</span>Empty</div>
                                </div>
                            </li>

                        <?php elseif($rightDownline == NULL && $leftDownline):?>
                            <li class="">
                                <div class="midtext-table">
                                    <div class="midtext-cell"><span class="status empty">0</span>Empty</div>
                                </div>
                            </li>
                            <li class="">
                                <div class="midtext-table">
                                    <div class="midtext-cell"><span class="status empty">0</span>Empty</div>
                                </div>
                            </li>
                        <?php else : ?>
                            <ul>
                            <li class="">
                                <div class="midtext-table">
                                    <div class="midtext-table">
<div class="midtext-cell"><a href="<?php echo "".$server."/geneology.php?username=".$aUsername.""; ?>" class="status active "><span><?php echo $aUsername;?></span><?php echo "(".$aFullName.")";?></a></div>
                                </div>
                            </li>
                            <li class="">
                                <div class="midtext-table">
                                    <div class="midtext-table">
<div class="midtext-cell"><a href="<?php echo "".$server."/geneology.php?username=".$bUserName.""; ?>" class="status active "><span><?php echo $bUserName;?></span><?php echo "(".$bFullName.")";?></a></div>
                                </div>
                            </li>
                            <ul>
                        <?php endif; ?>

                        
                    </ul>
            </li>
        </ul>
    </div>
    <div id="genealogy_append" data-id="21052">
    </div>
</body>
<script type="text/javascript" src="assets/js/jquery.min.js"></script>
<script type="text/javascript" src="assets/vendor/jquery-orgchart/jquery.orgchart.min.js"></script>
<script type="text/javascript">
(function($) {
    $(function() {
        $('#genealogy > ul').orgChart({
            container: $('#genealogy_append')
        });

        $('.node').hover(function() {
            $(this).closest('table').addClass('node-hover');
        }, function() {
            $(this).closest('table').removeClass('node-hover');
        });
    });
})(jQuery);
</script>

</html>