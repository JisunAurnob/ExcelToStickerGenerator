
 <style>
        .page-break {
            page-break-after: always;
        }
    </style>

@foreach($info as $info)

<div class='page-break'>

<table align ="center"  class='table table-bordered'>


 


              
                     

                               <tr>
                           
                          
                               <th><b>Hoist_Label</b> </th>
                          
                               <th><b>Hoist_Type</b> </th>
                               <th><b>Function</b> </th>
                               <th><b>Total_Point_Load</b> </th>
                               <th><b>X</b> </th>
                               <th><b>Y</b> </th>
                               <th><b>LAYER</b> </th>
                               <th><b>NAME</b> </th>
                               <th><b>SYMBOL_USED</b> </th>
                                
                               </tr>
                                
                        
                  
                        <tr>
                            @if($info->Hoist_Type=='2 Ton')
                            <td style='color:red'>{{$info->Hoist_Type}}</td>

                            @elseif($info->Hoist_Type=='1/2 Ton')
                            <td style='color:blue'>{{$info->Hoist_Type}}</td>
                            
                            @elseif($info->Hoist_Type=='1 Ton')
                            <td style='color:green'>{{$info->Hoist_Type}}</td>
                            
                            @elseif($info->Hoist_Type=='1/4 Ton')
                            <td style='color:yellow'>{{$info->Hoist_Type}}</td>

                            @endif

                            <td>{{$info->Hoist_Label}}</td>
                            <td>{{$info->Function}}</td>
                            <td>{{$info->Total_Point_Load}}</td>
                            <td>{{$info->X}}</td>
                            <td>{{$info->Y}} </td>
                            <td>{{$info->LAYER}} </td>
                            <td>{{$info->NAME}}</td>
                            <td>{{$info->SYMBOL_USED}} </td>
                            
                            
                         </tr>
                 

</table>  
    </div>             
@endforeach