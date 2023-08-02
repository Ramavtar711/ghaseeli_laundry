<?php include('header.php'); ?> 
             
 <?php include('sidebar.php'); ?>        
    <div class="main-content">

  <?php include('header_bar.php'); ?>  
           
                            
<div class="header pt-7" style="background-image: url(images/bg_img.jpg); background-size: cover; background-position: center center;">
    <span class="mask bg-gradient-dark opacity-7"></span>
    <div class="container-fluid">
      <div class="header-body">
        <div class="row align-items-center py-4 pb-7">
          <div class="col-lg-6 col-7">
            <h6 class="h2 text-white d-inline-block mb-0">Send Notification</h6>
            <nav aria-label="breadcrumb" class="d-none d-md-inline-block">
              <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                  <li class="breadcrumb-item text-white"><a href="dashboard.php"><i class="fa fa-home text-primary"></i></a></li>
                
                
                <li class="breadcrumb-item active text-white" aria-current="page"> Send Notification </li>
              </ol>
            </nav>
          </div>
        </div>
      </div>
    </div>
</div>


<div class="container-fluid mt--6 mb-5">
    <div class="row">
      <div class="col">
        <div class="card">
          <!-- Card header -->
          <div class="card-header border-0">
            <span class="h3">Message</span>
            <form class="form-horizontal form" id="checkForm" action="#" method="post">
                <input type="hidden" name="_token" value="oKup3nu5kd6tUBCqoFTVEMtnOOg1p3zubico9KkM">
                <div class="form-group mt-4">
                  <label class="form-control-label" for="title">Title</label>
                  <input type="text" name="title" id="title" class="form-control" placeholder="Notification Title">
                                  </div>

                <div class="form-group mt--3">
                    <label class="form-control-label" for="msg">Message</label>
                    <textarea class="form-control " name="msg" id="msg" rows="7" placeholder="Notification Message"></textarea>
                                    </div>

                <div class="form-group">
                    <label class="form-control-label">Users</label>
                    <select class="form-control select2" dir="" multiple="multiple" name="user_id[]" id="select2" data-placeholder='-- Select Users --' placeholder='-- Select Users --'>
                                                    <option value=2 >Steve Rogers</option>
                                                    <option value=3 >Izhar Siddiqui</option>
                                                    <option value=15 >Natasha Romanoff</option>
                                                    <option value=16 >Mark Ruffalo</option>
                                                    <option value=17 >Stefan Salvatore</option>
                                                    <option value=18 >goriola david</option>
                                                    <option value=19 >Md Jahidul Islam</option>
                                                    <option value=20 >Frederick Nyawaya</option>
                                                    <option value=21 >varma</option>
                                                    <option value=22 >test</option>
                                                    <option value=23 >rahul</option>
                                                    <option value=24 >rach</option>
                                                    <option value=25 >rsfgfgfgfgfg</option>
                                                    <option value=26 >Nandhu Renganathan</option>
                                                    <option value=27 >kk</option>
                                                    <option value=28 >Théo pidoux</option>
                                                    <option value=29 >kiruthika</option>
                                                    <option value=30 >kiruthika</option>
                                                    <option value=31 >test</option>
                                                    <option value=32 >Deith Bridgeman</option>
                                                    <option value=33 >Hadeel Rustom</option>
                                                    <option value=34 >Hadeel Rustom</option>
                                                    <option value=35 >Hadeel Rustom</option>
                                                    <option value=36 >test test2</option>
                                                    <option value=37 >test test2</option>
                                                    <option value=38 >lesley born</option>
                                                    <option value=39 >TARUN TYAGI</option>
                                                    <option value=40 >Akshay Raghawani</option>
                                                    <option value=41 >test</option>
                                                    <option value=42 >Edge Sugas</option>
                                                    <option value=43 >Edge Sugas</option>
                                                    <option value=44 >bendot</option>
                                                    <option value=45 >Sathish Kumar</option>
                                                    <option value=46 >Sathish Kumar</option>
                                                    <option value=47 >Sathish Kumar</option>
                                                    <option value=48 >Sathish Kumar</option>
                                                    <option value=49 >Sandeep Kumar</option>
                                                    <option value=50 >vishal</option>
                                                    <option value=51 >Anggi Saputro</option>
                                                    <option value=52 >Subhajit Majee</option>
                                                    <option value=53 >Subhajit Majee</option>
                                                    <option value=54 >Akshay Raghawani</option>
                                                    <option value=55 >qwerty</option>
                                                    <option value=56 >Marcus</option>
                                                    <option value=57 >abdul</option>
                                                    <option value=58 >aaa</option>
                                                    <option value=59 >nishant</option>
                                                    <option value=60 >Arkani</option>
                                                    <option value=61 >Abhitesh Tiwari</option>
                                                    <option value=62 >kev</option>
                                                    <option value=63 >test1</option>
                                                    <option value=64 >Alfian</option>
                                                    <option value=65 >semugabi</option>
                                                    <option value=66 >Saif</option>
                                                    <option value=67 >Khalid Mahmood</option>
                                                    <option value=68 >ray</option>
                                                    <option value=69 >ray</option>
                                                    <option value=70 >ray</option>
                                                    <option value=71 >ray</option>
                                                    <option value=72 >ray</option>
                                                    <option value=73 >ray</option>
                                                    <option value=74 >dedek</option>
                                                    <option value=75 >test</option>
                                                    <option value=76 >test</option>
                                                    <option value=77 >Lokesh G</option>
                                                    <option value=78 >Ami</option>
                                                    <option value=79 >Ami</option>
                                                    <option value=80 >rahul chauhan</option>
                                                    <option value=81 >Arslan</option>
                                                    <option value=82 >sajad</option>
                                                    <option value=83 >cool</option>
                                                    <option value=84 >joni</option>
                                                    <option value=85 >sulis</option>
                                                    <option value=86 >tedtt</option>
                                                    <option value=87 >tedtt</option>
                                                    <option value=88 >takachi</option>
                                                    <option value=89 >takachi</option>
                                                    <option value=90 >papau</option>
                                                    <option value=91 >yogesh</option>
                                                    <option value=92 >Amrit Raj</option>
                                                    <option value=93 >Ram Batham</option>
                                                    <option value=94 >Ravi</option>
                                                    <option value=95 >fifi</option>
                                                    <option value=96 >yssouf kangah</option>
                                                    <option value=97 >monk</option>
                                                    <option value=98 >monk</option>
                                                    <option value=99 >David Spence</option>
                                                    <option value=100 >David Spence</option>
                                                    <option value=101 >Dev. Khurram Shahzad</option>
                                                    <option value=102 >Dev. Khurram Shahzad</option>
                                                    <option value=103 >nikita</option>
                                                    <option value=104 >Joe ThCh</option>
                                                    <option value=105 >Avinash Shetty</option>
                                                    <option value=106 >Anas</option>
                                                    <option value=107 >Amos</option>
                                                    <option value=108 >Test User</option>
                                                    <option value=109 >Dhiraj Ninave</option>
                                                    <option value=110 >ekosp</option>
                                                    <option value=112 >sudesh84</option>
                                                    <option value=113 >test user</option>
                                                    <option value=114 >test user</option>
                                                    <option value=115 >test user</option>
                                                    <option value=116 >twsting user</option>
                                                    <option value=117 >sajjad hussain</option>
                                                    <option value=118 >sajjad hussain</option>
                                                    <option value=119 >gggghh</option>
                                                    <option value=120 >oman.note</option>
                                                    <option value=121 >ARIF</option>
                                                    <option value=122 >gury</option>
                                                    <option value=123 >Gurudatta</option>
                                                    <option value=124 >test</option>
                                                    <option value=125 >zee</option>
                                                    <option value=126 >test test</option>
                                                    <option value=127 >Jhon</option>
                                                    <option value=128 >Hayath</option>
                                                    <option value=129 >mohamed</option>
                                                    <option value=130 >Narasimha</option>
                                                    <option value=131 >Moddassir Ahmed</option>
                                                    <option value=132 >Erick</option>
                                                    <option value=133 >Mahi Dave</option>
                                                    <option value=134 >Abdulaziz Naji</option>
                                                    <option value=135 >john</option>
                                                    <option value=136 >lakshya</option>
                                                    <option value=137 >test</option>
                                                    <option value=138 >test</option>
                                                    <option value=139 >do.</option>
                                                    <option value=140 >do.</option>
                                                    <option value=141 >sid</option>
                                                    <option value=142 >neeraj</option>
                                                    <option value=143 >neeraj</option>
                                                    <option value=144 >neeraj</option>
                                                    <option value=145 >Neeraj Kumar</option>
                                                    <option value=146 >pankaj</option>
                                                    <option value=147 >ebs</option>
                                                    <option value=148 >ebs</option>
                                                    <option value=149 >ebs</option>
                                                    <option value=150 >ebs</option>
                                                    <option value=151 >Test 1</option>
                                                    <option value=152 >Balvindet</option>
                                                    <option value=153 >Subhash</option>
                                                    <option value=154 >monty singh</option>
                                                    <option value=155 >rajev</option>
                                                    <option value=156 >rajev</option>
                                                    <option value=157 >Anjua Partama Rusvandia</option>
                                                    <option value=158 >Samson Oduor</option>
                                                    <option value=159 >user</option>
                                                    <option value=160 >user</option>
                                                    <option value=161 >rdpl</option>
                                                    <option value=162 >akumaka</option>
                                                    <option value=163 >Sduthi</option>
                                                    <option value=164 >Anwar nazar</option>
                                                    <option value=165 >Alvin Imbuka</option>
                                                    <option value=166 >Daniel Smith</option>
                                                    <option value=167 >wahyu adi wijaya</option>
                                                    <option value=168 >test</option>
                                                    <option value=169 >jignesh</option>
                                                    <option value=170 >Anoop</option>
                                                    <option value=171 >gbgh</option>
                                                    <option value=172 >Kapil</option>
                                                    <option value=173 >Kapil</option>
                                                    <option value=174 >misha</option>
                                            </select>
                    <div class="invalid-div"><span class="user_id"></span></div>
                </div>
                
                <div class="border-top">
                  <div class="card-body text-center">
                      <input type="submit" class="btn btn-primary" id="create_btn" value="Send Notification">
                  </div>
              </div>
            <form>
        </div>
      </div>
    </div>
</div>
                    
  <?php include('footer.php'); ?>  