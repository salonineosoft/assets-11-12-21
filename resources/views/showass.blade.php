@extends('admin.dashboard')
@section('saloni') 
   <div class="container">
<table class="table table-bordered">
  <thead>
    <tr>
      <th scope="col">SN</th>
      <th scope="col">Title</th>
      <th scope="col">Description</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
  @if(count($data)>0)
      @php
       $sn=1;
       @endphp
      @foreach($data as $i)
    <tr>
      <td>{{$sn}}</td>
      <td>{{$i->title}}</td>
      <td>{{$i->description}}</td>
      <td>
          <a href="editass/{{$i->id}}" class="btn btn-success">Edit</a>
          
           <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#exampleModalCenter">
  Delete
</button> 
<!-----model---------->
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle"></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body bg-red">
        Do you Really Want to Delete...?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <a href="/del/{{$i->id}}" class="btn btn-danger">
  Delete</a>
 
      </div>
    </div>
  </div>
  <!-----endmodal--------->
      </td>
      @php
     $sn++;
  @endphp
    </tr> 
    @endforeach
 @else
<tr>
   <td class="record text-red text-center" colspan="10"> No records found</td>
</tr>
@endif
  </tbody>
</table>
{{$data->links("pagination::bootstrap-4")}}
</div>
</div>
@endsection
