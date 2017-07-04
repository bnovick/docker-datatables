<?php
$table = 'qwatch';
 
$primaryKey = 'symbol';
 
$columns = array(
    array( 'db' => 'symbol', 'dt' => 0 ),
    array( 'db' => 'name',  'dt' => 1 ),
    array( 'db' => 'last',   'dt' => 2 ),
    array( 'db' => 'change', 'dt' => 3,),
    array( 'db' => 'pctchange', 'dt' => 4,),
    array( 'db' => 'volume', 'dt' => 5,),
    array( 'db' => 'tradetime', 'dt' => 6,),
     array( 'db' => 'symbol', 'dt' => 7,)
   
);
 
$sql_details = array(
    'user' => 'mysql',
    'pass' => 'efeaf@@ss1!',
    'db'   => 'db',
    'host' => 'db'
);
 
 
require( './ssp.class.php' );
 
echo json_encode(
    SSP::simple( $_GET, $sql_details, $table, $primaryKey, $columns )
);