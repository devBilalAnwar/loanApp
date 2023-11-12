@extends('layouts/layoutMaster')

@section('title', 'Chat Clients')

@section('vendor-style')
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/bootstrap-maxlength/bootstrap-maxlength.css') }}" />
@endsection

@section('page-style')
    <link rel="stylesheet" href="{{ asset('assets/vendor/css/pages/app-chat.css') }}" />
@endsection

@section('vendor-script')
    <script src="{{ asset('assets/vendor/libs/bootstrap-maxlength/bootstrap-maxlength.js') }}"></script>
@endsection



@section('content')
    <div class="app-chat card overflow-hidden">
        <div class="row g-0">
            <!-- Sidebar Left -->
            <div class="col app-chat-sidebar-left app-sidebar overflow-hidden" id="app-chat-sidebar-left">
                <div
                    class="chat-sidebar-left-user sidebar-header d-flex flex-column justify-content-center align-items-center flex-wrap px-4 pt-5">
                    <div class="avatar avatar-xl avatar-online">
                        <img src="{{ asset('assets/img/avatars/1.png') }}" alt="Avatar" class="rounded-circle">
                    </div>
                    <h5 class="mt-2 mb-0">John Doe</h5>
                    <span>Admin</span>
                    <i class="ti ti-x ti-sm cursor-pointer close-sidebar" data-bs-toggle="sidebar" data-overlay
                        data-target="#app-chat-sidebar-left"></i>
                </div>
                <div class="sidebar-body px-4 pb-4">
                    <div class="my-4">
                        <small class="text-muted text-uppercase">About</small>
                        <textarea id="chat-sidebar-left-user-about" class="form-control chat-sidebar-left-user-about mt-3" rows="4"
                            maxlength="120">Dessert chocolate cake lemon drops jujubes. Biscuit cupcake ice cream bear claw brownie brownie marshmallow.</textarea>
                    </div>
                    <div class="my-4">
                        <small class="text-muted text-uppercase">Status</small>
                        <div class="d-grid gap-2 mt-3">
                            <div class="form-check form-check-success">
                                <input name="chat-user-status" class="form-check-input" type="radio" value="active"
                                    id="user-active" checked>
                                <label class="form-check-label" for="user-active">Active</label>
                            </div>
                            <div class="form-check form-check-danger">
                                <input name="chat-user-status" class="form-check-input" type="radio" value="busy"
                                    id="user-busy">
                                <label class="form-check-label" for="user-busy">Busy</label>
                            </div>
                            <div class="form-check form-check-warning">
                                <input name="chat-user-status" class="form-check-input" type="radio" value="away"
                                    id="user-away">
                                <label class="form-check-label" for="user-away">Away</label>
                            </div>
                            <div class="form-check form-check-secondary">
                                <input name="chat-user-status" class="form-check-input" type="radio" value="offline"
                                    id="user-offline">
                                <label class="form-check-label" for="user-offline">Offline</label>
                            </div>
                        </div>
                    </div>
                    <div class="my-4">
                        <small class="text-muted text-uppercase">Settings</small>
                        <ul class="list-unstyled d-grid gap-2 me-3 mt-3">
                            <li class="d-flex justify-content-between align-items-center">
                                <div>
                                    <i class='ti ti-message me-1 ti-sm'></i>
                                    <span class="align-middle">Two-step Verification</span>
                                </div>
                                <label class="switch switch-primary me-4 switch-sm">
                                    <input type="checkbox" class="switch-input" checked="" />
                                    <span class="switch-toggle-slider">
                                        <span class="switch-on"></span>
                                        <span class="switch-off"></span>
                                    </span>
                                </label>
                            </li>
                            <li class="d-flex justify-content-between align-items-center">
                                <div>
                                    <i class='ti ti-bell me-1 ti-sm'></i>
                                    <span class="align-middle">Notification</span>
                                </div>
                                <label class="switch switch-primary me-4 switch-sm">
                                    <input type="checkbox" class="switch-input" />
                                    <span class="switch-toggle-slider">
                                        <span class="switch-on"></span>
                                        <span class="switch-off"></span>
                                    </span>
                                </label>
                            </li>
                            <li>
                                <i class="ti ti-user-plus me-1 ti-sm"></i>
                                <span class="align-middle">Invite Friends</span>
                            </li>
                            <li>
                                <i class="ti ti-trash me-1 ti-sm"></i>
                                <span class="align-middle">Delete Account</span>
                            </li>
                        </ul>
                    </div>
                    <div class="d-flex mt-4">
                        <button class="btn btn-primary" data-bs-toggle="sidebar" data-overlay
                            data-target="#app-chat-sidebar-left">Logout</button>
                    </div>
                </div>
            </div>
            <!-- /Sidebar Left-->

            <!-- Chat contacts -->
            <div class="col app-chat-contacts app-sidebar flex-grow-0 overflow-hidden border-end" id="app-chat-contacts">
                <div class="sidebar-header">
                    <div class="d-flex align-items-center me-3 me-lg-0">
                        <div class="flex-shrink-0 avatar avatar-online me-3" data-bs-toggle="sidebar"
                            data-overlay="app-overlay-ex" data-target="#app-chat-sidebar-left">
                            <img class="user-avatar rounded-circle cursor-pointer"
                                src="https://ui-avatars.com/api/?background=ECF5FF&color=4F8CEE&name={{ auth()->user()->name }}"
                                alt="Avatar">
                        </div>
                        <div class="flex-grow-1 input-group input-group-merge rounded-pill">
                            <span class="input-group-text" id="basic-addon-search31"><i class="ti ti-search"></i></span>
                            <input type="text" class="form-control chat-search-input" placeholder="Search..."
                                aria-label="Search..." aria-describedby="basic-addon-search31">
                        </div>
                    </div>
                    <i class="ti ti-x cursor-pointer d-lg-none d-block position-absolute mt-2 me-1 top-0 end-0"
                        data-overlay data-bs-toggle="sidebar" data-target="#app-chat-contacts"></i>
                </div>
                <hr class="container-m-nx m-0">
                <div class="sidebar-body">

                    <div class="chat-contact-list-item-title">
                        <h5 class="text-primary mb-0 px-4 pt-3 pb-2">Chats</h5>
                    </div>
                    <!-- Chats -->
                    <ul class="list-unstyled chat-contact-list" id="chat-list">

                        @forelse ($chats as $chat)
                            @php
                                $user = $chat->initiator_id == auth()->id() ? $chat->partner : $chat->initiator;
                            @endphp
                            <li class="chat-contact-list-item" onclick="loadChat({{ $chat->id }})">
                                <a class="d-flex align-items-center">
                                    <div class="flex-shrink-0 avatar">
                                        <img src="https://ui-avatars.com/api/?background=ECF5FF&color=4F8CEE&name={{ $user->name }}"
                                            alt="Avatar" class="rounded-circle chat_avatar">
                                    </div>
                                    <div class="chat-contact-info flex-grow-1 ms-2">
                                        <h6 class="chat-contact-name text-truncate m-0">{{ $user->name }}</h6>
                                        <p class="chat-contact-status text-muted text-truncate mb-0">{{ $user->email }}
                                        </p>
                                    </div>
                                    {{-- <small class="text-muted mb-auto">5 Minutes</small> --}}
                                </a>
                            </li>
                        @empty
                            <li class="chat-contact-list-item chat-list-item-0">
                                <h6 class="text-muted mb-0">No Chats Found</h6>
                            </li>
                        @endforelse
                    </ul>
                </div>
            </div>
            <!-- /Chat contacts -->

            <!-- Chat History -->
            <div class="col app-chat-history bg-body">
                <div class="chat-history-wrapper">
                    <div class="chat-history-header border-bottom">
                        <div class="d-flex justify-content-between align-items-center">
                            <div class="d-flex overflow-hidden align-items-center">
                                <i class="ti ti-menu-2 ti-sm cursor-pointer d-lg-none d-block me-2"
                                    data-bs-toggle="sidebar" data-overlay data-target="#app-chat-contacts"></i>
                                <div class="flex-shrink-0 avatar">
                                    <img src="{{ asset('assets/blank.png') }}" alt="Avatar"
                                        class="rounded-circle active_chat_avatar" data-bs-toggle="sidebar" data-overlay
                                        data-target="#app-chat-sidebar-right ">
                                </div>
                                <div class="chat-contact-info flex-grow-1 ms-2">
                                    <h6 class="m-0 chat_active_name"></h6>
                                    <small class="user-status text-muted chat_active_sub_heading"></small>
                                </div>
                            </div>
                            {{-- <div class="d-flex align-items-center">
                                <i class="ti ti-phone-call cursor-pointer d-sm-block d-none me-3"></i>
                                <i class="ti ti-video cursor-pointer d-sm-block d-none me-3"></i>
                                <i class="ti ti-search cursor-pointer d-sm-block d-none me-3"></i>
                                <div class="dropdown d-flex align-self-center">
                                    <button class="btn p-0" type="button" id="chat-header-actions"
                                        data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <i class="ti ti-dots-vertical"></i>
                                    </button>
                                    <div class="dropdown-menu dropdown-menu-end" aria-labelledby="chat-header-actions">
                                        <a class="dropdown-item" href="javascript:void(0);">View Contact</a>
                                        <a class="dropdown-item" href="javascript:void(0);">Mute Notifications</a>
                                        <a class="dropdown-item" href="javascript:void(0);">Block Contact</a>
                                        <a class="dropdown-item" href="javascript:void(0);">Clear Chat</a>
                                        <a class="dropdown-item" href="javascript:void(0);">Report</a>
                                    </div>
                                </div>
                            </div> --}}
                        </div>
                    </div>
                    <div class="chat-history-body bg-body">

                    </div>
                    <!-- Chat message form -->
                    <div class="chat-history-footer shadow-sm" style="display: none">
                        <form class="form-send-message d-flex justify-content-between align-items-center ">
                            <input class="form-control message-input border-0 me-3 shadow-none"
                                placeholder="Type your message here">
                            <input type="hidden" id="new_id" value="">
                            <div class="message-actions d-flex align-items-center">
                                {{-- <i class="speech-to-text ti ti-microphone ti-sm cursor-pointer"></i>
                                <label for="attach-doc" class="form-label mb-0">
                                    <i class="ti ti-photo ti-sm cursor-pointer mx-3"></i>
                                    <input type="file" id="attach-doc" hidden>
                                </label> --}}
                                <button class="btn btn-primary d-flex send-msg-btn" onClick="sendMessage()">
                                    <i class="ti ti-send me-md-1 me-0"></i>
                                    <span class="align-middle d-md-inline-block d-none ">Send</span>
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <!-- /Chat History -->

            <!-- Sidebar Right -->
            <div class="col app-chat-sidebar-right app-sidebar overflow-hidden" id="app-chat-sidebar-right">
                <div
                    class="sidebar-header d-flex flex-column justify-content-center align-items-center flex-wrap px-4 pt-5">
                    <div class="avatar avatar-xl avatar-online">
                        <img src="{{ asset('assets/img/avatars/2.png') }}" alt="Avatar" class="rounded-circle">
                    </div>
                    <h6 class="mt-2 mb-0">Felecia Rower</h6>
                    <span>NextJS Developer</span>
                    <i class="ti ti-x ti-sm cursor-pointer close-sidebar d-block" data-bs-toggle="sidebar" data-overlay
                        data-target="#app-chat-sidebar-right"></i>
                </div>
                <div class="sidebar-body px-4 pb-4">
                    <div class="my-4">
                        <small class="text-muted text-uppercase">About</small>
                        <p class="mb-0 mt-3">A Next. js developer is a software developer who uses the Next. js framework
                            alongside ReactJS to build web applications.</p>
                    </div>
                    <div class="my-4">
                        <small class="text-muted text-uppercase">Personal Information</small>
                        <ul class="list-unstyled d-grid gap-2 mt-3">
                            <li class="d-flex align-items-center">
                                <i class='ti ti-mail ti-sm'></i>
                                <span class="align-middle ms-2">josephGreen@email.com</span>
                            </li>
                            <li class="d-flex align-items-center">
                                <i class='ti ti-phone-call ti-sm'></i>
                                <span class="align-middle ms-2">+1(123) 456 - 7890</span>
                            </li>
                            <li class="d-flex align-items-center">
                                <i class='ti ti-clock ti-sm'></i>
                                <span class="align-middle ms-2">Mon - Fri 10AM - 8PM</span>
                            </li>
                        </ul>
                    </div>
                    <div class="mt-4">
                        <small class="text-muted text-uppercase">Options</small>
                        <ul class="list-unstyled d-grid gap-2 mt-3">
                            <li class="cursor-pointer d-flex align-items-center">
                                <i class='ti ti-badge ti-sm'></i>
                                <span class="align-middle ms-2">Add Tag</span>
                            </li>
                            <li class="cursor-pointer d-flex align-items-center">
                                <i class='ti ti-star ti-sm'></i>
                                <span class="align-middle ms-2">Important Contact</span>
                            </li>
                            <li class="cursor-pointer d-flex align-items-center">
                                <i class='ti ti-photo ti-sm'></i>
                                <span class="align-middle ms-2">Shared Media</span>
                            </li>
                            <li class="cursor-pointer d-flex align-items-center">
                                <i class='ti ti-trash ti-sm'></i>
                                <span class="align-middle ms-2">Delete Contact</span>
                            </li>
                            <li class="cursor-pointer d-flex align-items-center">
                                <i class='ti ti-ban ti-sm'></i>
                                <span class="align-middle ms-2">Block Contact</span>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- /Sidebar Right -->

            <div class="app-overlay"></div>
        </div>
    </div>
@endsection

@section('page-script')
    <script src="{{ asset('assets/js/app-chat.js') }}"></script>
    <script>
        function loadChat(chat_id) {
            // assign active
            var chatContactName = $(event.target).closest('.chat-contact-list-item').find('.chat-contact-name').text();
            var chatContactSubHeading = $(event.target).closest('.chat-contact-list-item').find('.chat-contact-status')
                .text();
            var imgSrc = $(event.target).closest('.chat-contact-list-item').find('img.chat_avatar').attr('src');
            $('.active_chat_avatar').attr('src', imgSrc)
            $('.chat_active_name').text(chatContactName)
            $('.chat_active_sub_heading').text(chatContactSubHeading)
            $('#new_id').val(chat_id)
            $('.chat-history-footer').show()

            $.ajax({
                url: "{{ route('client.chat.loadChatPage') }}?chat_id=" + chat_id,
                type: 'GET',
                success: function(response) {
                    $('.chat-history-body').html(response)
                    scrollToBottom()
                }
            });
        }

        function sendMessage() {
            const chat_id = $('#new_id').val()
            const message = $('.message-input').val()
            var token = "{{ csrf_token() }}";
            console.log('chat_id: ', chat_id);
            $.ajax({
                url: "{{ route('client.chat.send_message') }}",
                type: 'POST',
                data: {
                    chat_id: chat_id,
                    message: message,
                },
                headers: {
                    'X-CSRF-TOKEN': token // Set the CSRF token in the request header
                },
                success: function(response) {
                    console.log('response: ', response);
                }
            });
        }

        function scrollToBottom() {
            var chatHistoryBody = document.querySelector('.chat-history-body')
            chatHistoryBody.scrollTo(0, chatHistoryBody.scrollHeight);
        }
    </script>
@endsection
