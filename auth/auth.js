  $(document).ready(function(){
    $('#loginbtn').click(function (event) {
        event.preventDefault();
        $.ajax({
            type: 'POST',
            url: 'login.php',
            data: $('#loginform').serialize(),
            success: function (data) {
                var result = data;
                $(".error").html(result);
                if (result =="<h4 class='text-success'>Login Successfully</h4>") {
                    window.location.assign('dashboard.php');
                }
               
            }
        });
    })



    $('.textarea').summernote({
    height:150,
    toolbar: [
      // ['vb', ['goodvb']],
        ['style', ['style']],
        ['font', ['bold', 'italic', 'underline', 'clear', 'superscript', 'subscript']],
        ['color', ['color']],
        ['para', ['ul', 'ol', 'paragraph']],
        ['table', ['table']],
        ['insert', ['link', 'picture', 'mat']],
        ['view', ['fullscreen', 'codeview', 'help', 'undo', 'redo']]
    ],
   
    callbacks: {
      onImageUpload: function(image) {
      editor = $(this);
      uploadImageContent(image[0], editor);
      },
    // },
    // callbacks: {
      onMediaDelete: function (target) {
        deleteFile(target[0].src);
      }
    },
  })

  function uploadImageContent(image) {
    var data = new FormData();
    data.append("image", image);
    $.ajax({
      url: 'uploadfiles.php',
      cache: false,
      contentType: false,
      processData: false,
      data: data,
      type: "post",
      success: function (url) {
        var image = $('<img>').attr('src', url);
        $('.textarea').summernote("insertNode", image[0]);
      },
      error: function (data) {
        console.log(data);
      }
    });
  }

  function deleteFile(src) {
    $.ajax({
      data: { src: src },
      type : "POST",
      url : "filedelete.php",
      cache: false,
      success: function (response) {
        // alert(response);
      }
    })
  }

  $('#homeform').submit(function(e){
    // alert(xmlh.status);
  e.preventDefault();
  var datas = new FormData(this);

  $.ajax({
    type:'POST',
  url:'home.php',
    data: datas,
    contentType:false,
    cache:false,
    processData:false,
    // dataType:"JSON",
    success: function (response) {
      
      if (response) {
        $('.homedformerror').html(response);
      } 
      if (response =="<h3 class='text-success'>Insert successfully</h2>") {
        window.location.assign('dashboard.php'); 
         }
    },

  });

})

    //   update home form
    $('#updatehomeform').submit(function(e){
        // alert(xmlh.status);
      e.preventDefault();
      var datas = new FormData(this);
    
      $.ajax({
        type:'POST',
      url:'confirmed.php',
        data: datas,
        contentType:false,
        cache:false,
        processData:false,
        // dataType:"JSON",
        success: function (response) {
          
          if (response) {
            $('.updatehomedformerror').html(response);
          } 
          if (response =="<h3 class='text-success'>Insert successfully</h2>") {
            window.location.assign('dashboard.php'); 
             }
        },
    
      });
    
    })
 
    //   about form
    $('#aboutform').submit(function(e){
        // alert(xmlh.status);
      e.preventDefault();
      var datas = new FormData(this);
    
      $.ajax({
        type:'POST',
      url:'about.php',
        data: datas,
        contentType:false,
        cache:false,
        processData:false,
        // dataType:"JSON",
        success: function (response) {
          
          if (response) {
            $('.aboutformerror').html(response);
          } 
          if (response =="<h3 class='text-success'>Insert successfully</h2>") {
            window.location.assign('dashboard.php'); 
             }
        },
    
      });
    
    })
    
        //   update home form
        $('#updateaboutform').submit(function(e){
            // alert(xmlh.status);
          e.preventDefault();
          var datas = new FormData(this);
        
          $.ajax({
            type:'POST',
          url:'confirmed.php',
            data: datas,
            contentType:false,
            cache:false,
            processData:false,
            // dataType:"JSON",
            success: function (response) {
              
              if (response) {
                $('.updateaboutformerror').html(response);
              } 
              if (response =="<h3 class='text-success'>Insert successfully</h2>") {
                window.location.assign('dashboard.php'); 
                 }
            },
        
          });
        
        })
     
// status
$('#homestatus').on('show.bs.modal', function(e){
  var id = $(e.relatedTarget).attr('home');
  $.ajax({
  type:'post',
  url:'confirm.php',
  data:'homestatus='+id,
  success:function(data){
    $('.homestatus').html(data);
  }
})
})

// delete
$('#homedelete').on('show.bs.modal', function(e){
  var id = $(e.relatedTarget).attr('home');
  $.ajax({
  type:'post',
  url:'confirm.php',
  data:'homedelete='+id,
  success:function(data){
    $('.homedelete').html(data);
  }
})
})

// homw edit

// delete
$('#homeedit').on('show.bs.modal', function(e){
  var id = $(e.relatedTarget).attr('home');
  $.ajax({
  type:'post',
  url:'confirm.php',
  data:'homeedit='+id,
  success:function(data){
    $('.homeedit').html(data);
  }
})
})


    // about
    // status
$('#aboutstatus').on('show.bs.modal', function(e){
  var id = $(e.relatedTarget).attr('about');
  $.ajax({
  type:'post',
  url:'confirm.php',
  data:'aboutstatus='+id,
  success:function(data){
    $('.aboutstatus').html(data);
  }
})
})

// delete
$('#aboutdelete').on('show.bs.modal', function(e){
  var id = $(e.relatedTarget).attr('about');
  $.ajax({
  type:'post',
  url:'confirm.php',
  data:'aboutdelete='+id,
  success:function(data){
    $('.aboutdelete').html(data);
  }
})
})

// homw edit

// delete
$('#aboutedit').on('show.bs.modal', function(e){
  var id = $(e.relatedTarget).attr('about');
  $.ajax({
  type:'post',
  url:'confirm.php',
  data:'aboutedit='+id,
  success:function(data){
    $('.aboutedit').html(data);
  }
})
})

})