@extends('admin-dashboard.main')
@section('title', 'Feedback')

@section('content')

	<div class="main-content">
		<div class="section__content section__content--p30">
			<div class="container-fluid">
				<div class="row">
                    <div class="col-md-12">
                        <div class="overview-wrap">
                            <h2 class="display-4">Approval message to customer</h2>
                        </div>
                        <hr>
                        <div class="alert alert-info" role="alert">
                            <h4 class="alert-heading">Reminder</h4>
                            <hr>
                            <p>
                                The message text area has already been contained default message value. If  you wish to compose a different message then you may type your text there. Thank you!
                            </p>
                        </div>

                        @if( session('acceptOrderError') )
                            <div class="sufee-alert alert with-close alert-danger alert-dismissible fade show">
                                <span class="badge badge-pill badge-success">Error</span>
                                {{ session('acceptOrderError') }}
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">×</span>
                                </button>
                            </div>
                        @endif

                    </div>
                </div>
                <div class="row justify-content-center">
                	<div class="col-md-12">
                        <div class="card">
                            <div class="card-header">Create a message</div>
                            <div class="card-body card-block">
                                <form action="" method="post" class="">
                                    <div class="form-group">
                                        <div class="input-group">
                                            <div class="input-group-addon">
                                                <i class="fa fa-user"></i>
                                            </div>
                                            <input type="text" id="username" name="username" class="form-control" placeholder="To: {{ $transSms[0]['customer_email'] }}" readonly>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="input-group">

                                            <div class="input-group-addon">
                                                <i class="fa fa-envelope"></i>
                                            </div>
                                            <textarea class="form-control{{ $errors->has('sms') ? ' is-invalid' : '' }}" name="sms" placeholder="Enter your message here ..">Thank you for shopping at JYP Store. Your ordered item(s) is/are ready to claim now. Please proceed to our main branch to claim your order. Thank you!</textarea>

                                            @if ($errors->has('sms'))
                                                <span class="invalid-feedback">
                                                    <strong>{{ $errors->first('sms') }}</strong>
                                                </span>
                                            @endif

                                        </div>
                                    </div>
                                    <div class="form-actions form-group">
                                        <form action="{{ route('admin.submitOrderFeedback', $transSms[0]['order_code']) }}" method="POST">
                                            @csrf
                                            <button type="submit" class="btn btn-success">
                                                <i class="fa fa-lg fa-plane"></i> Send
                                            </button>
                                        </form>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
			</div>
		</div>		
	</div>

@endsection