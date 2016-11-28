<?php
header('Content-Type: text/html;charset=UTF-8');
?>
<!--<div class="top-bar">-->
<!--    <div class="com-width">-->
<!--        <div class="left-area">-->
<!--            <a href="#" class="collection">收藏商城</a>-->
<!--        </div>-->
<!--        <div class="right-area" id="wel">-->
<!--            欢迎来到商城！<a href="login.html" target="_blank">[登录]</a><a href="sign_in.html" target="_blank">[免费注册]</a>-->
<!--        </div>-->
<!--    </div>-->
<!--</div>-->
<div class="logo-bar">
    <div class="com-width">
        <div class="logo fl">
            <a href="index.html"><img src="img/logo.jpg" alt="商城"></a>
        </div>
        <div class="search-box fl">
            <input type="text" class="search-text fl">
            <input type="button" value="搜 索" class="search-btn fr">
        </div>
        <div class="shop-cart fr">
            <span class="shop-text fl">购物车</span>
            <span class="shop-num fl">0</span>
        </div>
    </div>
</div>
<div class="nav-box">
    <div class="com-width">
        <div class="shop-class fl">
            <h3>全部商品分类<i></i></h3>
            <!--分类列表-->
            <div class="shop-class-show">
                <dl class="shop-class-item">
                    <dt>
                        <a href="product_classify.html" class="b" target="_blank">手机/数码</a>
                        <a href="#" class="a-link">合约机</a>
                    </dt>
                    <dd>
                        <a href="#">荣耀3X</a>
                        <a href="#">单反</a>
                        <a href="#">智能设备</a>
                    </dd>
                </dl>
                <dl class="shop-class-item">
                    <dt>
                        <a href="#" class="b">电脑</a>
                        <a href="#" class="b">硬件外设</a>
                        <a href="#" class="a-link">装机宝</a>
                    </dt>
                    <dd>
                        <a href="#">笔记本</a>
                        <a href="#">台式机</a>
                        <a href="#">超极本</a>
                        <a href="#">平板</a>
                    </dd>
                </dl>
                <dl class="shop-class-item">
                    <dt>
                        <a href="#" class="b">大家电</a>
                    </dt>
                    <dd>
                        <a href="#">电视</a>
                        <a href="#">空调</a>
                        <a href="#">冰箱</a>
                        <a href="#">洗衣机</a>
                    </dd>
                </dl>
                <dl class="shop-class-item">
                    <dt>
                        <a href="#" class="b">厨房电器</a>
                        <a href="#" class="b">生活电器</a>
                    </dt>
                    <dd>
                        <a href="#">空气净化器</a>
                        <a href="#">微波炉</a>
                        <a href="#">取暖设备</a>
                    </dd>
                </dl>
                <dl class="shop-class-item">
                    <dt>
                        <a href="#" class="b">食品/</a>
                        <a href="#" class="b">饮料/</a>
                        <a href="#" class="b">生鲜</a>
                        <a href="#" class="a-link">粮油</a>
                    </dt>
                    <dd>
                        <a href="#">进口</a>
                        <a href="#">方便面</a>
                        <a href="#">零食</a>
                        <a href="#">保健</a>
                    </dd>
                </dl>
            </div>
            <!--右侧弹出列表-->
            <div class="shop-class-list hide"><!--hide-->
                <dl class="shop-list-item">
                    <dt>电脑整机</dt>
                    <dd>
                        <a href="#">笔记本</a>
                        <a href="#">超极本</a>
                        <a href="#">上网本</a>
                        <a href="#">平板电脑</a>
                        <a href="#">台式机</a>
                    </dd>
                </dl>
                <dl class="shop-list-item">
                    <dt>装机配件</dt>
                    <dd>
                        <a href="#">CPU</a>
                        <a href="#">硬盘</a>
                        <a href="#">SSD固态硬盘</a>
                        <a href="#">内存</a>
                        <a href="#">显示器</a>
                        <a href="#">智能显示器</a>
                        <a href="#">主板</a>
                        <a href="#">显卡</a>
                        <a href="#">机箱</a>
                        <a href="#">电源</a>
                        <a href="#">散热器</a>
                        <a href="#">刻录机/光驱</a>
                        <a href="#">声卡</a>
                        <a href="#">拓展卡</a>
                        <a href="#">服务器配件</a>
                        <a href="#">DIY小附件</a>
                        <a href="#">装机/配件安装</a>
                    </dd>
                </dl>
                <dl class="shop-list-item">
                    <dt>整机附件</dt>
                    <dd>
                        <a href="#">电脑包</a>
                        <a href="#">电脑桌</a>
                        <a href="#">电池</a>
                        <a href="#">电源适配器</a>
                        <a href="#">贴膜</a>
                        <a href="#">清洁用品</a>
                        <a href="#">笔记本散热器</a>
                        <a href="#">USB拓展</a>
                        <a href="#">平板配件</a>
                        <a href="#">特色附件</a>
                        <a href="#">插座网线/电话线</a>
                        <a href="#">影音线材</a>
                        <a href="#">电脑线材</a>
                    </dd>
                </dl>
                <dl class="shop-list-item">
                    <dt>电脑外设</dt>
                    <dd>
                        <a href="#">鼠标</a>
                        <a href="#">键盘</a>
                        <a href="#">游戏外设</a>
                        <a href="#">移动硬盘</a>
                        <a href="#">摄像头</a>
                        <a href="#">高清播放器</a>
                        <a href="#">外置盒</a>
                        <a href="#">移动硬盘包</a>
                        <a href="#">手写板/绘图板</a>
                    </dd>
                </dl>
                <dl class="shop-list-item">
                    <dt>网络设备</dt>
                    <dd>
                        <a href="#"></a>
                        <a href="#">路由器</a>
                        <a href="#">网卡</a>
                        <a href="#">3G无限网卡</a>
                        <a href="#">交换机</a>
                        <a href="#">网络存储</a>
                        <a href="#">布线工具</a>
                        <a href="#">网络配件</a>
                        <a href="#">正版软件</a>
                    </dd>
                </dl>
                <dl class="shop-list-item">
                    <dt>音频设备</dt>
                    <dd>
                        <a href="#">音箱</a>
                        <a href="#">耳机/耳麦</a>
                        <a href="#">麦克风</a>
                        <a href="#">声卡</a>
                        <a href="#">音频附件</a>
                        <a href="#">录音笔</a>
                    </dd>
                </dl>
                <div class="shop-list-links">
                    <a href="#">电脑整机频道<span></span></a>
                    <a href="#">硬件/外设频道<span></span></a>
                </div>
            </div>
        </div>
        <ul class="nav fl">
            <li><a href="#" class="active">数码城</a></li>
            <li><a href="#">天黑黑</a></li>
            <li><a href="#">团购</a></li>
            <li><a href="#">发现</a></li>
            <li><a href="#">二手特卖</a></li>
            <li><a href="#">名品会</a></li>
        </ul>
    </div>
</div>
<script>
    $('.shop-class-item').mouseenter(function () {
        $('.shop-class-list').removeClass('hide');
    });
    $('.shop-class-item').mouseleave(function () {
        $('.shop-class-list').addClass('hide');
    });
</script>