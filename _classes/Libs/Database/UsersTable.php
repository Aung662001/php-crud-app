<?php 
    namespace Libs\Database;
    use PDOException;

    class UsersTable{
        private $db = null;
        public function __construct(MySql $db){
            $this->db = $db->connect();
        }
        public function insert($data){
            try{
                $query = "INSERT INTO users (
                    name, email, phone, address,
                   password, role_id, created_at
                    ) VALUES (
                    :name, :email, :phone, :address,
                   :password, :role_id, NOW()
                    )";
                #  "INSERT INTO users (
                #  name,email,phone,address,password,role_id,created_at
                #  ) VALUES (:name, :email, :phone, :address, :password, :role_id,NOW())" ;
                $statement = $this->db->prepare($query);
                $statement->execute($data);
                return $this->db->lastInsertId();
            }catch(PDOExcepton $e){
                return $e->getMessage();
            }
        }
        public function getAll(){
            $statement = $this->db->query("SELECT userS.*,roles.name AS role, roles.value
            FROM users LEFT JOIN roles ON users.role_id = roles.id");
            return $statement->fetchAll();
        }
        public function findEmailAndPassword($email,$password){
            $statement = $this->db->prepare("
            SELECT users.*,roles.name AS role,roles.value 
            FROM users LEFT JOIN roles
            ON users.role_id = roles.id
            WHERE users.email = :email
            AND users.password = :password
            ");
            $statement->execute([
                ':email' => $email,
                ':password' =>$password
                ]);
        $row = $statement->fetch();
        print_r ($row);
        return $row?? false;
        }
        /////update photo name in database
        public function updatePhoto($id,$name){
            $statement = $this->db->prepare("
            UPDATE users SET photo=:name  WHERE id = :id
            ");
            $statement->execute([
                ':name'=> $name,
                ':id' => $id
            ]);
            return $statement->rowCount();
        }
        //////to bun a user///////////////////////////////////
        public function suspend($id){
            $statement = $this->db->prepare("
            UPDATE users SET suspended='1' WHERE id=:id
            ");
            $statement->execute([
                ':id'=>$id,
            ]);
            return $statement->rowCount();
        }
        ///////////to unbun a user//////////////////////
        public function unsuspend($id){
            $statement = $this->db->prepare("
            UPDATE users SET suspended='0' WHERE id=:id");
            $statement->execute([
                ':id'=>$id,
            ]);
            return $statement->rowCount();
        }
        //////////for delete user///////////////////
        public function delete($id){
            $statement = $this->db->prepare("
            DELETE FROM users WHERE id=:id");
            $statement->execute([
                ':id'=>$id,
            ]);
            return $statement->rowCount();
        }
        //////////for change role section////////////////////////
        public function changeRole($id,$role){
            $statement = $this->db->prepare("
            UPDATE users SET role_id=:role WHERE id=:id");
            $statement->execute([
                ':role'=>$role,
                ':id'=>$id,
            ]);
            return $statement->rowCount();
        }
    }
    

    //to check data(all data are insert or not ) before insert
    //to add try_catch method in getAll() function 
    //to write a factory class