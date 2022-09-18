@if(!empty($data['isSpotEdit']))
  <script src="https://unpkg.com/leaflet@1.6.0/dist/leaflet.js"
          integrity="sha512-gZwIG9x3wUXg2hdXF6+rVkLF/0Vi9U8D2Ntg4Ga5I5BZpVkVxlJWbSQtXPSiUTtC0TjtGOmxa1AJPuV0CPthew=="
          crossorigin=""></script>
  <script src="https://cdn.geolonia.com/community-geocoder.js"></script>
  <script src="{{asset('/')}}js/admin/admin_spot_map.js"></script>
@endif

@if(!empty($data['isCompanyEdit']))
  <script src="https://unpkg.com/leaflet@1.6.0/dist/leaflet.js"
          integrity="sha512-gZwIG9x3wUXg2hdXF6+rVkLF/0Vi9U8D2Ntg4Ga5I5BZpVkVxlJWbSQtXPSiUTtC0TjtGOmxa1AJPuV0CPthew=="
          crossorigin=""></script>
  <script src="https://cdn.geolonia.com/community-geocoder.js"></script>
  <script src="{{asset('/')}}js/admin/admin_company_map.js"></script>
@endif
