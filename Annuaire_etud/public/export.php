<?php
session_start();

    try  {
        
        require "../config.php";
        require "../common.php";

        $connection = new PDO($dsn, $username, $password, $options);
        $connection->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_WARNING);
        $connection->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE,PDO::FETCH_OBJ);

        $sql = "SELECT * 
                FROM employes";

        
        $statement = $connection->prepare($sql);
        $statement->bindParam(':ville', $ville, PDO::PARAM_STR);
        $statement->execute();

        $result = $statement->fetchAll();
    } catch(PDOException $error) {
        echo $sql . "<br>" . $error->getMessage();
    }

?>
        
<?php  

//get records from database
$query = $connection->query("SELECT * FROM employes ORDER BY id ASC");
/*
//if($query->rowCount() > 0){
if ($result && $statement->rowCount() > 0) {
    $delimiter = ",";
    $filename = "employes_" . date('Y-m-d') . ".csv";
    
    //create a file pointer
    $f = fopen('php://memory', 'w');
    
    //set column headers
    $fields = array('ID', 'Genre', 'Prenom', 'Nom', 'Email', 'Age', 'Ville', 'Date', 'Type de Compte');
    //fputcsv($f, $fields, $delimiter);
    fputcsv($f, $fields, "\t");
    
    //output each row of the data, format line as csv and write to file pointer
    while($row = $query->fetch(PDO::FETCH_ASSOC)){

        $id = $row['id'];
        $prenom = $row["prenom"];
        $nom = $row["nom"];
        $email = $row["email"];
        $age = $row["age"];
        $ville = $row["ville"];
        $genre = $row['genre'];
        $pseudo = $row['pseudo'];
        $mdp = $row['mdp'];
        $type = $row['type_compte'];
        $date = $row['date'];

        //$status = ($row['status'] == '1')?'Active':'Inactive';
        $lineData = array($id, $genre, $prenom, $nom, $email, $age, $ville, $date, $type);
        fputcsv($f, $lineData, $delimiter);
    }

    
    
    //move back to beginning of file
    fseek($f, 0);
    
    //set headers to download file rather than displayed
    header('Content-Type: text/csv');
    header('Content-Disposition: attachment; filename="' . $filename . '";');
    
    //output all remaining data on a file pointer
    fpassthru($f);
} */







// Create file and make it writable

$file = fopen('file.csv', 'w');

// Add BOM to fix UTF-8 in Excel

//fputs($file, $bom = (chr(0xEF) . chr(0xBB) . chr(0xBF)));

// Headers
// Set ";" as delimiter
$fields = array('ID', 'Genre', 'Prenom', 'Nom', 'Email', 'Age', 'Ville', 'Date', 'Type de Compte');

fputcsv($file, $fields, ";");

// Rows
// Set ";" as delimiter


while($row = $query->fetch(PDO::FETCH_ASSOC)){
    
            $id = $row['id'];
            $prenom = $row["prenom"];
            $nom = $row["nom"];
            $email = $row["email"];
            $age = $row["age"];
            $ville = $row["ville"];
            $genre = $row['genre'];
            $pseudo = $row['pseudo'];
            $mdp = $row['mdp'];
            $type = $row['type_compte'];
            $date = $row['date'];

            if ($type == 0){
                $type = "Basique (0)";
            }

            else if ($type == 1){
                $type = "Admin (1)";
            }
            else {
                $type = "Super Admin (2)";
            }
    
            //$status = ($row['status'] == '1')?'Active':'Inactive';
            $lineData = array($id, $genre, $prenom, $nom, $email, $age, $ville, $date, $type);
            //fputcsv($f, $lineData, $delimiter);
                
            fputcsv($file, $lineData, ";");

        }



// Close file

fclose($file);

// Send file to browser for download

$dest_file = 'file.csv';
$file_size = filesize($dest_file);

header("Content-Type: text/csv; charset=utf-8");
header("Content-disposition: attachment; filename=\"file.csv\"");
header("Content-Length: " . $file_size);
readfile($dest_file);
exit;

?>