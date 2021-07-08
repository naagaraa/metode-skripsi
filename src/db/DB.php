<?php
namespace Nagara\Src\Database;

use \PDO;
use \PDOException;

class DB {

    private $host;
	private $user;
	private $pass;
	private $db_name;
	private $db_type;

	private $dbh;
	private $statement;


	public function __construct($db_type = "", $host = "localhost", $user = "root", $pass="", $db_name = "")
	{
        // variabel constructur
        $this->host = $host;
        $this->user = $user;
        $this->pass = $pass;
        $this->db_name = $db_name;
        $this->db_type = $db_type;
		// data source name
		$dsn = $this->db_type .':host=' . $this->host . ';dbname=' . $this->db_name;

		$option = [
			PDO::ATTR_PERSISTENT => TRUE,
			PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
		];

		try {
			$this->dbh = new PDO($dsn, $this->user, $this->pass, $option);
		} catch (PDOException $exception) {
			throw $exception;
			exit;
		}

        
	}


    /**
	 * 
	 * method for membuat query
	 * @author sandhika galih and nagara
	 * @param string query database
	 */
	public function query($query)
	{
		$this->statement = $this->dbh->prepare($query);
	}

	/**
	 * 
	 * method for handle data binding
	 * @author sandhika galih and nagara
	 * @param string param query
	 */
	public function bind($param, $value, $type =  null)
	{
		if (is_null($type)) {
			switch (true) {
				case is_int($value):
					# code...
					$type = PDO::PARAM_INT;
					break;
				case is_bool($value):
					#code
					$type = PDO::PARAM_BOOL;
					break;
				case is_null($value):
					#code
					$type = PDO::PARAM_NULL;
					break;
				default:
					$type = PDO::PARAM_STR;
			}
		}

		$this->statement->bindValue($param, $value, $type);
	}

	/**
	 * 
	 * method untuk handle execute statement
	 * @author sandhika galih and nagara
	 */
	public function execute()
	{
		$this->statement->execute();
	}

	/**
	 * method for result set array
	 * @author sandhika galih dan nagara
	 * @return array
	 * 
	 * untuk menampilkan semua data query dengan array
	 * assosiatif foramt
	 */
	public function resultSetArray()
	{
		$this->execute();
		return $this->statement->fetchAll(PDO::FETCH_ASSOC);
	}

	/**
	 * method for result set JSON
	 * @author nagara
	 * @return json
	 * 
	 * untuk menampilkan semua data query dengan JSON
	 * format
	 */
	public function resultSetJSON()
	{
		header('Content-Type: application/json');
		$this->execute();
		return json_encode($this->statement->fetchAll(PDO::FETCH_ASSOC), JSON_PRETTY_PRINT);
	}

	/**
	 * method for result set Object
	 * @author nagara
	 * @return object
	 * 
	 * untuk menampilkan semua data query dengan Object
	 * format
	 */
	public function resultSetObject()
	{
		$this->execute();
		return $this->statement->fetchAll(PDO::FETCH_OBJ);
	}

	/**
	 * method for single array
	 * @author sandhika galih dan nagara
	 * @return array
	 * 
	 * untuk menampilkan single data query dengan array
	 * assosiatif format
	 */
	public function singleArray()
	{
		$this->execute();
		return $this->statement->fetch(PDO::FETCH_ASSOC);
	}

	/**
	 * method for single JSON
	 * @author nagara
	 * @return json
	 * 
	 * untuk menampilkan single data query dengan JSON
	 * format
	 */
	public function singleJSON()
	{
		header('Content-Type: application/json');
		$this->execute();
		return json_encode($this->statement->fetch(PDO::FETCH_ASSOC),  JSON_PRETTY_PRINT);
	}

	/**
	 * method for single object
	 * @author nagara
	 * @return object
	 * 
	 * untuk menampilkan single data query dengan object
	 * format
	 */
	public function singleObject()
	{
		$this->execute();
		return $this->statement->fetch(PDO::FETCH_OBJ);
	}


	/**
	 * method for row counting
	 * @author nagara
	 * @return integer
	 * 
	 * untuk menampilkan jumlah row yang ada pada tabel
	 */
	public function rowCount()
	{
		return $this->statement->rowCount();
	}


    // warning CRUD Database PDO withoud bind value 

    /**
     * method select untuk data pada database
     * example query : SELECT `id_tracking`, `nama_tracking` FROM `tb_tracking` 
     * 
     * @author  eka jaya nagara
     * @param string        | query sintax untuk select data
     * @return array        | all
     */
    public function select($query = "")
    {
        self::query($query);
		return self::resultSetArray();
    }


    /**
     * method select where untuk data pada database
     * example query : SELECT `id_tracking`, `nama_tracking` FROM `tb_tracking` WHERE id_tracking = 1
     * 
     * @author  eka jaya nagara
     * @param string        | query sintax untuk select data
     * @return array        | single 
     */
    public function where($query = "")
    {
        self::query($query);
		return self::singleArray();
    }

    /**
     * method insert untuk data pada database
     * example query : INSERT INTO `tb_tracking` VALUES ('7','test')
     * 
     * @author  eka jaya nagara
     * @param string        | query sintax untuk insert data
     * @return int          | row count 1 or 0
     */
    public function insert($query)
    {
        self::query($query);
        self::execute();
        return self::rowCount();
    }

    /**
     * method update untuk data pada database
     * example query : UPDATE `tb_tracking` SET `nama_tracking`='update fiture' WHERE id_tracking = 7
     * 
     * @author  eka jaya nagara
     * @param string        | query sintax untuk update data
     * @return int          | row count 1 or 0
     */
    public function update($query)
    {
        self::query($query);
        self::execute();
        return self::rowCount();
    }

    /**
     * method delete pada untuk database
     * example query : DELETE FROM `tb_tracking` WHERE id_tracking = 7
     * 
     * @author  eka jaya nagara
     * @param string        | query sintax untuk delete data
     * @return int          | row count 1 or 0
     */
    public function delete($query)
    {
        self::query($query);
        self::execute();
        return self::rowCount();
    }
}