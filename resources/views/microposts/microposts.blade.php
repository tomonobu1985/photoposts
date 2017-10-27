<ul class="media-list">
@foreach ($microposts as $micropost)
    <?php $user = $micropost->user; ?>
    <li class="media">
        <div class="media-left">
            <img class="media-object img-rounded" src="{{ Gravatar::src($user->email, 50) }}" alt="">
        </div>
        <div class="media-body">
            <div>
                {!! link_to_route('users.show', $user->name, ['id' => $user->id]) !!} <span class="text-muted">posted at {{ $micropost->created_at }}</span>
            </div>
            <div>
                <p>{!! nl2br(e($micropost->content)) !!}</p>
            </div>
            <div>
<div style="float:right; ">
    <div style="float:right; ">
                @if (Auth::user()->id == $micropost->user_id)
                    {!! Form::open(['route' => ['microposts.destroy', $micropost->id], 'method' => 'delete']) !!}
                        {!! Form::submit('Delete', ['class' => 'btn btn-danger btn-xs']) !!}
                    {!! Form::close() !!}
                @endif
    </div>
    <div style="float:right; ">
                @if (Auth::user()->is_users_favorites($micropost->id))
                    {!! Form::open(['route' => ['users.removefavorites', $micropost->id], 'method' => 'delete']) !!}
<!--                        {!! Form::submit('お気に入り', ['class' => "glyphicon glyphicon-star"]) !!}  -->
                            <!-- ボタンと一緒に使う -->
                            <button type="submit" class="btn btn-default">
                              <span class="glyphicon glyphicon-star" aria-hidden="true"></span>
                            </button>
<!--                        <button type="submit"><span class="glyphicon glyphicon-star" aria-hidden="true"></span></button>　　-->
                    {!! Form::close() !!}
                @else
                    {!! Form::open(['route' => ['users.setfavorites', $micropost->id], 'method' => 'POST']) !!}
<!--                    {!! Form::open(['route' => ['users.setfavorites', $user->id]]) !!}  -->
<!--                        {!! Form::submit('お気に入り', ['class' => "glyphicon glyphicon-star-empty"]) !!}   -->
                        <!-- ボタンと一緒に使う -->
                        <button type="submit" class="btn btn-default">
                          <span class="glyphicon glyphicon-star-empty" aria-hidden="true"></span>
                        </button>
<!--                        <button type="submit"><span class="glyphicon glyphicon-star-empty" aria-hidden="true"></span></button>　　　-->
                        {!! Form::close() !!}
                @endif
    </div>
<div style="float:right; ">
                    <img src="{{ $micropost -> content }}" width=60 height=60 alt="">
</div>
                </div>
            </div>
        </div>
    </li>
@endforeach
</ul>
{!! $microposts->render() !!}