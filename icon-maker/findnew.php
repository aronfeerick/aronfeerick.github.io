<?
foreach(json_decode(file_get_contents("./stored/list.json"),true) as $json){
 foreach($json['apps'] as $app){@$applications[]=strToLower($app);} 
}
foreach(glob("./res/**/*.png") as $image){ 
 $new="ic~".str_replace("___","~",substr(pathinfo($image)['filename'],3));
 $new=pathinfo($image)['dirname']."/".$new.".".pathinfo($image)['extension'];
 $data=explode("~",strToLower(pathinfo($new)['filename']));
 if(in_array(strToLower($data[1]."/".$data[2]),$applications)==false){
  echo"<img id='thumb' src='{$new}' raw='".pathinfo($new)['filename']."'/>\n";
  if($image!=$new){rename($image,$new);}  
 }else{unlink($image);}
}
foreach(glob("./res/**") as $dir){ 
 @rmdir($dir);
}
?>