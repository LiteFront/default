<div class="profile-wrap">
	<div class="row">
		<div class="col-md-4">
			<div class="profile-aside">
				<div class="profile-avatar">
					<span class="avatar-letter">{!!user()->name[0]!!}</span>
					<!-- <span class="avatar-img" style="background-image: ('')"></span> -->
				</div>
				<div class="profile-info">
					<h1 class="name">{!!user()->name!!}</h1>
					<p class="designation">{!!user()->designation!!}</p>
				</div>
				<br />
				<div class="profile-buttons">
					<div class="mb-15">
						<a class="btn btn-theme" href="{{guard_url('profile')}}">{{trans('user.user.title.profile')}}</a>
						<a class="btn btn-theme" href="{{guard_url('password')}}">{{trans('user.user.title.change_password')}}</a>
					</div>
				</div>
			</div>
		</div>
		<div class="col-md-8">
			<div class="profile-edit-card">
				<div class="app-sec-title app-sec-title-with-icon">
					<i class="las la-cog app-sec-title-icon"></i>
					<h2>{{trans('Update')}} {{trans('user.user.title.profile')}}</h2>
				</div>
				{!!Form::vertical_open()
				->id('form-update-profile')
				->method('POST')
				->action(guard_url('profile'))
				->class('update-profile')!!}
				<div class="profile-edit-card-section">
					<div class="form-group row">
						<label for="full-name" class="col-sm-3 col-form-label text-sm-right">{{trans('user.user.label.name')}}</label>
						<div class="col-sm-9">
							{!! Form::text('name')
							-> label(trans('user.user.label.name'))
							-> placeholder(trans('user.user.placeholder.name'))
							->raw()!!}
						</div>
					</div>
					<div class="form-group row">
						<label for="designation" class="col-sm-3 col-form-label text-sm-right">{{trans('user.user.label.designation')}}</label>
						<div class="col-sm-9">
							{!! Form::text('designation')
							-> label(trans('user.user.label.designation'))
							-> placeholder(trans('user.user.placeholder.designation'))
							->raw() !!}
						</div>
					</div>
					<div class="form-group row">
						<label for="email" class="col-sm-3 col-form-label text-sm-right">{{trans('user.user.label.email')}}</label>
						<div class="col-sm-9">
							{!! Form::tel('email')
							-> label(trans('user.user.label.email'))
							-> placeholder(trans('user.user.placeholder.email'))
							->raw() !!}
						</div>
					</div>
					<div class="form-group row mb-0">
						<label for="email" class="col-sm-3 col-form-label text-sm-right">{{trans('user.user.label.dob')}}</label>
						<div class="col-sm-9">
							{!! Form::date('dob')
							-> label(trans('user.user.label.dob'))
							-> placeholder(trans('user.user.placeholder.dob'))
							->raw()!!}
						</div>
					</div>
				</div>
				<div class="profile-edit-card-section">
					<div class="row">
						<div class="col-md-6">
							<div class="form-group">
								<label for="country" class="mb-5">{{trans('user.user.label.country')}}</label>
								{!! Form::tel('country')
								-> label(trans('user.user.label.country'))
								-> placeholder(trans('user.user.placeholder.country'))
								->raw() !!}
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label for="state" class="mb-5">{{trans('user.user.label.state')}}</label>
								{!! Form::tel('state')
								-> label(trans('user.user.label.state'))
								-> placeholder(trans('user.user.placeholder.state'))
								->raw() !!}
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label for="zipcode" class="mb-5">{{trans('user.user.label.zipcode')}}</label>
								{!! Form::tel('zipcode')
								-> label(trans('user.user.label.zipcode'))
								-> placeholder(trans('user.user.placeholder.zipcode'))
								->raw() !!}
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label for="full-name" class="mb-5">{{trans('user.user.label.phone')}}</label>
								{!! Form::tel('phone')
								-> label(trans('user.user.label.phone'))
								-> placeholder(trans('user.user.placeholder.phone'))
								->raw() !!}
							</div>
						</div>
					</div>

				</div>
				<div class="profile-edit-card-section text-center">
					<button class="btn btn-theme" type="submit">{{trans('Update')}} {{trans('user.user.title.profile')}}</button>
				</div>
				{!! Form::close() !!}
			</div>

		</div>
	</div>
</div>