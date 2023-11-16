<template>
    <!-- Nav -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="#">Navbar</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            <div class="navbar-nav">
            <a class="nav-item nav-link active" href="#">Home <span class="sr-only">(current)</span></a>
            <a class="nav-item nav-link" href="#">Features</a>
            <a class="nav-item nav-link" href="#">Pricing</a>
            <a class="nav-item nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Disabled</a>
            </div>
        </div>
    </nav>

    <!-- Container -->
    <div class="container">
        <div class="row mt-5">
            <div class="circle1 col-md-6 col-xs-12">
                <div class="wrapper1">
                    <span class="text1">3533545</span>
                    <span class="text2">3533545</span>
                    <span class="text3">3533545</span>
                    <span class="text4">3533545</span>
                    <span class="text5">3533545</span>
                    <span class="text6">3533545</span>
                    <span class="text7">3533545</span>
                    <span class="text8">3533545</span>
                    <span class="text9">3533545</span>
                    <div class="sector1" style="transform: rotate(90deg) skew(50deg);"></div>
                    <div class="sector1" style="transform: rotate(130deg) skew(50deg);"></div>
                    <div class="sector1" style="transform: rotate(165deg) skew(50deg);"></div>
                    <div class="sector1" style="transform: rotate(205deg) skew(50deg);"></div>
                    <div class="sector1" style="transform: rotate(245deg) skew(45deg);"></div>
                    <div class="sector1" style="transform: rotate(290deg) skew(45deg);"></div>
                    <div class="sector1" style="transform: rotate(335deg) skew(50deg);"></div>
                    <div class="sector1" style="transform: rotate(375deg) skew(50deg);"></div>
                    <div class="sector1" style="transform: rotate(410deg) skew(50deg);"></div>
                </div>
                <div class="circle2">
                    <div class="wrapper2">
                        <span class="text1">3533545</span>
                        <span class="text2">3533545</span>
                        <span class="text3">3533545</span>
                        <div class="sector2" style="transform: rotate(90deg) skew(155deg);"></div>
                        <div class="sector2" style="transform: rotate(205deg) skew(140deg);"></div>
                        <div class="sector2" style="transform: rotate(335deg) skew(155deg);"></div>
                    </div>
                </div>
                <div class="circle3">
                    <div class="wrapper3">
                        <span class="text1">3533545</span>
                    </div>
                </div>
            </div>

            <ol class="list-group list-group-numbered col-md-6 col-xs-12">
                <li class="list-group-item d-flex justify-content-between align-items-start">
                    <div class="ms-2 me-auto">
                        Name
                        <div class="font-weight-bold">Indunil Lakshitha</div>
                    </div>
                </li>
                <li class="list-group-item d-flex justify-content-between align-items-start">
                    <div class="ms-2 me-auto">
                        Address
                        <div class="font-weight-bold">Bandaragama, Sri Lanka.</div>
                    </div>
                </li>
                <li class="list-group-item d-flex justify-content-between align-items-start">
                    <div class="ms-2 me-auto">
                        Phone
                        <div class="font-weight-bold">071 123 4567</div>
                    </div>
                </li>
                <li class="list-group-item d-flex justify-content-between align-items-start">
                    <div class="ms-2 me-auto">
                        My Referrals
                        <div class="font-weight-bold">Amal, Nimal, Kamal, ... <a href="">View more</a></div>
                    </div>
                    <span class="badge bg-primary rounded-pill">14</span>
                </li>
            </ol>
        </div>




    </div>
</template>
<script></script>
<style>
    .circle1 {
        background: #fff;
        /* width: 350px;
        height: 350px; */
        display: flex;
        align-items: center;
        justify-content: center;
    }
    .wrapper1 {
        width: 300px;
        height: 300px;
        border: 2px solid #fff;
        border-radius: 50%;
        position: relative;
        overflow: hidden;
    }
    .sector1 {
        position: absolute;
        transform-origin: 100% 100%;
        background: rgb(201,201,201);
        width: 5000px;
        height: 5000px;
        left: 50%;
        top: 50%;
        border: 0.5px solid #ffffff;
        box-shadow: inset 0px 0px 0px 0.5px #ffffff;
        margin-top: -5000px;
        margin-left: -5000px;
    }
    .wrapper2 {
        width: 200px;
        height: 200px;
        border: 2px solid #ffffff;
        border-radius: 50%;
        position: relative;
        overflow: hidden;
    }
    .circle2 {
        position: absolute;
    }
    .sector2 {
        position: absolute;
        transform-origin: 100% 100%;
        background: rgb(148,147,153);
        width: 5000px;
        height: 5000px;
        left: 50%;
        top: 50%;
        border: 0.5px solid #ffffff;
        box-shadow: inset 0px 0px 0px 0.5px #ffffff;
        margin-top: -5000px;
        margin-left: -5000px;
    }
    .circle3 {
        position: absolute;
    }
    .wrapper3 {
        width: 100px;
        height: 100px;
        border: 2px solid #ffffff;
        border-radius: 50%;
        position: relative;
        overflow: hidden;
        background: rgb(1,1,1);
    }
    /* Text */
    .circle1 .text1,
    .circle1 .text2,
    .circle1 .text3,
    .circle1 .text4,
    .circle1 .text5,
    .circle1 .text6,
    .circle1 .text7,
    .circle1 .text8,
    .circle1 .text9,
    .circle1 .circle2 .text1,
    .circle1 .circle2 .text2,
    .circle1 .circle2 .text3,
    .circle1 .circle3 .text1 {
        color: red;
        position: absolute;
        font-size: 10px;
        z-index: 99;
    }
    /* Circle1 */
    .circle1 .text1 {
        top: 10%;
        left: 60%;
    }
    .circle1 .text2 {
        top: 28%;
        left: 80%;
    }
    .circle1 .text3 {
        top: 53%;
        left: 85%;
    }
    .circle1 .text4 {
        top: 77%;
        left: 73%;
    }
    .circle1 .text5 {
        top: 90%;
        left: 46%;
    }
    .circle1 .text6 {
        top: 77%;
        left: 15%;
    }
    .circle1 .text7 {
        top: 50%;
        left: 3%;
    }
    .circle1 .text8 {
        top: 28%;
        left: 8%;
    }
    .circle1 .text9 {
        top: 10%;
        left: 30%;
    }
    /* Circle2 */
    .circle1 .circle2 .text1 {
        top: 30%;
        left: 8%;
    }
    .circle1 .circle2 .text2 {
        top: 30%;
        left: 75%;
    }
    .circle1 .circle2 .text3 {
        top: 82%;
        left: 40%;
    }
    /* Circle3 */
    .circle1 .circle3 .text1 {
        top: 45%;
        left: 35%;
    }
</style>
