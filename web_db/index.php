<?php 
    include "functions.php";

?>
    
  <?php 
        //   Lapas satura ielāde pēc id

        if(isset($_GET["page"])){
              $data = getPageById($_GET["page"]);
        }else{
            $data = getPageById(1);
            $_GET["page"]=1;
        }
      ?>

<!DOCTYPE html>
<html lang="lv">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">
    <title>Lapa</title>


    <style>

        nav .active{
            font-weight:bold;
        }
    </style>
</head>

<body>

   
        <nav class="navbar navbar-expand-lg navbar-light bg-light p-2">
  <a class="navbar-brand" href="#">Navbar</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNav">
    <ul class="navbar-nav">
      

      <?php 
            // var_dump(getNavigation());
            $menu = getNavigation();
             
                foreach($menu as $item){
                    $class = $item["page_id"]==$_GET["page"]?"active":"";
                   echo "
                        <li class=\"nav-item {$class}\">
                            <a class=\"nav-link\" href=\"?page={$item["page_id"]}\">{$item["menu_icon"]} {$item["menu_name"]}</a>
                        </li>";
                } 
        
        ?>
    </ul>
  </div>
</nav>



        

    <main class="container">
        <?php //print_r($data)?>  

        <h1><?=$data["page_name"]?></h1>

        <div class="container">
            <?= $data["page_content"]?>
        </div>



    </main>


    
</body>
</html>