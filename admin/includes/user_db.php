<?php

require "database.php";

class User_db extends Db_object
{
    protected static $db_table = "Users";
    protected static $db_table_fields = ['username', 'password', 'first_name', 'last_name', 'user_image'];
    public $id;
    public $username;
    public $password;
    public $first_name;
    public $last_name;
    public $user_image;
    public $upload_directory = "images";
    public $image_placeholder = "https://via.placeholder.com/150";


    public function image_path_or_placeholder()
    {
        return empty($this->user_image) ? $this->image_placeholder : $this->upload_directory . DS . $this->user_image;
    }

    public function save_user_and_image()
    {
        if (!empty($this->errors)) {
            return false;
        }
        if (empty($this->user_image) || empty($this->tmp_path)) {
            $this->errors[] = "the file was not avialable";
            return false;
        }
        $target_pass = SITE_ROOT . DS . 'admin' . DS . $this->upload_directory . DS . $this->user_image;
        if (file_exists($target_pass)) {
            $this->errors[] = "The file {$this->user_image} already exists";
            return false;
        }
        if (move_uploaded_file($this->tmp_path, $target_pass)) {
            if ($this->create()) {
                unset($this->tmp_path);
                return true;
            }
        } else {
            $this->errors[] = "the file directory probably does not have permission";
            return false;
        }
        $this->create();
    }

    public static function verify_user($username, $password)
    {
        global $database;
        $username = $database->escape_string($username);
        $password = $database->escape_string($password);

        $sql = "SELECT * FROM " . self::$db_table . " WHERE ";
        $sql .= "username  = '{$username}'";
        $sql .= "AND password = '{$password}'";
        $sql .= "LIMIT 1";
        $the_result_array = self::find_by_query($sql);
        return !empty($the_result_array) ? array_shift($the_result_array) : false;
    }
}