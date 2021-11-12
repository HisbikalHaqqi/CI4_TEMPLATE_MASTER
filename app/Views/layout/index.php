<?php 
if(isset($_SERVER['HTTP_USER_AGENT'])){
    if(strpos($_SERVER['HTTP_USER_AGENT'],'MSIE 6')!==FALSE || strpos($_SERVER['HTTP_USER_AGENT'],'MSIE 7')!==FALSE || strpos($_SERVER['HTTP_USER_AGENT'],'MSIE 8')!==FALSE){
		echo view('errors/error_browser');
		die();
	}
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link href="<?= base_url('assets/css/my_style.css');?>" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/fontawesome.min.css">
    <link rel="stylesheet" href="<?= base_url('assets/css/my_style.css');?>">
    <script type="text/javascript" src="<?= base_url('assets/vendor/swal/swal.min.js');?>"></script>
    <script type="text/javascript" src="<?= base_url('assets/vendor/jquery/jquery.min.js');?>"></script>
    <script type="text/javascript" src="<?= base_url('assets/vendor/jquery/jquery.form.js');?>"></script> 

    <!-- highchart -->
    <script src="https://code.highcharts.com/highcharts.js"></script>
    <script src="https://code.highcharts.com/modules/data.js"></script>
    <script src="https://code.highcharts.com/modules/series-label.js"></script>
    <script src="https://code.highcharts.com/modules/exporting.js"></script>
    <script src="https://code.highcharts.com/modules/export-data.js"></script>
    <script src="https://code.highcharts.com/modules/accessibility.js"></script>
    <!-- highchart -->

    <!-- Datatable -->
    <script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.3/js/dataTables.bootstrap5.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.3/css/dataTables.bootstrap5.min.css">
    <!-- Datatable -->

</head>
<body>
    <div id="ajax-loader"></div>
    <div class="wrapper">
        <!-- top navigation -->
        <nav class="navigation">
            <ul>
                <li>
                    <div class="navigation-brand">
                        <i class="fas fa-snowflake fa-3x"></i>
                        <p>BRIPERMENT</p>
                    </div>
                </li>
                <li>
                    <div>
                    </div>
                    <div class="navigation-search">
                        <div class="input-search">
                            <i class="fas fa-search ml-3" ></i>
                            <?php
                                $search = [
                                    'placeholder' => 'Kamu cari apa ? ',
                                    'class'       => 'form-text',
                                    'id'          => 'form-search',
                                    'name'        => 'form-search',
                                    'autocomplete' => 'off',
                                ];
                                echo form_input($search);
                            ?>
                        </div>
                    </div>
                </li>
                <li>
                    <div class="notif-container-wrapper">
                        <div class="icon-notif">
                            <i class="fas fa-bell"></i>
                            <span class="badge-notif">10</span>    
                        </div>
                        <div class="notif-container-item">
                            <p>Notification</p>
                            <div class="notif-wrapper">
                                <i class="fas fa-arrow-circle-down fa-2x fa-notif" style="color:#7978E9"></i>
                                <div class="notif-desc">
                                    <h6>Pengajuan Realisasi</h6>
                                    <h6 class="text-custom-gray">ID Surat : 21344364674646</h6>
                                    <h6 class="text-custom-gray text-sm">02 Menit yang lalu</h6>
                                </div>
                            </div>
                            <div class="notif-wrapper">
                                <i class="fas fa-arrow-circle-down fa-2x fa-notif" style="color:#F3797E"></i>
                                <div class="notif-desc">
                                    <h6>Approval KPI</h6>
                                    <h6 class="text-custom-gray">ID Surat : 21344364674646</h6>
                                    <h6 class="text-custom-gray text-sm">02 Menit yang lalu</h6>
                                </div>
                            </div>
                            <div class="notif-wrapper">
                                <i class="fas fa-arrow-circle-down fa-2x fa-notif" style="color:#4747A1"></i>
                                <div class="notif-desc">
                                    <h6>Approval Validasi</h6>
                                    <h6 class="text-custom-gray">ID Surat : 21344364674646</h6>
                                    <h6 class="text-custom-gray text-sm">02 Menit yang lalu</h6>
                                </div>
                            </div>
                            <center>
                                <a href="#" class="link">Tampilkan Semua</a>
                            </center>
                        </div>
                    </div>
                </li>
                <li>
                    <div class="profile-container-wrapper">
                        <img src="https://i.mydramalist.com/x1lqN_5_c.jpg">
                        <p>Hisbikal Haqqi Muflihin</p>
                    </div>
                </li>
            </ul>
        </nav>
        <!-- top navigation -->
        
        <div class="row">
            <div class="col-lg-2">
                <!-- sidebar -->
                <aside class="custom-sidebar">
                    <div class="profile-sidebar">
                        <img src="https://i.mydramalist.com/x1lqN_5_c.jpg">
                        <h4>Kim Jihyo</h4>
                        <h5>9993434</h5>
                        <h6>Corporate Pusat</h6>
                    </div>
                    <div class="menu">
                        <ul>
                            <li class="menu-link menu-active"><i class="fas fa-snowflake"></i> Dashboard</li>
                            <li class="menu-link parent">
                                <div class="wrapper-child" data-target="user">
                                    <i class="fas fa-cogs"></i> Management <i class="fas fa-chevron-right arrow-child"></i>
                                </div>
                                <ul class="wrapper-child-item-user" id="item-child">
                                    <a href=""><li><i class="fas fa-users"></i> User </li></a>
                                    <li><i class="fas fa-tag"></i> Role</li>
                                    <li><i class="fas fa-user-tag"></i> User Role</li>
                                    <li><i class="fas fa-life-ring"></i> Privillage</li>
                                </ul>
                            </li>
                            <li class="menu-link parent">
                                <div class="wrapper-child" data-target="management">
                                    <i class="fas fa-cogs"></i> Management <i class="fas fa-chevron-right arrow-child"></i>
                                </div>
                                <ul class="wrapper-child-item-management" id="item-child">
                                    <a href=""><li><i class="fas fa-users"></i> User </li></a>
                                    <li><i class="fas fa-tag"></i> Role</li>
                                    <li><i class="fas fa-user-tag"></i> User Role</li>
                                    <li><i class="fas fa-life-ring"></i> Privillage</li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                </aside>
                <!-- sidebar -->
            </div>
            <div class="col-lg-10">
                <main>
                    <h4>Selamat Datang, Jihyo</h4>
                    <p>Selamat beraktivitas, jalani hari mu dengan penuh senyuman</p>
                    <div class="row">
                        <div class="col-lg-3">
                            <div class="card-box bg-custom-blue">
                                <h6>Earn Money</h6>
                                <h3>Rp. 15.000,000</h3>
                                <p>10.00 % ( last day )</p>
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <div class="card-box bg-custom-orange">
                                <h6>Earn Money</h6>
                                <h3>Rp. 15.000,000</h3>
                                <p>10.00 % ( last day )</p>
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <div class="card-box bg-custom-red">
                                <h6>Earn Money</h6>
                                <h3>Rp. 15.000,000</h3>
                                <p>10.00 % ( last day )</p>
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <div class="card-box bg-custom-purple">
                                <h6>Earn Money</h6>
                                <h3>Rp. 15.000,000</h3>
                                <p>10.00 % ( last day )</p>
                            </div>
                        </div>
                    </div>
                    <div class="mt-xl-5"></div>
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="card-content p-3">
                                <h5>Grafik KPI Per Tahun</h5>
                                <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Impedit illum cupiditate quod.</p>
                                
                                <div class="row">
                                    <div class="col-lg-3">
                                        <p class="text-custom-gray">Order Value</p>
                                        <h5 class="text-custom-indigo fs-3">12.4 K</h5>
                                    </div>
                                    <div class="col-lg-3">
                                        <p class="text-custom-gray">Orders</p>
                                        <h5 class="text-custom-indigo fs-3">11.4 K</h5>
                                    </div>
                                    <div class="col-lg-3">
                                        <p class="text-custom-gray">Users</p>
                                        <h5 class="text-custom-indigo fs-3">12.4 K</h5>
                                    </div>
                                    <div class="col-lg-3">
                                        <p class="text-custom-gray">Download</p>
                                        <h5 class="text-custom-indigo fs-3">12.4 K</h5>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-12">
                                        <figure class="highcharts-figure">
                                            <div id="container-line"></div>
                                            <p class="highcharts-description">
                                            </p>
                                        </figure>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="card-content p-3">
                                <h5>Grafik KPI Per Triwulan</h5>
                                <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Impedit illum cupiditate quod, nu.</p>
                                
                                <div class="row">
                                    <div class="col-lg-12">
                                        <figure class="highcharts-figure">
                                            <div id="container-bar"></div>
                                            <p class="highcharts-description"></p>
                                        </figure>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="mt-xl-5"></div>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="card-content p-3">
                            <h4>Data User</h4>
                            <table id="example" class="table table-striped table-responsive" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Position</th>
                                        <th>Office</th>
                                        <th>Age</th>
                                        <th>Start date</th>
                                        <th>Salary</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>Tiger Nixon</td>
                                        <td>System Architect</td>
                                        <td>Edinburgh</td>
                                        <td>61</td>
                                        <td>2011/04/25</td>
                                        <td>$320,800</td>
                                    </tr>
                                    <tr>
                                        <td>Garrett Winters</td>
                                        <td>Accountant</td>
                                        <td>Tokyo</td>
                                        <td>63</td>
                                        <td>2011/07/25</td>
                                        <td>$170,750</td>
                                    </tr>
                                    <tr>
                                        <td>Ashton Cox</td>
                                        <td>Junior Technical Author</td>
                                        <td>San Francisco</td>
                                        <td>66</td>
                                        <td>2009/01/12</td>
                                        <td>$86,000</td>
                                    </tr>
                                    <tr>
                                        <td>Cedric Kelly</td>
                                        <td>Senior Javascript Developer</td>
                                        <td>Edinburgh</td>
                                        <td>22</td>
                                        <td>2012/03/29</td>
                                        <td>$433,060</td>
                                    </tr>
                                    <tr>
                                        <td>Airi Satou</td>
                                        <td>Accountant</td>
                                        <td>Tokyo</td>
                                        <td>33</td>
                                        <td>2008/11/28</td>
                                        <td>$162,700</td>
                                    </tr>
                                    <tr>
                                        <td>Brielle Williamson</td>
                                        <td>Integration Specialist</td>
                                        <td>New York</td>
                                        <td>61</td>
                                        <td>2012/12/02</td>
                                        <td>$372,000</td>
                                    </tr>
                                    <tr>
                                        <td>Herrod Chandler</td>
                                        <td>Sales Assistant</td>
                                        <td>San Francisco</td>
                                        <td>59</td>
                                        <td>2012/08/06</td>
                                        <td>$137,500</td>
                                    </tr>
                                    <tr>
                                        <td>Rhona Davidson</td>
                                        <td>Integration Specialist</td>
                                        <td>Tokyo</td>
                                        <td>55</td>
                                        <td>2010/10/14</td>
                                        <td>$327,900</td>
                                    </tr>
                                    <tr>
                                        <td>Colleen Hurst</td>
                                        <td>Javascript Developer</td>
                                        <td>San Francisco</td>
                                        <td>39</td>
                                        <td>2009/09/15</td>
                                        <td>$205,500</td>
                                    </tr>
                                    <tr>
                                        <td>Sonya Frost</td>
                                        <td>Software Engineer</td>
                                        <td>Edinburgh</td>
                                        <td>23</td>
                                        <td>2008/12/13</td>
                                        <td>$103,600</td>
                                    </tr>
                                    <tr>
                                        <td>Jena Gaines</td>
                                        <td>Office Manager</td>
                                        <td>London</td>
                                        <td>30</td>
                                        <td>2008/12/19</td>
                                        <td>$90,560</td>
                                    </tr>
                                    <tr>
                                        <td>Quinn Flynn</td>
                                        <td>Support Lead</td>
                                        <td>Edinburgh</td>
                                        <td>22</td>
                                        <td>2013/03/03</td>
                                        <td>$342,000</td>
                                    </tr>
                                    <tr>
                                        <td>Charde Marshall</td>
                                        <td>Regional Director</td>
                                        <td>San Francisco</td>
                                        <td>36</td>
                                        <td>2008/10/16</td>
                                        <td>$470,600</td>
                                    </tr>
                                    <tr>
                                        <td>Haley Kennedy</td>
                                        <td>Senior Marketing Designer</td>
                                        <td>London</td>
                                        <td>43</td>
                                        <td>2012/12/18</td>
                                        <td>$313,500</td>
                                    </tr>
                                    <tr>
                                        <td>Tatyana Fitzpatrick</td>
                                        <td>Regional Director</td>
                                        <td>London</td>
                                        <td>19</td>
                                        <td>2010/03/17</td>
                                        <td>$385,750</td>
                                    </tr>
                                    <tr>
                                        <td>Michael Silva</td>
                                        <td>Marketing Designer</td>
                                        <td>London</td>
                                        <td>66</td>
                                        <td>2012/11/27</td>
                                        <td>$198,500</td>
                                    </tr>
                                    <tr>
                                        <td>Paul Byrd</td>
                                        <td>Chief Financial Officer (CFO)</td>
                                        <td>New York</td>
                                        <td>64</td>
                                        <td>2010/06/09</td>
                                        <td>$725,000</td>
                                    </tr>
                                    <tr>
                                        <td>Gloria Little</td>
                                        <td>Systems Administrator</td>
                                        <td>New York</td>
                                        <td>59</td>
                                        <td>2009/04/10</td>
                                        <td>$237,500</td>
                                    </tr>
                                    <tr>
                                        <td>Bradley Greer</td>
                                        <td>Software Engineer</td>
                                        <td>London</td>
                                        <td>41</td>
                                        <td>2012/10/13</td>
                                        <td>$132,000</td>
                                    </tr>
                                    <tr>
                                        <td>Dai Rios</td>
                                        <td>Personnel Lead</td>
                                        <td>Edinburgh</td>
                                        <td>35</td>
                                        <td>2012/09/26</td>
                                        <td>$217,500</td>
                                    </tr>
                                    <tr>
                                        <td>Jenette Caldwell</td>
                                        <td>Development Lead</td>
                                        <td>New York</td>
                                        <td>30</td>
                                        <td>2011/09/03</td>
                                        <td>$345,000</td>
                                    </tr>
                                    <tr>
                                        <td>Yuri Berry</td>
                                        <td>Chief Marketing Officer (CMO)</td>
                                        <td>New York</td>
                                        <td>40</td>
                                        <td>2009/06/25</td>
                                        <td>$675,000</td>
                                    </tr>
                                    <tr>
                                        <td>Caesar Vance</td>
                                        <td>Pre-Sales Support</td>
                                        <td>New York</td>
                                        <td>21</td>
                                        <td>2011/12/12</td>
                                        <td>$106,450</td>
                                    </tr>
                                    <tr>
                                        <td>Doris Wilder</td>
                                        <td>Sales Assistant</td>
                                        <td>Sydney</td>
                                        <td>23</td>
                                        <td>2010/09/20</td>
                                        <td>$85,600</td>
                                    </tr>
                                    <tr>
                                        <td>Angelica Ramos</td>
                                        <td>Chief Executive Officer (CEO)</td>
                                        <td>London</td>
                                        <td>47</td>
                                        <td>2009/10/09</td>
                                        <td>$1,200,000</td>
                                    </tr>
                                    <tr>
                                        <td>Gavin Joyce</td>
                                        <td>Developer</td>
                                        <td>Edinburgh</td>
                                        <td>42</td>
                                        <td>2010/12/22</td>
                                        <td>$92,575</td>
                                    </tr>
                                    <tr>
                                        <td>Jennifer Chang</td>
                                        <td>Regional Director</td>
                                        <td>Singapore</td>
                                        <td>28</td>
                                        <td>2010/11/14</td>
                                        <td>$357,650</td>
                                    </tr>
                                    <tr>
                                        <td>Brenden Wagner</td>
                                        <td>Software Engineer</td>
                                        <td>San Francisco</td>
                                        <td>28</td>
                                        <td>2011/06/07</td>
                                        <td>$206,850</td>
                                    </tr>
                                    <tr>
                                        <td>Fiona Green</td>
                                        <td>Chief Operating Officer (COO)</td>
                                        <td>San Francisco</td>
                                        <td>48</td>
                                        <td>2010/03/11</td>
                                        <td>$850,000</td>
                                    </tr>
                                    <tr>
                                        <td>Shou Itou</td>
                                        <td>Regional Marketing</td>
                                        <td>Tokyo</td>
                                        <td>20</td>
                                        <td>2011/08/14</td>
                                        <td>$163,000</td>
                                    </tr>
                                    <tr>
                                        <td>Michelle House</td>
                                        <td>Integration Specialist</td>
                                        <td>Sydney</td>
                                        <td>37</td>
                                        <td>2011/06/02</td>
                                        <td>$95,400</td>
                                    </tr>
                                    <tr>
                                        <td>Suki Burks</td>
                                        <td>Developer</td>
                                        <td>London</td>
                                        <td>53</td>
                                        <td>2009/10/22</td>
                                        <td>$114,500</td>
                                    </tr>
                                    <tr>
                                        <td>Prescott Bartlett</td>
                                        <td>Technical Author</td>
                                        <td>London</td>
                                        <td>27</td>
                                        <td>2011/05/07</td>
                                        <td>$145,000</td>
                                    </tr>
                                    <tr>
                                        <td>Gavin Cortez</td>
                                        <td>Team Leader</td>
                                        <td>San Francisco</td>
                                        <td>22</td>
                                        <td>2008/10/26</td>
                                        <td>$235,500</td>
                                    </tr>
                                    <tr>
                                        <td>Martena Mccray</td>
                                        <td>Post-Sales support</td>
                                        <td>Edinburgh</td>
                                        <td>46</td>
                                        <td>2011/03/09</td>
                                        <td>$324,050</td>
                                    </tr>
                                    <tr>
                                        <td>Unity Butler</td>
                                        <td>Marketing Designer</td>
                                        <td>San Francisco</td>
                                        <td>47</td>
                                        <td>2009/12/09</td>
                                        <td>$85,675</td>
                                    </tr>
                                    <tr>
                                        <td>Howard Hatfield</td>
                                        <td>Office Manager</td>
                                        <td>San Francisco</td>
                                        <td>51</td>
                                        <td>2008/12/16</td>
                                        <td>$164,500</td>
                                    </tr>
                                    <tr>
                                        <td>Hope Fuentes</td>
                                        <td>Secretary</td>
                                        <td>San Francisco</td>
                                        <td>41</td>
                                        <td>2010/02/12</td>
                                        <td>$109,850</td>
                                    </tr>
                                    <tr>
                                        <td>Vivian Harrell</td>
                                        <td>Financial Controller</td>
                                        <td>San Francisco</td>
                                        <td>62</td>
                                        <td>2009/02/14</td>
                                        <td>$452,500</td>
                                    </tr>
                                    <tr>
                                        <td>Timothy Mooney</td>
                                        <td>Office Manager</td>
                                        <td>London</td>
                                        <td>37</td>
                                        <td>2008/12/11</td>
                                        <td>$136,200</td>
                                    </tr>
                                    <tr>
                                        <td>Jackson Bradshaw</td>
                                        <td>Director</td>
                                        <td>New York</td>
                                        <td>65</td>
                                        <td>2008/09/26</td>
                                        <td>$645,750</td>
                                    </tr>
                                    <tr>
                                        <td>Olivia Liang</td>
                                        <td>Support Engineer</td>
                                        <td>Singapore</td>
                                        <td>64</td>
                                        <td>2011/02/03</td>
                                        <td>$234,500</td>
                                    </tr>
                                    <tr>
                                        <td>Bruno Nash</td>
                                        <td>Software Engineer</td>
                                        <td>London</td>
                                        <td>38</td>
                                        <td>2011/05/03</td>
                                        <td>$163,500</td>
                                    </tr>
                                    <tr>
                                        <td>Sakura Yamamoto</td>
                                        <td>Support Engineer</td>
                                        <td>Tokyo</td>
                                        <td>37</td>
                                        <td>2009/08/19</td>
                                        <td>$139,575</td>
                                    </tr>
                                    <tr>
                                        <td>Thor Walton</td>
                                        <td>Developer</td>
                                        <td>New York</td>
                                        <td>61</td>
                                        <td>2013/08/11</td>
                                        <td>$98,540</td>
                                    </tr>
                                    <tr>
                                        <td>Finn Camacho</td>
                                        <td>Support Engineer</td>
                                        <td>San Francisco</td>
                                        <td>47</td>
                                        <td>2009/07/07</td>
                                        <td>$87,500</td>
                                    </tr>
                                    <tr>
                                        <td>Serge Baldwin</td>
                                        <td>Data Coordinator</td>
                                        <td>Singapore</td>
                                        <td>64</td>
                                        <td>2012/04/09</td>
                                        <td>$138,575</td>
                                    </tr>
                                    <tr>
                                        <td>Zenaida Frank</td>
                                        <td>Software Engineer</td>
                                        <td>New York</td>
                                        <td>63</td>
                                        <td>2010/01/04</td>
                                        <td>$125,250</td>
                                    </tr>
                                    <tr>
                                        <td>Zorita Serrano</td>
                                        <td>Software Engineer</td>
                                        <td>San Francisco</td>
                                        <td>56</td>
                                        <td>2012/06/01</td>
                                        <td>$115,000</td>
                                    </tr>
                                    <tr>
                                        <td>Jennifer Acosta</td>
                                        <td>Junior Javascript Developer</td>
                                        <td>Edinburgh</td>
                                        <td>43</td>
                                        <td>2013/02/01</td>
                                        <td>$75,650</td>
                                    </tr>
                                    <tr>
                                        <td>Cara Stevens</td>
                                        <td>Sales Assistant</td>
                                        <td>New York</td>
                                        <td>46</td>
                                        <td>2011/12/06</td>
                                        <td>$145,600</td>
                                    </tr>
                                    <tr>
                                        <td>Hermione Butler</td>
                                        <td>Regional Director</td>
                                        <td>London</td>
                                        <td>47</td>
                                        <td>2011/03/21</td>
                                        <td>$356,250</td>
                                    </tr>
                                    <tr>
                                        <td>Lael Greer</td>
                                        <td>Systems Administrator</td>
                                        <td>London</td>
                                        <td>21</td>
                                        <td>2009/02/27</td>
                                        <td>$103,500</td>
                                    </tr>
                                    <tr>
                                        <td>Jonas Alexander</td>
                                        <td>Developer</td>
                                        <td>San Francisco</td>
                                        <td>30</td>
                                        <td>2010/07/14</td>
                                        <td>$86,500</td>
                                    </tr>
                                    <tr>
                                        <td>Shad Decker</td>
                                        <td>Regional Director</td>
                                        <td>Edinburgh</td>
                                        <td>51</td>
                                        <td>2008/11/13</td>
                                        <td>$183,000</td>
                                    </tr>
                                    <tr>
                                        <td>Michael Bruce</td>
                                        <td>Javascript Developer</td>
                                        <td>Singapore</td>
                                        <td>29</td>
                                        <td>2011/06/27</td>
                                        <td>$183,000</td>
                                    </tr>
                                    <tr>
                                        <td>Donna Snider</td>
                                        <td>Customer Support</td>
                                        <td>New York</td>
                                        <td>27</td>
                                        <td>2011/01/25</td>
                                        <td>$112,000</td>
                                    </tr>
                                </tbody>
                            </table>
                            </div>
                        </div>
                    </div>
                </main>
            </div>
        </div>
    </div>
</body>
<script>
    /* app */
    $(document).ready(function(){
       $('.wrapper-child').on('click',function(){
           const target = $(this).attr('data-target');
           $('.wrapper-child-item-'+target).toggleClass('active');
        });
    });
    /* app */
    
    /**
     * High chart
     */
    Highcharts.addEvent(Highcharts.Point, 'click', function () {
        if (this.series.options.className.indexOf('popup-on-click') !== -1) {
            const chart = this.series.chart;
            const date = Highcharts.dateFormat('%A, %b %e, %Y', this.x);
            const text = `<b>${date}</b><br/>${this.y} ${this.series.name}`;

            const anchorX = this.plotX + this.series.xAxis.pos;
            const anchorY = this.plotY + this.series.yAxis.pos;
            const align = anchorX < chart.chartWidth - 200 ? 'left' : 'right';
            const x = align === 'left' ? anchorX + 10 : anchorX - 10;
            const y = anchorY - 30;
            if (!chart.sticky) {
                chart.sticky = chart.renderer
                    .label(text, x, y, 'callout',  anchorX, anchorY)
                    .attr({
                        align,
                        fill: 'rgba(0, 0, 0, 0.75)',
                        padding: 10,
                        zIndex: 7 // Above series, below tooltip
                    })
                    .css({
                        color: 'white'
                    })
                    .on('click', function () {
                        chart.sticky = chart.sticky.destroy();
                    })
                    .add();
            } else {
                chart.sticky
                    .attr({ align, text })
                    .animate({ anchorX, anchorY, x, y }, { duration: 250 });
            }
        }
    });


    // line
    Highcharts.chart('container-line', {

        chart: {
            scrollablePlotArea: {
                minWidth: 700
            }
        },

        data: {
            csvURL: 'https://cdn.jsdelivr.net/gh/highcharts/highcharts@v7.0.0/samples/data/analytics.csv',
            beforeParse: function (csv) {
                return csv.replace(/\n\n/g, '\n');
            }
        },

        title: {
            text: 'Daily sessions at www.highcharts.com'
        },

        subtitle: {
            text: 'Source: Google Analytics'
        },

        xAxis: {
            tickInterval: 7 * 24 * 3600 * 1000, // one week
            tickWidth: 0,
            gridLineWidth: 1,
            labels: {
                align: 'left',
                x: 3,
                y: -3
            }
        },

        yAxis: [{ // left y axis
            title: {
                text: null
            },
            labels: {
                align: 'left',
                x: 3,
                y: 16,
                format: '{value:.,0f}'
            },
            showFirstLabel: false
        }, { // right y axis
            linkedTo: 0,
            gridLineWidth: 0,
            opposite: true,
            title: {
                text: null
            },
            labels: {
                align: 'right',
                x: -3,
                y: 16,
                format: '{value:.,0f}'
            },
            showFirstLabel: false
        }],

        legend: {
            align: 'left',
            verticalAlign: 'top',
            borderWidth: 0
        },

        tooltip: {
            shared: true,
            crosshairs: true
        },

        plotOptions: {
            series: {
                cursor: 'pointer',
                className: 'popup-on-click',
                marker: {
                    lineWidth: 1
                }
            }
        },

        series: [{
            name: 'All sessions',
            lineWidth: 4,
            marker: {
                radius: 4
            }
        }, {
            name: 'New users'
        }]
    });

    //bar
    Highcharts.chart('container-bar', {
    chart: {
        type: 'column'
    },
    title: {
        text: 'Monthly Average Rainfall'
    },
    subtitle: {
        text: 'Source: WorldClimate.com'
    },
    xAxis: {
        categories: [
            'Jan',
            'Feb',
            'Mar',
            'Apr',
            'May',
            'Jun',
            'Jul',
            'Aug',
            'Sep',
            'Oct',
            'Nov',
            'Dec'
        ],
        crosshair: true
    },
    yAxis: {
        min: 0,
        title: {
            text: 'Rainfall (mm)'
        }
    },
    tooltip: {
        headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
        pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
            '<td style="padding:0"><b>{point.y:.1f} mm</b></td></tr>',
        footerFormat: '</table>',
        shared: true,
        useHTML: true
    },
    plotOptions: {
        column: {
            pointPadding: 0.2,
            borderWidth: 0
        }
    },
    series: [{
        name: 'Tokyo',
        data: [49.9, 71.5, 106.4, 129.2, 144.0, 176.0, 135.6, 148.5, 216.4, 194.1, 95.6, 54.4]

    }, {
        name: 'New York',
        data: [83.6, 78.8, 98.5, 93.4, 106.0, 84.5, 105.0, 104.3, 91.2, 83.5, 106.6, 92.3]

    }, {
        name: 'London',
        data: [48.9, 38.8, 39.3, 41.4, 47.0, 48.3, 59.0, 59.6, 52.4, 65.2, 59.3, 51.2]

    }, {
        name: 'Berlin',
        data: [42.4, 33.2, 34.5, 39.7, 52.6, 75.5, 57.4, 60.4, 47.6, 39.1, 46.8, 51.1]

    }]
    });
    
    /* datatable */
    $(document).ready(function() {
        $('#example').DataTable();
    });
    /* datatable */
</script>
</html>
