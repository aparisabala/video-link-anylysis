<html lang="zh">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge,chrome=1">
    <meta name="referrer" content="no-referrer">
    <title>{!! $tabTitle ?? 'Site Title' !!}</title>
    <link rel="shortcut icon" href="{{ config('i.favicon') }}" />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    {!! $appStyles ?? '' !!}
    @include('site.includes.theme')
    <style>
       .wrap {
            width: 100%;
            height: 100%;
        }

        @media screen and (min-width: 768px) {
            .wrap {
                width: 450px;
                margin: 0 auto;
            }
        }
    </style>
</head>

