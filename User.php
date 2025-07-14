
<?php
class User {
    public $name;
    public $email;

    public function __construct($name, $email) {
        $this->name = $name;
        $this->email = $email;
    }

    public function getDetails() {
        return "My name is {$this->name} and my email is {$this->email}";
    }
}
