<!doctype html>
<html lang="en">
    
<head>
    @include('components.backend.head')
</head>
	   
		@include('components.backend.header')

	    <!--start sidebar wrapper-->	
	    @include('components.backend.sidebar')
	   <!--end sidebar wrapper-->

    
     <div class="page-body">
          <div class="container-fluid">
            <div class="page-title">
              <div class="row">
                <div class="col-6">
                </div>
                <div class="col-6">
                  <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.html">                                       
                        <svg class="stroke-icon">
                          <use href="../assets/svg/icon-sprite.svg#stroke-home"></use>
                        </svg></a></li>
                  </ol>
                </div>
              </div>
            </div>
          </div>
          <!-- Container-fluid starts-->
          <div class="container-fluid">
            <div class="row">
              <!-- Zero Configuration  Starts-->
              <div class="col-sm-12">
                <div class="card">
                  <div class="card-body">

                    <div class="d-flex justify-content-between align-items-center mb-4">
								<nav aria-label="breadcrumb" role="navigation">
									<ol class="breadcrumb mb-0">
										<li class="breadcrumb-item">
											<a href="{{ route('product-details.index') }}">Home</a>
										</li>
										<li class="breadcrumb-item active" aria-current="page">Product Details</li>
									</ol>
								</nav>

								<a href="{{ route('product-details.create') }}" class="btn btn-primary px-5 radius-30">+ Add Product Size Details</a>
							</div>


                   <div class="table-responsive custom-scrollbar">
  <table class="display" id="basic-1">
    <thead>
      <tr>
        <th>#</th>
        <th>Category</th>
        <th>Product Name</th>
        <!-- <th>TC Name</th>
        <th>Age Group</th>
        <th>Fabric Type</th>
        <th>Size</th>
        <th>Colors</th>
        <th>Dimension</th>
        <th>Content</th>
        <th>Style No</th>
        <th>MRP</th>
        <th>Description</th>
        <th>Media</th> -->
        <th>Action</th>
      </tr>
    </thead>
    <tbody>
      @foreach($products as $key => $product)
      <tr>
        <td>{{ $key + 1 }}</td>
        <td>{{ $product->category->category_name ?? '-' }}</td>
        <td>{{ $product->product_name }}</td>
        <!-- <td>{{ $product->tc_name }}</td>
        <td>{{ $product->ageGroup->category_name ?? '-' }}</td>
        <td>{{ $product->fabricType->category_name ?? '-' }}</td>
        <td>{{ $product->size->category_name ?? '-' }}</td>
        <td>{{ $product->colors }}</td>
        <td>{{ $product->dimension }}</td>
        <td>{{ $product->productContent->category_name ?? '-' }}</td>
        <td>{{ $product->style_no }}</td>
        <td>{{ $product->mrp }}</td>
        <td>{{ Str::limit($product->description, 50) }}</td> -->
       
        <td>
          <a href="{{ route('product-details.edit', $product->id) }}" class="btn btn-sm btn-primary">Edit</a>
          <br><br>
          <form action="{{ route('product-details.destroy', $product->id) }}" method="POST" style="display:inline-block;" onsubmit="return confirm('Are you sure to delete?')">
            @csrf
            @method('DELETE')
            <button class="btn btn-sm btn-danger" type="submit">Delete</button>
          </form>
        </td>
      </tr>
      @endforeach
    </tbody>
  </table>
</div>

                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
            <!-- footer start-->
             @include('components.backend.footer')
      </div>
    </div>

        @include('components.backend.main-js')

</body>

</html>