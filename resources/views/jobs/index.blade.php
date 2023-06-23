@extends('layouts.app')
@section('content')
    <div class="py-12">
        <div class="max-w-9xl sm:px-6 lg:px-8" id="jobs">
            <div class="mb-2 justify-center p-4 text-center">
                All Jobs <a href="{{url('jobs/create')}}" type="button" class="mt-3 inline-flex w-full justify-center rounded-md border border-gray-300 bg-white px-4 py-2 text-base font-medium text-gray-700 shadow-sm hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 sm:mt-0 sm:ml-3 sm:w-auto sm:text-sm small">Create Job</a>
            </div>
        </div>
    </div>
@endsection
@section('script')
    <script>
        $(document).ready(function(){
                axios.get('{{url('jobs/all')}}')
                    .then((response) => {
                        let response_data = response.data.data
                        for(let i = 0; i < response_data.length; i++){
                            $('#jobs').append('<div class="flex min-h-full items-end justify-center p-4 text-center sm:items-center sm:p-0">' +
                                '<div class="relative transform overflow-hidden rounded-lg bg-white text-left shadow-xl transition-all sm:my-8 sm:w-full sm:max-w-lg">' +
                                '<div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">' +
                                '<label class="block text-gray-700 font-medium mb-2">Title: ' + response_data[i].title + '</label>' +
                                '<div>' + response_data[i].description + '</div>' +
                                '</div>' +
                                '<div class="bg-gray-50 px-4 py-3 sm:flex sm:flex-row-reverse sm:px-6">' +
                                '<a type="button" href="/jobs/view/' + response_data[i].id + '" class="mt-3 inline-flex w-full justify-center rounded-md border border-gray-300 bg-white px-4 py-2 text-base font-medium text-gray-700 shadow-sm hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 sm:mt-0 sm:ml-3 sm:w-auto sm:text-sm">View</a>' +
                                ' </div>' +
                        '</div>' +
                        '</div>');
                        }
                    })
            });
    </script>
@endsection
