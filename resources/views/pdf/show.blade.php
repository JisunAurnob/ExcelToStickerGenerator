@extends('layouts.app')

@section('content')


<table align ="center"  class='table table-bordered'>           

                               <tr>
                            
                               <td  ><b><u>Hoist_Label</u></b></td>
                                 <td ><b><u>Hoist_Type</u></b></td>
                                  <td  ><b><u>Function</u></b></td>
                                  <td  ><b><u>Total_Point_Load</u></b></td>
                                  <td  ><b><u>X</u></b></td>
                                  <td  ><b><u>Y</u></b></td>
                                  <td  ><b><u>LAYER</u></b></td>
                                  <td  ><b><u>NAME</u></b></td>
                                  <td  ><b><u>SYMBOL_USED</u></b></td>
                                  <td  ><b><u>Options</u></b></td>
                                
                               </tr>
                                
                               @foreach($info as $s)    
                  
                        <tr>
                            <td>{{$s->Hoist_Label}}</td>
                            <td>{{$s->Hoist_Type}}</td>
                            <td>{{$s->Function}}</td>
                            <td>{{$s->Total_Point_Load}}</td>
                            <td>{{$s->X}}</td>
                            <td>{{$s->Y}} </td>
                            <td>{{$s->LAYER}} </td>
                            <td>{{$s->NAME}}</td>
                            <td>{{$s->SYMBOL_USED}} </td>
                          <td>  <a href="/pdf/pdfdownload/{{$s->Id}}" style="color:black" class="btn btn-outline-secondary">Download</a></td>
                            
                            
                         </tr>
                         @endforeach

</table>               

@endsection