<?php

class Article
{
    //DB Staff
    private $conn;
    private $table = "article";

    // Article Props

    public $id;
    public $doctor_id;
    public $title;
    public $body;
    public $image;
    public $link;
    public $created_at;

    //constructor
    public function __construct($db)
    {
        $this->conn = $db;
    }

    //Get Article

    public function read()
    {

        $query = 'SELECT * FROM ' . $this->table;

        //prepare statement

        $stmt = $this->conn->prepare($query);
        // Execute query
        $stmt->execute();
        return $stmt;
    }

    public function read_single()
    {
        // Create query
        $query = 'SELECT * FROM ' . $this->table . ' WHERE id=? LIMIT 0,1 ';
        // Prepare statement
        // Blog Article query


        $stmt = $this->conn->prepare($query);

        // Bind ID
        $stmt->bindParam(1, $this->id);

        // Execute query
        $stmt->execute();

        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        if ($row == 0) {
            // No article
            echo json_encode(
                array('message' => 'No article Found with these ID')
            );
        } else {
            // Set properties
            $this->id = $row['id'];
            $this->doctor_id = $row['doctor_id'];
            $this->title = $row['title'];
            $this->body = $row['body'];
            $this->image = $row['image'];
            $this->link = $row['link'];
            $this->created_at = $row['created_at'];
        }

    }

    public function read_articles_by_doc_id()
    {
        // Create query
        $query = 'SELECT * FROM ' . $this->table . ' WHERE doctor_id=? ';
        // Prepare statement
        $stmt = $this->conn->prepare($query);
        // Bind ID
        $stmt->bindParam(1, $this->id);
        // Execute query
        $stmt->execute();

        return $stmt;

    }
    // Create Article
    public function create() {
        // Create query
        $query = 'INSERT INTO ' . $this->table . ' SET  doctor_id = :doctor_id, title = :title, body = :body, image = :image, link = :link';

        // Prepare statement
        $stmt = $this->conn->prepare($query);
        // Clean data

        $this->doctor_id = htmlspecialchars(strip_tags($this->doctor_id));
        $this->title = htmlspecialchars(strip_tags($this->title));
        $this->body = htmlspecialchars(strip_tags($this->body));
        $this->image = htmlspecialchars(strip_tags($this->image));
        $this->link = htmlspecialchars(strip_tags($this->link));


        // Bind data
        $stmt->bindParam(':doctor_id', $this->doctor_id);
        $stmt->bindParam(':title', $this->title);
        $stmt->bindParam(':body', $this->body);
        $stmt->bindParam(':image', $this->image);
        $stmt->bindParam(':link', $this->link);
        // Execute query
        if( $stmt->execute()) {
            return true;
        }

        // Print error if something goes wrong
        printf("Error: %s.\n", $stmt->error);

        return false;
    }

    // Update Post
    public function update() {
        // Create query
        $query = ' UPDATE ' . $this->table . ' SET  doctor_id = :doctor_id, title = :title, body = :body, image = :image, link = :link WHERE id = :id';

        // Prepare statement
        $stmt = $this->conn->prepare($query);


        $this->doctor_id = htmlspecialchars(strip_tags($this->doctor_id));
        $this->title = htmlspecialchars(strip_tags($this->title));
        $this->body = htmlspecialchars(strip_tags($this->body));
        $this->image = htmlspecialchars(strip_tags($this->image));
        $this->link = htmlspecialchars(strip_tags($this->link));
        $this->id = htmlspecialchars(strip_tags($this->id));


        // Bind data
        $stmt->bindParam(':doctor_id', $this->doctor_id);
        $stmt->bindParam(':title', $this->title);
        $stmt->bindParam(':body', $this->body);
        $stmt->bindParam(':image', $this->image);
        $stmt->bindParam(':link', $this->link);
        $stmt->bindParam(':id', $this->id);


        // Execute query
        if( $stmt->execute()) {
            return true;
        }

        // Print error if something goes wrong
        printf("Error: %s.\n", $stmt->error);

        return false;
    }

    // Delete Post
    public function delete() {
        // Create query
        $query = 'DELETE FROM ' . $this->table . ' WHERE id = :id';

        // Prepare statement
        $stmt = $this->conn->prepare($query);

        // Clean data
        $this->id = htmlspecialchars(strip_tags($this->id));

        // Bind data
        $stmt->bindParam(':id', $this->id);

        // Execute query
        if($stmt->execute()) {
            return true;
        }

        // Print error if something goes wrong
        printf("Error: %s.\n", $stmt->error);

        return false;
    }

}