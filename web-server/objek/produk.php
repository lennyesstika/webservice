<?php
class Produk
{

    private $conn;

    public $id;
    public $nama;
    public $keterangan;
    public $harga;
    public $id_kategori;
    public $nama_kategori;
    public $dibuat;

    public function __construct($db)
    {
        $this->conn = $db;
    }

    function read()
    {

        // select all query
        $query = "SELECT k.nama_kategori as nama_kategori, p.id, p.nama, p.keterangan, p.harga, p.id_kategori, p.dibuat FROM produk p  LEFT JOIN kategori k ON p.id_kategori = k.id ORDER BY p.dibuat DESC";

        // prepare query statement
        $stmt = $this->conn->prepare($query);

        // execute query
        $stmt->execute();

        return $stmt;
    }
    function create()
    {

        // query to insert record
        $query = "INSERT INTO produk
        SET nama=:nama,
        harga=:harga,
        keterangan=:keterangan, 
        id_kategori=:id_kategori";

        // prepare query
        $stmt = $this->conn->prepare($query);

        // sanitize
        $this->nama = htmlspecialchars(strip_tags($this->nama));
        $this->harga = htmlspecialchars(strip_tags($this->harga));
        $this->keterangan = htmlspecialchars(strip_tags($this->keterangan));
        $this->id_kategori = htmlspecialchars(strip_tags($this->id_kategori));

        // bind values
        $stmt->bindParam(":nama", $this->nama);
        $stmt->bindParam(":harga", $this->harga);
        $stmt->bindParam(":keterangan", $this->keterangan);
        $stmt->bindParam(":id_kategori", $this->id_kategori);

        // execute query
        if ($stmt->execute()) {
            return true;
        }

        return false;
    }
    function readID()
    {

        // query to read single record
        $query = "SELECT k.nama_kategori as nama_kategori, p.id, p.nama, p.keterangan, p.harga, p.id_kategori, p.dibuat FROM produk p  LEFT JOIN kategori k ON p.id_kategori = k.id WHERE p.id = ? LIMIT 0,1";

        // prepare query statement
        $stmt = $this->conn->prepare($query);

        // bind id of product to be updated
        $stmt->bindParam(1, $this->id);

        // execute query
        $stmt->execute();

        // get retrieved row
        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        // set values to object properties
        $this->nama = $row['nama'];
        $this->harga = $row['harga'];
        $this->keterangan = $row['keterangan'];
        $this->id_kategori = $row['id_kategori'];
        $this->nama_kategori = $row['nama_kategori'];
    }

    function update()
    {

        // update query
        $query = "UPDATE produk
        SET nama=:nama,
        harga=:harga,
        keterangan=:keterangan, 
        id_kategori=:id_kategori 
        WHERE id=:id";

        // prepare query statement
        $stmt = $this->conn->prepare($query);

        // sanitize
        $this->nama = htmlspecialchars(strip_tags($this->nama));
        $this->harga = htmlspecialchars(strip_tags($this->harga));
        $this->keterangan = htmlspecialchars(strip_tags($this->keterangan));
        $this->id_kategori = htmlspecialchars(strip_tags($this->id_kategori));
        $this->id = htmlspecialchars(strip_tags($this->id));

        // bind new values
        $stmt->bindParam(':nama', $this->nama);
        $stmt->bindParam(':harga', $this->harga);
        $stmt->bindParam(':keterangan', $this->keterangan);
        $stmt->bindParam(':id_kategori', $this->id_kategori);
        $stmt->bindParam(':id', $this->id);

        // execute the query
        if ($stmt->execute()) {
            return true;
        }

        return false;
    }
    // delete the product
    function delete()
    {

        // delete query
        $query = "DELETE FROM produk WHERE id = ?";

        // prepare query
        $stmt = $this->conn->prepare($query);

        // sanitize
        $this->id = htmlspecialchars(strip_tags($this->id));

        // bind id of record to delete
        $stmt->bindParam(1, $this->id);

        // execute query
        if ($stmt->execute()) {
            return true;
        }

        return false;
    }
}
