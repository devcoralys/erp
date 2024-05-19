<?php 

class DataProvider {

    protected string $table;
    protected $con;

    public function __construct() {
        $this->con = new PDO('mysql:host=localhost;dbname=sttci_app_db_2024', 'sttci_ulrich', '@Succes2019');
    }

    /**
     * Retourne le nombre de lignes d'une table
     */
    public function countTableRows(string $tableName): int {
        $sql = "SELECT * FROM $tableName";
        $req = $this->con->prepare($sql);
        $req->execute();
        return $req->rowCount();
    }


}

?>
