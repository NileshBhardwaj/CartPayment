<html lang="en">
<head>
	<meta charset="utf-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>
	<link href='https://fonts.googleapis.com/css?family=Lato:300,400|Montserrat:700' rel='stylesheet' type='text/css'>
	<style>
		@import url(//cdnjs.cloudflare.com/ajax/libs/normalize/3.0.1/normalize.min.css);
		@import url(//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css);
		.back {
  position: relative;
  display: inline-block;
  text-decoration: none;
  padding: 10px 10px 10px 40px;
}

.back h4 {
  color: #4A4F6A;
  font-size 16px;
  transform: translateY(8px);
  transition: transform 500ms 0s cubic-bezier(0.2, 0, 0, 1);
}

.back span {
  opacity: 0;
  color: #858BA9;
  font-size: 12px;
  font-weight: 300;
  display: inline-block;
  transform: translateY(10px);
  transition:
    transform 500ms 0s cubic-bezier(0.2, 0, 0, 1),
    opacity 500ms 0s cubic-bezier(0.2, 0, 0, 1)
}

.back div {
  top: 11px;
  left: 0;
  content: '';
  width: 30px;
  height: 30px;
  display: block;
  overflow: hidden;
  position: absolute;
  border-radius: 50%;
  transform: scale(1);
  background-color: #E9E7F2;
  transition: transform 400ms 0s cubic-bezier(0.2, 0, 0, 1.6);
}

.back div::after {
  top: 0;
  left: 0;
  content: '';
  width: 60px;
  height: 30px;
  position: absolute;
  background-position: 0 0;
  background-image: url('https://s3-eu-west-1.amazonaws.com/thomascullen-codepen/back.svg');
  transition: transform 400ms 0s cubic-bezier(0.2, 0, 0, 1);
}

.back:hover h4 {
  color: #171922;
}

.back:hover h4,
.back:hover span {
  opacity: 1;
  transform: translateY(0);
}

.back:hover div {
  transform: scale(1.1);
  background-color: white;
  box-shadow:
    0 2px 10px 0 rgba(185,182,198,0.00),
    0 1px 3px 0 rgba(175,172,189,0.25);
}

.back:hover div::after {
  transform: translateX(-30px);
}
	</style>
	<link rel="stylesheet" href="https://2-22-4-dot-lead-pages.appspot.com/static/lp918/min/default_thank_you.css">
	<script src="https://2-22-4-dot-lead-pages.appspot.com/static/lp918/min/jquery-1.9.1.min.js"></script>
	<script src="https://2-22-4-dot-lead-pages.appspot.com/static/lp918/min/html5shiv.js"></script>
</head>
<body>
	<header class="site-header" id="header">
		<h1 class="site-header__title" data-lead-id="site-header-title">THANK YOU!</h1>
	</header>

	<div class="main-content">
		<i class="fa fa-check main-content__checkmark" id="checkmark"></i>
		<p class="main-content__body" data-lead-id="main-content-body">Your Order Placed Successfully !</p>
	</div>

	<footer class="site-footer" id="footer">
		<p class="site-footer__fineprint" id="fineprint">Copyright ©2023 | All Rights Reserved</p>
	</footer>
    <script src="{{ asset('js/checkout.js') }}"></script>

    <input type="hidden" id="user_id" name=""value="{{Auth::user()->id;}}">

	<a href="{{ route('products') }}" class="back">
		<div style="
    margin-top: 22px;
"></div>
		<h4>Return To Home </h4>
		<span>Back to home</span>
	  </a>
</body>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

</html>