
@extends('layouts.main')
@section('content')
<form id="add-product-form" action="<?= getClientUrl('save-category')?>" method="post" enctype="multipart/form-data">
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="">Tên Danh Mục<span class="text-danger">*</span></label>
                    <input type="text" name="cate_name" class="form-control" placeholder="Nhập tên danh muc">
                </div>
                @if(!empty($error['no_cate_name']))
                    <div class="alert alert-danger">{{$error['no_cate_name']}}</div>
                @endif
                
                <div class="form-group">
                    <label for="">show menu<span class="text-danger">*</span></label>
                    <input type="number" name="show_menu" class="form-control" placeholder="show-menu">
                </div>
                @if(!empty($error['no_show_menu']))
                    <div class="alert alert-danger">{{$error['no_show_menu']}}</div>
                @endif
                @if(!empty($error['nho_hon']))
                    <div class="alert alert-danger">{{$error['nho_hon']}}</div>
                @endif
                <div class="col-12 d-flex justify-content-end">
                <button type="submit" class="btn btn-sm btn-primary" name="submit">Tạo</button>&nbsp;
                <a href="<?= BASE_URL ?>" class="btn btn-sm btn-danger">Hủy</a>
            </div>
                
            </div>
            <div class="col-md-6">
               <!--  <div class="row">
                    <div class="col-md-6 offset-md-3">
                        <img src="<?= DEFAULT_IMAGE ?>" class="img-fluid" id="img-preview">
                    </div>
                </div> -->
                
                
                
            </div>
            
        </div>
    </form>
@endsection
<!--     </div>
</body>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
</html> -->