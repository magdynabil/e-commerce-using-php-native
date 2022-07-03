<?php
class database
{
    private $host = 'localhost';
    private $username = 'root';
    private $password = '';
    private $name = 'e-commerce';
    private $con;

    function __construct()
    {
        $this->con = new mysqli($this->host, $this->username, $this->password, $this->name);
        if ($this->con->connect_error) {
            die("Connection Failed " . $this->con->connect_error);
        }
    }

    public function runDML($query)
    {
        $result = $this->con->query($query);
        if ($result) {
            return true;
        } else {
            return false;
        }
    }

    public function runDQL($query)
    {
        $result = $this->con->query($query);
        if ($result->num_rows > 0) {
            return $result;
        } else {
            return [];
        }
    }
}
