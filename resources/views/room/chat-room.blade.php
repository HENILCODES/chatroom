@extends('header')
@section('body')
    <div class="container">
        <div class="my-5"></div>
        <div class="shadow w-75 m-auto px-3">
            <div class="w-100">
                <h1>Chat</h1>
            </div>
            <div class="">
                <div class="overflow-y-auto px-5 pt-3" style="height: 350px">
                    @foreach ($chat as $item)
                        <h5>{{ $item }}  </h5>
                    @endforeach
                </div>
            </div>
            <div class="">
                <form action="{{ route('send-chat') }}" method="post" class="row m-auto shadow g-3 " autocomplete="off">
                    @csrf
                    <input type="hidden" name="rooms_id"  value="6">
                    <input type="hidden" name="users_id" value="1">
                    <div class="col-8 shadow">
                        <input type="text" id="chat" required name="chat" class="form-control">
                    </div>
                    <div class="col-4 shadow-lg">
                        <input type="submit" value="Send" class="btn btn-primary">
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
