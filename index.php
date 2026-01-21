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

        <?php if($_GET["page"]==4):?>
            <h1>Lietotāji</h1>
            <table>
                <thead>
                    <tr>
                        <td>ID</td>
                        <td>Lietotājvārds</td>
                        <td>Epasts</td>
                        <td>Loma</td>
                        <td>Aktīvs</td>
                </tr>
                </thead>
                <tbody>

                </tbody>
                


                
            </table>

            <script>
                let html = '';    

                fetch("./api.php?users=all")
                    .then((data)=>{return data.json()})
                    .then((json)=>{

                        json.forEach((item)=>{
                            html+=`
                                <tr>
                                    <td>${item.id}</td>
                                    <td>${item.username}</td>
                                    <td>${item.email}</td>
                                    <td>${item.role}</td>
                                    <td >${item.active ? 'Active' : 'Inactive'}</td>
                                </tr>
                            `;
                        })
                        document.querySelector("tbody").innerHTML +=html;
                        
                    })
            </script>

        <?php endif;?>    


    </main>
    
    <?php include("footer.php"); ?>
    