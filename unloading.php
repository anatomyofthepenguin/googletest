<?php 
require_once "db_connect.php";
require_once "quickstart.php";
$client = getClient();
$service = new Google_Service_Sheets($client);

// Prints the names and majors of students in a sample spreadsheet:
// https://docs.google.com/spreadsheets/d/1BxiMVs0XRA5nFMdKvBdBZjgmUUqptlbs74OgvE2upms/edit
$spreadsheetId = '1Ab4DmmFEG-2GMyql8iEknTbNvn3bABLBqzMv-E01Oro';

$values = [];
$result_db = $link->query("SELECT * FROM users WHERE age > 18");
while($users = mysqli_fetch_assoc($result_db)) {
	array_push($values, [$users['name'],$users['second_name'],$users['age']] );
};

$body = new Google_Service_Sheets_ValueRange([
  'values' => $values
]);
$valueInputOption = "USER_ENTERED";
$params = [
  'valueInputOption' => $valueInputOption
];
$range = "A:C";
$result = $service->spreadsheets_values->update($spreadsheetId, $range,
    $body, $params);
$link->close();
echo($result->getUpdatedCells()." ячеек было обновлено.");
 ?>