<?php 

class MethodsModel
{
	
	function __construct()
	{
		$this->database = new mysqli("localhost","root","","peminjaman_laptop");
	}

	public function InsertDataPeminjamanBarang($dataPeminjaman)
	{
		$nama = $dataPeminjaman['nama'];
		$nis = $dataPeminjaman['nis'];
		$kelas = $dataPeminjaman['kelas'];
		$jurusan = $dataPeminjaman['jurusan'];
		$id = $dataPeminjaman['id'];
		$merk = $dataPeminjaman['merk'];
		$seri = $dataPeminjaman['seri'];
		$nomor = $dataPeminjaman['nomor'];
		$jenisBarang = $dataPeminjaman['jenis_barang'];
		// echo $jenisBarang;
		// die();
		$query = $this->database->query("INSERT INTO `detail_peminjaman`(`id`, `NIS`, `nama_siswa`, `kelas`, `jurusan`, `id_barang`, `merk_barang`, `seri_barang`, `nomor_barang`, `jenis_barang`) VALUES (NULL,'$nis','$nama','$kelas','$jurusan','$id','$merk','$seri','$nomor', '$jenisBarang')");
	}

	public function findItemsByNumberItems($table, $id)
	{
		if ($id == null) {
			return $this->query = $this->database->query("SELECT * FROM `$table`");
		}
			return $this->query = $this->database->query("SELECT * FROM `$table` WHERE `nomor`=$id");
	}

	public function getWhereNis($table=null, $nis=null)
	{
		if ($nis == null) {
			return $this->query = $this->database->query("SELECT * FROM `$table`");
		}
			return $this->query = $this->database->query("SELECT * FROM `$table` WHERE `NIS`=$nis");
	}

	public function dataPeminjaman($jenisBarang=null, $nomor=null)
	{
			return $this->query = $this->database->query("SELECT * FROM `detail_peminjaman` WHERE `jenis_barang`='$jenisBarang' AND `nomor_barang`=$nomor");
	}

	public function hapus($table, $id)
	{
		return $this->query = $this->database->query("DELETE FROM `$table` WHERE `id`=$id");
	}

	public function availableItems($table,$id,$jenisBarang)
	{
		return $this->query = $this->database->query("SELECT * FROM `$table` WHERE `id`=$id AND `jenis_barang`=$jenisBarang");
	}
}


// $dataPeminjaman = [
// 	'nama' => "aldo",
// 	'nis' => 7642,
// 	'kelas' => 12,
// 	'jurusan' => "TI",
// 	'id' => 1,
// 	'merk' => "asus",
// 	'seri' => "dsh382",
// 	'nomor' => "1",
// 	'jenis_barang' => "laptop"
// ];
// $methods->InsertDataPeminjamanBarang($dataPeminjaman);
// echo $dataPeminjaman['nama'];

 ?>