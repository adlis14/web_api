<?php
$curl = curl_init();
curl_setopt_array($curl, array(
  CURLOPT_URL => "http://localhost/web_api/api/mahasiswa",
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
$response = json_decode($response, true); ?>
<h3>Data Dari Endpoin API Mahasiswa</h3>
<table border="1" cellspacing="0" cellpadding="0" style='border-collapse:collapse;'>
	<tr>
		<td>Nama</td>
		<td>NRP</td>
		<td>Email</td>
		<td>Jurusan</td><?php 
		if(isset($response['data'])){ 
			foreach($response['data'] as $value){ ?>
				<tr>
						<td><strong><?php echo $value['nama']; ?></strong></td>
						<td><?php echo $value['nrp']; ?></td>
						<td><?php echo $value['email']; ?></td>
						<td><?php echo $value['jurusan']; ?></td>
				</tr><?php 
			} 
		} ?>
</table>