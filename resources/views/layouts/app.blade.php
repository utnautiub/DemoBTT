<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Page @yield("title")</title>
  <link rel="stylesheet" href="{{ asset('/css/bootstrap.min.css') }}">
  <script defer src="{{asset('/js/bootstrap.bundle.min.js')}}"></script>
  <link rel="stylesheet" href="{{ asset('/fontawesome-free-6.4.2-web/css/all.css') }}">
  <script defer src="{{asset('/fontawesome-free-6.4.2-web/js/fontawesome.min.js')}}"></script>
  <script defer>
  setTimeout(function() {
    document.getElementById('success-alert').style.display = 'none';
  }, 3000); // 3 giây		
  function previewImage() {
    var input = document.getElementById('coverImageURL');
    var img = document.getElementById('previewImage');

    var reader = new FileReader();

    reader.onload = function(e) {
      img.src = e.target.result;
    };

    reader.readAsDataURL(input.files[0]);
  }
  </script>
  <style>
  #success-alert {
    display: block;
    /* Bắt đầu hiển thị thông báo */
  }

  .long-column {
    width: 200px;
    /* Đặt độ rộng của cột là 200px */
  }

  .image-upload {
    box-shadow: rgba(240, 46, 170, 0.4) 5px 5px, rgba(240, 46, 170, 0.3) 10px 10px, rgba(240, 46, 170, 0.2) 15px 15px, rgba(240, 46, 170, 0.1) 20px 20px, rgba(240, 46, 170, 0.05) 25px 25px;
  }
  </style>
</head>

<body>
  <!-- Header -->
  <header class="mb-3">
    @include('includes/header')
  </header>
  <!-- Main Content -->
  <main class="mx-5">
    @yield('content')
  </main>
  <!-- Footer -->
  <footer>
    @include('includes/footer')
  </footer>
</body>



</html>