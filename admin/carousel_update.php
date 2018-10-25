<?php  
	require("../include/conn.php");
	
	$Id=@$_GET["Id"];

	$sql="select * from ite_carousel where Id=".$Id."";
	//exit($sql);
	$result=mysql_query($sql);
	$result_array=mysql_fetch_array($result);
	//exit($result_array);
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>index-carousel-update</title>
        <meta name="renderer" content="webkit">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
        <meta name="apple-mobile-web-app-status-bar-style" content="black">
        <meta name="apple-mobile-web-app-capable" content="yes">
        <meta name="format-detection" content="telephone=no">
        <link rel="stylesheet" href="./css/x-admin.css" media="all">
    </head>
    
    <body>
        <div class="x-body">
            <form action="carousel_deal.php?act=update" method="post" class="layui-form" enctype="multipart/form-data">
                <div class="layui-form-item">
                    <label for="link2" class="layui-form-label">
                        <span class="x-red">*</span>小标题
                    </label>
                    <div class="layui-input-inline">
                        <input type="text" id="link2" name="subtitle" class="layui-input" value="<?php echo $result_array["subtitle"]; ?>">
                        
                    </div>
                </div>
                <div class="layui-form-item">
                    <label for="link3" class="layui-form-label">
                        <span class="x-red">*</span>大标题
                    </label>
                    <div class="layui-input-inline">
                        <input type="text" id="link3" name="headlines" class="layui-input" value="<?php echo $result_array["headlines"]; ?>">
                    </div>
                </div>
                <div class="layui-form-item">
                    <label for="link4" class="layui-form-label">
                        <span class="x-red">*</span>原价
                    </label>
                    <div class="layui-input-inline">
                        <input type="text" id="link4" name="originalPrice" class="layui-input" value="<?php echo $result_array["originalPrice"]; ?>">
                    </div>
                </div>
                <div class="layui-form-item">
                    <label for="link5" class="layui-form-label">
                        <span class="x-red">*</span>现价
                    </label>
                    <div class="layui-input-inline">
                        <input type="text" id="link5" name="presentPrice" class="layui-input" value="<?php echo $result_array["presentPrice"]; ?>">
                    </div>
                </div>
            
                <div class="layui-form-item">
                    <label class="layui-form-label">
                        <span class="x-red">*</span>图片
                    </label>
                    <div class="layui-input-inline">
                      <div class="site-demo-upbar">
           	 			<input type="hidden" name="upfile_r"  id="prdPicUrl" value="<?php echo $result_array["fileName"]; ?>" />
				        <input type="file" name="upfile"  id="prdPicUrl" onchange="document.getElementById('prdPicUrl_1').value=this.value" />
				        <input id="prdPicUrl_1" type="text" class="layui-input" value="<?php
								if($result_array["fileName"]==""){
									echo "upload/180621/1529551482691395.jpg";
								}else{
									echo $result_array["fileName"];
								}
							 ?>">
                      </div>
                    </div>
                </div>
                <div class="layui-form-item">
                    <label class="layui-form-label">
                        <span class="x-red">*</span>原图预览
                    </label>
                    <div class="layui-input-inline">
                      <div class="site-demo-upbar">
           	 			<figure>
				            <img src='<?php
								if($result_array["fileName"]==""){
									echo "upload/180621/1529551482691395.jpg";
								}else{
									echo $result_array["fileName"];
								}
							?>' alt="<?php echo $result_array["headlines"]; ?>" title="<?php echo $result_array["headlines"]; ?>" id="img" />
				        </figure>
                      </div>
                    </div>
                </div>
                <div class="layui-form-item">
                    <label for="link6" class="layui-form-label">
                        <span class="x-red">*</span>文字信息
                    </label>
                    <div class="layui-input-inline">
                        <textarea id="link6" name="synopsis" 
                        placeholder="简介" class="layui-textarea fly-editor" style="height: 260px;"><?php echo $result_array["synopsis"]; ?></textarea>
                        <input type="hidden" value="<?php echo $result_array["Id"]; ?>" name="Id" />
                    </div>
                    <div class="layui-form-mid layui-word-aux">
                        <span class="x-red">*</span>
                    </div>
                </div>
                <div class="layui-form-item">
                    <label for="L_repass" class="layui-form-label">
                    </label>
                    <button class="layui-btn">
                        	完成
                    </button>
                </div>
            </form>
        </div>
        <script src="./lib/layui/layui.js" charset="utf-8"></script>
        <script src="./js/x-layui.js" charset="utf-8"></script>
        <script>
            layui.use(['form','layer','upload'], function(){
                $ = layui.jquery;
              var form = layui.form()
              ,layer = layui.layer;
            });
        </script>
       
    </body>

</html>