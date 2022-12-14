<?php

namespace Tool\Common\Domain\Models\Book\Preview\Parts;

class PreviewCssTag
{
    public function getTemplate(): string
    {
        $css = '
          @import url("https://fonts.googleapis.com/css2?family=Lato:wght@400;700&family=M+PLUS+Rounded+1c:wght@500;700&display=swap");
          body {
          margin: 0;
          padding: 0;
          font-family: "M PLUS Rounded 1c", sans-serif;
        }
        .bp-paper__container{
          background-repeat:no-repeat;
          background-size:contain;
          position:relative;
          margin:0 auto;
          height:1600px;
          width:1130px;
        }
        .bp-paper__paperFrame{
          position:absolute;
          top:0;
          left:0;
          width:100%;
          z-index:10;
        }
        .bp-paper__formatFrame{
          position:absolute;
          top:330px;
          left:275px;
          width:545px
        }
        .bp-paper__number{
          color:#000;
          font-size:35px;
          font-weight:bold;
          position:absolute;
          top:35px;
          left:68px;
          width: 40px;
          z-index:20;
        }
        .bp-paper__makeDay{
          color:#000;
          font-size:26px;
          font-weight:bold;
          position:absolute;
          letter-spacing: -1px;
          top:-3px;
          right:170px;
          width: 40px;
          z-index:20;
        }
        .bp-paper__limitDay{
          color:#fff;
          font-size:45px;
          font-weight:bold;
          position:absolute;
          bottom:165px;
          left:160px;
          width: 40px;
          z-index:20;
        }
        .bp-container{
          top:340px;
          left:275px;
          position:absolute;
          height:817px;
          width:545px
        }
        .bp-number{
          color:#000;
          font-size:21px;
          font-weight:bold;
          position:absolute;
          top:0px;
          left:10px;
          letter-spacing:-0.08em;
          text-align:center;
          width:30px
        }
        .bp-categoryWrapper{
          position:absolute;
          top:40px;
          left:4px;
          height:70px;
          width:50px
        }
        .bp-categoryInner{
          position:relative;
          height:100%;
          width:100%
        }
        .bp-category{
          position:absolute;
          left:50%;
          display:inline;
          transform:translate(-50%, 0);
          -webkit-writing-mode:vertical-rl;
          -ms-writing-mode:tb-rl;
          writing-mode:vertical-rl;
          letter-spacing:-0.1em;
          line-height:1em;
          font-weight:bold;
          font-size:15px;
          text-align:left
        }
        .bp-area{
          position:absolute;
          display:-webkit-flex;
          display:flex;
          -webkit-align-items:center;
          align-items:center;
          -webkit-justify-content:center;
          justify-content:center;
          top:-2px;
          left:55px;
          height:50px;
          width:95px;
          text-align:center;
          font-size:14px;
          font-weight:bold;
          letter-spacing:-0.1em;
          line-height:1.2em
        }
        .bp-titWrapper{
          position:absolute;
          top:-10px;
          left:160px;
          height:60px;
          width:380px
        }
        .bp-tit{
          position:absolute;
          left:0.5mm;
          top:0px;
          right: 0px;
          z-index:1;
          width:378px
        }
        .bp-tit table td{
          font-weight:bold;
          font-size:21px;
          vertical-align:middle;
          letter-spacing:-0.02em;
          line-height: 1.2em;
          width:378px;
          height:58px
        }
        .bp-titRow{
          position:absolute;
          z-index:1;
          left:24mm;
          top:8px;
          height:45px;
          width:250px
        }
        .bp-titRow table td{
          font-weight:bold;
          vertical-align:middle;
          font-size:22px;
          letter-spacing:-0.02em;
          line-height:22px;
          width:250px
        }
        .bp-tit2Row{
          position:absolute;
          left:24mm;
          top:8px;
          height:45px;
          z-index:1;
          width:250px
        }
        .bp-tit2Row table td{
          font-weight:bold;
          vertical-align:middle;
          font-size:22px;
          letter-spacing:-0.02em;
          line-height:22px;
          width:250px
        }
        .bp-tit2Row2{
          position:absolute;
          top:8px;
          height:45px;
          left:24mm;
          z-index:1;
          width:250px
        }
        .bp-tit2Row2 table td{
          font-weight:bold;
          vertical-align:middle;
          font-size:22px;
          letter-spacing:-0.02em;
          line-height:22px;
          height:45px;
          width:250px
        }
        .bp-titNoSubTit,.bp-titRowNoSubTit{
          position:absolute;
          top:7px;
          left:0;
          height:50px;
          width:290px;
          z-index:1
        }
        .bp-titNoSubTit table td,.bp-titRowNoSubTit table td{
          height:50px;
          vertical-align:middle;
          font-weight:bold;
          font-size:22px;
          letter-spacing:-0.02em;
          line-height:22px
        }
        .bp-titNoSubTit{
          top:9px
        }
        .bp-subtit{
          margin:7px 0 0 0;
          float:left;
          height:50px;
          width:80px
        }
        .bp-subtit table td{
          font-size:15px;
          font-weight:bold;
          line-height:1em;
          letter-spacing:-0.05em;
          vertical-align:middle;
          height:50px
        }
        .bp-subtit2{
          float:left;
          margin:7px 0 0 0;
          height:50px;
          width:80px
        }
        .bp-subtit2 table td{
          font-size:15px;
          font-weight:bold;
          line-height:1em;
          letter-spacing:-0.05em;
          vertical-align:middle;
          height:50px
        }
        .bp-address{
          font-size:20px;
          font-weight:bold;
          letter-spacing:-0.05em;
          position:absolute;
          top:60px;
          left:60px
        }
        .bp-tel{
          font-size:20px;
          font-weight:bold;
          letter-spacing:-0.02em;
          position:absolute;
          top:87px;
          left:88px
        }
        .bp-statusIconWrapper{
          position:absolute;
          top:200px;
          left:32px;
          height:117px;
          width:467px
        }
        .bp-statusIconInner{
          position:relative;
          width:100%;
          height:100%
        }
        .bp-statusIcon1{
          position:absolute;
          top:130px;
          left:35px;
          width:30px
        }
        .bp-statusIcon2{
          position:absolute;
          top:130px;
          left:107px;
          width:30px
        }
        .bp-statusIcon3{
          position:absolute;
          top:130px;
          left:175px;
          width:30px
        }
        .bp-statusIcon4{
          position:absolute;
          top:130px;
          left:247px;
          width:30px
        }
        .bp-statusIcon5{
          position:absolute;
          top:130px;
          left:320px;
          width:30px
        }
        .bp-statusIcon6{
          position:absolute;
          top:130px;
          left:390px;
          width:30px
        }
        .bp-qr{
          position:absolute;
          top:92px;
          right:15px;
          width:85px
        }
        .bp-otherWrapper{
          position:absolute;
          top:179px;
          right:10px;
          height:130px;
          width:170px
        }
        .bp-otherInner{
          position:relative;
          width:100%;
          height:100%
        }
        .bp-otherIcon1{
          position:absolute;
          top:0;
          right:120px;
          width:25px
        }
        .bp-otherIcon2{
          position:absolute;
          top:0;
          right:90px;
          width:25px
        }
        .bp-otherIcon3{
          position:absolute;
          top:0;
          right:60px;
          width:25px
        }
        .bp-otherIcon4{
          position:absolute;
          top:0;
          right:30px;
          width:25px
        }
        .bp-otherIcon5{
          position:absolute;
          top:0;
          right:0px;
          width:25px
        }
        .bp-monthly{
          font-size:28px;
          font-weight:bold;
          letter-spacing:-0.05em;
          line-height:1.2em;
          position:absolute;
          top:177px;
          left:52px
        }
        .bp-monthlyYen{
          font-size:20px
        }
        .bp-movein{
          font-size:22px;
          font-weight:bold;
          letter-spacing:-0.05em;
          line-height:1.2em;
          position:absolute;
          top:217px;
          left:120px
        }
        .bp-moveinYen{
          font-size:18px
        }
        .bp-price{
          font-size:15.5px;
          line-height:1.2em;
          position:absolute;
          letter-spacing:-0.1em;
          top:256px;
          left:14px
        }
        .bp-priceHeading{
          font-size:0.9em;
          transform:scale(0.85, 1);
          transform-origin:0 0;
          width:115%
        }
        .bp-photo{
          position:absolute;
          right:3px;
          top:265px;
          width:280px;
          height:270px;
          overflow:hidden
        }
        .bp-photo img{
          width: 100%;
        }
        .bp-roomSize{
          font-size:20px;
          font-weight:bold;
          position:absolute;
          letter-spacing:-0.05em;
          left:78px;
          top:385px;
          width:270px
        }
        .bp-roomNum{
          font-size:18px;
          letter-spacing:0em;
          position:absolute;
          letter-spacing:-0.05em;
          left:78px;
          top:416px;
          width:265px
        }
        .bp-roomPrivatespace{
          font-size:17px;
          letter-spacing:-0.1em;
          line-height:1.2em;
          position:absolute;
          left:78px;
          top:445px;
          width:160px
        }
        .bp-nursingArea{
          position:absolute;
          left:9px;
          top:495px;
          letter-spacing:-0.1em;
          font-size:0.9em;
          width:530px
        }
        .bp-nursingtime{
          float:left;
          margin:0;
          width:395px
        }
        .bp-nursingnum{
          float:right;
          margin:0;
          width:120px
        }
        .bp-nursingIconWrapper{
          position:absolute;
          top:525px;
          left:30px;
          height:117px;
          width:467px
        }
        .bp-nursingIconInner{
          position:relative;
          width:100%;
          height:100%
        }
        .bp-nursingIcon1{
          position:absolute;
          top:0px;
          left:72px;
          width:30px
        }
        .bp-nursingIcon2{
          position:absolute;
          top:0px;
          left:172px;
          width:30px
        }
        .bp-nursingIcon3{
          position:absolute;
          top:0px;
          left:273px;
          width:30px
        }
        .bp-nursingIcon4{
          position:absolute;
          top:0px;
          left:375px;
          width:30px
        }
        .bp-nursingIcon5{
          position:absolute;
          top:0px;
          left:478px;
          width:30px
        }
        .bp-nursingIcon6{
          position:absolute;
          top:44px;
          left:72px;
          width:30px
        }
        .bp-nursingIcon7{
          position:absolute;
          top:44px;
          left:172px;
          width:30px
        }
        .bp-nursingIcon8{
          position:absolute;
          top:44px;
          left:273px;
          width:30px
        }
        .bp-nursingIcon9{
          position:absolute;
          top:44px;
          left:375px;
          width:30px
        }
        .bp-nursingIcon10{
          position:absolute;
          top:44px;
          left:478px;
          width:30px
        }
        .bp-nursingIcon11{
          position:absolute;
          bottom:0px;
          left:72px;
          width:30px
        }
        .bp-nursingIcon12{
          position:absolute;
          bottom:0px;
          left:172px;
          width:30px
        }
        .bp-nursingIcon13{
          position:absolute;
          bottom:0px;
          left:273px;
          width:30px
        }
        .bp-nursingIcon14{
          position:absolute;
          bottom:0px;
          left:375px;
          width:30px
        }
        .bp-nursingIcon15{
          position:absolute;
          bottom:0px;
          left:478px;
          width:30px
        }
        .bp-careIconWrapper{
          position:absolute;
          top:660px;
          left:45px;
          height:100px;
          width:280px
        }
        .bp-careIconInner{
          position:relative;
          width:100%;
          height:100%
        }
        .bp-careIcon1{
          position:absolute;
          top:0px;
          left:0px;
          width:50px
        }
        .bp-careIcon2{
          position:absolute;
          top:0px;
          left:57px;
          width:50px
        }
        .bp-careIcon3{
          position:absolute;
          top:0px;
          left:115px;
          width:50px
        }
        .bp-careIcon4{
          position:absolute;
          top:0px;
          left:173px;
          width:50px
        }
        .bp-careIcon5{
          position:absolute;
          top:0px;
          left:230px;
          width:50px
        }
        .bp-careIcon6{
          position:absolute;
          top:57px;
          left:0px;
          width:50px
        }
        .bp-careIcon7{
          position:absolute;
          top:57px;
          left:57px;
          width:50px
        }
        .bp-careIcon8{
          position:absolute;
          top:57px;
          left:115px;
          width:50px
        }
        .bp-careIcon9{
          position:absolute;
          top:57px;
          left:173px;
          width:50px
        }
        .bp-careIcon10{
          position:absolute;
          top:57px;
          left:230px;
          width:50px
        }
        .bp-company{
          position:absolute;
          bottom:2px;
          height:32px;
          left:40px;
          text-align:left;
          width:200px
        }
        .bp-company table{
          width:100%;
          height:100%
        }
        .bp-company td{
          font-size:12px;
          letter-spacing:-0.05em;
          vertical-align:middle
        }
        .bp-staff{
          font-size:12px;
          letter-spacing:-0.1em;
          text-align:center;
          left:287px;
          width:44px;
          bottom:7px;
          height:24px;
          position:absolute;
          display:-webkit-flex;
          display:flex;
          -webkit-align-items:center;
          align-items:center;
          -webkit-justify-content:center;
          justify-content:center;
          text-align:center;
          line-height:1.2em
        }
        .bp-comment{
          font-size:12px;
          letter-spacing:-0.05em;
          position:absolute;
          bottom:9px;
          right:8px;
          height:154px;
          width:195px
        }
        .bp-comment__heading{
          margin: 0 0 2px 0;
          font-size:17px;
          font-weight:bold;
          line-height:1em;
          letter-spacing:-0.05em
        }
        .bp-comment__description{
          font-size:13.5px;
          margin: 0;
          letter-spacing:-0.07em;
          line-height:1.3em
        }

        ';

        return $css;
    }
}