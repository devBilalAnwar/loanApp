@extends('layouts/layoutMaster')

@section('title', 'Assign Chat')


@section('content')
    <div class="row">
        <div class="col-xl">
            <div class="card mb-4">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h5 class="mb-0">Add New Chat</h5>
                </div>
                <div class="card-body">
                    <form action="{{ route('save_chat') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="exampleFormControlSelect1" class="form-label">User 1</label>
                            <select class="form-select" id="exampleFormControlSelect1" name="initiator_id" required
                                aria-label="Default select example">
                                <option selected disabled value="">Select</option>
                                @foreach ($users as $user)
                                    <option value="{{ $user->id }}">{{ $user->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="exampleFormControlSelect1" class="form-label">User 2</label>
                            <select class="form-select" id="exampleFormControlSelect1" name="partner_id" required
                                aria-label="Default select example">
                                <option selected disabled value="">Select</option>
                                @foreach ($users as $user)
                                    <option value="{{ $user->id }}">{{ $user->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <button type="submit" class="btn btn-primary waves-effect waves-light">Send</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
