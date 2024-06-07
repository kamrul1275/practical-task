@extends('backend.layout.master')
@section('admin_content')

<div class="page-content">


				<!--breadcrumb-->
				<div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
					<div class="breadcrumb-title pe-3">Update Profile</div>
					<div class="ps-3">
						<nav aria-label="breadcrumb">
							<ol class="breadcrumb mb-0 p-0">
								<li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
								</li>
								<li class="breadcrumb-item active" aria-current="page">Update Profile</li>
							</ol>
						</nav>
					</div>
					<div class="ms-auto">
					
					</div>
				</div>
				<!--end breadcrumb-->
				<div class="container">
					<div class="main-body">
						<div class="row">

							<div class="col-lg-12">
								<div class="card">
									<div class="card-body">


										
            <form action="{{ route('store.company',$companies->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="row mb-3">
                        <div class="col-sm-3">
                            <h6 class="mb-0"> Name</h6>
                        </div>
                        <div class="col-sm-9 text-secondary">
                            <input type="text" name="company_name" value="{{$companies->company_name}}" class="form-control" />
                            @if ($errors->has('company_name'))
                                <span class="text-danger">{{ $errors->first('company_name') }}</span>
                            @endif
                        </div>
                    </div>

					<div class="row mb-3">
                        <div class="col-sm-3">
                            <h6 class="mb-0">Website Link</h6>
                        </div>
                        <div class="col-sm-9 text-secondary">
                            <input type="text" name="company_website" value="{{$companies->company_website}}" class="form-control" />
                            @if ($errors->has('company_website'))
                                <span class="text-danger">{{ $errors->first('company_website') }}</span>
                            @endif
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-sm-3">
                            <h6 class="mb-0">Mail</h6>
                        </div>
                        <div class="col-sm-9 text-secondary">
                            <input type="text" name="company_mail"  value="{{$companies->company_mail}}" class="form-control" />
                            @if ($errors->has('company_mail'))
                                <span class="text-danger">{{ $errors->first('company_mail') }}</span>
                            @endif
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-sm-3">
                            <h6 class="mb-0">Phone</h6>
                        </div>
                        <div class="col-sm-9 text-secondary">
                            <input type="text" name="company_phone"  value="{{$companies->company_phone}}" class="form-control" />
                            @if ($errors->has('company_phone'))
                                <span class="text-danger">{{ $errors->first('company_phone') }}</span>
                            @endif
                        </div>
                    </div>

                  

                    <div class="row">
                        <div class="col-sm-3"></div>
                        <div class="col-sm-9 text-secondary">
                            <input type="submit" class="btn btn-primary px-4" value="Update Company" />
                        </div>
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


