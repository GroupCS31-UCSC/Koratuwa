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
      $this->db->query('INSERT INTO cattle(cow_id, dob, gender, cow_breed, reg_date, buy_price, weight, height, health, stall_no) VALUES(:cowId, :dob, :gender, :breed, :regDate, :buyPrice, :weight, :height, :health, :stallNo)');
      //value binding
      $this->db->bind(':cowId', $data['cowId']);
      $this->db->bind(':dob', $data['dob']);
      $this->db->bind(':gender', $data['gender']);
      $this->db->bind(':breed', $data['breed']);
      $this->db->bind(':regDate', $data['regDate']);
      $this->db->bind(':buyPrice', $data['buyPrice']);
      $this->db->bind(':weight', $data['weight']);
      $this->db->bind(':height', $data['height']);
      $this->db->bind(':health', $data['health']);
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
      $this->db->query('UPDATE cattle SET dob=:dob, gender= :gender, cow_breed= :breed, reg_date= :regDate, buy_price= :buyPrice, weight= :weight, height= :height, health= :health WHERE cow_id= :cowId');
      $this->db->bind(':cowId', $data['cowId']);
      $this->db->bind(':dob', $data['dob']);
      $this->db->bind(':gender', $data['gender']);
      $this->db->bind(':breed', $data['breed']);
      $this->db->bind(':regDate', $data['regDate']);
      $this->db->bind(':buyPrice', $data['buyPrice']);
      $this->db->bind(':weight', $data['weight']);
      $this->db->bind(':height', $data['height']);
      $this->db->bind(':health', $data['health']);

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
