<div class="card">
	<div class="card-body text-center">
		<div class="img mb-2">
			<img src="{{ ($user->avatar) ? asset($user->avatar) :  'http://unmr-nl.science.uu.nl/sites/default/files/user_placeholder_man_0.jpg' }}" class="profile-pic img-fluid" alt="">
		</div>
		{!! Form::open(['url' => '/user/cv/uploadImage', 'files'=> true, 'method' => 'POST', 'id' => 'formUploadAvatar']) !!}
			{!! Form::file('avatar', ['class' => 'file-upload']) !!}
		{!! Form::close() !!}
	</div>
</div>
<div class="card mt-4">
	<div class="card-body">
			
	</div>
</div>

@section('avatar')
	<script>
		(function(){
			var readURL = function(input) {
		        if (input.files && input.files[0]) {
		            var reader = new FileReader();

		            reader.onload = function (e) {
		                $('.profile-pic').attr('src', e.target.result);
		            }
		    
		            reader.readAsDataURL(input.files[0]);
		        }
		    }
		   
		    $(".file-upload").change(function(){
		        // readURL(this);
		        // console.log('vamos a cargar');
		        var form = $("#formUploadAvatar");

		        $.ajax({
		        	url: form.attr('action'),
		        	method: form.attr('method'),
		        	data: new FormData(form[0]),
		        	contentType: false,
		        	cache: false,
		        	processData:false,
		        	beforeSend: function(){

		        	},
		        	success: function(data){
		        		$(".profile-pic").attr('src', '/'+data.avatar);
		        	},
		        	error: function(xhr){

		        	}
		        });

		    });
		    
		    $(".avatar").click(function() {
		       $(".file-upload").click();
		    });
		}())
	</script>
@endsection