<?php
/**
* 
*/
class Memo
{
	private $id;
    private $title;
    private $description;
    private $conn;
    private $tblName ="tbl_memo";
	function __construct($db) {
		$this->conn = $db;
	}

	public function getId(){
        return $this->id;  
    }
    
    public function getTitle(){
        return $this->title;
    }
    
    public function getDescription(){
        return $this->description;
    }
    
    public function setId($id){
        $this->id = htmlspecialchars(strip_tags(trim($id)));
    }
    
    public function setTitle($title){
		$this->title = htmlspecialchars(strip_tags(trim($title)));
	}
	
	public function setDescription($description){
		$this->description = htmlspecialchars(strip_tags(trim($description)));		
	}
	
	public function ReadAll(){
        //select all data
        $query = "SELECT
                    id, title, description
                FROM
                    " . $this->tblName . "
                ORDER BY
                    id";  
 
        $stmt = $this->conn->prepare( $query );
        $stmt->execute();
        // for ($i=0; $i < 10; $i++) { 
        // }
        $a = 0;
        $result = null;
        while ($row =$stmt->fetch(PDO::FETCH_ASSOC)) {
            $this->setId($row['id']);
            $this->settitle($row['title']);
            $this->setDescription($row['description']);
            $result[$a]['id'] = $this->getId();
            $result[$a]['title'] = $this->gettitle();
            $result[$a]['description'] = $this->getDescription();
            $a++;
        }

        return $result;
    }
    public function ReadOne($id){
        $this->setId($id);
        //select all data
        $query = "SELECT
                    id, title, description
                FROM
                    " . $this->tblName . "
                WHERE id  =
                    :id";  
 
        $stmt = $this->conn->prepare( $query );
        $id = $this->getId();
        $stmt->bindParam(':id', $id );
        $stmt->execute();
        while ($row =$stmt->fetch(PDO::FETCH_ASSOC)) {
            $this->setId($row['id']);
            $this->settitle($row['title']);
            $this->setDescription($row['description']);
            $result['id'] = $this->getId();
            $result['title'] = $this->gettitle();
            $result['description'] = $this->getDescription();

        }
        return $result;
    }

    public function CountAll(){
 
    $query = "SELECT id FROM " . $this->tblName . "";
 
    $stmt = $this->conn->prepare( $query );
    $stmt->execute();
 
    $num = $stmt->rowCount();
    return $num;
    }

    function Add($title,$description){
    $this->settitle($title);
    $this->setDescription($description);
        $query = "INSERT INTO " . $this->tblName . "
            SET title= :title,  description= :description";
        $stmt = $this->conn->prepare($query);
        $title = $this->gettitle();
        $description = $this->getDescription();
        // bind values 
        $stmt->bindParam(":title",$title  );
        $stmt->bindParam(":description",$description );
        if($stmt->execute()){
            return true;
        }else{
            return false;
        }
    }
    function Remove($id){
        $this->setId($id);
        $query = "DELETE FROM " . $this->tblName . " WHERE id = ?";
        $stmt = $this->conn->prepare($query);
        $id = $this->getId();
        $stmt->bindParam(1, $id); 
        if($result = $stmt->execute()){
            return true;
        }else{
            return false;
        }
    }
    function Update($id,$title,$description){
        $this->setId($id);
        $this->settitle($title);
        $this->setDescription($description);
        $query = "UPDATE
                " . $this->tblName . "
            SET
                title = :title ,
                description = :description 
               
            WHERE
                id = :id ";
 
        $stmt = $this->conn->prepare($query);
        // posted value
        // bind parameters
        $id  = $this->getId();
        $title = $this->gettitle();
        $description =  $this->getDescription();
        $stmt->bindParam(':title', $title);
        $stmt->bindParam(':description',$description);
        $stmt->bindParam(':id', $id);
        

        if($stmt->execute()){
            return true;
        }
        else{
            return false;
        } 
    }
}