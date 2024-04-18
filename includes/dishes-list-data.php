<?php
// ===========================================
// Kuala Lumpur
// ===========================================
$destinations = array(
    "01" => array( "city" => "rawang", ),
    "02" => array( "city" => "kuala-selangor", ),
    "03" => array( "city" => "melaka", ),
    "04" => array( "city" => "ipoh", ),
    "05" => array( "city" => "gua-musang", )
);
$startCity = "Kuala Lumpur";

foreach ($destinations as $destination) {
    include('destinations-data/'.str_replace(" ", "-", strtolower($startCity)).'/'.$destination['city'].'.php');
    include('dishes-list.php');
}



// ===========================================
// Johor Bahru
// ===========================================
$destinations = array(
    "01" => array( "city" => "kota-tinggi", ),
    "02" => array( "city" => "batu-pahat", ),
    "03" => array( "city" => "kuala-rompin", ),
    "04" => array( "city" => "kuala-lumpur", )
);
$startCity = "Johor Bahru";

foreach ($destinations as $destination) {
    include('destinations-data/'.str_replace(" ", "-", strtolower($startCity)).'/'.$destination['city'].'.php');
    include('dishes-list.php');
}



// ===========================================
// Ipoh
// ===========================================
$destinations = array(
    "01" => array( "city" => "taiping", ),
    "02" => array( "city" => "sitiawan", ),
    "03" => array( "city" => "tanjong-malim", ),
    "04" => array( "city" => "kulim", ),
    "05" => array( "city" => "temerloh", ),
    "06" => array( "city" => "melaka", )
);
$startCity = "Ipoh";

foreach ($destinations as $destination) {
    include('destinations-data/'.str_replace(" ", "-", strtolower($startCity)).'/'.$destination['city'].'.php');
    include('dishes-list.php');
}



// ===========================================
// Kuching
// ===========================================
$destinations = array(
    "01" => array( "city" => "kota-samarahan", ),
    "02" => array( "city" => "lundu", ),
    "03" => array( "city" => "sri-aman", )
);
$startCity = "Kuching";

foreach ($destinations as $destination) {
    include('destinations-data/'.str_replace(" ", "-", strtolower($startCity)).'/'.$destination['city'].'.php');
    include('dishes-list.php');
}



// ===========================================
// Kota Kinabalu
// ===========================================
$destinations = array(
    "01" => array( "city" => "tuaran", ),
    "02" => array( "city" => "kota-belud", ),
    "03" => array( "city" => "ranau", ),
    "04" => array( "city" => "kudat", )
);
$startCity = "Kota Kinabalu";

foreach ($destinations as $destination) {
    include('destinations-data/'.str_replace(" ", "-", strtolower($startCity)).'/'.$destination['city'].'.php');
    include('dishes-list.php');
}



// ===========================================
// Penang
// ===========================================
$destinations = array(
    "01" => array( "city" => "bayan-baru", ),
    "02" => array( "city" => "kulim", ),
    "03" => array( "city" => "taiping", ),
    "04" => array( "city" => "kedah", ),
    "05" => array( "city" => "alor-setar", ),
    "06" => array( "city" => "bentong", )
);
$startCity = "Penang";

foreach ($destinations as $destination) {
    include('destinations-data/'.str_replace(" ", "-", strtolower($startCity)).'/'.$destination['city'].'.php');
    include('dishes-list.php');
}



// ===========================================
// Melaka
// ===========================================
$destinations = array(
    "01" => array( "city" => "port-dickson", ),
    "02" => array( "city" => "johor-bahru", ),
    "03" => array( "city" => "seremban", ),
    "04" => array( "city" => "ipoh", )
);
$startCity = "Melaka";

foreach ($destinations as $destination) {
    include('destinations-data/'.str_replace(" ", "-", strtolower($startCity)).'/'.$destination['city'].'.php');
    include('dishes-list.php');
}



?>