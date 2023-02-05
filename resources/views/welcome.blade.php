@extends('header')
@section('body')
    <div class="my-5"></div>
    <div class="container">
        <div class="text-center">
            <div>
                <form action="{{ route('create-room') }}" method="post" class="row col-5 m-auto shadow g-3 " autocomplete="off">
                    @csrf
                    <div class="col-auto">
                        <label for="room" class="col-form-label fw-bold">Room Name : </label>
                    </div>
                    <div class="col-auto shadow">
                        <input type="text" id="room" name="name" class="form-control">
                    </div>
                    <div class="col-auto shadow-lg">
                        <input type="submit" value="Create Room" class="btn btn-primary">
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
