<?php
  namespace Must;

  class Member 
  {
  	public $name;
  	public $email;
    public $path;
  	public $passwordMD5;
    public $circle;
    public $library;
    public $next;
    public $favs;

    static function absolutePath($path)
    {
      return 'data/members/'.$path.'.json';
    }

    function __construct($path)
    {
    	$member = json_decode(file_get_contents(Member::absolutePath($path)));
      foreach($member as $key => $value)
        $this->$key = $value;
	  }

	  static function login($memberName, $memberPassword)
	  {
		  $member = new Member($memberName);
		  return ($member && $member->passwordMD5 == md5($memberPassword));
	  }
  }
?>