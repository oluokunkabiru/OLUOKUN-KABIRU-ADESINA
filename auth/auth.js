$(document).ready(function () {
  $('#loginbtn').click(function (event) {
    event.preventDefault();
    $.ajax({
      type: 'POST',
      url: 'login.php',
      data: $('#loginform').serialize(),
      success: function (data) {
        var result = data;
        $(".error").html(result);
        if (result == "<h4 class='text-success'>Login Successfully</h4>") {
          window.location.assign('dashboard.php');
        }
               
      }
    });
  })



  $('.textarea').summernote({
    height: 150,
    toolbar: [
      // ['vb', ['goodvb']],
      ['style', ['style']],
      ['font', ['bold', 'italic', 'underline', 'clear', 'superscript', 'subscript']],
      ['fontsize', ['fontsize']],
      ['height', ['height']],
      ['fontname', ['fontname']],
      ['color', ['color']],
      ['para', ['ul', 'ol', 'paragraph']],
      ['table', ['table']],
      ['insert', ['link', 'picture', 'mat']],
      ['view', ['fullscreen', 'codeview', 'help', 'undo', 'redo']]
    ],
   
    callbacks: {
      onImageUpload: function (image) {
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
      type: "POST",
      url: "filedelete.php",
      cache: false,
      success: function (response) {
        // alert(response);
      }
    })
  }

  $('#homeform').submit(function (e) {
    // alert(xmlh.status);
    e.preventDefault();
    var datas = new FormData(this);

    $.ajax({
      type: 'POST',
      url: 'home.php',
      data: datas,
      contentType: false,
      cache: false,
      processData: false,
      // dataType:"JSON",
      success: function (response) {
      
        if (response) {
          $('.homedformerror').html(response);
        }
        if (response == "<h3 class='text-success'>Insert successfully</h3>") {
          window.location.assign('dashboard.php');
        }
      },

    });

  })

  //   update home form
  $('#updatehomeform').submit(function (e) {
    // alert(xmlh.status);
    e.preventDefault();
    var datas = new FormData(this);
    
    $.ajax({
      type: 'POST',
      url: 'confirmed.php',
      data: datas,
      contentType: false,
      cache: false,
      processData: false,
      // dataType:"JSON",
      success: function (response) {
          
        if (response) {
          $('.updatehomedformerror').html(response);
        }
        if (response == "<h3 class='text-success'>Insert successfully</h2>") {
          window.location.assign('dashboard.php');
        }
      },
    
    });
    
  })
 
  //   about form
  $('#aboutform').submit(function (e) {
    // alert(xmlh.status);
    e.preventDefault();
    var datas = new FormData(this);
    
    $.ajax({
      type: 'POST',
      url: 'about.php',
      data: datas,
      contentType: false,
      cache: false,
      processData: false,
      // dataType:"JSON",
      success: function (response) {
          
        if (response) {
          $('.aboutformerror').html(response);
        }
        if (response == "<h3 class='text-success'>Insert successfully</h2>") {
          window.location.assign('dashboard.php');
        }
      },
    
    });
    
  })
    
  //   update home form
  $('#updateaboutform').submit(function (e) {
    // alert(xmlh.status);
    e.preventDefault();
    var datas = new FormData(this);
        
    $.ajax({
      type: 'POST',
      url: 'confirmed.php',
      data: datas,
      contentType: false,
      cache: false,
      processData: false,
      // dataType:"JSON",
      success: function (response) {
              
        if (response) {
          $('.updateaboutformerror').html(response);
        }
        if (response == "<h3 class='text-success'>Insert successfully</h2>") {
          window.location.assign('dashboard.php');
        }
      },
        
    });
        
  })
     
  //   update service form
  $('#updateserviceform').submit(function (e) {
    // alert(xmlh.status);
    e.preventDefault();
    var datas = new FormData(this);
  
    $.ajax({
      type: 'POST',
      url: 'confirmed.php',
      data: datas,
      contentType: false,
      cache: false,
      processData: false,
      // dataType:"JSON",
      success: function (response) {
        
        if (response) {
          $('.updateserviceformerror').html(response);
        }
        if (response == "<h3 class='text-success'>Insert successfully</h2>") {
          window.location.assign('dashboard.php');
        }
      },
  
    });
  
  })
  // status
  $('#homestatus').on('show.bs.modal', function (e) {
    var id = $(e.relatedTarget).attr('home');
    $.ajax({
      type: 'post',
      url: 'confirm.php',
      data: 'homestatus=' + id,
      success: function (data) {
        $('.homestatus').html(data);
      }
    })
  })
    

  // delete
  $('#homedelete').on('show.bs.modal', function (e) {
    var id = $(e.relatedTarget).attr('home');
    $.ajax({
      type: 'post',
      url: 'confirm.php',
      data: 'homedelete=' + id,
      success: function (data) {
        $('.homedelete').html(data);
      }
    })
  })

  // homw edit

  // delete
  $('#homeedit').on('show.bs.modal', function (e) {
    var id = $(e.relatedTarget).attr('home');
    $.ajax({
      type: 'post',
      url: 'confirm.php',
      data: 'homeedit=' + id,
      success: function (data) {
        $('.homeedit').html(data);
      }
    })
  })

  // services

  //   about form
  $('#serviceform').submit(function (e) {
    // alert(xmlh.status);
    e.preventDefault();
    var datas = new FormData(this);
  
    $.ajax({
      type: 'POST',
      url: 'services.php',
      data: datas,
      contentType: false,
      cache: false,
      processData: false,
      // dataType:"JSON",
      success: function (response) {
        
        if (response) {
          $('.serviceformerror').html(response);
        }
        if (response == "<h3 class='text-success'>Insert successfully</h2>") {
          window.location.assign('dashboard.php');
        }
      },
  
    });
  
  })
  
  //   update home form
  $('#updateserviceform').submit(function (e) {
    // alert(xmlh.status);
    e.preventDefault();
    var datas = new FormData(this);
      
    $.ajax({
      type: 'POST',
      url: 'confirmed.php',
      data: datas,
      contentType: false,
      cache: false,
      processData: false,
      // dataType:"JSON",
      success: function (response) {
            
        if (response) {
          $('.updateserviceformerror').html(response);
        }
        if (response == "<h3 class='text-success'>Insert successfully</h2>") {
          window.location.assign('dashboard.php');
        }
      },
      
    });
      
  })
   
  // status
  $('#servicestatus').on('show.bs.modal', function (e) {
    var id = $(e.relatedTarget).attr('service');
    $.ajax({
      type: 'post',
      url: 'confirm.php',
      data: 'servicestatus=' + id,
      success: function (data) {
        $('.servicestatus').html(data);
      }
    })
  })

  $('#servicestatusdisable').on('show.bs.modal', function (e) {
    var id = $(e.relatedTarget).attr('servicedisabled');
    $.ajax({
      type: 'post',
      url: 'confirm.php',
      data: 'servicestatusdisabled=' + id,
      success: function (data) {
        $('.servicestatusdisable').html(data);
      }
    })
  })

  // delete
  $('#servicedelete').on('show.bs.modal', function (e) {
    var id = $(e.relatedTarget).attr('service');
    $.ajax({
      type: 'post',
      url: 'confirm.php',
      data: 'servicedelete=' + id,
      success: function (data) {
        $('.servicedelete').html(data);
      }
    })
  })

  // homw edit

  // delete
  $('#serviceedit').on('show.bs.modal', function (e) {
    var id = $(e.relatedTarget).attr('service');
    $.ajax({
      type: 'post',
      url: 'confirm.php',
      data: 'serviceedit=' + id,
      success: function (data) {
        $('.serviceedit').html(data);
      }
    })
  })

    

  // project
  //   about form
  $('#addprojectform').submit(function (e) {
    // alert(xmlh.status);
    e.preventDefault();
    var datas = new FormData(this);
  
    $.ajax({
      type: 'POST',
      url: 'project.php',
      data: datas,
      contentType: false,
      cache: false,
      processData: false,
      // dataType:"JSON",
      success: function (response) {
        
        if (response) {
          $('.projectformerror').html(response);
        }
        if (response == "<h3 class='text-success'>Insert successfully</h2>") {
          window.location.assign('dashboard.php');
        }
      },
  
    });
  
  })
  
  //   update home form
  $('#updateprojectform').submit(function (e) {
    // alert(xmlh.status);
    e.preventDefault();
    var datas = new FormData(this);
      
    $.ajax({
      type: 'POST',
      url: 'confirmed.php',
      data: datas,
      contentType: false,
      cache: false,
      processData: false,
      // dataType:"JSON",
      success: function (response) {
            
        if (response) {
          $('.updateprojectformerror').html(response);
        }
        if (response == "<h3 class='text-success'>Insert successfully</h2>") {
          window.location.assign('dashboard.php');
        }
      },
      
    });
      
  })
   
  // status
  $('#projectstatus').on('show.bs.modal', function (e) {
    var id = $(e.relatedTarget).attr('project');
    $.ajax({
      type: 'post',
      url: 'confirm.php',
      data: 'projectstatus=' + id,
      success: function (data) {
        $('.projectstatus').html(data);
      }
    })
  })

  $('#projectstatusdisable').on('show.bs.modal', function (e) {
    var id = $(e.relatedTarget).attr('projectdisabled');
    $.ajax({
      type: 'post',
      url: 'confirm.php',
      data: 'projectstatusdisabled=' + id,
      success: function (data) {
        $('.projectstatusdisable').html(data);
      }
    })
  })

  // delete
  $('#projectdelete').on('show.bs.modal', function (e) {
    var id = $(e.relatedTarget).attr('project');
    $.ajax({
      type: 'post',
      url: 'confirm.php',
      data: 'projectdelete=' + id,
      success: function (data) {
        $('.projectdelete').html(data);
      }
    })
  })

  // homw edit

  // delete
  $('#projectedit').on('show.bs.modal', function (e) {
    var id = $(e.relatedTarget).attr('project');
    $.ajax({
      type: 'post',
      url: 'confirm.php',
      data: 'projectedit=' + id,
      success: function (data) {
        $('.projectedit').html(data);
      }
    })
  })


  // about
  // status
  $('#aboutstatus').on('show.bs.modal', function (e) {
    var id = $(e.relatedTarget).attr('about');
    $.ajax({
      type: 'post',
      url: 'confirm.php',
      data: 'aboutstatus=' + id,
      success: function (data) {
        $('.aboutstatus').html(data);
      }
    })
  })

  // delete
  $('#aboutdelete').on('show.bs.modal', function (e) {
    var id = $(e.relatedTarget).attr('about');
    $.ajax({
      type: 'post',
      url: 'confirm.php',
      data: 'aboutdelete=' + id,
      success: function (data) {
        $('.aboutdelete').html(data);
      }
    })
  })

  // homw edit

  // delete
  $('#aboutedit').on('show.bs.modal', function (e) {
    var id = $(e.relatedTarget).attr('about');
    $.ajax({
      type: 'post',
      url: 'confirm.php',
      data: 'aboutedit=' + id,
      success: function (data) {
        $('.aboutedit').html(data);
      }
    })
  })


  $('#addcontactform').submit(function (e) {
    // alert(xmlh.status);
    e.preventDefault();
    var datas = new FormData(this);

    $.ajax({
      type: 'POST',
      url: 'contact.php',
      data: datas,
      contentType: false,
      cache: false,
      processData: false,
      // dataType:"JSON",
      success: function (response) {
    
        if (response) {
          $('.contactformerror').html(response);
        }
        if (response == "<h3 class='text-success'>Insert successfully</h2>") {
          window.location.assign('dashboard.php');
        }
      },

    });

  })

  //   update home form
  $('#updatecontactform').submit(function (e) {
    // alert(xmlh.status);
    e.preventDefault();
    var datas = new FormData(this);
  
    $.ajax({
      type: 'POST',
      url: 'confirmed.php',
      data: datas,
      contentType: false,
      cache: false,
      processData: false,
      // dataType:"JSON",
      success: function (response) {
        
        if (response) {
          $('.updatecontactformerror').html(response);
        }
        if (response == "<h3 class='text-success'>Insert successfully</h2>") {
          window.location.assign('dashboard.php');
        }
      },
  
    });
  
  })

  // delete
  $('#contactdelete').on('show.bs.modal', function (e) {
    var id = $(e.relatedTarget).attr('contact');
    $.ajax({
      type: 'post',
      url: 'confirm.php',
      data: 'contactdelete=' + id,
      success: function (data) {
        $('.contactdelete').html(data);
      }
    })
  })


  // apperarance

  $('#addapperanceform').submit(function (e) {
    // alert(xmlh.status);
    e.preventDefault();
    var datas = new FormData(this);

    $.ajax({
      type: 'POST',
      url: 'appearance.php',
      data: datas,
      contentType: false,
      cache: false,
      processData: false,
      // dataType:"JSON",
      success: function (response) {
    
        if (response) {
          $('.apperanceformerror').html(response);
        }
        if (response == "<h3 class='text-success'>Insert successfully</h2>") {
          window.location.assign('dashboard.php');
        }
      },

    });

  })

  //   update home form
  $('#updateapperanceform').submit(function (e) {
    // alert(xmlh.status);
    e.preventDefault();
    var datas = new FormData(this);
  
    $.ajax({
      type: 'POST',
      url: 'confirmed.php',
      data: datas,
      contentType: false,
      cache: false,
      processData: false,
      // dataType:"JSON",
      success: function (response) {
        
        if (response) {
          $('.updateapperanceformerror').html(response);
        }
        if (response == "<h3 class='text-success'>Insert successfully</h2>") {
          window.location.assign('dashboard.php');
        }
      },
  
    });
  
  })

  // delete
  $('#appearancedelete').on('show.bs.modal', function (e) {
    var id = $(e.relatedTarget).attr('appearance');
    // alert(id);
    $.ajax({
      type: 'post',
      url: 'confirm.php',
      data: 'appearancedelete=' + id,
      success: function (data) {
        $('.appearancedelete').html(data);
      }
    })
  })

  $('#appearancestatus').on('show.bs.modal', function (e) {
    var id = $(e.relatedTarget).attr('appearance');
    // alert(id);
    $.ajax({
      type: 'post',
      url: 'confirm.php',
      data: 'appearancestatus=' + id,
      success: function (data) {
        $('.appearancestatus').html(data);
      }
    })
  })

  $('#appearanceedit').on('show.bs.modal', function (e) {
    var id = $(e.relatedTarget).attr('appearance');
    // alert(id);
    $.ajax({
      type: 'post',
      url: 'confirm.php',
      data: 'appearanceedit=' + id,
      success: function (data) {
        $('.appearanceedit').html(data);
      }
    })


  
  })

  // homw edit

  // delete
  $('#contactedit').on('show.bs.modal', function (e) {
    var id = $(e.relatedTarget).attr('contact');
    $.ajax({
      type: 'post',
      url: 'confirm.php',
      data: 'contactedit=' + id,
      success: function (data) {
        $('.contactedit').html(data);
      }
    })
  })


  // writer
  $('#addwriterform').submit(function (e) {
    // alert(xmlh.status);
    e.preventDefault();
    var datas = new FormData(this);

    $.ajax({
      type: 'POST',
      url: 'writer.php',
      data: datas,
      contentType: false,
      cache: false,
      processData: false,
      // dataType:"JSON",
      success: function (response) {
    
        if (response) {
          $('.addwritererror').html(response);
        }
        if (response == "<h3 class='text-success'>Insert successfully</h2>") {
          window.location.assign('dashboard.php');
        }
      },

    });

  })

  // writer

  // delete
  $('#writerdelete').on('show.bs.modal', function (e) {
    var id = $(e.relatedTarget).attr('writer');
    // alert(id);
    $.ajax({
      type: 'post',
      url: 'confirm.php',
      data: 'writerdelete=' + id,
      success: function (data) {
        $('.writerdelete').html(data);
      }
    })
  })
 
  // writer
  $('#addiconform').submit(function (e) {
    // alert(xmlh.status);
    e.preventDefault();
    var datas = new FormData(this);

    $.ajax({
      type: 'POST',
      url: 'icon.php',
      data: datas,
      contentType: false,
      cache: false,
      processData: false,
      // dataType:"JSON",
      success: function (response) {
    
        if (response) {
          $('.addiconerror').html(response);
        }
        if (response == "<h3 class='text-success'>Insert successfully</h2>") {
          window.location.assign('dashboard.php');
        }
      },

    });

  })

  // writer
  // delete
  

 



  // addresss
  $('#addaddressform').submit(function (e) {
    // alert(xmlh.status);
    e.preventDefault();
    var datas = new FormData(this);

    $.ajax({
      type: 'POST',
      url: 'address.php',
      data: datas,
      contentType: false,
      cache: false,
      processData: false,
      // dataType:"JSON",
      success: function (response) {
    
        if (response) {
          $('.addaddresserror').html(response);
        }
        if (response == "<h3 class='text-success'>Insert successfully</h2>") {
          window.location.assign('dashboard.php');
        }
      },

    });

  })

  $('#updateaddressform').submit(function (e) {
    // alert(xmlh.status);
    e.preventDefault();
    var datas = new FormData(this);

    $.ajax({
      type: 'POST',
      url: 'confirmed.php',
      data: datas,
      contentType: false,
      cache: false,
      processData: false,
      // dataType:"JSON",
      success: function (response) {
    
        if (response) {
          $('.uppdateaddresserror').html(response);
        }
        if (response == "<h3 class='text-success'>Insert successfully</h2>") {
          window.location.assign('dashboard.php');
        }
      },

    });

  })

  // writer

  // // delete
  $('#addressdelete').on('show.bs.modal', function (e) {
    var id = $(e.relatedTarget).attr('address');
    // alert(id);
    $.ajax({
      type: 'post',
      url: 'confirm.php',
      data: 'addressdelete=' + id,
      success: function (data) {
        $('.addressdelete').html(data);
      },
    });
  })
 
  $('#addressedit').on('show.bs.modal', function (e) {
    var id = $(e.relatedTarget).attr('address');
    // alert(id);
    $.ajax({
      type: 'post',
      url: 'confirm.php',
      data: 'addressedit=' + id,
      success: function (data) {
        $('.addressedit').html(data);
      }
    });
  })


  $('#addressstatus').on('show.bs.modal', function (e) {
    var id = $(e.relatedTarget).attr('address');
    $.ajax({
      type: 'post',
      url: 'confirm.php',
      data: 'addressstatus=' + id,
      success: function (data) {
        $('.addressstatus').html(data);
      }
    });
       
  })


  $('#icondelete').on('show.bs.modal', function (e) {
    var id = $(e.relatedTarget).attr('icon');
    // alert(id);
    $.ajax({
      type: 'post',
      url: 'confirm.php',
      data: 'icondelete=' + id,
      success: function (data) {
        $('.icondelete').html(data);
      },
    });
  })

})
  
  
  



