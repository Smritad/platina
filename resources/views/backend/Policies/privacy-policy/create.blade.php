<!doctype html>
<html lang="en">
<head>
    @include('components.backend.head')
</head>

<body>
    @include('components.backend.header')
    @include('components.backend.sidebar')

    <div class="page-body">
        <div class="container-fluid">

            <!-- Page Header -->
            <div class="page-title">
                <div class="row">
                    <div class="col-6">
                        <h4>Add About Hayagreevas Details</h4>
                    </div>
                    <div class="col-6 text-end">
                        <ol class="breadcrumb justify-content-end">
                            <li class="breadcrumb-item"><a href="{{ route('about-hayagreevas.index') }}">Home</a></li>
                            <li class="breadcrumb-item active">Add About Hayagreevas Details</li>
                        </ol>
                    </div>
                </div>
            </div>

        

    <form action="{{ isset($record) ? route('about-hayagreevas.update', $record->id) : route('about-hayagreevas.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        @if(isset($record)) @method('PUT') @endif

      

        <div class="text-end mt-3">
            <a href="{{ route('privacy-policy.index') }}" class="btn btn-danger">Cancel</a>
            <button type="submit" class="btn btn-primary">{{ isset($record) ? 'Update' : 'Submit' }}</button>
        </div>
    </form>
</div>




        </div>
    </div>

    @include('components.backend.footer')
    @include('components.backend.main-js')

   
</body>
</html>
