@extends('header')
@section('body')
    <style>
        .box-center {
            display: grid;
            height: 70vh;
            place-items: center;
        }
    </style>
    <div class="my-5"></div>
    <div class="container">
        <div class="row">
            <div class="col-5">
                <div class="box-center">
                    {{ Form::open(['route' => 'create-room', 'autocomplete' => 'off']) }}
                    {{ Form::token() }}
                    <div class="mb-3">
                        {{ Form::label('create', 'Create Room', ['class' => 'form-label fw-bold fs-3']) }}
                        {{ Form::text('name', '', ['class' => 'form-control fs-5 mt-2', 'placeholder' => 'type hear', 'id' => 'create', 'required' => true]) }}
                        <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                        @error('name')
                            <div id="createRoom" class="form-text text-end text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mt-4">
                        {{ Form::submit('Let\'s Create', ['class' => 'btn btn-primary']) }}
                    </div>
                    </form>
                    {{ Form::close() }}
                </div>
            </div>
            <div class="col-2">
                <div class="box-center">
                    <span class="border border-gray h-100"></span>
                    <h1 class="text-muted">or</h1>
                    <span class="border border-gray h-100"></span>
                </div>
            </div>
            <div class="col-5">
                <div class="box-center">
                    {{ Form::open(['route' => 'join-room', 'autocomplete' => 'off']) }}
                    {{ Form::token() }}
                    <div class="mb-3">
                        {{ Form::label('join', 'Join Room', ['class' => 'form-label fw-bold fs-3']) }}
                        {{ Form::text('name', '', ['class' => 'form-control fs-5 mt-2', 'id' => 'join', 'placeholder' => 'type hear', 'required' => true]) }}
                    </div>
                    <div class="mt-4">
                        {{ Form::submit('Let\'s Join', ['class' => 'btn btn-primary']) }}
                    </div>
                    {{ Form::close() }}
                </div>
            </div>
        </div>
    </div>
@endsection
