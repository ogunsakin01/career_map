@extends('layouts.app')
@section('content')
    <div class="py-12">
        <div class="max-w-9xl sm:px-6 lg:px-8">
            <form class="flex min-h-full items-end justify-center p-4 text-center sm:items-center sm:p-0">
                <div class="relative transform overflow-hidden rounded-lg bg-white text-left shadow-xl transition-all sm:my-8 sm:w-full sm:max-w-lg">
                    <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                        <div class="mb-2">
                            Create Job
                            <a href="{{url('jobs/all-jobs')}}" class="float-right small mt-3 inline-flex w-full justify-center rounded-md border border-gray-300 bg-white px-4 py-2 text-base font-medium text-gray-700 shadow-sm hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 sm:mt-0 sm:ml-3 sm:w-auto sm:text-sm" type="button">View All</a>
                            <hr/>
                        </div>
                        <label class="block text-gray-700 font-medium mb-2">Title</label>
                        <input id='title' type="text" class="w-full border border-gray-400 p-2 rounded-lg" name="title">
                        <label class="block text-gray-700 font-medium mt-4 mb-2">Description</label>
                        <textarea id="description" class="w-full border border-gray-400 p-2 rounded-lg" name="description"></textarea>
                    </div>
                    <div class="bg-gray-50 px-4 py-3 sm:flex sm:flex-row-reverse sm:px-6">
                        <button type="button" id="submit" class="mt-3 inline-flex w-full justify-center rounded-md border border-gray-300 bg-white px-4 py-2 text-base font-medium text-gray-700 shadow-sm hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 sm:mt-0 sm:ml-3 sm:w-auto sm:text-sm">Create</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
@section('script')
    <script>
        $(document).ready(function(){
            $('#submit').on('click', function(){
               let title = $('#title').val();
               let description = $('#description').val();
               axios.post('{{url('jobs')}}', {
                   title: title,
                   description: description
               })
                   .then((response) => {
                       iziToast.success({
                           message: response.data.message,
                           title: "Success",
                           position: 'topCenter',
                           timeout: 10000,
                       });
                       $('#title').val('');
                       $('#description').val('');
                   })
                   .catch((error) => {
                       iziToast.error({
                           message: error.response.data.message,
                           title: "Error",
                           position: 'topCenter',
                           timeout: 10000,
                       });
                   })
            });
        });
    </script>
@endsection
