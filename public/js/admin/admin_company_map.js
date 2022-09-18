/**
 *
 * 管理画面の地図編集処理
 *
 */

var map;
var marker;
var tileLayer;
var geoCodingLat;
var geoCodingLng;
var lat;
var lng;

$(document).ready(function () {
    // 地図表示
    map();

    // 都道府県が変更されたら
    $("#CompanyPrefecture").change(function(){
      $("#CompanyPrefectureLabel").val($("#CompanyPrefecture option:selected").text());
    });
    // 市町村が変更されたら
    $("#CompanyCity").change(function(){
      $("#CompanyCityLabel").val($("#CompanyCity option:selected").text());
    });

    // ジオコーディング
    $("#GeoCodingBtn").on('click', function(){
      // 住所を取得
      var address = $("#CompanyPrefectureLabel").val() + $("#CompanyCityLabel").val() + $("#CompanyAddress").val();
      console.log(address)
      // ジオコーディング
      geoCoding(address);
    });

    // 元に戻す
    $("#BackToPosition").on('click', function(){
      backToPosition();
    });
});


function backToPosition()
{
  document.getElementById("CompanyLat").value = document.getElementById("CompanyLatOld").value;
  document.getElementById("CompanyLng").value = document.getElementById("CompanyLngOld").value;
  lat = document.getElementById("CompanyLat").value;
  lng = document.getElementById("CompanyLng").value;
  marker.setLatLng(L.latLng(lat,lng));
  map.panTo(L.latLng(lat,lng), {
    scrollWheelZoom:false,
    animate: true
  });
}

/**
 * 地図を表示
 */
function map()
{
  // latとlngを取得
  lat = $("#CompanyLat").val();
  lng = $("#CompanyLng").val();

  // マップを設定
  map = L.map('CompanyMap', {
    center: [lat, lng],
    scrollWheelZoom: false,
    zoom: 17,
  });

  // タイルを指定
  tileLayer = L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
    attribution: '© <a href="http://osm.org/copyright">OpenStreetMap</a> contributors, <a href="http://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>',
  });

  // マーカーをセット
  marker = L.marker([lat, lng],{draggable:true}).addTo(map);

  marker.on('dragend', function(event) {
    var marker = event.target; 
    var result = marker.getLatLng();
    marker.setLatLng(result);
    map.panTo(result, {
      animate: true
    });
    document.getElementById("CompanyLat").value = result.lat;
    document.getElementById("CompanyLng").value = result.lng;
  }); 

  //クリックイベント
  map.on('click', function(e) {
    //クリック位置経緯度取得
    lat = e.latlng.lat;
    lng = e.latlng.lng;
    //経緯度セット
    document.getElementById("CompanyLat").value = lat;
    document.getElementById("CompanyLng").value = lng;

    marker.setLatLng(e.latlng);
    map.panTo(e.latlng, {
      scrollWheelZoom:false,
      animate: true
    });
  });

  tileLayer.addTo(map);
}

/**
 * ジオコーディング
 */
function geoCoding(address)
{
  getLatLng(address, (latlng) => {
    lat = latlng.lat;
    lng = latlng.lng;
    marker.setLatLng(latlng);
    map.panTo(latlng, {
      scrollWheelZoom:false,
      animate: true
    });
    setForm();
  })
}

function setForm()
{
  document.getElementById("CompanyLat").value = lat;
  document.getElementById("CompanyLng").value = lng;

}
