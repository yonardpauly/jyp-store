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
                                            <textarea class="form-control" name="sms" placeholder="Thank you for shopping at JYP Store. Your ordered item(s) is/are ready to claim now. Please proceed to our main branch to claim your order. Thank you!"></textarea>
                                        </div>
                                    </div>
                                    <div class="form-actions form-group">
                                        <button type="submit" class="btn btn-success">
                                        	<i class="fa fa-lg fa-plane"></i> Send
                                    	</button>
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