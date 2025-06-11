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
											<a href="{{ route('material-details.index') }}">Home</a>
										</li>
										<li class="breadcrumb-item active" aria-current="page">Materials Details</li>
									</ol>
								</nav>

								<a href="{{ route('material-details.create') }}" class="btn btn-primary px-5 radius-30">+ Add Materials Details</a>
							</div>


                    <div class="table-responsive custom-scrollbar">
                <table class="table table-bordered display" id="basic-1">
    <thead>
        <tr>
            <th>#</th>
            <th>Title</th>
            <th>Heading</th>
            <th>Details</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        @forelse($records as $index => $record)
            <tr>
                <td>{{ $index + 1 }}</td>
                <td>{{ $record->title }}</td>
                <td>{{ $record->heading }}</td>
                <td>
                    @php
                        $texts = explode(',', $record->text);
                        $descriptions = explode(',', $record->description);
                        $images = explode(',', $record->image);
                    @endphp

                    <ul class="list-unstyled">
                        @for($i = 0; $i < count($texts); $i++)
                            <li class="mb-2">
                                <strong>{{ $texts[$i] ?? '-' }}</strong><br>
                                <span>{{ $descriptions[$i] ?? '-' }}</span><br>
                                @if(!empty($images[$i]))
                                    <img src="{{ asset('platina/home/materials/' . $images[$i]) }}" alt="Image" width="60" class="rounded mt-1" />
                                @endif
                            </li>
                        @endfor
                    </ul>
                </td>
                <td>
                    <a href="{{ route('material-details.edit', $record->id) }}" class="btn btn-sm btn-primary">Edit</a>
                    
                     <br><br><form action="{{ route('material-details.destroy', $record->id) }}" method="POST" style="display:inline-block;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" onclick="return confirm('Are you sure you want to delete this item?')" class="btn btn-sm btn-danger">Delete</button>
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