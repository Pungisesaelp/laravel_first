 <div class="form-group">
    {!! Form::label('title','Title') !!}
    {!! Form::text('title', null,['class' => 'form-control']) !!}
    {!! Form::label('body','Body') !!}
    {!! Form::textarea('body', null,['class' => 'form-control']) !!}

    {!! Form::label('published_at','Publish On:') !!}
    {!! Form::input('date','published_at', date('Y-m-d'),['class' => 'form-control']) !!}


    {!! Form::submit($submitButtonText, ['class' => 'btn btn-primary btn-lg btn-block']) !!}
</div>