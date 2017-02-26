@extends('layouts.admin.index')
@section('main')
<div class="x_panel">
  @if($type == 'create')
   <form method="POST" action="{{route('manage.tag.store')}}">
  @elseif($type == 'edit')
	 <form method="POST" action="{{route('manage.tag.update', ['id' => $id])}}">
  @endif
  {{ csrf_field() }}
		<ul class="nav nav-tabs centered">
              <li class="active"><a data-toggle="tab" href="#content">Content</a></li>
            </ul>
            @if($type == 'create')
            <div class="tab-content">
              <div id="content" class="tab-pane fade in active">
              <!-- title -->
                @include('layouts.form.text', ['nameInput' => 'title','inputDescription' => 'title of Tag','required' =>1])
                <!-- keyword -->
                @include('layouts.form.text', ['nameInput' => 'keyword','inputDescription' => 'keywoard of Tag','required' =>1])
                <!-- description -->
                @include('layouts.form.textarea', ['nameInput' => 'description','inputDescription' => 'discription of Tag','required' =>0])
              </div>
            </div>
            @elseif($type == 'edit')
            <input type="hidden" name="id" value="{{$values->id}}">
            <div class="tab-content">
              <div id="content" class="tab-pane fade in active">
              <!-- title -->
                @include('layouts.form.text', ['nameInput' => 'title','inputDescription' => 'title of Tag','required' =>1, 'value'=> $values->title])
                <!-- tag -->
                @include('layouts.form.text', ['nameInput' => 'keyword','inputDescription' => 'keywoard of Tag','required' =>1, 'value' =>$values->keyword])
                <!-- description -->
                @include('layouts.form.textarea', ['nameInput' => 'description','inputDescription' => 'discription of Tag','required' =>0, 'value' =>$values->description])
              </div>
            </div>
            @endif
            <div class="form-group">
              <button type="submit" class="btn btn-primary">Simpan</button>
            </div>
	</form>
</div>
@endsection
