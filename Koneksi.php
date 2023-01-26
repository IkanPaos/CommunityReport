<?php

class Koneksi {
    protected   $host       = 'localhost',
                $dbname     = 'pengaduan_masyarakat',
                $username   = 'root',
                $password;
    
    public function __construct()
    {
        $dsn = "mysql:host=$this->host;dbname=$this->dbname";

        try {
            $this->pdo = new PDO($dsn, $this->username, $this->password);

            // if ($this->pdo) {
            //     echo "Berhasil terhubung ke Database $this->dbname";
            // }
        } catch (PDOException $e) {
            echo "Terjadi Kesalahan : " . $e->getMessage(); 
        }
    }
}

$db = new Koneksi();