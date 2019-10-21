<?php
header("Content-type: application/json");
$quotes = [
  "Pulling up in the may bike",
  "If I don't scream, if I don't say something then no one's going to say anything.",
  "I wish I had a friend like me",
  "Style is genderless",
  "Believe in your flyness...conquer your shyness.",
  "Sometimes you have to get rid of everything"
];
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $quote = $_POST["quoteField"];

  $file = fopen("quote.txt", "w");
  fwrite($file, $quote);
  fclose($file);
  $resp = ["message" => "Successfully added quote"];
  echo json_encode($resp);
} else if ($_SERVER['REQUEST_METHOD'] == 'GET') {
  if (isset($_GET['id'])) {
    $id = $_GET['id'];
  } else {
    $id = array_rand($quotes);
  }

  $data = ["fooooooo" => $quotes[$id]];

  echo json_encode($data);

} else {
  http_response_code(400);
  echo json_encode(["error" => "Method not supported"]);
}
