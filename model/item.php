<?php
  namespace Must;

  class Item 
  {
    public $title;
    public $path;
    public $type;
    public $tags;
    public $links;
    public $authors;
    public $related;
    public $year;

    static function absolutePath($path)
    {
    	return 'data/items/'.$path.'.json';
    }

    function __construct($path)
    {
    	$item = json_decode(file_get_contents(Item::absolutePath($path)));
    	foreach($item as $key => $value)
    		$this->$key = $value;
	}
  }
?>