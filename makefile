all:
	haml views/templates/index.php.haml index.php
	haml views/templates/menu.php.haml views/rendered/menu.php
	haml views/templates/section.php.haml views/rendered/section.php
	haml views/templates/login.php.haml views/rendered/login.php
	sass views/styles views/rendered

watch:
	sass --watch views/styles:views/rendered
