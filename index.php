<?php

require_once "davai.php";

$davai = new Davai();

$origin = isset($_SERVER['HTTP_ORIGIN'])? $_SERVER['HTTP_ORIGIN'] : '';  

$allow_origin = array(  
    'https://jiahongl.bitbucket.io'
);  
  
if(in_array($origin, $allow_origin)){  
    header('Access-Control-Allow-Origin:'.$origin);       
}

// 舊api
$davai->get('/index.php', function(){

  $url_params = '';

  foreach ($_GET as $name => $value) {
    $url_params = $url_params . '&' . $name . '=' . $value; 
  }

  $curl = curl_init();

  curl_setopt_array($curl, array(
    CURLOPT_URL => "http://data.coa.gov.tw/Service/OpenData/TransService.aspx?UnitId=QcbUEzN6E6DL" . $url_params,
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_ENCODING => "",
    CURLOPT_MAXREDIRS => 10,
    CURLOPT_TIMEOUT => 60,
    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_NONE,
    CURLOPT_CUSTOMREQUEST => "GET",
  ));

  $response = curl_exec($curl);
  $err = curl_error($curl);

  curl_close($curl);

  if ($err) {
    echo "cURL Error #:" . $err;
  } else {
    echo $response;
  }

});

// 獲取寵物資料列表
$davai->get('/animals', function(){

  $url_params = '';

  foreach ($_GET as $name => $value) {
    $url_params = $url_params . '&' . $name . '=' . $value; 
  }

  $curl = curl_init();

  curl_setopt_array($curl, array(
    CURLOPT_URL => "http://data.coa.gov.tw/Service/OpenData/TransService.aspx?UnitId=QcbUEzN6E6DL" . $url_params,
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_ENCODING => "",
    CURLOPT_MAXREDIRS => 10,
    CURLOPT_TIMEOUT => 60,
    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_NONE,
    CURLOPT_CUSTOMREQUEST => "GET"
  ));

  $response = curl_exec($curl);
  $err = curl_error($curl);

  curl_close($curl);

  $res = '';

  if ($err) {

    $res = array(
      "success" => false,
      "result" => null,
      "errorMessage" => "server error",
    );

    echo json_encode( $res );

  } else {

    $res = array(
      "success" => true,
      "result" => json_decode($response),
      "errorMessage" => null,
    );

    echo json_encode( $res );

  }

});

// 01.獲取狀態代碼列表
$davai->get('/status', function(){

  $json = file_get_contents("./json/status.json");

  $res = array(
    "success" => true,
    "result" => json_decode($json),
    "errorMessage" => null,
  );

  echo json_encode($res);

});

// 02.獲取動物性別代碼列表
$davai->get('/sex', function(){

  $json = file_get_contents("./json/sex.json");

  $res = array(
    "success" => true,
    "result" => json_decode($json),
    "errorMessage" => null,
  );

  echo json_encode($res);

});


// 03.動物體型代碼表
$davai->get('/body-type', function(){

  $json = file_get_contents("./json/body-type.json");

  $res = array(
    "success" => true,
    "result" => json_decode($json),
    "errorMessage" => null,
  );

  echo json_encode($res);

});

// 04.年紀代碼表
$davai->get('/age', function(){

  $json = file_get_contents("./json/age.json");

  $res = array(
    "success" => true,
    "result" => json_decode($json),
    "errorMessage" => null,
  );

  echo json_encode($res);

});

// 05.縣市代碼表
$davai->get('/area', function(){

  $json = file_get_contents("./json/area.json");

  $res = array(
    "success" => true,
    "result" => json_decode($json),
    "errorMessage" => null,
  );

  echo json_encode($res);

});

// 06.是否絕育代碼表
$davai->get('/sterilization', function(){

  $json = file_get_contents("./json/sterilization.json");

  $res = array(
    "success" => true,
    "result" => json_decode($json),
    "errorMessage" => null,
  );

  echo json_encode($res);

});

// 07.是否施打狂犬病代碼表
$davai->get('/bacterin', function(){

  $json = file_get_contents("./json/bacterin.json");

  $res = array(
    "success" => true,
    "result" => json_decode($json),
    "errorMessage" => null,
  );

  echo json_encode($res);

});

// 08.類型
$davai->get('/kind', function(){

  $json = file_get_contents("./json/kind.json");

  $res = array(
    "success" => true,
    "result" => json_decode($json),
    "errorMessage" => null,
  );

  echo json_encode($res);

});

// 09.毛色
$davai->get('/colour', function(){

  $json = file_get_contents("./json/colour.json");

  $res = array(
    "success" => true,
    "result" => json_decode($json),
    "errorMessage" => null,
  );

  echo json_encode($res);

});


// 10.收容中心
$davai->get('/shelter', function(){

  $json = file_get_contents("./json/shelter.json");

  $res = array(
    "success" => true,
    "result" => json_decode($json),
    "errorMessage" => null,
  );

  echo json_encode($res);

});

// 11.回饋類型
$davai->get('/feedback-type', function(){

  $json = file_get_contents("./json/feedback-type.json");

  $res = array(
    "success" => true,
    "result" => json_decode($json),
    "errorMessage" => null,
  );

  echo json_encode($res);

});

// 12.議題狀態
$davai->get('/issues-status', function(){

  $json = file_get_contents("./json/issues-status.json");

  $res = array(
    "success" => true,
    "result" => json_decode($json),
    "errorMessage" => null,
  );

  echo json_encode($res);

});