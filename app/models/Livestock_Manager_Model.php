<?php
  class Livestock_Manager_Model {
    private $db;

    public function __construct() {
      $this->db = new Database();
    }

    public function findCowId() {
      $this->db->query('SELECT * FROM cattle order by cow_id desc limit 1');
			$row = $this->db->single();
			$lastId=$row->cow_id;

			if($lastId == '')	{
				$id='COW101';
			}
			else {
				$id = substr($lastId,3);
				$id = intval($id);
				$id = "COW".($id+1);
			}
			return $id;
    }

    public function findFeedMonitoringId() {
      $this->db->query('SELECT * FROM feed_monitoring order by feed_id desc limit 1');
      $row = $this->db->single();
      $lastId=$row->feed_id;

      if($lastId == '')	{
				$id='FEED101';
			}
			else {
				$id = substr($lastId,3);
				$id = intval($id);
				$id = "FEED".($id+1);
			}
      return $id;
    }

    public function findVaccinationId() {
      $this->db->query('SELECT * FROM vaccination order by vaccination_id desc limit 1');
      $row = $this->db->single();
      $lastId=$row->vaccination_id;

      if($lastId == '')	{
        $id='VACC101';
      }
      else {
        $id = substr($lastId,3);
        $id = intval($id);
        $id = "VACC".($id+1);
      }
      return $id;
    }

    public function get_cattleView() {
      $this->db->query('SELECT * FROM cattle');

      $result = $this->db->resultSet();

      return $result;
    }

    public function get_feedMonitoringView() {
      $this->db->query('SELECT * FROM feed_monitoring');

      $result = $this->db->resultSet();

      return $result;
    }

    public function get_vaccinationView() {
      $this->db->query('SELECT * FROM vaccination');

      $result = $this->db->resultSet();

      return $result;
    }

    public function getCattleById($cowId) {
      $this->db->query('SELECT * FROM cattle WHERE cow_id = :cowId' );
      $this->db->bind(':cowId',$cowId);

      $row = $this->db->single();
			return $row;
    }

    public function getFeedMonitoringById($feedId) {
      $this->db->query('SELECT * FROM feed_monitoring WHERE feed_id = :feedId' );
      $this->db->bind(':feedId',$feedId);

      $row = $this->db->single();
      return $row;
    }

    public function getVaccinationById($vaccId) {
      $this->db->query('SELECT * FROM vaccination WHERE vaccination_id = :vaccId' );
      $this->db->bind(':vaccId',$vaccId);

      $row = $this->db->single();
      return $row;
    }

    public function viewCattleById($cowId) {
      $this->db->query('SELECT * FROM cattle WHERE cow_id = :cowId' );
      $this->db->bind(':cowId',$cowId);

      $result = $this->db->resultSet();
			return $result;
    }

    public function viewFeedMonitoringById($feedId) {
      $this->db->query('SELECT * FROM feed_monitoring WHERE feed_id = :feedId' );
      $this->db->bind(':feedId',$feedId);

      $result = $this->db->resultSet();
      return $result;
    }

    public function viewVaccinationById($vaccId) {
      $this->db->query('SELECT * FROM vaccination WHERE vaccination_id = :vaccId' );
      $this->db->bind(':vaccId',$vaccId);

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

      // format age
      if ($years > 0) { $ageStr = $years . ' years'; if ($months > 0 || $days > 0) { $ageStr .= ', '; }}
      if ($months > 0) { $ageStr .= $months . ' months'; if ($days > 0) { $ageStr .= ', '; }}
      if ($days > 0 || ($years == 0 && $months == 0)) { $ageStr .= $days . ' days'; }
      $data['age'] = $ageStr;
      
      $this->db->query('INSERT INTO cattle(cow_id, dob, age, gender, cow_breed, weight, height, health, method, /*reg_date,*/ stall_no) VALUES(:cowId, :dob, :age, :gender, :breed, :weight, :height, :health, :method,/* regDate,*/ :stallNo)');

      //value binding
      $this->db->bind(':cowId', $data['cowId']);
      $this->db->bind(':dob', $data['dob']);
      $this->db->bind(':age', $data['age']);
      $this->db->bind(':gender', $data['gender']);
      $this->db->bind(':breed', $data['breed']);
      $this->db->bind(':weight', $data['weight']);
      $this->db->bind(':height', $data['height']);
      $this->db->bind(':health', $data['health']);
      $this->db->bind(':method', $data['method']);
      // $this->db->bind(':regDate', $data['regDate']);
      $this->db->bind(':stallNo', $_SESSION['user_id']);

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

    public function updateCattle($data) {
      $this->db->query('UPDATE cattle SET /*dob=:dob, gender= :gender, cow_breed= :breed,*/ weight= :weight, height= :height WHERE cow_id= :cowId');
      $this->db->bind(':cowId', $data['cowId']);
      // $this->db->bind(':dob', $data['dob']);
      // $this->db->bind(':gender', $data['gender']);
      // $this->db->bind(':breed', $data['breed']);
      $this->db->bind(':weight', $data['weight']);
      $this->db->bind(':height', $data['height']);

      if($this->db->execute())
      {
        return true;
      }
      else
      {
        return false;
      }
    }

    public function addFeedMonitoring($data) {
      $this->db->query('INSERT INTO feed_monitoring(feed_id, cow_id, feed_item, feed_quantity, note) VALUES(:feedId, :cowId, :feedItem, :feedQuantity, :note)');

      //value binding
      $this->db->bind(':feedId', $data['feedId']);
      $this->db->bind(':cowId', $data['cowId']);
      $this->db->bind(':feedItem', $data['feedItem']);
      $this->db->bind(':feedQuantity', $data['feedQuantity']);
      $this->db->bind(':note', $data['note']);

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

    public function deleteFeedMonitoring($feedId) {
      $this->db->query('DELETE FROM feed_monitoring WHERE feed_id= :feedId');
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

    public function updateFeedMonitoring($data) {
      $this->db->query('UPDATE feed_monitoring SET feed_item= :feedItem, feed_quantity= :feedQuantity, note= :note WHERE feed_id= :feedId');
      $this->db->bind(':feedId', $data['feedId']);
      $this->db->bind(':feedItem', $data['feedItem']);
      $this->db->bind(':feedQuantity', $data['feedQuantity']);
      $this->db->bind(':note', $data['note']);

      if($this->db->execute())
      {
        return true;
      }
      else
      {
        return false;
      }
    }

    public function addVaccination($data) {
      $this->db->query('INSERT INTO vaccination(vaccination_id, cow_id, vaccination_type, vaccination_quantity, note) VALUES(:vaccId, :cowId, :vaccinationType, :vaccinationQuantity, :note)');

      //value binding
      $this->db->bind(':vaccId', $data['vaccId']);
      $this->db->bind(':cowId', $data['cowId']);
      $this->db->bind(':vaccinationType', $data['vaccinationType']);
      $this->db->bind(':vaccinationQuantity', $data['vaccinationQuantity']);
      $this->db->bind(':note', $data['note']);

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

    public function deleteVaccination($vaccId) {
      $this->db->query('DELETE FROM vaccination WHERE vaccination_id= :vaccId');
      $this->db->bind(':vaccId', $vaccId);

      if($this->db->execute())
      {
        return true;
      }
      else
      {
        return false;
      }
    }

    public function updateVaccination($data) {
      $this->db->query('UPDATE vaccination SET vaccination_type= :vaccinationType, vaccination_quantity= :vaccinationQuantity, note= :note WHERE vaccination_id= :vaccId');
      $this->db->bind(':vaccId', $data['vaccId']);
      $this->db->bind(':vaccinationType', $data['vaccinationType']);
      $this->db->bind(':vaccinationQuantity', $data['vaccinationQuantity']);
      $this->db->bind(':note', $data['note']);

      if($this->db->execute())
      {
        return true;
      }
      else
      {
        return false;
      }
    }

    public function viewFeedMonitoring() {
      $this->db->query('SELECT * FROM feed_monitoring');
      $results = $this->db->resultSet();
      return $results;
    }
 
  }
?>
