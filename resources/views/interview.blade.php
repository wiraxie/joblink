<!-- First, extends to the CRUDBooster Layout -->
@extends('crudbooster::admin_template')
@section('content')
  <!-- Your html goes here -->
  <div class='panel panel-default'>
    <div class='panel-heading'>Add Form</div>
    <div class='panel-body'>
      <form  method='post' id="form" enctype="multipart/form-data"  action='{{CRUDBooster::mainpath('add-save')}}'>
        <input type="hidden" name="_token" value="{{csrf_token()}}">
		
		<div class='form-group'>
          <label>candidateno</label>
          <input type='text' name='regid' id="regid" class='form-control'/>
        </div>
		
		<div class='form-group'>
			<label for="start">Interview date</label>
			<input type="date" id="intdate" name="intdate" class='form-control'/>
		</div>
		
		<div class='form-group'>
			<select class="form-control">
			  <option value="volvo">Volvo</option>
			  <option value="saab">Saab</option>
			  <option value="opel">Opel</option>
			  <option value="audi">Audi</option>
			</select>
		</div>
		
		<div class="box-footer" style="background: #F5F5F5">

                        <div class="form-group">
                            <label class="control-label col-sm-2"></label>
                            <div class="col-sm-10">
                                @if($button_cancel && CRUDBooster::getCurrentMethod() != 'getDetail')
                                    @if(g('return_url'))
                                        <a href='{{g("return_url")}}' class='btn btn-default'><i
                                                    class='fa fa-chevron-circle-left'></i> {{trans("crudbooster.button_back")}}</a>
                                    @else
                                        <a href='{{CRUDBooster::mainpath("?".http_build_query(@$_GET)) }}' class='btn btn-default'><i
                                                    class='fa fa-chevron-circle-left'></i> {{trans("crudbooster.button_back")}}</a>
                                    @endif
                                @endif
                                @if(CRUDBooster::isCreate() || CRUDBooster::isUpdate())

                                    @if(CRUDBooster::isCreate() && $button_addmore==TRUE && $command == 'add')
                                        <input type="submit" name="submit" value='{{trans("crudbooster.button_save_more")}}' class='btn btn-success'>
                                    @endif

                                    @if($button_save && $command != 'detail')
                                        <input type="submit" name="submit" value='{{trans("crudbooster.button_save")}}' class='btn btn-success'>
                                    @endif

                                @endif
                            </div>
                        </div>


                    </div>
        <!-- etc .... -->
        
      </form>
    </div>
  
  </div>
@endsection