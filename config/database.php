<?php
/**
 * Database Connection Manager
 * 
 * Handles all database connections and queries
 */

class Database {
    private $host = DB_HOST;
    private $user = DB_USER;
    private $pass = DB_PASS;
    private $db_name = DB_NAME;
    private $port = DB_PORT;
    private $conn;
    
    /**
     * Connect to database
     */
    public function connect() {
        $this->conn = new mysqli(
            $this->host,
            $this->user,
            $this->pass,
            $this->db_name,
            $this->port
        );
        
        // Check connection
        if ($this->conn->connect_error) {
            die('Connection Error: ' . $this->conn->connect_error);
        }
        
        // Set charset to utf8mb4
        $this->conn->set_charset('utf8mb4');
        
        return $this->conn;
    }
    
    /**
     * Get connection instance
     */
    public function getConnection() {
        if (!$this->conn) {
            $this->connect();
        }
        return $this->conn;
    }
    
    /**
     * Execute prepared statement query
     */
    public function query($sql, $params = [], $types = '') {
        $conn = $this->getConnection();
        
        // Prepare statement
        $stmt = $conn->prepare($sql);
        
        if (!$stmt) {
            throw new Exception('Prepare failed: ' . $conn->error);
        }
        
        // Bind parameters if provided
        if (!empty($params)) {
            if (empty($types)) {
                // Auto-detect types
                $types = '';
                foreach ($params as $param) {
                    if (is_int($param)) {
                        $types .= 'i';
                    } elseif (is_float($param)) {
                        $types .= 'd';
                    } else {
                        $types .= 's';
                    }
                }
            }
            
            $stmt->bind_param($types, ...$params);
        }
        
        // Execute statement
        if (!$stmt->execute()) {
            throw new Exception('Execute failed: ' . $stmt->error);
        }
        
        return $stmt;
    }
    
    /**
     * Get single row result
     */
    public function getRow($sql, $params = [], $types = '') {
        $stmt = $this->query($sql, $params, $types);
        $result = $stmt->get_result();
        $row = $result->fetch_assoc();
        $stmt->close();
        
        return $row;
    }
    
    /**
     * Get multiple rows result
     */
    public function getRows($sql, $params = [], $types = '') {
        $stmt = $this->query($sql, $params, $types);
        $result = $stmt->get_result();
        $rows = [];
        
        while ($row = $result->fetch_assoc()) {
            $rows[] = $row;
        }
        
        $stmt->close();
        return $rows;
    }
    
    /**
     * Insert data and get last insert ID
     */
    public function insert($sql, $params = [], $types = '') {
        $stmt = $this->query($sql, $params, $types);
        $lastId = $stmt->insert_id;
        $stmt->close();
        
        return $lastId;
    }
    
    /**
     * Update or delete data and get affected rows
     */
    public function execute($sql, $params = [], $types = '') {
        $stmt = $this->query($sql, $params, $types);
        $affectedRows = $stmt->affected_rows;
        $stmt->close();
        
        return $affectedRows;
    }
    
    /**
     * Close database connection
     */
    public function close() {
        if ($this->conn) {
            $this->conn->close();
        }
    }
    
    /**
     * Get database error
     */
    public function getError() {
        return $this->conn->error;
    }
}

?>
