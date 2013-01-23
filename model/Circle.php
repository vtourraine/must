<?php
  namespace Must;

  class Circle 
  {
    public $name;
    public $path;
    public $members = array();

    static function absolutePath($path)
    {
      return 'data/circles/'.$path.'.json';
    }

    function __construct($path)
    {
    	$circle = json_decode(file_get_contents(Circle::absolutePath($path)));
      foreach($circle as $key => $value)
        $this->$key = $value;
    }
  }
?>