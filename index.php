<?php 
include_once("settings.php");
require_once("header.php");
?>
    <main>
        <?php 
        if(!isset($_GET["page"])){
             $_GET["page"] = 1;
        }


        if(isset($_GET["page_type"]) && $_GET["page_type"]=="front" ){
            $className = "front";
        }else{
            $className = "normal";
        }
        ?>

        <!-- galvenā lapa -->
        <?php if($_GET["page"]==1):?>
           <section class="<?=$className?>">
                <h1>Galvenā lapa</h1>
                <p>te būs teksts par galveno lapu</p>
            </section> 
            <script>
                alert("");
            </script>
        <?php endif;?>    


        <!-- Par mums -->
        <?php if($_GET["page"]==2):?>
            <h1>Par mums</h1>
            <p>te būs teksts par mums</p>
        <?php endif;?>    

        <!-- Kontakti -->
        <?php if($_GET["page"]==3):?>
            <h1>Kontakti</h1>
            <p>Kontakti</p>
        <?php endif;?>    


    </main>
    
    <?php include("footer.php"); ?>
    