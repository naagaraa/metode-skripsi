## DB | Database object class
database adalah suatu penyimpanan data, biasanya klo gak pake framework build dari zero itu harus config database dari awal mulai atur config DB_NAME, DB_PASSOWORD DB_USER DB_TYPE wah ribet banget, kebayangkan, nah maka dari itu gue orangnya sedikit males klo harus melakukan hal berulang - ulang kaya gituh. jadi gue buatlah librarynya sekalian dengan kumpulan metode metode yang gue buat sendiri dari baca jurnal jurnal dan referensi di internet.

### basic usage

```php
use Nagara\Src\Database\DB;

// untuk config bisa di pass ke variabel atau langsung ke constructornya
$type = "mysql";
$servername = "localhost";
$database = "karyawan";
$username = "root";
$password = "";

// pass ke constructorynya
$db = new DB($type, $servername, $username, $password, $database);

// SELECT
$select = $db->select('SELECT * FROM tb_tracking');

// SELECT WHERE
$where = $db->where('SELECT id_tracking, nama_tracking FROM tb_tracking WHERE id_tracking = 1');

// INSERT
$db->insert("INSERT INTO tb_tracking VALUES ('7','test')");

// UPDATE
$db->update("UPDATE tb_tracking SET nama_tracking = 'update fiture' WHERE id_tracking = 7");

// DELETE
$db->delete("DELETE FROM `tb_tracking` WHERE id_tracking = 7");


```