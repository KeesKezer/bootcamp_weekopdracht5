<?php
  $names = array("John", "Eva", "Marcel", "Ronald");
  end($names);

  while(!is_null($key = key($names)))
  {
  	$val = current($names);
  	echo "$key => $val\n";
  	prev($names);
    echo $key ($names);
  }
?>
