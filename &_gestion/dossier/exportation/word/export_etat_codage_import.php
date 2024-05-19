<?php
require_once(str_replace(array('/', '\\'), '/', realpath(__DIR__)).'/ExportToWord.inc.php');

$html = '<html><body>


Bonjour


</body>
</html>';
$css = '<style type = "text/css">.test {font-weight: 600;}</style>';
$fileName = str_replace(array('/', '\\'), '/', realpath(__DIR__)).'/etat_codage_import.doc';
ExportToWord::htmlToDoc($html, $css, $fileName);
?>
