@extends("newSystem/frontendMain/layouts/template/template-spin")

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

.mainbox{
    position: relative;
    width: 350px;
    height: 350px;
    /* width: 500px;
    height: 500px; */
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
    border: 5px solid rgb(9, 87, 35);
    overflow: hidden;
    transition: all ease 5s;
}

span{
    width: 50%;
    height: 50%;
    display: inline-block;
    position: absolute;
}

.box1 .span1{
    background-color: #1e9d04;
    color: #fff !important;

    clip-path: polygon(0 100%, 100% 25%, 0 0%);
    top: 120px;
    left: 0;
}

.box2 .span1{
    background-color: #6af743;
    color: #000 !important;

    clip-path: polygon(0 96%, 103% 30%, 0 0%);
    top: 120px;
    left: 0;
}

.box1 .span2{
    background-color: #1e9d04;
    color: #fff !important;

    clip-path: polygon(100% 89%, 0 63%, 100% 0%);
    top: 62px;
    right: 0;
}

.box2 .span2{
    background-color: #6af743;
    color: #000 !important;

    clip-path: polygon(100% 93%, 0 60%, 100% 0%);
    top: 70px;
    right: 0;
}

.box1 .span3{
    background-color: #1e9d04;
    color: #fff !important;

    clip-path: polygon(20% 0%, 0% 113%, 501% 40%);
    bottom: 0;
    left: 82px;
}

.box2 .span3{
    background-color: #6af743;
    color: #000 !important;

    clip-path: polygon(27% 0%, 7% 100%, 100% 120%);
    bottom: 0;
    left: 120px;
}

.box2 .span4{
    background-color: #ff0000;
    color: #fff !important;

    clip-path: polygon(28% 97%, 60% 0, 0% 0);
    top: 0;
    left: 120px;
}

.box1 .span4{
    background-color: #1e9d04;
    color: #fff !important;

    clip-path: polygon(40% 200%, 100% 0, 0% 0);
    top: 0;
    left: 92px;
}

.box1 .span3 b{
    transform: translate(-50%, -50%) rotate(-270deg);

    top: 53%;
    left: 50%;
}

.box1 .span1 b{
    transform: translate(-60%, -59%) rotate(177deg);

    top: 38%;
    left: 50%;
}

.box1 .span2 b{
    transform: translate(-30%, -60%) rotate(350deg);

    top: 58%;
    left: 50%;
}


.box2 .span1 b{
    transform: translate(-60%, -59%) rotate(173deg);

    top: 38%;
    left: 53%;
}

.box2 .span2 b{
    transform: translate(-45%, -52%) rotate(355deg);

    top: 57%;
    left: 57%;
}

.box2 .span3 b{
    transform: translate(-90%, -50%) rotate(76deg);

    top: 57%;
    left: 53%;
}

.box1 .span4 b{
    transform: translate(-57%, -130%) rotate(270deg);

    top: 60%;
    left: 50%;
}

.box2 .span4 b{
    transform: translate(-92%, -129%) rotate(268deg);

    top: 62%;
    left: 51%;
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
    font-weight: normal !important;
}

.spin{
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    width: 60px;
    height: 60px;
    border-radius: 50%;
    border: 2px solid #fff;
    background-color: #001aff;
    color: #fff;
    box-shadow: 0 5px 20px #000;
    font-weight: bold;
    font-size: 17px;
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
@section("content")
<h1 class="kanit mt-5" style="color: #008d2b; font-weight:bolder;"><center> ลุ้นรับยางรถยนต์ฟรี 1 เส้น <br>หรือรับส่วนลดสูงสุด 1,000 บาท <br><h1>
    <p style="color: #008d2b;">เมื่อเปลี่ยนยางรถยนต์ ยี่ห้อ OTANI รุ่นใด ขนาดใดก็ได้ 4 เส้น</p>
    <p>* เงื่อนไขเป็นตามที่บริษัทฯกำหนด ขอสงวนสิทธิ์ในการเปลี่ยนแปลงหรือแก้ไข โดยไม่ต้องแจ้งให้ทราบล่วงหน้า</p>
</center><br>

<center>
    <div id="mainbox" class="mainbox">
        <div id="box" class="box">
            <div class="box1">
                <span class="span1"><b>คูปองเงินสด 300.-</b></span>
                <span class="span2"><b>คูปองเงินสด 200.-</b></span>
                <span class="span3"><b>คูปองเงินสด 300.-</b></span>
                <span class="span4"><b>คูปองเงินสด 1,000.-</b></span>
            </div>
            <div class="box2">
                <span class="span1"><b>คูปองเงินสด 400.-</b></span>
                <span class="span2"><b>คูปองเงินสด 200.-</b></span>
                <span class="span3"><b>คูปองเงินสด 400.-</b></span>
                <span class="span4"><b>รับฟรียาง 1 เส้น</b></span>
            </div>
        </div>
        <button class="spin kanit" onclick="myfunction()">หมุน</button>
    </div>
</center>

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
@endsection