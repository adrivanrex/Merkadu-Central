<?php
include_once('class/class.manageUsers.php');
$datetime = date_create()->format('Y-m-d H:i:s');
//error_reporting(0);
$users = new ManageUsers();

$username = $_GET['username'];

$data = $users->GetUserInfo($username);
$firstName = $data[0]["firstName"];
$lastName = $data[0]["lastName"];
$username = $data[0]["username"];
$fullName = "".$firstName." ".$lastName."";
$leftDownline = $data[0]["leftDownline"];
$leftDownlineA = $leftDownline;
$rightDownlineA = $data[0]["rightDownline"];

$rightMatrix = $users->GetUserInfo($rightDownlineA);
$rightMatrixfirstName = $rightMatrix[0]["firstName"];
$rightMatrixLastName = $rightMatrix[0]["lastName"];
$rightMatrixUsername = $rightMatrix[0]["username"];
$rightMatrixDownlineLeft = $rightMatrix[0]["leftDownline"];
$rightMatrixDownlineRight = $rightMatrix[0]["rightDownline"];
$rightMatrixFullName = "".$rightMatrixfirstName." ".$rightMatrixLastName.""; 



$leftMatrix = $users->GetUserInfo($leftDownlineA);
$rightDownline = $data[0]["rightDownline"];
$rightDownlineA = $rightDownline;



$leftMatrixfirstName = $leftMatrix[0]["firstName"];
$leftMatrixLastName = $leftMatrix[0]["lastName"];
$leftMatrixUsername = $leftMatrix[0]["username"];
$leftMatrixDownlineLeft = $leftMatrix[0]["leftDownline"];
$leftMatrixDownlineRight = $leftMatrix[0]["rightDownline"];
$leftMatrixFullName = "".$leftMatrixfirstName." ".$leftMatrixLastName."";


$thirdMatrixRight = $users->GetUserInfo($leftMatrixDownlineRight);
$thirdMatrixRightfirstName = $thirdMatrixRight[0]["firstName"];
$thirdMatrixRightLastName = $thirdMatrixRight[0]["lastName"];
$thirdMatrixRightDownlineLeft = $thirdMatrixRight[0]["leftDownline"];
$thirdMatrixRightUsername = $thirdMatrixRight[0]["username"];
$thirdMatrixRightDownlineRight = $thirdMatrixRight[0]["rightDownline"];
$thirdMatrixRightFullName = "".$thirdMatrixRightfirstName." ".$thirdMatrixRightLastName."";
var_dump($thirdMatrixRightDownlineRight);

$thirdMatrixRightRigth = $users->GetUserInfo($thirdMatrixRightDownlineRight);
$thirdMatrixRightRigthfirstName = $thirdMatrixRightRigth[0]["firstName"];
$thirdMatrixRightRigthLastName = $thirdMatrixRightRigth[0]["lastName"];
$thirdMatrixRightRigthDownlineLeft = $thirdMatrixRightRigth[0]["leftDownline"];
$thirdMatrixRightRigthDownlineRight = $thirdMatrixRightRigth[0]["rightDownline"];
$thirdMatrixRightRigthFullName = "".$thirdMatrixRightRigthfirstName." ".$thirdMatrixRightRigthLastName."";
$thirdMatrixRightRigthUsername = $thirdMatrixRightRigth[0]["username"];

$thirdMatrixRightDownlineLeft = $users->GetUserInfo($thirdMatrixRightDownlineLeft);
$thirdMatrixRightDownlineLeftfirstName = $thirdMatrixRightDownlineLeft[0]["firstName"];
$thirdMatrixRightDownlineLeftLastName = $thirdMatrixRightDownlineLeft[0]["lastName"];
$thirdMatrixRightDownlineLeftDownlineLeft = $thirdMatrixRightDownlineLeftfirstName[0]["leftDownline"];
$thirdMatrixRightDownlineLeftDownlineRight = $thirdMatrixRightDownlineLeft[0]["rightDownline"];
$thirdMatrixRightDownlineLeftFullName = "".$thirdMatrixRightDownlineLeftfirstName." ".$thirdMatrixRightDownlineLeftLastName."";
$thirdMatrixRightDownlineLeftUsername = $thirdMatrixRightDownlineLeft[0]["username"];


$server = "http://mlm";
$secondMatrixLeftDownlineLeft = $users->GetUserInfo($leftMatrix);
$secondMatrixLeftDownlineLeftfirstName = $secondMatrixLeftDownlineLeft[0]["firstName"];
$secondMatrixLeftDownlineLeftLastName = $secondMatrixLeftDownlineLeft[0]["lastName"];
$secondMatrixLeftDownlineLeftUsername = $secondMatrixLeftDownlineLeft[0]["username"];
$secondMatrixLeftDownlineLeftLeftDownline = $secondMatrixLeftDownlineLeft[0]["leftDownline"];
$secondMatrixLeftDownlineLeftRightDownline = $secondMatrixLeftDownlineLeft[0]["rightDownline"];
$secondMatrixLeftDownlineLeftFullName = "".$secondMatrixLeftDownlineLeftfirstName." ".$secondMatrixLeftDownlineLeftLastName."";

$secondMatrixLeftDownlineRight = $users->GetUserInfo($leftMatrixDownlineLeft);
$secondMatrixLeftDownlineRightfirstName = $secondMatrixLeftDownlineRight[0]["firstName"];
$secondMatrixLeftDownlineRightLastName = $secondMatrixLeftDownlineRight[0]["lastName"];
$secondMatrixLeftDownlineRightUsername = $secondMatrixLeftDownlineRight[0]["username"];
$secondMatrixLeftDownlineRightDownlineLeft = $secondMatrixLeftDownlineRight[0]["leftDownline"];
$secondMatrixLeftDownlineRightDownlineRight = $secondMatrixLeftDownlineRight[0]["rightDownline"];
$secondMatrixLeftDownlineRightFullName = "".$secondMatrixLeftDownlineRightfirstName." ".$secondMatrixLeftDownlineRightLastName."";

$secondMatrixLeftDownlineLeftDownlineRight = $users->GetUserInfo($leftMatrixDownlineRight);
$secondMatrixLeftDownlineLeftDownlineRightfirstName = $secondMatrixLeftDownlineLeftDownlineRight[0]["firstName"];
$secondMatrixLeftDownlineLeftDownlineRightLastName = $secondMatrixLeftDownlineLeftDownlineRight[0]["lastName"];
$secondMatrixLeftDownlineLeftDownlineRightUsername = $secondMatrixLeftDownlineLeftDownlineRight[0]["username"];
$secondMatrixLeftDownlineLeftDownlineRightDownlineLeft = $secondMatrixLeftDownlineLeftDownlineRight[0]["leftDownline"];
$secondMatrixLeftDownlineLeftDownlineRightDownlineRight = $secondMatrixLeftDownlineLeftDownlineRight[0]["rightDownline"];

$secondMatrixLeftDownlineLeftDownlineRightFullName = "".$$secondMatrixLeftDownlineLeftDownlineRightfirstName." ".$secondMatrixLeftDownlineLeftDownlineRightLastName.""; 

$thirdMatrixLeftDownlineLeft = $secondMatrixLeftDownlineRightDownlineLeft;
$thirdMatrixRightRight = $users->GetUserInfo($secondMatrixLeftDownlineLeftDownlineRightDownlineLeft);
$thirdMatrixRightRigthfirstName = $thirdMatrixRightRight[0]["firstName"];
$thirdMatrixRightRigthLastName = $thirdMatrixRightRight[0]["lastName"];
$thirdMatrixRightRightUsername = $thirdMatrixRightRight[0]["username"];
$thirdMatrixRightRightDownlineLeft = $thirdMatrixRightRight[0]["leftDownline"];
$thirdMatrixRightRigthDownlineRight = $thirdMatrixRightRight[0]["rightDownline"];
$thirdMatrixRightRigthFullName = "".$thirdMatrixRightRigthfirstName." ".$thirdMatrixRightRigthLastName."";

var_dump($thirdMatrixRightRight);

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

    <div id="genealogy" class="hidden">
        <ul>
            <li class="">
                <div class="midtext-table">
                    <div class="midtext-cell"><a href="<?php echo "".$server."/geneology.php?username=".$username.""; ?>" class="status active "><span><?php echo $username;?></span><?php echo "(".$fullName.")";?></a></div>
                </div>
                <ul>
                    <li class="">
                        <!--
                        <?php if($leftDownline === null) : ?>
                            HTML HERE
                         <?php elseif($leftDownline) : ?>
                            HTML HERE
                        <?php else : ?>
                            even more html
                        <?php endif; ?>
                        -->
                        <?php if($leftDownline === null) : ?>
                            <div class="midtext-table">
                            <div class="midtext-cell"><span class="status empty">0</span>Empty</div>
                             </div>
                        <?php elseif($leftDownline) : ?>
                            <div class="midtext-table">
                                    <div class="midtext-cell"><a href="<?php echo "".$server."/geneology.php?username=".$leftMatrixUsername.""; ?>"  class="status active "><span><?php echo $leftMatrixUsername;?></span><?php echo "(".$leftMatrixFullName.")"?></a></div>
                                </div>


                                <?php if($leftDownline === null) : ?>
                                    <div class="midtext-table">
                                    <div class="midtext-cell"><span class="status empty">0</span>Empty</div>
                                     </div>
                                <?php elseif($leftDownline) : ?>
                                        <ul>   
                                                <?php if($leftDownline === null) : ?>
                                                    HTML HERE
                                                 <?php elseif($leftDownline) : ?>
                                                    HTML HERE
                                                <?php else : ?>
                                                    even more html
                                                <?php endif; ?>
                                                

                                            <?php if($secondMatrixLeftDownlineLeftUsername === null) : ?>

                                                <?php if($secondMatrixLeftDownlineRightUsername === null) : ?>
                                                    <li class="">
                                                    <div class="midtext-table">
                                                        <div class="midtext-cell"><span class="status empty">0</span>Empty</div>
                                                    </div>
                                                </li>
                                                 <?php elseif($leftDownline) : ?>
                                                    <li class="">
                                                    <div class="midtext-cell"><a href="<?php echo "".$server."/geneology.php?username=".$secondMatrixLeftDownlineLeftUsername.""; ?>"  class="status active "><span><?php echo $secondMatrixLeftDownlineRightUsername;?></span><?php echo "(".$secondMatrixLeftDownlineRightFullName.")"?></a></div>
                                                </li>
                                                <?php if($thirdMatrixRightUsername === null) : ?>
                                                    
                                                    <li class="">
                                                        
                                                        <div class="midtext-table">
                                                            <div class="midtext-cell"><span class="status empty">0</span>Empty</div>
                                                        </div>
                                                    </li>
                                                 <?php elseif($thirdMatrixRightUsername) : ?>
                                                    <li class="">
                                                    <div class="midtext-cell"><a href="<?php echo "".$server."/geneology.php?username=".$thirdMatrixRightUsername.""; ?>"  class="status active "><span><?php echo $thirdMatrixRightUsername;?></span><?php echo "(".$thirdMatrixRightFullName.")"?></a></div>
                                                    
                                                    <ul>

                                                        <?php if($thirdMatrixRightDownlineLeftUsername === null) : ?>
                                                            <li class="">
                                                        
                                                            <div class="midtext-table">
                                                                <div class="midtext-cell"><span class="status empty">0</span>Empty</div>
                                                            </div>
                                                        </li>
                                                         <?php elseif($thirdMatrixRightDownlineLeftUsername) : ?>
                                                            <li>
                                                            <div class="midtext-cell"><a href="<?php echo "".$server."/geneology.php?username=".$thirdMatrixRightDownlineLeftUsername.""; ?>"  class="status active "><span><?php echo $thirdMatrixRightDownlineLeftUsername;?></span><?php echo "(".$thirdMatrixRightDownlineLeftFullName.")"?></a></div>
                                                        </li>
                                                        <?php else : ?>
                                                            even more html
                                                        <?php endif; ?>
                                                        
                                                        <?php if($thirdMatrixRightRigthUsername === null) : ?>
                                                            <li class="">
                                                        
                                                            <div class="midtext-table">
                                                                <div class="midtext-cell"><span class="status empty">0</span>Empty</div>
                                                            </div>
                                                            </li>

                                                         <?php elseif($thirdMatrixRightRigthUsername) : ?>
                                                            <li>
                                                                <div class="midtext-cell"><a href="<?php echo "".$server."/geneology.php?username=".$thirdMatrixRightRightUsername.""; ?>"  class="status active "><span><?php echo $thirdMatrixRightRightUsername;?></span><?php echo "(".$thirdMatrixRightRigthFullName.")"?></a></div>
                                                            </li>
                                                        <?php else : ?>
                                                            even more html
                                                        <?php endif; ?>

                                                        
                                                        

                                                    </ul>
                                                </li>
                                                <?php else : ?>
                                                    even more html
                                                <?php endif; ?>


                                                <?php else : ?>
                                                    even more html
                                                <?php endif; ?>

                                                <?php if($secondMatrixLeftDownlineRightUsername === null) : ?>
                                                    <li class="">
                                                    <div class="midtext-table">
                                                        <div class="midtext-cell"><span class="status empty">0</span>Empty</div>
                                                    </div>
                                                </li>
                                                 <?php elseif($leftDownline) : ?>
                                                    HTML HERE
                                                <?php else : ?>
                                                    even more html
                                                <?php endif; ?>

                                                

                                                
                                                
                                             <?php elseif($secondMatrixLeftDownlineLeftUsername) : ?>
                                                    <li class="">
                                                    <div class="midtext-cell"><a href="<?php echo "".$server."/geneology.php?username=".$secondMatrixLeftDownlineLeftUsername.""; ?>"  class="status active "><span><?php echo $secondMatrixLeftDownlineLeftUsername;?></span><?php echo "(".$secondMatrixLeftDownlineLeftFullName.")"?></a></div>
                                                </li>
                                                
                                                
                                            <?php else : ?>
                                                even more html
                                            <?php endif; ?>
                                        
                                        
                                    </ul>

                                <?php else : ?>
                                    even more html
                                <?php endif; ?>
                                
                        <?php else : ?>
                            even more html
                        <?php endif; ?>  
                        <?php
                        $secondMatrixDownlineLeft = null;
                        $secondMatrixDownlineRight = null;
                        ?>

                        
                            <!--    
                            
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
                        
                        
                    </li>
                    <li class="">
                        <?php if($rightDownline === null) : ?>
                            <div class="midtext-table">
                            <div class="midtext-cell"><span class="status empty">0</span>Empty</div>
                             </div>
                        <?php elseif($rightDownline) : ?>
                            <div class="midtext-table">
                                    <div class="midtext-cell"><a href="<?php echo "".$server."/geneology.php?username=".$rightMatrixUsername.""; ?>"" class="status active "><span><?php echo $rightMatrixUsername;?></span><?php echo "(".$rightMatrixFullName.")";?></a></div>
                                </div>

                        <?php else : ?>
                            even more html
                        <?php endif; ?>
                        <!--
                        <ul>
                            <li class="">
                                <div class="midtext-table">
                                    <div class="midtext-cell"><a href="http://www.ldbrpenzacta.com/account/ajax/genealogy/38132" class="status active "><span>0038132</span>Carmelito A. Biera</a></div>
                                </div>
                                <ul>
                                    <li class="">
                                        <div class="midtext-table">
                                            <div class="midtext-cell"><a href="http://www.ldbrpenzacta.com/account/ajax/genealogy/39983" class="status active "><span>0039983</span>Emie O. Serino<div class="arrow-down"></div></a></div>
                                        </div>
                                    </li>
                                    <li class="">
                                        <div class="midtext-table">
                                            <div class="midtext-cell"><span class="status empty">0</span>Empty</div>
                                        </div>
                                    </li>
                                </ul>
                            </li>
                            <li class="">
                                <div class="midtext-table">
                                    <div class="midtext-cell"><a href="http://www.ldbrpenzacta.com/account/ajax/genealogy/40430" class="status active "><span>0040430</span>Teofilo C Adrivan</a></div>
                                </div>
                                <ul>
                                    <li class="">
                                        <div class="midtext-table">
                                            <div class="midtext-cell"><a href="http://www.ldbrpenzacta.com/account/ajax/genealogy/44667" class="status active "><span>0044667</span>Freddie G Sacabin<div class="arrow-down"></div></a></div>
                                        </div>
                                    </li>
                                    <li class="">
                                        <div class="midtext-table">
                                            <div class="midtext-cell"><span class="status empty">0</span>Empty</div>
                                        </div>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                        -->
                    </li>
                </ul>
            </li>
        </ul>
    </div>
    <div id="genealogy_append" data-id="21052">
    </div>
</body>
<script type="text/javascript" src="http://www.ldbrpenzacta.com/assets/js/jquery.min.js"></script>
<script type="text/javascript" src="http://www.ldbrpenzacta.com/assets/vendor/jquery-orgchart/jquery.orgchart.min.js"></script>
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