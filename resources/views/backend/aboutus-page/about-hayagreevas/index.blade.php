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
											<a href="{{ route('about-hayagreevas.index') }}">Home</a>
										</li>
										<li class="breadcrumb-item active" aria-current="page">About Hayagreevas Details</li>
									</ol>
								</nav>

								<a href="{{ route('about-hayagreevas.create') }}" class="btn btn-primary px-5 radius-30">+ Add About Hayagreevas Details</a>
							</div>
                    <div class="table-responsive custom-scrollbar">
           <table class="table table-bordered display" id="basic-1">
    <thead>
        <tr>
            <th>#</th>
            <th>Banner Image</th>
            <th>Title</th>
            <th>Content Heading</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        @forelse($records as $key => $record)
        <tr>
            <td>{{ $key + 1 }}</td>

            <td>
                @if($record->banner_image)
                    <img src="{{ asset('uploads/about_hayagreevas/' . $record->banner_image) }}" style="height: 50px;">
                @else
                    N/A
                @endif
            </td>

            <td>{{ $record->title }}</td>
            <td>{{ $record->content_heading }}</td>

            <td>
                <a href="{{ route('about-hayagreevas.edit', $record->id) }}" class="btn btn-sm btn-primary">Edit</a>

                <form action="{{ route('about-hayagreevas.destroy', $record->id) }}" method="POST" style="display:inline-block;" onsubmit="return confirm('Are you sure you want to delete this?');">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                </form>
            </td>
        </tr>
        @empty
        <tr>
            <td colspan="5" class="text-center">No records found.</td>
        </tr>
        @endforelse
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
<script>
    $(document).ready(function () {
        $('#basic-1').DataTable();
    });
</script>


</body>

</html>