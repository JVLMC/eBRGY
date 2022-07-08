

@extends('layouts.apps')
@section('content')
<div class="col-sm-12 text-left ">
   <h1 class="border-bottom border-bot pt-3">Businesses Information</h1>
</div>
<div class="Business-Content main-wrapper col-sm-12 text-left h-100  pr-0 pl-0 " >
   <div class="col-sm-12 pl-0 pr-0 search-bars" >
      <div class="topnav navbar navbar">
          <div>
         <button id="createbusiness" class="btn btn-success text-white " data-toggle="modal" data-target="#businessmodal">New Business <i class="fa fa-plus"></i></button>
         <button id="bulkdelete" class="btn btn-danger text-white " style="margin-left:2px;" > <i class="fa fa-trash"></i></button>
          </div>


         <div class="modal fade" id="businessmodal" name="businessmodal" tabindex="-1" role="dialog" aria-labelledby="business-modal" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
               <div class="modal-content">
                  <div class="modal-header">
                     <h5 class="modal-title" id="modelHeading"></h5>
                     <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                     <span aria-hidden="true">&times;</span>
                     </button>
                  </div>

                  <div class="modal-body">
                     <form id="businessform"  class="modal-input">
                        {{ csrf_field() }}
                        <input type="hidden" name="business_id" id="business_id">
                        <div class="row">
                            <div class="col-sm-6">





                        <div class="row" style="margin-left: 0px;margin-right: 0px;">
                            <div class="col-sm-6" >
                              <label >Last Name</label>
                              <input type="text" class="form-control" name="lastname" id="lastname" placeholder="Ex: Mata" value="" required="">
                              <span id="lastname_err" class="text-danger error-text lastname_err"></span>
                            </div>
                            <div class="col-sm-6 ">
                              <label >First Name</label>
                              <input type="text" class="form-control" name="firstname" id="firstname" placeholder="Ex: John Mark" value="" required="">
                              <span id="firstname_err" class="text-danger error-text firstname_err"></span>
                            </div>
                          </div>

                          <div class="row" style="margin-left: 0px;margin-right: 0px;">
                            <div class="col-sm-6" >
                              <label >Middle Name</label>
                              <input type="text" class="form-control" name="middlename" id="middlename" placeholder="Ex: Panlilio" value="" required="">
                              <span id="middlename_err" class="text-danger error-text middlename_err"></span>
                            </div>


                        <div class="row" style="margin-left: 0px;margin-right: 0px;">
                           <div class="col-sm-6" >
                             <label >Telephone</label>
                             <input type="text" class="form-control"   name="telephone" id="telephone" placeholder="Ex: 123-45-678"  value="" required="">
                             <span id="telephone_err" class="text-danger error-text telephone_err"></span>
                           </div>
                           <div class="col-sm-6 ">
                             <label >Mobile</label>
                             <input type="text" class="form-control" name="mobile" id="mobile"  placeholder="Ex: 09166041823" value="" required="">
                             <span id="mobile_err" class="text-danger error-text mobile_err"></span>
                           </div>
                         </div>
                    </div>


                         <div class="item form-group">
                            <label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Business Name
                            </label>
                            <div class="col-md-12 col-sm-12 ">
                               <input type="text" id="businessname" name="businessname" placeholder="Ex: Sari Sari Store
                               1050 Manila" required="required" class="form-control ">
                               <span id="businessname_err" class="text-danger error-text businessname_err"></span>

                            </div>
                         </div>



                         <div class="item form-group">
                            <label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Business Address
                            </label>
                            <div class="col-md-12 col-sm-12 ">
                               <input type="text" id="businessaddress" name="businessaddress" placeholder="Ex: P.O. Box 1121, Araneta Center Post Office
                               1135 Quezon City, Metro Manila" required="required" class="form-control ">
                               <span id="businessaddress_err" class="text-danger error-text businessaddress_err"></span>
                            </div>
                         </div>
                    </div>


                    <div class="item form-group">
                            <label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Business Type
                            </label>
                            <div class="col-md-12 col-sm-12 ">
                               <input type="text" id="businesstype" name="businesstype" placeholder="Ex: Partnership
                               1050 Manila" required="required" class="form-control ">
                               <span id="businesstype_err" class="text-danger error-text businesstype_err"></span>

                            </div>
                         </div>

                <!----------------
                -->
                    </div>
                        <div class="ln_solid"></div>
                        <div class="item form-group">
                           <div class="col-md-12 col-sm-12 offset-md-4">
                              <button type="submit" id="submit" class="btn btn-success resident-button">Submit</button>
                              <a class="btn btn-primary" type="button" data-dismiss="modal" style="margin-left: 4px;" >Cancel</a>
                              <input class="btn btn-primary" type="reset" value="Reset">
                           </div>
                        </div>
                     </form>
                  </div>
                  <div class="modal-footer text-white">
                  </div>
               </div>
            </div>
         </div>
         <div class="search-container">
            <input class="global_filter" type="text" id="global_filter" placeholder="Search..." name="search">
            <button type="submit"><i class="fa fa-search"></i></button>
            </form>
         </div>
      </div>
      <div class=" col-sm-12 text-left h-100  pr-0 pl-0 pt-2 pb-2 text-white" >
         <div class="row pl-4 pr-4   ">
            <div class="col-sm-12 border border-bot ">
            </div>
         </div>
         <div class="row pt-4 pl-4 pr-4">
            <div  class=" col-sm-12 overflow-auto display-nones ">
               <table   class=" bulk_action dataTables_info table business-table datatable-element business table-striped jambo_table bulk_action text-center border dataTable no-footer">
                  <thead>
                     <tr class="headings">
                        <th >
                            <input class="icheckbox_flat-green" type="checkbox"   id="check-all" >

                          </th>
                        <th class="column-title">Action</th>
                        <th class="column-title">Business_ID</th>
                        <th class="column-title">Last Name </th>
                        <th class="column-title">First Name </th>
                        <th class="column-title">Middle Name </th>


                        <th class="column-title">Mobile No.</th>

                        <th class="column-title">Business Name</th>
                        <th class="column-title">Business Type</th>


                        </th>
                     </tr>
                  </thead>
                  </tbody>
               </table>


            </div>
         </div>
      </div>
   </div>
</div>








<div class="modal fade" id="businessviewmodal" name="businessviewmodal" tabindex="-1" role="dialog" aria-labelledby="business-modal" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
       <div class="modal-content">
          <div class="modal-header">
             <h5 class="modal-title" id="modelHeading">View Business Data</h5>



             <button type="button" class="close" data-dismiss="modal" aria-label="Close">
             <span aria-hidden="true">&times;</span>
             </button>
          </div>




          <div class="modal-body">
             <form id="businessviewform"  class="modal-input">
                {{ csrf_field() }}
                <input type="hidden" name="business_idv" id="business_idv">











































                <div class="row">
                    <div class="col-sm-6">





                <div class="row" style="margin-left: 0px;margin-right: 0px;">
                    <div class="col-sm-6" >
                      <label >Last Name</label>
                      <input type="text" class="form-control" readonly id="lastnamev" name="lastnamev"   readonly>

                    </div>
                    <div class="col-sm-6 ">
                      <label >First Name</label>
                      <input  type="text" class="form-control" id="firstnamev" name="firstnamev"  readonly >

                    </div>
                  </div>

                  <div class="row" style="margin-left: 0px;margin-right: 0px;">
                    <div class="col-sm-6" >
                      <label >Middle Name</label>
                      <input type="text"  readonly class="form-control" name="middlenamev" id="middlenamev" >

                    </div>
                  </div>






                <div class="row" style="margin-left: 0px;margin-right: 0px;">
                   <div class="col-sm-6" >
                     <label >Telephone</label>
                     <input type="text" class="form-control"  readonly name="telephonev" id="telephonev" >

                   </div>
                   <div class="col-sm-6 ">
                     <label >Mobile</label>
                     <input type="text" class="form-control" readonly name="mobilev" id="mobilev"  >

                   </div>
                 </div>

            </div>




                 <div class="item form-group">
                    <label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Business Name
                    </label>
                    <div class="col-md-12 col-sm-12 ">
                       <input type="text" id="businessnamev" readonly  name="businessnamev" class="form-control ">
                    </div>
                 </div>



                 <div class="item form-group">
                    <label class="col-form-label col-md-3 col-sm-3 label-align" >Business Address
                    </label>
                    <div class="col-md-12 col-sm-12 ">
                       <input type="text" id="businessaddressv" readonly  name="businessaddressv"  class="form-control ">
                    </div>
                 </div>



                 <div class="item form-group">
                    <label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Business Type
                    </label>
                    <div class="col-md-12 col-sm-12 ">
                       <input type="text" id="businesstypev" readonly  name="businesstypev" class="form-control ">
                    </div>
                 </div>





            </div>



@endsection


