<div class="media">
    <!--<a class="pull-left" href="#">
        <img src="//www.gravatar.com/avatar/{{ md5($message->user->email) }} ?s=64"
             alt="{{ $message->user->name }}" class="img-circle">
    </a>
    {{ $message->user->vorname }} {{ $message->user->nachname }}-->
    <div class="media-body">
        <!--<h5 class="media-heading">{{ $message->user->name }}</h5>-->

        <p class="">{{ $message->body }}</p>

        <div class="mt-1 text-muted text-sm grid justify-items-end text-gray-400 leading-none">

            <small>{{ $message->created_at->diffForHumans() }}</small>

            <!-- Löschen der eigenen Nachricht -->

            @if ($message->user_id == Auth::id())

                <small><a class="btn btn-warning btn-sm float-right mt-1 text-xs hover:text-gray-200" title="Remove" href='{{ url('messages/'.$message->id) }}/delete'>

                Löschen

                </a></small>

            @endif

            <!-- Löschen der eigenen Nachricht -->

        </div>

    </div>
    
</div>