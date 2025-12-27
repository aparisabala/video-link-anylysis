@extends('site.layouts.main-layout',["tabTitle" => config('i.service_name')])
@section('page')
<style>
    body {
        background-color: white !important;;
    }
    .clock {
        text-align: center;
        display: flex;
        flex-direction: row;
        justify-content: center;
        align-content: center;
    }
</style>
<div class="container-fluid">
    <div class="row p-0">
        <div class="col-md-12">
            <h3 class="text-center fs-20 fw-bold mt-3"> 快手抖音评论成功免费送永久会员 </h3>
            <h5 class="text-center">
                <div class="clock">
                    <div class="clock" id="clock"></div>
                </div>
            </h5>
        </div>
    </div>
    <hr style="border-bottom: 2px solid rgb(59, 59, 59);">
    <div class="row fs-16">
        <div class="col-md-4">
            <h5 class=" fw-bold">
                <span> 快手/抖音 </span>
                <span style="color: #FF00FF"> 评论 3个作品  </span>
                <span> 免费领取永久会员 </span>
            </h5>
            <h5 class="fw-bold" style="color: #FF0000">1分钟完成即可</h5>
            <h5 style="color: #FF0000">第一步：</h5>
            <h5 style="color: #63D763">随便复制一条下面👇👇 蓝色字体内容，或者全部复制👇👇</h5>
            <h5 style="color: #FF0000" class="mt-4">(按照操作百分之一百拿到免费会员顺手点个赞)</h5>
            <h5 style="color: #FF0000" class="fw-bold"> 第二步: </h5>
            <h5 class=" fw-bold">
                <span style="color: #63D763"> 去 </span>
                <span style="color: #FF00FF">
                    快手 <span style="color: black"> - </span>
                </span>
                <span style="color: #FF00FF">
                    抖音 <span style="color: black"> - </span>
                </span>
                <span style="color: #FF00FF">
                    哔哩哔哩 <span style="color: black"> - </span>
                </span>
                <span style="color: #FF00FF">
                    小红书
                </span>
                <span style="color: #63D763"> 搜索下面关键词 </span>
            </h5>
            <div class="text-center">
                <i class="fa fa-arrow-down" style="color: #63D763"></i>
                <i class="fa fa-arrow-down" style="color: #63D763"></i>
                <i class="fa fa-arrow-down" style="color: #63D763"></i>
                <i class="fa fa-arrow-down" style="color: #63D763"></i>
                <i class="fa fa-arrow-down" style="color: #63D763"></i>
            </div>
            <div style="height: 120px;">

            </div>
            <div class="text-center">
                <i class="fa fa-arrow-up" style="color: #63D763"></i>
                <i class="fa fa-arrow-up" style="color: #63D763"></i>
                <i class="fa fa-arrow-up" style="color: #63D763"></i>
                <i class="fa fa-arrow-up" style="color: #63D763"></i>
                <i class="fa fa-arrow-up" style="color: #63D763"></i>
            </div>
            <h5>
                <span style="color: #63D763">
                    搜索出来的视频
                </span>
                <span style="color: #FF00FF">
                    评论3个视频
                </span>
            </h5>
            <h5 style="color: #FF0000"> 快手评论完，记得去➡️抖音➡️哔哩哔哩➡️小红书评论一下哦</h5>
            <h5 style="color: #FF0000"> 不懂的看下图</h5>
            <h5 style="color: #FF0000"> 下方图片教程仅作为参考，具体评论上方的文字即可。 </h5>
            <h5 style="color: #63D763"> 1.搜索 </h5>
            <div class="mb-2">
                <img src="{{url('images/system/img_one.jpg')}}" class="img-fluid" />
            </div>
            <h5 style="color: #63D763"> 评论成功 </h5>
            <div class="mb-2">
                <img src="{{url('images/system/img_two.jpg')}}" class="img-fluid" />
            </div>
            <h5 style="color: #63D763"> ↓↓↓点下面客服入口发3张评论截图领取↓↓↓ </h5>
            <div class="mb-2">
                <img src="{{url('images/system/img_btn.jpg')}}" class="img-fluid" />
            </div>
            <h5 style="color: #63D763">客服入口示图:</h5>
             <div class="mb-2">
                <img src="{{url('images/system/image_three.jpg')}}" class="img-fluid" />
            </div>
            <h5 style="color: #63D763">↑↑↑评论完截图给客服领永久会员↑↑↑</h5>
            <h5 style="color: #63D763">温馨提醒）领取完会员后请保管好会员账号密码。</h5>
            <h5 style="color: #FF0000">注意:先评论再联系客服，删评论者，系统无法检测到，否则领取不到</h5>
        </div>
    </div>
</div>
<script>
function updateClock() {
    const now = new Date();

    const year = now.getFullYear() + '年';
    const month = (now.getMonth() + 1).toString().padStart(2, '0') + '月';
    const day = now.getDate().toString().padStart(2, '0') + '日';

    const hours = now.getHours().toString().padStart(2, '0');
    const minutes = now.getMinutes().toString().padStart(2, '0');
    const seconds = now.getSeconds().toString().padStart(2, '0');

    // 星期
    const weekdays = ['星期日','星期一','星期二','星期三','星期四','星期五','星期六'];
    const weekday = weekdays[now.getDay()];

    document.getElementById('clock').textContent =
        year + month + day +
        hours + ':' + minutes + ':' + seconds +
        weekday;
}

// 每秒刷新
setInterval(updateClock, 1000);
updateClock();
</script>
@endsection
