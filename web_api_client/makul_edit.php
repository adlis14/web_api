<?php
//Curl untuk tambah data via api
if($_SERVER["REQUEST_METHOD"] == "POST"){
	$curl = curl_init();
	curl_setopt_array($curl, array(
		CURLOPT_URL => "http://localhost/web_api/api/makul/ubah",
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
		echo "<script type=\"text/javascript\">alert('Data Berhasil diubah...!!');window.location.href=\"http://localhost/web_api_client/makul.php\";</script>";
	}else{
		echo $response_tambah['data'];
	}
} 
//Curl untuk menghapus data dari api

//Curl untuk mengambil detail data makul dari ednpoint api
if(isset($_GET['id'])){
	$curl = curl_init();
	curl_setopt_array($curl, array(
	  CURLOPT_URL => "http://localhost/web_api/api/makul?id=$_GET[id]",
	  CURLOPT_RETURNTRANSFER => true,
	  CURLOPT_TIMEOUT => 30,
	  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
	  CURLOPT_CUSTOMREQUEST => "GET",
	  CURLOPT_HTTPHEADER => array(
	    "cache-control: no-cache"
	  ),
	));
	$response = curl_exec($curl);
	$err = curl_error($curl);
	$response = json_decode($response, true);
	if(isset($response['data'])){ 
		foreach ($response['data'] as $value); ?>
		<h3>Tambah Data Mahasiswa</h3>
		<form class="form-horizontal" method="POST" action="http://localhost/web_api_client/makul_edit.php">
			<input type="hidden" name="id" value="<?php echo $value['id']; ?>"/>
			Kode Makul* <br/>
			<input type="text" placeholder="kode makul" name="makul_kode" value="<?php echo $value['makul_kode']; ?>" required/><br/>
			Nama Makul* <br/>
			<input type="text" placeholder="nama makul" name="makul_nama" value="<?php echo $value['makul_kode']; ?>" required/><br/>
			SKS Makul* <br/>
			<input type="text" placeholder="sks makul" name="makul_sks" value="<?php echo $value['makul_sks']; ?>" required/><br/>
			<button type="submit" type="button">
				Submit
			</button>
		</form> <?php
	}
}else{
	echo "Data tidak dikenali";
} ?>