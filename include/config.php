<?php
if(!defined('CONFIG_PHP')) {
    define('CONFIG_PHP', true);

    session_start();

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
    ];

    // from http://stackoverflow.com/questions/1243418/php-how-to-resolve-a-relative-url
    function rel2abs($rel, $base)
    {
        /* return if already absolute URL */
        if (parse_url($rel, PHP_URL_SCHEME) != '' || substr($rel, 0, 2) == '//')
            return $rel;

        /* queries and anchors */
        if ($rel[0]=='#' || $rel[0]=='?') return $base.$rel;

        /* parse base URL and convert to local variables:
           $scheme, $host, $path */
        extract(parse_url($base));

        /* remove non-directory element from path */
        $path = preg_replace('#/[^/]*$#', '', $path);

        /* destroy path if relative url points to root */
        if ($rel[0] == '/') $path = '';

        /* dirty absolute URL */
        $abs = "$host$path/$rel";

        /* replace '//' or '/./' or '/foo/../' with '/' */
        $re = array('#(/\.?/)#', '#/(?!\.\.)[^/]+/\.\./#');
        for($n=1; $n>0; $abs=preg_replace($re, '/', $abs, -1, $n)) {}

        /* absolute URL is ready! */
        return $scheme.'://'.$abs;
    }

    # escape
    function e($str) {
        return htmlspecialchars($str);
    }
}

?>
