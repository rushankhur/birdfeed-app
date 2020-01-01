@extends('layouts.app')

@section('content')
        <div class="div-border-bottom mb-4">
            <div class="container">
                <div class="row">
                    {{-- Info button --}}
                    <div class="col-md-1">
                        <button type="button" class="btn btn-warning btn-circle btn-circle-sm" data-toggle="modal" data-target="#infoModal">
                            <i class="fa fa-info"></i>
                        </button>
                    </div>
                    {{-- Info modal --}}
                    @include('modals.info')

                    {{-- Show button only if user logged in --}}
                    @if (Auth::check())
                        <div class="col-md-2 offset-md-5">
                            <a class="btn btn-primary btn-sm mb-4" href="/posts/create" role="button">Create New Post</a>
                        </div>
                    @else
                        <div class="col-md-2 offset-md-5"></div>
                    @endif

                    <div class="col-md-4 pr-0">
                        <div class="form-group row">
                            <label for="formControlSelect" class="my-auto">Current Theme</label>
                                <select class="form-control form-control-sm select-width ml-2 change-style" id="formControlSelect" name="themeSelect" onchange="getComboA(this)">
                                    @foreach($themes as $theme)
                                        <option value="{{ $theme->cdn_url }}">{{ $theme->name }}</option>
                                    @endforeach
                                </select>
                        </div>
                    </div>
                </div>
            </div>
        </div>



        <div class="container">
            <div class="row">

            @foreach($posts as $post)
                    <div class="col-md-4 mb-4">
                        <div class="card">
                            <img class="card-img-top img-fluid" src="{{ $post->image_url }}" alt="">
                            <div class="card-body">
                                <h4 class="card-title">{{ $post->title }}</h4>
                                <p class="card-text">{{ $post->content }}</p>
                                <p class="card-text">
                                    <small class="text-muted">
                                        Created by {{ DB::table('users')->where('id', '=', $post->created_by)->get()->first()->name }}
                                        {{ \Carbon\Carbon::parse($post->created_at)->diffForhumans() }}
                                    </small>
                                </p>

                                {{--Delete button--}}
                                @if (Auth::check() && Auth::user()->hasRole('post moderator'))
                                    <form method="POST" action="/posts/{{ $post->id }}" onclick="return confirm('Delete Post?')">
                                        @method('DELETE')
                                        {{ csrf_field() }}
                                        <button class="btn btn-warning btn-sm" type="submit">Delete Post</button>
                                    </form>
                                @endif

                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>

        <script type="text/javascript">
            function createCookie(name,value,days) {
                if (days) {
                    var date = new Date();
                    date.setTime(date.getTime()+(days*24*60*60*1000));
                    var expires = "; expires="+date.toGMTString();
                }
                else var expires = "";
                document.cookie = name+"="+value+expires+"; path=/";
            }

            function readCookie(name) {
                var nameEQ = name + "=";
                var ca = document.cookie.split(';');
                for(var i=0;i < ca.length;i++) {
                    var c = ca[i];
                    while (c.charAt(0)==' ') c = c.substring(1,c.length);
                    if (c.indexOf(nameEQ) == 0) return c.substring(nameEQ.length,c.length);
                }
                return null;
            }

            function isCookieExists() {
                if (document.cookie.split(';').filter(item => {
                        return item.includes('themeurl=')
                    }).length) {
                    return true;
                }
                return false;
            }

            function setInitialTheme() {
                    const url="{{ $initial_url }}"
                    const title="{{ $initial_title }}"

                    createCookie('themeurl',url,0)

                    // Set an initial theme name in menu as a current theme
                    var myNodelist = document.querySelectorAll("option");
                    for (var i = 0; i < myNodelist.length; i++) {
                        if(myNodelist[i].innerHTML == title) {
                            myNodelist[i].setAttribute("selected", "");
                        }
                    }
            }

            if (!isCookieExists()) {
                setInitialTheme()
            }

            // Set a theme name in menu as a current theme
            var myNodelist = document.querySelectorAll("option");
            var url = readCookie("themeurl");

            for (var i = 0; i < myNodelist.length; i++) {
                if(myNodelist[i].value == url) {
                    myNodelist[i].setAttribute("selected", "");
                }
            }

        </script>
@endsection



