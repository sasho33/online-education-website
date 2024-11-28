<?php
function tt($value){
    echo '<pre>';
    print_r($value);
    echo '</pre>';
    exit();
}
// INSERT function
function dbCheckError($stmt) {
    if ($stmt->errorCode() !== '00000') { // If there's an error
        $errorInfo = $stmt->errorInfo(); // Get the error information
        // Optionally log the error, or echo it (depending on your needs)
        echo "Database error: " . $errorInfo[2];
    }
}

function insert($table, $data)
{
    global $pdo; 

        $columns = implode(", ", array_keys($data));
    $placeholders = ":" . implode(", :", array_keys($data));
    $sql = "INSERT INTO $table ($columns) VALUES ($placeholders)";
    $stmt = $pdo->prepare($sql);
    
    // dbCheckError($stmt);
       
    if ($stmt->execute($data)) {
        return true; 
    } else {
             $errorInfo = $stmt->errorInfo();
        
        echo "Error inserting data: " . $errorInfo[2];
        return false; 
    }
}


// UPDATE function
function update($table, $data, $conditions)
{
    global $pdo; // Access the globally defined $pdo
    $setClause = implode(", ", array_map(fn($key) => "$key = :$key", array_keys($data)));
    $conditionClause = implode(" AND ", array_map(fn($key) => "$key = :cond_$key", array_keys($conditions)));
    
    $sql = "UPDATE $table SET $setClause WHERE $conditionClause";
    $stmt = $pdo->prepare($sql);

    $params = array_merge($data, array_combine(
        array_map(fn($key) => "cond_$key", array_keys($conditions)),
        array_values($conditions)
    ));
    // dbCheckError($stmt);
    return $stmt->execute($params);
}

// DELETE function
function delete($table, $conditions)
{
    global $pdo; // Access the globally defined $pdo
    $conditionClause = implode(" AND ", array_map(fn($key) => "$key = :$key", array_keys($conditions)));
    $sql = "DELETE FROM $table WHERE $conditionClause";
    
    $stmt = $pdo->prepare($sql);
    return $stmt->execute($conditions);
}

// SELECT function
function select($table, $conditions = [], $columns = "*")
{
    global $pdo; // Access the globally defined $pdo
    $conditionClause = $conditions ? "WHERE " . implode(" AND ", array_map(fn($key) => "$key = :$key", array_keys($conditions))) : "";
    $sql = "SELECT $columns FROM $table $conditionClause";

    $stmt = $pdo->prepare($sql);
    $stmt->execute($conditions);
    // dbCheckError($stmt);
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}