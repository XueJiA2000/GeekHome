<?php  
	require("../include/conn.php");
	
	$Id=@$_GET["Id"];
	
	$sql="select * from ite_product where Id=".$Id."";
	//exit($sql);
	$result=mysql_query($sql);
	$result_array=mysql_fetch_array($result);
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>index-product-商品信息修改</title>
        <meta name="renderer" content="webkit">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
        <meta name="apple-mobile-web-app-status-bar-style" content="black">
        <meta name="apple-mobile-web-app-capable" content="yes">
        <meta name="format-detection" content="telephone=no">
        <link rel="stylesheet" href="./css/x-admin.css" media="all">
        <link rel="shortcut icon" href="images/geek-icon.png" rel="shortcut icon" type="image/x-icon">
        <script type="text/javascript" src="editor/kindeditor.js"></script>
    </head>
     <!--调用文本编辑器-->
    <script type="text/javascript">
	    KE.show({
	        id : 'content7',
	        cssPath : './index.css'
	    });
	</script>
    <body>
        <div class="x-body">
            <form action="product_deal.php?act=update" method="post" class="layui-form" enctype="multipart/form-data">
                <div class="layui-form-item">
                    <label for="link2" class="layui-form-label">
                        <span class="x-red">*</span>类别
                    </label>
                    <div class="layui-input-inline">
                        <select lay-verify="required" name="product_category">
                        	<!--<option><?php echo $result_array["product_category"]; ?></option>-->
                        	<?php
                        		$sql2="select * from ite_category";
								//exit($sql2);
								$result2=mysql_query($sql2);
								$result_ar=mysql_fetch_array($result2);
							
                        		if($result_array["product_category"]==$result_ar["Id"]){
									echo "<option value=".$result_ar["categoryName"]." selected=selected>".$result_ar["categoryName"]."</option>";	
								}
                        	?>
                        	<optgroup>
							<?php 
								$sql_s="select * from ite_category";
								$result_s=mysql_query($sql_s); //执行 $result获取的是一个结果集 （资源类型的表格）
								while($result_arr_s=mysql_fetch_array($result_s)){
									
								if($result_array["product_category"]==$result_arr_s["Id"]){
									echo "<option value=".$result_arr_s["Id"]." selected=selected>".$result_arr_s["categoryName"]."</option>";	
								}else{
									echo "<option value=".$result_arr_s["Id"].">".$result_arr_s["categoryName"]."</option>";	
								}
							?>
					        <?php } ?>
					        </optgroup>
                       </select>
                    </div>
                </div>
                <div class="layui-form-item">
                    <label class="layui-form-label">
                        <span class="x-red">*</span>产品图
                    </label>
                    <div class="layui-input-inline fl" style="margin-top: 8px;">
                      <div class="site-demo-upbar">
                      	
						<input type="file" name="upfile[]" class="prdPicUrl pro fl">
						<p class="fl ma2"><span style="font-size:26px;cursor:pointer" class="but">  + </span>	<p>
						<input type="hidden" name="upfile_r" value="<?php echo $result_array["product_picture"]; ?>" />
						
                      </div>
                    </div>
                </div>
                <div class="layui-form-item">
                    <label class="layui-form-label">
                        <span class="x-red">*</span>原图预览
                    </label>
                    <div class="layui-input-inline">
                      <div class="site-demo-upbar">
				        <?php 
							$a=explode("@",$result_array["product_picture"]);
							array_pop($a);
							foreach($a as $k=>$y){
						?>
						<figure class="img">
							<img src='<?php
								if($result_array["product_picture"]==""){
									echo "upload/180624/1529850480816315.jpg";
								}else{
									echo $a[$k];
								}
							?>' alt="<?php echo $result_array["product_name"]; ?>" title="<?php echo $result_array["product_name"]; ?>" />
						</figure>
						<?php } ?>
                      </div>
                    </div>
                </div>
                <div class="layui-form-item">
                    <label for="link3" class="layui-form-label">
                        <span class="x-red">*</span>标识
                    </label>
                    <div class="layui-input-inline">
                        <input type="text" id="link3" name="sign" class="layui-input" value="<?php echo $result_array["sign"]; ?>">
                    </div>
                </div>
                <div class="layui-form-item">
                    <label for="link4" class="layui-form-label">
                        <span class="x-red">*</span>产品类型
                    </label>
                    <div class="layui-input-inline">
                        <select lay-verify="required" name="product_type">
                            <option><?php echo $result_array["product_type"]; ?></option>
                            <optgroup>
                                <option value="笔记本电脑">笔记本电脑</option>
                                <option value="相机">相机</option>
                                <option value="耳机">耳机</option>
                                <option value="台式电脑">台式电脑</option>
                                <option value="手表">手表</option>
                                <option value="iphone">iphone</option>
                                <option value="数据线">数据线</option>
                                <option value="遥控器">遥控器</option>
                                <option value="数码仪器">数码仪器</option>
                            </optgroup>
                        </select>
                    </div>
                </div>
                <div class="layui-form-item">
                    <label for="link5" class="layui-form-label">
                        <span class="x-red">*</span>产品名称
                    </label>
                    <div class="layui-input-inline">
                        <input type="text" id="link5" name="product_name" class="layui-input" value="<?php echo $result_array["product_name"]; ?>">
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
                    <label for="link5" class="layui-form-label">
                        <span class="x-red">*</span>原价
                    </label>
                    <div class="layui-input-inline">
                        <input type="text" id="link5" name="originalPrice" class="layui-input" value="<?php echo $result_array["originalPrice"]; ?>">
                    </div>
                </div>
            	<input type="hidden" value="<?php echo $result_array["Id"]; ?>" name="Id" />
            
            <h2 style="font-size: 18px;color: #00A4AC;">商品参数信息</h2>
            <hr />
         	<!--产品品牌-->
            	<div class="layui-form-item">
                    <label for="link" class="layui-form-label">
                        <span class="x-red">*</span>产品品牌
                    </label>
                    <div class="layui-input-inline">
                        <select lay-verify="required" name="brand">
                            <optgroup>
                            	<option value="<?php echo $result_array["brand"]; ?>"><?php echo $result_array["brand"]; ?></option>
                                <option value="Apple">Apple</option>
                                <option value="三星">三星</option>
                                <option value="华为">华为</option>
                                <option value="HTC">HTC</option>
                                <option value="LG">LG</option>
                                <option value="Dell">Dell</option>
                                <option value="Sony">Sony</option>
                                <option value="Bphone">Bphone</option>
                                <option value="Oppo">Oppo</option>
                            </optgroup>
                        </select>
                    </div>
                </div>
            <!-- 库存-->
                <div class="layui-form-item">
                    <label for="link4" class="layui-form-label">
                        <span class="x-red">*</span>商品库存
                    </label>
                    <div class="layui-input-inline">
                        <input type="text" id="link4" name="stock" class="layui-input" value="<?php echo $result_array["stock"]; ?>">
                    </div>
                </div>
            <!-- 商品搜索关键字 -->
                <div class="layui-form-item">
                    <label for="link4" class="layui-form-label">
                        <span class="x-red">*</span>搜索关键字
                    </label>
                    <div class="layui-input-inline">
                        <input type="text" id="link4" name="keywords" class="layui-input" value="<?php echo $result_array["keywords"]; ?>">
                    </div>
                </div>
            <!-- 商品颜色 -->
                
            <!--产品规格-->
            	<div class="layui-form-item">
                    <label for="link" class="layui-form-label">
                        <span class="x-red">*</span>商品规格
                    </label>
                    <div class="layui-input-inline">
                        <select lay-verify="required" name="standard" value="<?php echo $result_array["brand"]; ?>">
                            <optgroup>
                            	<option value="<?php echo $result_array["brand"]; ?>"><?php echo $result_array["brand"]; ?></option>
                                <option value="4G+32GB">4G+32GB</option>
                                <option value="4G+64GB">4G+64GB</option>
                                <option value="6G+128GB">6G+128GB</option>
                                <option value="6G+256GB">6G+256GB</option>
                                <option value="8G+128G">8G+128G</option>
                                <option value="8G+256G">8G+256G</option>
                            </optgroup>
                        </select>
                    </div>
                </div>
            <!-- 发货地 -->
                <div class="layui-form-item">
                    <label for="link4" class="layui-form-label">
                        <span class="x-red">*</span>发货地
                    </label>
                    <div class="layui-input-inline">
                        <input type="text" id="link4" name="deliver" class="layui-input" value="<?php echo $result_array["deliver"]; ?>">
                    </div>
                </div>  
            <!-- 尺寸 -->
                <div class="layui-form-item">
                    <label for="link4" class="layui-form-label">
                        <span class="x-red">*</span>尺寸
                    </label>
                    <div class="layui-input-inline">
                        <input type="text" id="link4" name="volume" class="layui-input" value="<?php echo $result_array["volume"]; ?>">
                    </div>
                </div>
            <!-- 摄像头 -->
                <div class="layui-form-item">
                    <label for="link4" class="layui-form-label">
                        <span class="x-red">*</span>摄像头
                    </label>
                    <div class="layui-input-inline">
                        <input type="text" id="link4" name="camera" class="layui-input" value="<?php echo $result_array["camera"]; ?>">
                    </div>
                </div>   
            <!-- 出产地 -->
                <div class="layui-form-item">
                    <label for="link4" class="layui-form-label">
                        <span class="x-red">*</span>出产地
                    </label>
                    <div class="layui-input-inline">
                        <input type="text" id="link4" name="producing" class="layui-input" value="<?php echo $result_array["producing"]; ?>">
                    </div>
                </div>   
            <!-- 型号 -->
                <div class="layui-form-item">
                    <label for="link4" class="layui-form-label">
                        <span class="x-red">*</span>型号
                    </label>
                    <div class="layui-input-inline">
                        <input type="text" id="link4" name="model" class="layui-input" value="<?php echo $result_array["model"]; ?>">
                    </div>
                </div>   
            <!-- 材质 -->
                <div class="layui-form-item">
                    <label for="link4" class="layui-form-label">
                        <span class="x-red">*</span>材质
                    </label>
                    <div class="layui-input-inline">
                        <input type="text" id="link4" name="material" class="layui-input" value="<?php echo $result_array["material"]; ?>">
                    </div>
                </div>   
            <!-- 电池容量 -->
                <div class="layui-form-item">
                    <label for="link4" class="layui-form-label">
                        <span class="x-red">*</span>电池容量
                    </label>
                    <div class="layui-input-inline">
                        <input type="text" id="link4" name="battery" class="layui-input" value="<?php echo $result_array["battery"]; ?>">
                    </div>
                </div>   
            <!-- CPU(处理器) -->
                <div class="layui-form-item">
                    <label for="link4" class="layui-form-label">
                        <span class="x-red">*</span>处理器
                    </label>
                    <div class="layui-input-inline">
                        <input type="text" id="link4" name="cpu" class="layui-input" value="<?php echo $result_array["cpu"]; ?>">
                    </div>
                </div>   
            <!-- 商品质保 -->
                <div class="layui-form-item">
                    <label for="link" class="layui-form-label">
                        <span class="x-red">*</span>商品质保
                    </label>
                    <div class="layui-input-inline">
                        <select lay-verify="required" name="quality">
                            <optgroup>
                            	<option value="<?php echo $result_array["quality"]; ?>"><?php echo $result_array["quality"]; ?></option>
                                <option value="七天无理由退货">七天无理由退货</option>
                                <option value="十五天无偿替换">十五天无偿替换</option>
                            </optgroup>
                        </select>
                    </div>
                </div>       
            <!-- 商品简介 -->
                <div class="layui-form-item">
                    <label for="link4" class="layui-form-label">
                        <span class="x-red">*</span>商品简介
                    </label>
                    <div class="layui-input-inline">
                        <input type="text" id="link4" name="goods_js" class="layui-input" value="<?php echo $result_array["goods_js"]; ?>">
                    </div>
                </div>       
            <!-- 商品详情介绍 -->
                <div class="layui-form-item">
                    <label for="link4" class="layui-form-label">
                        <span class="x-red">*</span>商品详情
                    </label>
                    <div class="layui-input-inline">
                       <textarea id="content7" name="goods_cont" style="width:700px;height:450px; visibility:hidden">
                       		<?php echo $result_array["goods_cont"]; ?>
                       </textarea>   
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
        <script src="../js/jquery.min.js" type="text/javascript" charset="utf-8"></script>
        <script>
        	$(function(){
        		$(".but").click(function(){
        			var newElement=$("<p class='fl ma'><input type='file' name='upfile[]' class='fl' /><span class='fl bt_sub' style='margin: -6px 0px 0px 3px;font-size:26px;cursor:pointer'> - </span></p>");
					$(this).parent("p").after(newElement);
        		});
        		$(document).on("click", ".bt_sub", function(){ 
					$(this).parent("p").remove(); 
				}); 
        	})
        </script>
       
    </body>

</html>