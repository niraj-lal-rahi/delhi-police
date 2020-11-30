
@extends('layout.header')
@section('container')

<style>
    * {box-sizing: border-box}

    /* Set height of body and the document to 100% */
    body, html {
      height: 100%;
      margin: 0;
      font-family: Arial;
    }

    /* Style tab links */
    .tablink {
      background-color: #555;
      color: white;
      float: left;
      border: none;
      outline: none;
      cursor: pointer;
      padding: 14px 16px;
      font-size: 17px;
      width: 14%;
    }

    .tablink:hover {
      background-color: #777;
    }

    /* Style the tab content (and add height:100% for full page content) */
    .tabcontent {
      display: none;
    }
    </style>

<div class="main-content">

    <div class="page-content">

        <!-- Page-Title -->
        <div class="page-title-box">
            <div class="container-fluid">
                <div class="row align-items-center">
                    {{-- <div class="col-md-8">
                        <h4 class="page-title mb-1">Case Type  Requests:</h4>
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="javascript: void(0);">Case Type</a></li>
                        <li class="breadcrumb-item active">Requests</li>
                        </ol>
                    </div> --}}

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

                                <button class="tablink" onclick="openPage('1', this, '#337ab7')">CASE NUMBER</button>
                                <button class="tablink" onclick="openPage('2', this, '#337ab7')" id="defaultOpen">FIR NUMBER</button>
                                <button class="tablink" onclick="openPage('3', this, '#337ab7')">PARTY NAME</button>
                                <button class="tablink" onclick="openPage('4', this, '#337ab7')">Advocate </button>
                                <button class="tablink" onclick="openPage('5', this, '#337ab7')">ACT</button>
                                <button class="tablink" onclick="openPage('6', this, '#337ab7')" id="defaultOpen">CASE TYPE</button>
                                <button class="tablink" onclick="openPage('7', this, '#337ab7')">JUDGE</button>





                                <div id="1" class="tabcontent">
                                <div class="container-fluid" style="background: #f3f3f3; margin-bottom: 20px; padding: 35px;">


                                <div class="row" style="padding: 40px 0 10px 15px; text-transform: uppercase;   font-size: 22px;    color: #337ab7; font-weight: bold;">
                                Search by CASE NUMBER
                                </div>
                                <div class="row"  style="padding: 0 0 10px; 0">
                                    <div class="col-sm-4">COURT COMPLEX</div>
                                    <div class="col-sm-4">CASE TYPE</div>
                                    <div class="col-sm-2">CASE NUMBER</div>
                                    <div class="col-sm-2">YEAR</div>
                                </div>


                                <div class="row" style="padding: 0 0 10px; 0">
                                    <div class="col-sm-4">
                                    <select name="court_complex_code" style="width:90%; padding:10px; border:1px solid #D2D2D2!important; text-align:left;" id="court_complex_code" onchange="funCourtEstChange();">
                                <option value="0">Select Court Complex</option><option value="1@1,2,3,4@N">Karkardooma Court Complex</option></select>
                                </div>
                                    <div class="col-sm-4">
                                    <select name="case_type" style="width:90%; padding:10px; border:1px solid #D2D2D2!important; text-align:left;" id="case_type">
                                        <option value="0">Select Case Type</option><option value="78">ARB A (COMM) - COMMERCIAL ARBITRATION U/S 37 (2)</option><option value="58">ARBTN - ARBRITRATION CASES</option><option value="61">ARBTN CASES</option><option value="71">BAIL MATTERS</option><option value="20">CA - CRIMINAL APPEAL</option><option value="26">CBI</option><option value="29">CC - CORRUPTION CASES</option><option value="16">Civ Suit - CIVIL SUIT FOR CIVIL JUDGE</option><option value="62">CLOR - Closure Report</option><option value="21">CR Cases - CRIMINAL CASE</option><option value="22">Cr Rev - CRIMINAL REVISION</option><option value="17">CS - CIVIL SUIT FOR DJ ADJ</option><option value="73">C.S. (COMM) - CIVIL SUIT (COMMERCIAL)</option><option value="24">CT Cases - COMPLAINT CASES</option><option value="30">DPT EQ - DEPARTMENTAL ENQUIRY</option><option value="31">DPT EQ CR - DEPARTMENTAL ENQUIRY CRL</option><option value="67">E P - ELECTION PETITION</option><option value="70">ESIC - Employee State Insurance Corp</option><option value="38">EX - EXECUTION</option><option value="45">GP - Guardian Ship</option><option value="15">HINDU ADP - HINDU ADOPTATION MAINT. ACT</option><option value="1">HMA - HINDU MARRIAGE ACT</option><option value="4">HTA - HOUSE TAX APPEAL</option><option value="59">IDA - DEVORCE ACT</option><option value="2">LAC - LAND ACQ. ACT</option><option value="10">LC - LABOUR COURT</option><option value="52">LCA - Labour Court Application</option><option value="56">L I D - LABOUR INDUSTRIAL DISPUTE</option><option value="19">L I R - LABOUR/IND. TRIB REF. MATTER</option><option value="12">MACT - M.A.C.T.</option><option value="37">MACT CR - MACT CRIMINAL</option><option value="25">MC - MAHILA COURT</option><option value="32">MCA DJ - MISC. CIVIL APPEAL FOR DJ  ADJ</option><option value="34">MCA SCJ - MISC. CIVIL APPEAL FOR CJ</option><option value="64">MCD APPL - MCD APPEAL</option><option value="36">MISC CRL - MISC. CASES</option><option value="33">MISC DJ - MISC. CASES FOR DJ ADJ</option><option value="66">MISC RC ARC - MISC. CASE FOR RC/ARC</option><option value="35">MISC SCJ - MISC. CASES FOR CJ</option><option value="14">MUSLIM LAW - MUSLIM LAW DELHI WAKF BOARD</option><option value="77">OMP (COMM) - COMMERCIAL ARBITRATION U/S 34</option><option value="76">OMP (E) (COMM) - COMMERCIAL ARBITRATION U/S 27</option><option value="72">OMP (I) (COMM) - COMMERCIAL ARBITRATION U/S 9</option><option value="75">OMP MISC (COMM) - COMMERCIAL ARBITRATION U/S 29A</option><option value="74">OMP (T) (COMM) - COMMERCIAL ARBITRATION U/S 14 AND 15</option><option value="53">OP - Approval</option><option value="7">PC - PROBATE/LETTER OF ADMIN</option><option value="11">POIT - INDUSTRIAL TRIBUNAL</option><option value="3">PPA - PUBLIC PREMISES ACT</option><option value="27">RCA DJ - REG CIVIL APPEAL FOR DJ ADJ</option><option value="8">RC ARC - RENT CONTROLLER/ADDL. R.C.</option><option value="28">RCA SCJ - CIVIL APPEAL FOR CJ</option><option value="9">RCT ARCT - RENT CONT. TRIB. - ADDL. R.C.T</option><option value="51">REC CASES - RECEIVERSHIP CASES</option><option value="55">REVOCATION</option><option value="79">R P - Revision Petition</option><option value="23">SC - SESSIONS CASE</option><option value="18">S C COURT - SMALL CAUSE COURT</option><option value="57">SMA - SPECIAL MARRIAGE ACT</option><option value="13">SUCCESSION COURT</option></select>
                                </div>
                                    <div class="col-sm-2">
                                        <input type="search" id="gsearch" style="width:90%; background:#fff; border:1px solid #D2D2D2!important; color:#fff; border:none; padding:10px; text-align:left;" name="gsearch">
                                    </div>
                                        <div class="col-sm-2">
                                        <input type="search" id="gsearch" style="width:90%; background:#fff; border:1px solid #D2D2D2!important; color:#fff; border:none; padding:10px; text-align:left;" name="gsearch">
                                    </div>
                                </div>
                                <input type="submit" style="width:10%; background:#44C863; color:#fff; border:none; padding:10px; text-align:left;">
                                </div>
                                </div>

                                <div id="2" class="tabcontent">
                                <div class="container-fluid" style="background: #f3f3f3; margin-bottom: 20px; padding: 35px;">


                                <div class="row" style="padding: 40px 0 10px 15px; text-transform: uppercase;   font-size: 22px;    color: #337ab7; font-weight: bold;">
                                Search by FIR NUMBER
                                </div>
                                <div class="row"  style="padding: 0 0 10px; 0">
                                    <div class="col-sm-4">COURT COMPLEX</div>
                                    <div class="col-sm-4">POLICE STATION</div>
                                    <div class="col-sm-2">FIR NUMBER</div>
                                    <div class="col-sm-2">YEAR</div>
                                </div>


                                <div class="row" style="padding: 0 0 10px; 0">
                                    <div class="col-sm-4">
                                    <select name="court_complex_code" style="width:90%; padding:10px; border:1px solid #D2D2D2!important; text-align:left;" id="court_complex_code" onchange="funCourtEstChange();">
                                <option value="0">Select Court Complex</option><option value="1@1,2,3,4@N">Karkardooma Court Complex</option></select>
                                </div>
                                    <div class="col-sm-4">


                                        <select name="police_st_code" id="police_st_code" style="width:90%; padding:10px; border:1px solid #D2D2D2!important; text-align:left;">

                                <option value="0">Select Police Station</option><option value="107">Adarsh Nagar 107</option><option value="113">Alipur 113</option><option value="229">AMAN VIHAR 229</option><option value="232">Amar Colony 232</option><option value="39">Ambedkar Nagar 39</option><option value="69">Anand Parbat 69</option><option value="2">Anand Vihar 2</option><option value="295">Anand Vihar Railway Station 295</option><option value="120">Anti-Corruption Branch 120</option><option value="103">Ashok Vihar 103</option><option value="286">Azadpur 286</option><option value="32">Badarpur 32</option><option value="87">Bara Hindu Rao 87</option><option value="112">Bawana 112</option><option value="3">Bhajan Pura 3</option><option value="268">Bharat Nagar 268</option><option value="269">Bhaslwa Dairy 269</option><option value="227">BINDA PUR 227</option><option value="261">CAW Cell East 261</option><option value="241">CAW CELL-Nanakpura 241</option><option value="238">CAW CELL-New Delhi District 238</option><option value="262">CAW Cell North East 262</option><option value="252">CAW CELL-North West 252</option><option value="251">CAW CELL-Outer 251</option><option value="240">CAW CELL-South District 240</option><option value="239">CAW CELL-South-West District 239</option><option value="121">CBI 121</option><option value="147">CBI/ACB 147</option><option value="124">CBI/ACU-I 124</option><option value="187">CBI/ACU II 187</option><option value="125">CBI/ACU-II 125</option><option value="126">CBI/ACU-III 126</option><option value="127">CBI/ACU-IV 127</option><option value="132">CBI/ACU-IX 132</option><option value="128">CBI/ACU-V 128</option><option value="129">CBI/ACU-VI 129</option><option value="130">CBI/ACU-VII 130</option><option value="131">CBI/ACU-VIII 131</option><option value="133">CBI/ACU-X 133</option><option value="146">CBI/BS&amp;amp;FC 146</option><option value="190">CBI/CIU-E 190</option><option value="284">CBI/EOU-I 284</option><option value="242">CBI/EOU-IX 242</option><option value="234">CBI/EOU-V 234</option><option value="235">CBI/EOU-VII 235</option><option value="142">CBI/EOW-I 142</option><option value="143">CBI/EOW-II 143</option><option value="144">CBI/EOW-III 144</option><option value="145">CBI/EOW-IV 145</option><option value="148">CBI/EOW-VII 148</option><option value="194">CBI/GOW 194</option><option value="122">CBI/SCB 122</option><option value="244">CBI/SCB-1 244</option><option value="245">CBI/SCB-II 245</option><option value="243">CBI/SCR-1 243</option><option value="299">CBI/SCR-III 299</option><option value="233">CBI/SIB/EOU-V 233</option><option value="134">CBI/SIC-I 134</option><option value="135">CBI/SIC-II 135</option><option value="136">CBI/SIC-III 136</option><option value="137">CBI/SIC-IV 137</option><option value="193">CBI/SIU-I 193</option><option value="139">CBI/SIU-IX 139</option><option value="138">CBI/SIU-VIII 138</option><option value="140">CBI/SIU-X 140</option><option value="149">CBI/SIU-XII 149</option><option value="185">CBI/SIU XVII 185</option><option value="218">CBI/SPE/EOU-I 218</option><option value="189">CBI/SPE/EOU IX 189</option><option value="188">CBI/SPE/EOU VII 188</option><option value="186">CBI/SPE/SIG 186</option><option value="192">CBI/SPL/DLI 192</option><option value="123">CBI/S.T.F. 123</option><option value="141">CBI-XVII 141</option><option value="90">Chandni Chowk 90</option><option value="92">Chandni Mahal 92</option><option value="60">Chankaya Puri 60</option><option value="38">Chitranjan Park 38</option><option value="191">CIU(E)I/CBI 191</option><option value="78">Civil Lines 78</option><option value="58">Connaught Place 58</option><option value="157">Crime Branch-Central Delhi 157</option><option value="156">Crime Branch-East Delhi 156</option><option value="160">Crime Branch-N.E.Delhi 160</option><option value="155">Crime Branch-New Delhi 155</option><option value="158">Crime Branch-North Delhi 158</option><option value="153">Crime Branch -N.W.Delhi 153</option><option value="253">Crime Branch-Outer 253</option><option value="159">Crime Branch-South Delhi 159</option><option value="161">Crime Branch-S.W.Delhi 161</option><option value="154">Crime Branch-West Delhi 154</option><option value="53">Dabri 53</option><option value="91">Darya Ganj 91</option><option value="301">Dayal Pur 301</option><option value="99">DBG Road 99</option><option value="28">Defence Colony 28</option><option value="46">Delhi Cantt. 46</option><option value="195">Dhaulla Kuan 195</option><option value="14">Dilshad Garden 14</option><option value="55">Dwarka 55</option><option value="196">East of Kailash 196</option><option value="236">EOW 236</option><option value="4">Farash Bazar 4</option><option value="263">Fatehpuri Beri 263</option><option value="1">Gandhi Nagar 1</option><option value="293">Gazipur 293</option><option value="24">Geeta Colony 24</option><option value="12">Gokul Puri 12</option><option value="37">Greater Kailash 37</option><option value="291">G.T.B. Enclave 291</option><option value="260">Harash Vihar 260</option><option value="72">Hari Nagar 72</option><option value="34">Hauz Khas 34</option><option value="95">Hauz Qazi 95</option><option value="26">H. Nizamuddin 26</option><option value="63">IGI airport 63</option><option value="49">Inder Puri 49</option><option value="96">I.P. Estate 96</option><option value="52">Jafarpur Kalan 52</option><option value="279">Jafrabad 279</option><option value="282">Jagat Puri 282</option><option value="117">Jahangir Puri 117</option><option value="93">Jama Masjid 93</option><option value="231">Jamia Nagar 231</option><option value="66">Janak Puri 66</option><option value="280">Jyoti Nagar 280</option><option value="31">Kalkaji 31</option><option value="6">Kalyan Puri 6</option><option value="94">Kamla Market 94</option><option value="111">Kanjhawala 111</option><option value="182">Kanpur Nawabganj 182</option><option value="54">Kapashera 54</option><option value="230">KARAWAL NAGAR 230</option><option value="100">Karol Bagh 100</option><option value="86">Kashmere Gate 86</option><option value="104">Keshav Puram 104</option><option value="13">Khajuri Khas 13</option><option value="73">Kirti Nagar 73</option><option value="30">Kotla Mubarkpur 30</option><option value="88">Kotwali 88</option><option value="23">Krishna Nagar 23</option><option value="89">Lahori Gate 89</option><option value="25">Lajpat Nagar 25</option><option value="29">Lodhi Colony 29</option><option value="281">Madhu Vihar 281</option><option value="270">Mahendra Park 270</option><option value="64">Mahipalpur 64</option><option value="35">Malviya Nagar 35</option><option value="9">Mandawali 9</option><option value="57">Mandir Marg 57</option><option value="110">Mangol Puri 110</option><option value="80">Maurice Nagar 80</option><option value="258">Maurya Encalve 258</option><option value="50">Maya Puri 50</option><option value="20">Mayur Vihar 20</option><option value="36">Mehrauli 36</option><option value="278">Mlanwali Nagar 278</option><option value="106">Model Town 106</option><option value="70">Moti Nagar 70</option><option value="5">M.S. Park 5</option><option value="108">Mukherji Nagar 108</option><option value="98">Nabi Karim 98</option><option value="17">Nand Nagari 17</option><option value="76">Nangloi 76</option><option value="48">Naraina 48</option><option value="119">Narela Ind. Area 119</option><option value="288">Narnaud 288</option><option value="51">Nazafgarh 51</option><option value="152">NDLS 152</option><option value="22">New Ashok Nagar 22</option><option value="40">New Friends Colony 40</option><option value="10">New Usman Pur 10</option><option value="33">Okhla Indl. Area 33</option><option value="179">Outside 179</option><option value="97">Pahar Ganj 97</option><option value="62">Palam Airport 62</option><option value="21">Pandav Nagar 21</option><option value="56">Parliament Street 56</option><option value="83">Partap Nagar 83</option><option value="75">Paschim Vihar 75</option><option value="68">Patel Nagar 68</option><option value="101">Prashad Nagar 101</option><option value="118">Prashant Vihar 118</option><option value="15">Preet Vihar 15</option><option value="267">Pul Prahlad Pur 267</option><option value="74">Punjabi Bagh 74</option><option value="300">Qutub Minar Metro 300</option><option value="151">Railway Main Delhi 151</option><option value="180">Railway Sarai Rohilla 180</option><option value="102">Rajinder Nagar 102</option><option value="71">Rajouri Garden 71</option><option value="237">Rajouri Garden (Metro) 237</option><option value="277">Ranhola 277</option><option value="271">Rani Bagh 271</option><option value="276">Ranjit Nagar 276</option><option value="44">R.K. Puram 44</option><option value="115">Rohini 115</option><option value="81">Roop Nagar 81</option><option value="172">RPF(Kishan Ganj) 172</option><option value="171">RPF(NDLS) 171</option><option value="174">RPF(Nizamuddin) 174</option><option value="177">RPF(Others) 177</option><option value="173">RPF(Sakoor Basti) 173</option><option value="175">RPF(Sarai Rohilla) 175</option><option value="176">RPF(Tuglakabad) 176</option><option value="85">Sadar Bazar 85</option><option value="265">Safdarjung Enclave 265</option><option value="42">Sangam Vihar 42</option><option value="84">Sarai Rohilla 84</option><option value="105">Saraswati Vihar 105</option><option value="41">Sarita Vihar 41</option><option value="45">Sarojini Nagar 45</option><option value="11">Seelam Pur 11</option><option value="18">Seema Puri 18</option><option value="259">Shabad Diary 259</option><option value="16">Shahdara 16</option><option value="8">Shakarpur 8</option><option value="116">Shalimar Bagh 116</option><option value="302">Shastri Park 302</option><option value="170">Shastri Park Metro 170</option><option value="184">SIU I 184</option><option value="283">Sonia Vihar 283</option><option value="114">S.P. Badli 114</option><option value="150">SPECIAL CELL 150</option><option value="27">Sriniwaspuri 27</option><option value="82">Subzi Mandi 82</option><option value="109">Sultan Puri 109</option><option value="266">Sun Light Colony 266</option><option value="228">SWAROOP NAGAR 228</option><option value="59">Tilak Marg 59</option><option value="65">Tilak Nagar 65</option><option value="79">Timar Pur 79</option><option value="287">Town Hall 287</option><option value="210">Trilok Puri 210</option><option value="61">Tuglak Road 61</option><option value="77">Uttam Nagar 77</option><option value="47">Vasant Kunj 47</option><option value="285">Vasant Kunj North 285</option><option value="264">Vasant Kunj South 264</option><option value="43">Vasant Vihar 43</option><option value="257">Vijay Vihar 257</option><option value="67">Vikas Puri 67</option><option value="19">Vivek Vihar 19</option><option value="7">Welcome 7</option><option value="294">Yamuna Bank Metro 294</option><option value="211">Yamuna Vihar 211</option></select>

                                        </div>
                                    <div class="col-sm-2">
                                        <input type="search" id="gsearch" style="width:90%; background:#fff; border:1px solid #D2D2D2!important; color:#fff; border:none; padding:10px; text-align:left;" name="gsearch">
                                    </div>
                                        <div class="col-sm-2">
                                        <input type="search" id="gsearch" style="width:90%; background:#fff; border:1px solid #D2D2D2!important; color:#fff; border:none; padding:10px; text-align:left;" name="gsearch">
                                    </div>
                                </div>
                                <input type="submit" style="width:10%; background:#44C863; color:#fff; border:none; padding:10px; text-align:left;">
                                </div>
                                </div>

                                <div id="3" class="tabcontent">
                                <div class="container-fluid" style="background: #f3f3f3; margin-bottom: 20px; padding: 35px;">


                                <div class="row" style="padding: 40px 0 10px 15px; text-transform: uppercase;   font-size: 22px;    color: #337ab7; font-weight: bold;">
                                Search by PARTY NAME
                                </div>
                                <div class="row"  style="padding: 0 0 10px; 0">
                                    <div class="col-sm-4">COURT COMPLEX</div>
                                    <div class="col-sm-4">Petitioner/respondent STATION</div>
                                    <div class="col-sm-4">YEAR</div>
                                </div>


                                <div class="row" style="padding: 0 0 10px; 0">
                                    <div class="col-sm-4">
                                    <select name="court_complex_code" style="width:90%; padding:10px; border:1px solid #D2D2D2!important; text-align:left;" id="court_complex_code" onchange="funCourtEstChange();">
                                <option value="0">Select Court Complex</option><option value="1@1,2,3,4@N">Karkardooma Court Complex</option></select>
                                </div>
                                    <div class="col-sm-4">


                                        <input type="search" id="gsearch" style="width:90%; background:#fff; border:1px solid #D2D2D2!important; color:#fff; border:none; padding:10px; text-align:left;" name="gsearch">

                                        </div>
                                    <div class="col-sm-4">
                                        <input type="search" id="gsearch" style="width:90%; background:#fff; border:1px solid #D2D2D2!important; color:#fff; border:none; padding:10px; text-align:left;" name="gsearch">
                                    </div>

                                </div>
                                <input type="submit" style="width:10%; background:#44C863; color:#fff; border:none; padding:10px; text-align:left;">
                                </div>
                                </div>

                                <div id="4" class="tabcontent">
                                <div class="container-fluid" style="background: #f3f3f3; margin-bottom: 20px; padding: 35px;">


                                <div class="row" style="padding: 40px 0 10px 15px; text-transform: uppercase;   font-size: 22px;    color: #337ab7; font-weight: bold;">
                                Search by Advocate NAME
                                </div>
                                <div class="row"  style="padding: 0 0 10px; 0">
                                    <div class="col-sm-4">COURT COMPLEX</div>
                                    <div class="col-sm-4">Advocate Name</div>
                                </div>


                                <div class="row" style="padding: 0 0 10px; 0">
                                    <div class="col-sm-4">
                                    <select name="court_complex_code" style="width:90%; padding:10px; border:1px solid #D2D2D2!important; text-align:left;" id="court_complex_code" onchange="funCourtEstChange();">
                                <option value="0">Select Court Complex</option><option value="1@1,2,3,4@N">Karkardooma Court Complex</option></select>
                                </div>
                                    <div class="col-sm-4">


                                        <input type="search" id="gsearch" style="width:90%; background:#fff; border:1px solid #D2D2D2!important; color:#fff; border:none; padding:10px; text-align:left;" name="gsearch">

                                        </div>


                                </div>
                                <input type="submit" style="width:10%; background:#44C863; color:#fff; border:none; padding:10px; text-align:left;">
                                </div>
                                </div>

                                <div id="5" class="tabcontent">
                                <div class="container-fluid" style="background: #f3f3f3; margin-bottom: 20px; padding: 35px;">


                                <div class="row" style="padding: 40px 0 10px 15px; text-transform: uppercase;   font-size: 22px;    color: #337ab7; font-weight: bold;">
                                Search by Act Type
                                </div>
                                <div class="row"  style="padding: 0 0 10px; 0">
                                    <div class="col-sm-4">COURT COMPLEX</div>
                                    <div class="col-sm-4">Act type</div>
                                    <div class="col-sm-4">Under section</div>
                                </div>


                                <div class="row" style="padding: 0 0 10px; 0">
                                    <div class="col-sm-4">
                                    <select name="court_complex_code" style="width:90%; padding:10px; border:1px solid #D2D2D2!important; text-align:left;" id="court_complex_code" onchange="funCourtEstChange();">
                                <option value="0">Select Court Complex</option><option value="1@1,2,3,4@N">Karkardooma Court Complex</option></select>
                                </div>

                                    <div class="col-sm-4">
                                <select name="actcode" id="actcode" onchange="funOnActChange();" style="width:90%; padding:10px; border:1px solid #D2D2D2!important; text-align:left;">

                                <option value="0">Select Act Type</option><option value="54">A.P.M.C. Act</option><option value="89">Arbitration applications U/S 9</option><option value="1">Arbitration &amp;amp; Conciliation Act, 1996</option><option value="87">Arbitration petitions and Objections</option><option value="64">Bonus Act</option><option value="151">Cantonment Act 1924</option><option value="121">Care and Protection of Children Act-2000</option><option value="70">Central Sales Tax Act 1956</option><option value="41">Child Labour Act</option><option value="128">Child Marriage Restraint Act 1929</option><option value="136">Civil Cases</option><option value="98">Civil Procedure Code 1908</option><option value="57">Code of Criminal Procedure</option><option value="23">Companies Act</option><option value="99">Contempt of Court Act 1971</option><option value="42">Contract Labour Regulations Act</option><option value="25">Copyright Act 1957</option><option value="512">Cr. P. C.</option><option value="81">Damages</option><option value="75">Declaration and Mandatory Injuction</option><option value="93">Declaration and Partition</option><option value="129">Delhi Agricultural Produce Marketing Regulation Act 1976</option><option value="117">Delhi Chit Fund Rule 1964</option><option value="111">Delhi Development Act</option><option value="511">Delhi Excise Act, Consumer Liquor at Public Place and Create Noise 33</option><option value="510">Delhi Excise Act, Manufacturer and Import and Export  Transport Intoxicant 33 A</option><option value="120">Delhi Land Reforms Act</option><option value="28">Delhi Police Act</option><option value="152">Delhi Prevention of Trees Act 1994</option><option value="72">Delhi Prohibition of Smoking and Non Smokers Health Protection Act</option><option value="27">Delhi Public Gambling Act 1955</option><option value="2">Delhi Rent Control Act,1958</option><option value="38">Delhi Shops and Establishment Act 1954</option><option value="30">Delhi Water Board Act</option><option value="95">Departmental Enquari</option><option value="94">Departmental Enquary</option><option value="142">Design Act 1911</option><option value="91">Dissolution of firm</option><option value="139">Dissolution of Muslim Marriage Act 1939</option><option value="508">DMC</option><option value="8">DMC ACT</option><option value="33">Dowry Prohibition Act</option><option value="55">D.P.C. Act</option><option value="34">D.R.C. Act</option><option value="108">Drug and Magic Remedies(Objectionable Advertisement) Act 1954</option><option value="103">Drugs and Cosmetics Act 1940</option><option value="66">E.I. Act</option><option value="125">Electricity Act</option><option value="122">Emigration Act 1983</option><option value="49">Employees State Insurance Act</option><option value="60">Employee State Insurance Act 1948</option><option value="65">E.R. Act</option><option value="48">Essential Commodities Act 1955</option><option value="134">Explosive Act 1884</option><option value="43">Explosive Substance Act 1908</option><option value="51">Factories Act</option><option value="56">Foreigners Act 1946</option><option value="113">Foreign Exchange Regulation Act</option><option value="118">Forward Contracts Regulation Act</option><option value="106">Guardian and Wards Act, 1890</option><option value="52">Haryana Essential Services Maintenance Act</option><option value="101">Hindu Adoption &amp;amp; Maintenance Act 1956</option><option value="4">Hindu Marriage Act 1956</option><option value="140">Hindu Minority and Guardianship Act 1956</option><option value="59">I.M.C. Act</option><option value="24">Immoral Traffic Prevention Act</option><option value="21">Import &amp;amp; Export Act</option><option value="22">Income Tax Act</option><option value="16">Indian Arms Act 1959</option><option value="62">Indian Boilers Act 1923</option><option value="5">Indian Divorce Act 1869</option><option value="46">Indian Electricity Act</option><option value="69">Indian Official Secrets Act 1923</option><option value="12">Indian Penal Code</option><option value="133">Indian Post Office Act 1898</option><option value="100">Indian Telegraph Act,1855</option><option value="143">Indian Trust Act 1882</option><option value="3">Industrial Disputes Act,1947</option><option value="10">Industrial Employment Act,1946</option><option value="85">Injuctions-Both Permanent and Mandatory</option><option value="127">Insecticide Act 1968</option><option value="86">Interpleader Suits</option><option value="162">Juvenile Justice Amended Act, 2006</option><option value="11">Land Acquisition Act 1894</option><option value="157">Madras Chit Fund Act 1961</option><option value="130">Madras Public Property Malversation Act 1837</option><option value="44">Maharashtra Control of Organised Crimes Act</option><option value="78">Mandatory Injuction</option><option value="165">Medical Termination of Pregnency Act</option><option value="146">Mental Health Act 1987</option><option value="131">Mines and Minerals Regulation and Development Act</option><option value="39">Minimum Wages Act</option><option value="105">Motor Vehicle Act</option><option value="9">Motor Vehicle Act</option><option value="138">Muslim Women Protection of Rights on Divorce Act,1986</option><option value="17">Narcotic Drugs and Psychotropic Substances Act 1985</option><option value="507">NDMC</option><option value="7">NDMC ACT</option><option value="18">Negotiable Instruments Act</option><option value="58">Opium Act 1878</option><option value="84">Partition</option><option value="112">Passport Act 1967</option><option value="40">Payment of Bonus Act 1965</option><option value="67">Payment of Gratuity Act 1972</option><option value="145">Payment Of Wages Act 1936</option><option value="73">Permanent Injuction</option><option value="77">Perpetual Injuction</option><option value="76">possession</option><option value="79">Possession and permanent Injuction</option><option value="80">Possession and Recovery of Rent/Damages/Mesne profit</option><option value="90">Possession &amp;amp; Perpetual &amp;amp; Mandatory Injuction</option><option value="154">POTA</option><option value="132">PPE Act</option><option value="166">Pre-Conception and Pre-Natal Diagnostics Techniques Act</option><option value="63">Prevention of Cruelty to Animals Act 1960</option><option value="53">Prevention of Damage to Public Property Act 1984</option><option value="135">Prevention of Damage to Public Property Act 1984</option><option value="45">Prevention of Food Adultration Act</option><option value="102">Prevention of tourism Act</option><option value="116">Prize Chits and Money Circulation Scheme (Banning) Act, 1978</option><option value="514">Protection of Children From Sexual Offences Act</option><option value="124">Protection of Civil / Rights Act</option><option value="161">Protection of Women from Domestic Violence Act</option><option value="50">Provident Fund Insurance Act</option><option value="148">Provincial Insolvency Act 1920</option><option value="156">Provincial Insolvency Act 1954</option><option value="150">Provincial Small Cause Court Act 1887</option><option value="104">Public Premises Act 1971</option><option value="29">Public Premises Act 1971</option><option value="20">Punjab Excise Act 1914</option><option value="109">Railway Property(Unlawful Possession) Act 1966</option><option value="32">Railways Act 1989</option><option value="92">Recovery and Mesne Profit</option><option value="74">Recovery of Money</option><option value="82">Renditions of Accounts</option><option value="513">SARFAESI Act</option><option value="31">SC/ST Prevention of Attrocities Act 1989</option><option value="115">Securities and Exchange Board of India Act 1992</option><option value="153">Securities Contract Regulation Act 1956</option><option value="123">Seeds Control Order 1983</option><option value="149">Slum Areas Improrement and Clearance Act 1956</option><option value="6">Special Marriage Act 1954</option><option value="83">Specific performance of Contracts</option><option value="96">Specific Relief Act 1963</option><option value="155">Standards of Weights and Measures Act 1985</option><option value="97">Suit For Declaration</option><option value="88">Suits for recovery and Damages</option><option value="68">T.A.D.A. Act</option><option value="144">The Arbitration Act 1940</option><option value="119">The Central Excise Act 1944</option><option value="114">The Custom Act</option><option value="159">The Delhi Entertainment and Billing Tax Act 1996</option><option value="107">The Indian Succession Act 1925</option><option value="36">The Prevention of Corruption Act 1988</option><option value="126">The Seeds Act 1966</option><option value="37">The Standards of Weight and Measurement Act 1976</option><option value="26">T.M.M. Act</option><option value="110">TRADE AND MERCHANDISE ACT 1958</option><option value="141">Trade Mark Act 1999</option><option value="158">Trade Marks Act 1958</option><option value="137">Unlawful Activities (Prevention) Act 1967</option><option value="147">WAKF Act 1954</option><option value="35">Water Prevention and Control of Pollution Act 1974</option><option value="47">West Bengal Defacement of Public Property Act 1976</option><option value="71">Wild Life Act</option></select>	</div>


                                <div class="col-sm-4">


                                        <input type="search" id="gsearch" style="width:90%; background:#fff; border:1px solid #D2D2D2!important; color:#fff; border:none; padding:10px; text-align:left;" name="gsearch">

                                        </div>
                                </div>
                                <input type="submit" style="width:10%; background:#44C863; color:#fff; border:none; padding:10px; text-align:left;">
                                </div>
                                </div>

                                <div id="6" class="tabcontent">
                                <div class="container-fluid" style="background: #f3f3f3; margin-bottom: 20px; padding: 35px;">


                                <div class="row" style="padding: 40px 0 10px 15px; text-transform: uppercase;   font-size: 22px;    color: #337ab7; font-weight: bold;">
                                Search by CASE TYPE
                                </div>
                                <div class="row"  style="padding: 0 0 10px; 0">
                                    <div class="col-sm-4">COURT COMPLEX</div>
                                    <div class="col-sm-4">CASE TYPE</div>
                                    <div class="col-sm-4">Year</div>
                                </div>


                                <div class="row" style="padding: 0 0 10px; 0">
                                    <div class="col-sm-4">
                                    <select name="court_complex_code" style="width:90%; padding:10px; border:1px solid #D2D2D2!important; text-align:left;" id="court_complex_code" onchange="funCourtEstChange();">
                                <option value="0">Select Court Complex</option><option value="1@1,2,3,4@N">Karkardooma Court Complex</option></select>
                                </div>

                                    <div class="col-sm-4">
                                <select name="actcode" id="actcode" onchange="funOnActChange();" style="width:90%; padding:10px; border:1px solid #D2D2D2!important; text-align:left;">


                                        <option value="0">Select Case Type</option><option value="78">ARB A (COMM) - COMMERCIAL ARBITRATION U/S 37 (2)</option><option value="58">ARBTN - ARBRITRATION CASES</option><option value="61">ARBTN CASES</option><option value="71">BAIL MATTERS</option><option value="20">CA - CRIMINAL APPEAL</option><option value="26">CBI</option><option value="29">CC - CORRUPTION CASES</option><option value="16">Civ Suit - CIVIL SUIT FOR CIVIL JUDGE</option><option value="62">CLOR - Closure Report</option><option value="21">CR Cases - CRIMINAL CASE</option><option value="22">Cr Rev - CRIMINAL REVISION</option><option value="17">CS - CIVIL SUIT FOR DJ ADJ</option><option value="73">C.S. (COMM) - CIVIL SUIT (COMMERCIAL)</option><option value="24">CT Cases - COMPLAINT CASES</option><option value="30">DPT EQ - DEPARTMENTAL ENQUIRY</option><option value="31">DPT EQ CR - DEPARTMENTAL ENQUIRY CRL</option><option value="67">E P - ELECTION PETITION</option><option value="70">ESIC - Employee State Insurance Corp</option><option value="38">EX - EXECUTION</option><option value="45">GP - Guardian Ship</option><option value="15">HINDU ADP - HINDU ADOPTATION MAINT. ACT</option><option value="1">HMA - HINDU MARRIAGE ACT</option><option value="4">HTA - HOUSE TAX APPEAL</option><option value="59">IDA - DEVORCE ACT</option><option value="2">LAC - LAND ACQ. ACT</option><option value="10">LC - LABOUR COURT</option><option value="52">LCA - Labour Court Application</option><option value="56">L I D - LABOUR INDUSTRIAL DISPUTE</option><option value="19">L I R - LABOUR/IND. TRIB REF. MATTER</option><option value="12">MACT - M.A.C.T.</option><option value="37">MACT CR - MACT CRIMINAL</option><option value="25">MC - MAHILA COURT</option><option value="32">MCA DJ - MISC. CIVIL APPEAL FOR DJ  ADJ</option><option value="34">MCA SCJ - MISC. CIVIL APPEAL FOR CJ</option><option value="64">MCD APPL - MCD APPEAL</option><option value="36">MISC CRL - MISC. CASES</option><option value="33">MISC DJ - MISC. CASES FOR DJ ADJ</option><option value="66">MISC RC ARC - MISC. CASE FOR RC/ARC</option><option value="35">MISC SCJ - MISC. CASES FOR CJ</option><option value="14">MUSLIM LAW - MUSLIM LAW DELHI WAKF BOARD</option><option value="77">OMP (COMM) - COMMERCIAL ARBITRATION U/S 34</option><option value="76">OMP (E) (COMM) - COMMERCIAL ARBITRATION U/S 27</option><option value="72">OMP (I) (COMM) - COMMERCIAL ARBITRATION U/S 9</option><option value="75">OMP MISC (COMM) - COMMERCIAL ARBITRATION U/S 29A</option><option value="74">OMP (T) (COMM) - COMMERCIAL ARBITRATION U/S 14 AND 15</option><option value="53">OP - Approval</option><option value="7">PC - PROBATE/LETTER OF ADMIN</option><option value="11">POIT - INDUSTRIAL TRIBUNAL</option><option value="3">PPA - PUBLIC PREMISES ACT</option><option value="27">RCA DJ - REG CIVIL APPEAL FOR DJ ADJ</option><option value="8">RC ARC - RENT CONTROLLER/ADDL. R.C.</option><option value="28">RCA SCJ - CIVIL APPEAL FOR CJ</option><option value="9">RCT ARCT - RENT CONT. TRIB. - ADDL. R.C.T</option><option value="51">REC CASES - RECEIVERSHIP CASES</option><option value="55">REVOCATION</option><option value="79">R P - Revision Petition</option><option value="23">SC - SESSIONS CASE</option><option value="18">S C COURT - SMALL CAUSE COURT</option><option value="57">SMA - SPECIAL MARRIAGE ACT</option><option value="13">SUCCESSION COURT</option></select>
                                </div>
                                <div class="col-sm-4">


                                        <input type="search" id="gsearch" style="width:90%; background:#fff; border:1px solid #D2D2D2!important; color:#fff; border:none; padding:10px; text-align:left;" name="gsearch">

                                        </div>
                                </div>
                                <input type="submit" style="width:10%; background:#44C863; color:#fff; border:none; padding:10px; text-align:left;">
                                </div>
                                </div>

                                <div id="7" class="tabcontent">
                                <div class="container-fluid" style="background: #f3f3f3; margin-bottom: 20px; padding: 35px;">


                                <div class="row" style="padding: 40px 0 10px 15px; text-transform: uppercase;   font-size: 22px;    color: #337ab7; font-weight: bold;">
                                Search by JUDGE NAME
                                </div>
                                <div class="row"  style="padding: 0 0 10px; 0">
                                    <div class="col-sm-4">COURT COMPLEX</div>
                                    <div class="col-sm-4">Judge Name</div>
                                    <div class="col-sm-4">Date</div>
                                </div>


                                <div class="row" style="padding: 0 0 10px; 0">
                                    <div class="col-sm-4">
                                    <select name="court_complex_code" style="width:90%; padding:10px; border:1px solid #D2D2D2!important; text-align:left;" id="court_complex_code" onchange="funCourtEstChange();">
                                <option value="0">Select Court Complex</option><option value="1@1,2,3,4@N">Karkardooma Court Complex</option></select>
                                </div>
                                    <div class="col-sm-4">


                                        <input type="search" id="gsearch" style="width:90%; background:#fff; border:1px solid #D2D2D2!important; color:#fff; border:none; padding:10px; text-align:left;" name="gsearch">

                                        </div>
                                    <div class="col-sm-4">
                                        <input type="date" id="gsearch" style="width:90%; background:#fff; border:1px solid #D2D2D2!important; color:#fff; border:none; padding:10px; text-align:left;" name="gsearch">
                                    </div>

                                </div>
                                <input type="submit" style="width:10%; background:#44C863; color:#fff; border:none; padding:10px; text-align:left;">
                                </div>
                                </div>











                                <script>
                                function openPage(pageName,elmnt,color) {
                                var i, tabcontent, tablinks;
                                tabcontent = document.getElementsByClassName("tabcontent");
                                for (i = 0; i < tabcontent.length; i++) {
                                    tabcontent[i].style.display = "none";
                                }
                                tablinks = document.getElementsByClassName("tablink");
                                for (i = 0; i < tablinks.length; i++) {
                                    tablinks[i].style.backgroundColor = "";
                                }
                                document.getElementById(pageName).style.display = "block";
                                elmnt.style.backgroundColor = color;
                                }

                                // Get the element with id="defaultOpen" and click on it
                                document.getElementById("defaultOpen").click();
                                </script>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

@endsection
