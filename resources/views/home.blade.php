@extends('master')

@section('content1')
<div class="container">
    <br>
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    You are logged in!
                </div>
            </div>
        </div>
    </div>

    <script>window.setTimeout(function(){

        // Move to a new location or you can do something else
        window.location.href = "gallery/list";

    }, 1000);
    </script>

</div>
@endsection
