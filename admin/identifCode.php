<?php
	header("Content-type:image/jpeg");
	//第一步创建画布
	session_start();
	$im=imagecreate(115,45);
	//2.处理图像\
	$orange=imagecolorallocate($im,63, 151, 201);//创建一个蓝色底
	$white=imagecolorallocate($im,255,255,255);//创建一个白色
	
	
	imagefill($im,0,0,$orange);//给画布填充颜色
	
	
	$letter = array('A','b','c','d','E','f','g','h','i','j','K','L','m','n','o','p','q','r','s','T','u','v','W','x','y','z','3','4','5','8');
	
	$a=$letter[mt_rand(0,29)];
	$b=$letter[mt_rand(0,29)];
	$c=$letter[mt_rand(0,29)];
	$d=$letter[mt_rand(0,29)];
	$e=$letter[mt_rand(0,29)];
	
	$str=$a.$b.$c.$d.$e;
	$_SESSION["code"]=$str;
	for($i=0;$i<8;$i++){
		//imagesetpixel($im,mt_rand(0,400),mt_rand(0,400),$white);
		imageline($im,mt_rand(0,115),mt_rand(0,46),mt_rand(0,115),mt_rand(0,46),$white);//干扰元素
	}
	
	
	imagettftext($im,24,mt_rand(0,40),10,32,$white,"Font/hxw.otf",$a);
	imagettftext($im,24,mt_rand(0,40),30,32,$white,"Font/hxw.otf",$b);
	imagettftext($im,24,mt_rand(0,40),50,32,$white,"Font/hxw.otf",$c);
	imagettftext($im,24,mt_rand(0,40),70,32,$white,"Font/hxw.otf",$d);
	imagettftext($im,24,mt_rand(0,40),90,32,$white,"Font/hxw.otf",$e);
	
	//3.输出图像
	imagejpeg($im);

	//4.释放资源
	imagedestroy($im);

?>