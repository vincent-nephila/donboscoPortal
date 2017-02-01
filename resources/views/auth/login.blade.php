@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
		 <div class="col-md-6   ">
                    <?php $strands = dbtiPortal\CtrElective::get();?>
                     <table class="tbl table-bordered" width="100%" cellpadding="1">
                        <tr style="text-align: center">
                            <td>
                                Strand
                            </td>
                            <td>
                                Elective
                            </td>
                            <td>
                                Available Slots
                            </td>
                        </tr>
                        @foreach($strands as $strand)
                           <?php 
                           $sy = \dbtiPortal\CtrRegistrationSchoolyear::where('department','Senior High School')->first();
                           $reserved = dbtiPortal\SlotReservation::where('elecode',$strand->elecode)->where('schoolyear',$sy->schoolyear)->count(); ?>
                        <tr>
                            <td style="text-align: center">{{$strand->strand}}</td>
                            <td>{{$strand->elective}}</td>
                            <td style="text-align: center">{{$strand->slots - $reserved}}</td>
                        </tr>
                        @endforeach
                        <tr>
                            <?php $reservedabm = dbtiPortal\SlotReservation::where('strand','ABM')->where('schoolyear',$sy->schoolyear)->count(); ?>
                            <td style="text-align: center" colspan="2">ABM</td>
                            <td style="text-align: center">{{$reservedabm}} reserved</td>
                        </tr>
                        
                    </table>
               </div>
        <div class="col-md-6">
            <div class="panel panel-default">
                <div class="panel-heading">Login</div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="{{ url('/login') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label">ID Number:</label>

                            <div class="col-md-6">
                                <input id="email" type="text" class="form-control" name="idno" value="{{ old('idno') }}">

                                @if ($errors->has('idno'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('idno') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password" class="col-md-4 control-label">Password</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control" name="password">

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" name="remember"> Remember Me
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    <i class="fa fa-btn fa-sign-in"></i> Login
                                </button>

                                <a class="btn btn-link" href="{{ url('/password/reset') }}">Forgot Your Password?</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
