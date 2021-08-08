<!doctype html>
<html lang="en">
<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="{{'https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css'}}" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link href="{{'https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css'}}" rel="stylesheet" />

    <link rel="stylesheet" href="{{asset('css/style.css')}}">
    <title>Laravel</title>
</head>
<body>

<div class="container">
    @include('partials.flash')
    <div class="Group_content">
        <h1>Your Posts!</h1>

        @if(count($errors))
            <ul>
                @foreach($errors->all() as $err)
                    <li>{{$err}}</li>
                @endforeach
            </ul>
        @endif

        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">Create New Post</button>

        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">New Group</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form method="POST" action="{{ '/groups/'.$group.'/posts' }}" enctype="multipart/form-data">
                        @csrf
                        <div class="modal-body">
                            <div class="form-group">
                                <label for="exampleFormControlFile1">upload your image post</label>
                                <input type="file" class="form-control-file" id="exampleFormControlFile1" name="imagePost">
                            </div>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">text of your post:</span>
                                </div>
                                <textarea class="form-control" aria-label="With textarea" name="caption"></textarea>
                            </div>
                            <div class="form-group">
                                <label for="exampleFormControlFile1">select your tag</label>
                                <div>
                                    <select class="js-example-basic-multiple form-control" name="tags[]" multiple="multiple">
                                        @foreach($tags->all() as $tag)
                                            <option value="{{$tag->name}}">{{$tag->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary">Create!</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <ul class="flex-container">
            @foreach($posts as $post)
                <li class="flex-item">
                    <div class="PostPicture">
                        <img src="{{asset($post->image_addr)}}">
                    </div>
                    <div class="PostCaption">
                        <span>{{'@'.Auth::user()->name.': '.$post->text}}</span>
                    </div>
                    <div class="PostTag">
                        @foreach($post->tags as $postTag)
                            <span>{{"#".$postTag->name}}</span>
                        @endforeach
                    </div>
                    <div class="delete">
                        <form method="POST" action="{{url('/posts/'.$post->id)}}">
                            @method('DELETE')
                            @csrf
                            <button type="submit">پاک کردن</button>
                        </form>
                    </div>
                </li>
            @endforeach
        </ul>



    </div>
</div>


<script src="{{'https://code.jquery.com/jquery-3.2.1.slim.min.js'}}" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="{{'https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js'}}" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="{{'https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js'}}" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<script src="{{'https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js'}}"></script>
<script>
    $(document).ready(function() {
        $('.js-example-basic-multiple').select2();
    });
</script>
</body>
</html>





