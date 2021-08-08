<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="{{'https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css'}}" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <link href="{{asset('css/bootstrap.css')}}" type="text/css" rel="stylesheet" media="all">
        <link href="{{asset('css/flexslider.css')}}" type="text/css" rel="stylesheet" media="all" property="" />
        <link href="{{asset('css/easy-responsive-tabs.css')}}" rel='stylesheet' type='text/css'/>
        <link href="{{asset('css/font-awesome.css')}}" rel="stylesheet">
        <link rel="stylesheet" href="{{asset('css/style.css')}}">
        <title>Laravel</title>

        <style>
            * {box-sizing: border-box;}

            body {
                margin: 0;
                font-family: cursive;
            }

            .header {
                overflow: hidden;
                background-color: #ffffff;
                padding: 20px 10px;
                box-shadow: 5px 5px 5px rgba(68, 68, 69, 0.50);
            }

            .header a {
                float: left;
                color: black;
                text-align: center;
                padding: 12px;
                text-decoration: none;
                font-size: 18px;
                line-height: 25px;
                border-radius: 4px;
            }

            .header a.logo {
                font-size: 25px;
                font-weight: bold;
            }

            .header a:hover {
                background-color: #ddd;
                color: black;
            }

            .header a.active {
                background-color: dodgerblue;
                color: white;
            }

            .header-right {
                float: right;
                padding-right: 2em;
            }

            @media screen and (max-width: 500px) {
                .header a {
                    float: none;
                    display: block;
                    text-align: left;
                }

                .header-right {
                    float: none;
                }
            }
            .dropbtn {
                background-color: #4CAF50;
                color: white;
                padding: 16px;
                font-size: 16px;
                border: none;
                cursor: pointer;
            }

            .dropdown {
                position: relative;
                display: inline-block;
            }

            .dropdown-content {
                display: none;
                position: fixed;
                background-color: #f9f9f9;
                min-width: 160px;
                box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
                z-index: 1;
            }

            .dropdown-content a {
                color: black;
                padding: 12px 16px;
                text-decoration: none;
                display: block;
            }
            .dropdown-content button{
                border: none;
                background: none;
            }

            .dropdown-content a:hover {background-color: #f1f1f1}

            .dropdown:hover .dropdown-content {
                display: block;
            }

            .dropdown:hover .dropbtn {
                background-color: #3e8e41;
            }
        </style>
    </head>
    <body>
        <div class="header">
            <a href="{{'/'}}" class="logo">Laravel</a>
            <div class="header-right">
                <div class="dropdown">
                    <form method="Post" action="{{route('logout')}}">
                        @csrf
                        <button class="dropbtn">{{Auth::user()->name}}<span class="caret"></span></button>
                        <div class="dropdown-content">
                            <a href="{{'/groups'}}">Groups</a>
                            <a href="#"><button type="submit">Log out</button></a>
                        </div>
                    </form>

                </div>
            </div>
        </div>
        <div class="container">
            <ul class="flex-container">
                @foreach($posts as $post)
                    <li class="flex-item">
                    <div class="PostPicture">
                        <img src="{{asset($post->image_addr)}}">
                    </div>
                    <div class="PostCaption">
                        <span>{{$post->text}}</span>
                    </div>
                    <div class="PostTag">
                        @foreach($post->tags as $postTag)
                            <span>{{"#".$postTag->name}}</span>
                        @endforeach
                    </div>

                    @if($groups->find($post->group_id)->user_id == Auth::id())
                        <div class="delete">
                            <form method="POST" action="{{url('/posts/'.$post->id)}}">
                                @method('DELETE')
                                @csrf
                                <button type="submit">پاک کردن</button>
                            </form>
                        </div>
                    @endif
                </li>
                @endforeach
            </ul>
        </div>
    </body>
</html>
