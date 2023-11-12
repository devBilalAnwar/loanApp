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
    {{-- <li class="chat-message">
        <div class="d-flex overflow-hidden">
            <div class="user-avatar flex-shrink-0 me-3">
                <div class="avatar avatar-sm">
                    <img src="{{ asset('assets/img/avatars/2.png') }}" alt="Avatar" class="rounded-circle">
                </div>
            </div>
            <div class="chat-message-wrapper flex-grow-1">
                <div class="chat-message-text">
                    <p class="mb-0">Do you have design files for
                        {{ config('variables.templateName') ? config('variables.templateName') : 'TemplateName' }}?
                    </p>
                </div>
                <div class="text-muted mt-1">
                    <small>10:15 AM</small>
                </div>
            </div>
        </div>
    </li>
    <li class="chat-message chat-message-right">
        <div class="d-flex overflow-hidden">
            <div class="chat-message-wrapper flex-grow-1 w-50">
                <div class="chat-message-text">
                    <p class="mb-0">Yes that's correct documentation file, Design files are
                        included with the template.</p>
                </div>
                <div class="text-end text-muted mt-1">
                    <i class='ti ti-checks ti-xs me-1'></i>
                    <small>10:15 AM</small>
                </div>
            </div>
            <div class="user-avatar flex-shrink-0 ms-3">
                <div class="avatar avatar-sm">
                    <img src="{{ asset('assets/img/avatars/1.png') }}" alt="Avatar" class="rounded-circle">
                </div>
            </div>
        </div>
    </li> --}}
</ul>
