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
        <h1><?php echo $title?></h1>
    </header>

    <main>

    </main>
    <footer>
        <?= $year?>



    </footer>
    


</body>
</html>