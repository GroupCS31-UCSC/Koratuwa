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

			if($lastId == '')
			{
				$id='COW101';
			}
			else
			{
				$id = substr($lastId,3);
				$id = intval($id);
				$id = "COW".($id+1);
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

    public function addCattle($data) {
      $this->db->query('INSERT INTO cattle(cow_id, dob, cow_breed, cow_type, buy_date, buy_price, health_status, pregnant_status, milk_per_day, employee_id) VALUES(:cowId, :dob, :breed, :type, :buyDate, buyPrice, :health, :pregnantStatus, milkPerDay, :empId)');
      //value binding
      $this->db->bind(':cowId', $data['cowId']);
      $this->db->bind(':dob', $data['dob']);
      $this->db->bind(':breed', $data['breed']);
      $this->db->bind(':type', $data['type']);
      $this->db->bind(':buyDate', $data['buyDate']);
      $this->db->bind(':buyPrice', $data['buyPrice']);
      $this->db->bind(':health', $data['health']);
      $this->db->bind(':pregnantStatus', $data['pregnantStatus']);
      $this->db->bind(':milkPerDay', $data['milkPerDay']);
      $this->db->bind(':empId', $_SESSION['user_id']);

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
      $this->db->query('UPDATE cattle SET dob=:dob, cow_breed= :breed, cow_type= :type, buy_date= :buyDate, buy_price= :buyPrice, health_status= :health, pregnant_status= :pregnantStatus, milk_per_day= :milk_per_day WHERE cow_id= :cowId');
      $this->db->bind(':cowId', $data['cowId']);
      $this->db->bind(':dob', $data['dob']);
      $this->db->bind(':breed', $data['breed']);
      $this->db->bind(':type', $data['type']);
      $this->db->bind(':buyDate', $data['buyDate']);
      $this->db->bind(':buyPrice', $data['buyPrice']);
      $this->db->bind(':health', $data['health']);
      $this->db->bind(':pregnantStatus', $data['pregnantStatus']);
      $this->db->bind(':milk_per_day', $data['milk_per_day']);

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
