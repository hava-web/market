<?php

   class Bidders
   {
      private $bidderid;
      private $lastname;
      private $firstname;
      private $address;
      private $phone;

       /**
        * @param $bidderid
        * @param $lastname
        * @param $firstname
        * @param $address
        * @param $phone
        */
       public function __construct($bidderid, $lastname, $firstname, $address, $phone)
       {
           $this->bidderid = $bidderid;
           $this->lastname = $lastname;
           $this->firstname = $firstname;
           $this->address = $address;
           $this->phone = $phone;
       }

       /**
        * @return mixed
        */
       public function getBidderid()
       {
           return $this->bidderid;
       }

       /**
        * @param mixed $bidderid
        */
       public function setBidderid($bidderid)
       {
           $this->bidderid = $bidderid;
       }

       /**
        * @return mixed
        */
       public function getLastname()
       {
           return $this->lastname;
       }

       /**
        * @param mixed $lastname
        */
       public function setLastname($lastname)
       {
           $this->lastname = $lastname;
       }

       /**
        * @return mixed
        */
       public function getFirstname()
       {
           return $this->firstname;
       }

       /**
        * @param mixed $firstname
        */
       public function setFirstname($firstname)
       {
           $this->firstname = $firstname;
       }

       /**
        * @return mixed
        */
       public function getAddress()
       {
           return $this->address;
       }

       /**
        * @param mixed $address
        */
       public function setAddress($address)
       {
           $this->address = $address;
       }

       /**
        * @return mixed
        */
       public function getPhone()
       {
           return $this->phone;
       }

       /**
        * @param mixed $phone
        */
       public function setPhone($phone)
       {
           $this->phone = $phone;
       }




      function __toString()
      {
            $output = "<h2>Bidder number: $this->bidderid</h2>\n" .
                      "<h2>$this->lastname,  $this->firstname</h2>\n" .
                      "<h2>$this->address</h2>\n" . 
                      "<h2>$this->phone</h2>\n";

            return $output;             
      }

      function saveBidder()
      {
            $db = new mysqli("localhost", "root", "", "stock_market");
            $query = "INSERT INTO bidders VALUES(?,?,?,?,?)";
            $stmt = $db->prepare($query);
            $stmt->bind_param("issss",$this->bidderid, $this->lastname, $this->firstname, $this->address, $this->phone);
            $result = $stmt->execute();
            $db->close();
            return $result;
      }

      function updateBidder()
      {
            $db = new mysqli("localhost", "root", "", "stock_market");
            $query = "UPDATE bidders SET bidderid = ?, lastname = ?, firstname = ?, address = ?, phone = ? WHERE bidderid = $this->bidderid";
            $stmt = $db->prepare($query);
            $stmt->bind_param("issss",$this->bidderid, $this->lastname, $this->firstname, $this->address, $this->phone);
            $result = $stmt->execute();
            $db->close();
            return $result;
      }

      function removeBidder()
      {
            $db = new mysqli("localhost", "root", "", "stock_market");
            $query = "DELETE FROM bidders WHERE bidderid = $this->bidderid";
            $result = $db->query($query);
            $db->close();
            return $result;
      }

      static function getBidder()
      {
            $db = new mysqli("localhost", "root", "", "stock_market");
            $query = "SELECT * FROM bidders";
            $result = $db->query($query);
            if(mysqli_num_rows($result)>0)
            {
                  $bidders = array();
                  while ($row = $result->fetch_array(MYSQLI_ASSOC)) 
                  {
                        $bidder = new Bidders($row['bidderid'], $row['lastname'], $row['firstname'], $row['address'], $row['phone']);   
                        array_push($bidders,$bidder);
                        unset($bidder);
                  }     
                  $db->close();
                  return $bidders;
            }
            else
            {
                  $db->close();
                  return null;
            }
      }

      static function findBidder($bidderid)
      {
            $db = new mysqli("localhost", "root", "", "stock_market");
            $query = "SELECT * FROM bidders WHERE bidderid = $bidderid";
            $result = $db->query($query);
            $row = $result->fetch_array(MYSQLI_ASSOC);
            if($row)
            {
                  $bidder = new Bidders($row['bidderid'], $row['lastname'], $row['firstname'], $row['address'], $row['phone']);
                  $db->close();
                  return $bidder;
            }
            else
            {
                  $db->close();
                  return null;
            }
      }
}
?>