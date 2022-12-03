<div>
    <div class="container" style="padding: 30px 0;">
        <style>
            nav svg {
                height: 20px;
            }

            nav .hidden {
                display: block !important;
            }
        </style>

        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Thông tin liên hệ
                    </div>
                    <div class="panel-body">
                        @if (Session::has('message'))
                            <div class="alert alert-success" role="alert">{{ Session::get('message') }}</div>
                        @endif
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Người liên hệ</th>
                                    <th>Email</th>
                                    <th>SĐT</th>
                                    <th>Lời nhắn</th>
                                    <th>Thời gian</th>
                                    <th colspan="2">Phản hồi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $i = 1;
                                @endphp
                                @foreach ($contacts as $contact)
                                    <tr>
                                        <td>{{ $contact->id }}</td>
                                        <td>{{ $contact->name }}</td>
                                        <td>{{ $contact->email }}</td>
                                        <td>{{ $contact->phone }}</td>
                                        <td>{{ $contact->comment }}</td>
                                        <td>{{ $contact->created_at }}</td>
                                        <td>
                                            <a href="mailto:{{ $contact->email }}">
                                                <i class="fa fa-paper-plane fa-2x"></i>
                                            </a>
                                        </td>
                                        <td>
                                            <a class="sub-link" href="#"
                                            onclick="return confirm('Bạn có chắc muốn XÓA tin nhắn liên hệ này?') || event.stopImmediatePropagation()"
                                            style="margin-left: 10px;"
                                            wire:click.prevent="deleteContact({{ $contact->id }})">
                                                <i class="fa fa-times fa-2x text-danger"></i>
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        {{ $contacts->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
