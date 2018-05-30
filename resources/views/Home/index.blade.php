<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
 <head> 
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" /> 
  <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no" /> 
  <title>首页</title> 
  <link href="/H/AmazeUI-2.4.2/assets/css/amazeui.css" rel="stylesheet" type="text/css" /> 
  <link href="/H/AmazeUI-2.4.2/assets/css/admin.css" rel="stylesheet" type="text/css" /> 
  <link href="/H/basic/css/demo.css" rel="stylesheet" type="text/css" /> 
  <link href="/H/css/hmstyle.css" rel="stylesheet" type="text/css" /> 
  <script src="/H/AmazeUI-2.4.2/assets/js/jquery.min.js"></script> 
  <script src="/H/AmazeUI-2.4.2/assets/js/amazeui.min.js"></script> 
 </head> 
 <body> 
  <div class="hmtop"> 
   <!--顶部导航条 --> 
   <div class="am-container header"> 
    <ul class="message-l"> 
     <div class="topMessage"> 
      <div class="menu-hd"> 
       <a href="#" target="_top" class="h">亲，请登录</a> 
       <a href="#" target="_top">免费注册</a> 
      </div> 
     </div> 
    </ul> 
    <ul class="message-r"> 
     <div class="topMessage home"> 
      <div class="menu-hd">
       <a href="#" target="_top" class="h">商城首页</a>
      </div> 
     </div> 
     <div class="topMessage my-shangcheng"> 
      <div class="menu-hd MyShangcheng">
       <a href="#" target="_top"><i class="am-icon-user am-icon-fw"></i>个人中心</a>
      </div> 
     </div> 
     <div class="topMessage mini-cart"> 
      <div class="menu-hd">
       <a id="mc-menu-hd" href="#" target="_top"><i class="am-icon-shopping-cart  am-icon-fw"></i><span>购物车</span><strong id="J_MiniCartNum" class="h">0</strong></a>
      </div> 
     </div> 
     <div class="topMessage favorite"> 
      <div class="menu-hd">
       <a href="#" target="_top"><i class="am-icon-heart am-icon-fw"></i><span>收藏夹</span></a>
      </div> 
     </div>
    </ul> 
   </div> 
   <!--悬浮搜索框--> 
   <div class="nav white"> 
    <div class="logo">
     <img src="/H/images/logo.png" />
    </div> 
    <div class="logoBig"> 
     <li><img src="/H/images/logobig.png" /></li> 
    </div> 
    <div class="search-bar pr"> 
     <a name="index_none_header_sysc" href="#"></a> 
     <form action="/home/list" method="post"> 
      <input id="searchInput" name="search" type="text" placeholder="搜索" autocomplete="off" /> 
      <input id="ai-topsearch" class="submit am-btn" value="搜索" index="1" type="submit" /> 
     </form> 
    </div> 
   </div> 
   <div class="clear"></div> 
  </div> 
  <b class="line"></b> 
  <div class="shopNav"> 
   <div class="slideall" style="height: auto;"> 
    <div class="long-title">
     <span class="all-goods">全部分类</span>
    </div> 
    <div class="nav-cont"> 
     <ul> 
      <?php $arr = ['暂无','闪购','限时抢','团购'] ?>
      <li class="index"><a href="#">首页</a></li> 
      @foreach($active as $v)
       <li class="qc"><a href="#">{{$arr[$v->name]}}</a></li> 
      @endforeach
      
     </ul> 
     <div class="nav-extra"> 
      <i class="am-icon-user-secret am-icon-md nav-user"></i>
      <b></b>我的福利 
      <i class="am-icon-angle-right" style="padding-left: 10px;"></i> 
     </div> 
    </div> 
    <div class="bannerTwo"> 
     <!--轮播 --> 
     <div class="am-slider am-slider-default scoll" data-am-flexslider="" id="demo-slider-0"> 
      <ul class="am-slides"> 
       <li class="banner1"><a href="/home/list/20"><img src="/H/images/ad5.jpg" /></a></li> 
       <li class="banner2"><a href="/home/list/28"><img src="/H/images/ad6.jpg" /></a></li> 
       <li class="banner3"><a href="/home/list/31"><img src="/H/images/ad7.jpg" /></a></li> 
       <li class="banner4"><a href="/home/list/22"><img src="/H/images/ad8.jpg" /></a></li> 
      </ul> 
     </div> 
     <div class="clear"></div> 
    </div> 
    <!--侧边导航 --> 
    <div id="nav" class="navfull" style="position: static;"> 
     <div class="area clearfix"> 
      <div class="category-content" id="guide_2"> 
       <div class="category" style="box-shadow:none ;margin-top: 2px;"> 
        <ul class="category-list navTwo" id="js_climit_li">
        <?php
          $num = 0;
        ?>
        @foreach($cates as $key=>$value)
        @if($num < 16)
         <li> 
          @if($value->pid == 0)
          <div class="category-info"> 
           <h3 class="category-name b-category-name">
            <i><img src="/H/images/{{$num}}.png" />
            </i><a href="/home/list/{{$value->id}}" class="ml-22" title="{{$value->name}}">{{$value->name}}</a>
           </h3> 
           <em>&gt;</em>
          </div> 
          
          <div class="menu-item menu-in top"> 
           <div class="area-in"> 
            <div class="area-bg"> 
             <div class="menu-srot"> 
              <div class="sort-side">
              @foreach($value->shop as $key=>$val) 
               <dl class="dl-sort">
               @if($value->id == $val->pid) 
                <a href="/home/list/{{$val->id}}">
                  <dt><span title="{{$val->name}}">{{$val->name}}</span>
                  </dt>
                </a>
                @foreach($val->shop as $k=>$v)
                <dd>
                 <a title="{{$v->name}}" href="/home/show/{{$v->id}}"><span>{{$v->name}}</span></a>
                </dd> 
                @endforeach
                
               </dl> 
               @endif
               @endforeach
               
              </div> 
              <div class="brand-side"> 
               <dl class="dl-sort">
                <dt>
                 <span>友情链接</span>
                </dt>
                 <dd>
                   <a rel="nofollow" title="" target="_blank" href="http://www.baidu.com"><span class="red">有事找百度</span></a>
                 </dd>
                @foreach($ldata as $key=>$value)
                @if($value->fid == $num)
                <dd>
                 <a rel="nofollow" title="{{$value->name}}" target="_blank" href="{{$value->url}}"><span class="red">{{$value->name}}</span></a>
                </dd>
                @endif 
                @endforeach
               </dl> 
              </div> 
             </div> 
            </div> 
           </div> 
          </div> <b class="arrow"></b> 
        </li>
        <?php $num++ ;?>
        @endif
        @endif
        @endforeach 
        
        </ul> 
       </div> 
      </div> 
     </div> 
    </div> 
    <!--导航 --> 
    <script type="text/javascript">
							(function() {
								$('.am-slider').flexslider();
							});
							$(document).ready(function() {
								$("li").hover(function() {
									$(".category-content .category-list li.first .menu-in").css("display", "none");
									$(".category-content .category-list li.first").removeClass("hover");
									$(this).addClass("hover");
									$(this).children("div.menu-in").css("display", "block")
								}, function() {
									$(this).removeClass("hover")
									$(this).children("div.menu-in").css("display", "none")
								});
							})
						</script> 
    <!--小导航 --> 
    <div class="am-g am-g-fixed smallnav"> 
     <div class="am-u-sm-3"> 
      <a href="sort.html"><img src="/H/images/navsmall.jpg" /> 
       <div class="title">
        商品分类
       </div> </a> 
     </div> 
     <div class="am-u-sm-3"> 
      <a href="#"><img src="/H/images/huismall.jpg" /> 
       <div class="title">
        大聚惠
       </div> </a> 
     </div> 
     <div class="am-u-sm-3"> 
      <a href="#"><img src="/H/images/mansmall.jpg" /> 
       <div class="title">
        个人中心
       </div> </a> 
     </div> 
     <div class="am-u-sm-3"> 
      <a href="#"><img src="/H/images/moneysmall.jpg" /> 
       <div class="title">
        投资理财
       </div> </a> 
     </div> 
    </div> 
    <!--各类活动--> 
    <div class="row"> 
     <li><a><img src="/H/images/row1.jpg" /></a></li> 
     <li><a><img src="/H/images/row2.jpg" /></a></li> 
     <li><a><img src="/H/images/row3.jpg" /></a></li> 
     <li><a><img src="/H/images/row4.jpg" /></a></li> 
    </div> 
    <div class="clear"></div> 
    <!--走马灯 --> 
    <div class="marqueenTwo"> 
     <span class="marqueen-title"><i class="am-icon-volume-up am-icon-fw"></i>商城头条<em class="am-icon-angle-double-right"></em></span> 
     <div class="demo"> 
      <ul> 
       <li class="title-first"><a target="_blank" href="#"> <img src="/H/images/TJ2.jpg" /> <span>[特惠]</span>洋河年末大促，低至两件五折 </a></li> 
       <li class="title-first"><a target="_blank" href="#"> <span>[公告]</span>商城与广州市签署战略合作协议 <img src="/H/images/TJ.jpg" /> <p>XXXXXXXXXXXXXXXXXX</p> </a></li> 
       <li><a target="_blank" href="#"><span>[特惠]</span>女生节商城爆品1分秒 </a></li> 
       <li><a target="_blank" href="#"><span>[公告]</span>华北、华中部分地区配送延迟</a></li> 
       <li><a target="_blank" href="#"><span>[特惠]</span>家电狂欢千亿礼券 买1送1！</a></li> 
       <li><a target="_blank" href="#"><span>[特惠]</span>洋河年末大促，低至两件五折</a></li> 
       <li><a target="_blank" href="#"><span>[公告]</span>华北、华中部分地区配送延迟</a></li> 
      </ul> 
     </div> 
    </div> 
    <div class="clear"></div> 
   </div> 
   <script type="text/javascript">
					if ($(window).width() < 640) {
						function autoScroll(obj) {
							$(obj).find("ul").animate({
								marginTop: "-39px"
							}, 500, function() {
								$(this).css({
									marginTop: "0px"
								}).find("li:first").appendTo(this);
							})
						}
						$(function() {
							setInterval('autoScroll(".demo")', 3000);
						})
					}
				</script> 
  </div> 
  <div class="shopMainbg"> 
   <div class="shopMain" id="shopmain"> 
    <!--热门活动 --> 
    <div class="am-container"> 
     <div class="sale-mt"> 
      <i></i> 

      <em class="sale-title">限时秒杀</em>
      <?php
           $hh = null;
           $mm = null;
           $ss = null;
           $strtime = null;
          foreach($active as $val){
              $strtime = $val->time;
          }
          // dd($strtime);
          $time = $strtime-time();
          $hh = floor($time/(60*60));
          $mm = floor(($time-$hh*60*60)/60);
          $ss = $time-$hh*60*60-$mm*60;

      ?>

      <div class="s-time" id="countdown"> 
       <span class="hh">{{$hh}}</span> 
       <span class="mm">{{$mm}}</span> 
       <span class="ss">{{$ss}}</span> 
      </div> 
     </div> 

     <div class="am-g am-g-fixed sale"> 
      @foreach($sale as $value)
      <div class="am-u-sm-3 sale-item"> 
       <div class="s-img"> 
        <a href="/home/show/{{$value->id}}"><img src="{{$value->pic}}" /></a> 
       </div> 
       <div class="s-info"> 
        <a href="/home/show/{{$value->id}}"><p class="s-title">{{$value->name}}</p></a> 
        <div class="s-price">
         ￥
         <b>9.90</b> 
         <a class="s-buy" href="#">秒杀</a> 
        </div> 
       </div> 
      </div> 
      @endforeach

      <!--商城活动倒计时-->
      <script type="text/javascript">
        var ss = $('.ss')[0].innerHTML;
        var mm = $('.mm')[0].innerHTML;
        var hh = $('.hh')[0].innerHTML;

        setInterval(function(){
            if(ss < 10){
              if(ss < 0){
                  ss = 59;
                    if(mm < 10){
                      if(mm < 0){
                            mm = 59;

                              if(hh < 0){
                                hh = 100;
                              }
                  
                              hh--;
                              

                      }

                      mm = mm == 59 ? 59 : '0'+mm;

                    }
                      
                      mm--;
                 
              }
              ss = ss == 59 ? 59 : '0'+ss;
            }
            $('.ss')[0].innerHTML = ss;
            $('.mm')[0].innerHTML = mm;
            $('.hh')[0].innerHTML = hh;
          ss--;
        },1000);

      </script>
      <!---->
     </div> 
    </div> 
    <div class="clear "></div> 
    <?php $num = 0;?>
     @foreach($cates as $value)

     @if($num < 6) 
  <div class="f1"> 
    <div class="am-container "> 
      <div class="shopTitle ">
        <?php $scate = []; $cate = [];//二级分类变量?>
        @foreach($value->shop as $val)
            <?php 

              $scate[] = $val->name; 
              $cate[] = $val->shop;

            ?>
        @endforeach
        
       <h4 class="floor-title">{{$scate[0]}}</h4> 
       <div class="floor-subtitle">
        <em class="am-icon-caret-left"></em>
        <h3>每一道甜品都有一个故事</h3>
       </div> 
       <div class="today-brands " style="right:0px ;top:13px;">
        @foreach($cate[0] as $v)
         <a href="/home/list/{{$v->id}}">{{$v->name}}</a>
        @endforeach
       </div> 
      </div> 
    </div> 

     <div class="am-g am-g-fixed floodSix "> 
      <div class="am-u-sm-5 am-u-md-3 text-one list"> 
       <div class="word"> 
        <?php $id = [];?>
        @foreach($cate[0] as $v)
          <?php $id[] = $v->id; ?> 
        <a class="outer" href="/home/index/{{$v->id}}"><span class="inner"><b class="text">{{$v->name}}</b></span></a> 
         @endforeach
       </div> 

       <?php

             $shops = [];
            for($i=0;$i<count($id);$i++){

              $shop = DB::table('shops')->where('cate_id','=',$id[$i])->get();

              $shops[] = $shop;

            }
            
            // dd($shops);
            // echo($id[1]);
            $arr = [];
            foreach($shops as $val){
                foreach($val as $v){
                  $arr[] = $v;
                }
            }

       

       ?>
   
       <a href="/home/show/{{$arr[0]->id}}"> <img src="{{$arr[0]->pic}}" /> 
        <div class="outer-con "> 
         <div class="title ">
           零食大礼包开抢啦
         </div> 
         <div class="sub-title ">
           当小鱼儿恋上软豆腐 
         </div> 
        </div> </a>
    
       <div class="triangle-topright"></div> 
      </div> 
      <div class="am-u-sm-7 am-u-md-5 am-u-lg-2 text-two big"> 
       <div class="outer-con "> 
        <div class="title ">
          雪之恋和风大福 
        </div> 


        <div class="sub-title ">
           
        </div> 
       </div>

       
       <a href="/home/show/{{$arr[1]->id}}"><img src="{{$arr[1]->pic}}" /></a>
   
      </div> 
      <li> 
       <div class="am-u-md-2 am-u-lg-2 text-three"> 
        <div class="boxLi"></div> 
        <div class="outer-con "> 
         <div class="title ">
           小优布丁 
         </div> 
         <div class="sub-title ">
           &yen;4.8 
         </div> 
        </div> 
        <a href="# "><img src="/H/images/1.jpg " /></a> 
       </div> </li> 
      <li> 
       <div class="am-u-md-2 am-u-lg-2 text-three sug"> 
        <div class="boxLi"></div> 
        <div class="outer-con "> 
         <div class="title ">
           小优布丁 
         </div> 
         <div class="sub-title ">
           &yen;4.8 
         </div> 
        </div> 
        <a href="# "><img src="/H/images/2.jpg " /></a> 
       </div> </li> 
      <li> 
       <div class="am-u-sm-4 am-u-md-5 am-u-lg-4 text-five"> 
        <div class="boxLi"></div> 
        <div class="outer-con "> 
         <div class="title ">
           小优布丁 
         </div> 
         <div class="sub-title ">
           &yen;4.8 
         </div> 
        </div> 
        <a href="# "><img src="/H/images/5.jpg" /></a> 
       </div> </li> 
      <li> 
       <div class="am-u-sm-4 am-u-md-2 am-u-lg-2 text-six"> 
        <div class="boxLi"></div> 
        <div class="outer-con "> 
         <div class="title ">
           小优布丁 
         </div> 
         <div class="sub-title ">
           &yen;4.8 
         </div> 
        </div> 
        <a href="# "><img src="/H/images/3.jpg" /></a> 
       </div> </li> 
      <li> 
       <div class="am-u-sm-4 am-u-md-2 am-u-lg-4 text-six"> 
        <div class="boxLi"></div> 
        <div class="outer-con "> 
         <div class="title ">
           小优布丁 
         </div> 
         <div class="sub-title ">
           &yen;4.8 
         </div> 
        </div> 
        <a href="# "><img src="/H/images/4.jpg" /></a> 
       </div> </li> 
     </div> 
     <div class="clear "></div> 
    </div> 
    
     <!--坚果--> 
  <div class="f2"> 
    <div class="am-container "> 
      <div class="shopTitle "> 
       <h4 class="floor-title">{{$scate[1]}}</h4> 
       <div class="floor-subtitle">
        <em class="am-icon-caret-left"></em>
        <h3>酥酥脆脆，回味无穷</h3>
       </div> 
       <div class="today-brands " style="right:0px ;top:13px"> 
        @foreach($cate[1] as $v)
         <a href="/home/list/{{$v->id}}">{{$v->name}}</a> 
        @endforeach
       </div> 
      </div> 
     </div> 

     <div class="am-g am-g-fixed floodSeven"> 
      <div class="am-u-sm-5 am-u-md-4 text-one list "> 
       <div class="word">
        <?php $sid = [];?>
       @foreach($cate[1] as $v) 
       <?php $sid[] = $v->id ?>
        <a class="outer" href="/home/index/{{$v->id}}"><span class="inner"><b class="text">{{$v->name}}</b></span></a> 
        @endforeach
       </div>


       <?php

             $s = [];
            for($i=0;$i<count($sid);$i++){

              $shop = DB::table('shops')->where('cate_id','=',$sid[$i])->get();

              $s[] = $shop;

            }
            
            $array = [];
            foreach($s as $val){
                foreach($val as $v){
                  $array[] = $v;
                }
            }
            // dd($array);
       ?>

      
       <a href="/home/show/{{$array[0]->id}}"> 
        <div class="outer-con "> 
         <div class="title ">
           零食大礼包开抢啦！ 
         </div> 
         <div class="sub-title ">
           零食大礼包 
         </div> 
        </div> <img src="{{$array[0]->pic}}" /> </a>
       

       <div class="triangle-topright"></div> 
      </div> 
      <div class="am-u-sm-7 am-u-md-4 text-two big"> 
       <div class="outer-con "> 
        <div class="title ">
          雪之恋和风大福 
        </div> 
        <div class="sub-title ">
        
        </div> 
       </div> 


       <a href="{{$array[1]->id}}"><img src="{{$array[1]->pic}}" /></a> 
      </div> 
      <li> 
       <div class="am-u-sm-7 am-u-md-4 text-two"> 
        <div class="boxLi"></div> 
        <div class="outer-con "> 
         <div class="title ">
           雪之恋和风大福 
         </div> 
         <div class="sub-title ">
           &yen;13.8 
         </div> 
        </div> 
        <a href="# "><img src="/H/images/6.jpg" /></a> 
       </div> </li> 
      <li> 
       <div class="am-u-sm-3 am-u-md-2 text-three sug"> 
        <div class="boxLi"></div> 
        <div class="outer-con "> 
         <div class="title ">
           小优布丁 
         </div> 
         <div class="sub-title ">
           &yen;4.8 
         </div> 
        </div> 
        <a href="# "><img src="/H/images/7.jpg" /></a> 
       </div> </li> 
      <li> 
       <div class="am-u-sm-3 am-u-md-2 text-three big"> 
        <div class="boxLi"></div> 
        <div class="outer-con "> 
         <div class="title ">
           小优布丁 
         </div> 
         <div class="sub-title ">
           &yen;4.8 
         </div> 
        </div> 
        <a href="# "><img src="/H/images/10.jpg" /></a> 
       </div> </li> 
      <li> 
       <div class="am-u-sm-3 am-u-md-2 text-three "> 
        <div class="boxLi"></div> 
        <div class="outer-con "> 
         <div class="title ">
           小优布丁 
         </div> 
         <div class="sub-title ">
           &yen;4.8 
         </div> 
        </div> 
        <a href="# "><img src="/H/images/8.jpg" /></a> 
       </div> </li> 
      <li> 
       <div class="am-u-sm-3 am-u-md-2 text-three "> 
        <div class="boxLi"></div> 
        <div class="outer-con "> 
         <div class="title ">
           小优布丁 
         </div> 
         <div class="sub-title ">
           &yen;4.8 
         </div> 
        </div> 
        <a href="# "><img src="/H/images/9.jpg" /></a> 
       </div> </li> 
     </div> 
     <div class="clear "></div> 
    </div> 
    <?php $num++;?>
   @endif
   @endforeach



    <!--首页底部-->
    <div class="footer "> 
     <div class="footer-hd "> 
      <p> <a href="# ">恒望科技</a> <b>|</b> <a href="# ">商城首页</a> <b>|</b> <a href="# ">支付宝</a> <b>|</b> <a href="# ">物流</a> </p> 
     </div> 
     <div class="footer-bd "> 
      <p> <a href="# ">关于恒望</a> <a href="# ">合作伙伴</a> <a href="# ">联系我们</a> <a href="# ">网站地图</a> <em>&copy; 2015-2025 Hengwang.com 版权所有. 更多模板 <a href="http://www.cssmoban.com/" target="_blank" title="模板之家">模板之家</a> - Collect from <a href="http://www.cssmoban.com/" title="网页模板" target="_blank">网页模板</a></em> </p> 
     </div> 
    </div> 
   </div> 
  </div>   
  <!--引导 --> 
  <div class="navCir"> 
   <li class="active"><a href="index.html"><i class="am-icon-home "></i>首页</a></li> 
   <li><a href="sort.html"><i class="am-icon-list"></i>分类</a></li> 
   <li><a href="shopcart.html"><i class="am-icon-shopping-basket"></i>购物车</a></li> 
   <li><a href="../person/index.html"><i class="am-icon-user"></i>我的</a></li> 
  </div> 
  <!--菜单 --> 
  <div class="tip"> 
   <div id="sidebar"> 
    <div id="wrap"> 
     <div id="prof" class="item "> 
      <a href="# "> <span class="setting "></span> </a> 
      <div class="ibar_login_box status_login "> 
       <div class="avatar_box "> 
        <p class="avatar_imgbox "><img src="/H/images/no-img_mid_.jpg " /></p> 
        <ul class="user_info "> 
         <li>用户名：sl1903</li> 
         <li>级&nbsp;别：普通会员</li> 
        </ul> 
       </div> 
       <div class="login_btnbox "> 
        <a href="# " class="login_order ">我的订单</a> 
        <a href="# " class="login_favorite ">我的收藏</a> 
       </div> 
       <i class="icon_arrow_white "></i> 
      </div> 
     </div> 
     <div id="shopCart " class="item "> 
      <a href="# "> <span class="message "></span> </a> 
      <p> 购物车 </p> 
      <p class="cart_num ">0</p> 
     </div> 
     <div id="asset " class="item "> 
      <a href="# "> <span class="view "></span> </a> 
      <div class="mp_tooltip ">
        我的资产 
       <i class="icon_arrow_right_black "></i> 
      </div> 
     </div> 
     <div id="foot " class="item "> 
      <a href="# "> <span class="zuji "></span> </a> 
      <div class="mp_tooltip ">
        我的足迹 
       <i class="icon_arrow_right_black "></i> 
      </div> 
     </div> 
     <div id="brand " class="item "> 
      <a href="#"> <span class="wdsc "><img src="/H/images/wdsc.png " /></span> </a> 
      <div class="mp_tooltip ">
        我的收藏 
       <i class="icon_arrow_right_black "></i> 
      </div> 
     </div> 
     <div id="broadcast " class="item "> 
      <a href="# "> <span class="chongzhi "><img src="/H/images/chongzhi.png " /></span> </a> 
      <div class="mp_tooltip ">
        我要充值 
       <i class="icon_arrow_right_black "></i> 
      </div> 
     </div> 
     <div class="quick_toggle "> 
      <li class="qtitem "> <a href="# "><span class="kfzx "></span></a> 
       <div class="mp_tooltip ">
        客服中心
        <i class="icon_arrow_right_black "></i>
       </div> </li> 
      <!--二维码 --> 
      <li class="qtitem "> <a href="#none "><span class="mpbtn_qrcode "></span></a> 
       <div class="mp_qrcode " style="display:none; ">
        <img src="/H/images/weixin_code_145.png " />
        <i class="icon_arrow_white "></i>
       </div> </li> 
      <li class="qtitem "> <a href="#top " class="return_top "><span class="top "></span></a> </li> 
     </div> 
     <!--回到顶部 --> 
     <div id="quick_links_pop " class="quick_links_pop hide "></div> 
    </div> 
   </div> 
   <div id="prof-content " class="nav-content "> 
    <div class="nav-con-close "> 
     <i class="am-icon-angle-right am-icon-fw "></i> 
    </div> 
    <div>
      我 
    </div> 
   </div> 
   <div id="shopCart-content " class="nav-content "> 
    <div class="nav-con-close "> 
     <i class="am-icon-angle-right am-icon-fw "></i> 
    </div> 
    <div>
      购物车 
    </div> 
   </div> 
   <div id="asset-content " class="nav-content "> 
    <div class="nav-con-close "> 
     <i class="am-icon-angle-right am-icon-fw "></i> 
    </div> 
    <div>
      资产 
    </div> 
    <div class="ia-head-list "> 
     <a href="# " target="_blank " class="pl "> 
      <div class="num ">
       0
      </div> 
      <div class="text ">
       优惠券
      </div> </a> 
     <a href="# " target="_blank " class="pl "> 
      <div class="num ">
       0
      </div> 
      <div class="text ">
       红包
      </div> </a> 
     <a href="# " target="_blank " class="pl money "> 
      <div class="num ">
       ￥0
      </div> 
      <div class="text ">
       余额
      </div> </a> 
    </div> 
   </div> 
   <div id="foot-content " class="nav-content "> 
    <div class="nav-con-close "> 
     <i class="am-icon-angle-right am-icon-fw "></i> 
    </div> 
    <div>
      足迹 
    </div> 
   </div> 
   <div id="brand-content " class="nav-content "> 
    <div class="nav-con-close "> 
     <i class="am-icon-angle-right am-icon-fw "></i> 
    </div> 
    <div>
      收藏 
    </div> 
   </div> 
   <div id="broadcast-content " class="nav-content "> 
    <div class="nav-con-close "> 
     <i class="am-icon-angle-right am-icon-fw "></i> 
    </div> 
    <div>
      充值 
    </div> 
   </div> 
  </div> 
  <script>
			window.jQuery || document.write('<script src="basic/js/jquery.min.js "><\/script>');
		</script> 
  <script type="text/javascript " src="/H/basic/js/quick_links.js "></script>  
 </body>
</html>