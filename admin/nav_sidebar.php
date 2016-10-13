 <?php
 
require "functions.php";
require_once("../includes/class.user.php");

$user = new USER();

if (!isset($_SESSION["access"])) {

    try {

        $sql = "SELECT mod_modulegroupcode, mod_modulegroupname FROM module "
                . " WHERE 1 GROUP BY `mod_modulegroupcode` "
                . " ORDER BY `mod_modulegrouporder` ASC, `mod_moduleorder` ASC  ";


        $stmt = $user->runQuery($sql);
        $stmt->execute();
        $commonModules = $stmt->fetchAll();

        $sql = "SELECT mod_modulegroupcode, mod_modulegroupname, mod_modulepagename,  mod_modulecode, mod_modulename FROM module "
                . " WHERE 1 "
                . " ORDER BY `mod_modulegrouporder` ASC, `mod_moduleorder` ASC  ";

        $stmt = $user->runQuery($sql);
        $stmt->execute();
        $allModules = $stmt->fetchAll();

        $sql = "SELECT rr_modulecode, rr_create,  rr_edit, rr_delete, rr_view FROM role_rights "
                . " WHERE  rr_rolecode = :rc "
                . " ORDER BY `rr_modulecode` ASC  ";

        $stmt = $user->runQuery($sql);
        $stmt->bindValue(":rc", $_SESSION["rolecode"]);
        
        
        $stmt->execute();
        $userRights = $stmt->fetchAll();

        $_SESSION["access"] = set_rights($allModules, $userRights, $commonModules);

    } catch (Exception $ex) {

        echo $ex->getMessage();
    }
}

?>
 
 <nav class="navbar-default navbar-side" role="navigation">
            <div class="sidebar-collapse">
                <ul class="nav" id="main-menu">

                    <li>
                        <a href="#"><i class="fa fa-dashboard"></i> Menu's</a>
                    </li>
          
                    <?php 
					
					if($_SESSION['rolecode']=="SUPERADMIN" || $_SESSION['rolecode']=="ADMIN")
					{?>
					<li>
                        <a href="restaurant.php"><i class="fa fa-gear"></i> Restaurants</a>
                    </li>
					<?php } ?>
					
					<?php if($_SESSION['rolecode']=="RESOWNER") { ?>
					<li>
                        <a href="product.php"><i class="fa fa-gear"></i> Products</a>
                    </li>
					<?php } ?>
					
					<?php if($_SESSION['rolecode']=="SUPERADMIN" || $_SESSION['rolecode']=="ADMIN") { 
					
					?>
					<li>
                        <a href="member.php"><i class="fa fa-users"></i> Members</a>
                    </li>
					<?php } ?>
					
					<?php if($_SESSION['rolecode']=="SUPERADMIN" || $_SESSION['rolecode']=="ADMIN") { ?>
					<li>
                        <a href="messages.php"><i class="fa fa-envelope"></i> Messages</a>
                    </li>
                    <?php } ?>
					
					<?php if($_SESSION['rolecode']=="SUPERADMIN" || $_SESSION['rolecode']=="ADMIN") { ?>
					<li>
                        <a href="orders.php"><i class="fa fa-truck"></i> Order</a>
                    </li>
					<?php } ?>
					
					<?php if($_SESSION['rolecode']=="SUPERADMIN" || $_SESSION['rolecode']=="ADMIN") { ?>
					<li>
                        <a href="user.php"><i class="fa fa-user"></i> User </a>
                    </li>
					<?php } ?>
					
					
					   <li>
                        <a href="logout.php"><i class="fa fa-user"></i> Log out </a>
                    </li>


               
                 
                </ul>

            </div>

        </nav>