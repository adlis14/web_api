<?php
//Curl untuk tambah data via api
if($_SERVER["REQUEST_METHOD"] == "POST"){
	$curl = curl_init();
	curl_setopt_array($curl, array(
		CURLOPT_URL => "http://localhost/web_api/api/makul/tambah",
		CURLOPT_RETURNTRANSFER => true,
		CURLOPT_TIMEOUT => 30,
		CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
		CURLOPT_CUSTOMREQUEST => "POST",
		CURLOPT_POSTFIELDS => $_POST,
		CURLOPT_HTTPHEADER => array(
			"cache-control: no-cache"
		),
	));
	$response_tambah = curl_exec($curl);
	$err = curl_error($curl);
	$response_tambah = json_decode($response_tambah, true);
	if(isset($response_tambah['code']) == 200){
		echo "<script type=\"text/javascript\">alert('Data Berhasil ditambah...!!');window.location.href=\"http://localhost/web_api_client/makul.php\";</script>";
	}else{
		echo $response_tambah['data'];
	}
} 
//Curl untuk menghapus data dari api ?>
<h3>Tambah Data Makul</h3>
<form class="form-horizontal" method="POST" action="http://localhost/web_api_client/makul_tambah.php">
	Kode Makul* <br/>
	<input type="text" placeholder="kode makul" name="makul_kode" required/><br/>
	Nama Makul* <br/>
	<input type="text" placeholder="nama makul" name="makul_nama" required/><br/>
	SKS Makul* <br/>
	<input type="text" placeholder="sks makul" name="makul_sks" required/><br/>
	<button type="submit" type="button">
		Submit
	</button>
</form>