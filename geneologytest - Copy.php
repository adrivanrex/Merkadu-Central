<?php
include_once('class/class.manageUsers.php');
$datetime = date_create()->format('Y-m-d H:i:s');
//error_reporting(0);
$users = new ManageUsers();

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
$aUserName = $a[0]["username"];
$aDownlineLeft = $a[0]["leftDownline"];
$aDownlineRight = $a[0]["rightDownline"];
$aFullName = "".$afirstName." ".$alastName."";

$d = $users->GetUserInfo($aDownlineRight);
$dfirstName = $d[0]["firstName"];
$dlastName = $d[0]["lastName"];
$dUserName = $d[0]["username"];
$dDownlineLeft = $d[0]["leftDownline"];
$dDownlineRight = $d[0]["rightDownline"];
$dFullName = "".$dfirstName." ".$dlastName."";


$b = $users->GetUserInfo($rightDownline);
$bfirstName = $b[0]["firstName"];
$blastName = $b[0]["lastName"];
$bUserName = $b[0]["username"];
$bDownlineLeft = $b[0]["leftDownline"];
$bDownlineRight = $b[0]["rightDownline"];
$bFullName = "".$bfirstName." ".$blastName."";

$c = $users->GetUserInfo($aDownlineLeft);
$cfirstName = $c[0]["firstName"];
$clastName = $c[0]["lastName"];
$cUserName = $c[0]["username"];
$cDownlineLeft = $c[0]["leftDownline"];
$cDownlineRight = $c[0]["rightDownline"];
$cFullName = "".$cfirstName." ".$clastName."";

$g = $users->GetUserInfo($cDownlineLeft);
$gfirstName = $g[0]["firstName"];
$glastName = $g[0]["lastName"];
$gUserName = $g[0]["username"];
$gDownlineLeft = $g[0]["leftDownline"];
$gDownlineRight = $g[0]["rightDownline"];
$gFullName = "".$gfirstName." ".$glastName."";

$h = $users->GetUserInfo($cDownlineRight);
$hfirstName = $h[0]["firstName"];
$hlastName = $h[0]["lastName"];
$hUserName = $h[0]["username"];
$hDownlineLeft = $h[0]["leftDownline"];
$hDownlineRight = $h[0]["rightDownline"];
$hFullName = "".$hfirstName." ".$hlastName."";

$i = $users->GetUserInfo($dDownlineLeft);
$ifirstName = $i[0]["firstName"];
$ilastName = $i[0]["lastName"];
$iUserName = $i[0]["username"];
$iDownlineLeft = $i[0]["leftDownline"];
$iDownlineRight = $i[0]["rightDownline"];
$iFullName = "".$ifirstName." ".$ilastName."";

$j = $users->GetUserInfo($dDownlineRight);
$jfirstName = $j[0]["firstName"];
$jlastName = $j[0]["lastName"];
$jUserName = $j[0]["username"];
$jDownlineLeft = $j[0]["leftDownline"];
$jDownlineRight = $j[0]["rightDownline"];
$jFullName = "".$jfirstName." ".$jlastName."";

$e = $users->GetUserInfo($bDownlineLeft);
$efirstName = $e[0]["firstName"];
$elastName = $e[0]["lastName"];
$eUserName = $e[0]["username"];
$eDownlineLeft = $e[0]["leftDownline"];
$eDownlineRight = $e[0]["rightDownline"];
$eFullName = "".$efirstName." ".$elastName."";

$f = $users->GetUserInfo($bDownlineRight);
$ffirstName = $f[0]["firstName"];
$flastName = $f[0]["lastName"];
$fUserName = $f[0]["username"];
$fDownlineLeft = $f[0]["leftDownline"];
$fDownlineRight = $f[0]["rightDownline"];
$fFullName = "".$ffirstName." ".$flastName."";

$k = $users->GetUserInfo($eDownlineLeft);
$kfirstName = $k[0]["firstName"];
$klastName = $k[0]["lastName"];
$kUserName = $k[0]["username"];
$kDownlineLeft = $k[0]["leftDownline"];
$kDownlineRight = $k[0]["rightDownline"];
$kFullName = "".$kfirstName." ".$klastName."";

$l = $users->GetUserInfo($eDownlineRight);
$lfirstName = $l[0]["firstName"];
$llastName = $l[0]["lastName"];
$lUserName = $l[0]["username"];
$lDownlineLeft = $l[0]["leftDownline"];
$lDownlineRight = $l[0]["rightDownline"];
$lFullName = "".$lfirstName." ".$llastName."";

$m = $users->GetUserInfo($fDownlineLeft);
$mfirstName = $m[0]["firstName"];
$mlastName = $m[0]["lastName"];
$mUserName = $m[0]["username"];
$mDownlineLeft = $m[0]["leftDownline"];
$mDownlineRight = $m[0]["rightDownline"];
$mFullName = "".$mfirstName." ".$mlastName."";

$n = $users->GetUserInfo($fDownlineRight);

$nfirstName = $n[0]["firstName"];
$nlastName = $n[0]["lastName"];
$nUserName = $n[0]["username"];
$nDownlineLeft = $n[0]["leftDownline"];
$nDownlineRight = $n[0]["rightDownline"];
$nFullName = "".$nfirstName." ".$nlastName."";

$m = $users->GetUserInfo($fDownlineLeft);
$mfirstName = $m[0]["firstName"];
$mlastName = $m[0]["lastName"];
$mUserName = $m[0]["username"];
$mDownlineLeft = $m[0]["leftDownline"];
$mDownlineRight = $m[0]["rightDownline"];
$mFullName = "".$mfirstName." ".$mlastName."";


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
            <?php if($leftDownline == NULL && $rightDownline == NULL) : ?>
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
             <?php elseif($leftDownline == NULL && $rightDownline) : ?>
                <ul>
                    <li class="">
                        <div class="midtext-table">
                            <div class="midtext-cell"><span class="status empty">0</span>Empty</div>
                        </div>
                    </li>
                    <li class="">
                        <div class="midtext-table">
                            <div class="midtext-cell"><a href="<?php echo "".$server."/geneology.php?username=".$bUserName.""; ?>" class="status active "><span><?php echo $bUserName;?></span><?php echo "(".$bfullName.")";?></a></div>
                        </div>
                    </li>
                </ul>
            <?php elseif($leftDownline && $rightDownline == NULL) : ?>
                <ul>
                    <li class="">
                        <div class="midtext-table">
                            <div class="midtext-cell"><a href="<?php echo "".$server."/geneology.php?username=".$aUserName.""; ?>" class="status active "><span><?php echo $aUserName;?></span><?php echo "(".$afullName.")";?></a></div>
                        </div>
                    </li>
                    <li class="">
                        <div class="midtext-table">
                            
                            <div class="midtext-cell"><span class="status empty">0</span>lEmpty</div>
                        </div>
                    </li>
                </ul>
            <?php else : ?>
                <ul>
                    <li class="">
                        <div class="midtext-table">
                            <div class="midtext-cell"><a href="<?php echo "".$server."/geneology.php?username=".$aUserName.""; ?>" class="status active "><span><?php echo $aUserName;?></span><?php echo "(".$aFullName.")";?></a></div>
                        </div>

                        
                            <?php if($aDownlineLeft == null && $aDownlineRight== NULL) : ?>
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
                             <?php elseif($c == NULL && $d) : ?>
                                <ul>
                                <li class="">
                                    <div class="midtext-table">
                                        <div class="midtext-cell"><span class="status empty">0</span>Empty</div>
                                    </div>
                                </li>
                                <li class="">
                                    <div class="midtext-table">
                                        <div class="midtext-cell"><a href="<?php echo "".$server."/geneology.php?username=".$dUserName.""; ?>" class="status active "><span><?php echo $dUserName;?></span><?php echo "(".$dFullName.")";?></a></div>
                                    </div>
                                </li>
                            </ul>
                            <?php elseif($d == NULL && $c) : ?>
                                <ul>
                                <li class="">
                                    <div class="midtext-table">
                                        <div class="midtext-cell"><a href="<?php echo "".$server."/geneology.php?username=".$cUserName.""; ?>" class="status active "><span><?php echo $cUserName;?></span><?php echo "(".$cFullName.")";?></a></div>
                                    </div>
                                    <?php if($cDownlineLeft == null && $cDownlineRight == NULL) : ?>
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
                                     <?php elseif($g == null && $h) : ?>
                                        <ul>
                                            <li class="">
                                            <div class="midtext-table">
                                                <div class="midtext-cell"><span class="status empty">0</span>Empty</div>
                                            </div>
                                        </li>
                                        <li class="">
                                            <div class="midtext-table">
                                                <div class="midtext-cell"><a href="<?php echo "".$server."/geneology.php?username=".$hUserName.""; ?>" class="status active "><span><?php echo $hUserName;?></span><?php echo "(".$hFullName.")";?></a></div>
                                            </div>
                                        </li>

                                    </ul>
                                    <?php elseif($h == NULL && $g) : ?>
                                        <ul>
                                            <li class="">
                                            <div class="midtext-table">
                                                <div class="midtext-cell"><a href="<?php echo "".$server."/geneology.php?username=".$gUserName.""; ?>" class="status active "><span><?php echo $gUserName;?></span><?php echo "(".$gFullName.")";?></a></div>
                                            </div>
                                        </li>
                                        <li class="">
                                            <div class="midtext-table">
                                                <div class="midtext-cell"><span class="status empty">0</span>Empty</div>
                                            </div>
                                        </li>

                                    </ul>
                                    <?php else : ?>
                                        <ul>
                                            <li class="">
                                            <div class="midtext-table">
                                                <div class="midtext-cell"><a href="<?php echo "".$server."/geneology.php?username=".$gUserName.""; ?>" class="status active "><span><?php echo $gUserName;?></span><?php echo "(".$gFullName.")";?></a></div>
                                            </div>
                                        </li>
                                        <li class="">
                                            <div class="midtext-table">
                                                <div class="midtext-cell"><a href="<?php echo "".$server."/geneology.php?username=".$hUserName.""; ?>" class="status active "><span><?php echo $hUserName;?></span><?php echo "(".$hFullName.")";?></a></div>
                                            </div>
                                        </li>

                                    </ul>
                                    <?php endif; ?>
                                </li>
                                <li class="">
                                    <div class="midtext-table">
                                        <div class="midtext-cell"><span class="status empty">0</span>Empty</div>
                                    </div>
                                </li>
                            </ul>

                            <?php else : ?>
                                <ul>
                                <li class="">
                                    <div class="midtext-table">
                                        <div class="midtext-cell"><a href="<?php echo "".$server."/geneology.php?username=".$cUserName.""; ?>" class="status active "><span><?php echo $cUserName;?></span><?php echo "(".$cFullName.")";?></a></div>
                                    </div>
                                    <ul>
                                    <?php if($g == NULL) : ?>
                                        
                                        <li class="">
                                            <div class="midtext-table">
                                                <div class="midtext-cell"><span class="status empty">0</span>Empty</div>
                                            </div>
                                        </li>
                                    <?php else : ?>
                                        <li class="">
                                            <div class="midtext-table">
                                                <div class="midtext-cell"><a href="<?php echo "".$server."/geneology.php?username=".$gUserName.""; ?>" class="status active "><span><?php echo $gUserName;?></span><?php echo "(".$gFullName.")";?></a>
                                            </div>
                                        </li>
                                    <?php endif; ?>

                                    <?php if($h == NULL) : ?>
                                        
                                        <li class="">
                                            <div class="midtext-table">
                                                <div class="midtext-cell"><span class="status empty">0</span>Empty</div>
                                            </div>
                                        </li>
                                    <?php else : ?>
                                        <li class="">
                                            <div class="midtext-table">
                                                <div class="midtext-cell"><a href="<?php echo "".$server."/geneology.php?username=".$hUserName.""; ?>" class="status active "><span><?php echo $hUserName;?></span><?php echo "(".$hFullName.")";?></a>
                                            </div>
                                        </li>
                                    <?php endif; ?>
                                    

                                        
                                    </ul>
                                </li>
                                <li class="">
                                    <div class="midtext-table">
                                        <div class="midtext-cell"><a href="<?php echo "".$server."/geneology.php?username=".$dUserName.""; ?>" class="status active "><span><?php echo $dUserName;?></span><?php echo "(".$dFullName.")";?></a></div>
                                    </div>
                                    <ul>
                                        <?php if($dDownlineRight == null && $dDownlineLeft == NULL) : ?>
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
                                                
                                                <?php if($i && $j) : ?>
                                                    <li class="">
                                                        <div class="midtext-table">
                                                            <div class="midtext-cell"><a href="<?php echo "".$server."/geneology.php?username=".$iUserName.""; ?>" class="status active "><span><?php echo $iUserName;?></span><?php echo "(".$iFullName.")";?></a></div>
                                                        </div>
                                                    </li>
                                                    <li class="">
                                                        <div class="midtext-table">
                                                            <div class="midtext-cell"><a href="<?php echo "".$server."/geneology.php?username=".$jUserName.""; ?>" class="status active "><span><?php echo $jUserName;?></span><?php echo "(".$jFullName.")";?></a></div>
                                                        </div>
                                                    </li>

                                                 <?php elseif($i == NULL && $j) : ?>
                                                    <li class="">
                                                        <div class="midtext-table">
                                                            <div class="midtext-cell"><span class="status empty">0</span>Empty</div>
                                                        </div>
                                                    </li>
                                                    <li class="">
                                                        <div class="midtext-table">
                                                            <div class="midtext-cell"><a href="<?php echo "".$server."/geneology.php?username=".$jUserName.""; ?>" class="status active "><span><?php echo $jUserName;?></span><?php echo "(".$jFullName.")";?></a></div>
                                                        </div>
                                                    </li>
                                                <?php elseif($j == NULL && $i) : ?>

                                                    <li class="">
                                                        <div class="midtext-table">
                                                            <div class="midtext-cell"><a href="<?php echo "".$server."/geneology.php?username=".$iUserName.""; ?>" class="status active "><span><?php echo $iUserName;?></span><?php echo "(".$iFullName.")";?></a></div>

                                                        </div>
                                                    </li>
                                                    <li class="">
                                                        <div class="midtext-table">
                                                            
                                                            <div class="midtext-cell"><span class="status empty">0</span>Empty</div>
                                                        </div>
                                                    </li>



                                                <?php else : ?>
                                                    even more html
                                                <?php endif; ?>

                                                
                                        <?php endif; ?>
                                        
                                    </ul>
                                </li>
                            </ul>
                            <?php endif; ?>

                            
                    </li>
                    <li class="">
                        <div class="midtext-table">
                            
                            <div class="midtext-cell"><a href="<?php echo "".$server."/geneology.php?username=".$bUserName.""; ?>" class="status active "><span><?php echo $bUserName;?></span><?php echo "(".$bFullName.")";?></a></div>
                        </div>
                        <ul>

                        <?php if($bDownlineLeft == null && $bDownlineRight == NULL) : ?>
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
                         <?php elseif($e == NULL && $f) : ?>
                            <li class="">
                                <div class="midtext-table">
                                    <div class="midtext-cell"><span class="status empty">0</span>Empty</div>
                                </div>
                            </li>
                            <li class="">
                                <div class="midtext-table">
                                    <div class="midtext-cell"><a href="<?php echo "".$server."/geneology.php?username=".$fUserName.""; ?>" class="status active "><span><?php echo $fUserName;?></span><?php echo "(".$fFullName.")";?></a></div>
                                </div>
                            </li>

                        <?php elseif($f == NULL && $e) : ?>
                            <li class="">
                                <div class="midtext-table">
                                    <div class="midtext-cell"><a href="<?php echo "".$server."/geneology.php?username=".$eUserName.""; ?>" class="status active "><span><?php echo $eUserName;?></span><?php echo "(".$eFullName.")";?></a></div>
                                    
                                </div>

                            </li>
                            <li class="">
                                <div class="midtext-table">
                                    <div class="midtext-cell"><span class="status empty">0</span>Empty</div>
                                </div>
                            </li>

                        <?php elseif($f && $e) : ?>

                            <li class="">
                                <div class="midtext-table">
                                    <div class="midtext-cell"><a href="<?php echo "".$server."/geneology.php?username=".$eUserName.""; ?>" class="status active "><span><?php echo $eUserName;?></span><?php echo "(".$eFullName.")";?></a></div>
                                    
                                </div>

                                <ul>
                                <?php if($eDownlineLeft == null && $eDownlineRight == NULL) : ?>
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
                                 <?php elseif($k == NULL && $l) : ?>

                                    <li class="">
                                        <div class="midtext-table">
                                            <div class="midtext-cell"><span class="status empty">0</span>Empty</div>
                                        </div>
                                    </li>
                                    <li class="">
                                        <div class="midtext-table">
                                            <div class="midtext-cell"><span class="status empty">0</span>LEmpty</div>
                                        </div>
                                    </li>
                                <?php elseif($l == NUL && $k) : ?>
                                    <li class="">
                                        <div class="midtext-table">
                                            <div class="midtext-cell"><span class="status empty">0</span>KEmpty</div>
                                        </div>
                                    </li>
                                    <li class="">
                                        <div class="midtext-table">
                                            <div class="midtext-cell"><span class="status empty">0</span>Empty</div>
                                        </div>
                                    </li>
                                <?php else : ?>
                                    

                                    <?php if($k && $l == NULL) : ?>
                                        <li class="">
                                        <div class="midtext-table">
                                            <div class="midtext-cell"><a href="<?php echo "".$server."/geneology.php?username=".$eUserName.""; ?>" class="status active "><span><?php echo $eUserName;?></span><?php echo "(".$eFullName.")";?></a></div>
                                        </div>
                                    </li>
                                     <li class="">
                                        <div class="midtext-table">
                                            <div class="midtext-cell"><span class="status empty">0</span>Empty</div>
                                        </div>
                                    </li>

                                     <?php elseif($leftDownline) : ?>
                                    <?php elseif($leftDownline) : ?>
                                    <?php else : ?>
                
                                    <?php endif; ?>

                                <?php endif; ?>

                                <?php if($k == NULL && $l) : ?>
                                    <li class="">
                                        <div class="midtext-table">
                                            <div class="midtext-cell"><span class="status empty">0</span>Empty</div>
                                            
                                        </div>
                                    </li>
                                     <li class="">
                                        <div class="midtext-table">
                                            <div class="midtext-cell"><a href="<?php echo "".$server."/geneology.php?username=".$lUserName.""; ?>" class="status active "><span><?php echo $lUserName;?></span><?php echo "(".$lFullName.")";?></a></div>
                                        </div>
                                    </li>
                                 <?php elseif($leftDownline) : ?>
                                    HTML HERE
                                <?php elseif($leftDownline) : ?>
                                <?php else : ?>
                                    even more html
                                <?php endif; ?>

                                <?php if($k  && $l) : ?>
                                    <li class="">
                                        <div class="midtext-table">
                                            <div class="midtext-cell"><a href="<?php echo "".$server."/geneology.php?username=".$kUserName.""; ?>" class="status active "><span><?php echo $kUserName;?></span><?php echo "(".$kFullName.")";?></a></div>
                                            
                                        </div>
                                    </li>
                                     <li class="">
                                        <div class="midtext-table">
                                            <div class="midtext-cell"><a href="<?php echo "".$server."/geneology.php?username=".$lUserName.""; ?>" class="status active "><span><?php echo $lUserName;?></span><?php echo "(".$lFullName.")";?></a></div>
                                        </div>
                                    </li>
                                 <?php elseif($leftDownline) : ?>
                                    HTML HERE
                                <?php elseif($leftDownline) : ?>
                                <?php else : ?>
                                    even more html
                                <?php endif; ?>

                                
                                    
                                </ul>
                            </li>
                            <li class="">
                                <div class="midtext-table">
                                    <div class="midtext-cell"><a href="<?php echo "".$server."/geneology.php?username=".$fUserName.""; ?>" class="status active "><span><?php echo $fUserName;?></span><?php echo "(".$fFullName.")";?></a></div>
                                </div>
                                    <!-- REX -->
                                <ul>

                                    <?php if($m == null && $n == NULL) : ?>
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
                                     <?php elseif($m && $n == NULL) : ?>
                                        <li class="">
                                        <div class="midtext-table">
                                            <div class="midtext-cell"><a href="<?php echo "".$server."/geneology.php?username=".$mUserName.""; ?>" class="status active "><span><?php echo $mUserName;?></span><?php echo "(".$mFullName.")";?></a></div>
                                        </div>
                                    </li>
                                    <li class="">
                                        <div class="midtext-table">
                                            <div class="midtext-cell"><span class="status empty">0</span>Empty</div>
                                        </div>
                                    </li>
                                    <?php elseif($n && $m == NULL) : ?>
                                        <li class="">
                                        <div class="midtext-table">

                                            <div class="midtext-cell"><span class="status empty">0</span>Empty</div>
                                        </div>
                                    </li>
                                    <li class="">
                                        <div class="midtext-table">
                                            <div class="midtext-cell"><a href="<?php echo "".$server."/geneology.php?username=".$nUserName.""; ?>" class="status active "><span><?php echo $nUserName;?></span><?php echo "(".$nFullName.")";?></a></div>
                                        </div>
                                    </li>


                                    <?php else : ?>
                                        <li class="">
                                        <div class="midtext-table">
                                            <div class="midtext-cell"><a href="<?php echo "".$server."/geneology.php?username=".$mUserName.""; ?>" class="status active "><span><?php echo $mUserName;?></span><?php echo "(".$mFullName.")";?></a></div>
                                        </div>
                                    </li>
                                    <li class="">
                                        <div class="midtext-table">
                                            <div class="midtext-cell"><a href="<?php echo "".$server."/geneology.php?username=".$nUserName.""; ?>" class="status active "><span><?php echo $nUserName;?></span><?php echo "(".$nFullName.")";?></a></div>
                                        </div>
                                    </li>
                                    <?php endif; ?>

                                    
                                </ul>
                            </li>

                        <?php else : ?>
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
                        <?php endif; ?>

                            
                                    
                                </ul>

                    </li>
                </ul>
            <?php endif; ?>
            
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