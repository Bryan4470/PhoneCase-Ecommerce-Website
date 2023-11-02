<?php


class CreateDb
{
        public $servername;
        public $username;
        public $password;
        public $dbname;
        public $tablename;
        public $tablename2;
        public $tablename3;
        public $con;


        // class constructor
    public function __construct(
        $dbname = "Newdb",
        $tablename = "Productdb",
        $tablename2 = "customertb",
        $tablename3 = "newslettertb",
        $servername = "localhost",
        $username = "root",
        $password = ""
    )
    {
      $this->dbname = $dbname;
      $this->tablename = $tablename;
      $this->tablename2 = $tablename2;
      $this->tablename3 = $tablename3;
      $this->servername = $servername;
      $this->username = $username;
      $this->password = $password;

      // create connection
        $this->con = mysqli_connect($servername, $username, $password);

        // Check connection
        if (!$this->con){
            die("Connection failed : " . mysqli_connect_error());
        }

        // query
        $sql = "CREATE DATABASE IF NOT EXISTS $dbname";

        // execute query
        if(mysqli_query($this->con, $sql)){

            $this->con = mysqli_connect($servername, $username, $password, $dbname);

            // sql to create new table
            $sql = " CREATE TABLE IF NOT EXISTS $tablename
                            (id INT(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
                             product_name VARCHAR (25) NOT NULL,
                             product_price FLOAT,
                             product_image VARCHAR (100),
                             product_image2 VARCHAR (100),
                             product_image_small VARCHAR (100),
                             product_page VARCHAR (100)
                            );";

            if (!mysqli_query($this->con, $sql)){
                echo "Error creating table : " . mysqli_error($this->con);
            }

            $sql = "CREATE TABLE IF NOT EXISTS $tablename2 (
                cust_id INT(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
                email VARCHAR (50) NOT NULL,
                firstname VARCHAR(30) NOT NULL,
                lastname VARCHAR(30) NOT NULL,
                cust_address VARCHAR (100),
                city VARCHAR (85),
                cust_state VARCHAR (15),
                postcode VARCHAR (10),
                phone_number VARCHAR (15),
                credit_card_number VARCHAR (15)
                );";

            if (!mysqli_query($this->con, $sql)){
                echo "Error creating table : " . mysqli_error($this->con);
            }

            $sql = "CREATE TABLE IF NOT EXISTS $tablename3 (
                newsletter_id INT(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
                email VARCHAR (50) NOT NULL
                );";

            if (!mysqli_query($this->con, $sql)){
                echo "Error creating table : " . mysqli_error($this->con);
            }
        }else{
            return false;
        }
            
    }

    //get product from the database
    public function getData($id){
        $sql = "SELECT * FROM $this->tablename WHERE id = $id";

        $result = mysqli_query($this->con, $sql);

        if(mysqli_num_rows($result) > 0){
            return $result;
        }
    }
}