<?php


class Product extends DatabaseObject
{
    static protected $table_name = 'products';
    static protected $db_columns = ['id', 'name', 'price', 'category'];
    public $id;
    public $name;
    public $price;
    public $category;
    public const CATEGORIES = ['Cake', 'Cookie'];

    public function __construct($args = [])
    {
        $this->name = $args['name'] ?? '';
        $this->price = $args['price'] ?? 0;
        $this->category = $args['category'] ?? '';

    }

    protected function validate() {
        $this->errors = [];

        if(is_blank($this->name)) {
            $this->errors[] = "Name cannot be blank.";
        } elseif (!has_length($this->name, array('min' => 2, 'max' => 255))) {
            $this->errors[] = "Name must be between 2 and 255 characters.";
        }

        if(is_blank($this->price)) {
            $this->errors[] = "Price cannot be blank.";
        } elseif (!has_valid_number($this->price)) {
            $this->errors[] = "Price should be number.";
        }

        if(is_blank($this->category)) {
            $this->errors[] = "Category cannot be blank.";
        }

        return $this->errors;
    }

}