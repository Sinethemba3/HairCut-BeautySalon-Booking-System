<?php
    #[AllowDynamicProperties]
    
    class Model extends Database
    {
        protected $afterSelect    = [];
        protected $beforeInsert   = [];
        protected $beforeUpdate   = [];
        protected $allowedColumns = [];

        public $limit           = 10;
        public $offset 		    = 0;
        public $order_type 	    = "desc";
        public $order_column    = "id";
        public $errors 		    = [];

        public function __construct()
        {
            if(!property_exists($this, 'table'))
            {
                $this->table = strtolower(get_class($this)) . 's';
            }
        }

        protected function get_primary_key($table)
        {
            $query = "SHOW KEYS FROM $table WHERE key_name = 'PRIMARY'";
            $db    = new Database();
            $data  = $db->query($query);

            if (!empty($data[0])) {
                # code...
                return $data[0]->Column_name;
            }

            return 'id';
        }

        protected function runAfterSelect($data)
        {
            if (!empty($this->afterSelect) && is_array($data)) {
                foreach ($this->afterSelect as $func) {
                    if (method_exists($this, $func)) {
                        $data = $this->$func($data);
                    }
                }
            }
            return $data;
        }

        protected function runBeforeInsert($data)
        {
            foreach ($this->beforeInsert as $func) {
                if (method_exists($this, $func)) {
                    $data = $this->$func($data);
                }
            }
            return $data;
        }

        protected function runBeforeUpdate($data)
        {
            foreach ($this->beforeUpdate as $func) {
                if (method_exists($this, $func)) {
                    $data = $this->$func($data);
                }
            }
            return $data;
        }

        protected function runAllowedColumns($data)
        {
            if (!empty($this->allowedColumns)) {
                foreach ($data as $key => $value) {
                    if (!in_array($key, $this->allowedColumns, true)) {
                        unset($data[$key]);
                    }
                }
            }

            return $data;
        }

        public function where($column, $value, $orderby = 'desc', $limit = 8, $offset = 0)
        {
            $column = addslashes($column);
            $primary_key = $this->get_primary_key($this->table);

            $query = "SELECT * FROM $this->table WHERE $column = :value ORDER BY $primary_key $orderby LIMIT $limit OFFSET $offset";
            $data = $this->query($query, [
                "value"=>$value
            ]);

            // run functions after select
            $data = $this->runAfterSelect($data);

            return $data;
        }

        public function where1($data, $data_not = [])
        {
            $keys = array_keys($data);
            $keys_not = array_keys($data_not);
            $query = "select * from $this->table where ";

            foreach ($keys as $key) {
                $query .= $key . " = :". $key . " && ";
            }

            foreach ($keys_not as $key) {
                $query .= $key . " != :". $key . " && ";
            }
            
            $query = trim($query," && ");

            $query .= " order by $this->order_column $this->order_type limit $this->limit offset $this->offset";
            $data = array_merge($data, $data_not);

            return $this->query($query, $data);
        }
        
        public function first1($data, $data_not = [])
        {
            $keys = array_keys($data);
            $keys_not = array_keys($data_not);
            $query = "select * from $this->table where ";

            foreach ($keys as $key) {
                $query .= $key . " = :". $key . " && ";
            }

            foreach ($keys_not as $key) {
                $query .= $key . " != :". $key . " && ";
            }
            
            $query = trim($query," && ");

            $query .= " limit $this->limit offset $this->offset";
            $data = array_merge($data, $data_not);
            
            $result = $this->query($query, $data);
            if($result)
                return $result[0];

            return false;
        }

        // public function first($column, $value, $orderby = 'desc')
        // {
        //     $column = addslashes($column);
        //     $primary_key = $this->get_primary_key($this->table);

        //     $query = "SELECT * FROM $this->table WHERE $column = :value ORDER BY $primary_key $orderby";
        //     $data = $this->query($query, [
        //         "value"=>$value
        //     ]);

        //     // run functions after select
        //     $data = $this->runAfterSelect($data);

        //     return is_array($data) ? $data[0] : false;
        // }

        public function first($column, $value = null, $orderby = 'desc')
        {
            $primary_key = $this->get_primary_key($this->table);
            $params = [];

            // ✅ NEW: Array-style conditions
            if (is_array($column)) {

                $conditions = [];

                foreach ($column as $key => $val) {
                    $key = addslashes($key);
                    $conditions[] = "$key = :$key";
                    $params[$key] = $val;
                }

                $where = implode(' AND ', $conditions);

                $query = "SELECT * FROM $this->table
                        WHERE $where
                        ORDER BY $primary_key $orderby
                        LIMIT 1";
            }
            // ✅ OLD: column/value style (unchanged)
            else {
                $column = addslashes($column);

                $query = "SELECT * FROM $this->table
                        WHERE $column = :value
                        ORDER BY $primary_key $orderby
                        LIMIT 1";

                $params = ['value' => $value];
            }

            $data = $this->query($query, $params);

            // Run after-select hooks
            $data = $this->runAfterSelect($data);

            return is_array($data) ? $data[0] : false;
        }

        public function findAll($orderby = 'desc', $limit = 100, $offset = 0)
        {
            $primary_key = $this->get_primary_key($this->table);

            $query = "SELECT * FROM $this->table ORDER BY $primary_key $orderby LIMIT $limit OFFSET $offset";
            $data = $this->query($query);

            if (!$data) {
                error_log("Failed to retrieve records from $this->table");
                return false; // Return false on query failure
            }

            // run functions after select
            $data = $this->runAfterSelect($data);

            return $data;
        }

        public function get_transaction($column, $value, $user_id, $orderby = 'desc')
        {
            $column = addslashes($column);
            $primary_key = $this->get_primary_key($this->table);

            $query = "SELECT * FROM $this->table 
                    WHERE $column = :value 
                    AND user_id = :user_id 
                    ORDER BY $primary_key $orderby";

            $data = $this->query($query, [
                "value"   => $value,
                "user_id" => $user_id
            ]);

            $data = $this->runAfterSelect($data);

            return is_array($data) ? $data[0] : false;
        }

        public function insert($data)
        {
            // remove unwanted columns
            $data = $this->runAllowedColumns($data);
            
            // run functions before insert
            $data = $this->runBeforeInsert($data);

            $keys = array_keys($data);
            $columns = implode(",", $keys);
            $values = implode(",:", $keys);

            $query = "INSERT INTO  $this->table ($columns) VALUES (:$values)";
            return $this->query($query, $data);
        }

        public function inserts($data)
        {  
            /** remove unwanted data **/
            $data = $this->runAllowedColumns($data);

            $keys = array_keys($data);

            $query = "insert into $this->table (".implode(",", $keys).") values (:".implode(",:", $keys).")";
            $this->query($query, $data);

            return false;
        }

        public function update($id, $data)
        {
            // remove unwanted columns
            $data = $this->runAllowedColumns($data);

            // run functions before update
            $data = $this->runBeforeUpdate($data);

            $str = "";
            foreach ($data as $key => $value) {
                $str .= "$key = :$key,";
            }

            $str = trim($str, ",");

            $data['id'] = $id;
            $data['user_id'] = $id;

            $query = "UPDATE $this->table SET $str WHERE id = :id OR user_id = :user_id";
            return $this->query($query, $data);
        }

        public function delete($id, $user_id = null)
        {
            $params = ['id' => $id];
            $query = "DELETE FROM {$this->table} WHERE id = :id";

            if ($user_id !== null) {
                $query .= " OR user_id = :user_id";
                $params['user_id'] = $user_id;
            }

            return $this->query($query, $params);
        }
    }
    