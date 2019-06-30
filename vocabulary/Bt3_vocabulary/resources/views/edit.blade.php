<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <title>Edit Vocabulary</title>

    {{-- bootstrap --}}
    <link rel="stylesheet" href="{{asset('bootstrap/css/bootstrap.min.css')}}">
    <script src="{{asset('bootstrap/js/jquery-3.3.1.min.js')}}"></script>
    <script src="{{asset('bootstrap/js/bootstrap.min.js')}}"></script>
    
    
    {{-- jquery validate --}}
    <script type="text/javascript" src="{{asset('jquery_validate/jquery.validate.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('js/home.js')}}"></script>
    {{--  --}}
    
    {{-- icon --}}
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">

    <link rel="stylesheet" type="text/css" href="{{asset('css/edit.css')}}">
</head>

<body>
<div class="wrap">
   <div class="container content">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header" style="text-align: center;">Word Edit
                   
                </h1>
            </div>
           
                   <!-- /.col-lg-12 -->
            <div class="col-lg-12" style="padding-bottom:120px">
                <form action="" method="post" id="main-form">
               
                   @if(count($errors)>0)
                        <div class='alert alert-danger'>
                            <ul>
                                @foreach($errors->all() as $error)
                                    <li>{!! $error !!}</li>

                                @endforeach 
                            </ul>
                        </div>

                   @endif

                    
                    <div class="form-group">
                        <label>Vocabulary<span class="required">*</span></label>
                        <div class="input-container input-block">
                            <i class="fab fa-earlybirds icon"></i>
                            <input class="input-field" type="text" name="txtName" value="{{$data['name']}}">
                        </div> 
                    </div>

                    <div class="form-group">
                         <label>Example sentence</label>
                         <div class="input-container input-block">
                            <i class="fas fa-tag icon"></i>
                            <input class="input-field" type="text" name="txtSentence" value="{{$data['sentence']}}">
                        </div> 
                    </div>

                     <div class="form-group">
                        <label>Meaning</label>
                        <div class="input-container input-block">
                           <i class="fas fa-paw icon"></i>
                            <input class="input-field" type="text" name="txtMean" value="{{$data['mean']}}">
                        </div> 
                    </div>                 

                    <button type="submit" class="btn btn-default update" style="margin-bottom: 20px">Update</button>
                    <button type="reset" class="btn btn-default reset">Reset</button>
                    <a href="{{route('home')}}" class="btn btn-success comeback">Comeback</a>
                    {{ csrf_field() }}
                </form>
            </div>
        </div> {{--end row --}}
    </div> 
</div>     
        

</body>

</html>

