<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.simplecss.org/simple.min.css">
    <title><?php echo $title?></title>
</head>
<body>
    <header>
        <nav>
            <?php 
                foreach($menu as $item){
                   echo "<a href=\"{$item["href"]}\">{$item["title"]}</a>";     

                } 
            ?>
        </nav>

        <select name="" id="">
            <option value="">---</option>
            <?php 
                foreach($list as $item){
                    echo "<option value=\"{$item}\">{$item}</option>";
                    //echo "<option value=\"" . $item . "\">" . $item . "</option>";
                }
            
            ?>    

        </select>
        <h1><?php echo $title?></h1>
    </header>