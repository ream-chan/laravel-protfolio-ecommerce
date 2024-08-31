<!DOCTYPE html>
<html lang="en">
<head>
	<title>Home</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="csrf-token" content="{{ csrf_token() }}">
	<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
@include('home.cssfile');
<style>
	.z-index-alert {
    z-index: 9999 !important; 
}
.panel-search {
    display: block;
    width: 100%;
    padding-top: 10px;
    padding-bottom: 15px;
}

.bor8 {
    border-radius: 8px;
    border: 1px solid #ddd; 
}

.dis-flex {
    display: flex;
    align-items: center;
}

.search-form {
    display: flex;
    width: 100%;
}

.search-button {
    background-color: #fff; 
    border: none;
    cursor: pointer;
    padding: 10px;
    margin-right: 10px;
}

.search-input {
    flex: 1; 
    border: 1px solid #ddd;
    border-radius: 8px;
    padding: 10px;
    font-size: 16px;
}

.search-button:hover,
.search-button:focus {
    background-color: #f0f0f0; 
}

.search-input::placeholder {
    color: #999;
}

.search-input:focus {
    outline: none;
    border-color: #007bff; 
}

</style>
</head>
<body class="animsition">
	
	<!-- Header -->
	@include('home.header')

	<!-- Cart -->
	@include('home.cart')

	<!-- Slider -->
	@include('home.slider')

	<!-- Banner -->
	@include('home.banner')


	<!-- Product -->
	@include('home.product')


	<!-- Footer -->
	@include('home.footer')

				
	<!-- Back to top -->
	<div class="btn-back-to-top" id="myBtn">
		<span class="symbol-btn-back-to-top">
			<i class="zmdi zmdi-chevron-up"></i>
		</span>
	</div>

	<!-- Modal1 -->
	@include('home.modal1')

@include('home.jsfile')

</body>
</html>