<div class="form-group">
    {!! Form::label('title', 'Title') !!}
    {!! Form::text('title', null, ['class' => 'form-control', 'required']) !!}
</div>
<div class="form-group">
    {!! Form::label('image', 'Image') !!}
    {!! Form::file('image', null, ['class' => 'form-control', 'required']) !!}
</div>
<div class="form-group">
    {!! Form::label('content', 'Content') !!}
    {!! Form::textarea('content', null, ['class' => 'form-control', 'rows' => 4, 'required']) !!}
</div>
