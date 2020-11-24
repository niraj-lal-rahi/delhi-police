@extends('layout.header')
@section('container')
<!-- ============================================================== -->
    <!-- Start right Content here -->
<!-- ============================================================== -->
<div class="main-content">

    <div class="page-content">

        <!-- Page-Title -->
        <div class="page-title-box">
            <div class="container-fluid">
                <div class="row align-items-center">
                    <div class="col-md-8">
                        <h4 class="page-title mb-1">Central Delhi:</h4>
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="javascript: void(0);">Court Orders</a></li>
                        <li class="breadcrumb-item active">Search by Order Date</li>
                        </ol>
                    </div>
                    <div class="col-md-4">
                        <div class="float-right d-none d-md-block">
                            <div class="dropdown">
                                <button class="btn btn-light btn-rounded dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="mdi mdi-settings-outline mr-1"></i> Settings
                                </button>
                                <div class="dropdown-menu dropdown-menu-right dropdown-menu-animated">
                                    <a class="dropdown-item" href="#">Action</a>
                                    <a class="dropdown-item" href="#">Another action</a>
                                    <a class="dropdown-item" href="#">Something else here</a>
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item" href="#">Separated link</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
        <!-- end page title end breadcrumb -->

        <div class="page-content-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">

                                @if(session('errors'))
                                <div class="alert alert-danger" role="alert">
                                    {{session('errors')}}
                                </div>
                                @endif
                                @if(session('success'))
                                <div class="alert alert-success" role="alert">
                                    {{session('success')}}
                                </div>
                                @endif

                                <form action="" method="POST">
                                    <input type="hidden" name="_token" value="SVCeQevKKHsIMAtBfzr9hx8VW1RJUesIBme81ZVH">
                                    <input type="hidden" name="court_url" value="https://services.ecourts.gov.in/ecourtindia_v4_bilingual/cases/s_casetype.php?state=D&state_cd=26&dist_cd=8">
                                <div class="form-check-inline form-group">
                
                                    <label class="form-check-label">
                                        <input type="radio" name="court_type" checked="" class="form-check-input" value="1">Court Complex
                                    </label>&nbsp;&nbsp;
                                    <label class="form-check-label">
                                        <input type="radio" name="court_type" class="form-check-input" value="2">Court Establishment
                                    </label>
                                </div>
                
                
                                <div class="form-group">
                                    <label for="sel1">* Court Complex :</label>
                                    <select name="court_complex_code" id="court_complex_code" class="form-control">
                                        <option value="0">Select Court Complex</option>
                                        <option value="1@1,2,3,4@N">Tis Hazari Court Complex</option>
                                        <option value="2@5,6,7@N">Rouse Avenue Court Complex</option>
                                    </select>
                                </div>
                                <div class="form-group" style="display: none;">
                                    <label for="sel1">*Court Establishment :</label>
                                    <select name="court_code" id="court_code" class="form-control">
                                        <option value="0">Select Court Establishment</option>
                                        <option value="1">District and Sessions Judge, Central, THC</option>
                                        <option value="2">Chief Metropolitan Magistrate, Central, THC</option>
                                        <option value="3">Senior Civil Judge cum RC, Central, THC</option>
                                        <option value="4">Principal Judge Family Court, Central, THC</option>
                                        <option value="5">District and Sessions Judge cum Special Judge PC Act CBI, Rouse Avenue</option>
                                        <option value="6">Chief Metropolitan Magistrate, Rouse Avenue</option>
                                        <option value="7">POLC and POIT, Rouse Avenue, New Delhi</option>
                                    </select>
                                </div>
                
                
                                <div class="form-group">
                                    <label for="sel1">*Case Type :</label>
                                    <select name="case_type" id="case_type" class="form-control">
                                        <option value="0">Select Case Type</option>
                                        <option value="81">ARB. A. (COMM.) - COMMERCIAL ARBITRATION UNDER SECTION 37 (2)</option>
                                        <option value="61">ARBTN - ARBITRATION CASES</option>
                                        <option value="74">Bail Matters</option>
                                        <option value="20">CA - CRIMINAL APPEAL</option>
                                        <option value="26">CBI</option>
                                        <option value="29">CC - CORRUPTION CASES</option>
                                        <option value="63">CLO_R - Closure Report</option>
                                        <option value="69">Contempt Petition</option>
                                        <option value="70">Counter Claim</option>
                                        <option value="41">Court Complaint</option>
                                        <option value="5">CR - COPY RIGHT</option>
                                        <option value="68">C.R. Act 1954 - Comp. and Rehab. Act 1954</option>
                                        <option value="21">Cr. Case - CRIMINAL CASE</option>
                                        <option value="22">Cr Rev - CRIMINAL REVISION</option>
                                        <option value="75">CS (COMM) - CIVIL SUIT (COMMERCIAL)</option>
                                        <option value="17">CS DJ - CIVIL SUIT FOR DJ and ADJ</option>
                                        <option value="16">CS SCJ - CIVIL SUIT FOR CIVIL JUDGE</option>
                                        <option value="24">Ct. Cases - COMPLAINT CASES</option>
                                        <option value="30">Dpt.Eq - DEPARTMENTAL ENQUIRY</option>
                                        <option value="31">Dpt. Eq CRL - DEPARTMENTAL ENQUIRY CRIMINAL</option>
                                        <option value="67">E.P. - ELECTION PETITION</option>
                                        <option value="42">ESIC - Employee State Insurance Act</option>
                                        <option value="38">EX - EXECUTION</option>
                                        <option value="39">EX CRL - EXECUTION CRIMINAL</option>
                                        <option value="45">GP - GUARDIAN CASES</option>
                                        <option value="15">Hindu Adp. - HINDU ADOPTATION MAINT. ACT</option>
                                        <option value="1">HMA - HINDU MARRIAGE ACT</option>
                                        <option value="4">HTA - HOUSE TAX APPEAL</option>
                                        <option value="59">IDA - DEVORCE ACT</option>
                                        <option value="40">Insolvency - Insolvency Case</option>
                                        <option value="11">ITA - INDUSTRIAL TRIBUNAL</option>
                                        <option value="2">LAC - LAND ACQ. ACT</option>
                                        <option value="10">LC - LABOUR COURT</option>
                                        <option value="52">LCA - Labour Court Application</option>
                                        <option value="56">L.I.D. - Labour Industrial Dispute</option>
                                        <option value="19">LIR - LABOUR/IND. TRIB. REF. MATTER</option>
                                        <option value="12">MACT - M.A.C.T.</option><option value="25">MC - MAHILA COURT</option><option value="32">MCA DJ - MISC. CIVIL APPEAL DJ and  ADJ</option><option value="34">MCA SCJ - MISC. CIVIL APPEAL FOR CJ</option><option value="64">MCD APPL - MCD APPEAL</option><option value="36">M Crl - MISC. CASES Crl</option><option value="54">M Ex - Misc. Execution</option><option value="47">MGP - Misc. Guardianship cases</option><option value="46">MHA - MENTAL HEALTH CASES</option><option value="33">Misc DJ - MISC. CASES DJ and ADJ</option><option value="66">Misc RC ARC - MISC. CASE FOR RC/ARC</option><option value="35">Misc SCJ - MISC. CASES FOR CJ</option><option value="14">ML - MUSLIM LAW DELHI WAKF BOARD</option><option value="48">MPC - Misc.Probate cases</option><option value="62">Mt. CASE - MAINTENANCE PETITION</option><option value="80">OMP (COMM.) - COMMERCIAL ARBITRATION UNDER SECTION 34</option><option value="78">OMP (E) (COMM.) - COMMERCIAL ARBITRATION UNDER SECTION 27</option><option value="76">OMP (I) (COMM.) - COMMERCIAL ARBITRATION U/S 9</option><option value="79">OMP MISC. (COMM.) - COMMERCIAL ARBITRATION UNDER SECTION  29A</option><option value="77">OMP (T) (COMM.) - COMMERCIAL ARBITRATION UNDER SECTION 14 AND 15</option><option value="53">OP - Approval</option><option value="7">PC - PROBATE/LETTER OF ADMIN</option><option value="3">PPA - PUBLIC PREMISES ACT</option><option value="28">RCA DJ - REG. CIVIL APPEAL DJ and ADJ</option><option value="8">RC ARC - RENT CONTROLlER/ADDL. R.C.</option><option value="27">RCA SCJ - REGULAR CIVIL APPEAL FOR CJ</option><option value="9">RCT ARCT - RENT CNTRL TRIBUNAL/ADDL R.C.T</option><option value="51">REC. CASES - RECEIVERSHIP CASES</option><option value="55">REVOCATION</option><option value="65">RP (Civil) - Revision Petition (Civil)</option><option value="43">RTI appeal - Right to Inf. Act appeal</option><option value="23">SC - SESSIONS CASE</option><option value="18">S. Cause - SMALL CAUSE COURT</option><option value="60">SMA - SPECIAL MARRIAGE ACT</option><option value="13">Succ. Court - SUCCESSION COURT</option><option value="44">TC - TRAFFIC CHALLAN</option><option value="6">TM - TRADE MARKS</option><option value="57">T.P. C - Transfer Application</option><option value="58">T.P. CRL - Transfer Application(CRL)</option></select>
                                </div>
                
                
                                <div class="form-group">
                                    <label for="birthday">Year:</label>
                                    <input type="text" id="tdate" name="year" class="form-control" >
                                </div>
                                <div class="form-check-inline form-group">
                
                                    <label class="form-check-label">
                                        <input type="radio" name="status" checked="" class="form-check-input" value="0">Pending
                                    </label>&nbsp;&nbsp;
                                    <label class="form-check-label">
                                        <input type="radio" name="status" class="form-check-input" value="1">Disposed
                                    </label>
                                </div>
                
                
                                <div class="form-group">
                
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </div>
                            </form>
                        
                        </div>
                    </div>
                </div>


@endsection
@section('script')


<script>
    $(document).ready(function(){


        $(document).on('click','.form-check-input',function(){
            
            if($(this).val() == '1'){
                $("#court_complex_code").parent().show();
                $("#court_code").parent().hide();
            }else{
                $("#court_complex_code").parent().hide();
                $("#court_code").parent().show();
            }



        });
    })
</script>
@endsection