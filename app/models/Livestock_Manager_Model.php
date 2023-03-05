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
        $id = 'COW1';
      } else {
        $id = substr($lastId, 3);
        $id = intval($id);
        $id = "COW".($id+1);
      }
    
      return $id;
    }
    
    public function get_cattleView($stallId) {
      $this->db->query('SELECT * FROM cattle WHERE stall_id="'.$stallId.'" order by cow_id');
  
      $result = $this->db->resultSet();

      return $result;
    }

    public function getCattleById($cowId) {
      $this->db->query('SELECT * FROM cattle WHERE cow_id = :cowId' );
      $this->db->bind(':cowId',$cowId);

      $row = $this->db->single();
			return $row;
    }

    public function getCattleByStall($stallId) {
      $this->db->query('SELECT * FROM cattle WHERE stallId = :stallId');
      $this->db->bind(':stallId', $stallId);

      $result = $this->db->resultSet();
      return $result;
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
      
      $this->db->query('INSERT INTO cattle(cow_id, dob, age, gender, cow_breed, milking_status, reg_method, bought_price, stall_id) VALUES(:cowId, :dob, :age, :gender, :breed, :milking, :method, :price, :stallId)');

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

    public function deleteCattle($cowId) {
      $this->db->query('DELETE FROM cattle WHERE cow_id= :cowId');
      $this->db->bind(':cowId', $cowId);

      if($this->db->execute())
      {
        return true;
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
      if(empty($lastId)) {
        $id = 'FED1';
      } else {
        $id = substr($lastId, 3);
        $id = intval($id);
        $id = "FED". ($id + 1);
      }
    
      return $id;
    }
  
    public function get_feedMonitoringView() {
      $this->db->query('SELECT * FROM feed_monitoring');

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
      $this->db->query('UPDATE feed_monitoring SET solid= :solid, liquid= :liqid, remarks= :remarks WHERE feed_id= :feedId');
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
      if($lastId == '')	{
        $id='MIL1';
      }
      else {
        $id = substr($lastId,3);
        $id = intval($id);
        $id = "MIL".($id+1);
      }
      return $id;
    }
   

    public function get_cattleMilkingView() {
      $this->db->query('SELECT * FROM cattle_milking');

      $result = $this->db->resultSet();

      return $result;
    }

    public function viewCattleMilking() {
      $this->db->query('SELECT * FROM cattle_milking');
      $results = $this->db->resultSet();
      return $results;
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
      $this->db->query('INSERT INTO cattle_milking(milk_id, cow_id, quantity, stall_id) VALUES(:milkId, :cowId, :quantity, :stallId)');

      //value binding
      $this->db->bind(':milkId', $data['milkId']);
      $this->db->bind(':cowId', $data['cowId']);
      $this->db->bind(':quantity', $data['quantity']);
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
 
  }
?>
