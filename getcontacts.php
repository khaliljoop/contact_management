<?php


$dbDetails = array( 
    'host' => 'localhost', 
    'user' => 'root', 
    'pass' => '', 
    'db'   => 'test' 
); 
 
// mysql db table to use 
$table = 'contact c'; 
 
// Table's primary key 
$primaryKey = 'id'; 
 
// Array of database columns which should be read and sent back to DataTables. 
// The `db` parameter represents the column name in the database.  
// The `dt` parameter represents the DataTables column identifier. 
$columns = array( 
    array( 'db' => 'prenom', 'dt' => 0 ), 
    array( 'db' => 'nom',  'dt' => 1 ), 
    array( 'db' => 'telephone',  'dt' => 2 ), 
    array( 'db' => 'libelle',  'dt' => 3 ), 
    /*array( 
        'db'        => 'created_at', 
        'dt'        => 2, 
        'formatter' => function( $d, $row ) { 
            return date( 'jS M Y', strtotime($row['created_at'])); 
        } 
    ),*/
    array( 
        'db'        => 'id',
        'dt'        => 4, 
        'formatter' => function( $d, $row ) { 
            return '<button><a href="javascript:void(0)" class="btn btn-primary btn-edit" data-id="'.$row['id'].'"> Edit </a></button><button> <a href="javascript:void(0)" class="btn btn-danger btn-delete ml-2" data-id="'.$row['id'].'"> Delete </a></button>'; 
        } 
    ) 
); 
 
// Include SQL query processing class 
require 'ssp.class.php'; 
 
// Output data as json format 
echo  json_encode( 
    SSP::simple( $_GET, $dbDetails, $table, $primaryKey, $columns ));