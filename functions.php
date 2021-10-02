<?php 

$db = mysqli_connect("localhost", "root", "", "tubesweb");

function query($query){
	global $db;
	$result = mysqli_query($db, $query);
	$rows = [];
	while ($row = mysqli_fetch_assoc($result)) {
		$rows[] = $row;
	}

	return $rows;
}

function getGreeting($hour, $name){
	$hour = (int) $hour;

	if ($hour >= 4) {
        $tes ="Selamat Pagi, $name";
    }
    if ($hour >= 12) {
        $tes ="Selamat Siang, $name";
    }
    if($hour >= 15) {
        $tes ="Selamat Sore, $name";
    }
    if($hour >= 18){
        $tes ="Selamat Malam, $name";
    }
    if ($hour <= 4) {
        $tes ="Selamat Malam, $name";
    }
    echo "<h1 class='display-4'>$tes</h1>";
}
function getQuote($hour){
    $hour = (int) $hour;

    if ($hour >= 4) {
        $tes ="Let's start this day with a cup of coffee.";
    }
    if ($hour >= 8) {
        $tes ="Hard work beats talent if talent doesn't work hard.";
    }
    if($hour >= 12) {
        $tes ="Don't forget to eat your lunch.";
    }
    if($hour >= 15){
        $tes ="Hope you have an afternoon as lovely as you are.";
    }
    if($hour >= 18){
        $tes ="You should like the night. Without the dark, we'd never see the stars.";
    }
    if ($hour <= 4) {
        $tes ="Don't forget to sleep";
    }
    echo $tes;
}

function insertChatForum($name, $chat, $idDiskusi, $time){
    global $db;

    $query = "INSERT INTO chatdiskusi VALUES ('', '$name', '$chat', $idDiskusi, '$time')";
    mysqli_query($db, $query);

    return mysqli_affected_rows($db);
}

function requestDiscuss($name, $judul, $chat, $date){
    global $db;
    
    $query = "INSERT INTO diskusi VALUES ('', '$name', '$judul', '$date', 0, '$chat')";
    mysqli_query($db, $query);
    return mysqli_affected_rows($db);
}

function removePost($id){
    global $db;

    mysqli_query($db, "DELETE FROM post WHERE id = $id");

    return mysqli_affected_rows($db);

}
function approveDiskusi($id){
    global $db;

    mysqli_query($db, "UPDATE diskusi SET approve = 1 WHERE id = $id");

    return mysqli_affected_rows($db);
}
function removeDiskusi($id){
    global $db;
    
    mysqli_query($db, "DELETE FROM diskusi WHERE id = $id");
    
    return mysqli_affected_rows($db);
}

function post($username, $capt, $img){

    global $db;

    mysqli_query($db, "INSERT INTO post VALUES ('', '$username', '$capt', '$img')");

    return mysqli_affected_rows($db);
}

function insertKomentar($id,$nama,$komentar){
    global $db;

    mysqli_query($db, "INSERT INTO komentar (get_id_gambar,username_komen,komentar) VALUES ('$id','$nama','$komentar')");
    return mysqli_affected_rows($db);
}
?>