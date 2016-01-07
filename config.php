<?php
// database connection
$db = new PDO('mysql:host=localhost;dbname=website;charset=utf8', 'root', '', array(PDO::ATTR_EMULATE_PREPARES => false,
                                                                                    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));

// categories
class Category {
    public $name, $title;
    function __construct($name, $title) {
        $this->name = $name;
        $this->title = $title;
    }
}
$categories = [
    new Category("food", 'ERNÄHRUNG'),
    new Category("energy", "WASSER & ENERGIE"),
    new Category("culture", "KULTURELLE VIELFALT"),
    new Category("climate-change", "KLIMAWANDEL"),
    new Category("production", "WARENPRODUKTION"),
]
?>
