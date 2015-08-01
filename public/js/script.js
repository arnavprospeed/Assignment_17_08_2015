function height(){
  $("#aside-column").height($("#central-column").height());
}

function initiate(){
  $(document).ready(function() {

    // place this within dom ready function
    function delay_height(){
      $("#aside-column").height($("#central-column").height());
      if($(window).width()>991){
        $(document).ready(function() {
            $('#social-follow-desktop').delay(500).fadeIn(400);
          });
      }
    }


   // use setTimeout() to execute
   setTimeout(delay_height, 1000)

  });
}
$(document).ready(function() {
    $('body').delay(1000).fadeIn();
});



if ($(window).width() < 768) {
    $("#featured-home").remove();
}
else{
    $("#featured-home-mobile").remove();
}

$(window).resize(function(){
    if ($(window).width() < 768) {
      $("#featured-home").remove();
      $("#featured-home-mobile").remove();
      $(".slide-container-index").append('<div class="carousel slide" data-ride="carousel" id="featured-home-mobile"><div class="carousel-inner"><div class="item active"><img src="img/batman_banner-m.jpg" alt="Arkham Knight"></a></div><div class="item"><a href="gta5.html"><img src="img/nfs_banner-m.jpg" alt="Need For Speed"></a></div>        <div class="item"><a href="gta5.html"><img src="img/witcher3-m.jpg" alt="The Wild Hunt"></a></div>        <div class="item"><a href="gta5.html"><img src="img/gtabanner-m.jpg" alt="GTA5"></a></div>        <div class="item"><a href="gta5.html"><img src="img/ghostrecon_banner-m.jpg" alt="Wildlands"></a></div>      </div><!-- carousel-inner --><a class="left carousel-control" href="#featured-home-mobile" role="button" data-slide="prev">        <span class="glyphicon glyphicon-chevron-left"></span>      </a>      <a class="right carousel-control" href="#featured-home-mobile" role="button" data-slide="next">        <span class="glyphicon glyphicon-chevron-right"></span>      </a></div>');
  }
  else{
    $("#featured-home-mobile").remove();
    $("#featured-home").remove();
    $(".slide-container-index").append('<div class="carousel slide" data-ride="carousel" id="featured-home">      <div class="carousel-inner">      <div class="item active"><a href="gta5.html"><h3 class="banner-title"><span class="banner-type">&nbspNews&nbsp</span>&nbspBatman Arkham Knight PC sales suspended. Read more&nbsp<span class="glyphicon glyphicon-triangle-right" style="font-size:14px;color:#0091e4;"></h3></a><img src="img/batman_banner.jpg" alt="Arkham Knight"></div>      <div class="item"><a href="gta5.html"><h3 class="banner-title"><span class="banner-type">&nbspTrailer&nbsp</span>&nbspNeed for Speed Gameplay trailer analysis &nbsp<span class="glyphicon glyphicon-triangle-right" style="font-size:14px;color:#0091e4;"></h3></a><img src="img/nfs_banner.jpg" alt="Need For Speed"></div>      <div class="item"><a href="gta5.html"><h3 class="banner-title"><span class="banner-type">&nbspReview&nbsp</span>&nbspWitcher 3 : The Wild Hunt Review &nbsp<span class="glyphicon glyphicon-triangle-right" style="font-size:14px;color:#0091e4;"></h3></a><img src="img/witcher3.jpg" alt="The Wild Hunt"></div>      <div class="item"><a href="gta5.html"><h3 class="banner-title"><span class="banner-type">&nbspReview&nbsp</span>&nbspGrand Theft Auto V review &nbsp<span class="glyphicon glyphicon-triangle-right" style="font-size:14px;color:#0091e4;"></h3></a><img src="img/gtabanner.jpg" alt="GTA5"></div>      <div class="item"><a href="gta5.html"><h3 class="banner-title"><span class="banner-type">&nbspReveal&nbsp</span>&nbspGhost Recon going Open World in GR: Wildlands. Read More &nbsp<span class="glyphicon glyphicon-triangle-right" style="font-size:14px;color:#0091e4;"></h3></a><img src="img/ghostrecon_banner.jpg" alt="Wildlands"></div>    </div>      <a class="left carousel-control" href="#featured-home" role="button" data-slide="prev"><span class="glyphicon glyphicon-chevron-left"></span>      </a>      <a class="right carousel-control" href="#featured-home" role="button" data-slide="next">        <span class="glyphicon glyphicon-chevron-right"></span>      </a>    </div>');
    $("#aside-column").height($("#central-column").height());
  }
});





(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.3";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));


//CMS scripts


function validateForm() {
    //Phone number validation
    var x = document.forms["update-form"]["phone_no"].value;
    var test_phoneno = /^\d{10}$/;

    if(!x.match(test_phoneno))
       {
         alert("hello p");
         return false;
       }

    //username validation
    var x = document.forms["update-form"]["username"].value;
    var test_username = "";
    if(!x.match(test_username))
       {
          alert("hello u");
          return false;
       }

    //password validation
    x = document.forms["update-form"]["password"].value;
    var test_password = "";
    if(!x.match(test_password))
       {
         alert("hello p");
         return false;
       }

    //Full name validation
    x = document.forms["update-form"]["name"].value;
    var test_name = /^[A-Za-z]+$/;
    if(!x.match(test_name))
       {
         alert("hello n");
         return false;
       }

    //email id validation
    x = document.forms["update-form"]["email_id"].value;
    var test_email = /^([\w-]+(?:\.[\w-]+)*)@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$/i;
    if(!x.match(test_email))
       {
         alert("hello e");
           return false;
       }
       alert("yo");
    return true;
}
$( "#username" ).keyup(function() {

  $("#username_availability_result").show();
  jQuery.ajax({
    url: "check_free_username.php",
    data:'username='+$("#username").val(),
    type: "POST",
    success:function(data){
      $("#user-availability-status").html(data);
      $("#loaderIcon").hide();
    },
    error:function (){}
  });

});


$(document).ready(function(){
  configureDropDownLists(article_type,article_tag);
});



function configureDropDownLists(article_type,article_tag) {
    var news = new Array('News', 'Insight', 'Reveal');
    var reviews = new Array('Reviews', 'Previews');
    var trailers = new Array('Trailers', 'Gameplay');
    var tweaks = new Array('Tweaks', 'Fixes', 'Mods');

    switch (article_type.value) {
        case 'news':
            article_tag.options.length = 0;
            for (i = 0; i < news.length; i++) {
                createOption(article_tag, news[i], news[i]);
            }
            break;
        case 'reviews':
            article_tag.options.length = 0;
        for (i = 0; i < reviews.length; i++) {
            createOption(article_tag, reviews[i], reviews[i]);
            }
            break;
        case 'trailers':
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

function createOption(article_type, text, value) {
        var opt = document.createElement('option');
        opt.value = value;
        opt.text = text;
        article_type.options.add(opt);
    }
