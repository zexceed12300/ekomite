<!doctype html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  @vite('resources/css/app.css')
  <link href="/assets/fontawesome/css/all.css" rel="stylesheet">
</head>
<body class="font-mono">
	<div class="lg:drawer lg:drawer-open">
			<input id="my-drawer-2" type="checkbox" class="drawer-toggle" />
			
			<div class="drawer-content">
				
				@include('layouts.navbar')

				<section class="mx-4 lg:mx-8 my-6">
					<div class="hidden md:block md:flex justify-between items-center mb-12">
						<h1 class="text-4xl md:mb-0">
							@yield('title')
						</h1>
					</div>
					@yield('content')
				</section>
				
			</div> 

			<div class="drawer-side z-20">
				<label for="my-drawer-2" class="drawer-overlay"></label>
				
				@include('layouts.sidebar')
			
			</div>
	  </div>
</body>
</html>