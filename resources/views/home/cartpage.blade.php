<!DOCTYPE html>
<html lang="en">
<head>
	<title>Home</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
@include('home.cssfile')
</head>
<body class="animsition">
	

	@include('home.header')
    @include('home.cart')

    @include('home.listcart')
    @include('home.footer')

				


	<!-- Back to top -->
	<div class="btn-back-to-top" id="myBtn">
		<span class="symbol-btn-back-to-top">
			<i class="zmdi zmdi-chevron-up"></i>
		</span>
	</div>
    @include('home.jsfile')
</body>
</html>