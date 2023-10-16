<!DOCTYPE html>
<html class="no-js" lang="en">
	<head>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0 shrink-to-fit=no"/>
    	<meta name="csrf-token" content="{{ csrf_token() }}">
		<title>เอกการยาง ไว้ใจผู้เชียวชาญ เรื่องรถยนต์</title>
		<meta name="author" content="codepixer">
		<meta name="description" content="">
		<meta name="keywords" content="">
		<style>
			@import url('https://fonts.googleapis.com/css2?family=Mitr:wght@200&display=swap');
		</style>
		@include("/backend/layouts/css/css")
	</head>
	<body>
		@include("/backend/layouts/navbar/navbar-admin")
		<div class="main-content">
			@yield("content")
		</div>
		@include("/backend/layouts/js/js")
	</body>
</html>