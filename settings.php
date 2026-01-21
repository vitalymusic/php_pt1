<?php 
// php tegs
$title  = (string) "Mācos PHP";
define("USER","vitaly");
$year = 2026;
$web_page_enabled = true; //boolean

$list = ["Pirmais", "Otrais","Trešais"]; //Parastais masīvs

$menu = [
    [
        "title"=>"Galvenā",
        "href"=>"?page=1",
        "img"=>"test.jpg"
    ],
    [
        "title"=>"Par mums",
        "href"=>"?page=2",
        "img"=>"about.jpg"
    ],
    [
        "title"=>"Kontakti",
        "href"=>"?page=3",
        "img"=>"contacts.jpg"
    ],
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