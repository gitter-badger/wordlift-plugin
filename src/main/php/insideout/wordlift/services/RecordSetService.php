<?php

class WordLift_RecordSetService {

	const RESULT_NAME = "result";
	const VARIABLES_NAME = "variables";
	const ROWS_NAME = "rows";
	const CONTENT_TYPE = "Content-Type: application/json";

	public function write( &$recordset, $limit = NULL, $offset = NULL, $count = NULL ) {

		header( self::CONTENT_TYPE );

		if ( NULL !== $count) {
			echo "{\"total\": $count,";

			if ( NULL !== $limit )
				echo " \"limit\": $limit,";

			if ( NULL !== $offset )
				echo " \"offset\": $offset,";

			if ( NULL != $limit && NULL != $offset ) {
				echo " \"page\": ";
				echo floor( $offset / $limit );
				echo ",";

				echo " \"pages\": ";
				echo ceil( $count / $limit );
				echo ",";
			}

			echo " \"content\": ";
		}

		$this->writeRecordSet( $recordset );

		if ( NULL !== $count) {
			echo "}";
		}

	}

	private function writeRecordSet( &$recordset ) {

		$result = &$recordset[ self::RESULT_NAME ];
		$variables = &$result[ self::VARIABLES_NAME ];
		$rows = &$result[ self::ROWS_NAME ];
		$variablesCount = count( $variables );
		$rowsCount = count( $rows );

		$rowsIndex = 0;

		echo "[";
		foreach ( $rows as &$row ) {

			echo "{";

			$variablesIndex = 0;
			foreach ( $variables as &$variable ) {

				echo json_encode( $variable );
				echo ": ";
				echo json_encode( $row[ $variable ] );

				// print the language of the property
				$this->writeAttribute( $row, $variable, "lang" );
				$this->writeAttribute( $row, $variable, "type" );

				if ( ++$variablesIndex !== $variablesCount )
					echo ",";
			}
			echo "}";

			if ( ++$rowsIndex !== $rowsCount )
				echo ",";
		}
		echo "]";

	}

	private function writeAttribute( &$row, $variable, $attribute) {
		if ( array_key_exists( "$variable $attribute", $row ) ) {
			echo ", ";
			echo json_encode( $attribute );
			echo ": ";
			echo json_encode( $row[ "$variable $attribute" ] ); 
		}
	}
	
}

?>