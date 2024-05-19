<?php 

class DataProvider {

    protected string $table;
    protected $con;

    public function __construct() {
        $this->con = new PDO('mysql:host=localhost;dbname=coralys1_erp_db', 'coralys1_admin_dev', '@Coralys2024');
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
