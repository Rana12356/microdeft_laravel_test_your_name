<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Edit Product</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
</head>
<body>
<section class="py-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        <h3 class="text-center">Edit Product</h3>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('product.update', ['id' => $product->id]) }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <label class="col-md-4">Name</label>
                                <div class="col-md-8">
                                    <input type="text" name="name" value="{{ $product->name }}" class="form-control" placeholder="Your Name">
                                </div>
                            </div>
                            <div class="row mt-3">
                                <label class="col-md-4">Price</label>
                                <div class="col-md-8">
                                    <input type="text" value="{{ $product->price }}" name="price" class="form-control" placeholder="Price">
                                </div>
                            </div>
                            <div class="row mt-3">
                                <label class="col-md-4">Image</label>
                                <div class="col-md-8">
                                    <input type="file" name="image" class="form-control" placeholder="Image">
                                    <img src="{{ asset($product->image) }}" alt="" style="height: 60px">
                                </div>
                            </div>
                            <div class="row mt-3">
                                <label class="col-md-4">Shop Id</label>
                                <div class="col-md-8">
                                    <input type="text" name="shop_id" value="{{ $product->shop_id }}" class="form-control" placeholder="Shop">
                                </div>
                            </div>
                            <div class="row mt-3">
                                <label class="col-md-4"></label>
                                <div class="col-md-8">
                                    <input type="submit" class="btn btn-success" value="Update Product">
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
</body>
</html>
