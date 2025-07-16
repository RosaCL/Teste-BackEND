<?php 
namespace Strong_pass\Validators;

class passwordStrong{
    
    private $value;
    
    public function __construct($value)
    {
        $this->value = $value;
    }
    public function isValid():bool{
        return (
            mb_strlen($this->value) >= 8 
            && preg_match('/[A-Z]/', $this->value)
            && preg_match('/[a-z]/', $this->value)
            && preg_match('/[0-9]/', $this->value)
            && preg_match('/[!@#$%^&*]/', $this->value)
        
        );
        

    }


}


?>