<?php

namespace Tool\Common\Domain\Models\Book\Publish\Format\Html\Page;

/**
 * CSS
 */
class Css
{
    /**
     * CSSタグを作成
     * @return string
     */
    public function getTag(): string
    {
      $tag = '* {
        margin:0;
        padding: 0;
      }
      html {
        width: 100%;
        height: 100%;
      }
      .b-wrapper {
        /* 595px × 842px */
        /* 2894px × 4093px */
        /* 992px × 1324px */
        height: 1324px;
        width: 992px;
      }
      .b-containers {
        padding: 8% 6%;
        width: 100%;
        height: 100%;
      }
      .b-container {
        position: relative;
        width: 46%;
        height: 50%;
        margin: 2%;
        float: left;
      }
      .b-number {
        position: absolute;
        top: 8px;
        left: 8px;
        z-index: 20;
        width: 30px;
        height: 28px;
        display: -webkit-box;
        -webkit-box-pack: center;
        -webkit-box-align: center;
        -webkit-box-orient: vertical;
      }
      .b-category{
        position:absolute;
        top:43px;
        left:0.5px;
        height:63px;
        width:42px;
        -webkit-writing-mode:vertical-rl;
        -ms-writing-mode:tb-rl;
        writing-mode:vertical-rl;
        letter-spacing:-0.1em;
        line-height:1em;
        font-weight:bold;
        font-size:15px;
        text-align: center;
        display: -webkit-box;
        -webkit-box-pack: center;
        -webkit-box-align: start;
        -webkit-box-orient: vertical;
        z-index: 20;
      }
      .b-category .image {
        width:90%;
      }
      .b-area {
        position:absolute;
        /* background: rgba(255, 0, 0, .2); */
        top:0.3%;
        left:10.3%;
        height:7.6%;
        width:17.5%;
        font-size: .8em;
        display: -webkit-box;
        -webkit-box-pack: center;
        -webkit-box-align: center;
        -webkit-box-orient: vertical;
        z-index:20;
      }
      .b-name {
        position:absolute;
        /* background: rgba(255, 0, 0, .2); */
        line-height: 1.2em;
        top:0.3%;
        left:30%;
        height:7.6%;
        width:70%;
        display: -webkit-box;
        -webkit-box-pack: center;
        -webkit-box-align: start;
        -webkit-box-orient: vertical;
        z-index:20;
      }
      .b-address {
        position:absolute;
        /* background: rgba(255, 0, 0, .2); */
        top:8%;
        left:11.2%;
        height:3.5%;
        width:73%;
        display: -webkit-box;
        -webkit-box-pack: center;
        -webkit-box-align: start;
        -webkit-box-orient: vertical;
        z-index:20;
      }
      .b-tel {
        position:absolute;
        /* background: rgba(255, 0, 0, .2); */
        top:11.5%;
        left:17%;
        height:3%;
        width:65%;
        font-size: 1.1em;
        display: -webkit-box;
        -webkit-box-pack: center;
        -webkit-box-align: start;
        -webkit-box-orient: vertical;
        z-index:20;
      }
      .b-statusIcons {
        position:absolute;
        top: 16.25%;
        left: 1.3%;
        height: 6%;
        width: 85%;
        z-index:20;
      }
      .b-statusIcon {
        float: left;
        margin-left: 5.3%;
        display: -webkit-box;
        -webkit-box-pack: center;
        -webkit-box-align: center;
        -webkit-box-orient: vertical;
        height: 10%;
        width: 10%;
      }
      .b-statusIcon img {
        width: 80%;
      }
      .b-monthly_price {
        position:absolute;
        /* background: rgba(255, 0, 0, .2); */
        top:22%;
        left:9%;
        height:4.3%;
        width:64%;
        display: -webkit-box;
        -webkit-box-pack: center;
        -webkit-box-align: start;
        -webkit-box-orient: vertical;
        z-index:20;
      }
      .b-movein_price {
        position: absolute;
        /* background: rgba(255, 0, 0, .2); */
        top:26.5%;
        left:9%;
        height:4%;
        width:64%;
        z-index: 20;            
      }
      .b-otherIcons {
        position: absolute;
        /* background: rgba(255, 0, 0, .2); */
        top:23%;
        right:0;
        height:10%;
        width:26.5%;
        z-index: 20;            
      }
      .b-otherIcon {
        float: left;
        margin-right: 1.7%;
        display: -webkit-box;
        -webkit-box-pack: center;
        -webkit-box-align: center;
        -webkit-box-orient: vertical;
        height: 10%;
        width: 17.5%;
      }
      .b-otherIcon img {
        width: 100%;
      }
      .b-qr {
        position: absolute;
        /* background: rgba(255, 0, 0, .2); */
        top: 10%;
        right: 1.2%;
        width: 18%;
        z-index: 20;                
      }
      .b-photo {
        position: absolute;
        /* background: rgba(255, 0, 0, .2); */
        top:34.5%;
        right:0.3%;
        width: 48%;
        z-index: 20;
      }
      .b-photo img {
          width: 100%;
      }
      .b-prices {
        position: absolute;
        /* background: rgba(255, 0, 0, .2); */
        top:31.5%;
        left:2.8%;
        height:16%;
        width:45%;
        font-size: .7em;
        line-height: 1.3em;
        z-index: 20;            
      }
      .b-room_size {
        position: absolute;
        /* background: rgba(255, 0, 0, .2); */
        top:48%;
        left:15%;
        height:3%;
        width:32%;
        font-size: .8em;
        line-height: 1.3em;
        display: -webkit-box;
        -webkit-box-pack: center;
        -webkit-box-align: start;
        -webkit-box-orient: vertical;
        z-index: 20;            
      }
      .b-rooms {
        position: absolute;
        /* background: rgba(255, 0, 0, .2); */
        top:51.4%;
        left:15%;
        height:3%;
        width:32%;
        font-size: .8em;
        line-height: 1.3em;
        display: -webkit-box;
        -webkit-box-pack: center;
        -webkit-box-align: start;
        -webkit-box-orient: vertical;
        z-index: 20;                
      }
      .b-privatespaceIcons {
        position: absolute;
        /* background: rgba(255, 0, 0, .2); */
        top:54.6%;
        left:15%;
        height:5%;
        width:32%;
        font-size: .8em;
        line-height: 1.3em;
        display: -webkit-box;
        -webkit-box-pack: center;
        -webkit-box-align: start;
        -webkit-box-orient: vertical;
        z-index: 20;                
      }
      .b-nursing_time {
        /* background: rgba(255, 0, 0, .2); */
        position: absolute;
        top: 60.8%;
        font-size: .8em;
        left: 1%;
        color: #fff;
        z-index: 20;                
      }
      .b-nursing_num {
        /* background: rgba(255, 0, 0, .2); */
        position: absolute;
        top: 60.8%;
        right: 1%;
        font-size: .8em;
        color: #fff;
        z-index: 20;                
      }
      .b-nursingIcons {
        /* background: rgba(255, 0, 0, .2); */
        position:absolute;
        margin-left: -13.5%;
        top: 64.3%;
        right: 0.3%;
        height: 15%;
        width: 100%;
        z-index:20;
      }
      .b-nursingIcon {
        /* background: rgba(0, 255, 0, .2); */
        float: right;
        margin-left: 11.7%;
        margin-bottom: 0.5%;
        display: -webkit-box;
        -webkit-box-pack: center;
        -webkit-box-align: center;
        -webkit-box-orient: vertical;
        text-align: center;
        height: 32%;
        width: 7%;
      }
      .b-nursingIcon img {
        padding-top:3%;
        width: 85%;
      }
      .b-careIcons {
        /* background: rgba(255, 0, 0, .2); */
        position:absolute;
        bottom: 4.8%;
        left: 6.5%;
        height: 14.5%;
        width: 53%;
        z-index:20;
      }
      .b-careIcon {
        /* background: rgba(0, 255, 0, .2); */
        float: right;
        display: -webkit-box;
        -webkit-box-pack: center;
        -webkit-box-align: center;
        -webkit-box-orient: vertical;
        margin-left: 3%;
        margin-bottom: 2%;
        height: 42%;
        width: 17%;
      }
      .b-careIcon img {
        width: 100%;
      }
      .b-company {
        /* background: rgba(255, 0, 0, .2); */
        position:absolute;
        bottom: 0;
        left: 7.3%;
        font-size: .6em;
        height: 5%;
        width: 35%;
        display: -webkit-box;
        -webkit-box-pack: center;
        -webkit-box-align: start;
        -webkit-box-orient: vertical;
        z-index:20;
      }
      .b-staffs {
        /* background: rgba(255, 0, 0, .2); */
        position:absolute;
        bottom: 0;
        left: 51.5%;
        font-size: .6em;
        height: 5%;
        width: 9%;
        display: -webkit-box;
        -webkit-box-pack: center;
        -webkit-box-align: start;
        -webkit-box-orient: vertical;
        z-index:20;
      }
      .b-comment {
        /* background: rgba(255, 0, 0, .2); */
        position:absolute;
        bottom: 0%;
        padding:1%;
        right: 0;
        font-size: .6em;
        height: 19%;
        width: 36%;
        z-index:20;
      }
      .b-descriptionBar {
        position: absolute;
        top: 100px;
        height: 1200px;
        width: 30px;
      }
      .b-descriptionBarLeft {
        left: 45px;
      }
      .b-descriptionBarRight {
        right: 45px;
      }
      .b-descriptionBar img {
        width: 100%;
      }
      .b-areaLabels {
        position: absolute;
        top: 100px;
        height: 1324px;
        width: 40px;
      }
      .b-areaLabelsLeft {
        left: 0;
      }
      .b-areaLabelsRight {
        right: 0;
      }
      .b-areaLabel {
        background: #333;
        display: -webkit-box;
        -webkit-box-pack: center;
        -webkit-box-align: center;
        -webkit-box-orient: vertical;
        text-align: center;
        margin-bottom: 5px;
        height: 90px;
        width: 40px;
      }
      .b-areaLabel .image {
        height: 100%;
      }
      .b-frame {
        /* background: rgba(0, 0, 255, .4); */
        position: absolute;
        top: 0;
        left: 0;
        height: 100%;
        width: 100%;
        z-index: 10;
      }
      .b-frame .svg {
        height: 100%;
        width: 100%;
      }';

      return $tag;
    }
}
