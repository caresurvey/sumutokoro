<!doctype html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>@yield('title')</title>
</head>
<body class="{{ $controllerName }} {{ $actionName }}" id="Top">

@yield('content')

<input type="hidden" name="controllerName" value="{{ $controllerName }}">
<input type="hidden" name="actionName" value="{{ $actionName }}">
</body>
</html>
