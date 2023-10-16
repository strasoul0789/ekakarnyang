<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title','เอกการยาง ไว้ใจ ผู้เชี่ยวชาญเรื่องรถยนต์ ในพื้นที่จังหวัดภูเก็ต และพังงา')</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Kanit">
    <style>
    .kanit {
        font-family: 'Kanit';
    }

    *{
        box-sizing: border-box;
        padding: 0;
        margin: 0;
        outline: none;
    }

    body{
        display: flex;
        justify-content: center;
        align-items: center;
        min-height: 100vh;
        overflow: hidden;
    }

    .mainbox{
        position: relative;
        width: 500px;
        height: 500px;
    }

    .mainbox:after{
        position: absolute;
        content: '';
        width: 36px;
        height: 32px;
        background: url('././images/spin-wheel/arrow-left.png') no-repeat;
        background-size: 21px;
        right: -22px;
        top: 52%;
        transform: translateY(-50%);
    }

    .box{
        width: 100%;
        height: 100%;
        position: relative;
        border-radius: 50%;
        border: 10px solid #fff;
        overflow: hidden;
        transition: all ease 5s;
    }

    span{
        width: 50%;
        height: 50%;
        display: inline-block;
        position: absolute;
    }

    .span1{
        clip-path: polygon(0 92%, 100% 50%, 0 8%);
        background-color: #fffb00;
        top: 120px;
        left: 0;
    }

    .span2{
        clip-path: polygon(100% 92%, 0 50%, 100% 8%);
        background-color: #ff4fa1;
        top: 120px;
        right: 0;
    }

    .span3{
        clip-path: polygon(50% 0%, 8% 100%, 92% 100%);
        background-color: #ffaa00;
        bottom: 0;
        left: 120px;
    }

    .span4{
        clip-path: polygon(50% 100%, 92% 0, 8% 0);
        background-color: #22ff00;
        top: 0;
        left: 120px;
    }

    .box1 .span3 b{
        transform: translate(-50%, -50%) rotate(-270deg);
    }
    .box1 .span1 b,
    .box2 .span1 b{
        transform: translate(-50%, -50%) rotate(185deg);
    }
    .box2 .span3 b{
        transform: translate(-50%, -50%) rotate(90deg);
    }
    .box1 .span4 b,
    .box2 .span4 b{
        transform: translate(-50%, -127%) rotate(-85deg);
    }

    .box2{
        width: 100%;
        height: 100%;
        transform: rotate(-135deg);
    }
    span b{
        font-size: 14px;
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-24%, -60%);
    }

    .spin{
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        width: 75px;
        height: 75px;
        border-radius: 50%;
        border: 4px solid #fff;
        background-color: #001aff;
        color: #fff;
        box-shadow: 0 5px 20px #000;
        font-weight: bold;
        font-size: 22px;
        cursor: pointer;
    }
    .spin:active{
        width: 70px;
        height: 70px;
        font-size: 20px;
    }

    .mainbox.animate:after{
        animation: animateArrow 0.7s ease infinite;
    }
    @keyframes animateArrow{
        50%{
            right: -40px;
        }
    }
    </style>
</head>
  <body>
    <h2 class="kanit"><center> ลุ้นรับยางรถยนต์ฟรี 1 เส้น <br>หรือรับส่วนลดสูงสุด 1,000 บาท <br>
		</center><br>
    
	<div id="mainbox" class="mainbox">
		<div id="box" class="box">
			<div class="box1">
				<span class="span1"><b>คูปองเงินสด 300.-</b></span>
				<span class="span2"><b>คูปองเงินสด 200.-</b></span>
				<span class="span3"><b>คูปองเงินสด 300.-</b></span>
				<span class="span4"><b>คูปองเงินสด 1,000.-</b></span>
			</div>
			<div class="box2">
				<span class="span1"><b>รับฟรียาง 1 เส้น</b></span>
				<span class="span2"><b>คูปองเงินสด 200.-</b></span>
				<span class="span3"><b>คูปองเงินสด 400.-</b></span>
				<span class="span4"><b>คูปองเงินสด 500.-</b></span>
			</div>
		</div>
		<button class="spin kanit" onclick="myfunction()">หมุน</button>
	</div>

<script>
    function myfunction(){

        var x = 1024; //min value
        var y = 9999; // max value

        var deg = Math.floor(Math.random() * (x - y)) + y;

        document.getElementById('box').style.transform = "rotate("+deg+"deg)";

        var element = document.getElementById('mainbox');
        element.classList.remove('animate');
        setTimeout(function(){
            element.classList.add('animate');
        }, 5000); //5000 = 5 second
    }
</script>

</body>
</html>