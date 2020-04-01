	<script src="<?php echo base_url('assets/lib/jquery/jquery.min.js'); ?>"></script>
  <script src="<?php echo base_url('assets/lib/bootstrap/js/bootstrap.min.js'); ?>"></script>
	<!-- For Bootstrap notifier -->
	<script src="<?php echo base_url('assets/bootstrap-notify-master/bootstrap-notify.min.js'); ?>"></script>
  	<!--BACKSTRETCH-->
  	<!-- You can use an image of whatever size. This script will stretch to fit in any screen size.-->
  <script type="text/javascript" src="<?php echo base_url('assets/lib/jquery.backstretch.min.js'); ?>"></script>

  <script class="include" type="text/javascript" src="<?php echo base_url('assets/lib/jquery.dcjqaccordion.2.7.js'); ?>"></script>
  <script src="<?php echo base_url('assets/lib/jquery.scrollTo.min.js'); ?>"></script>
  <script src="<?php echo base_url('assets/lib/jquery.nicescroll.js'); ?>" type="text/javascript"></script>
 	<script src="<?php echo base_url('assets/lib/jquery.sparkline.js'); ?>"></script>
 	<script type="text/javascript" language="javascript" src="<?php echo base_url('assets/lib/advanced-datatable/js/jquery.dataTables.js'); ?>"></script>
  <script type="text/javascript" src="<?php echo base_url('assets/lib/advanced-datatable/js/DT_bootstrap.js'); ?>"></script>
  	
  <!--common script for all pages-->
  <script src="<?php echo base_url('assets/lib/common-scripts.js'); ?>"></script>
 	<script type="text/javascript" src="<?php echo base_url('assets/lib/gritter/js/jquery.gritter.js'); ?>"></script>
  <script type="text/javascript" src="<?php echo base_url('assets/lib/gritter-conf.js'); ?>"></script>
  	
  <!--script for this page-->
  <script src="<?php echo base_url('assets/lib/sparkline-chart.js'); ?>"></script>
 	<script src="<?php echo base_url('assets/lib/zabuto_calendar.js'); ?>"></script>

  <script type="text/javascript">
    $(function(){

      showBranchesCode();
      showParticipants();
      showAllBranchNames();
      showOverAllRate();
      showCreativityContent();
      showMusicContent();
      showOriginalityContent();
      showAdmins();
      showUsers();

      setInterval(()=> {
        showUsers();
      }, 1000);

      setInterval(()=> {
        showAllBranchNames();
      }, 1000);

      setInterval(()=> {
        showOverAllRate();
      }, 1000);
      setInterval(()=> {
        showCreativityContent();
      }, 1000);

      setInterval(()=> {
        showMusicContent();
      }, 1000);

      setInterval(()=> {
        showOriginalityContent();
      }, 1000);

      setInterval(()=> {
        showAdmins();
      }, 1000);

      $("#bnameResult").hide();

      $("[data-toggle='tooltip']").tooltip();

      $.backstretch("<?php echo base_url('assets/img/tiktok.jpg'); ?>", {
          speed: 500
      });

      $("#date-popover").popover({
        html: true,
        trigger: "manual"
      });

      $("#date-popover").hide();
      $("#date-popover").click(function(e) {
        $(this).hide();
      });

      $("#my-calendar").zabuto_calendar({
        action: function() {
          return myDateFunction(this.id, false);
        },
        action_nav: function() {
          return myNavFunction(this.id);
        },
        ajax: {
          url: "show_data.php?action=1",
          modal: true
        },
        legend: [{
            type: "text",
            label: "Special event",
            badge: "00"
          },
          {
            type: "block",
            label: "Regular event",
          }
        ]
      });

      $("#LoginFrm").submit(function (e) {
        e.preventDefault();
        var userID = $("#userID").val();
        var method = $(this).attr('method');
        var action = $(this).attr('action');
        var data = $(this).serialize();
        // $.notify("Hello "+userID, {
        //  animate: {
        //    enter:  'animated fadeInRight',
        //    exit:   'animated fadeOutRight'
        //  }
        // });

        $.ajax({
              type    : method,
              url     : action,
              data    : data,
              success : function(data)
              {
            // alert (data);
                  if ( data == "admin" )
                  {
                    $.notify("Welcome Admin", {
                      animate: {
                      enter:  'animated fadeInRight',
                      exit: 'animated fadeOutRight',
                      type: 'success'
                     }
                    });
                    // alert("success");
                    window.location.href = "<?php echo base_url('Admin');?>";
                    $("#LoginFrm")[0].reset();
                    showAdmins();
                  }
                  else if ( data == "user" )
                  {
                    $.notify("Welcome User", {
                      animate: {
                      enter:  'animated fadeInRight',
                      exit: 'animated fadeOutRight',
                      type: 'success'
                     }
                    });
                    // alert("success");
                    window.location.href = "<?php echo base_url('User/') ?>";
                    $("#LoginFrm")[0].reset();
                  }
                  else
                  {
                    $.notify("Incorrect ID Number!", {
                        animate: {
                        enter:  'animated fadeInRight',
                        exit:   'animated fadeOutRight',
                        type:   'danger'
                      } 
                    });
                    $("#userID").css('border-color', 'red');
                    $("#LoginFrm")[0].reset();
                  }
              }
        });

        // alert(userID);
      });

      $("#BtnLogout").click(function(e){
        e.preventDefault();

        $.notify("Succesful Logout", {
            animate: {
            enter:  'animated fadeInRight',
            exit:   'animated fadeOutRight',
            type:   'danger'
          } 
        });

        window.location.href = "<?php echo base_url("Admin/logout") ?>";
      });

      $("#AddParticipantFrm").submit(function(e){
        e.preventDefault();

        var method = $(this).attr('method');
        var action = $(this).attr('action');
        var data = $(this).serialize();

        // alert(data);

        $.ajax({
              type    : method,
              url     : action,
              data    : data,
              success : function(data)
              {
            // alert (data);
                  if ( data == "1" )
                  {
                    $("#addParticipantmodal").modal("hide");
                    $.notify("Participant Added!", {
                      animate: {
                      enter:  'animated fadeInRight',
                      exit: 'animated fadeOutRight',
                      type: 'success'
                     }
                    });
                    // alert("success");
                    showAllBranchNames();
                    showParticipants();
                    $("#AddParticipantFrm")[0].reset();
                    $("#branchCode").css('border-color', '');
                    $("#branchName").css('border-color', '');
                  }
                  else
                  {
                    $.notify("Error, Account already existed!", {
                        animate: {
                        enter:  'animated fadeInRight',
                        exit:   'animated fadeOutRight',
                        type:   'danger'
                      } 
                    });
                    $("#branchCode").css('border-color', 'red');
                    $("#branchName").css('border-color', 'red');
                  }
              }
        });

      });

      $("#btnModalCancelAddingParticipant").click(function(e){
        e.preventDefault();

        $("#branchCode").css('border-color', '');
        $("#branchName").css('border-color', '');
        $("#AddParticipantFrm")[0].reset();
      });

      function showBranchesCode() {

        $.ajax({
          type:       "post",
          url:        "<?php echo base_url('Admin/showBranchesCode');?>", 
          success:    function(data){
            if (data) 
            {
              $("#showBranchCode").html(data);
            }
          }
        });
      }

      function showParticipants() {

        $.ajax({
          type:       "post",
          url:        "<?php echo base_url('Admin/showParticipants');?>", 
          success:    function(data){
            if (data) 
            {
              $("#showParticipants").html(data);
            }
          }
        });
      }

      $("#searchBranch").keyup(function () {
        var branch = $(this).val();
        // alert(data);
        if (branch == "")
        {
          showBranchesCode();
          // $("#searchResult").html("No result found.");
        }
        else
        {
          // $("#searchResult").html(branch);
          $.ajax({
            type:     "post",
            url:      "<?php echo base_url('Admin/searchBranch');?>",
            data:     "searchBranch="+branch,
            success:  function(data)
            {
              // $("#searchResult").html(data)
              if (data) 
              {
                $("#showBranchCode").html(data);
              }
              else
              {
                showParticipants();
              }
            },
            error: function(){
              $("#searchResult").html("No result found.");
            }
          });
        }

      });

      $("#searchParticipant").keyup(function () {
        var branch = $(this).val();
        // alert(data);
        if (branch == "")
        {
          showParticipants();
          // $("#searchResult").html("No result found.");
        }
        else
        {
          // $("#searchResult").html(branch);
          $.ajax({
            type:     "post",
            url:      "<?php echo base_url('Admin/searchParticipants');?>",
            data:     "searchBranch="+branch,
            success:  function(data)
            {
              // $("#searchResult").html(data)
              if (data) 
              {
                $("#showParticipants").html(data);
              }
              else
              {
                showParticipants();
              }
            },
            error: function(){
              $("#searchResult").html("No result found.");
            }
          });
        }

      });

      function showAllBranchNames() 
      {

        $.ajax({
          type:       "post",
          url:        "<?php echo base_url('Admin/showAllBranchNames');?>", 
          success:    function(data){
            if (data) 
            {
                $("#topSearch").html(data);
            }
          }
        });
      }

      function showOverAllRate() {
        $.ajax({
          type:       "post",
          url:        "<?php echo base_url('Admin/showOverAll');?>", 
          success:    function(data){
            if (data) 
            {
              $("#showOverAllContent").html(data);
            }
          }
        });
      }

      function showCreativityContent() {
        $.ajax({
          type:       "post",
          url:        "<?php echo base_url('Admin/showCreativity');?>", 
          success:    function(data){
            if (data) 
            {
                $("#showCreativityContent").html(data);
            }
          }
        });
      }

      function showMusicContent() {
        $.ajax({
          type:       "post",
          url:        "<?php echo base_url('Admin/showMusic');?>", 
          success:    function(data){
            if (data) 
            {
              $("#showMusicContent").html(data);

                $("#showMusicContent").load(data);
            }
          }
        });
      }

      function showOriginalityContent() {
        $.ajax({
          type:       "post",
          url:        "<?php echo base_url('Admin/showOriginality');?>", 
          success:    function(data){
            if (data) 
            {
                $("#showOriginalityContent").html(data);
            }
          }
        });
      }

      function showAdmins() {
        $.ajax({
          type:       "post",
          url:        "<?php echo base_url('Admin/showAdminsCont');?>", 
          success:    function(data){
            if (data) 
            {
              $("#showAdmins").html(data);
            }
          }
        });
      }

      function showUsers() {
        $.ajax({
          type:       "post",
          url:        "<?php echo base_url('Admin/showUsersCont');?>", 
          success:    function(data){
            if (data) 
            {
              $("#showUsers").html(data);
            }
          }
        });
      }

      $("#addAdminFrm").submit(function (e) {
        e.preventDefault();

        var first = $("#firstName").val();
        var middle = $("#middleName").val();
        var last = $("#lastName").val();
        var id = $("#companyID").val();
        var password = $("#password").val();
        // alert(first+" "+middle+" "+last+" "+id);
        $.ajax({
          type:       "post",
          url:        "<?php echo base_url('Admin/AddAdmin');?>",
          data:       {firstName:first, middleName:middle, lastName:last, companyID:id, password:password},
          success:    function(data){
            if (data == "success") 
            {
              $.notify("Admin added succesfully!", {
                animate: {
                  enter:  'animated fadeInRight',
                  exit:   'animated fadeOutRight',
                  type:   'danger'
                } 
              });

              $("#addAdminFrm")[0].reset();
              $("#addAdminModal").modal('hide');
            }
            else if ( data == "exist" )
            {
              // Error, Account already existed
              $.notify("Error, Account already existed!", {
                animate: {
                  enter:  'animated fadeInRight',
                  exit:   'animated fadeOutRight',
                  type:   'danger'
                } 
              });

              $("#addAdminFrm")[0].reset();
              $("#addAdminModal").modal('hide');
            }
            else
            {
              $.notify("Error!", {
                animate: {
                  enter:  'animated fadeInRight',
                  exit:   'animated fadeOutRight',
                  type:   'danger'
                } 
              });

              $("#addAdminFrm")[0].reset();
              $("#addAdminModal").modal('hide');
            }
          }
        });
        
      });

      $("#signupForm").submit(function (e) {
        e.preventDefault();

        var first = $("#firstName").val();
        var middle = $("#middleName").val();
        var last = $("#lastName").val();
        var id = $("#companyID").val();
        // alert(first+" "+middle+" "+last+" "+id);
        $.ajax({
          type:       "post",
          url:        "<?php echo base_url('Login_controller/SignUp');?>",
          data:       {firstName:first, middleName:middle, lastName:last, companyID:id},
          success:    function(data){
            if (data == "success") 
            {
              $.notify("Sign up succesfull!", {
                animate: {
                  enter:  'animated fadeInRight',
                  exit:   'animated fadeOutRight',
                  type:   'danger'
                } 
              });

              $("#signupForm")[0].reset();
              $("#signupModal").modal('hide');
            }
            else if ( data == "exist" )
            {
              // Error, Account already existed
              $.notify("Error, Account already existed!", {
                animate: {
                  enter:  'animated fadeInRight',
                  exit:   'animated fadeOutRight',
                  type:   'danger'
                } 
              });

              $("#signupForm")[0].reset();
              $("#signupModal").modal('hide');
            }
            else
            {
              $.notify("Error!", {
                animate: {
                  enter:  'animated fadeInRight',
                  exit:   'animated fadeOutRight',
                  type:   'danger'
                } 
              });

              $("#signupForm")[0].reset();
              $("#signupModal").modal('hide');
            }
          }
        });
        
      });



    });
// end of the main function


    function myNavFunction(id) {
      $("#date-popover").hide();
      var nav = $("#" + id).data("navigation");
      var to = $("#" + id).data("to");
      console.log('nav ' + nav + ' to: ' + to.month + '/' + to.year);
    }

    function getTime() {
      var today = new Date();
      var h = today.getHours();
      var m = today.getMinutes();
      var s = today.getSeconds();
      // add a zero in front of numbers<10
      m = checkTime(m);
      s = checkTime(s);
      document.getElementById('showtime').innerHTML = h + ":" + m + ":" + s;
      t = setTimeout(function() {
        getTime()
      }, 500);
    }

    function checkTime(i) {
      if (i < 10) {
        i = "0" + i;
      }
      return i;
    }

    $(document).ready(function() {
      var unique_id = $.gritter.add({
        // (string | mandatory) the heading of the notification
        title: 'Welcome to Auto Tabulator!',
        // (string | mandatory) the text inside the notification
        text: 'Enjoy our automated tabulation! Thank you! Click mo to close.',
        // (bool | optional) if you want it to fade out on its own or just sit there
        sticky: false,
        // (int | optional) the time you want it to be alive for before fading out
        time: 2000,
        // (string | optional) the class name you want to apply to that specific message
        class_name: 'my-sticky-class'
      });

      return false;
    });
  </script>
