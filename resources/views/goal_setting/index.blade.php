@extends('layout')

@section('styles')
<link rel="stylesheet" href="/css/goal_setting/styles.css">
@endsection

@section('content')
<div class="container">
  <div class="row">
    <div class="col-12 col-md-offset-3 col-md-6">
					<div class="d-table-cell align-middle">
						<div class="text-center mt-4">
              <span class="log">
                <img src="" class="img-fluid" >
              </span>
							  <h2 class="h2">目標設定</h2>
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
                  {{-- action属性を追記必ず --}}
                  {{-- {{route('register')}} --}}
									<form action="" method="POST">
                    @csrf
										<div class="form-group">
											<label for="name">ニックネーム</label>
                        <span class="log">
                          <img src="{{ asset("images/user_name.png") }}" class="img-fluid" >
                        </span>
											<input class="form-control form-control-lg" id="name" type="text" name="name" placeholder="例) 渋川 太郎">
										</div>
										<div class="form-group">
											<label for="email">メールアドレス</label>
                        <span class="log">
                          <img src="{{ asset("images/mail.png") }}" class="img-fluid" >
                        </span>
											<input class="form-control form-control-lg" id="email" type="email" name="email" placeholder="例) shibukawa@email.com">
										</div>
										<div class="text-center mt-3">
											<button type="submit" class="btn btn-lg btn-light">スタート！</button>
										</div>
									</form>
								</div>
							</div>
						</div>

            <div class="images">
              <img src="{{ asset("images/training(1).png") }}" class="img-fluid" alt="...">
							<img src="{{ asset("images/flex-logo.png") }}" class="img-fluid" alt="...">
							<img src="{{ asset("images/stretch(1).png") }}" class="img-fluid" alt="...">
            </div>

					</div>
				</div>
			</div>
		</div>
@endsection