       <!--Required meta tags-->
       <meta charset="utf-8">
       <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

		<!-- Meta -->
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<meta http-equiv="x-ua-compatible" content="ie=edge">

        <!--CSRF Token-->
        <meta name="csrf-token" content="{{ csrf_token() }}">

		<!-- Favicon -->
		<link rel="shortcut icon" href="favicon.png" type="{{  }}">

		<!--  Social tags -->
		<meta name="referrer" content="{{ !empty($referrer)? $referrer : config('meta.referrer') }}">
	    <meta name="robots" content="{{ !empty($robots)? $robots : config('meta.robots') }}">
	    <meta name="description" content="{{ !empty($description)? $description : config('meta.description') }}">
	    <meta name="keywords" content="{{ !empty($keywords)? $keywords : config('meta.keywords') }}">
	    @if(config('meta.geo_region') !=='')
	    <meta name="geo.region" content="{{ config('meta.geo_region') }}">
	    @endif
	    @if(config('meta.geo_position') !=='')
	    <meta name="geo.position" content="{{ config('meta.geo_position') }}">
	    <meta name="ICBM" content="{{ config('meta.geo_position') }}">
	    @endif
	    <meta name="geo.placename" content="{{  config('app.name') }}">
        <title>{{  }}</title>

		<!-- Schema.org -->
		<meta itemprop="name" content="{{  }}">
		<meta itemprop="description" content="{{  }}">
		<meta itemprop="image" content="{{  }}">

		<!-- Twitter Card -->
		<meta name="twitter:card" content="{{  }}">
		<meta name="twitter:site" content="{{  }}">
		<meta name="twitter:title" content="{{  }}">
		<meta name="twitter:description" content="{{  }}">
		<meta name="twitter:creator" content="{{  }}">
		<meta name="twitter:image" content="{{  }}">

		<!-- Open Graph -->
		<meta property="og:type" content="{{  }}">
		<meta property="og:site_name" content="{{  }}">
		<meta property="og:title" content="{{  }}">
		<meta property="og:description" content="{{  }}">
		<meta property="og:url" content="{{  }}">
		<meta property="og:locale" content="{{ str_replace('_', '-', app()->getlocale()) }}">
		<meta property="og:image" content="{{  }}">
		<meta property="og:image:secure_url" content="{{  }}">

        @if(config('meta.fb_app_id') !=='')
	    <meta property="fb:app_id" content="{{ config('meta.fb_app_id') }}"/>
	    @endif

        <!-- Dublin Core basic info -->
	    <meta name="dcterms.Format" content="text/html">
	    <meta name="dcterms.Language" content="{{ config('app.locale') }}">
	    <meta name="dcterms.Identifier" content="{{ url()->current() }}">
	    <meta name="dcterms.Relation" content="{{  config('app.name') }}">
	    <meta name="dcterms.Publisher" content="{{  config('app.name') }}">
	    <meta name="dcterms.Type" content="text/html">
	    <meta name="dcterms.Coverage" content="{{ url()->current() }}">
	    <meta name="dcterms.Title" content="{{ !empty($title)? $title : config('meta.title') }}">
	    <meta name="dcterms.Subject" content="{{ !empty($keywords)? $keywords : config('meta.keywords') }}">
	    <meta name="dcterms.Contributor" content="{{ !empty($author)? $author : config('meta.author') }}">
	    <meta name="dcterms.Description" content="{{ !empty($description)? $description : config('meta.description') }}">

        <link rel="canonical" href="{{  }}">
