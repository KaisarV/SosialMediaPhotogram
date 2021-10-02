
//Javascript untuk index
$(document).ready(function(){

    $(".txt1, .postingan").hide();
    $(".daftarPengguna").hide();
    $(".daftarPengguna").slideDown(4000);
    $(".txt1").show(3000);
    setTimeout(function(){
		$(".postingan").show(2000);
		}, 3000);
});



//Untuk menemukan diskusi yang dicari
function findDiscussion(str){

	if (str == "") {
		document.getElementById('txt').innerHTML= "";
		return;
	}
	if (window.XMLHttpRequest) {
		xmlhttp = new XMLHttpRequest();
	} else {
		xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
	}
	xmlhttp.onreadystatechange = function(){
		if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
			document.getElementById("txt").innerHTML = xmlhttp.responseText;
		}
	}
	xmlhttp.open("GET", "Search.php?q="+str,true);
	xmlhttp.send();
}




