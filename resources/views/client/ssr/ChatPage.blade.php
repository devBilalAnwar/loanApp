<ul class="list-unstyled chat-history">
    @foreach ($messages as $message)
        @php
            $user = $message->sender_id == $partner->id ? $partner : $initiator;
        @endphp
        <li class="chat-message @if ($message->sender_id == auth()->id()) chat-message-right @endif">
            <div class="d-flex overflow-hidden">
                <div class="user-avatar flex-shrink-0 me-3" @if ($message->sender_id == auth()->id()) style="order: 1" @endif>
                    <div class="avatar avatar-sm">
                        <img src="https://ui-avatars.com/api/?background=ECF5FF&color=4F8CEE&name={{ $user->name }}"
                            alt="Avatar" class="rounded-circle">
                    </div>
                </div>
                <div class="chat-message-wrapper flex-grow-1">
                    <div class="chat-message-text">
                        <p class="mb-0">{{ $message->message }}</p>
                    </div>
                    <div class="text-muted mt-1">
                        <small>{{ $message->created_at->diffForHumans() }}</small>
                    </div>
                </div>
            </div>
        </li>
    @endforeach
</ul>
