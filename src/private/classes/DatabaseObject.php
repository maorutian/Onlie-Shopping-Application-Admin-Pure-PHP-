<?php


class DatabaseObject
{
    static protected $db;
    static protected $table_name = "";
    static protected $columns = [];
    public $errors = [];

    static public function set_database($db)
    {
        self::$db = $db;
    }

    static public function findsql_pass_obj($pdostm)
    {
        $result = $pdostm->execute();
        //no data return
        if (!$result) {
            exit("Database query failed.");
        }
        $object_array = [];
        while ($record = $pdostm->fetch(PDO::FETCH_ASSOC)) {
            $object_array[] = static::instantiate($record);
        }
        //print_r($object_array);
        return $object_array;
    }

    //add info in class but not in database
    static protected function instantiate($record)
    {
        $object = new static; //static means class name
        foreach ($record as $property => $value) { //property: $column name
            if (property_exists($object, $property)) {
                $object->$property = $value;
            }
        }
        return $object;
    }

    static public function find_all()
    {
        $sql = "SELECT * FROM " . static::$table_name;
        $pdostm = self::$db->prepare($sql);
        //get objects
        $object_array = static::findsql_pass_obj($pdostm);
        return $object_array;
    }

    static public function count_all()
    {
        $sql = "SELECT count(*) FROM " . static::$table_name;
        $pdostm = self::$db->prepare($sql);
        $result = $pdostm->execute();
        $row = $pdostm->fetch(PDO::FETCH_BOTH);
        $count = array_shift($row);
        return $count;
    }

    static public function find_all_pagination($pagination)
    {
        "SELECT * FROM table LIMIT :limit OFFSET :offset";
        $sql = "SELECT * FROM " . static::$table_name . " ";
        $sql .= "LIMIT :limit ";
        $sql .= "OFFSET :offset";
        $pdostm = self::$db->prepare($sql);
        $pdostm->bindValue(':limit', (int) $pagination->per_page, PDO::PARAM_INT);
        $pdostm->bindValue(':offset', (int) $pagination->offset(), PDO::PARAM_INT);
        //get object
        $object_array = static::findsql_pass_obj($pdostm);
        return $object_array;
    }


    static public function find_by_id($id)
    {
        $sql = "SELECT * FROM " . static::$table_name . " ";
        $sql .= "WHERE id= :id";
        $pdostm = self::$db->prepare($sql);
        $pdostm->bindValue(':id', $id, PDO::PARAM_INT);
        //get object
        $obj_array = static::findsql_pass_obj($pdostm);
        //var_dump($obj_array);
        if (!empty($obj_array)) {
            //array_shift: remove[0]=> object(Product)#3
            return array_shift($obj_array);
        } else {
            return false;
        }
    }


    public function save()
    {
        // A new record will not have an ID yet
        if (isset($this->id)) {
            return $this->update();
        } else {
            return $this->create();
        }
    }


    protected function create()
    {
        $this->validate();
        if (!empty($this->errors)) {
            return false;
        }

        $attributes_array_no_id = $this->get_attributes_array_no_id();

        $sql = "INSERT INTO " . static::$table_name . " (";
        $sql .= join(', ', array_keys($attributes_array_no_id));//array_keys($array):get a new array only have key in old one
        $sql .= ") VALUES (:";
        $sql .= join(', :', array_keys($attributes_array_no_id));
        $sql .= ")";

        $pdostm = self::$db->prepare($sql);
        foreach ($attributes_array_no_id as $key => $value){
            $pdostm->bindValue(":$key", $value, PDO::PARAM_STR);
        }
        $result  = $pdostm->execute();//true or false
        if($result) {
            $this->id = self::$db->lastInsertId();
        }
        return $result;

    }


    //$attributes_array: array, key -- database column, excluding ID, value -- data
    //e.g. Array ( [name] => Baked blueberry cheesecake [price] => 80.00 [category] => cake )
    //For reuse create function
    public function get_attributes_array_no_id()
    {
        $attributes_array_no_id = [];
        foreach (static::$db_columns as $column) {
            if ($column == 'id') {
                continue;
            }
            $attributes_array_no_id[$column] = $this->$column;//$this->$column: go through $this->name,$this->price
        }
        return $attributes_array_no_id;
    }


    protected function update()
    {
        $this->validate();
        if (!empty($this->errors)) {
            return false;
        }

        $attributes_array_no_id = $this->get_attributes_array_no_id();

        $attribute_update = [];
        foreach ($attributes_array_no_id as $key => $value) {
            $attribute_update[] = "$key = :$key";
        }
        var_dump($attribute_update);
        print_r($attribute_update);

        $sql = "UPDATE " . static::$table_name . " SET ";
        $sql .= join(', ', $attribute_update);
        $sql .= " WHERE id = :id";
        $pdostm = self::$db->prepare($sql);
        $pdostm->bindValue(':id', $this->id, PDO::PARAM_INT);
        foreach ($attributes_array_no_id as $key => $value){
            $pdostm->bindValue(":$key", $value, PDO::PARAM_STR);
        }
        $result = $pdostm->execute();//true or false
        return $result;

    }

    //update object property
    public function update_property($args = [])
    {
        foreach ($args as $key => $value) {
            //if a property didn't show up on the form OR we ended up defaulting to null,it's not going to update the attribute.
            if (property_exists($this, $key) && !is_null($value)) {
                $this->$key = $value;
            }
        }
    }

    public function delete()
    {
        $sql = "DELETE FROM " . static::$table_name . " ";
        $sql .= "WHERE id= :id";
        $pdostm = self::$db->prepare($sql);
        $pdostm->bindValue(':id', $this->id, PDO::PARAM_INT);
        $result = $pdostm->execute();//true or false
        return $result;
    }


    protected function validate()
    {
        $this->errors = [];
        // Add custom validations
        return $this->errors;
    }


}