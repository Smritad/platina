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
											<a href="{{ route('aboutus-details-platina.index') }}">Home</a>
										</li>
										<li class="breadcrumb-item active" aria-current="page">About us Details</li>
									</ol>
								</nav>

								<a href="{{ route('aboutus-details-platina.create') }}" class="btn btn-primary px-5 radius-30">+ Add About us Details</a>
							</div>


                      <div class="table-responsive custom-scrollbar">
                    <table class="display" id="basic-1">
    <thead>
        <tr>
            <th>Title</th>
            <th>Subtitle</th>
            <th>Description</th>
            <th>Counter Text</th>
            <th>Counter Description</th>
            <th>Created At</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($aboutusDetails as $item)
        <tr>
            <td>{{ $item->title }}</td>
            <td>{{ $item->subtitle }}</td>
            <td>{!! Str::limit(strip_tags($item->description), 50) !!}</td>
            <td>{{ $item->counter_text }}</td>
            <td>{{ $item->counter_description }}</td>
            <td>{{ $item->created_at->format('d-m-Y') }}</td>
            <td>
                <a href="{{ route('aboutus-details-platina.edit', $item->id) }}" class="btn btn-primary">Edit</a><br><br>
                <form action="{{ route('aboutus-details-platina.destroy', $item->id) }}" method="POST" style="display:inline;">
                    @csrf @method('DELETE')
                    <button onclick="return confirm('Are you sure?')" class="btn btn-sm btn-danger">Delete</button>
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