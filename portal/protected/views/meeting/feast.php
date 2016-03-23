<!DOCTYPE HTML>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <title>会议餐</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black">
    <meta name="format-detection" content="telephone=no">
    <link href="css/base.css" rel="stylesheet" type="text/css"/>
    <link href="css/style.css" rel="stylesheet" type="text/css"/>
</head>
<body>
<article>
    <div class="tool_bar">
        <div class="l_btn" data-icon="&#xe679;"></div>
        <h2 class="page_title">会议餐</h2>
    </div>
    <div class="order_abstract mar_b10">
        <p class="title">总价 &yen;<?php echo $feast_bill['total']; ?></p>
    </div>
    <div class="ulist_module">
        <ul class="ulist charge_list" id="product">
            <!-- 选中的时候加class -->
            <!-- <li class="ulist_item selected">
                <div class="item">
                    <p class="name">套餐A</p>
                </div>
                <div>
                    <p class="price">&yen;2888/场</p>
                </div>
            </li>
            <li class="ulist_item list_more">
                <div class="item">
                    <p class="name">套餐B</p>
                </div>
                <div>
                    <p class="price">&yen;2888/场</p>
                </div>
            </li> -->
        </ul>
    </div>
</article>
<script src="js/zepto.min.js"></script>
<script src="js/common.js"></script>
<script>
    $(function () {
        //渲染页面
        var html_feast = '';
                <?php
                // $arr_feast = array(//background data
                //     '0' => array(
                //         'product_id' => '2',
                //         'name' => '会议餐套餐A',
                //         'supplier_name' => '小李3'
                //     ),
                //     '1' => array(
                //         'product_id' => '1',
                //         'name' => '会议餐套餐B',
                //         'supplier_name' => '小李'
                //     )

                // );
                foreach ($arr_feast as $key => $value) {
                foreach ($value as $key1 => $value1) {
                    $feast[$key1] = $value1;
                }
                ?>
                    html_feast += '<li class="ulist_item list_more " product-id="<?php echo $feast['product_id'];?>">';
                    html_feast += '<div class="item ">';
                    html_feast += '<p class="name"><?php echo $feast['name'];?></p>';
                    html_feast += '</div><i class="name"><?php echo $feast['supplier_name'];?></p></i>';
                    html_feast += '</li>';
                <?php
                }
                ?>
                $("#product").empty(); //清空订单列表
                $("#product").prepend(html_feast); //打印新的订单列表

            //先判断是否已经选择会议餐
            <?php
            foreach ($feast_data as $key => $value) {
                $data=$value['product_id'];
            ?>
                var feast_data =  "<?php echo $data; ?>"; 
                
                if (feast_data != "") {
                    $("[product-id='" + feast_data + "']").removeClass("list_more");
                    $("[product-id='" + feast_data + "']").addClass("selected");

                }
                ;
            <?php
            }
            ?>

        //点击返回按钮，判断from，返回对应页面
        $(".l_btn").on("click", function () {
            if ($.util.param("from") == "detail") {
                location.href = "<?php echo $this->createUrl("design/detail");?>";
            } else {
                location.href = "<?php echo $this->createUrl("design/bill", array());?>";
            }
        });
        //点击返回按钮，判断from，返回对应页面
        $(".l_btn").on("click", function () {
            if ($.util.param("from") == "detail") {
                location.href = "<?php echo $this->createUrl("design/detail");?>";
            } else {
                location.href = "<?php echo $this->createUrl("design/bill", array());?>";
            }
        });
        $("#product li.selected").on("click", function () {
            location.href = "<?php echo $this->createUrl("meeting/tpDetail", array());?>&product_id=" + $(this).attr("product-id") + "&type=edit&tab=feast&from=" + $.util.param("from") + "&order_id=" + $.util.param("order_id");
        })
        $("#product li.list_more").on("click", function () {
            location.href = "<?php echo $this->createUrl("meeting/tpDetail", array());?>&product_id=" + $(this).attr("product-id") + "&type=new&tab=feast&from=" + $.util.param("from") + "&order_id=" + $.util.param("order_id");
        })
        


    })
</script>
</body>
</html>