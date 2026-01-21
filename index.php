<?php 
// php tegs
$title  = (string) "Mācos PHP";
define("USER","vitaly");
$year = 2026;
$web_page_enabled = true; //boolean

$list = ["Pirmais", "Otrais","Trešais"]; //Parastais masīvs

$menu = [
    [
        "title"=>"Lapas nosaukunms",
        "href"=>"page.php",
        "img"=>"test.jpg"
    ],
    [
        "title"=>"Lapas nosaukums 2",
        "href"=>"page2.php",
        "img"=>"test2.jpg"
    ]
];



if( !$web_page_enabled){
    die("Lapa ir deaktivizēta");
}



function showFooter(string $date,string $text){
        echo "
        <footer>
            <h3 style=\"text-align:center\">{$text}</h3>
            <p style=\"text-align:center\">{$date}</p>
        </footer>
        ";

}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
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

    <main>

    </main>
    <?php showFooter("21.01.2026","Mana jaunā lapa")?>
    


</body>
</html>