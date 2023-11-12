@extends('layouts/layoutMaster')

@section('title', 'Assign Chat')


@section('content')
    <div class="card">
        <h5 class="card-header">Chats
            <a href="{{ route('add_new_chat') }}" class="btn btn-sm btn-secondary create-new btn-primary" type="button">
                <span>
                    <i class="ti ti-plus me-sm-1"></i>
                    <span class="d-none d-sm-inline-block">Add New Chat</span>
                </span>
            </a>
        </h5>


        <div class="table-responsive text-nowrap">
            <table class="table">
                <thead>
                    <tr>
                        <th>User 1</th>
                        <th>User 2</th>
                    </tr>
                </thead>
                <tbody class="table-border-bottom-0">
                    @forelse ($chats as $chat)
                        <tr>
                            <td>
                                <img src="https://ui-avatars.com/api/?background=ECF5FF&color=4F8CEE&name={{ $chat->initiator->name }}"
                                    alt="Avatar" style="width: 25px" class="rounded-circle">
                                {{ $chat->initiator->name }}
                            </td>
                            <td>
                                <img src="https://ui-avatars.com/api/?background=ECF5FF&color=4F8CEE&name={{ $chat->partner->name }}"
                                    alt="Avatar" style="width: 25px" class="rounded-circle">
                                {{ $chat->partner->name }}
                            </td>

                        </tr>
                    @empty
                        no data found
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection
