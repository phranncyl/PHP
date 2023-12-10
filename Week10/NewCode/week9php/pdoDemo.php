<?php
require 'templates/header.php';
?>
<main>
    <section class="masthead about-masthead">
        <div>
            <h1>PDO and Error Handling Example</h1>
        </div>
    </section>
    <section class="row content-row">
        <div>
            <?php
            $host = 'localhost';
            $dbname = 'mydb';
            $username = 'root';
            $password = '';

            try {
                // Establish database connection with error handling
                $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
                $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                
                // Set fetch mode to fetch associative arrays
                $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
            
                // SQL query
                $sql = "SELECT * FROM customer";
            
                // Prepare and execute the query
                $stmt = $pdo->prepare($sql);
                $stmt->execute();
            
                // Fetch results using the specified fetch mode (associative arrays)
                $customers = $stmt->fetchAll();
            
                // Display results
                foreach ($customers as $customer) {
                    echo "User ID: " . $customer['id'] . ", Name: " . $customer['name'] . "<br>";
                }
            } catch (PDOException $e) {
                // Handle database connection errors
                echo "Connection failed: " . $e->getMessage() ."<br>";
                // echo "Error code: " . $e->getCode();
                echo "Error info: " . $e->getLine();
            }
            ?>
        </div>
    </section>
    <section>
        <div>
            <?php
            require 'templates/footer.php';
            ?>
        </div>
    </section>