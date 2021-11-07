<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{$loja->nome}}</title>
    <link rel="icon" href={{empty($loja->logo) ? 'assets/images/items/1.jpg' : $loja->getCaminhoLogo()}} type="image/x-icon"/>
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    <!-- Custom styles for this template -->
    <link href="{{asset('assets/css/bootstrap.css')}}" rel="stylesheet">
    <link href="{{asset('assets/css/ui.css')}}" rel="stylesheet">
    <link href="{{asset('assets/css/responsive.css')}}" rel="stylesheet">

    <link href="{{asset('assets/css/all.min.css')}}" rel="stylesheet">
    <script src="{{asset('assets/js/jquery.min.js')}}" type="text/javascript"></script>
    <script src="{{asset('assets/js/bootstrap.bundle.min.js')}}" type="text/javascript"></script>

</head>

@include('site.layouts.header')
