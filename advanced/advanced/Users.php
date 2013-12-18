<?php
	class Users{
		private $connection;

		public function __construct(){
			$this->connection = new Database();
		}

		public function findFriends($id){
			$query = 'SELECT id, CONCAT_WS(" ", users.first_name, users.last_name) AS full_name, users.email FROM users
						JOIN friends ON friends.user_id = users.id
						WHERE friends.friend_id ='.$id;
			$result = $this->connection->fetchAll($query);
			return $result;
		}

		public function findUsers($id){
			$query = 'SELECT id, CONCAT_WS(" ", first_name, last_name) AS full_name, users.email FROM users
					  WHERE users.id !='.$id;
			$result = $this->connection->fetchAll($query);
			return $result;
		}

		public function areFriends($user, $person){
			$query = 'SELECT * FROM friends WHERE (friends.friend_id ='.$user.') AND (friends.user_id ='.$person.')';
			$result = $this->connection->fetchRecord($query);
			return ($result ? true : false);
		}

		public function addFriend($user, $person){
			$query = 'INSERT INTO friends(user_id, friend_id)
					  VALUES ('.$user.','.$person.'), ('.$person.','.$user.')';
			mysqli_query($this->connection->getConnection(), $query);
		}
	}
?>