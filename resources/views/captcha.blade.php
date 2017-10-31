<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Captcha</title>

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin="anonymous">

    <!-- Custom styles for this template -->
    <link href="/css/app.css" rel="stylesheet">
<!--     <script src='https://www.google.com/recaptcha/api.js'></script> -->
  </head>

  <body>

    <div class="container">
      @if(session()->has('success'))
        <div class="alert alert-success" role="alert">{{ session('success') }}</div>
      @endif

      @if(session()->has('error'))
        <div class="alert alert-danger" role="alert">{{ session('error') }}</div>
      @endif
      <div class="row marketing">
        <div class="col-sm-12">
          @if ($errors->any())
            <div class="alert alert-danger">
              <ul>
                @foreach ($errors->all() as $error)
                  <li>{{ $error }}</li>
                @endforeach
              </ul>
            </div>
          @endif

          <h3>Captcha test</h3>
          <form method="POST" action="/captcha" id="captcha-form">
            {{ csrf_field() }}
            <div class="form-group">
              <label for="exampleInputEmail1">Name</label>
              <input type="text" name="name" class="form-control" id="name" value="{{ old('name') }}">
            </div>
            <div class="form-group">
              <label for="exampleInputPassword1">Your message</label>
              <textarea name="message" class="form-control" id="exampleFormControlTextarea1" rows="5">{{ old('message') }}</textarea>
            </div>
            <br>
            @captcha()
            <br>
            <button type="submit">Submit</button>
          </form>
        </div>
      </div>
    </div> <!-- /container -->
  </body>
</html>
