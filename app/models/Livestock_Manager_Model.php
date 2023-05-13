<?php
  class Livestock_Manager_Model {
    private $db;

    public function __construct() {
      $this->db = new Database();
    }

    public function findCowId() {
      $this->db->query('SELECT * FROM cattle order by cow_id desc limit 1');
      $row = $this->db->single();
      $lastId ='';
      if($row) {
        $lastId = $row->cow_id;
      }
      
      if($lastId == '') {
        $id = 'C001';
      } else {
        $id = substr($lastId, 1);
        $id = intval($id);
        $id++;
        $id = 'C'.str_pad($id, 3, '0', STR_PAD_LEFT);
      }
    
      return $id;
    }
    
    public function get_cattleView($stallId=null) {
      if($stallId == null) {
        $this->db->query('SELECT * FROM cattle WHERE existence = 1 order by cow_id');
      } else {
        $this->db->query('SELECT * FROM cattle WHERE existence = 1 AND stall_id="'.$stallId.'" order by cow_id');
      }  
      $result = $this->db->resultSet();

      return $result;
    }

    public function get_cattleMilkView($stallId=null) {
      if($stallId == null) {
        $this->db->query('SELECT * FROM cattle WHERE existence = 1 order by cow_id AND milking_status="Yes"');
      } else {
        $this->db->query('SELECT * FROM cattle WHERE milking_status="Yes" AND existence = 1 AND stall_id="'.$stallId.'" order by cow_id');
      }  
      $result = $this->db->resultSet();

      return $result;
    }

    public function getCattleById($cowId) {
      $this->db->query('SELECT * FROM cattle WHERE cow_id = :cowId AND existence = 1' );
      $this->db->bind(':cowId',$cowId);

      $row = $this->db->single();
			return $row;
    }

    public function addCattle($data) {
      // calculate age
      $dob = $data['dob'];
      $today = new DateTime();
      $age = $today->diff(new DateTime($dob));
      $years = $age->y;
      $months = $age->m;
      $days = $age->d;
      $ageStr = '';

      // format age
      if ($years > 0) { $ageStr = $years . ' years'; if ($months > 0 || $days > 0) { $ageStr .= ', '; }}
      if ($months > 0) { $ageStr .= $months . ' months'; if ($days > 0) { $ageStr .= ', '; }}
      if ($days > 0 || ($years == 0 && $months == 0)) { $ageStr .= $days . ' days'; }
      $data['age'] = $ageStr;

      if($data['price'] == '') {
        $data['price'] = NULL;
      }

      if(($data['gender'] == 'Male') && ($data['age'] < 1)) {
        $data['milking'] = 'No';
      }
      
      $this->db->query('INSERT INTO cattle(cow_id, dob, age, gender, cow_breed, milking_status, reg_method, bought_price, stall_id, existence) VALUES(:cowId, :dob, :age, :gender, :breed, :milking, :method, :price, :stallId, 1)');

      //value binding
      $this->db->bind(':cowId', $data['cowId']);
      $this->db->bind(':dob', $data['dob']);
      $this->db->bind(':age', $data['age']);
      $this->db->bind(':gender', $data['gender']);
      $this->db->bind(':breed', $data['breed']);
      $this->db->bind(':milking', $data['milking']);
      $this->db->bind(':method', $data['method']);
      $this->db->bind(':price', $data['price']);
      $this->db->bind(':stallId', $data['stallId']);

      //execute
      if($this->db->execute())
      {
        return true;
      }
      else
      {
        return false;
      }
    }

    public function updateCattle($data) {
      $this->db->query('UPDATE cattle SET cow_breed= :breed, milking_status= :milking WHERE cow_id= :cowId');
      $this->db->bind(':cowId', $data['cowId']);
      // $this->db->bind(':dob', $data['dob']);
      // $this->db->bind(':gender', $data['gender']);
      $this->db->bind(':breed', $data['breed']);
      $this->db->bind(':milking', $data['milking']);

      if($this->db->execute())
      {
        return true;
      }
      else
      {
        return false;
      }
    }

    public function deleteCattle($data) {
      $cowId=$data['cow_id'];
      $reason=$data['reason'];
      $isSold=isset($data['price']);
      // $this->db->query('DELETE FROM cattle WHERE cow_id= :cowId');
      $this->db->query('UPDATE cattle SET existence=0 WHERE cow_id= :cowId');
      $this->db->bind(':cowId', $cowId);

      if($this->db->execute())
      {
        if($isSold){
          $price=$data['price'];
          $this->db->query('INSERT INTO removed_cattle(cow_id,reason,sold_price) VALUES(:cowId, :reason, :price)');
          $this->db->bind(':cowId', $cowId);
          $this->db->bind(':reason', 'SOLD');
          $this->db->bind(':price', $price);

          if($this->db->execute())
          {
            $this->db->query('INSERT INTO cattle_notification(cow_id,reason,from_user,to_user,seen) VALUES(:cowId,:reason, "LM","ADM",0 )');
            $this->db->bind(':cowId', $cowId);
            $this->db->bind(':reason', $reason);
  
            if($this->db->execute())
            {
              return true;
            }
            else
            {
              return false;
            }
          }
          else
          {
            return false;
          }
        }
        else {
          $this->db->query('INSERT INTO removed_cattle(cow_id,reason) VALUES(:cowId, :reason)');
          $this->db->bind(':cowId', $cowId);
          $this->db->bind(':reason', $reason);

          if($this->db->execute())
          {
            $this->db->query('INSERT INTO cattle_notification(cow_id,reason,from_user,to_user,seen) VALUES(:cowId,:reason, "LM","ADM",0 )');
            $this->db->bind(':cowId', $cowId);
            $this->db->bind(':reason', $reason);
  
            if($this->db->execute())
            {
              return true;
            }
            else
            {
              return false;
            }
          }
          else
          {
            return false;
          }
        }
        
        // return true;
      }
      else
      {
        return false;
      }
    }

    public function findFeedMonitoringId() {
      $this->db->query('SELECT * FROM feed_monitoring order by feed_id desc limit 1');
      $row = $this->db->single();
      $lastId = '';
      if($row) {
        $lastId = $row->feed_id;
      }
      if($lastId == '') {
        $id = 'F10000001';
      } else {
        $id = substr($lastId, 1);
        $id = intval($id);
        $id++;
        $id = 'F'.str_pad($id, 8, '0', STR_PAD_LEFT);
      }

      return $id;
    }
  
    public function get_feedMonitoringView() {
      $this->db->query('SELECT * FROM feed_monitoring ORDER BY date DESC');

      $result = $this->db->resultSet();

      return $result;
    }

    public function getFeedMonitoringById($feedId) {
      $this->db->query('SELECT * FROM feed_monitoring WHERE feed_id = :feedId' );
      $this->db->bind(':feedId',$feedId);

      $row = $this->db->single();
      return $row;
    }

    public function addFeedMonitoring($data) {
      $this->db->query('INSERT INTO feed_monitoring(feed_id, stall_id, solid, liquid, remarks) VALUES(:feedId, :stallId, :solid, :liquid, :remarks)');

      //value binding
      $this->db->bind(':feedId', $data['feedId']);
      $this->db->bind(':stallId', $data['stallId']);
      $this->db->bind(':solid', $data['solid']);
      $this->db->bind(':liquid', $data['liquid']);
      $this->db->bind(':remarks', $data['remarks']);

      //execute
      if($this->db->execute())
      {
        return true;
      }
      else
      {
        return false;
      }
    }

    public function updateFeedMonitoring($data) {
      $this->db->query('UPDATE feed_monitoring SET solid= :solid, liquid= :liquid, remarks= :remarks WHERE feed_id= :feedId');
      $this->db->bind(':feedId', $data['feedId']);
      $this->db->bind(':solid', $data['solid']);
      $this->db->bind(':liquid', $data['liquid']);
      $this->db->bind(':remarks', $data['remarks']);

      if($this->db->execute())
      {
        return true;
      }
      else
      {
        return false;
      }
    }

    public function deleteFeedMonitoring($feedId) {
      $this->db->query('DELETE FROM feed_monitoring WHERE feed_id = :feedId');
      $this->db->bind(':feedId', $feedId);

      if($this->db->execute())
      {
        return true;
      }
      else
      {
        return false;
      }
    }

    public function findcattleMilkingId() {
      $this->db->query('SELECT * FROM cattle_milking order by milk_id desc limit 1');
      $row = $this->db->single();
      
      if($row) {
        $lastId=$row->milk_id;
      }
      if($lastId == '') {
        $id = 'M10000001';
      } else {
        $id = substr($lastId, 1);
        $id = intval($id);
				$id = "M".($id+1);
      }

      return $id;
    }
   
    public function findMilkCollectionId() {
      $this->db->query('SELECT * FROM milk_collection order by milk_collection_id desc limit 1');
      $row = $this->db->single();
      
      
      if($row) {
        $lastId=$row->milk_collection_id;
      }
      if($lastId == '') {
        $id = 'MC100001';
      } else {
        $id = substr($lastId, 2);
				$id = intval($id);
				$id = "MC".($id+1);
      }

      return $id;
    }

    public function get_cattleMilkingView($stallId) {
      $this->db->query('SELECT * FROM cattle_milking WHERE stall_id = "'.$stallId.'" ORDER BY collected_date DESC');

      $result = $this->db->resultSet();

      return $result;
    }

    public function getTotalCattleCount() {
      $this->db->query('SELECT COUNT(*) AS total FROM cattle WHERE existence=1');
      $result = $this->db->single();
      return $result['totalCattle'];
    }

    public function getCattleByCowID($cowID) {
      $this->db->query('SELECT * FROM cattle WHERE cow_id = "'.$cowID.'"');
      $result = $this->db->single();
      return $result;
    }

    public function getcattleMilkingById($milkId) {
      $this->db->query('SELECT * FROM cattle_milking WHERE milk_id = :milkId' );
      $this->db->bind(':milkId',$milkId);

      $row = $this->db->single();
      return $row;
    }

    public function viewCattleMilkingById($milkId) {
      $this->db->query('SELECT * FROM cattle_milking WHERE milk_id = :milkId' );
      $this->db->bind(':milkId',$milkId);

      $result = $this->db->resultSet();
      return $result;
    }

    public function addCattleMilking($data) {
      $milkCollectionID= $this->findMilkCollectionId();
      $this->db->query('INSERT INTO milk_collection(milk_collection_id, quantity, stall_id) VALUES(:mcId, :quantity, :stallId)');
      
      $this->db->bind(':mcId', $milkCollectionID);
      $this->db->bind(':quantity', $data['quantity']);
      $this->db->bind(':stallId', $data['stall_ID']);
      $stallID = $data['stall_ID'];
      unset($data['quantity']);
      unset($data['stall_ID']);
         
      if($this->db->execute()){
        foreach($data as $d){
          $milkID = $this->findcattleMilkingId();
          $cowID = $d['cowId'];
          $quantity = $d['quantity'];
          $this->db->query('INSERT INTO cattle_milking(milk_id, cow_id, quantity, stall_id, milk_collection_id) VALUES(:milkId, :cowId, :quantity, :stallId, :mcId)');
          $this->db->bind(':milkId', $milkID);
          $this->db->bind(':cowId', $cowID);
          $this->db->bind(':quantity', intVal($quantity));
          $this->db->bind(':stallId', $stallID);
          $this->db->bind(':mcId', $milkCollectionID);
          $this->db->execute();
        }
        return true;
      }
      else {
        return false;
      }
    }
   

    public function updateCattleMilking($data) {
      $this->db->query('UPDATE cattle_milking SET quantity= :quantity WHERE milk_id= :milkId');
      $this->db->bind(':milkId', $data['milkId']);
      $this->db->bind(':quantity', $data['quantity']);

      if($this->db->execute())
      {
        return true;
      }
      else
      {
        return false;
      }
    }

    public function deleteCattleMilking($milkId) {
      $this->db->query('DELETE FROM cattle_milking WHERE milk_id= :milkId');
      $this->db->bind(':milkId', $milkId);

      if($this->db->execute())
      {
        return true;
      }
      else
      {
        return false;
      }
    }
 
    public function getCowIds() {
      $this->db->query('SELECT cow_id FROM cattle WHERE existence=1');
      $results = $this->db->resultSet();

      return $results;
    }

    public function findStallIdByCowId($cowId) {
      $this->db->query('SELECT stall_id FROM cattle WHERE cow_id = :cowId');
      $this->db->bind(':cowId', $cowId);
      $row = $this->db->single();
      return $row->stallId;
    }


    public function get_cattleCount() {
      $this->db->query('SELECT COUNT(*) AS total FROM cattle WHERE existence=1');
      $result = $this->db->single();
      return $result['total'];
    }

    //feedmonitoring duration filter
    public function feedMonitoring_duration($from, $to)
    {
      $this->db->query('SELECT * FROM feed_monitoring WHERE date >= "'.$from.'" and date <= "'.$to.'"');

      $result = $this->db->resultSet();

      return $result;
    }

    public function cattleMilking_duration($stall, $from, $to)
    {
      $this->db->query('SELECT * FROM cattle_milking WHERE stall_id = "'.$stall.'" AND  collected_date >= "'.$from.'" and collected_date <= "'.$to.'"');
      // SELECT * FROM cattle_milking WHERE stall_id = "'.$stallId.'" ORDER BY collected_date DESC
      $result = $this->db->resultSet();

      return $result;
    }

    public function cattleCount()
    {
      $this->db->query('SELECT COUNT(cow_id) FROM cattle WHERE existence=1');
      $row = $this->db->single();
      return $row;
    }

  }
?>
