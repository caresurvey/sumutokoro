<!doctype html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>@yield('title')</title>
<style>
body {
  font-size: .8em;
  letter-spacing: .01em;
  padding-top: 0px;
}
ul, li {
  margin: 0;
  padding: 0;
  list-style: none;
}
table {
  border-collapse:collapse;
  margin: 0;
  padding: 0;
}
th, td {
  font-weight: normal;
  text-align: left;
}
.title {
  background: #000;
  color: #fff;
  font-size: 1.2em;
  margin-bottom: 0;
  padding: 5px;
  text-align: center;
}
.main-container {
  clear: both;
  margin: 0 auto 20px auto;
  overflow: hidden;
  width: 600px;
}
.table {
  width: 100%;
}
.table-outline th,
.table-outline td {
  border-top: 2px solid #aaa;
  border-bottom: 2px solid #aaa;
  padding: 3px;
}
.table-outline th {
  border-left: 2px solid #aaa;
  width: 30%;
}
.table-outline td {
  border-right: 2px solid #aaa;
  width: 70%;
}
.outline {
  float: left;
  width: 55%;
}
.company {
  font-size: .8em;
  float: right;
  line-height: 1.3em;
  text-align: left;
  width: 41%;
}
.company p {
  margin: 0 0 5px 0;
  padding: 0;
}
.company-logo {
  margin-bottom: 10px;
  width: 200px;
}
.text {
  display: block;
  text-decoration: underline;
  width: 100%;
}
.spotlist {

}
.spotlists {
  border: 2px solid #aaa;
  margin-bottom: 15px;
  padding: 5px 10px;
}
.ps {
  margin-bottom: 20px;
  padding-top: 5px;
}
.sirial {
  border: 2px solid #aaa;
  display: block;
  font-size: .8em;
  float: right;
  padding: 5px;
  width: 200px;
}
.space {
  border: none;
  clear: both;
  overflow: hidden;
  padding: 5px 0;
}
</style>
</head>
<body class="bg-base">
  @yield('content')
</div>
</body>
</html>
