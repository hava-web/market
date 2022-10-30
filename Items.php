<?php

    class Items
    {
        private $itemid;
        private $name;
        private $description;
        private $resaleprice;
        private $winbidder;
        private $winprice;

        

        /**
         * Get the value of itemid
         */ 
        public function getItemid()
        {
                return $this->itemid;
        }

        /**
         * Set the value of itemid
         *
         * @return  self
         */ 
        public function setItemid($itemid)
        {
                $this->itemid = $itemid;

                return $this;
        }

        /**
         * Get the value of name
         */ 
        public function getName()
        {
                return $this->name;
        }

        /**
         * Set the value of name
         *
         * @return  self
         */ 
        public function setName($name)
        {
                $this->name = $name;

                return $this;
        }

        /**
         * Get the value of description
         */ 
        public function getDescription()
        {
                return $this->description;
        }

        /**
         * Set the value of description
         *
         * @return  self
         */ 
        public function setDescription($description)
        {
                $this->description = $description;

                return $this;
        }

        /**
         * Get the value of resaleprice
         */ 
        public function getResaleprice()
        {
                return $this->resaleprice;
        }

        /**
         * Set the value of resaleprice
         *
         * @return  self
         */ 
        public function setResaleprice($resaleprice)
        {
                $this->resaleprice = $resaleprice;

                return $this;
        }

        /**
         * Get the value of winbidder
         */ 
        public function getWinbidder()
        {
                return $this->winbidder;
        }

        /**
         * Set the value of winbidder
         *
         * @return  self
         */ 
        public function setWinbidder($winbidder)
        {
                $this->winbidder = $winbidder;

                return $this;
        }

        /**
         * Get the value of winprice
         */ 
        public function getWinprice()
        {
                return $this->winprice;
        }

        /**
         * Set the value of winprice
         *
         * @return  self
         */ 
        public function setWinprice($winprice)
        {
                $this->winprice = $winprice;

                return $this;
        }

        function __construct($itemid, $name, $description, $resaleprice, $winbidder, $winprice)
        {
            $this->itemid = $itemid;
            $this->name = $name;
            $this->description = $description;
            $this->resaleprice = $resaleprice;
            $this->winbidder = $winbidder;
            $this->winprice = $winprice;
        }

        function __toString()
        {
            $output = "<h2>Item: $this->itemid</h2>" . 
                      "<h2>Name: $this->name</h2>";
                      "<h2>Description: $this->description</h2>";
                      "<h2>Resale Price: $this->resaleprice</h2>";
                      "<h2>Win Bidder: $this->winbidder</h2>";
            return $output;
        }
        
        function saveItem()
        {
            $db = new mysqli("localhost", "root", "", "stock_market");
            $query = "INSERT INTO items VALUES(?,?,?,?,?,?)";
            $stmt = $db->prepare($query);
            $stmt->bind_param("issdid",$this->itemid, $this->name, $this->description, $this->resaleprice, $this->winbidder, $this->winprice);
            $result = $stmt->execute();
            $db->close();
            return $result;
        }

        function updateItem()
        {
            $db = new mysqli("localhost", "root", "", "stock_market");
            $query = "UPDATE items SET name = ?, description = ?, resaleprice = ?, winbidder = ?, winprice = ? WHERE itemid = $this->itemid";
            $stmt = $db->prepare($query);
            $stmt->bind_param("ssdid",$this->name, $this->description, $this->resaleprice, $this->winbidder, $this->winprice);
            $result = $stmt->execute();
            $db->close();
            return $result;
        }

        function removeItem()
        {
            $db = new mysqli("localhost", "root", "", "stock_market");
            $query = "DELETE FROM items WHERE itemid = $this->itemid";
            $result = $db->query($query);
            $db->close();
            return $result;
        }

        static function getItem()
        {
            $db = new mysqli("localhost", "root", "", "stock_market");
            $query = "SELECT * FROM items";
            $result = $db->query($query);
            if(mysqli_num_rows($result)>0)
            {
                $items = array();
                while($row = $result->fetch_array(MYSQLI_ASSOC))
                {
                    $item = new Items($row['itemid'], $row['name'], $row['description'], $row['resaleprice'], $row['winbidder'], $row['winprice']);
                    array_push($items,$item);
                }
                $db->close();
                return $items;
            }
            else
            {
                $db->close();
                return null;
            }
        }


        static function getItemByBidder($bidderid)
        {
            $db = new mysqli("localhost", "root", "", "stock_market");
            $query = "SELECT * FROM items WHERE winbidder = $bidderid";
            $result = $db->query($query);
            if(mysqli_num_rows($result)>0)
            {
                $items = array();
                while($row = $result->fetch_array(MYSQLI_ASSOC))
                {
                    $item = new Items($row['itemid'], $row['name'], $row['description'], $row['resaleprice'], $row['winbidder'], $row['winprice']);
                    array_push($items,$item);
                }
                $db->close();
                return $items;
            }
            else
            {
                $db->close();
                return null;
            }
        }


        static function findItem($itemid)
        {
            $db = new mysqli("localhost", "root", "", "stock_market");
            $query = "SELECT * FROM items WHERE itemid = $itemid";
            $result = $db->query($query);
            $row = $result->fetch_array(MYSQLI_ASSOC);
            if($row)
            {
                $item = new Items($row['itemid'], $row['name'], $row['description'], $row['resaleprice'], $row['winbidder'], $row['winprice']);
                $db->close();
                return $item;
            }
            else
            {
                $db->close();
                return null;
            }
        }


        static function getTotalItem()
        {
            $db = new mysqli("localhost","root","","stock_market");
            $query = "SELECT count(itemid) FROM items";
            $result = $db->query($query);
            $row = $result->fetch_array();
            if($row)
            {
                return $row[0];
            }
            else
            {
                return null;
            }
        }


        static function getTotalPrice()
        {
            $db = new mysqli("localhost","root","","stock_market");
            $query = "SELECT sum(resaleprice) FROM items";
            $result = $db->query($query);
            $row = $result->fetch_array();
            if($row)
            {
                return $row[0];
            }
            else
            {
                return null;
            }
        }


        static function getTotalBid()
        {
            $db = new mysqli("localhost","root","","stock_market");
            $query = "SELECT sum(winprice) FROM items";
            $result = $db->query($query);
            $row = $result->fetch_array();
            if($row)
            {
                return $row[0];
            }
            else
            {
                return null;
            }
        }
    }

?>