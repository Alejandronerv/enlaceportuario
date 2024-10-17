@include('layouts.main-header')

<div class="page">
    <div class="page-main">

        <!--app header-->
        @include('layouts.app-header')
        <!--/app header-->


        <!-- Horizontal-menu -->
        @include('layouts.menus.horizontal-menu')
        <!-- Horizontal-menu end -->

        <div class="app-content page-body">
            <div class="container">

                <div class="page-leftheader">
                    <h4 class="page-title">Yard Inventory</h4>
                </div>
                <div class="col-lg-12 col-xl-12 col-md-12 col-sm-12">
                    <div class="card">
                        <div class="card-body">
                            <form class="form-horizontal" action="{{ route('yardinventory.save') }}" method="post">
                                @csrf
                                <div class="form-group">
                                    <div class="form-label">File</div>
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" name="file_name">
                                        <label class="custom-file-label">Choose file</label>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="form-label">Ship Agency</label>
                                    <select name="shipagency" id="select-countries" class="form-control custom-select select2">
                                        <option value="UMS">UMS</option>
                                        <option value="MSK">MAERSK</option>
                                        <option value="MSC" selected>MSC</option>
                                    </select>

                                <div class="form-group mb-0 mt-4 row">
                                    <div class="col-md-9">
                                        <button type="submit" class="btn btn-primary">Create</button>
                                        <button type="submit" class="btn btn-secondary">Cancel</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>



@include('layouts.main-footer')