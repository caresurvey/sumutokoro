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
    $("#Prefectures").change(function(){
      $("#PrefectureLabel").val($("#Prefectures option:selected").text());
    });

    // ジオコーディング
    $("#GeoCodingBtn").on('click', function(){
      // 住所を取得
      var address = $("#PrefectureLabel").val() + $("#SpotAddress").val();
      // ジオコーディング
      geoCoding(address);
    });
});


/**
 * 地図を表示
 */
function map()
{
  // latとlngを取得
  lat = $("#SpotLat").val();
  lng = $("#SpotLng").val();

  // マップを設定
  map = L.map('mapId', {
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
    document.getElementById("SpotLat").value = result.lat;
    document.getElementById("SpotLng").value = result.lng;
  }); 

  //クリックイベント
  map.on('click', function(e) {
    //クリック位置経緯度取得
    lat = e.latlng.lat;
    lng = e.latlng.lng;
    //経緯度セット
    document.getElementById("SpotLat").value = lat;
    document.getElementById("SpotLng").value = lng;

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
  console.log(address)
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
  document.getElementById("SpotLat").value = lat;
  document.getElementById("SpotLng").value = lng;

}
