@extends('layout')

@section('styles')
<link rel="stylesheet" href="/css/goal_setting/styles.css">
@endsection

@section('content')
	<div class="container">
		<div class="return">
			<a href="#" onclick="history.back(); return false;">
				<img src="{{ asset("images/return.png") }}" class="img-fluid-3" alt="...">
			</a>

		</div>
		<div class="row">
			<div class="col-12 col-md-offset-3 col-md-6">
					<div class="d-table-cell align-middle">
						<div class="text-center mt-4">
							<img src="{{ asset("images/star.png") }}" class="img-fluid-3" alt="star">
								<h2 class="h2" id="h2">目標設定更新</h2>
							<img src="{{ asset("images/megahon.png") }}" class="img-fluid-3" alt="megaphone">
						</div>

						<div class="card">
							<div class="card-body">
                @if ($errors->any())
                  <div class="alert alert-danger">
                    @foreach ($errors->all() as $messages)
                      <p>{{ $messages }}</p>
                    @endforeach
                  </div>
                @endif
								<div class="m-sm-4">
									{{-- {{route('goal.', ['goal'=>$goal_id])}} --}}
									<form action="{{ route('goal.edit',['id' => $id]) }}" method="POST">
										@csrf
										<div class="form-group" id="form-group">
											<textarea class="form" id="textarea" name="goal_content" placeholder="{{ $goalSetting->goal_content }}" rows="5" cols="40"></textarea>
										</div>
										<div class="text-center mt-3">
											<button type="submit" class="btn btn-lg btn-light">更新</button>
										</div>
									</form>
								</div>
						</div>

						<div class="flex-log">
							<img src="{{ asset("images/stretch(1).png") }}" class="img-fluid-1" alt="stretch">
							<img src="{{ asset("images/flex-logo.png") }}" class="img-fluid-2" alt="logo">
							<img src="{{ asset("images/training(1).png") }}" class="img-fluid-1" alt="training">
						</div>

					</div>
			</div>
		</div>
	</div>
@endsection