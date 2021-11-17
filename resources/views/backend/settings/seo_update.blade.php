@extends('admin.admin_master')

@section('admin')

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <div class="container-full">
        <!-- Main content -->
        <section class="content">
            <div class="row">
                <section class="content col-md-12">

                    <!-- Basic Forms -->
                    <div class="box">
                        <div class="box-header with-border">
                            <h4 class="box-title">Seo Settings</h4>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <div class="row">
                                <div class="col">
                                    <form action=" {{ route('seo_update') }}" method="post">
                                        @csrf
                                        <input type="hidden" name="id" value="{{$seo_settings->id}}">

                                        <div class="row">


                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <h5>Meta Title <span class="text-danger"></span></h5>
                                                    <div class="controls">
                                                        <input type="text"
                                                               value="{{$seo_settings->meta_title}}"
                                                               name="meta_title"
                                                               class="form-control">

                                                    </div>
                                                </div>


                                            </div>

                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <h5>Meta Author <span class="text-danger"></span></h5>
                                                    <div class="controls">
                                                        <input type="text"
                                                               value="{{$seo_settings->meta_author}}"
                                                               name="meta_author"
                                                               class="form-control">

                                                    </div>
                                                </div>


                                            </div>

                                        </div>


                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <h5>Meta Keywords <span class="text-danger"></span></h5>
                                                    <div class="controls">
                                                        <input type="text"
                                                               value="{{$seo_settings->meta_keyword}}"
                                                               name="meta_keyword"
                                                               class="form-control">

                                                    </div>
                                                </div>


                                            </div>


                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <h5>Meta Description <span class="text-danger"></span></h5>
                                                    <div class="controls">
                                                        <textarea type="text"
                                                                  name="meta_description"
                                                                  class="form-control">       {{$seo_settings->meta_description}} </textarea>

                                                    </div>
                                                </div>
                                            </div>

                                        </div>

                                        <div class="row">


                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <h5>Google Analytics <span class="text-danger"></span></h5>
                                                    <div class="controls">
                                                        <textarea type="text"
                                                                  name="google_analytics"
                                                                  class="form-control">

                                                              {{$seo_settings->google_analytics}}
                                                        </textarea>

                                                    </div>
                                                </div>


                                            </div>


                                        </div>


                                        <div class="text-xs-right">
                                            <input type="submit" class="btn btn-rounded btn-info">
                                            </input>
                                        </div>


                                    </form>

                                </div>
                                <!-- /.col -->
                            </div>
                            <!-- /.row -->
                        </div>
                        <!-- /.box-body -->
                    </div>
                    <!-- /.box -->

                </section>


            </div>
        </section>
        <!-- /.content -->
    </div>


@endsection
