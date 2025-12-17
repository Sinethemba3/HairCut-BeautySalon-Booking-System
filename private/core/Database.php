<?php
    class Database
    {
        private function connect()
        {
            $string = DBDRIVER.":host=".DBHOST.";dbname=".DBNAME;

            if (!$conn = new PDO($string, DBUSER, DBPASS)) {
                die("Could not connect to database");
            }
            return $conn;
        }

        public function query($query, $data = [], $data_type = "object")
        {
            $conn = $this->connect();
            $stmt = $conn->prepare($query);

            $result = false;

            // Convert array values in $data to strings
            foreach ($data as $key => $value) {
                if (is_array($value)) {
                    $data[$key] = implode(', ', $value); // Join array elements into a comma-separated string
                }
            }

            if ($stmt) {
                $executed = $stmt->execute($data); // Execute the query with the processed data array

                if ($executed) { // Check if the execution was successful
                    if ($data_type == "object") {
                        $result = $stmt->fetchAll(PDO::FETCH_OBJ); // Fetch as objects
                    } else {
                        $result = $stmt->fetchAll(PDO::FETCH_ASSOC); // Fetch as associative array
                    }
                }
            }

            // Run functions after select
            // if (is_array($result)) {
            //     if (property_exists($this, 'afterSelect')) {
            //         foreach ($this->afterSelect as $func) {
            //             $result = $this->$func($result);
            //         }
            //     }
            // }

            if (is_array($result) && count($result) > 0) {
                return $result;
            }

            return false;
        }
    }