<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <link rel="apple-touch-icon" sizes="76x76" href="/img/apple-icon.png">
  <!-- <link rel="icon" type="image/png" href="/img/favicon.png/"> -->
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <!-- Extra details for Live View on GitHub Pages -->
  <!-- Canonical SEO -->
  <!-- <link rel="canonical" href="https://www.creative-tim.com/product/now-ui-dashboard-pro" /> -->


  <!--  Social tags      -->
  <meta name="keywords" content="creative tim, html dashboard, html css dashboard, web dashboard, bootstrap 4 dashboard, bootstrap 4, css3 dashboard, bootstrap 4 admin, now ui dashboard bootstrap 4 dashboard, frontend, responsive bootstrap 4 dashboard, now ui design, now ui dashboard bootstrap 4 dashboard">
  <meta name="description" content="Now UI Dashboard PRO is a beautiful Bootstrap 4 admin dashboard with a large number of components, designed to look beautiful, clean and organized. If you are looking for a tool to manage dates about your business, this dashboard is the thing for you.">


  <!-- Schema.org markup for Google+ -->
  <meta itemprop="name" content="Now Ui Dashboard PRO by Creative Tim">
  <meta itemprop="description" content="Now UI Dashboard PRO is a beautiful Bootstrap 4 admin dashboard with a large number of components, designed to look beautiful, clean and organized. If you are looking for a tool to manage dates about your business, this dashboard is the thing for you.">

  <meta itemprop="image" content="https://s3.amazonaws.com/creativetim_bucket/products/72/opt_nudp_thumbnail.jpg">


  <!-- Twitter Card data -->
  <!-- <meta name="twitter:card" content="product">
  <meta name="twitter:site" content="@creativetim">
  <meta name="twitter:title" content="[Now Ui Dashboard PRO] by Creative Tim">

  <meta name="twitter:description" content="Now UI Dashboard PRO is a beautiful Bootstrap 4 admin dashboard with a large number of components, designed to look beautiful, clean and organized. If you are looking for a tool to manage dates about your business, this dashboard is the thing for you.">
  <meta name="twitter:creator" content="@creativetim">
  <meta name="twitter:image" content="https://s3.amazonaws.com/creativetim_bucket/products/72/opt_nudp_thumbnail.jpg"> -->


  <!-- Open Graph data
  <meta property="fb:app_id" content="655968634437471">
  <meta property="og:title" content="Now Ui Dashboard PRO by Creative Tim" />
  <meta property="og:type" content="article" />
  <meta property="og:url" content="http://demos.creative-tim.com/now-ui-dashboard-pro/examples/dashboard.html" />
  <meta property="og:image" content="https://s3.amazonaws.com/creativetim_bucket/products/72/opt_nudp_thumbnail.jpg"/>
  <meta property="og:description" content="Now UI Dashboard PRO is a beautiful Bootstrap 4 admin dashboard with a large number of components, designed to look beautiful, clean and organized. If you are looking for a tool to manage dates about your business, this dashboard is the thing for you." />
  <meta property="og:site_name" content="Creative Tim" /> -->
  <title>
    Vision Ayu Admin
  </title>
  <!-- <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' /> -->
  <!--     Fonts and icons     -->
  <!-- <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" /> -->
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
  <!-- CSS Files -->
  <link rel="stylesheet" href="https://code.jquery.com/ui/1.11.2/themes/smoothness/jquery-ui.css">
  <link href="/css/bootstrap.min.css" rel="stylesheet" />
  <link href="/css/now-ui-dashboard.css?v=1.3.0" rel="stylesheet" />
  <!-- CSS Just for demo purpose, don't include it in your project -->
  <link href="/demo/demo.css" rel="stylesheet" />

  <!-- Google Tag Manager -->
  <!-- End Google Tag Manager -->
  <script>
    // Facebook Pixel Code Don't Delete
    ! function(f, b, e, v, n, t, s) {
      if (f.fbq) return;
      n = f.fbq = function() {
        n.callMethod ?
          n.callMethod.apply(n, arguments) : n.queue.push(arguments)
      };
      if (!f._fbq) f._fbq = n;
      n.push = n;
      n.loaded = !0;
      n.version = '2.0';
      n.queue = [];
      t = b.createElement(e);
      t.async = !0;
      t.src = v;
      s = b.getElementsByTagName(e)[0];
      s.parentNode.insertBefore(t, s)
    }(window,
      document, 'script', '//connect.facebook.net/en_US/fbevents.js');
    try {
      fbq('init', '111649226022273');
      fbq('track', "PageView");
    } catch (err) {
      console.log('Facebook Track Error:', err);
    }
  </script>
  <script src="https://cdn.ckeditor.com/ckeditor5/22.0.0/classic/ckeditor.js"></script>
    <script>
      ClassicEditor
        .create(document.querySelector('#editor'))
        .then(editor => {
          console.log(editor);
        })
        .catch(error => {
          console.error(error);
        });

    </script>
</head>

<body class="{{ $class ?? '' }}">
  <noscript>
    <img height="1" width="1" style="display:none" src="https://www.facebook.com/tr?id=111649226022273&ev=PageView&noscript=1" />
  </noscript>
  <!-- Google Tag Manager (noscript) -->
  <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-NKDMSK6"
  height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
  <!-- End Google Tag Manager (noscript) -->
  <div class="wrapper">
    @auth
      @include('layouts.page_template.auth')
    @endauth
    @guest
      @include('layouts.page_template.guest')
    @endguest
  </div>
  <!--   Core JS Files   -->
  <script src="/js/core/jquery.min.js"></script>
  <script src="/js/core/popper.min.js"></script>
  <script src="/js/core/bootstrap.min.js"></script>
  <script src="/js/plugins/perfect-scrollbar.jquery.min.js"></script>

  <!-- include summernote css/js -->
<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>

<script>
 $(document).ready(function() {
  $('.summernote').summernote();
});

</script>

<script type="text/javascript">
    $(document).ready(function() {
        $('select[name="country_id"]').on('change', function() {
            var stateID = $(this).val();
            if(stateID) {
                $.ajax({
                    url: '/myform/ajax/'+stateID,
                    type: "GET",
                    dataType: "json",
                    success:function(data) {
                        $('select[name="city"]').empty();
                        $.each(data, function(key, value) {
                            $('select[name="city"]').append('<option value="'+ value.test_header_2_id +'">'+ value.test_header_2 +'</option>');
                        });


                    }
                });
            }else{
                $('select[name="city"]').empty();
            }
        });
    });
</script>

<script type="text/javascript">
    $(document).ready(function() {
        $('select[name="state_type"]').on('change', function() {
            var stateID = $(this).val();
            if(stateID) {
                $.ajax({
                    url: '/myform/ajax_state/'+stateID,
                    type: "GET",
                    dataType: "json",
                    success:function(data) {
                        $('select[name="city"]').empty();
                        $.each(data, function(key, value) {
                            $('select[name="city"]').append('<option value="'+ value.id +'">'+ value.city_name +'</option>');
                        });


                    }
                });
            }else{
                $('select[name="city"]').empty();
            }
        });
    });
</script>

<script type="text/javascript">
    $(document).ready(function() {
        $('select[name="city"]').on('change', function() {
            var stateID = $(this).val();
            if(stateID) {
                $.ajax({
                    url: '/myform/ajaxs/'+stateID,
                    type: "GET",
                    dataType: "json",
                    success:function(data) {
                        $('select[name="setting"]').empty();
                        $.each(data, function(key, value) {
                            $('select[name="setting"]').append('<option value="'+ value.test_header_3_id +'">'+ value.test_header_3 +'</option>');
                        });


                    }
                });
            }else{
                $('select[name="setting"]').empty();
            }
        });
    });
</script>

<script type="text/javascript">
    $(document).ready(function() {
        $('select[name="setting"]').on('change', function() {
            var statesID = $(this).val();
            if(statesID) {
                $.ajax({
                    url: '/myform/ajaxsIT/'+statesID,
                    type: "GET",
                    dataType: "json",
                    success:function(data) {
                        $('select[name="four"]').empty();
                        $.each(data, function(key, value) {
                            $('select[name="four"]').append('<option value="'+ value.test_header_4_id +'">'+ value.test_header_4 +'</option>');
                        });


                    }
                });
            }else{
                $('select[name="four"]').empty();
            }
        });
    });
</script>

<script type="text/javascript">
    $(document).ready(function() {
        $('select[name="city"]').on('change', function() {
            var statesID = $(this).val();
            if(statesID) {
                $.ajax({
                    url: '/myform/ajaxsI/'+statesID,
                    type: "GET",
                    dataType: "json",
                    success:function(data) {
                        $('select[name="three"]').empty();
                        $.each(data, function(key, value) {
                            $('select[name="three"]').append('<option value="'+ value.test_header_3_id +'">'+ value.test_header_3 +'</option>');
                        });


                    }
                });
            }else{
                $('select[name="three"]').empty();
            }
        });
    });
</script>


<script type="text/javascript">
    $(document).ready(function () {
        $('#master').on('click', function(e) {
         if($(this).is(':checked',true))
         {
            $(".sub_chk").prop('checked', true);
         } else {
            $(".sub_chk").prop('checked',false);
         }
        });
        $('.delete_all').on('click', function(e) {
            var allVals = [];
            $(".sub_chk:checked").each(function() {
                allVals.push($(this).attr('data-id'));
            });
            if(allVals.length <=0)
            {
                alert("Please select row.");
            }  else {
                var check = confirm("Are you sure you want to delete this row?");
                if(check == true){
                    var join_selected_values = allVals.join(",");
                    $.ajax({
                        url: $(this).data('url'),
                        type: 'DELETE',
                        headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                        data: 'ids='+join_selected_values,
                        success: function (data) {
                            if (data['success']) {
                                $(".sub_chk:checked").each(function() {
                                    $(this).parents("tr").remove();
                                });
                                alert(data['success']);
                            } else if (data['error']) {
                                alert(data['error']);
                            } else {
                                alert('Whoops Something went wrong!!');
                            }
                        },
                        error: function (data) {
                            alert(data.responseText);
                        }
                    });
                  $.each(allVals, function( index, value ) {
                      $('table tr').filter("[data-row-id='" + value + "']").remove();
                  });
                }
            }
        });
        $('[data-toggle=confirmation]').confirmation({
            rootSelector: '[data-toggle=confirmation]',
            onConfirm: function (event, element) {
                element.trigger('confirm');
            }
        });
        $(document).on('confirm', function (e) {
            var ele = e.target;
            e.preventDefault();
            $.ajax({
                url: ele.href,
                type: 'DELETE',
                headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                success: function (data) {
                    if (data['success']) {
                        $("#" + data['tr']).slideUp("slow");
                        alert(data['success']);
                    } else if (data['error']) {
                        alert(data['error']);
                    } else {
                        alert('Whoops Something went wrong!!');
                    }
                },
                error: function (data) {
                    alert(data.responseText);
                }
            });
            return false;
        });
    });
</script>






  <!--  Google Maps Plugin    -->
  <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script>
  <!-- Chart JS -->
  <script src="/js/plugins/chartjs.min.js"></script>
  <!--  Notifications Plugin    -->
  <script src="/js/plugins/bootstrap-notify.js"></script>
  <!-- Control Center for Now Ui Dashboard: parallax effects, scripts for the example pages etc -->
  <script src="/js/now-ui-dashboard.min.js?v=1.3.0" type="text/javascript"></script>
  <!-- Now Ui Dashboard DEMO methods, don't include it in your project! -->
  <script src="/demo/demo.js"></script>
  @stack('js')


</body>

</html>
