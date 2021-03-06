<!DOCTYPE html>
<html>

<head>
    <title><?php echo $hotel_name?></title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0">
    <link rel="stylesheet" type="text/css" href="css/base1.css">
    <link href="css/style.css" rel="stylesheet" type="text/css"/>
    <link rel="stylesheet" type="text/css" href="css/zepto.aslider.css">
    <link rel="stylesheet" type="text/css" href="css/mobiscroll.css">
    <link rel="stylesheet" type="text/css" href="css/mobiscroll_002.css">
    <link rel="stylesheet" type="text/css" href="css/mobiscroll_003.css">
    <link rel="stylesheet" type="text/css" href="css/order.css">
    <link rel="stylesheet" href="css/framework7.ios.min.css">
    <link rel="stylesheet" href="css/framework7.ios.colors.min.css">
    <!-- <link rel="stylesheet" href="css/framework7.material.min.css"> -->
    <link rel="stylesheet" href="css/framework7.material.colors.min.css">
    <link rel="stylesheet" href="css/upscroller.css">
    <link rel="stylesheet" href="css/my-app.css">
    <link rel="stylesheet" href="css/lc_switch.css">
<style type="text/css">
body * {
  font-family: Arial, Helvetica, sans-serif;
  box-sizing: border-box;
  -moz-box-sizing: border-box;
}
h1 {
  margin-bottom: 10px;
  padding-left: 35px;
}
a {
  color: #888;
  text-decoration: none;
}
small {
  font-size: 13px;
  font-weight: normal;
  padding-left: 10px;
}
#first_div {
  width: 90%;
  max-width: 600px;
  min-width: 340px;
  margin: 50px auto 0;
  color: #444;
}
#second_div {
  width: 90%;
  max-width: 600px;
  min-width: 340px;
  margin: 50px auto 0;
  background: #f3f3f3;
  border: 6px solid #eaeaea;
  padding: 20px 40px 40px;
  text-align: center;
  border-radius: 2px;
}
#third_div {
  width: 90%;
  max-width: 600px;
  min-width: 340px;
  margin: 10px auto 0;
}
</style>
</head>

<body class="store_container">  
    <!--导航-->  
    <nav class="fixed_nav" id="main_nav">
        <ul>
            <li id="product_store">
                <span></span>
                <p class="cat_name">产品库</p>
            </li>
            <li id="index">
                <span></span>
                <p class="cat_name">档期</p>
            </li>
            <li id="order" class="active">
                <span></span>
                <p class="cat_name">订单</p>
            </li>
            <li id="finance_report">
                <span></span>
                <p class="cat_name">我的业绩</p>
            </li>
        </ul>
    </nav>
    <!--顶部筛选-->
    <!-- <section class="filter_area">
        <div class="filter_exit flexbox">
            <div class="all flex1" data-flag="0">全部<img src="images/arrow.png" alt="">
            </div>
            <div class="time flexcenter" data-aslider-in="time_filter|fade">
                <img src="images/time_icon.png" alt="">
            </div>
        </div>
        <div class="mask"></div>
        <ul class="filter_class">
            <li>公共筛选</li>
            <li>
                <span class="radio checked" data-radio="1"></span> 全部
            </li>
            <li>
                <span class="radio" data-radio="0"></span> 签订未付款
            </li>
            <li>
                <span class="radio" data-radio="0"></span> 全部
            </li>
        </ul>
    </section> -->
    <!--订单列表-->
        <ul class="order_list" style="">
    <?php foreach ($order_data as $key => $value) {
            if($value['order_status'] != 0 && $value['order_status'] != 1){?>
            <li order-type="<?php echo $value['order_type']?>" order-id="<?php echo $value['id']?>">
                <h3><?php echo $value['order_name']?><span style="position: absolute;right: 30px;color: rgb(117, 185, 54);">推单：<?php echo $value['reference_name']?></span></h3>
                <div class="info flexbox flexcenter_v">
                    <div class="flex1" order-status="<?php echo $value['order_status']?>">
                        <span class="tag " ></span>
                    </div>

                    <div class="con flex1">
                        <p class="flexbox"><img src="images/man_icon.png" alt="">负责人</p>
                        <p><?php echo $value['planner_name']?></p>
                    </div>
                    <div class="con flex1">
                        <p class="flexbox"><img src="images/time_s_icon.png" alt="">订单日期</p>
                        <p><?php echo $value['order_date']?></p>
                    </div>
                </div>
            </li>
    <?php }else {?>
            <li order-type="<?php echo $value['order_type']?>" order-id="<?php echo $value['id']?>" order-status="<?php echo $value['order_status']?>">
                <h3><?php echo $value['order_name']?><span style="position: absolute;right: 30px;color: rgb(117, 185, 54);">推单：<?php echo $value['reference_name']?></span></h3>
                <div class="info flexbox flexcenter_v">
                    <div  style="margin-right: 10px;" >
                        <input order-status="<?php echo $value['order_status']?>" order-id="<?php echo $value['id']?>"  type="checkbox" name="check-1" value="4" class="lcs_check switch" autocomplete="off"/>
                    </div>
                    <div class="con flex1">
                        <p class="flexbox"><img src="images/man_icon.png" alt="">负责人</p>
                        <p><?php echo $value['planner_name']?></p>
                    </div>
                    <div class="con flex1">
                        <p class="flexbox"><img src="images/time_s_icon.png" alt="">订单日期</p>
                        <p><?php echo $value['order_date']?></p>
                    </div>
                </div>
            </li>
    <?php }}?>
        </ul>
        <!--悬浮按钮-->
        <div class="add_btn"></div>
        <!--侧滑时间筛选-->
        <aside class="aslider time_filter_aslider" data-aslider="time_filter">
            <div class="wrapper">
                <h2>按时间筛选</h2>
                <div class="slider">
                    <ul class="time_list">
                        <li>创建时间</li>
                        <li class="in flexbox">
                            <span>开始时间</span>
                            <input type="text" name="appDates_tart" id="appDate_start" placeholder="年月日">
                        </li>
                        <li class="in flexbox">
                            <span>结束时间</span>
                            <input  type="text" name="appDate_end" id="appDate_end" placeholder="年月日">
                        </li>
                    </ul>
                    <button class="close">确定</button>
                </div>
            </div>
        </aside>

    <script type="text/javascript" src='js/zepto.min.js'></script>
    <script type="text/javascript" src='js/base.js'></script>
    <script type="text/javascript" src='js/jquery.js'></script>
    <script type="text/javascript" src='js/mobiscroll_002.js'></script>

    <script type="text/javascript" src='js/mobiscroll_004.js'></script>
    <script type="text/javascript" src='js/mobiscroll.js'></script>
    <script type="text/javascript" src='js/mobiscroll_003.js'></script>
    <script type="text/javascript" src='js/nav.js'></script>
    <script type="text/javascript" src='js/order.js'></script>

    <script src="js/lc_switch.js" type="text/javascript"></script>


    <script type="text/javascript" src="js/framework7.min.js"></script>
    <script type="text/javascript" src="js/upscroller.js"></script>
    <script type="text/javascript" src="js/my-app.js"></script>


    
<script>
$(function  () {
    //订单状态初始化
    $("[order-status = '1']").find('span').addClass("green").html("预定");
    $("[order-status = '2']").find('span').addClass("blue").html("已交订金");
    $("[order-status = '3']").find('span').addClass("blue").html("已付中期款");
    $("[order-status = '4']").find('span').addClass("blue").html("已付尾款");
    $("[order-status = '5']").find('span').addClass("yellow").html("结算中");
    $("[order-status = '6']").find('span').addClass("gray").html("已完成");


    // li点击跳转
    $(".order_list li").find('.con').on("click",function(){
        order_type = $(this).parent().parent().attr("order-type");
        order_id = $(this).parent().parent().attr("order-id");
        if(order_type == 2){
            location.href = "<?php echo $this->createUrl("design/bill");?>&order_id=" + order_id + "&from=my_order";
        }else if(order_type == 1){
            location.href = "<?php echo $this->createUrl("meeting/bill");?>&order_id=" + order_id + "&from=my_order";
        };
    })

    //新增订单
    $(".add_btn").on("click",function(){
        location.href = "<?php echo $this->createUrl("order/selecttype", array());?>&code=";
    })

    //导航
    $("#product_store").on("click",function(){
        location.href = "<?php echo $this->createUrl('product/store');?>&code=&account_id=<?php echo $_SESSION['account_id']?>&staff_hotel_id=<?php echo $_SESSION['staff_hotel_id']?>";
    });
    $("#index").on("click",function(){
        location.href = "<?php echo $this->createUrl('order/index');?>&from=";
    });
    $("#order").on("click",function(){
        location.href = "<?php echo $this->createUrl('order/order');?>";
    });
    $("#finance_report").on("click",function(){
        
        location.href = "<?php echo $this->createUrl('report/financereport');?>";
    });

    //滑动删除
    $('.item-input').each(function(i){
        console.log($(this).find('img:first').attr('id','zoom'+i));
        console.log($(this).find('img:first').next().attr('id','add'+i));
    })

    //改变订单状态按钮
    buttonclick_xuanran();
    $("[order-status = '1']").next().removeClass("lcs_off").addClass("lcs_on");
    function buttonclick_xuanran(){
        $('.switch').lc_switch();
        // triggered each time a field changes status
        $('body').delegate('.lcs_check', 'lcs-statuschange', function() {
        var status = ($(this).is(':checked')) ? 'checked' : 'unchecked';
        console.log('field changed status: '+ status );
        });

        // triggered each time a field is checked
        $('body').delegate('.lcs_check', 'lcs-on', function() {
            console.log('field is checked');
            $.post('<?php echo $this->createUrl("order/ChangeOrderStatus");?>',{order_id:$(this).attr("order-id"),order_status:1},function(){
                
            });
        });

        // triggered each time a is unchecked
        $('body').delegate('.lcs_check', 'lcs-off', function(){
            console.log('field is unchecked');
            $.post('<?php echo $this->createUrl("order/ChangeOrderStatus");?>',{order_id:$(this).attr("order-id"),order_status:0},function(){
                
            });
        });     
    }
})
</script>
</body>

</html>