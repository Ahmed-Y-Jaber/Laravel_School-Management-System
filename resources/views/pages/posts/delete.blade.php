<!-- Deleted inFormation Student -->
<div class="modal fade" id="delete_comp{{$company->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title" id="exampleModalLabel">{{ __('site.compdelete') }}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{route('companies.destroy',$company->id)}}" method="post">
                    @csrf
                    @method('DELETE')

                    <input type="hidden" name="id" value="{{$company->id}}">

                    <h5 style="font-family: 'Cairo', sans-serif;">{{ __('site.Warning') }}</h5>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">{{__('Cancel')}}</button>
                        <button  class="btn btn-danger">{{__('Delete')}}</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
