<!DOCTYPE html>
<html>
<head>
	<title>测试-图片滚动</title><!--所有图片进行绝对定位叠加在一起 然后每个图片单独编号 选择的图片100%不透明度 其他的均为0%不透明度-->
	<style>
		body{
			padding:0px;
			margin:0px;
		}
		#box{
			position:relative;
			overflow:hidden;
			width:100%;
			min-width:1200px;
		}
		.banner{
			position: relative;
			height:400px;
			margin:0px auto 0px auto;
		}
		.banner div{
			position: absolute;
			left:0px;
			top:0px;
			width:100%;
			height:100%;
			z-index: 1;
			opacity: 0;
		}
		.banner div a{
			display: block;
			width:100%;
			height:100%;
		}
		.banner div a img{
			width:100%;
			height:100%;
		}
		.banner .bn_active{
			z-index: 2;
			opacity: 1;
		}
		.banner-btn{width:1200px;position:absolute;top:120px;left:50%;margin-left:-600px;}
		.banner-btn a{display:block;width:60px;height:104px;position:absolute;top:0;filter:alpha(opacity=50);-moz-opacity:0.5;-khtml-opacity:0.5;opacity:0.5;transition: opacity 0.5s}
		.banner-btn a:hover{
			opacity: 0.8;
		}
		.banner-btn a.prev{left:20px;background:url(images/foot.png) no-repeat 0 0;z-index: 3} 
		.banner-btn a.next{right:20px;background:url(images/foot.png) no-repeat -38px 0;z-index: 3}
		.banner-box .hd {z-index:4;position:absolute;top:210px;left:537px;}
		ul.bnr-dot li{width:12px;height:12px;border-radius :50%;text-indent:-9999px;margin-right:20px;background:#ccc;float:left;cursor:pointer; }
		ul.bnr-dot li.on{background:#DA324D;}
	</style>
</head>
<body>
<div id="box">
	<div class='banner'><div class='banner_1 bn_active'><a href='#'><img src='images/img1.jpg'/></a></div><div class='banner_2'><a href='#'><img src='images/img2.jpg'/></a></div><div class='banner_3'><a href='#'><img src='images/img3.jpg'/></a></div><div class='banner_4'><a href='#'><img src='images/img4.jpg'/></a></div></div>    <div class="banner-btn">
        <a class="prev" href="javascript:void(0);" onclick="Prev()"></a>
        <a class="next" href="javascript:void(0);" onclick="Next()"></a>
        <div class='banner-box'><div class="hd"><ul class='bnr-dot'><li class='on'>·</li><li>·</li><li>·</li><li>·</li></ul></div></div>
    </div>
</div>
<script type="text/javascript" src="../jquery.js"></script>
	<script type="text/javascript">
		bn_num=1;
		function Next(){//后一张透明度变为1 然后前一张用动画划走
			if(bn_num!=4){
						$(".banner_"+(bn_num+1)).animate(
							{opacity:1});}
			else
						$(".banner_1").animate(
							{opacity:1});
			$(".banner_"+bn_num).animate(
				{opacity:0});
			$("ul.bnr-dot li").removeClass("on");
			$(".bn_active").removeClass("bn_active");
			if(bn_num!=4){
				$(".banner_"+(bn_num+1)).addClass("bn_active");
				$("ul.bnr-dot li:eq("+bn_num+")").addClass("on");}
			else{
				$(".banner_1").addClass("bn_active");
				$("ul.bnr-dot li:eq(0)").addClass("on");
			}
			if(bn_num==4){
						bn_num=1;}
			else{
						bn_num++;}
				}
				window.setInterval(Next,300000);
			function Prev(){
			if(bn_num!=1){
						$(".banner_"+(bn_num-1)).animate(
							{opacity:1});}
			else
						$(".banner_4").animate(
							{opacity:1});
			$(".banner_"+bn_num).animate(
				{opacity:0});
			$(".bn_active").removeClass("bn_active");
			$("ul.bnr-dot li").removeClass("on");
			if(bn_num!=1){
			$(".banner_"+(bn_num-1)).addClass("bn_active");
			$("ul.bnr-dot li:eq("+(bn_num-2)+")").addClass("on");}
			else{
			$(".banner_4").addClass("bn_active");
			$("ul.bnr-dot li:eq(3)").addClass("on");
			}
			if(bn_num==1){
						bn_num=4;}
			else{
						bn_num--;}
				}
	</script>

</body>
</html>