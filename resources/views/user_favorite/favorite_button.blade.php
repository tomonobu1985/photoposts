@if (Auth::user()->is_users_favorites($user->id))
    {!! Form::open(['route' => ['user.removefavorites', $user->id], 'method' => 'delete']) !!}
        {!! Form::submit('', ['class' => "glyphicon glyphicon-star"]) !!}
    {!! Form::close() !!}
@else
    {!! Form::open(['route' => ['user.setfavorites', $user->id]]) !!}
        {!! Form::submit('', ['class' => "glyphicon glyphicon-star-empty"]) !!}
    {!! Form::close() !!}
@endif