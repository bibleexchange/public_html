@extends('layouts.user')

@section('content')

<div id="course-maker-content" class="row">
	<div class="container-fluid">

		<div id="sub_be_banner" class="row greenBG">
			<div class="col-xs-12">
				<h1>
					<a class="pull-left" href="{!! url('/user/course-maker/'.Session::get('last_edited_course_id')) !!}" style="text-decoration: none;">
						<span class="glyphicon glyphicon-arrow-left" aria-hidden="true"></span><sup> last course</sup>
					</a>
					{!! $page->title !!}
				</h1>
			</div>
		</div>
	<div class="row edit">
	
		<div class="col-md-2 sidebar study">
		
			<div class="update-image">
				<img src="{!!$study->defaultImage->src!!}" alt="{!!$study->defaultImage->alt_text!!}">
				<button type="button" class="btn btn-default btn-xs update-icon" data-toggle="modal" data-target="#iconModal">
					<span class="glyphicon glyphicon-edit" aria-hidden="true"></span> <span class="text">update</span>
				</button>
			</div>
		
		<button type="button" class="btn btn-default btn-xs" data-toggle="modal" data-target="#titleModal">
		 change title
		</button>
		
		<a class="btn btn-default btn-xs" href="{!!$study->previewUrl()!!}"><span class="glyphicon glyphicon-eye-close" aria-hidden="true"></span> preview</a>			
		<a class="btn btn-default btn-xs" href="{!!$study->url()!!}"><span class="glyphicon glyphicon-eye-open" aria-hidden="true"></span> view public</a>
		
		<!--  include('studies.forms.modal-create-task')  -->
		
		@include('partials.forms.public-private-study')
		
		@if($study->is_published !== 1)
			@include('partials.forms.publish-study')
		@else
			<a class="btn btn-default btn-xs all-published" ><span class="glyphicon glyphicon-check" aria-hidden="true"></span> all changes have been published</a>
		@endif

		</div>
<hr class="visible-xs visible-sm">
		<div class="col-md-6">
		
		{!!Form::open(['id'=>'studyeditor','class'=>'editor'])!!}	
	
			{!! Form::hidden('title',$study->title,['id'=>'title']) !!}
			
			{!! Form::label('comment','Editing Comments: ') !!}
			{!! Form::text('comment', $form->comment ,['id'=>'comment','placeholder'=>'EXAMPLE: This is the first text written in this study']) !!}
			{!! $errors->first('comment', '<br><small style=\'color:red;\'>*:message</small>') !!}
			
			{!! Form::label('text','Body: ') !!}
			
				<button type="button" class="btn btn-default btn-xs" data-toggle="modal" data-target="#myModal">
				 (optional) upload from .md file
				</button>
			
			{!! Form::textarea('text', $form->body,['id'=>'text','placeholder'=>'Start the body of your study here. Use markdown to style the text. ']) !!}
			{!! $errors->first('text', '<br><small style=\'color:red;\'>*:message</small>') !!}
			
			<div class="form-group">
				{!! Form::label('minor_edit','Minor Edit?: ') !!}
				{!! Form::checkbox('minor_edit','1', true, ['id'=>'minor_edit']) !!}
			</div>
			<div class="form-group">
				{!! Form::label('translate_verses','Convert Verse Code?: ') !!}
				{!! '{% John 3:16 %}' !!}	
				{!! Form::checkbox('translate_verses','1', false, ['id'=>'translate_verses']) !!}	
			</div>
			
			{!! Form::submit('save',['id'=>'save','class'=>'btn btn-success']) !!} 			
			
		{!!Form::close()!!}
		</div>
		<div class="col-md-4">	
				@if(Session::has('error'))
				<p class="errors">{{ Session::get('error') }}</p>
				@endif
			
				@include('partials.upload-file')
				<hr>
				@include('studies.partials.edit-study-extras')	
		</div>
	</div>
</div>
	
	</div>
</div>

@stop

@section('scripts')

	@parent
	
	@include('partials.study-editor-js')

@stop