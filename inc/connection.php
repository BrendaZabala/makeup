<?php
$connection = new mysqli( 'localhost', 'root', '', 'tpfinal' );

if ( $connection->errno !== 0 ) {
	die( 'Hubo un error en la conexión' );
}
