//CMS scripts

//Sign up form validations
function validateForm() {
    //Phone number validation
    var x = document.forms["signup"]["phone_no"].value;
    var test_phoneno = /^\d{10}$/;

    if(!x.match(test_phoneno))
       {
         alert("hello p");
         return false;
       }

    //username validation
    var x = document.forms["signup"]["username"].value;
    var test_username = "";
    if(!x.match(test_username))
       {
          alert("hello u");
          return false;
       }

    //password validation
    x = document.forms["signup"]["password"].value;
    var test_password = "";
    if(!x.match(test_password))
       {
         alert("hello p");
         return false;
       }

    //Full name validation
    x = document.forms["signup"]["name"].value;
    var test_name = /^[A-Za-z]+$/;
    if(!x.match(test_name))
       {
         alert("hello n");
         return false;
       }

    //email id validation
    x = document.forms["signup"]["email_id"].value;
    var test_email = /^([\w-]+(?:\.[\w-]+)*)@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$/i;
    if(!x.match(test_email))
       {
         alert("hello e");
           return false;
       }
       alert("yo");
    return true;
}

//live check for available usernames
$("#username").keyup(function() {

  $("#username_availability_status").show();
  if($('#username').val().length<6){
    document.getElementById("username_availability_status").innerHTML = "Too short!";
  }
  else{
    document.getElementById("username_availability_status").innerHTML = "";
    jQuery.ajax({
      url: "check_free_username.php",
      data:'username='+$("#username").val(),
      type: "POST",
      success:function(data){
        $("#username_availability_status").html(data);
      },
      error:function (){}
    });
  }

});


function show_articles() {
  //alert("hello");
  jQuery.ajax({
    url: "get_articles_list.php",
    data:'article_type='+$("#article_type").val()+'&article_tag='+$("#article_tag").val(),
    type: "POST",
    success:function(data){
      $("#articles_list").html(data);
    },
    error:function (){}
    });
  }


//article preview on clicking 'preview button'
function article_preview() {
  $("progress").show();
  var formData = new FormData($('#create_article')[0]);
  $("#article_preview").show();
  jQuery.ajax({
    url: "article_preview.php",
    xhr: function() {  // Custom XMLHttpRequest
            var myXhr = $.ajaxSettings.xhr();
            if(myXhr.upload){ // Check if upload property exists
                myXhr.upload.addEventListener('progress',progressHandlingFunction, false);
                 // For handling the progress of the upload
            }
            return myXhr;
    },
    type: "POST",
    data: formData,
    //Options to tell jQuery not to process data or worry about content-type.
    cache: false,
    contentType: false,
    processData: false,
    success:function(data){
      //alert("hello1");
      $("progress").hide();
      $("#article_preview").html(data);
    },
    error:function (){}
  });
}

//Progress bar
function progressHandlingFunction(e){
    if(e.lengthComputable){
        $('progress').attr({value:e.loaded,max:e.total});
    }
}

//Configure dropdown list of article_tag given value of article_type
function configureDropDownLists(article_type,article_tag) {
    var news = new Array('News', 'Insight', 'Reveal');
    var reviews = new Array('Reviews', 'Previews');
    var trailers = new Array('Trailers', 'Gameplay');
    var tweaks = new Array('Tweaks', 'Fixes', 'Mods');
    var any= new Array();
    any=(news.concat(reviews).concat(trailers)).concat(tweaks);

    switch (article_type.value) {
        case 'Any':
            article_tag.options.length = 0;
            createOption(article_tag,"Any","Any")
            for (i = 0; i < any.length; i++) {
              createOption(article_tag, any[i], any[i]);
        }
            break;
        case 'News':
            article_tag.options.length = 0;
            for (i = 0; i < news.length; i++) {
                createOption(article_tag, news[i], news[i]);
            }
            break;
        case 'Reviews':
            article_tag.options.length = 0;
        for (i = 0; i < reviews.length; i++) {
            createOption(article_tag, reviews[i], reviews[i]);
            }
            break;
        case 'Trailers':
            article_tag.options.length = 0;
            for (i = 0; i < trailers.length; i++) {
                createOption(article_tag, trailers[i], trailers[i]);
            }
            break;
        case 'tweaks':
            article_tag.options.length = 0;
            for (i = 0; i < tweaks.length; i++) {
                createOption(article_tag, tweaks[i], tweaks[i]);
            }
                break;
            default:
                article_tag.options.length = 0;
            break;
    }

}

//triggers the give function on document ready
$(document).ready(function(){
  configureDropDownLists(article_type,article_tag);
});

//creates options in dropdown list given a arguments
function createOption(article_type, text, value) {
  var opt = document.createElement('option');
  opt.value = value;
  opt.text = text;
  article_type.options.add(opt);
}
