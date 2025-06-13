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
											<a href="{{ route('manage-team-leadership.index') }}">Home</a>
										</li>
										<li class="breadcrumb-item active" aria-current="page">Team Leadership Details</li>
									</ol>
								</nav>

								<a href="{{ route('manage-team-leadership.create') }}" class="btn btn-primary px-5 radius-30">+ Add Team Leadership Details</a>
							</div>
                    <div class="table-responsive custom-scrollbar">
           <table class="table table-bordered display" id="basic-1">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Banner Image</th>
                        <th>Title</th>
                        <th>Description</th>
                        <th>Updated At</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($records as $index => $item)
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td>
                                @if($item->banner_image)
                                    <img src="{{ asset('uploads/platina_brand/' . $item->banner_image) }}" style="height: 60px;">
                                @endif
                            </td>
                            <td>{{ $item->title }}</td>
                            <td>{!! Str::limit(strip_tags($item->description), 100) !!}</td>
                            <td>{{ $item->updated_at->format('d-m-Y') }}</td>
                            <td>
                                <a href="{{ route('manage-team-leadership.edit', $item->id) }}" class="btn btn-primary">Edit</a>
                                   <br> <br><form action="{{ route('manage-team-leadership.destroy', $item->id) }}" method="POST" class="d-inline-block" onsubmit="return confirm('Are you sure?');">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-sm btn-danger">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="text-center">No records found.</td>
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