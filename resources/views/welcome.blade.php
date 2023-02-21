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
                    <form autocomplete="off" action="{{ route('create-room') }}" method="post">
                        @csrf
                        <div class="mb-3">
                            <label for="create" class="form-label fw-bold fs-3">Create Room</label>
                            <input type="text" class="form-control fs-5 mt-2" name="name" id="create"
                                value="{{ old('name') }}" placeholder="type hear" aria-describedby="createRoom">
                            @error('name')
                                <div id="createRoom" class="form-text text-end text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mt-4">
                            <button type="submit" class="btn btn-primary">Let's Create</button>
                        </div>
                    </form>
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
                    <form autocomplete="off" action="{{ route('join-room') }}" method="post">
                        @csrf
                        <div class="mb-3">
                            <label for="join" class="form-label fw-bold fs-3">Join Room</label>
                            <input type="text" class="form-control fs-5 mt-2" placeholder="type hear" id="join"
                                name="name" aria-describedby="joinRoom">
                            {{-- <div id="joinRoom" class="form-text text-end text-danger">We'll nevenyone else.</div> --}}
                        </div>
                        <div class="mt-4">
                            <button type="submit" class="btn btn-primary">Let's Join</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
